<?php


namespace Atoldiscovery\Customer\Model\ResourceModel;

class CustomerFavoriteFacilities extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('customer_favorite_facilities', 'facilities_id');
    }
}
