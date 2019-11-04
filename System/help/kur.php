
<?php
class kur_help {
 
    public $DolarAlis,$DolarSatis,$EuroAlis,$EuroSatis;
            
    function kur_dolar(){
      $kur  = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml'); 
      
      $this->DolarAlis =  floatval($kur->Currency[0]->BanknoteBuying) ;
      $this->DolarSatis = floatval($kur->Currency[0]->BanknoteSelling) ;
     
      
    }
    
    function kur_euro(){ 
        $kur  = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml'); 
      
        $this->EuroAlis = floatval($kur->Currency[3]->BanknoteBuying) ;
        $this->EuroSatis = floatval($kur->Currency[3]->BanknoteSelling) ;
    }
}
   
