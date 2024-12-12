<?php
/**
 * NeoTheme (Neo Industries Pty Ltd)
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
 * @module      NeoTheme_Blog
 * @copyright   Copyright (c) 2011 Neo Industries Pty Ltd (http://www.neotheme.com)
 * @license     http://www.neotheme.com/  Non-Distributable Software Modification License(NDSML 1.0)
 */
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
        ->newTable($this->getTable('neotheme_blog/post'))
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
        ), 'Entity Id')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
            'nullable' => false,
        ), 'Created At')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
            'nullable' => false,
        ), 'Updated At')
        ->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
            'unsigned' => true,
            'nullable' => false,
            'default' => '1',
        ), 'Defines Is Entity Active')
        ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Title')
        ->addColumn('author', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Author')
        ->addColumn('post_date', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
            'nullable' => false,
        ), 'Post Date To Display')
        ->addColumn('summary', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Post Content')
        ->addColumn('content_html', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Post Content')
        ->addColumn('meta_description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => true,
            'default' => '',
        ), 'Meta Description')
        ->addColumn('meta_title', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => true,
            'default' => '',
        ), 'Meta Title')
        ->addColumn('meta_keywords', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => true,
            'default' => '',
        ), 'Meta Keywords')
        ->addColumn('store_ids', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Store IDs')
        ->addColumn('category_ids', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Category IDs')
        ->addColumn('tag_ids', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Category IDs');
$installer->getConnection()->createTable($table);

$table = $installer->getConnection()
        ->newTable($this->getTable('neotheme_blog/category'))
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
        ), 'Entity Id')
        ->addColumn('parent_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'unsigned' => true,
            'nullable' => false,
        ), 'Parent Id')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
            'nullable' => false,
        ), 'Created At')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
            'nullable' => false,
        ), 'Updated At')
        ->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
            'unsigned' => true,
            'nullable' => false,
            'default' => '1',
        ), 'Defines Is Entity Active')
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Post Content')
        ->addColumn('summary', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Post Content')
        ->addColumn('store_ids', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Store IDs');
$installer->getConnection()->createTable($table);


$table = $installer->getConnection()
        ->newTable($this->getTable('neotheme_blog/tag'))
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
        ), 'Entity Id')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
            'nullable' => false,
        ), 'Created At')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
            'nullable' => false,
        ), 'Updated At')
        ->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
            'unsigned' => true,
            'nullable' => false,
            'default' => '1',
        ), 'Defines Is Entity Active')
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Post Content');
$installer->getConnection()->createTable($table);

$table = $installer->getConnection()
        ->newTable($this->getTable('neotheme_blog/comment'))
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
        ), 'Entity Id')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
            'nullable' => false,
        ), 'Created At')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
            'nullable' => false,
        ), 'Updated At')
        ->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
            'unsigned' => true,
            'nullable' => false,
            'default' => '1',
        ), 'Defines Is Entity Active')
        ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'unsigned' => true,
            'nullable' => false,
        ), 'Post that this comment is about')
        ->addColumn('username', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Post Content')
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Post Content')
        ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
            'nullable' => false,
            'default' => '',
        ), 'Post Content');
$installer->getConnection()->createTable($table);
$installer->endSetup();
