<?php

class Koan_Gocheckout_Model_Observer extends Varien_Object
{
    public function afterAddToCart(Varien_Event_Observer $observer) {

        $request = $observer->getEvent()->getRequest();

        if ($request->getParam('checkout')) {

            $url = Mage::getUrl('checkout/onepage');

            $observer->getEvent()->getResponse()->setRedirect($url);
            Mage::getSingleton('checkout/session')->setNoCartRedirect(true);

        }

    }

}
