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
$request->setPrice($iyzipayapi->fiyat);
$request->setPaidPrice($iyzipayapi->fiyat);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setBasketId($iyzipayapi->mp_id);
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
$request->setCallbackUrl($iyzipayapi->calbackuri);
$request->setEnabledInstallments(array(2, 3, 6, 9));

$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId($iyzipayapi->mp_id);
$buyer->setName($iyzipayapi->name);
$buyer->setSurname($iyzipayapi->surname);
$buyer->setGsmNumber($iyzipayapi->tel);
$buyer->setEmail($iyzipayapi->email);
$buyer->setIdentityNumber($tc);
$buyer->setLastLoginDate(date("Y-m-d h:i:s"));
$buyer->setRegistrationDate(date("Y-m-d h:i:s"));
$buyer->setRegistrationAddress($iyzipayapi->adres);
$buyer->setIp($_SERVER["REMOTE_ADDR"]);
$buyer->setCity($iyzipayapi->il);
$buyer->setCountry("Turkey");
$buyer->setZipCode("34732");
$request->setBuyer($buyer);

$shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName($iyzipayapi->name." ".$iyzipayapi->surname);
$shippingAddress->setCity($iyzipayapi->il);
$shippingAddress->setCountry("Turkey");
$shippingAddress->setAddress($iyzipayapi->adres);
$shippingAddress->setZipCode("34742");
$request->setShippingAddress($shippingAddress);

$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName($iyzipayapi->name." ".$iyzipayapi->surname);
$billingAddress->setCity($iyzipayapi->il);
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress($iyzipayapi->adres);
$billingAddress->setZipCode("34742");
$request->setBillingAddress($billingAddress);

$basketItems = array();
$firstBasketItem = new \Iyzipay\Model\BasketItem();
$firstBasketItem->setId($iyzipayapi->mp_id);
$firstBasketItem->setName($iyzipayapi->urun);
$firstBasketItem->setCategory1("PAKET");
$firstBasketItem->setCategory2("");
$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$firstBasketItem->setPrice($iyzipayapi->fiyat);
$firstBasketItem->setSubMerchantKey($iyzipayapi->setSubMerchantKey);
$firstBasketItem->setSubMerchantPrice($iyzipayapi->fiyat);
$basketItems[0] = $firstBasketItem;


$request->setBasketItems($basketItems);

# make request
$checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());

# print result
//print_r($checkoutFormInitialize->getStatus());
print_r($checkoutFormInitialize->getErrorMessage());
print_r($checkoutFormInitialize->getCheckoutFormContent());
 ?>