<?php

$this->FileIn('iyzipay/IyzipayBootstrap');


 
IyzipayBootstrap::init();

class Config
{
     
    
    public static function options()
    {
        global $iyzipayapi;
         $options = new \Iyzipay\Options();
        $options->setApiKey($iyzipayapi->api);
        $options->setSecretKey($iyzipayapi->guvenlik);
        $options->setBaseUrl($iyzipayapi->uri);
        return $options;
      
    }
}