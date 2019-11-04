<?php  
class anasayfa_sql extends load{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    public $say = 0  ,$veri = ARRAY(),$ana = 0 ;
    public $il=ARRAY(),$ilce=ARRAY(),$idler="",$sorgu=ARRAY(),$liste="",$fmn ="",$fmx="",$tarih="",$kelime="";  
    function __construct() {
        parent::__construct();
        
    }
    function guncelle($tablo,$id="",$data){
        
        $this->update($tablo, $data, "id = $id");
        return $id;
        
    }
    
 
     function kaydet($tablo,$data){
        
        return $this->insert($tablo, $data);
    }
    
    function katgustid($ka=""){

        if($ka){
            return
            $this->db->get_results("select * from kategoriler where FIND_IN_SET('$ka', ustkategori)  ");
        }
        else {
            return  $this->db->get_results("SELECT * FROM `kategoriler` WHERE `ustkategori` = 0 ");
        }

    }
    
    function katgid($id=0) {
        return $this->db->get_row("select * from kategoriler where id = $id "); 
    } 
  
    function ilankategori($kategori){
        
        return $this->db->get_results("select * from kategoriler where id in ($kategori) and ustkategori = 0");
        
        
    }
    
    function ilan_ozellik_idler($param) {
        return $this->db->get_results("select ilan_id from ilan_ozellik where {$param} group by ilan_id");
        
    }
    
    
    function tipogren($id) {
        
        return $this->db->get_var("select tip from modul_items where id = $id ");
        
    }
    function altkategori($id) {
        
        
             return $this->db->get_results("select * from kategoriler where FIND_IN_SET('$id', ustkategori)  ");
   
        
    }
    function secenek($id){
    return $this->db->get_results("SELECT * FROM secenekler WHERE itemId = '$id' ORDER BY Id ASC");
    }
    function modul($id){
         $modul = $this->db->get_var("SELECT moduller FROM kategoriler where id = $id ");
        return $this->db->get_results("SELECT * FROM modul_items WHERE  IN ($modul) and tip != '1' ");

    }
    function kategori_in($param=0) { 
        
        return
        $this->db->get_results("select * from kategoriler where id IN($param) ");
    }

    
    
    function kategorilist($ka=NULL){
        
        if($ka){
        $this->veri["kategori_adi"][$this->say] = $ka->kategori_adi;
        $this->veri["id"][$this->say] = $ka->id;
        $this->veri["adet"][$this->say] = $this->kategoriadet($ka->id);
        
        
        
        $ka = $this->db->get_row("select * from kategoriler where id IN ('$ka->ustkategori') "); 
        
        $this->say ++;
        $this->kategorilist($ka);
          
      }
      
     
      return $this->veri;
    }
    
    function alttanustekategori($id) {
        
        $ka = $this->db->get_row("select * from kategoriler where id = $id "); 
        return $this->kategorilist($ka);
        
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
    function user($id){
        
        return
        $this->db->get_row("SELECT * FROM user where id = $id ");  
        
    }
    
   
    
//     END ilan detayları için  
    
        function il() {
        return
        $this->db->get_results("SELECT * FROM il order by sira ");     
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
    
     // bayilik bolge ve sehırler
    
    
        function xbolge($id){
        
        return
        $this->db->get_var("SELECT il_adi FROM bolge where id = $id ");  
        
    }

    
    
    
}    