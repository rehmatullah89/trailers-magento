<?php
/*
 *  Created on April 4, 2012
 *  Author Ivan Proskuryakov - volgodark@gmail.com - ecommerceoffice.com
 *  Copyright Proskuryakov Ivan. ecommerceoffice.com © 2011. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Ip_Pdffree_ProductController extends Mage_Core_Controller_Front_Action { 


    public $ERR_NO_PRODUCT_LOADED = 1;
    public $ERR_BAD_CONTROLLER_INTERFACE = 2;    
    
    
    public function _prepareAndRender($productId)
    {
        
        $product = Mage::getModel('catalog/product')->load($productId);
        $categoryIds = $product->getCategoryIds();
        $productId = $product->getId();
        $categoryId = $categoryIds[0];


        // Prepare data
        $productHelper = Mage::helper('catalog/product');
        // Standard algorithm to prepare and rendern product view page
        $product = $productHelper->initProduct($productId);
        if (!$product) {
            throw new Mage_Core_Exception($this->__('Product is not loaded'), $this->ERR_NO_PRODUCT_LOADED);
        }
        
        $update = $this->getLayout()->getUpdate();
        $update->addHandle('default');
        $this->addActionLayoutHandles();

        $update->addHandle('PRODUCT_TYPE_' . $product->getTypeId());
        $update->addHandle('PRODUCT_' . $product->getId());
        $this->loadLayoutUpdates();

        $this->generateLayoutXml()->generateLayoutBlocks();
        
    }
    
    
    public function viewAction()
    {
        
        if ($productId = $this->getRequest()->getParam('id')) {

            
            
            // Render page
            try {
                $this->_prepareAndRender($productId);
                $root = $this->getLayout()->getBlock('root');
                echo Mage::helper('pdffree/print')->HtmlRender($root);
                exit();
                
            } catch (Exception $e) {
                if ($e->getCode() == $this->ERR_NO_PRODUCT_LOADED) {
                    if (isset($_GET['store'])  && !$this->getResponse()->isRedirect()) {
                        $this->_redirect('');
                    } elseif (!$this->getResponse()->isRedirect()) {
                        $this->_forward('noRoute');
                    }
                } else {
                    Mage::logException($e);
                    $this->_forward('noRoute');
                }
            }            
        }	        
        elseif (!$this->getResponse()->isRedirect()) {
            $this->_forward('noRoute');
        }        
    }
    
    public function printAction()
    {
        
        if ($productId = $this->getRequest()->getParam('id')) {

            try {
                $this->_prepareAndRender($productId);
                $root = $this->getLayout()->getBlock('root');
                $html =  $root->toHtml();        
               
//                echo $html;
//                exit();                
                Mage::helper('pdffree/print')->PDFFrontendStreamToBrowser($html,'product_'.Mage::getModel('catalog/product')->load($productId)->getId());
            } catch (Exception $e) {
                if ($e->getCode() == $this->ERR_NO_PRODUCT_LOADED) {
                    if (isset($_GET['store'])  && !$this->getResponse()->isRedirect()) {
                        $this->_redirect('');
                    } elseif (!$this->getResponse()->isRedirect()) {
                        $this->_forward('noRoute');
                    }
                } else {
                    Mage::logException($e);
                    $this->_forward('noRoute');
                }
            }            
        }	        
        elseif (!$this->getResponse()->isRedirect()) {
            $this->_forward('noRoute');
        }        
    }
    
    
    public function saveAction()
    {
        
        if ($productId = $this->getRequest()->getParam('id')) {

            try {
                $this->_prepareAndRender($productId);
                $root = $this->getLayout()->getBlock('root');
                $html =  $root->toHtml();        
               
//                echo $html;
//                exit();                
                Mage::helper('pdffree/print')->PDFFrontendSaveFile($html,'product_'.Mage::getModel('catalog/product')->load($productId)->getId());
                $this->getResponse()->setRedirect($this->_getRefererUrl());
                return;
                
            } catch (Exception $e) {
                if ($e->getCode() == $this->ERR_NO_PRODUCT_LOADED) {
                    if (isset($_GET['store'])  && !$this->getResponse()->isRedirect()) {
                        $this->_redirect('');
                    } elseif (!$this->getResponse()->isRedirect()) {
                        $this->_forward('noRoute');
                    }
                } else {
                    Mage::logException($e);
                    $this->_forward('noRoute');
                }
            }            
        }	        
        elseif (!$this->getResponse()->isRedirect()) {
            $this->_forward('noRoute');
        }        
    }
    

}