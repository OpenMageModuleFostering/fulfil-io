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
 * @category   Mage
 * @package    Mage_Catalog
 * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Catalog Product tier price api
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Fulfil_Erpconnector_Model_Ffcatalog_Product_Tierprice extends Mage_Catalog_Model_Api_Resource {
    const ATTRIBUTE_CODE = 'tier_price';


    public function items($productIds=null) {
        if (is_array($productIds)) {
            $result = array ();
            foreach ($productIds as $productId) {
                $product = Mage :: getModel('catalog/product')->load($productId);
                if (!$product->getId()) {
                    $this->_fault('product_not_exists');
                }
                $tierPrices = $product->getData(self :: ATTRIBUTE_CODE);
                $result[$productId] = $tierPrices;
                    }
        }
        return $result;

    }

    public function items2($productIds=null) {
                $product = Mage :: getModel('catalog/product_attribute_backend_tierprice')->_get_set_go();
                if (!$product->getId()) {
                    $this->_fault('product_not_exists');
                }

                $tierPrices = $product->getPriceModel()->getTierPriceCount();
                return 'hello';
                $result[$productIds] = $tierPrices;


        return $result;


    }

}