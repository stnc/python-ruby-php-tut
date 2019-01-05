<?php
namespace Magehit\Deleteorders\Model;

use Magento\Framework\App\ProductMetadataInterface;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;
use Magento\Sales\Model\ResourceModel\Order\Creditmemo\Collection as CreditmemoCollection;
use Magento\Sales\Model\ResourceModel\Order\Invoice\Collection;
use Magento\Sales\Model\ResourceModel\Order\Payment\Transaction\Collection as TransactionCollection;
use Magento\Sales\Model\ResourceModel\Order\Shipment\Collection as ShipmentCollection;

class Deleteorders extends AbstractModel
{
    protected $_appProductMetadataInterface;
    protected $_modelResource;
    protected $_messageManagerInterface;
    protected $_invoiceCollection;
    protected $_shipmentCollection;
    protected $_creditmemoCollection;
    protected $_transactionCollection;

    public function __construct(
		Context $context, 
		Registry $registry, 
        ProductMetadataInterface $appProductMetadataInterface, 
        \Magento\Framework\App\ResourceConnection $modelResource, 
        ManagerInterface $messageManagerInterface, 
        Collection $invoiceCollection, 
        ShipmentCollection $shipmentCollection, 
        CreditmemoCollection $creditmemoCollection,  
        TransactionCollection $transactionCollection, 
        AbstractResource $resource = null, 
        AbstractDb $resourceCollection = null, 
        array $data = []
    ){
		$this->_appProductMetadataInterface = $appProductMetadataInterface;
        $this->_modelResource 				= $modelResource;
        $this->_messageManagerInterface 	= $messageManagerInterface;
        $this->_invoiceCollection 			= $invoiceCollection;
        $this->_shipmentCollection 			= $shipmentCollection;
        $this->_creditmemoCollection 		= $creditmemoCollection;
        $this->_transactionCollection 		= $transactionCollection;

        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    public function deteleRelated($orderIds = [])
    {
        try {
			// Remove Invoice Entry From Invoice Tabel
            $invoices = $this->_invoiceCollection->addFieldToFilter('order_id', ['in', $orderIds]);
            foreach ($invoices as $invoice) $invoice->delete();
			
			// Remove Invoice Entry From Invoice Grid
			$this->deleteGridData($orderIds,'sales_invoice_grid');

			// Remove Shipment Entry From Shipment Tabel
            $shipments = $this->_shipmentCollection->addFieldToFilter('order_id', ['in', $orderIds]);
            foreach ($shipments as $shipment) $shipment->delete();

			// Remove Shipment Entry From Shipment Grid
			$this->deleteGridData($orderIds,'sales_shipment_grid');
			
			// Remove Creditmemo Entry From Creditmemo Tabel
            $creditmemos = $this->_creditmemoCollection->addFieldToFilter('order_id', ['in', $orderIds]);
            foreach ($creditmemos as $creditmemo) $creditmemo->delete();

          	// Remove Creditmemo Entry From Creditmemo Grid
			$this->deleteGridData($orderIds,'sales_creditmemo_grid');
			
            $transactions = $this->_transactionCollection->addFieldToFilter('order_id', ['in', $orderIds]);
            foreach ($transactions as $transaction) $transaction->delete();
        } catch (\Exception $e) {
            $this->_messageManagerInterface->addError($e->getMessage());
        }
    }
	
	public function deleteGridData($orderId,$Tabelname)
	{
		$orderId              = '(' . implode(",", $orderId) . ')';
		$resource             = $this->_modelResource;
		$write                = $resource->getConnection('core_write');
        $salesGrid 	  		  = $resource->getTableName($Tabelname);
        try {
            $sql = "DELETE FROM  " . $salesGrid . " WHERE order_id IN " . $orderId . ";";
            $write->query($sql);
        } catch (\Exception $e) {
            $this->_messageManagerInterface->addError($e->getMessage());
        }
		return true;
	}
}
