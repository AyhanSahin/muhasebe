<?php
namespace router;
 use \router\test as rt; 
class test {


	function __construct(){

            $this->routers();

	}

        
        
        
        
        function routers($data){
      if($data[0] == "detay"){
        array_shift($data);  
       array_unshift($data, "ilan", "detay" ,"id"); 
   
      } 
      else{}
            
         return $data;    
            
            
            
        }
        
     function islem(){
         
         
         
     }   
        
        
 
}



?>