<?php 
//use controller\load as core;

class index extends controller {

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
    
    function temaanasayfa(){
        return $this->help("tema")->anasayfa();
        
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
            
    
           
            
            
            
    function index(){
    //  $this->cache->start();         
        $data["lang"] = ayhan::$dil;
        
            
    // $data["cls"] = $this->Model("genel/anasayfa");
   
        $this->View("muhasebe/head",$data);
         $this->View("muhasebe/home", $data);
        $this->View("muhasebe/footer");   
         
        // \controller_help::controller->deneme();
     }
            
    
    
    function home(){
         $this->cache->start();
        $data["lang"] = ayhan::$dil;
       
        $data["cls"] = $this->Model("genel/anasayfa");
        
        $data["api"] = $this->api("genel/panasayfa");
        
            
        
        $this->View("new/index/head",$data);
        $this->View("new/index/".$this->temaanasayfa(), $data);
        $this->View("new/index/footer");  
  
    }
    

            
	
}


               


	