<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2011 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)


 * NeoTheme Austrlia (Neo Industries Pty Ltd)
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to Neo Industries Pty LTD Non-Distributable Software Modification License (NDSML)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.neotheme.com/legal/licenses/NDSM.html
 * If the license is not included with the package or for any other reason, 
 * you did not receive your licence please send an email to 
 * license@neotheme.com so we can send you a copy immediately.
 *
 * This software comes with no warrenty of any kind. By Using this software, the user agrees to hold 
 * Neo Industries Pty Ltd harmless of any damage it may cause.
 *
 * @category    modules
 * @module      NeoTheme_ImageRotator
 * @copyright   Copyright (c) 2011 Neo Industries Pty Ltd (http://www.neotheme.com)
 * @license     http://www.neotheme.com/  Non-Distributable Software Modification License(NDSML 1.0)
 */
class NeoTheme_ImageRotator_Block_Adminhtml_Imagerotator_Widget_Chooser
extends Mage_Adminhtml_Block_Widget_Grid {
    protected $_selectedRotators = array();

    /**
     * Block construction, prepare grid params
     *
     * @param array $arguments Object data
     */
    public function __construct($arguments=array())
    {
        parent::__construct($arguments);
        $this->setDefaultSort('entity_id');
        $this->setUseAjax(true);
    }

    /**
     * Prepare chooser element HTML
     *
     * @param Varien_Data_Form_Element_Abstract $element Form Element
     * @return Varien_Data_Form_Element_Abstract
     */
    public function prepareElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $uniqId = Mage::helper('core')->uniqHash($element->getId());
        $sourceUrl = $this->getUrl('*/neotheme_banner_widget/chooser', array(
            'uniq_id' => $uniqId,
            'use_massaction' => false,
        ));

        $chooser = $this->getLayout()->createBlock('widget/adminhtml_widget_chooser')
            ->setElement($element)
            ->setTranslationHelper($this->getTranslationHelper())
            ->setConfig($this->getConfig())
            ->setFieldsetId($this->getFieldsetId())
            ->setSourceUrl($sourceUrl)
            ->setUniqId($uniqId);

        if ($element->getValue()) {
            //$value = explode('/', $element->getValue());
            $rotatorId = $element->getValue();
            //if (isset($value[0]) && isset($value[1]) && $value[0] == 'rotator') {
            //    $rotatorId = $value[1];
            //}
            $label = '';
            /*
            $categoryId = isset($value[2]) ? $value[2] : false;
            
            if ($categoryId) {
                $label = Mage::getResourceSingleton('catalog/category')
                    ->getAttributeRawValue($categoryId, 'name', Mage::app()->getStore()) . '/';
            }*/
            if (intval($rotatorId) > 0) {
                $label .= Mage::getResourceSingleton('imagerotator/imagerotator')
                    ->getAttributeRawValue($rotatorId, 'name', Mage::app()->getStore());
            }
            $chooser->setLabel($label);
        }

        $element->setData('after_element_html', $chooser->toHtml());
        return $element;
    }

    /**
     * Checkbox Check JS Callback
     *
     * @return string
     */
    public function getCheckboxCheckCallback()
    {
        if ($this->getUseMassaction()) {
            return "function (grid, event) {
                $(grid.containerId).fire('imagerotator:changed', {});
            }";
        }
    }

    /**
     * Grid Row JS Callback
     *
     * @return string
     */
    public function getRowClickCallback()
    {
        if (!$this->getUseMassaction()) {
            $chooserJsObject = $this->getId();
            return '
                function (grid, event) {
                    var trElement = Event.findElement(event, "tr");
                    var rotatorId = trElement.down("td").innerHTML;
                    var rotatorName = trElement.down("td").next().innerHTML;
                    var optionLabel = rotatorName;
                    var optionValue = "" + rotatorId.replace(/^\s+|\s+$/g,"");
                    //alert(optionValue);
                    '.$chooserJsObject.'.setElementValue(optionValue);
                    '.$chooserJsObject.'.setElementLabel(optionLabel);
                    '.$chooserJsObject.'.close();
                }
            ';
        }
    }

    /**
     * Category Tree node onClick listener js function
     *
     * @return string
     */
   /* public function getCategoryClickListenerJs()
    {
        $js = '
            function (node, e) {
                {jsObject}.addVarToUrl("category_id", node.attributes.id);
                {jsObject}.reload({jsObject}.url);
                {jsObject}.categoryId = node.attributes.id != "none" ? node.attributes.id : false;
                {jsObject}.categoryName = node.attributes.id != "none" ? node.text : false;
            }
        ';
        $js = str_replace('{jsObject}', $this->getJsObjectName(), $js);
        return $js;
    }*/

    /**
     * Filter checked/unchecked rows in grid
     *
     * @param Mage_Adminhtml_Block_Widget_Grid_Column $column
     * @return Mage_Adminhtml_Block_Catalog_Product_Widget_Chooser
     */
    /*protected function _addColumnFilterToCollection($column)
    {
        if ($column->getId() == 'in_products') {
            $selected = $this->getSelectedProducts();
            if ($column->getFilter()->getValue()) {
                $this->getCollection()->addFieldToFilter('entity_id', array('in'=>$selected));
            } else {
                $this->getCollection()->addFieldToFilter('entity_id', array('nin'=>$selected));
            }
        } else {
            parent::_addColumnFilterToCollection($column);
        }
        return $this;
    }*/

    /**
     * Prepare products collection, defined collection filters (category, product type)
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('imagerotator/imagerotator_collection')
                        ->addAttributeToSelect('name')
                        ->addAttributeToSelect('status');



        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Prepare columns for products grid
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
   protected function _prepareColumns()
    {
        if ($this->getUseMassaction()) {
            $this->addColumn('in_rotators', array(
                'header_css_class' => 'a-center',
                'type'      => 'checkbox',
                'name'      => 'in_rotators',
                'inline_css' => 'checkbox entities',
                'field_name' => 'in_rotators',
                'values'    => $this->getSelectedRotators(),
                'align'     => 'center',
                'index'     => 'entity_id',
                'use_index' => true,
            ));
        }


        $this->addColumn('entity_id', array(
            'header'    => Mage::helper('imagerotator')->__('ID'),
            'sortable'  => true,
            'width'     => '60px',
            'index'     => 'entity_id'
        ));
        $this->addColumn('chooser_name', array(
            'header'    => Mage::helper('imagerotator')->__('Banner Position Name'),
            'name'      => 'chooser_name',
            'index'     => 'name'
        ));
        $this->addColumn('chooser_status', array(
             'header'    => Mage::helper('imagerotator')->__('Status'),
             'align'     => 'left',
             'index'     => 'status',
             'type'      => 'options',
             'name'      => 'chooser_name',
             'options'   => Mage::getModel('imagerotator/attribute_source_status')->toOptionArray()
        ));
        return parent::_prepareColumns();
    }



    /**
     * Setter
     *
     * @param array $selectedProducts
     * @return Mage_Adminhtml_Block_Catalog_Product_Widget_Chooser
     */
    public function setSelectedRotators($selectedRotators)
    {
        $this->_selectedRotators = $selectedRotators;
        return $this;
    }

    /**
     * Getter
     *
     * @return array
     */
    public function getSelectedRotators()
    {
        if ($selectedRotators = $this->getRequest()->getParam('selected_rotators', null)) {
            $this->setSelectedRotators($selectedRotators);
        }
        return $this->_selectedProducts;
    }


}