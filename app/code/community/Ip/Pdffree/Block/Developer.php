<?php

class Ip_Pdffree_Block_Developer extends Mage_Adminhtml_Block_System_Config_Form_Fieldset {
    
    protected function _prepareLayout() {
        parent::_prepareLayout();
    }
    
    public function render(Varien_Data_Form_Element_Abstract $element) {
        $content = '<p></p>';
        $content.= '<style>';
        $content.= '.developer {
                        background:#FAFAFA;
                        border: 1px solid #CCCCCC;
                        margin-bottom: 10px;
                        padding: 10px;
                        height:auto;

                    }
                    .developer h3 {
                        color: #EA7601;
                    }
                    .contact-type {
                        color: #EA7601;
                        font-weight:bold;
                    }
                    .developer img {

                        float:left;
                        height:255px;
                        width:220px;
                    }
                    .developer .info {
                        border: 1px solid #CCCCCC;
                        background:#E7EFEF;
                        padding: 5px 10px 0 5px;
                        margin-left:230px;
                        height:250px;
                    }
                    ';
        $content.= '</style>';


        $content.= '<div class="developer">';
            $content.= '<a href="http://www.magazento.com/english/magento-ext/magazento-extensions" target="_blank"><img src="'.Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN).'frontend/base/default/ip_pdffree/promo.jpg" alt="www.ecommerceoffice.com" /></a>';
            $content.= '<div class="info">';
                $content.= '<h3>PROFESSIONAL MAGENTO DEVELOPMENT</h3>';
                $content.= '<p>As a company, we provide a wide range of services related to the Website development, their design and installation as well as their configuration on Magento e-commerce platform.</p>';
                $content.= '>>>>>>> <a target="_blank" href="http://www.magazento.com/english/quote"> HIRE US / GET A QUOTE </a> <<<<<<<<br/>';
                $content.= '--------------------------------------------------------<br>';
                $content.= '<span class="contact-type">Websites:</span> <br/><a href="http://www.magazento.com/" target="_blank">www.magazento.com</a>  <br/>';
                $content.= ' <a href="http://www.ecommerceoffice.com/" target="_blank">www.ecommerceoffice.com</a>  <br/>';                
                $content.= '<span class="contact-type">E-mail:</span> <br/>service@magazento.com <br/>';
                $content.= 'service@ecommerceoffice.com <br/>';
                $content.= '<span class="contact-type">LinkedIn:</span> <br/><a href="http://www.linkedin.com/pub/ivan-proskuryakov/31/200/316" target="_blank">http://www.linkedin.com/pub/ivan-proskuryakov/31/200/316</a>  <br/>';

                $content.= '</div>';

        $content.= '</div>';

        return $content;


    }


}
