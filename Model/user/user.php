<?php  
class user_sql extends load{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    public $say = 0 ,$veri = ARRAY();
    public static  $user_id; 
    function __construct() {
        
        
        parent::__construct();

    }
 
   /// gıvenlik açığı maiile giriş yapılıyor ileride duzelecek v2 de

     
    function katgustid($ka=""){

        if($ka){

            return
            $this->db->get_results("select * from kategoriler where FIND_IN_SET('$ka', ustkategori)  ");
        }
        else {
           return
                   $this->db->get_results("SELECT * FROM `kategoriler` WHERE `ustkategori` = 0 ");
       }


    }
    
 
            
  function xmlktg($uid,$deger,$kid,$xmlktg,$xmldosya){
      
      
     $tr = $this->db->get_var("select id from xlmktgesleme where uid = $uid AND  ( deger = '$deger' OR xmlktg = '$xmlktg' ");
    
      if($tr){
          return "deger";
      }
      else {
      $data["xmldosya"] = $xmldosya;    
      $data["uid"] = $uid;
      $data["deger"] = $deger;
      $data["kid"] = $kid;
       $data["xmlktg"] = $xmlktg;
       
      return $this->insert("xlmktgesleme", $data);
      }
  }  
  function xmlktgsil($uid,$id){
      
      $this->db->query("DELETE FROM xlmktgesleme WHERE id = $id AND uid = $uid");
      return $id;
      
  }
    
    function altustktgid($ka=NULL){
       if($ka){
        
        $this->veri["id"][$this->say] = $ka->id;
        
        
        
        $ka = $this->db->get_row("select id from kategoriler where id IN ('$ka->ustkategori')  "); 
        
        $this->say ++;
        $this->altustktgid($ka);
          
      }
      
     
      return $this->veri; 
        
    }
    
    function alttanustekategoriid($id) {
        
        $ka = $this->db->get_row("select * from kategoriler where id IN ('$id') "); 
        return $this->altustktgid($ka);
        
    }
}