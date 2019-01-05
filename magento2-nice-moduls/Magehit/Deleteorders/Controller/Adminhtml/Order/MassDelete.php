<?php
namespace Magehit\Deleteorders\Controller\Adminhtml\Order;

use \Magehit\Deleteorders\Helper\Data as HelperData;
use \Magento\Framework\Controller\ResultFactory;
use \Magento\Store\Model\StoreManagerInterface;
use \Magehit\Deleteorders\Model\Deleteorders as DeleteordersModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Magento\Sales\Api\OrderManagementInterface;

class MassDelete extends \Magento\Sales\Controller\Adminhtml\Order\AbstractMassAction
{
	protected $helperData;
	protected $storeManager;
	protected $deleteOrderModel;

	public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        OrderManagementInterface $orderManagement
    ) {
        parent::__construct($context, $filter);
        $this->collectionFactory 	= $collectionFactory;
        $this->orderManagement 		= $orderManagement;
    }
	
	protected function massAction(AbstractCollection $collection)
    {
        $countDeleteOrder = 0;
        $orderModel = $this->_objectManager->create('Magento\Sales\Model\Order');
		
        foreach ($collection->getItems() as $order) {
            if (!$order->getEntityId()) {
                continue;
            }
            $orderData = $orderModel->load($order->getEntityId());
			$this->_objectManager->get('Magehit\Deleteorders\Model\Deleteorders')->deteleRelated(array($order->getEntityId()));
            $orderData->delete();
			
            $countDeleteOrder++;
        }
        $countNonDeleteOrder = $collection->count() - $countDeleteOrder;

        if ($countNonDeleteOrder && $countDeleteOrder) {
            $this->messageManager->addError(__('%1 order(s) were not deleted.', $countNonDeleteOrder));
        } elseif ($countNonDeleteOrder) {
            $this->messageManager->addError(__('No order(s) were deleted.'));
        }

        if ($countDeleteOrder) {
            $this->messageManager->addSuccess(__('You have deleted %1 order(s).', $countDeleteOrder));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath($this->getComponentRefererUrl());
        return $resultRedirect;
    }
}