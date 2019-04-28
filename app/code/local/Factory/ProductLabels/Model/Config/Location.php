<?php

class Factory_ProductLabels_Model_Config_Location
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'top-left', 'label'=>Mage::helper('productlabels')->__('Top-left')),
            array('value' => 'top-right', 'label'=>Mage::helper('productlabels')->__('Top-right')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'top-left' => Mage::helper('productlabels')->__('Top-left'),
            'top-right' => Mage::helper('productlabels')->__('Top-right'),
        );
    }
}