<?php


namespace Atoldiscovery\Customer\Model\ResourceModel;

class CustomerPreferences extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('customer_preferences', 'preferences_id');
    }
}
