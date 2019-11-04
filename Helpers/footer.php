<?php
 
class footer_help {
    public $db ;
    function __construct() {
        global $database;
        $this->db =  $database;
        
    }
 
    function deneme(){
        return $this->db->get_row("select * from footer where id = 1");

    }
    
    function sosyal(){
        return $this->db->get_row("select * from sosyalmedya where id = 1");

    }    
    
}
?>