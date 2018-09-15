<?php


namespace Atoldiscovery\Customer\Model\ResourceModel\CustomerFavoriteFacilities;

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
            \Atoldiscovery\Customer\Model\CustomerFavoriteFacilities::class,
            \Atoldiscovery\Customer\Model\ResourceModel\CustomerFavoriteFacilities::class
        );
    }
}
