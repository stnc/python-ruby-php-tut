<?php

namespace Magehit\Deleteorders\Controller\Adminhtml\Order;

class Deleteorder extends \Magento\Backend\App\Action
{

	public function execute()
    {
        $orderId = $this->getRequest()->getParam('order_id');
		$orderModel = $this->_objectManager->create('Magento\Sales\Model\Order');
		if (empty($orderId)) 
		{
            $this->messageManager->addError(__('There is no order to process'));
            $this->_redirect('sales/order/index');
            return;
        }
		
		try 
		{
			$orderData = $orderModel->load($orderId);
			$this->_objectManager->get('Magehit\Deleteorders\Model\Deleteorders')->deteleRelated(array($orderId));
			$orderData->delete();
			$this->messageManager->addSuccess(__('Order successfully deleted !'));
        } 
		catch (\Exception $e) 
		{
			$this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('sales/order/index');
		return;
    }
	
	/* protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('deleteorders');
    } */
}
