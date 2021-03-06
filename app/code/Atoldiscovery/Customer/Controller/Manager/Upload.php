<?php
/**
 * Profile Avatar
 * 
 * @author Slava Yurthev
 */
namespace Atoldiscovery\Customer\Controller\Manager;


use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;
use Atoldiscovery\Customer\Block\Account\Avatar;
use \Magento\Framework\App\Filesystem\DirectoryList;
use \Magento\Framework\Filesystem;

class Upload extends \Magento\Framework\App\Action\Action
{
	protected $_resultPageFactory;

	protected $allowedExtensions = ['png','jpeg','jpg','gif','svg'];

	protected $fileId = 'avatar';

	public function __construct(Context $context, PageFactory $resultPageFactory)
    {
		$this->_resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}

	public function execute()
    {
		$resultPage = $this->_resultPageFactory->create();
		$object_manager = $this->_objectManager;
		$block = $resultPage->getLayout()->createBlock('Atoldiscovery\Customer\Block\Account\Avatar');
		$customer = $block->getCustomer();
		if($customerId = $customer->getId())
		{
			$fileSystem = $object_manager->create('\Magento\Framework\Filesystem');

			$mediaDir = $fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::ROOT)
                    ->getAbsolutePath().'media/';
			if($customer->getData('avatar')){
				@unlink($mediaDir.'avatar/'.$customer->getData('avatar'));
				@rmdir($mediaDir.'avatar/'.$customer->getId());
			}
			// Because ORM must be re-indexed
			$resource = $object_manager->create('Magento\Framework\App\ResourceConnection');
			$table = $resource->getTableName('customer_entity');
			$write = $resource->getConnection($resource::DEFAULT_CONNECTION);
			try
            {
				$uploader = new \Magento\MediaStorage\Model\File\Uploader(
						$this->fileId,
						$object_manager->create('Magento\MediaStorage\Helper\File\Storage\Database'),
						$object_manager->create('Magento\MediaStorage\Helper\File\Storage'),
						$object_manager->create('Magento\MediaStorage\Model\File\Validator\NotProtectedExtension')
					);
				$uploader->setAllowCreateFolders(true);
				$uploader->setAllowedExtensions($this->allowedExtensions);
				if ($uploader->save($mediaDir.'avatar/'.$customerId))
				{
					$uploadedFileNameAndPath = $customerId.'/'.$uploader->getUploadedFileName();
					$write->query("UPDATE `{$table}` SET `avatar`='{$uploadedFileNameAndPath}' 
                                    WHERE `entity_id`='{$customerId}'");
				}
			}
			catch (\Exception $e) {}
		}
		$this->_redirect('customer/account');
	}
}