<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
            

class stok_kayit extends controller {

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
    function fiyat_listesi(){
        
        $veri = ARRAY();
        
        $veri["ad"] = $this->val->ad;
        $veri["indirim_uygulama_turu"] =  $this->val->indirim_uygulama_turu;
         
            
         
        if($this->val->indirim_uygulama_turu == "K")
        {
            $veri["ktg_id"] = $this->val->urun_kategori_id;
            $veri["toplu_indirim"] = $this->val->toplu_indirim; 
            $veri["toplu_indirimmi"] = 1; 
        }
            if($this->val->indirim_uygulama_turu == "T")
        {
            $veri["ktg_id"] = "";
            $veri["toplu_indirim"] = $this->val->toplu_indirim; 
            $veri["toplu_indirimmi"] = 1; 
        }
        
        if(isset($this->val->toplu_indirimmi) && $this->val->indirim_uygulama_turu == "S"){
            $veri["ktg_id"] = "";
            $veri["toplu_indirim"] = $this->val->toplu_indirim; 
            $veri["toplu_indirimmi"] = 1; 
        
            
        }
       else if($this->val->indirim_uygulama_turu=="S"){ 
            $veri["secili_urunler"] = 1;
        }
         $cls = $this->Model("stok/anasayfa");
         $id = $cls->kaydet("fl",$veri);
               if($id){
                   //kayıt başarılı
                   
                    if($this->val->indirim_uygulama_turu=="S" && $this->val->urunsatirlar >= 1){       
                         
                        
                        $urunsatirlar = $this->val->urunsatirlar;
                        
                        for ($i=1;$i<=$urunsatirlar;$i++) {
                            $xx = ARRAY();
            
                            $urun = "urun_".$i;
                            $indirim = "indirim_".$i;
                            $xx["fl_id"]  =  $id;
                            $xx["urun_id"]  = $this->val->$urun;
                            $xx["indirim"]  = $this->val->$indirim;
                            if($xx["urun_id"]){
                            $cls->kaydet("secili_urunler",$xx);
                        }
                        
                            }

                    }
                   $this->RedirectUrl("stok/fiyat_listesi_detay/id/$id/kayit/ok");
               }else{
                   // kayıt sorunu 
                } 
       

    }
    function fiyat_listesi_k(){
        
        $veri = ARRAY();
        
        $veri["ad"] = $this->val->ad;
        $veri["indirim_uygulama_turu"] =  $this->val->indirim_uygulama_turu;
         
            
         
        if($this->val->indirim_uygulama_turu == "K")
        {
            $veri["ktg_id"] = $this->val->urun_kategori_id;
            $veri["toplu_indirim"] = $this->val->toplu_indirim; 
            $veri["toplu_indirimmi"] = 1; 
        }
            if($this->val->indirim_uygulama_turu == "T")
        {
            $veri["ktg_id"] = "";
            $veri["toplu_indirim"] = $this->val->toplu_indirim; 
            $veri["toplu_indirimmi"] = 1; 
        }
        
        if(isset($this->val->toplu_indirimmi) && $this->val->indirim_uygulama_turu == "S"){
            $veri["ktg_id"] = "";
            $veri["toplu_indirim"] = $this->val->toplu_indirim; 
            $veri["toplu_indirimmi"] = 1; 
        
            
        }
       else if($this->val->indirim_uygulama_turu=="S"){ 
            $veri["secili_urunler"] = 1;
        }
         $cls = $this->Model("stok/anasayfa");
         $id = $cls->kaydet("fl",$veri);
               if($id){
                   //kayıt başarılı
                   
                    if($this->val->indirim_uygulama_turu=="S" && $this->val->urunsatirlar >= 1){       
                         
                        
                        $urunsatirlar = $this->val->urunsatirlar;
                        
                        for ($i=1;$i<=$urunsatirlar;$i++) {
                            $xx = ARRAY();
            
                            $urun = "urun_".$i;
                            $indirim = "indirim_".$i;
                            $xx["fl_id"]  =  $id;
                            $xx["urun_id"]  = $this->val->$urun;
                            $xx["indirim"]  = $this->val->$indirim;
                            if($xx["urun_id"]){
                            $cls->kaydet("secili_urunler",$xx);
                        }
                        
                            }

                    }
                   $this->RedirectUrl("stok/fiyat_listesi_detay/id/$id/kayit/kopya");
               }else{
                   // kayıt sorunu 
                } 
       

    }

