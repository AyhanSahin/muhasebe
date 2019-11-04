    <?php  
class gav_ajax_sql extends load{


    public $say = 0  ,$veri = ARRAY();  
    function __construct() {
        parent::__construct();
        
    }
    
    function iladi($id){
        
        
        return $this->db->get_var("select il_adi from il where id = $id");
    }
            
    function ilce($param) {
        
     // $param =  $this->db->get_row("SELECT sira FROM il where id = $param")->sira;   
         return
        $this->db->get_results("SELECT * FROM ilce where il_id IN ($param) order by il_id ");   
    } 
      function tipogren($id) {
        
        return $this->db->get_var("select tip from modul_items where id = $id ");
        
    }
}    