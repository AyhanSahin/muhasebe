<?php 

class pdf {
    public $class ;
        function __construct(){
          
            include  FCPATH .SISTEM.'/pdf/dompdf_config.inc.php';
            $this->class = new DOMPDF();
        }
        
}

$this->pdf = new pdf($yol);
