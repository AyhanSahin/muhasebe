<?php

class kategoriler_help {
    public $db;
    function __construct(){
        global $database;
        $this->db = $database;
        
        $this->db->cache_timeout = 1 ;
        $this->db->cache_dir = HOME . "cache"; 
        $this->db->cache_queries = true;
        $this->db->use_disk_cache = true;
        $this->db->cache_timeout = 1;
    }
    function katgustid($ka=""){
     

        if($ka){

            return
            $this->db->get_results("select * from kategoriler where FIND_IN_SET('$ka', ustkategori)  order by tip ");
       $this->db->debug(); }
 else {
    return
            $this->db->get_results("SELECT * FROM `kategoriler` WHERE `ustkategori` = 0  order by tip ");
$this->db->debug(); }


    }
    
    function katgid($id=0) {
        
     
        
        return $this->db->get_row("select * from kategoriler where id IN ('$id') order by tip"); 
        
        
    }
    
        function menuresim($id){
        return $this->db->get_var("select mi from menuresim where ktg_id = $id ");         
        
    }
    
    function __destruct() {
               $this->db->cache_queries = FALSE;
        $this->db->use_disk_cache = FALSE;
    }
}