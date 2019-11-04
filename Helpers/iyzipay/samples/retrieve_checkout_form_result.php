<?php
$this->FileIn('iyzipay/samples/config');
    if($this->val->mpid){$scid = $this->val->mpid;}
    else{$scid = $this->val->ilan_id;}
    # create request class
    $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId($this->val->mpid);
    $request->setToken($_POST["token"]);
    global $checkoutForm;
    # make request
    $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, Config::options());

    # print result

 

