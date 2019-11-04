<?php

class stok extends controller {

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
    
    function hizmet_urun_detay() {
              //  $this->cache->start();         
        $data["lang"] = ayhan::$dil;
        
        if($this->val->kayit=="ok"){
            
            $data["mesaj"] = "Kayıt İşlemi Başarılı";
            
        }
        else if($this->val->kayit=="guncelleme"){
           $data["mesaj"] = "Güncelleme İşlemi Başarılı"; 
        }
        else{
            
            $data["mesaj"] = "";
            
        } 
        $data["id"] = $this->val->id;
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/hizmet_urun_detay", $data);
        $this->View("muhasebe/stok/footer");   
             
    }
    
    function hizmet_urun_kopya(){
        
        $data["lang"] = ayhan::$dil;
        $data["id"] = $this->val->id;
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/hizmet_urun_kopya", $data);
        $this->View("muhasebe/stok/footer");    
        
    }
    function hizmet_urun_guncelle(){
        
        $data["lang"] = ayhan::$dil;
        $data["id"] = $this->val->id;
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/hizmet_urun_guncelle", $data);
        $this->View("muhasebe/stok/footer");    
        
    }
    function hizmet_urun(){
        
        
        //  $this->cache->start();         
        $data["lang"] = ayhan::$dil;
        
        if(isset($this->val->kayit)=="ok"){
            
            $data["mesaj"] = "Kayıt İşlemi Başarılı";
            
        }
        else{
            
            $data["mesaj"] = "";
            
        }
                
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/hizmet_urun", $data);
        $this->View("muhasebe/stok/footer");   
         
        // \controller_help::controller->deneme();
    }
    function hizmeturunekle(){
        
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/hizmet_urun_ekle",$data);
        $this->View("muhasebe/stok/footer");  
    } 
    
    
    function irsaliye(){
        //  $this->cache->start();         
        $data["lang"] = ayhan::$dil;
        
        if($this->val->kayit=="ok"){
            
            $data["mesaj"] = "Kayıt İşlemi Başarılı";
            
        }
        else{
            
            $data["mesaj"] = "";
            
        }
                
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/irsaliye", $data);
        $this->View("muhasebe/stok/footer");  
        
        
    }
    function yeni_giden_irsaliye_ekle(){
        
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/yeni_giden_irsaliye",$data);
        $this->View("muhasebe/stok/footer");  
    } 
    
    
    
    // FİYAT LİSTESİ
    
    
    function fiyat_listesi(){
        
        
        //  $this->cache->start();         
        $data["lang"] = ayhan::$dil;
        
        if($this->val->kayit=="ok"){
            
            $data["mesaj"] = "Kayıt İşlemi Başarılı";
            
        }
        else{
            
            $data["mesaj"] = "";
            
        }
                
        $data["cls"] = $this->Model("genel/anasayfa");
            
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/fiyat_listesi", $data);
        $this->View("muhasebe/stok/footer");   
         
        // \controller_help::controller->deneme();
    }
    
    function flekle(){
        
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/fiyat_listesi_ekle",$data);
        $this->View("muhasebe/stok/footer");  
    } 
    
    
    function fiyat_listesi_detay() {
              //  $this->cache->start();         
        $data["lang"] = ayhan::$dil;
        if(isset($this->val->kayit)):
            if($this->val->kayit=="ok"){
                $data["mesaj"] = "Kayıt İşlemi Başarılı";
            }
            else if($this->val->kayit=="guncelleme"){
               $data["mesaj"] = "Güncelleme İşlemi Başarılı"; 
            }
            else if($this->val->kayit=="kopya"){
                $data["mesaj"] = "Yeni Kopya Oluşturuldu";
            }
            else{
                $data["mesaj"] = "";
            } 
        endif;
        
        $data["id"] = $this->val->id;
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/fiyat_listesi_detay", $data);
        $this->View("muhasebe/stok/footer");   
             
    }
    
    function fl_guncelle(){
        
        $data["lang"] = ayhan::$dil;
        $data["id"] = $this->val->id;
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/fl_guncelle", $data);
        $this->View("muhasebe/stok/footer");    
        
    }
    
    function fl_kopya(){
                
        //$data["lang"] = ayhan::$dil;
        $data["id"] = $this->val->id;
        $data["cls"] = $this->Model("genel/anasayfa");
        $this->View("muhasebe/stok/head",$data);
        $this->View("muhasebe/stok/fl_kopya", $data);
        $this->View("muhasebe/stok/footer");   
        
        
        
    }
}