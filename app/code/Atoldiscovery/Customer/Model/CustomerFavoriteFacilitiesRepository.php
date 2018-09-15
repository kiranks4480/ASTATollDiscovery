<?php


namespace Atoldiscovery\Customer\Model;

use Atoldiscovery\Customer\Api\CustomerFavoriteFacilitiesRepositoryInterface;
use Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesSearchResultsInterfaceFactory;
use Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Atoldiscovery\Customer\Model\ResourceModel\CustomerFavoriteFacilities as ResourceCustomerFavoriteFacilities;
use Atoldiscovery\Customer\Model\ResourceModel\CustomerFavoriteFacilities\CollectionFactory as CustomerFavoriteFacilitiesCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class CustomerFavoriteFacilitiesRepository implements CustomerFavoriteFacilitiesRepositoryInterface
{

    protected $resource;

    protected $customerFavoriteFacilitiesFactory;

    protected $customerFavoriteFacilitiesCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $dataCustomerFavoriteFacilitiesFactory;

    private $storeManager;

    /**
     * @param ResourceCustomerFavoriteFacilities $resource
     * @param CustomerFavoriteFacilitiesFactory $customerFavoriteFacilitiesFactory
     * @param CustomerFavoriteFacilitiesInterfaceFactory $dataCustomerFavoriteFacilitiesFactory
     * @param CustomerFavoriteFacilitiesCollectionFactory $customerFavoriteFacilitiesCollectionFactory
     * @param CustomerFavoriteFacilitiesSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceCustomerFavoriteFacilities $resource,
        CustomerFavoriteFacilitiesFactory $customerFavoriteFacilitiesFactory,
        CustomerFavoriteFacilitiesInterfaceFactory $dataCustomerFavoriteFacilitiesFactory,
        CustomerFavoriteFacilitiesCollectionFactory $customerFavoriteFacilitiesCollectionFactory,
        CustomerFavoriteFacilitiesSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->customerFavoriteFacilitiesFactory = $customerFavoriteFacilitiesFactory;
        $this->customerFavoriteFacilitiesCollectionFactory = $customerFavoriteFacilitiesCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCustomerFavoriteFacilitiesFactory = $dataCustomerFavoriteFacilitiesFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface $customerFavoriteFacilities
    ) {
        /* if (empty($customerFavoriteFacilities->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $customerFavoriteFacilities->setStoreId($storeId);
        } */
        try {
            $this->resource->save($customerFavoriteFacilities);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customerFavoriteFacilities: %1',
                $exception->getMessage()
            ));
        }
        return $customerFavoriteFacilities;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($facilitiesId)
    {
        $customerFavoriteFacilities = $this->customerFavoriteFacilitiesFactory->create();
        $this->resource->load($customerFavoriteFacilities, $facilitiesId);
        if (!$customerFavoriteFacilities->getId()) {
            throw new NoSuchEntityException(__('customer_favorite_facilities with id "%1" does not exist.', $facilitiesId));
        }
        return $customerFavoriteFacilities;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customerFavoriteFacilitiesCollectionFactory->create();
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
        \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface $customerFavoriteFacilities
    ) {
        try {
            $this->resource->delete($customerFavoriteFacilities);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the customer_favorite_facilities: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($facilitiesId)
    {
        return $this->delete($this->getById($facilitiesId));
    }
}
