<?php
$this->FileIn('iyzipay/samples/config');
 global $iyzipayapi;
 global $sonuc ;
 $i = 0;
 
     $x = rand(1111, 999999);

 
 
# create request class
$request = new \Iyzipay\Request\CreateApprovalRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($x);
$request->setPaymentTransactionId($iyzipayapi->setPaymentTransactionId);

# make request
$approval = \Iyzipay\Model\Approval::create($request, Config::options());

# print result

  # print result

 
        if($approval->getStatus()=="success"){

           $sonuc->ok = 1;
        
        } else {
            
             $sonuc->error = $approval->getErrorMessage();
        }
        
  
  
