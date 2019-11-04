
<?php
class kur_help {
 
    public $DolarAlis,$DolarSatis,$EuroAlis,$EuroSatis,$GbpAlis,$GbpSatis;
    
    function __construct() {
        $this->kur_dolar();
        $this->kur_euro();
        $this->kur_gbp();
    }


    public function kur_dolar(){
       
      $kur  = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml'); 
      
      $this->DolarAlis =  floatval($kur->Currency[0]->BanknoteBuying) ;
      $this->DolarSatis = floatval($kur->Currency[0]->BanknoteSelling) ;
     
      
    }
    
    public function kur_euro(){ 
        $kur  = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml'); 
      
        $this->EuroAlis = floatval($kur->Currency[3]->BanknoteBuying) ;
        $this->EuroSatis = floatval($kur->Currency[3]->BanknoteSelling) ;
    }
    public function kur_gbp(){ 
        $kur  = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml'); 
      
        $this->GbpAlis = floatval($kur->Currency[4]->BanknoteBuying) ;
        $this->GbpSatis = floatval($kur->Currency[4]->BanknoteSelling) ;
    }
    
    
          public function seo($str){ 
        $str = $this->parentSefLink(html_entity_decode($str)); 
        if ($str !== mb_convert_encoding(mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32')) 
            $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str)); 
        $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8'); 
        $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '1', $str); 
        $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8'); 
        $str = preg_replace(array('`[^a-z0-9]`i', '`[-]+`'), '-', $str); 
        $str = strtolower(trim($str, '-')); 
        return $str; 
    } 

    // helper function comes first 
    // for turkish characters replacing 
    public function parentSefLink($string) 
    { 
        $turkce=array("ş", "Ş", "ı", "ü", "Ü", "ö", "Ö", "ç", "Ç", "ğ", "Ğ", "İ", "I"); 
        $duzgun=array("s", "s", "i", "u", "u", "o", "o", "c", "c", "g", "g", "i", "i"); 
        $string = str_replace($turkce, $duzgun, $string); 
        $string = trim($string); 
        $string = html_entity_decode($string); 
        $string = strip_tags($string); 
        $string = strtolower($string); 
        $string = preg_replace('~[^ a-z0-9_.]~', ' ', $string); 
        $string = preg_replace('~ ~', '-', $string); 
        $string = preg_replace('~-+~', '-', $string); 

        return $string; 
    } 
        
}
   
