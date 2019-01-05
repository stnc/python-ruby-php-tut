<?php

namespace Magehit\Deleteorders\Helper;

use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
	
    const XML_PATH_MODULE_ENABLE	= 'magehit_deleteorders/general/enable';

	public function isEnabled($storeId = null)
    {
        return (int)$this->scopeConfig->getValue(
            self::XML_PATH_MODULE_ENABLE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}
