<?php
$this->FileIn('iyzipay/samples/config');
  global $iyzipayapi;
 $request = new \Iyzipay\Request\CreateSubMerchantRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setSubMerchantExternalId($iyzipayapi->subMerchantExternalId);
$request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::LIMITED_OR_JOINT_STOCK_COMPANY);
$request->setAddress($iyzipayapi->adres);
$request->setContactName($iyzipayapi->name);
$request->setContactSurname($iyzipayapi->surname);
$request->setTaxOffice($iyzipayapi->setTaxOffice);
$request->setTaxNumber($iyzipayapi->setTaxNumber);
$request->setLegalCompanyTitle($iyzipayapi->setLegalCompanyTitle);
$request->setEmail($iyzipayapi->email);
$request->setGsmNumber("+90".$iyzipayapi->tel);
$request->setName($iyzipayapi->setLegalCompanyTitle);
$request->setIban($iyzipayapi->iban);
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