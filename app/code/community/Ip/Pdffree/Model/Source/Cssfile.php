<?php
/*
 *  Created on April 4, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - ecommerceoffice.com
 *  Copyright Proskuryakov Ivan. ecommerceoffice.com © 2011. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Ip_Pdffree_Model_Source_Cssfile {

    public function toOptionArray() {
        return array(
            array('value' => 'styles.css', 'label' => Mage::helper('pdffree')->__('styles.css')),
            array('value' => 'print.css', 'label' => Mage::helper('pdffree')->__('print.css')),
        );
    }

}