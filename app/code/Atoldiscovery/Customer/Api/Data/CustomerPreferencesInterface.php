<?php


namespace Atoldiscovery\Customer\Api\Data;

interface CustomerPreferencesInterface
{

    const CUSTOMER_PREFERENCES_ID = 'preferences_id';
    const SMOKING = 'smoking';
    const FAVORITE_FACILITIES = 'favorite_facilities';
    const BOOKING_PREFERENCE = 'booking_preference';
    const START_RATING = 'start_rating';
    const CUSTOMER_ID = 'customer_id';
    const ACCESSIBILITY_PREFERENCES = 'accessibility_preferences';

    /**
     * Get preferences_id
     * @return string|null
     */
    public function getPreferencesId();

    /**
     * Set preferences_id
     * @param string $preferencesId
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setPreferencesId($preferencesId);

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setCustomerId($customerId);

    /**
     * Get smoking
     * @return string|null
     */
    public function getSmoking();

    /**
     * Set smoking
     * @param string $smoking
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setSmoking($smoking);

    /**
     * Get start_rating
     * @return string|null
     */
    public function getStartRating();

    /**
     * Set start_rating
     * @param string $startRating
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setStartRating($startRating);

    /**
     * Get accessibility_preferences
     * @return string|null
     */
    public function getAccessibilityPreferences();

    /**
     * Set accessibility_preferences
     * @param string $accessibilityPreferences
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setAccessibilityPreferences($accessibilityPreferences);

    /**
     * Get favorite_facilities
     * @return string|null
     */
    public function getFavoriteFacilities();

    /**
     * Set favorite_facilities
     * @param string $favoriteFacilities
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setFavoriteFacilities($favoriteFacilities);

    /**
     * Get booking_preference
     * @return string|null
     */
    public function getBookingPreference();

    /**
     * Set booking_preference
     * @param string $bookingPreference
     * @return \Atoldiscovery\Customer\Api\Data\CustomerPreferencesInterface
     */
    public function setBookingPreference($bookingPreference);
}
