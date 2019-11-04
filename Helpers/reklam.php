
<?php
class reklam_help {
 
        public $db;
    function __construct(){
        global $database;
        $this->db = $database;
    }
          
 public function anasayfa(){
       
     return 
        $this->db->get_row("select * from reklam where anasayfa = 1 order by rand() limit 0,1");
     
      
    }
  public function anasayfaalt(){
       
     return 
        $this->db->get_row("select * from reklam where ustavehizmet = 1 order by rand() limit 0,1");
     
      
    }   
    public function ilan(){ 
       
        return 
        $this->db->get_row("select * from reklam where ilandetay = 1 order by rand() limit 0,1");
    }
}
   
