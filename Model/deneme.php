<?php  
class deneme_sql extends load{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    public $ustk , $say = 0  ,$veri = ARRAY();  
    function __construct() {
        parent::__construct();
        
    }
    
    function modulname_sa($id){
         
        return
        $this->db->get_var("SELECT adi FROM modul_items_x WHERE id = $id ");  
    } 
        
    
    function ilansatissecenekleri($ilan_id){
        return
        $this->db->get_results("SELECT * FROM ilansatissecenek WHERE ilan_id = $ilan_id");
        
    }
    function ssrsil($resim){
        $data["resim"] = "";
        $this->update("ilansatissecenek", $data, "resim = '$resim'");
       
        
    }
    function insertilansatissecenek_u($ilan_id,$secenekler){
         
         
         foreach ($secenekler as $xx) {
             if($xx["id"]){
                 $ids[] = $xx["id"];
             }
         
         }
         $idler = implode(",", $ids);
         if(!$idler){
             $this->db->query("DELETE FROM ilansatissecenek WHERE ilan_id = $ilan_id "); 
         }else{
         $this->db->query("DELETE FROM ilansatissecenek WHERE ilan_id = $ilan_id and id NOT IN ($idler)");
         }
         
        foreach ($secenekler as $value) {
            
           if($value["id"]){
              $sql =  'id = ' .$value["id"] ; 
               unset($value["id"]);
               $value["ilan_id"] = $ilan_id;
               $this->update("ilansatissecenek", $value, $sql);
           }
           else {
            $value["ilan_id"] = $ilan_id;
            $this->insert("ilansatissecenek", $value);  
           }
        }
          
        
    }    
    function insertilansatissecenek($ilan_id,$secenekler){
      
        foreach ($secenekler as $value) {
            $value["ilan_id"] = $ilan_id;
            $this->insert("ilansatissecenek", $value);  
         
        }
          
        
    }
            
    
    function ilanIdResim($ilan_id){
        return
        $this->db->get_results("SELECT * FROM ilan_resim WHERE ilan_id = $ilan_id");
        
    }
    
        function ilanIdVid($ilan_id){
        return
        $this->db->get_row("SELECT * FROM ilan_video WHERE ilan_id = $ilan_id");
        
    }
    function ilan_secenek($param) {
        $i=0;
        $data = explode(',', $param);
      
        foreach ($data as $value) {
            
            $x = explode(':', $value);
           
            
            $secenekbaslik = $this->xmodul_items($x[0]);
            if($secenekbaslik->tip == 3){
                $sonucu = $this->xsecenekler($x[1])->adi; 
                
            }
            else $sonucu = $x[1];
            
            $veri[$i]["baslik"] = $secenekbaslik->adi;
            $veri[$i]["sonuc"] = $sonucu;
            $veri[$i]["tip"] = $secenekbaslik->tip;
            $veri[$i]["id"] = $secenekbaslik->id;
            $i++;
            
            
        }
      
       
        return $veri;
        
    //   return $this->db->get_results("select * from ozellikler where id IN ($param) ");
        
    }    
         function xsecenekler($modul){
        return
        $this->db->get_row("SELECT * FROM secenekler WHERE id = $modul ");  
    }
      function xmodul_items($modul){
        return
        $this->db->get_row("SELECT * FROM modul_items WHERE id = $modul ");  
    }
        function modul_items_($modul){
        return
        $this->db->get_results("SELECT * FROM modul_items WHERE modulId IN ($modul) ");  
    }
    
    function secenekler_($modul){
        return
        $this->db->get_results("SELECT * FROM secenekler WHERE itemId = $modul ");  
    }
    
