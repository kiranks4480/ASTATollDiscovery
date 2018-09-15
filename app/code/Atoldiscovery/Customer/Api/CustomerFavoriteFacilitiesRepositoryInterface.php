<?php


namespace Atoldiscovery\Customer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomerFavoriteFacilitiesRepositoryInterface
{

    /**
     * Save customer_favorite_facilities
     * @param \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface $customerFavoriteFacilities
     * @return \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface $customerFavoriteFacilities
    );

    /**
     * Retrieve customer_favorite_facilities
     * @param string $customerFavoriteFacilitiesId
     * @return \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($customerFavoriteFacilitiesId);

    /**
     * Retrieve customer_favorite_facilities matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete customer_favorite_facilities
     * @param \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface $customerFavoriteFacilities
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface $customerFavoriteFacilities
    );

    /**
     * Delete customer_favorite_facilities by ID
     * @param string $customerFavoriteFacilitiesId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customerFavoriteFacilitiesId);
}
