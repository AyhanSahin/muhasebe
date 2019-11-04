<?php  
class anasayfa_sql extends load{
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    public $say = 0  ,$veri = ARRAY(),$ana = 0, $data;
    function __construct() {
        parent::__construct();
        $this->data = new stdClass;
        
    }
    function urun_kategori_ad($id){
        return  $this->db->get_var("SELECT isim FROM urun_kategori WHERE id = '$id' ");
    }
    
    function hizmeturunsil($id){
        $this->db->query("DELETE FROM urun_hizmet WHERE id = $id");
        return $id;
        
    }
    
    function urunler($sira=1,$gosterim_adet=SAYFALAMA_ADET){
        
        $this->data->toplam = $this->db->get_var("select count(id) from urun_hizmet WHERE arsiv=0");
        $this->data->sayfa = ceil($this->data->toplam / $gosterim_adet); 
        $ilk = ($sira - 1) *  $gosterim_adet;
        $this->data->veri = $this->db->get_results("select * from urun_hizmet WHERE arsiv=0 LIMIT $ilk , $gosterim_adet"); 
        return $this->data;  
    }
    
    function urun($id){
         
        return $this->db->get_row("select * from urun_hizmet where id = $id");
    }
    
    function urunkategori(){
        
        return $this->db->get_results("select * from urun_kategori   "); 
    }
    
    function kategoriad($id){
        
        return $this->db->get_var("select isim from urun_kategori where id = $id");
    }
    
    
    function musterikategori(){
        
        return $this->db->get_results("select * from firma_kategori   "); 
        
    }
    
    function illler(){
        
        return $this->db->get_results("select * from iller ORDER BY il_adi ASC  "); 

    }
    
    function ilcelerall(){
        
        return $this->db->get_results("select * from ilceler ORDER BY ilce_adi ASC  "); 
    }
    
    function il_ilce($il){
        
       return $this->db->get_results("select * from ilceler WHERE il_id = $il ORDER BY ilce_adi ASC  ");
       
    }
    
    function urun_hizmetler_all(){
        return $this->db->get_results("SELECT id,ad FROM urun_hizmet WHERE arsiv = 0 "); 
    }
    
    function stokgetir($id) {
        return $this->db->get_row("SELECT stok_miktar,alis_satis_birimi FROM urun_hizmet WHERE id = $id "); 
    }
    function urunhizmetvarmi($ad) {
        $ad = trim($ad);
        return $this->db->get_var("SELECT id FROM urun_hizmet WHERE ad = '$ad' "); 
    }

    function urunhizmetekle($data) {
        return $this->insert("urun_hizmet", $data);
        
    }

    function gelirgideretiketvarmi($ad) {
        $ad = trim($ad);
        return $this->db->get_var("SELECT id FROM gelirgideretiket WHERE ad = '$ad' "); 
    }
    
    
    function etiket(){
        return $this->db->get_results("SELECT id,ad FROM gelirgideretiket ORDER BY ad ASC   "); 
    }
    
    
    function gelirgideretiketekle($param) {
         return $this->insert("gelirgideretiket", $param);
    }
    
    function musterigetir($arana){
        return $this->db->get_results("SELECT id,unvan FROM musteri WHERE MATCH (unvan) AGAINST('$arana') "); 
   
    }
    
    function fl($sira=1,$gosterim_adet=SAYFALAMA_ADET){
        $data = new stdClass();
        
  
        $data->toplam = $this->db->get_var("select count(id) from fl ");
        $data->sayfa = ceil($data->toplam / $gosterim_adet); 
        $ilk = ($sira - 1) *  $gosterim_adet;
        $data->veri = $this->db->get_results("select * from fl  LIMIT $ilk , $gosterim_adet"); 
        return $data;  
    }
     function kaydet($tablo,$data){
        
        return $this->insert($tablo, $data);
    }    
    
    function seciliurunleradet($flid){
      
        
       return $this->db->get_var("SELECT count(id)  FROM secili_urunler where fl_id = $flid " );
        
    }
    
    function seciliurunler($fl_id){
        return $this->db->get_results("SELECT  secili_urunler.urun_id , secili_urunler.indirim , urun_hizmet.ad ,urun_hizmet.v_h_s_f , urun_hizmet.v_h_s_f_kur FROM secili_urunler "
                . "INNER JOIN urun_hizmet ON urun_hizmet.id=secili_urunler.urun_id WHERE secili_urunler.fl_id =  $fl_id ");   
        
    }
    
    function seciliurunlerisil($id){
        
        $this->db->query("DELETE FROM secili_urunler WHERE fl_id = $id ");
        
    }
    
    function flkullananmusetri($flid){
        return $this->db->get_var("SELECT count(id) FROM musteri WHERE turu = $flid" );
    }
    
    function urunfiyatgetir($id){
         return $this->db->get_row("SELECT v_h_s_f , v_h_s_f_kur FROM urun_hizmet WHERE id = $id "); 
        
    }
    
    function fiyatlistesi($id){
         
        return $this->db->get_row("select * from fl where id = $id");
    }
    function flsil($id) {
        $this->db->query("DELETE FROM secili_urunler WHERE fl_id = $id");
        $this->db->query("DELETE FROM fl WHERE id = $id");
        return $id;
    }
    function flkullananmusetriler($flid){
        return $this->db->get_results("SELECT * FROM musteri WHERE turu = $flid" );
    }
    function fldetay($id){
        return $this->db->get_results("select * from fl WHERE id = $id ");
        
    }
    
    function fl_update($veri,$id){
        $this->update("fl", $veri, "id = $id");
    }

    function fl_id_ad(){
        return $this->db->get_results("select id,ad from fl   ");
    }
    
}   


