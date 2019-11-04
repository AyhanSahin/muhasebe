<?php
$this->FileIn('iyzipay/samples/config');
  global $iyzipayapi;
  global $donen;
  
$request = new \Iyzipay\Request\CreateRefundRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($iyzipayapi->conversationid);
$request->setPaymentTransactionId($iyzipayapi->setPaymentTransactionId);
$request->setPrice($iyzipayapi->fiyat);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setIp($_SERVER["REMOTE_ADDR"]);

$donen = \Iyzipay\Model\Refund::create($request, Config::options());

?>