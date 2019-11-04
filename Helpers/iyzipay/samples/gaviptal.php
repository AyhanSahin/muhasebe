<?php
$this->FileIn('iyzipay/samples/config');
  global $iyzipayapi;
  global $donen;
  
  
  
$request = new \Iyzipay\Request\CreateCancelRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($iyzipayapi->setPaymentId);
$request->setPaymentId($iyzipayapi->setPaymentId);
$request->setIp($_SERVER["REMOTE_ADDR"]);

# make request
$donen = \Iyzipay\Model\Cancel::create($request, Config::options());
  
  
 /* $request = new \Iyzipay\Request\CreateApprovalRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($iyzipayapi->setPaymentId);
$request->setPaymentTransactionId("1");

$donen = \Iyzipay\Model\Disapproval::create($request, Config::options());
  

$request = new \Iyzipay\Request\CreateRefundRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($iyzipayapi->setPaymentId);
$request->setPaymentTransactionId("1");
$request->setPrice($iyzipayapi->setPrice);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setIp($_SERVER["REMOTE_ADDR"]);

$donen = \Iyzipay\Model\Refund::create($request, Config::options());
 */
 ?>