<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class page_sql extends load{
    public  $say = 0 ,$veri = ARRAY();  
    private  $usta_id;
    
    
    function __construct() {
        parent::__construct();
        $this->usta_id =    $_SESSION["usta_id"];
    }
    
    function bireysel(){
        return
        $this->db->get_var("SELECT bus FROM sozlesmeler");
    
    }
    function kurumsal(){
        return
        $this->db->get_var("SELECT kus FROM sozlesmeler");
    
    }  
    
    function hakkimizda(){
        return $this->db->get_var("select hakkimizda from footer where id = 1");
    }
    
    function iik(){
        return
        $this->db->get_var("SELECT iik FROM sozlesmeler");
    
    }    
    function gizlilik(){
        return
        $this->db->get_var("SELECT gp FROM sozlesmeler");
    
    } 
    function mesafeli(){
        return
        $this->db->get_var("SELECT moss FROM sozlesmeler");
    
    }     
    function kvk(){
        return
        $this->db->get_var("SELECT kvk FROM sozlesmeler");
    
    }      
}