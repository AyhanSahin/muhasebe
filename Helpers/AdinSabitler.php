<?php
use sistem\load as load ;
class AdinSabitler_help extends load { 
    private $data;
 
 
    
    function header(){
      
        
        $this->View("admin/header");
               
    }
    function footer(){
        
        
        $this->View("admin/footer");
    }
    function sidebar(){
        
        
        $this->View("admin/sidebar");
    }
 
    
    function yukle($sayfa,$data=""){
        $this->data = $data;  
        $this->header();
        $this->sidebar();
        $this->View($sayfa);  
        $this->footer();
     
    }
    }