      function ilangoster($param,$admin="") {
        if($admin){
            $sql = "id = $param";
        }
            elseif($_SESSION["user_id"]){
                $user_id = $_SESSION["user_id"];
             $sql = "(id = $param ) AND ((onay = 1 AND aktif = 1) OR (user_id = $user_id))";
              
                
            }
       
        else{
        
        
           $sql = "id = $param  AND onay = 1 AND aktif = 1 ";
        }
       
       
        
        return $this->db->get_row("select * from ilan where $sql order by id desc");
        /*
        $ozellik = $this->ilan_ozellik($ilan->ozellik);
        $secenek = $this->ilan_secenek($ilan->secenek);
        
        
        
        foreach ($secenek as $value) {
          
            
            echo "Baslık : " .$value['baslik']."<br>";
            echo "Sonuç : " .$value['sonuc']."<br>";
            
        }
        
    
            foreach ($ozellik as $value) {
          
            
            echo "Baslık : " .$value->ozellik_adi."<br>";
            
        }*/
  
    }
    
    function telkontrol($id){
        
        return $this->db->get_var("select mobilePhone from user where id = $id ");
        
    }
     function ilanresim($id){
         if($this->userdetay($id)->kurumsal==1){
            return
            $this->db->get_var("SELECT ilanresim FROM kurumsal where user_id = $id ");    
         }else{
            return
            $this->db->get_var("SELECT ilanresim FROM bireysel where user_id = $id ");               
         }
        
      
        
    }
    function usersifre($m,$k){
       $s =  $this->db->get_var("SELECT count(id) FROM user where email = '$m' "); 
        if($s==1){
            $data["password"] = $k;
            $this->update("user", $data, "email = $m ");
            return 1;
            
        }
        
        
    }
            function userdetay($id){
        
        return
        $this->db->get_row("SELECT * FROM user where id = $id ");  
        
    }
    
   function kargo(){
        
     return 
         $this->db->get_results("select * from kargo ");    
    }
    
        function iys(){
       return $this->db->get_var("SELECT iys FROM doping_fiyatlar WHERE id = 1");
        
        
    }
    
    function gavkomisyon(){
       return $this->db->get_var("SELECT gav_komisyon FROM doping_fiyatlar WHERE id = 1");
        
        
    }
    /// id ye gore tip degeri
    //
    function tipogren($id) {
        
        return $this->db->get_var("select tip from modul_items where id = $id ");
        
    }
    
    // ilanozellikleri tip p2 olanlar updqate işlemi
    
    function updateilanozellik($ilanid,$ozellikid,$ozellikdeger){
        foreach ($ozellikid as $value) {
            
            
            
            $data["deger"] = $ozellikdeger[$value];
           $sql = 'ilan_id = '.$ilanid.' AND ozellik_id = '.$value ;
           
          $this->update('ilan_ozellik', $data, $sql);
        } 
        
        
        
    }
    
        // ilanozellikleri tip p2 olanlar insert işlemi

    function insertilanozellik($ilanid,$ozellikid,$ozellikdeger){
       /* 
        foreach ($ozellikid as $value) {
            $data["ilan_id"] = $ilanid;
            $data["ozellik_id"] = $value;    
            $data["deger"] = $ozellikdeger[$value];
            $this->insert('ilan_ozellik', $data);
        }
        */
        
    }
    /// 
    
    
    function ihkontrol($user){
        $userveri = $this->userdetay($user);
        $kurumsal = $userveri->kurumsal;
        if($kurumsal){
           $kveri =  $this->kurumsalcek();
           if($kveri->ilankalan >= 1){
               // kurumdsal uye onaylanmısmı ?
               if($kveri->durum == 1){
                   // evet 
               return 1;
               }else {
                   // hayır
                   return 4;
           }
           }
           else {return 2;}
        }
        else{
            if($this->bireyselcek()->ilankalan >= 1){
               return 1; 
            }else {return 3;} 
            
        }
        
    }
    
            
    function userpaket(){
        return
        $this->db->get_row("SELECT * FROM userpaket WHERE id = 1");
    }
    
    
    function kurumsalcek(){
        $uid = $_SESSION["user_id"];
        return
        $this->db->get_row("SELECT * FROM kurumsal WHERE user_id = $uid");
 
    }
     function bireyselcek(){
        $uid = $_SESSION["user_id"];
        return
        $this->db->get_row("SELECT * FROM bireysel WHERE user_id = $uid");
 
    }   
    