    function fiyat_listesi_g(){
        $cls = $this->Model("genel/anasayfa");
       
       $id = $this->val->id;
        // önce burada urunler silinecek
       
       
            
        if($id){
       
            
        $cls->seciliurunlerisil($id);
            
        $veri["ad"] = $this->val->ad;
        $veri["indirim_uygulama_turu"] =  $this->val->indirim_uygulama_turu;
         
            
         
        if($this->val->indirim_uygulama_turu == "K")
        {
            $veri["ktg_id"] = $this->val->urun_kategori_id;
            $veri["toplu_indirim"] = $this->val->toplu_indirim; 
            $veri["toplu_indirimmi"] = 1; 
        }
            if($this->val->indirim_uygulama_turu == "T")
        {
            $veri["ktg_id"] = "";
            $veri["toplu_indirim"] = $this->val->toplu_indirim; 
            $veri["toplu_indirimmi"] = 1; 
        }
        
        if(isset($this->val->toplu_indirimmi) && $this->val->indirim_uygulama_turu == "S"){
            $veri["ktg_id"] = "";
            $veri["toplu_indirim"] = $this->val->toplu_indirim; 
            $veri["toplu_indirimmi"] = 1; 
        
            
        }
       else if($this->val->indirim_uygulama_turu=="S"){ 
            $veri["secili_urunler"] = 1;
        }
        
       $cls->fl_update($veri,$id);

                    if($this->val->indirim_uygulama_turu=="S" && $this->val->urunsatirlar >= 1){       
                    $urunsatirlar = $this->val->urunsatirlar;
                    
                        for ($i=1;$i <= $urunsatirlar;$i++) {
                            $xx = ARRAY();
            
                            $urun = "urun_".$i;
                            $indirim = "indirim_".$i;
                            $xx["fl_id"]  =  $id;
                            $xx["urun_id"]  = $this->val->$urun;
            
                          if(!isset($this->val->toplu_indirimmi)){
                              $xx["indirim"]  = $this->val->$indirim;
                              }
                            if($xx["urun_id"]){
                                
            
            
                             $cls->kaydet("secili_urunler",$xx);
                        }
                        
                            }
            
                    }
            
                    $this->RedirectUrl("stok/fiyat_listesi_detay/id/$id/kayit/guncelleme");
            
                    
               }else{
                   // kayıt sorunu 
                 $this->RedirectUrl("stok/fiyat_listesi_detay/id/$id/kayit/hata");
                } 
       

    }

    
    
    


    
    function hizmet_urun_g(){
        
           //  $this->cache->start();         
        $data["lang"] = ayhan::$dil;
        if ( isset( $_FILES["urun_resmi"] )){
        try {
            $upload = $this->help("upload");
                
            //var_dump($dosya->yukle($ek,"deneme\\"));
            // upload sinifi yuklenir
            // upload sinifi yukle fonksiyonu ilk parametre yuklenecek dosyanin file name ismi, 
            // 2 nci parametre ise yuklenecek  klosor ismidir
            $file = $upload->yukle("urun_resmi","urunler/");
            $image =  URL."upload/".$file;
            //$thump = str_replace("big","thumb", $file);
            // $upload->load(UPLOAD.$file)->adaptive_resize(160,120)->save(UPLOAD.$thump);                       
            $upload->load(UPLOAD.$file)->fit_to_height(900)->save(UPLOAD.$file);                    
            //$upload->load(UPLOAD.$file)->text($_SERVER["HTTP_HOST"],UPLOAD.'arial.ttf', 20, '#848484', 'center', 0, 20)->save(UPLOAD.$file);
            // $sonuc =  $sql::newilanresimkaydet($image);
            //$rad = $_FILES['file_data']['name'];
            //echo '{"id":"'.$sonuc.'","ad":"'.$rad.'"}';
            }           
            catch (Exception $e) {
                 $hata = $e->getMessage() ;
            } 
        } 
        
       
    	$veri["ad"] = $this->val->ad;
	$veri["stok_kodu"] = $this->val->sk;
	$veri["barkot_kodu"] = $this->val->bk;
        if(!isset($hata) && isset($image)){$veri["urun_resmi"] = $image;}
	$veri["urun_kategori_id"] = $this->val->urun_kategori_id;
	$veri["alis_satis_birimi"] = $this->val->alis_satis_birimi;
	
		if($this->val->takip=="no") {
			$veri["stok_takibi"] = 0;
		}
		if(!$this->val->stok_uyarisi){
			$veri["stok_uyarisi"] = 0;
		}
	
        $veri["stok_miktar"] = $this->val->stok_miktar;
	$veri["stok_seviyesi"] = $this->val->stok_seviyesi;
	$veri["v_h_a_f"] = $this->val->alisfiyati;
	$veri["v_h_a_f_kur"] = $this->val->alisfiyatkur;
	$veri["v_h_s_f"] = $this->val->satisfiyati;
	$veri["v_h_s_f_kur"] = $this->val->satisfiyatkur;
	$veri["kdv"] = $this->val->kdv;
	$veri["oiv"] = $this->val->oilval;
	$veri["alis_otv"] = $this->val->aotvval;
	$veri["alis_otv_deger"] = $this->val->aotvdurum;
	$veri["satis_otv"] = $this->val->sotvval;
	$veri["satis_otv_deger"] = $this->val->sotvdurum;
	$veri["v_d_a_f"] = $this->val->vdalisfiyati;
	$veri["v_d_s_f"] = $this->val->vdsatisfiyati;
    
        //var_dump($veri);exit;
            
    $id = $this->Model("stok/anasayfa")->guncelle("urun_hizmet",$this->val->id,$veri);
    if($id>=1){
        // Kayıt Başarılı 
        // hizmet ve urun ana sayfaya yonlendir kayıt eklendi bilgisi ver
        $this->RedirectUrl("stok/hizmet_urun_detay/id/$id/kayit/guncelleme");
    }
    else {
        // başarısız ise belirt
        $this->RedirectUrl("stok/hizmeturunekle/kayit/hata");
    }
    
            
        
    }
    
    
    function hizmet_urun_k(){
        
           //  $this->cache->start();         
        $data["lang"] = ayhan::$dil;
        if ( isset( $_FILES["urun_resmi"] )){
        try {
            $upload = $this->help("upload");
                
            //var_dump($dosya->yukle($ek,"deneme\\"));
            // upload sinifi yuklenir
            // upload sinifi yukle fonksiyonu ilk parametre yuklenecek dosyanin file name ismi, 
            // 2 nci parametre ise yuklenecek  klosor ismidir
            $file = $upload->yukle("urun_resmi","urunler/");
            $image =  URL."upload/".$file;
            //$thump = str_replace("big","thumb", $file);
            // $upload->load(UPLOAD.$file)->adaptive_resize(160,120)->save(UPLOAD.$thump);                       
            $upload->load(UPLOAD.$file)->fit_to_height(900)->save(UPLOAD.$file);                    
            //$upload->load(UPLOAD.$file)->text($_SERVER["HTTP_HOST"],UPLOAD.'arial.ttf', 20, '#848484', 'center', 0, 20)->save(UPLOAD.$file);
            // $sonuc =  $sql::newilanresimkaydet($image);
            //$rad = $_FILES['file_data']['name'];
            //echo '{"id":"'.$sonuc.'","ad":"'.$rad.'"}';
            }           
            catch (Exception $e) {
                 $hata = $e->getMessage() ;
            } 
        } 
            
        
       
    	$veri["ad"] = $this->val->ad;
	$veri["stok_kodu"] = $this->val->sk;
	$veri["barkot_kodu"] = $this->val->bk;
        if(!isset($hata) && isset($image)){$veri["urun_resmi"] = $image;}else{$veri["urun_resmi"] = $this->val->resim_ ;}
	$veri["urun_kategori_id"] = $this->val->urun_kategori_id;
	$veri["alis_satis_birimi"] = $this->val->alis_satis_birimi;
	
		if($this->val->takip=="no") {
			$veri["stok_takibi"] = 0;
		}
		if(!$this->val->stok_uyarisi){
			$veri["stok_uyarisi"] = 0;
		}
	
        $veri["stok_miktar"] = $this->val->stok_miktar;
	$veri["stok_seviyesi"] = $this->val->stok_seviyesi;
	$veri["v_h_a_f"] = $this->val->alisfiyati;
	$veri["v_h_a_f_kur"] = $this->val->alisfiyatkur;
	$veri["v_h_s_f"] = $this->val->satisfiyati;
	$veri["v_h_s_f_kur"] = $this->val->satisfiyatkur;
	$veri["kdv"] = $this->val->kdv;
	$veri["oiv"] = $this->val->oilval;
	$veri["alis_otv"] = $this->val->aotvval;
	$veri["alis_otv_deger"] = $this->val->aotvdurum;
	$veri["satis_otv"] = $this->val->sotvval;
	$veri["satis_otv_deger"] = $this->val->sotvdurum;
	$veri["v_d_a_f"] = $this->val->vdalisfiyati;
	$veri["v_d_s_f"] = $this->val->vdsatisfiyati;
    
            
        $data["cls"] = $this->Model("stok/anasayfa");
        $id = $data["cls"]->kaydet("urun_hizmet",$veri);
        if($id>=1){
            // Kayıt Başarılı 
            // hizmet ve urun ana sayfaya yonlendir kayıt eklendi bilgisi ver
            $this->RedirectUrl("stok/hizmet_urun_detay/id/$id/kayit/ok");
        }
        else {
            // başarısız ise belirt
            $this->RedirectUrl("stok/hizmeturunekle/kayit/hata");
        }

            
        
    }
        function hizmet_urun(){
                //  $this->cache->start();         
               $data["lang"] = ayhan::$dil;
            try {
                $upload = $this->help("upload");

                //var_dump($dosya->yukle($ek,"deneme\\"));
                // upload sinifi yuklenir
                // upload sinifi yukle fonksiyonu ilk parametre yuklenecek dosyanin file name ismi, 
                // 2 nci parametre ise yuklenecek  klosor ismidir
                $file = $upload->yukle("urun_resmi","urunler/");
                $image =  URL."upload/".$file;
                //$thump = str_replace("big","thumb", $file);
                // $upload->load(UPLOAD.$file)->adaptive_resize(160,120)->save(UPLOAD.$thump);                       
                $upload->load(UPLOAD.$file)->fit_to_height(900)->save(UPLOAD.$file);                    
                //$upload->load(UPLOAD.$file)->text($_SERVER["HTTP_HOST"],UPLOAD.'arial.ttf', 20, '#848484', 'center', 0, 20)->save(UPLOAD.$file);
                // $sonuc =  $sql::newilanresimkaydet($image);
                //$rad = $_FILES['file_data']['name'];
                //echo '{"id":"'.$sonuc.'","ad":"'.$rad.'"}';
                }           
                catch (Exception $e) {
                     $hata = $e->getMessage() ;
            } 
        
        
       
    	$veri["ad"] = $this->val->ad;
	$veri["stok_kodu"] = $this->val->sk;
	$veri["barkot_kodu"] = $this->val->bk;
        if(!isset($hata)){$veri["urun_resmi"] = $image;} else{$veri["urun_resmi"] = URL."upload/nothumb.png";}
	$veri["urun_kategori_id"] = $this->val->urun_kategori_id;
	$veri["alis_satis_birimi"] = $this->val->alis_satis_birimi;
	
		if($this->val->takip=="no") {
			$veri["stok_takibi"] = 0;
		}
		if(!$this->val->stok_uyarisi){
			$veri["stok_uyarisi"] = 0;
		}
	
        $veri["stok_miktar"] = $this->val->stok_miktar;
	$veri["stok_seviyesi"] = $this->val->stok_seviyesi;
	$veri["v_h_a_f"] = $this->val->alisfiyati;
	$veri["v_h_a_f_kur"] = $this->val->alisfiyatkur;
	$veri["v_h_s_f"] = $this->val->satisfiyati;
	$veri["v_h_s_f_kur"] = $this->val->satisfiyatkur;
	$veri["kdv"] = $this->val->kdv;
	$veri["oiv"] = $this->val->oilval;
	$veri["alis_otv"] = $this->val->aotvval;
	$veri["alis_otv_deger"] = $this->val->aotvdurum;
	$veri["satis_otv"] = $this->val->sotvval;
	$veri["satis_otv_deger"] = $this->val->sotvdurum;
	$veri["v_d_a_f"] = $this->val->vdalisfiyati;
	$veri["v_d_s_f"] = $this->val->vdsatisfiyati;

            //var_dump($veri);exit;
        $data["cls"] = $this->Model("stok/anasayfa");
        $id = $data["cls"]->kaydet("urun_hizmet",$veri);
        if($id>=1){
            // Kayıt Başarılı 
            // hizmet ve urun ana sayfaya yonlendir kayıt eklendi bilgisi ver
            $this->RedirectUrl("stok/hizmet_urun_detay/id/$id/kayit/ok");
        }
        else {
            // başarısız ise belirt
            $this->RedirectUrl("stok/hizmeturunekle/kayit/hata");
        }

    
            
    }
    
}
