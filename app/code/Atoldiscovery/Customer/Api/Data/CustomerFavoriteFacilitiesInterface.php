<?php


namespace Atoldiscovery\Customer\Api\Data;

interface CustomerFavoriteFacilitiesInterface
{

    const FACILITIES = 'facilities';
    const CUSTOMER_FAVORITE_FACILITIES_ID = 'facilities_id';

    /**
     * Get facilities_id
     * @return string|null
     */
    public function getFacilitiesId();

    /**
     * Set facilities_id
     * @param string $customerFavoriteFacilitiesId
     * @return \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface
     */
    public function setFacilitiesId($customerFavoriteFacilitiesId);

    /**
     * Get facilities
     * @return string|null
     */
    public function getFacilities();

    /**
     * Set facilities
     * @param string $facilities
     * @return \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface
     */
    public function setFacilities($facilities);
}
