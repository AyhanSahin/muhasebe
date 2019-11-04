<?php

    use ana\ayhan as core ;
    use sistem\load as load ;

	class firma_sql extends load{
		
		private $db;
		private $datalar ,$guvenlik ,$paginate;
 		public $sayfalama = 20;
		
		function __construct($datalar){
			 
			$this->datalar = $datalar;
			
			$this->db = $this->yukle('db','cache');
                         //  cache kullanilacaksa ustteki gibi, kullanilmayacaksa bos gecilir
                        $this->guvenlik = $this->yukle('guvenlik');
                       
		}
	
	function ulkeler(){
            // get_results kullanimi, donen deger ornek ciktisi
            /*  print_r ciktisi
         Array ( 
            * [0] => stdClass Object ( [id] => 1 [ulke] => AMERÄ°KAN SAMOASI [kod] => AS [diger] => ) 
            * [1] => stdClass Object ( [id] => 2 [ulke] => (CTM) Community trademark [kod] => [diger] => ) 
            * [2] => stdClass Object ( [id] => 3 [ulke] => A.B ÃœYE ÃœLKELERÄ° [kod] => [diger] => ) 
            * [3] => stdClass Object ( [id] => 4 [ulke] => A.B.D. [kod] => US [diger] => ) 
         )
             
             */
            
		return 
		$this->db->get_results("SELECT * FROM ulkeler  ORDER BY ulke ASC LIMIT 0,4");	
		}
        function berk(){
            return
            $this->db->get_results("SELECT * FROM ulkeler");
            
            
        }
	function ulke($id){
		$id = $this->db->escape($id);
             // get_row kullanimi, donen deger ornek ciktisi
            /*  print_r ciktisi
                stdClass Object ( [id] => 2 [ulke] => (CTM) Community trademark [kod] => [diger] => )
             */
		return
		$this->db->get_row("SELECT * FROM ulkeler WHERE id = $id ");	
	}
        
        
        function dene(){
            return $this->paginate ;
        }
                
	function sil(){
		$id = $this->db->escape($this->datalar->id);
	
		$this->db->query("DELETE FROM  ulkeler WHERE id = $id  ");	
	}
    
                
        function ekle(){ 
            
            // get veya post ile gonderilen form verileri $this->datalar->ulke name i ulke olan text alanindan ornek
            $veri["ulke"] = $this->datalar->ulke;
            $veri["kod"] = $this->datalar->kod;
            $veri["diger"] = $this->datalar->diger;
            
            // $this->db->query("  "); istenirse direk sql kodlar buraya yazilabilinir 
            
            $this->db(core::insert("ulkeler", $veri));
            return $this->db->insert_id;
        }
	
     function update(){
        //link  http://localhost/trans/sayfa/update/id/1/ulke/turkiye
        //
        //// sadece posttan veri almak istediginizde ise 
        // islem sayfasindan sql cagrilirken  $this->yukle("sql","firma.php","p")->update(); 3 ncu parametrede bu belirtilir
             // ciktisi UPDATE sirketler SET ulke = 'turkiye' , kod = '' , diger = '' WHERE id = 1 ;
		$id = $this->db->escape($this->datalar->id);
                $veri["ulke"] = $this->db->escape($this->datalar->ulke);
                $veri["kod"] = $this->db->escape($this->datalar->kod);
                $veri["diger"] = $this->db->escape($this->datalar->diger);
                echo $sql = core::update("sirketler", $veri,"id = {$id} ");
		
    }
    
    function ornek(){
        echo "j";
        var_dump($this->datalar);
        
    }
    
    function sifrele(){
        // sha1 ve tanımlı key ile 3 kez şifrelem yapılır		
        $key =  $this->guvenlik->sifrele_sha1('we');

        // md5  ve tanımlı key ile 3 kez şifrelem yapılır		
        $key =  $this->guvenlik->sifrele_md5('ew');
        
        
       $mail =  $this->guvenlik->eposta("denemeQyahoo.com");
       if($mail):
           TRUE;
           else :
            FALSE;   
           
       endif;
       
       
    }
                
	
	
	
	
	}
	
?>	