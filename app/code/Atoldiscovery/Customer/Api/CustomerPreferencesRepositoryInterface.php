<?php


namespace Atoldiscovery\Customer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomerPreferencesRepositoryInterface
{

    /**
     * Save customer_preferences
     * @param \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface $customerPreferences
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface $customerPreferences
    );

    /**
     * Retrieve customer_preferences
     * @param string $preferencesId
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($preferencesId);

    /**
     * Retrieve customer_preferences matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete customer_preferences
     * @param \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface $customerPreferences
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface $customerPreferences
    );

    /**
     * Delete customer_preferences by ID
     * @param string $preferencesId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($preferencesId);
}
