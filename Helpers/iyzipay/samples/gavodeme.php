<?php
$this->FileIn('iyzipay/samples/config');
  global $iyzipayapi;
  
 

/*
  $iyzipayapi->mp_id =  $mp_id  ;
  $iyzipayapi->kurumsal =  $kurumsal;
  $iyzipayapi->fiyat =  $paket->fiyat;
  $iyzipayapi->sipno =  $sipno;
  $iyzipayapi->il =  $class->ilismi($uye->il_id);
  $iyzipayapi->ilce = $class->ilceismi($uye->ilce_id);  
  $iyzipayapi->mahalle = $class->mahismi($uye->mah_id)->mahalle;
  $iyzipayapi->urun = $paket->paketadi;
 * 
 * 
 * 
 *   $iyzipayapi->email =  $userdetay->email;
  $iyzipayapi->name =  $userdetay->name;
  $iyzipayapi->surname =  $userdetay->surname;
  $iyzipayapi->tel =  $userdetay->mobilePhone;
  $iyzipayapi->tc =  $userdetay->tcNo;
  */
  if($iyzipayapi->tc) $tc = $iyzipayapi->tc; else $tc = "11111111111";

  
  
# create request class
$request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($iyzipayapi->sipno);
$request->setPrice($iyzipayapi->toplamfiyat);
$request->setPaidPrice($iyzipayapi->toplamfiyat);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setBasketId($iyzipayapi->mp_id);
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
$request->setCallbackUrl($iyzipayapi->calbackuri);

if($iyzipayapi->tkst){
$request->setEnabledInstallments($iyzipayapi->tkst);
} else {
 $request->setEnabledInstallments(array(2, 3, 6, 9));   
}
$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId($iyzipayapi->aliciid);
$buyer->setName($iyzipayapi->name);
$buyer->setSurname($iyzipayapi->surname);
$buyer->setGsmNumber("+90".$iyzipayapi->tel);
$buyer->setEmail($iyzipayapi->email);
$buyer->setIdentityNumber($tc);
$buyer->setLastLoginDate(date("Y-m-d h:i:s"));
$buyer->setRegistrationDate($iyzipayapi->setRegistrationDate);
$buyer->setRegistrationAddress($iyzipayapi->adres);
$buyer->setIp($_SERVER["REMOTE_ADDR"]);
$buyer->setCity($iyzipayapi->il);
$buyer->setCountry("Turkey");
$buyer->setZipCode("03780");
$request->setBuyer($buyer);

$shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName($iyzipayapi->name." ".$iyzipayapi->surname);
$shippingAddress->setCity($iyzipayapi->il);
$shippingAddress->setCountry("Turkey");
$shippingAddress->setAddress($iyzipayapi->adres);
$shippingAddress->setZipCode("");
$request->setShippingAddress($shippingAddress);

$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName($iyzipayapi->name." ".$iyzipayapi->surname);
$billingAddress->setCity($iyzipayapi->il);
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress($iyzipayapi->adres);
$billingAddress->setZipCode("");
$request->setBillingAddress($billingAddress);

$basketItems = array();



for($i=0;$i<$iyzipayapi->adet;$i++){
    
    
  //  echo $iyzipayapi->ilanx[$i]["setSubMerchantKey"];
    $firstBasketItem = "";
    $firstBasketItem = new \Iyzipay\Model\BasketItem();
    $firstBasketItem->setId($iyzipayapi->ilanx[$i]["id"]);
    $firstBasketItem->setName($iyzipayapi->ilanx[$i]["ad"]);
    $firstBasketItem->setCategory1($iyzipayapi->ilanx[$i]["k1"]);
    $firstBasketItem->setCategory2($iyzipayapi->ilanx[$i]["k2"]);
    $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
    $firstBasketItem->setPrice($iyzipayapi->ilanx[$i]["fiyat"]); 
    $firstBasketItem->setSubMerchantKey($iyzipayapi->ilanx[$i]["setSubMerchantKey"]);
    $firstBasketItem->setSubMerchantPrice($iyzipayapi->ilanx[$i]["setSubMerchantPrice"]);

    $basketItems[$i] = $firstBasketItem;
}
 
 
$request->setBasketItems($basketItems);
//var_dump($basketItems);
# make request
$checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());

# print result

 
//print_r($checkoutFormInitialize->getStatus());
print_r($checkoutFormInitialize->getErrorMessage());
print_r($checkoutFormInitialize->getCheckoutFormContent());
 ?>