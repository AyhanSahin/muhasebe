<?php
$this->FileIn('iyzipay/samples/config');
 global $iyzipayapi;
 global $sonuc ;
 $i = 0;
 foreach ($iyzipayapi->setPaymentTransactionId as $value) {
     $x = rand(1111, 999999);

 
 
# create request class
$request = new \Iyzipay\Request\CreateApprovalRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($x);
$request->setPaymentTransactionId($value->paymentTransactionId);

# make request
$approval = \Iyzipay\Model\Approval::create($request, Config::options());

# print result

  # print result

    $sonuc[$i]["id"] = $value->id;
    $sonuc[$i]["saticikomisyonfiyat"] = $value->saticikomisyonfiyat;
        if($approval->getStatus()=="success"){

           $sonuc[$i]["ok"] = 1;
        
        } else {
            $sonuc[$i]["ok"] = 2;
             $sonuc[$i]["error"] = $approval->getErrorMessage();
        }
        
     $i++;   
  
  }