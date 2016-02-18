<?php
/**
 * Magento only
 *
 * If products don't shows up after import. Check catalog_product_entity table first of all.
 * If there are some products, but they don't shows up You use that script.
 * It set up visibility to appropriate once.
*/
error_reporting(E_ALL | E_STRICT);
define('MAGENTO_ROOT', getcwd());
$mageFilename = MAGENTO_ROOT . '/app/Mage.php';
require_once $mageFilename;
Mage::app();
$ids = Mage::getModel('catalog/product')->getCollection()->getAllIds();
Mage::getSingleton('catalog/product_action')->updateAttributes(
    $ids,
    array('status'=>1, 'visibility'=>4),
    0
);