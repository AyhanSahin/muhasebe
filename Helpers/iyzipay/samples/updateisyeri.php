<?php
$this->FileIn('iyzipay/samples/config');
 global $iyzipayapi;
 
 
 
 
if($iyzipayapi->it == 1)
{
    
     # create request class
    $request = new \Iyzipay\Request\UpdateSubMerchantRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setSubMerchantKey($iyzipayapi->setSubMerchantKey);
    $request->setIban($iyzipayapi->iban);
    $request->setAddress($iyzipayapi->adres);
    $request->setContactName($iyzipayapi->name);
    $request->setContactSurname($iyzipayapi->surname);
    $request->setEmail($iyzipayapi->email);
    $request->setName($iyzipayapi->name);
    $request->setIdentityNumber($iyzipayapi->tc);
    $request->setCurrency(\Iyzipay\Model\Currency::TL);

    # make request
    $subMerchant = \Iyzipay\Model\SubMerchant::update($request, Config::options());

  
}

elseif($iyzipayapi->it == 2)
{
    # create request class
    $request = new \Iyzipay\Request\UpdateSubMerchantRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setSubMerchantKey($iyzipayapi->setSubMerchantKey);
    $request->setAddress($iyzipayapi->adres);
    $request->setContactName($iyzipayapi->name);
    $request->setContactSurname($iyzipayapi->surname);
    $request->setTaxOffice($iyzipayapi->setTaxOffice);
    $request->setLegalCompanyTitle($iyzipayapi->setLegalCompanyTitle);
    $request->setEmail($iyzipayapi->email);
    $request->setName($iyzipayapi->setLegalCompanyTitle);
    $request->setIban($iyzipayapi->iban);
    $request->setIdentityNumber($iyzipayapi->tc);
    $request->setCurrency(\Iyzipay\Model\Currency::TL);

    # make request
    $subMerchant = \Iyzipay\Model\SubMerchant::update($request, Config::options());


}

elseif($iyzipayapi->it == 3)
{
    # create request class
    $request = new \Iyzipay\Request\UpdateSubMerchantRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setSubMerchantKey($iyzipayapi->setSubMerchantKey);
    $request->setAddress($iyzipayapi->adres);
    $request->setContactName($iyzipayapi->name);
    $request->setContactSurname($iyzipayapi->surname);
    $request->setTaxOffice($iyzipayapi->setTaxOffice);
   $request->setTaxNumber($iyzipayapi->setTaxNumber);
    $request->setLegalCompanyTitle($iyzipayapi->setLegalCompanyTitle);
    $request->setEmail($iyzipayapi->email);
    $request->setName($iyzipayapi->setLegalCompanyTitle);
    $request->setIban($iyzipayapi->iban);
    $request->setCurrency(\Iyzipay\Model\Currency::TL);

    # make request
    $subMerchant = \Iyzipay\Model\SubMerchant::update($request, Config::options());


}
else { $sonuc->error = "Sorun Oluştu. ";}




global $sonuc;
$sonuc = $subMerchant ;

if($subMerchant->getStatus()=="success"){
      
     $sonuc->getStatus = "success";
      
  } else {
       $sonuc->error = $subMerchant->getErrorMessage();
  }
  
  ?>