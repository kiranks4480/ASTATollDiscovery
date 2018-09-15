<?php


namespace Atoldiscovery\Customer\Controller\Adminhtml;

abstract class Customerpreferences extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Atoldiscovery_Customer::top_level';
    protected $_coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Atoldiscovery'), __('Atoldiscovery'))
            ->addBreadcrumb(__('Customer Preferences'), __('Customer Preferences'));
        return $resultPage;
    }
}
