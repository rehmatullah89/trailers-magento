<?php

class Ip_Pdffree_Block_Promo extends Mage_Adminhtml_Block_System_Config_Form_Fieldset {
    
    protected function _prepareLayout() {
        parent::_prepareLayout();

    }
    
    public function render(Varien_Data_Form_Element_Abstract $element) {
        $content = '<p></p>';
        $content.= '<style>';
        $content.= '.promotion {
                        background:#FAFAFA;
                        border: 1px solid #CCCCCC;
                        margin-bottom: 10px;
                        padding: 10px;
                        height:auto;

                    }
                    .promotion a {
                        font-weight:bold;
                    }
                    .promotion h3 {
                        color: #BC0000;
                        font-size: 20px;
                        margin-bottom: 30px;
                        text-transform: uppercase;
                    }
                    .contact-type {
                        color: #EA7601;
                        font-weight:bold;
                    }
                    .promotion img {
                        float:left;
                        height:255px;
                        width:360px;
                    }
                    .promotion .info {
                        border: 1px solid #CCCCCC;
                        background:#E7EFEF;
                        padding: 5px 10px 0 5px;
                        margin-left:370px;
                        height:250px;
                    }
                    ';
        $content.= '</style>';


        $content.= '<div class="promotion">';
            $content.= '<a href="http://www.magazento.com/english/magento-ext/magazento-extensions/pdf-export" target="_blank"><img src="'.Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_SKIN).'frontend/base/default/ip_pdffree/logo_pdf.jpg" alt="www.ecommerceoffice.com" /></a>';
            $content.= '<div class="info">';
                $content.= '<h3>PDF PRO - Export all products to 1 PDF file</h3>';
                $content.= '<a href="http://www.linkedin.com/pub/ivan-proskuryakov/31/200/316" target="_blank"> EXTENSION PAGE @ MAGENTOCONNECT  </a>  <br/><br/>';
                $content.= '<a href="http://www.magazento.com/english/magento-ext/magazento-extensions/pdf-export" target="_blank"> VISIT PURCHASE PAGE </a>  <br/><br/>';
                $content.= '<p>PDF EXPORT for Magento is a professional solution that lets you generate printable copy of all store products! It also lets your customers to generate PDF\'s of products and categories they view directly from your website without other 3rd party website or applications. All store products in PDF in few clicks!</p>';

                $content.= '</div>';

        $content.= '</div>';

        return $content;


    }


}
