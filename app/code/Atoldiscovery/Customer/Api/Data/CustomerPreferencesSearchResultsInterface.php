<?php


namespace Atoldiscovery\Customer\Api\Data;

interface CustomerPreferencesSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get customer_preferences list.
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface[]
     */
    public function getItems();

    /**
     * Set customer_id list.
     * @param \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
