<?php

class satislar extends controller {

    private $run;
    public $request, $session , $cache;

    function __construct($run) {
        ayhan::language();
        global $sreq;
        
            if (empty($sreq)) {$this->request = array("1"=>"1");
        }
            else {
                $this->request = $sreq;
        }
        
        $this->session = $this->help("session");
            switch (ayhan::functionName()) {
            case "sitemaps":
            case "sitemapk":
            case "sitemapi":
                parent::__construct($run); 
                break;
            default:
                
                    $this->cache = $this->help("cache");
                    $this->cache->dakika = 2;
                    $this->session->set("mobile", $this->isMobileDevice());
                     parent::__construct($run); 
            }
  
      
        
    }
    function isMobileDevice(){
        $aMobileUA = array(
            '/iphone/i' => 'iPhone', 
            '/ipod/i' => 'iPod', 
            '/ipad/i' => 'iPad', 
            '/android/i' => 'Android', 
            '/blackberry/i' => 'BlackBerry', 
            '/webos/i' => 'Mobile'
        );

        //Return true if Mobile User Agent is detected
        foreach($aMobileUA as $sMobileKey => $sMobileOS){
            if(preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
                return true;
            }
        }
        //Otherwise return false..  
        return false;
    } 

    
}
