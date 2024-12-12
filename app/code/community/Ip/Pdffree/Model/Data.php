<?php
/*
 *  Created on April 4, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - ecommerceoffice.com
 *  Copyright Proskuryakov Ivan. ecommerceoffice.com © 2011. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php
Class Ip_Pdffree_Model_Data
{
	
    protected $_storeId = 0;
    
    public function __construct() {
        $this->_storeId = Mage::app()->getStore()->getId();
    }
    

}