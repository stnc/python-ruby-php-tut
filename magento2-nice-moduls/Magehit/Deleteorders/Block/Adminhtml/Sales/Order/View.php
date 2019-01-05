<?php 
namespace Magehit\Deleteorders\Block\Adminhtml\Sales\Order;

use Magehit\Deleteorders\Helper\Data as HelperData;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
use Magento\Sales\Block\Adminhtml\Order\View as OrderView;
use Magento\Sales\Helper\Reorder;
use Magento\Sales\Model\Config;

class View extends OrderView 
{
    protected $_helperData;

    public function  __construct(Context $context, 
        Registry $registry, 
        Config $salesConfig, 
        Reorder $reorderHelper, 
        HelperData $helperData, 
        array $data = []
	){
        $this->_helperData = $helperData;
        parent::__construct($context, $registry, $salesConfig, $reorderHelper, $data);
    }
	
	protected function _construct()
    {
		parent::_construct();
		if ($this->_helperData->isEnabled()){
		
			$message = __('Do you want to delete this order ?');
			$this->addButton(
				'delete_btn',
				[
					'label' 	=> __('Delete Order'),
					'class' 	=> 'go',
					'onclick'   => 'deleteConfirm(\''.$message.'\', \'' . $this->getDeleteOrderUrl() . '\')'
				]
			);
		}
	}
	
    public function getDeleteOrderUrl()
	{
        return $this->getUrl('magehit_deleteorders/order/deleteorder',['_current'=>true]);
    }	
}