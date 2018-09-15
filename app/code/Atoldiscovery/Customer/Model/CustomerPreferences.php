<?php


namespace Atoldiscovery\Customer\Model;

use Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface;

class CustomerPreferences extends \Magento\Framework\Model\AbstractModel implements CustomerPreferencesInterface
{

    protected $_eventPrefix = 'customer_preferences';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Atoldiscovery\Customer\Model\ResourceModel\CustomerPreferences::class);
    }

    /**
     * Get preferences_id
     * @return string
     */
    public function getPreferencesId()
    {
        return $this->getData(self::CUSTOMER_PREFERENCES_ID);
    }

    /**
     * Set preferences_id
     * @param string $preferencesId
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setPreferencesId($preferencesId)
    {
        return $this->setData(self::CUSTOMER_PREFERENCES_ID, $preferencesId);
    }

    /**
     * Get customer_id
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * Set customer_id
     * @param string $entityId
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setCustomerId($entityId)
    {
        return $this->setData(self::CUSTOMER_ID, $entityId);
    }

    /**
     * Get smoking
     * @return string
     */
    public function getSmoking()
    {
        return $this->getData(self::SMOKING);
    }

    /**
     * Set smoking
     * @param string $smoking
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setSmoking($smoking)
    {
        return $this->setData(self::SMOKING, $smoking);
    }

    /**
     * Get start_rating
     * @return string
     */
    public function getStartRating()
    {
        return $this->getData(self::START_RATING);
    }

    /**
     * Set start_rating
     * @param string $startRating
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setStartRating($startRating)
    {
        return $this->setData(self::START_RATING, $startRating);
    }

    /**
     * Get accessibility_preferences
     * @return string
     */
    public function getAccessibilityPreferences()
    {
        return $this->getData(self::ACCESSIBILITY_PREFERENCES);
    }

    /**
     * Set accessibility_preferences
     * @param string $accessibilityPreferences
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setAccessibilityPreferences($accessibilityPreferences)
    {
        return $this->setData(self::ACCESSIBILITY_PREFERENCES, $accessibilityPreferences);
    }

    /**
     * Get favorite_facilities
     * @return string
     */
    public function getFavoriteFacilities()
    {
        return $this->getData(self::FAVORITE_FACILITIES);
    }

    /**
     * Set favorite_facilities
     * @param string $favoriteFacilities
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setFavoriteFacilities($favoriteFacilities)
    {
        return $this->setData(self::FAVORITE_FACILITIES, $favoriteFacilities);
    }

    /**
     * Get booking_preference
     * @return string
     */
    public function getBookingPreference()
    {
        return $this->getData(self::BOOKING_PREFERENCE);
    }

    /**
     * Set booking_preference
     * @param string $bookingPreference
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setBookingPreference($bookingPreference)
    {
        return $this->setData(self::BOOKING_PREFERENCE, $bookingPreference);
    }
}
