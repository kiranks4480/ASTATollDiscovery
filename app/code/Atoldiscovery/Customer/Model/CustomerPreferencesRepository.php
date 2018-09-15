<?php


namespace Atoldiscovery\Customer\Model;

use Magento\Framework\Api\DataObjectHelper;
use Atoldiscovery\Customer\Model\ResourceModel\CustomerPreferences\CollectionFactory as CustomerPreferencesCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use Atoldiscovery\Customer\Api\Data\CustomerPreferencesSearchResultsInterfaceFactory;
use Magento\Framework\Api\SortOrder;
use Atoldiscovery\Customer\Api\CustomerPreferencesRepositoryInterface;
use Atoldiscovery\Customer\Model\ResourceModel\CustomerPreferences as ResourceCustomerPreferences;
use Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;

class CustomerPreferencesRepository implements CustomerPreferencesRepositoryInterface
{

    private $storeManager;
    protected $dataCustomerPreferencesFactory;

    protected $resource;

    protected $customerPreferencesFactory;

    protected $customerPreferencesCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectProcessor;

    protected $dataObjectHelper;


    /**
     * @param ResourceCustomerPreferences $resource
     * @param CustomerPreferencesFactory $customerPreferencesFactory
     * @param CustomerPreferencesInterfaceFactory $dataCustomerPreferencesFactory
     * @param CustomerPreferencesCollectionFactory $customerPreferencesCollectionFactory
     * @param CustomerPreferencesSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceCustomerPreferences $resource,
        CustomerPreferencesFactory $customerPreferencesFactory,
        CustomerPreferencesInterfaceFactory $dataCustomerPreferencesFactory,
        CustomerPreferencesCollectionFactory $customerPreferencesCollectionFactory,
        CustomerPreferencesSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->customerPreferencesFactory = $customerPreferencesFactory;
        $this->customerPreferencesCollectionFactory = $customerPreferencesCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCustomerPreferencesFactory = $dataCustomerPreferencesFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface $customerPreferences
    ) {
        /* if (empty($customerPreferences->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $customerPreferences->setStoreId($storeId);
        } */
        try {
            $this->resource->save($customerPreferences);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customerPreferences: %1',
                $exception->getMessage()
            ));
        }
        return $customerPreferences;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($preferencesId)
    {
        $customerPreferences = $this->customerPreferencesFactory->create();
        $this->resource->load($customerPreferences, $preferencesId);
        if (!$customerPreferences->getId()) {
            throw new NoSuchEntityException(__('customer_preferences with id "%1" does not exist.', $preferencesId));
        }
        return $customerPreferences;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customerPreferencesCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $fields[] = $filter->getField();
                $condition = $filter->getConditionType() ?: 'eq';
                $conditions[] = [$condition => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
        
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface $customerPreferences
    ) {
        try {
            $this->resource->delete($customerPreferences);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the customer_preferences: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($preferencesId)
    {
        return $this->delete($this->getById($preferencesId));
    }
}
