<?php  
class ilan_sql extends load{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    public $say = 0 ,$veri = ARRAY();  
    
    function __construct() {     
        parent::__construct();
    }
        
    function kategorigruplar($modul){
         return
        $this->db->get_var("SELECT `gruplar` FROM `kategoriler` WHERE `id` =  $modul "); 
    }
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    } 
    function urunsecenekvarmi($id){
      $adet =  $this->db->get_var("SELECT count(*) FROM ilansatissecenek WHERE ilan_id = $id ");
        if($adet > 0){ return 1;}   
    } 
    function urunsecenekstoktandus($id){
        $adet = 1;
     $this->db->query("UPDATE `ilansatissecenek` SET `stok`= stok - $adet WHERE id = $id"); 
        
        
    }    
    
    function urunsecenekstokiade($id=0,$adet = 1){
        if($id>0){
     $this->db->query("UPDATE `ilansatissecenek` SET `stok`= stok + $adet WHERE id = $id"); 
        }
        
    }  
    function urunsecenekust($id){
        return   $this->db->get_results("SELECT secenek FROM ilansatissecenek WHERE ilan_id = $id group by secenek ");
        } 

    function urunsecenekadi($id){
       $sid = $this->db->get_var("SELECT deger FROM ilansatissecenek WHERE id = $id ");
       $ads = $this->db->get_results("SELECT adi FROM secenekler_x WHERE id IN ($sid) ");
       $adet = count($ads);
       $i=1;
        foreach($ads as $ad){ if($adet > $i) {$rt .=  $ad->adi." / ";} else {$rt .=  $ad->adi;}$i++;}
        return $rt;
    }
    
    function seceneksatis($id){
        return $this->db->get_var("SELECT adi FROM secenekler_x WHERE id = $id ");
    }
    function urunsecenekalt($id,$secenek){
        return   $this->db->get_results("SELECT * FROM ilansatissecenek WHERE ilan_id = $id and (FIND_IN_SET($secenek, secenek) > 0 )");
    }
    
    function uruneaitsecenekler($id){          
        return$this->db->get_results("SELECT id, deger FROM ilansatissecenek WHERE ilan_id = $id ");

    } 
    
    function urun_tum_secenek($id){
       $idss =  $this->db->get_results("SELECT id FROM ilansatissecenek WHERE ilan_id = $id ");
       foreach ($idss as $ids ){
           $sonuc[$ids->id] =  $this->db->get_row("SELECT stok,fiyat,resim ,deger FROM ilansatissecenek WHERE id = $ids->id ");
        }
    return $sonuc;    
    }         
        
        function ktgad($id){
             return
        $this->db->get_var("select kategori_adi from kategoriler where id = $id  ");  
        
    }    
     function katgustid($ka=""){

        if($ka){

            return
            $this->db->get_results("select * from kategoriler where FIND_IN_SET('$ka', ustkategori)  ");
        }
        else {
           return
                   $this->db->get_results("SELECT * FROM `kategoriler` WHERE `ustkategori` = 0 order by tip");
       }
     }


    
    function tumukucukiller(){
        $array = $this->db->get_results("SELECT id,il_adi FROM il"); 
        
        
        foreach ($array as $value) {
            
            strtolower($value->il_adi);
            
        }
        
    }
         
 
            
    function modul_items_($modul){
        return
        $this->db->get_results("SELECT * FROM modul_items WHERE modulId = $modul ");  
    }
    
    function secenekler_($modul){
        return
        $this->db->get_results("SELECT * FROM secenekler WHERE itemId = $modul ");  
    }

    function gruplar($modul){
        return
        $this->db->get_results("SELECT * FROM gruplar WHERE modulId  IN ($modul) ");  
    }

     function ozellikler($modul){
        return
        $this->db->get_results("SELECT * FROM ozellikler WHERE grup_id  = $modul ");  
    }
    
    
    function secenekler_sa($modul){
        return
        $this->db->get_var("SELECT adi FROM secenekler_x WHERE id = $modul ");  
    }
      function modul_items_sa($modul){
        return
        $this->db->get_var("SELECT adi FROM modul_items_x WHERE id = $modul ");  
    }
    
     function secenekler($modul){
        return
        $this->db->get_row("SELECT * FROM secenekler WHERE id = $modul ");  
    }
      function modul_items($modul){
        return
        $this->db->get_row("SELECT * FROM modul_items WHERE id = $modul ");  
    }
    
    function ilan_ozellik($param) {
        
        return $this->db->get_results("select * from ozellikler where id IN ($param) ");
        
    }
