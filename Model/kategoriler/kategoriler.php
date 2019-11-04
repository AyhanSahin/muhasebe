    <?php  
class kategoriler_sql extends load{


    public $say = 0  ,$veri = ARRAY();  
    function __construct() {
        parent::__construct();
        
    }
    
 
    function urunkategorikontrol($ad){
        
        $ad = trim($ad);
       return  $this->db->get_var("SELECT count(id) FROM urun_kategori WHERE isim = '$ad' ");
    }
            
    function urunkategoriupdate($urun_id,$kategorisimler) {
        $ad = trim($kategorisimler);
        $data["urun_kategori_id"] = $this->db->get_var("SELECT id FROM urun_kategori WHERE isim = '$ad' ");
        $sql = "id = $urun_id ";
        $tablo = "urun_hizmet";
        $this->update($tablo, $data, $sql);
        
    }
    
    
    function urunarsivle($urun_id) {
        $urun_id = trim($urun_id);
        $data["arsiv"] = 1;
        $sql = "id = $urun_id ";
        $tablo = "urun_hizmet";
        $this->update($tablo, $data, $sql);
        return $urun_id;
        
    }
    function urunkategoricek(){
        return $this->db->get_results("SELECT * FROM urun_kategori  order by id desc");  
    }
    
    
    function urunkategoriekle($value){
      return $this->insert("urun_kategori", $value);   
    }

    function firmakategoricek(){
         return
        $this->db->get_results("SELECT * FROM firma_kategori  order by id desc");  
    }
    

    function musterikategoriekle($value){
       return $this->insert("firma_kategori", $value);  
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
    
    function badi($id){
        
        return $this->db->get_var("select il_adi from bolge where id = $id");
    }
            
    function sehir($param) {
        
     // $param =  $this->db->get_row("SELECT sira FROM il where id = $param")->sira;   
         return
        $this->db->get_results("SELECT * FROM sehir where il_id IN ($param) order by il_id ");   
    } 
}    