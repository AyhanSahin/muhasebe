<?php

require_once('config.php');
  global $iyzipayapi;
  var_dump($iyzipayapi);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
$request = new \Iyzipay\Request\CreateApmInitializeRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setSubMerchantExternalId($iyzipayapi->subMerchantExternalId);
$request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::PERSONAL);
$request->setAddress($iyzipayapi->adres);
$request->setContactName($iyzipayapi->name);
$request->setContactSurname($iyzipayapi->surname);
$request->setEmail($iyzipayapi->email);
$request->setGsmNumber("+90".$iyzipayapi->tel);
$request->setName($iyzipayapi->name);
$request->setIban($iyzipayapi->iban);
$request->setIdentityNumber($iyzipayapi->tc);
$request->setCurrency(\Iyzipay\Model\Currency::TL);

$subMerchant = \Iyzipay\Model\SubMerchant::create($request, Config::options());
 global $sonuc;
  # print result
  if($subMerchant->getStatus()=="success"){
      
     $sonuc->getSubMerchantKey = $subMerchant->getSubMerchantKey();
      
  } else {
       $sonuc->error = $subMerchant->getErrorMessage();
  }
 ?>