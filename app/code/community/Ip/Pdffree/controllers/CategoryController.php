<?php
/*
 *  Created on April 4, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - ecommerceoffice.com
 *  Copyright Proskuryakov Ivan. ecommerceoffice.com © 2011. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Ip_Pdffree_CategoryController extends Mage_Core_Controller_Front_Action { 


//$query='?'.http_build_query($this->getRequest()->getQuery());
//var_dump($query);
    
    
    protected function _initCatagory()
    {
        Mage::dispatchEvent('catalog_controller_category_init_before', array('controller_action' => $this));
        $categoryId = (int) $this->getRequest()->getParam('id', false);
        if (!$categoryId) {
            return false;
        }

        $category = Mage::getModel('catalog/category')
            ->setStoreId(Mage::app()->getStore()->getId())
            ->load($categoryId);

        if (!Mage::helper('catalog/category')->canShow($category)) {
            return false;
        }
        Mage::getSingleton('catalog/session')->setLastVisitedCategoryId($category->getId());
        Mage::register('current_category', $category);
        try {
            Mage::dispatchEvent(
                'catalog_controller_category_init_after',
                array(
                    'category' => $category,
                    'controller_action' => $this
                )
            );
        } catch (Mage_Core_Exception $e) {
            Mage::logException($e);
            return false;
        }
        
        $design = Mage::getSingleton('catalog/design');
        $settings = $design->getDesignSettings($category);

        $update = $this->getLayout()->getUpdate();
        $update->addHandle('default');


        $this->addActionLayoutHandles();
        $update->addHandle('catalog_category_layered_pdf');
        $update->addHandle('CATEGORY_' . $category->getId());
        $this->loadLayoutUpdates();     

        $this->generateLayoutXml()->generateLayoutBlocks(); 

        return $category;
    }
    
    public function viewAction()
    {
        if ($category = $this->_initCatagory()) {

            $root = $this->getLayout()->getBlock('root');
            echo Mage::helper('pdffree/print')->HtmlRender($root);
            exit();

        } elseif (!$this->getResponse()->isRedirect()) {
            $this->_forward('noRoute');
        }
    }
    
    public function printAction()
    {
        if ($category = $this->_initCatagory()) {

            $root = $this->getLayout()->getBlock('root');
            $html =  $root->toHtml();
            Mage::helper('pdffree/print')->PDFFrontendStreamToBrowser($html,$category->getUrl_key());
        } elseif (!$this->getResponse()->isRedirect()) {
            $this->_forward('noRoute');
        }
    }
    
    public function saveAction()
    {
        if ($category = $this->_initCatagory()) {

            $root = $this->getLayout()->getBlock('root');
            $html =  $root->toHtml();
            
            Mage::helper('pdffree/print')->PDFFrontendSaveFile($html,$category->getUrl_key());
            $this->getResponse()->setRedirect($this->_getRefererUrl());
            return;
        }
        elseif (!$this->getResponse()->isRedirect()) {
            $this->_forward('noRoute');
        }
    }
    

}