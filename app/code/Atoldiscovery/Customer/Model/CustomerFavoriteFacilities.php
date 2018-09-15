<?php


namespace Atoldiscovery\Customer\Model;

use Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface;

class CustomerFavoriteFacilities extends \Magento\Framework\Model\AbstractModel implements CustomerFavoriteFacilitiesInterface
{

    protected $_eventPrefix = 'customer_favorite_facilities';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Atoldiscovery\Customer\Model\ResourceModel\CustomerFavoriteFacilities::class);
    }

    /**
     * Get facilities_id
     * @return string
     */
    public function getFacilitiesId()
    {
        return $this->getData(self::CUSTOMER_FAVORITE_FACILITIES_ID);
    }

    /**
     * Set facilities_id
     * @param string $facilitiesId
     * @return \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface
     */
    public function setFacilitiesId($facilitiesId)
    {
        return $this->setData(self::CUSTOMER_FAVORITE_FACILITIES_ID, $facilitiesId);
    }

    /**
     * Get facilities
     * @return string
     */
    public function getFacilities()
    {
        return $this->getData(self::FACILITIES);
    }

    /**
     * Set facilities
     * @param string $facilities
     * @return \Atoldiscovery\Customer\Api\Data\CustomerFavoriteFacilitiesInterface
     */
    public function setFacilities($facilities)
    {
        return $this->setData(self::FACILITIES, $facilities);
    }
}