    // İNSERT KAYIT İŞLEMLERİ
    //#########################################
    function ilankaydet($param) {
        
        
        
        
        $user_id = $param["user_id"];
        $kurumsal = $this->userdetay($user_id)->kurumsal;
        
        
        $insert_id = $this->insert("ilan", $param);
        
        // kayıt basarılımı 
        if($insert_id){

            // kurumsal mı şahsi üyemi
            if($kurumsal){
                // kurumsal
               $krmslbilgi = $this->kurumsalcek();
               
                                   
                $this->db->query("UPDATE user SET ilanadet = ilanadet + 1 WHERE id = $user_id");
                $this->db->query("UPDATE kurumsal SET pdialan = pdialan + 1 , ilankalan = ilankalan - 1   WHERE user_id = $user_id");
               
                if($krmslbilgi->onay){
                    
                    $this->db->query("UPDATE ilan SET onay =  1 WHERE id = $insert_id");
         
                }


            }else{
                $bireysel = $this->bireyselcek();
                
                 $this->db->query("UPDATE user SET ilanadet = ilanadet + 1 WHERE id = $user_id");
                  $this->db->query("UPDATE bireysel SET pdialan = pdialan + 1 , ilankalan = ilankalan - 1   WHERE user_id = $user_id");

                
                if($bireysel->onay){
                    
                 
                    $this->db->query("UPDATE ilan SET onay =  1 WHERE id = $insert_id");
                    
                }
                
                



            }
            
            return $insert_id;


        }else{
            
            
            
        }
        
        
        
        
    }
        
    function ilanvideo($ilan_id,$id){
        $data["ilan_id"] = $ilan_id;
      $this->update("ilan_video", $data, "id = $id"); 
    }
    
    
    
    function ilanvideokaydet($video){
     
       $video["url"] =  str_replace("\\", "/", $video["url"]);
     return  $this->insert("ilan_video", $video);  
    }
    
    // VİDEO UPDATE
    
   function ilanvideoupdate($id,$data=array()) {
       
     if($this->db->get_var("select count(id) from ilan_video where ilan_id = $id ")){
        
         $this->update("ilan_video", $data,'ilan_id = '.$id);
         return 1;
     }
     else {
         $this->ilanvideokaydet($id,$data);
     }
    }
    
    
    
    function ilanresimkaydet($id,$resim) {
        $data["ilan_id"] = $id;
      
            $value = str_replace("/", "_", $resim);
            $data["resim"] = str_replace("\\", "_", $value);
       
        return $this->insert("ilan_resim", $data);
    }
    
    function newilanresimkaydet($resim) {
        
        
            $value = str_replace("/", "_", $resim);
            $data["resim"] = str_replace("\\", "_", $value);
       
            
        return $this->insert("ilan_resim", $data);
    }
        
    
    /// image sil
    
    function imagesil($id){
        
        $this->db->query("DELETE FROM ilan_resim WHERE id = $id");
        
    }

    
    
    
    
    function videosil($id){
        
        $this->db->query("DELETE FROM ilan_video WHERE id = $id");
        
    }
    function resimlerupdate($ilan_id,$resim_id){
        
        $sql = "id = $resim_id " ;
        $data["ilan_id"] = $ilan_id ;
        $this->update(ilan_resim, $data, $sql);
        return $resim_id;
    }

    //UPDATE İŞLEMLERİ
    //#####################################
    function ilanupdate($id,$param,$user_id) {
        return $this->update("ilan", $param,'id = '.$id.' AND user_id = '.$user_id);   
    }
   
    function ilanresimupdate($id,$data=array()) {
       if($this->db->get_var("select count(id) from ilan_resim where ilan_id = $id ")){ 
     
        
         $this->update("ilan_resim", $data,'ilan_id = '.$id);
         return 1;
         
       } else {
           
           $this->ilanresimkaydet($id,$data);
           
       }
    }
    
