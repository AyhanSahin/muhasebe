  <?php 
  
  class guvenlik{
	  
 private  $key = "786454684646";
	  
    function sifrele_sha1($sifre) {
    	return sha1($this->key.sha1($this->key.sha1($sifre)));  
								  }
  
	function sifrele_md5($sifre) {	  
    	return md5($this->key.md5($this->key.md5($sifre)));  
								  }
								  
	function sql_trim($veri=""){ 

			
           return mysql_real_escape_string($veri);
		
		}
	  
	function eposta($email=""){ 
	
	if(filter_var($email, FILTER_VALIDATE_EMAIL)):
	return 1;  else : return 0; endif;
		 
        
		
		}

}
$this->guvenlik = new guvenlik();