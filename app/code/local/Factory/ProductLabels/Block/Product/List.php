<?php

class Factory_ProductLabels_Block_Product_List extends Mage_Catalog_Block_Product_List
{
    public function test(){
        return "TEST";
    }

    public function isSale($product)
    {
        $enabled = Mage::getStoreConfig('productlabels/sale_label/enabled');
        if (!$enabled) {
            return false;
        }

        if ($product->getPrice() > $product->getFinalPrice()) {
            return true;
        }

        return false;
    }

    public function getSaleText($product)
    {
        $text = Mage::getStoreConfig('productlabels/sale_label/text');

        $showPercentage = Mage::getStoreConfig('productlabels/sale_label/show_percentage');
        if ($showPercentage) {
            $percentageValue = round((abs($product->getPrice() - $product->getFinalPrice()) / $product->getPrice()) * 100);
            $text = "-" . $percentageValue . "%";
        }

        return $text;
    }

    public function getSaleLocationClass(){
        return Mage::getStoreConfig('productlabels/sale_label/location');
    }

    public function isNew($product)
    {
        $enabled = Mage::getStoreConfig('productlabels/new_label/enabled');
        if (!$enabled) {
            return false;
        }

        $newDate = $product->getCreatedAt();
        $now = Mage::app()->getLocale()->date()->toString(Varien_Date::DATETIME_INTERNAL_FORMAT);
        $last= date('Y-m-d h:i:s', strtotime('-30 days'));

        if($newDate <= $now && $newDate>=$last) {
            return true;
        }

        return false;
    }

    public function getNewText()
    {
        return Mage::getStoreConfig('productlabels/new_label/text');
    }

    public function getNewLocationClass()
    {
        return Mage::getStoreConfig('productlabels/new_label/location');
    }
}