<?php


namespace Atoldiscovery\Customer\Api\Data;

interface CustomerFavoriteFacilitiesSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get customer_favorite_facilities list.
     * @return \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface[]
     */
    public function getItems();

    /**
     * Set facilities list.
     * @param \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
