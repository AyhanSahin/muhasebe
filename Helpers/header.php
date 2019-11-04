<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class header_help  {
    
    public $db;
    function __construct(){
        global $database;
        $this->db = $database;
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
   function analytics(){
     
        
         return $this->db->get_var("select analytics from google where id = 1 ");
    }
    function header() {
       return $this->db->get_row("SELECT * FROM `site` WHERE id = 1");    
        
    }
               
    function katgustid($ka=""){

        if($ka){

            return
            $this->db->get_results("select * from kategoriler where FIND_IN_SET('$ka', ustkategori)  order by tip ");
        }
        else {
           return
                   $this->db->get_results("SELECT * FROM `kategoriler` WHERE `ustkategori` = 0 order by tip");
       }


    }
    function katgid($id=0) {
   
        return $this->db->get_row("select * from kategoriler where id = $id "); 

    }
    

}
