<?php


namespace Atoldiscovery\Customer\Controller\Adminhtml\Customerpreferences;

class Delete extends \Atoldiscovery\Customer\Controller\Adminhtml\Customerpreferences
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('preferences_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Atoldiscovery\Customer\Model\CustomerPreferences::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Customer Preferences.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['preferences_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Customer Preferences to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
