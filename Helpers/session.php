<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class session_help {
    
    
    function sonupdate($urun,$adet,$secenek="a"){
        if($secenek=="a"){
         $_SESSION["sepet"][$urun]["adet"] = $adet;
         return $urun;
        }
        else {
           $_SESSION["sepet"][$secenek]["adet"] = $adet;
         return $urun;  
        }
    }
    function sepet_set($urun,$adet,$baslik,$resim,$fiyat,$kur,$tadet,$snkid="") {
        
        if (($_SESSION["sepet"][$urun] && $_SESSION["sepet"][$urun]["snkid"] == $snkid) || ($_SESSION["sepet"][$snkid] && $_SESSION["sepet"][$snkid]["snkid"] == $snkid)) {
            if($snkid) {$toplam =  $adet + $_SESSION["sepet"][$snkid]["adet"];}
            else {  $toplam =  $adet + $_SESSION["sepet"][$urun]["adet"];}
          
            if($toplam > $tadet){
                return 2;
            }  
            else {
                 if($snkid) {   $_SESSION["sepet"][$snkid]["adet"] =  $toplam;  
                return 1;}
                 else {
                $_SESSION["sepet"][$urun]["adet"] =  $toplam;  
                return 1;
                 }
            }
        }
        else{
            
            if($adet > $tadet){
                return 2;
            }  
            else {
                if($snkid){
                    $_SESSION["sepet"][$snkid]["id"] =  $urun;    
                    $_SESSION["sepet"][$snkid]["adet"] =  $adet;
                    $_SESSION["sepet"][$snkid]["baslik"] = html_entity_decode($baslik);
                    $_SESSION["sepet"][$snkid]["resim"] =  $resim;
                    $_SESSION["sepet"][$snkid]["fiyat"] =  $fiyat;
                    $_SESSION["sepet"][$snkid]["kur"] =  $kur;
                    $_SESSION["sepet"][$snkid]["snkid"] =  $snkid;
                    return 1; 
                }          
                else {
                    $_SESSION["sepet"][$urun]["id"] =  $urun;    
                    $_SESSION["sepet"][$urun]["adet"] =  $adet;
                    $_SESSION["sepet"][$urun]["baslik"] = html_entity_decode($baslik);
                    $_SESSION["sepet"][$urun]["resim"] =  $resim;
                    $_SESSION["sepet"][$urun]["fiyat"] =  $fiyat;
                    $_SESSION["sepet"][$urun]["kur"] =  $kur;
                    $_SESSION["sepet"][$urun]["snkid"] =  $snkid;
                    return 1; 
                }
            }
        }
    }
    
    function grid($rt){
        
       $_SESSION["grnt"] = "grid"; 
       return $rt;
    }
    function liste($rt){
        
       $_SESSION["grnt"] = "list"; 
       return $rt;
    }            
    function sepeturundelete($urun){
        unset($_SESSION["sepet"][$urun]);
        
         unset($_SESSION["sepet"][$urun]);
     }
    
    function tumsepetsil(){
           unset($_SESSION["sepet"]);
    }
    function sepet_get() {
        //session_destroy();
       return  $_SESSION["sepet"] ;
    
    }   
    
    function set($key,$value) {
        
        $_SESSION[$key] = $value;
    
    }
    function get($key) {
        
       return $_SESSION[$key] ;
    
    }
}
 