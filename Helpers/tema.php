<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tema_help  {
    
    public $db;
    function __construct(){
        global $database;
        $this->db = $database;
    }
    
    function anasayfa(){
       return $this->db->get_var("select sayfa from anasayfaayar where id = 1 "); 
    }
}