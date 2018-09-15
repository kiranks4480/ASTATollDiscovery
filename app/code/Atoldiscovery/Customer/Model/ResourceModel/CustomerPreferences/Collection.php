<?php


namespace Atoldiscovery\Customer\Model\ResourceModel\CustomerPreferences;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Atoldiscovery\Customer\Model\CustomerPreferences::class,
            \Atoldiscovery\Customer\Model\ResourceModel\CustomerPreferences::class
        );
    }
}
