<?php


namespace AtolDiscovery\Customer\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        //Your install script

        $table_customer_preferences = $setup->getConnection()->newTable($setup->getTable('customer_preferences'));

        $table_customer_preferences->addColumn(
            'preferences_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Entity ID'
        );

        $table_customer_preferences->addColumn(
            'Customer_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => true],
            'Customer Id'
        );

        $table_customer_preferences->addColumn(
            'smoking',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'smoking'
        );

        $table_customer_preferences->addColumn(
            'start_rating',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'start_rating'
        );

        $table_customer_preferences->addColumn(
            'accessibility_preferences',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'accessibility_preferences'
        );

        $table_customer_preferences->addColumn(
            'favorite_facilities',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'favorite_facilities'
        );

        $table_customer_preferences->addColumn(
            'booking_preference',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'booking_preference'
        );

        $setup->getConnection()->createTable($table_customer_preferences);



        $table_customer_favorite_facilities = $setup->getConnection()->newTable($setup->getTable('customer_favorite_facilities'));

        $table_customer_favorite_facilities->addColumn(
            'facilities_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Entity ID'
        );

        $table_customer_favorite_facilities->addColumn(
            'facilities',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'facilities'
        );

        $setup->getConnection()->createTable($table_customer_favorite_facilities);

        
    }
}