    //######################################
    
    
    function uyeadreskaydet($data) {
        return $this->insert("user_kargo_adres", $data);
      
        
    }
    
    
    function uyeadres($user_id){
        return
        
        $this->db->get_row("selecet * from user_kargo_adres where user_id = $user_id");
        
        
    }
    
    
    function fiyatlar(){
        return
        $this->db->get_row("select * from doping_fiyatlar where id = 1 ");
        
        
    }
    
    function ilanKategoriGetir($id){
        return
        $this->db->get_row("select kategori from ilan where id = $id ");
    }
            
    function user($id){
        
        return $this->db->get_row("SELECT * FROM user where id = $id");
        
        
    }
    function xmldosyaid($id,$uid) {
             return $this->db->get_var("select dosya from xmldosya where id = $id AND  uid = $uid  ");
   
    }
    
    
    function sxmlktg($uid,$xmldosya){
       return $this->db->get_var("select xmlktg from xlmktgesleme where uid = $uid AND xmldosya = $xmldosya ORDER BY id DESC LIMIT 1 ");
    }
    
    function xmlilan($data) {
        
        
       $this->insert("xmlilan", $data);
       
    
    }  
    function ktgad($id){
             return
        $this->db->get_var("select kategori_adi from kategoriler where id = $id  ");  
        
    }
    
    function ilanktg($arama="",$param=""){
        
        if(!$arama){
     
      
      if($param > 0){
      
       
        return
        $this->db->get_results("select * from kategoriler where id in( $param )"); 
      }
      
      else {
          return
        $this->db->get_results("select * from kategoriler where  ustkategori = 0"); 
          
      }
        }
      else {
          
           return
        $this->db->get_results("select * from kategoriler where ustkategori = 0");
      }
        
    }
    function kategori($param=0) { 
        
        
    
        return
        $this->db->get_results("select * from kategoriler where FIND_IN_SET('$param', ustkategori)    ");
    }        
   
    function ilankategori($param) { 
        
        return
        $this->db->get_row("select * from kategoriler where id = $param ");
    }  

    function modul_items($modul){
        return
         $this->db->get_results("SELECT * FROM modul_items WHERE modulId IN ($modul) ");    
    }
    
    function secenekler($modul){
        return
        $this->db->get_results("SELECT * FROM secenekler WHERE itemId = $modul ");  
    }
    function modul_items_as($modul){
        return
         $this->db->get_results("SELECT * FROM modul_items_x WHERE modulId IN ($modul) ");    
    }
    
    function secenekler_as($modul){
        return
        $this->db->get_results("SELECT * FROM secenekler_x WHERE itemId = $modul ");  
    }
    function gruplar($modul){
        return
        $this->db->get_results("SELECT * FROM gruplar WHERE modulId  IN ($modul) ");  
    }

     function ozellikler($modul){
        return
        $this->db->get_results("SELECT * FROM ozellikler WHERE grup_id  = $modul ");  
    }
    

    
    
    function kategorilist($ka=NULL){
        
        if($ka){
        $this->veri["kategori_adi"][$this->say] = $ka->kategori_adi;
        $this->veri["id"][$this->say] = $ka->id;
        
        
        
        $ka = $this->db->get_row("select * from kategoriler where id IN ('$ka->ustkategori')  "); 
        
        $this->say ++;
        $this->kategorilist($ka);
          
      }
      
     
      return $this->veri;
    }
    
    function alttanustekategori($id) {
        
        $ka = $this->db->get_row("select * from kategoriler where id IN ('$id') "); 
        return $this->kategorilist($ka);
        
    }
    
   function ustkategoribul($id){
      
       
      $ust = $this->db->get_var("select ustkategori from kategoriler where id in ('$id') ");  
       if($ust > 0){
          
          $this->ustkategoribul($ust); 
       }else {
          $this->ustk = $id;
       }
       return $this->db->get_var("select ilan from kategoriler where id in ('$this->ustk') "); 
   } 
    