function kargo(){
         return $this->db->get_results("select * from kargo ");
    
}    
   function uyeadres($user_id){
        return
        
        $this->db->get_row("SELECT * FROM user_kargo_adres where user_id = $user_id order by id desc");
        
        
    }
    function ilan_secenek($param) {
        $i=0;
        $data = explode(',', $param);
        foreach ($data as $value) {
            
            $x = explode(':', $value);
            
            $secenekbaslik = $this->modul_items($x[0]);
            if($secenekbaslik->tip == 3){
               $sonucu = $this->secenekler($x[1])->adi; 
                
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
    
    
 
   
    
      function alttanustekategori($id) {
        
        $ka = $this->db->get_row("select * from kategoriler where id = $id "); 
        return $this->kategorilist($ka);
        
    }
    function kategorilist($ka=NULL){
        
        if($ka){
            $this->veri["kategori_adi"][$this->say] = $ka->kategori_adi;
            $this->veri["id"][$this->say] = $ka->id;



            $ka = $this->db->get_row("select * from kategoriler where  id IN ('$ka->ustkategori')  "); 

            $this->say ++;
            $this->kategorilist($ka);
          
      }
      
     
      return $this->veri;
    }
          function xmlktgtek($uid,$xmldosya){
       return $this->db->get_var("select xmlktg from xlmktgesleme where uid = $uid AND xmldosya = $xmldosya  ORDER BY id DESC LIMIT 1 ");
    }
    function sxmlktg($uid,$xmldosya){
       return $this->db->get_results("select * from xlmktgesleme where uid = $uid AND xmldosya = $xmldosya ");
    } 
    
    function eslesmeyenktg($uid,$did){
         return $this->db->get_results("SELECT `kategori` FROM `xmlilan` WHERE `uid` = $uid AND `notktg` = 1 AND `xmldosya`= $did GROUP BY `kategori` ");
    }
    function beklemexml($uid){
       return $this->db->get_var("select COUNT(id) from xmlilan where uid = $uid  ");
     }
 
    function xmldelete($id){
        $this->db->query("DELETE FROM  xmldosya where id = $id ");
        return 1; 
        
    }
     function xmllall($uid){
        return $this->db->get_results("select * from xmldosya where uid = $uid AND durum = 1  ORDER BY id DESC  ");
    }    
    function xmll($uid){
        return $this->db->get_row("select id,dosya,zaman from xmldosya where uid = $uid AND durum = 1  ORDER BY id DESC LIMIT 1 ");
    }
     function beklemedekixmlilan($uid){
       return $this->db->get_row("select t2.id,t2.zaman from xmlilan t1 inner join xmldosya t2 on t1.xmldosya = t2.id where t1.uid = $uid group by t1.xmldosya ");
  
        
    }
    function xmllid($uid,$id){
        return $this->db->get_row("select id,dosya,zaman from xmldosya where id = $id AND  uid = $uid AND durum = 1 ");
    }     
    
    function ilanaciklama($id){
        return $this->db->get_var("select aciklama from ilan_aciklama where i_id = $id  ");
    }
    
    function tumxmldelete($uid,$d_id="ayhan"){
        if($d_id == "ayhan"){
        $this->db->query("DELETE  from xlmktgesleme where uid = $uid  ");
        $this->db->query("DELETE  from xmlilan where uid = $uid  ");
        
        }
        else {
            $this->db->query("DELETE  from xlmktgesleme where uid = $uid  ");
            $this->db->query("DELETE  from xmlilan where uid = $uid  ");            
            $this->db->query("DELETE  from ilan_aciklama where d_id = $d_id  ");
            
        }
    }
            
    function kategori_in($param=0) { 
        
        return
        $this->db->get_results("select * from kategoriler where id IN($param) ");
    } 
    
     function ilankategoriupdate($id,$ktgr) { 
        
        $this->db->query("UPDATE `ilan` SET `kategori` = '$ktgr' WHERE `ilan`.`id` = $id");
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

    
    function il($param="") {
        
            if($param){
            $sql = " where id = ".$param;
             return
        $this->db->get_row("SELECT * FROM il $sql ");    
            
        }else { 
        return
        $this->db->get_results("SELECT * FROM il order by sira ");     
    }
    }
    function ilcegetir($id){
            return
        $this->db->get_var("SELECT ilce_adi FROM ilce WHERE id = $id "); 
    }
    function mahallegetir($id){
            return
        $this->db->get_row("SELECT semt,mahalle FROM semtmah WHERE id = $id "); 
    }    
    
    function ilce($param="") {
        
         if($param){
            $sql = " where il_id = ".$param;
            
        }else {$sql = "";}
        
     // $param =  $this->db->get_row("SELECT sira FROM il where id = $param")->sira;   
         return
        $this->db->get_results("SELECT * FROM ilce $sql ");   
    } 
    function mahalle($param="") {
        
        if($param){
            $sql = " where id = ".$param;
            
        }else {$sql = "";}
        
        return
        $this->db->get_results("SELECT * FROM semtmah  $sql");   
    }
    
    
    
        function sm($param="") {
        
        if($param){
            $sql = " where ilce_id = ".$param;
            
        }else {$sql = "";}
        
        return
        $this->db->get_results("SELECT * FROM semtmah  $sql");   
    }
    
    


    
    
    /*
     * user gav işlemleri
     */

    function date($param) {
        $date = DateTime::createFromFormat('Y-m-d', $param);
        return $date->format('d/m/Y');
    }
    function datetime($param) {
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $param);
        return $date->format('d/m/Y H:i');
    }
 
 // bayilik bolge ve sehırler
    
    
        function bolge($id){
        
        return
        $this->db->get_var("SELECT il_adi FROM bolge where id = $id ");  
        
    }
    function sehir($id){
        
        return
        $this->db->get_var("SELECT ilce_adi FROM sehir where id = $id ");  
        
    }
    
    
    
  // ilan detayları için  
    
    function ilismi($id){
        
        return
        $this->db->get_var("SELECT il_adi FROM il where id = $id ");  
        
    }
    function ilceismi($id){
        
        return
        $this->db->get_var("SELECT ilce_adi FROM ilce where id = $id ");  
        
    }
    function mahismi($id){
        
        return
        $this->db->get_row("SELECT semt,mahalle FROM semtmah where id = $id ");  
        
    }    
 
 
    
    
   
//     END ilan detayları için  
    
    
}