    function ayhannaber($id){
        $ust = $this->db->get_var("select ustkategori from kategoriler where id in ('$id') ");  
            if($ust){
           
         return  $this->ustkategoribul($ust);
       }else {
        return $id;
       } 
       
    }
        
    function bolge() {
        return
        $this->db->get_results("SELECT * FROM bolge order by sira ");     
    }
    
    function sehir($param) {
        
     // $param =  $this->db->get_row("SELECT sira FROM il where id = $param")->sira;   
         return
        $this->db->get_results("SELECT * FROM sehir where il_id = $param ");   
    } 
    
    
    
    
    
    
    
    function il() {
        return
        $this->db->get_results("SELECT * FROM il order by sira ");     
    }
    
    function ilce($param) {
        
     // $param =  $this->db->get_row("SELECT sira FROM il where id = $param")->sira;   
         return
        $this->db->get_results("SELECT * FROM ilce where il_id = $param ");   
    } 
    function mahalle($param) {
        
        return
        $this->db->get_results("SELECT * FROM semtmah where ilce_id = $param ");   
    } 
   
    function dosyakaydet($veri){
       return $this->insert("xmldosya", $veri);
    }
    function xmllall($uid){
        return $this->db->get_results("select * from xmldosya where uid = $uid AND durum = 1  ORDER BY id DESC  ");
    }     
    function xmll($uid){
        return $this->db->get_row("select id,dosya,zaman from xmldosya where uid = $uid AND durum = 1  ORDER BY id DESC LIMIT 1 ");
    }
    function xmllid($uid,$id){
        return $this->db->get_row("select id,dosya,zaman from xmldosya where id = $id AND  uid = $uid AND durum = 1 ");
    }    
    
    
    function ilanbaslik2Kategori($baslik){
        
        
        $x = $this->db->get_var("SELECT kategori FROM ilan where baslik LIKE '$baslik%' ");
        return explode(",", $x)[0];
        
        
        
    }
    
    
        function altustktgid($ka=NULL){
       if($ka){
        
        $this->veri["id"][$this->say] = $ka->id;
        
        
        
        $ka = $this->db->get_row("select id,ustkategori from kategoriler where id IN ('$ka->ustkategori')  "); 
        
        $this->say ++;
        $this->altustktgid($ka);
          
      }
      
      return $this->veri;
        
    }
    function xmlilansil($uid,$id){
        $this->db->query("DELETE FROM xmlilan WHERE uid = $uid AND id = $id ");
    }
    function aciklamakaydet($veri){
        $this->insert("ilan_aciklama", $veri);
    }
    function aciklamaupdate($veri,$i_id){
        $sql = "i_id = $i_id ";
        $this->update("ilan_aciklama", $veri, $sql);
        
    }
        
    function ilanaciklama($id){
        return $this->db->get_var("select aciklama from ilan_aciklama where i_id = $id  ");
    }
    function kategoriesleme($kid,$uid){
        $this->say = 0;
      
        $x = $this->db->get_var("SELECT kid FROM xlmktgesleme WHERE uid = $uid and deger = $kid ");
        if($x){
        
       $this->alttanustekategoriid($x);
       return $this->veri;
        }else return FALSE;
    }
    function alttanustekategoriid($id) {
      
        $ka = $this->db->get_row("select id,ustkategori from kategoriler where id IN ('$id') "); 
          
        
         $this->altustktgid($ka);
        return $this->veri;
    }
    
    function beklemedekilerxml($uid,$xmldosya){
        return $this->db->get_results("SELECT * FROM xmlilan WHERE uid = $uid AND xmldosya = '$xmldosya' AND notktg = 0 ");
        
        
    }
        
    function xbeklemedekilerxml($uid,$xmldosya){
        return $this->db->get_results("SELECT * FROM xmlilan WHERE uid = $uid AND xmldosya = '$xmldosya' ");
        
        
    }
    function notktg($uid,$data){
        
        foreach($data as $id){
        $update["notktg"] = 1;    
            $this->update("xmlilan", $update, "uid = $uid AND id = $id");
        }
        
    }
}