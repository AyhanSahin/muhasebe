<?php



class paginate {
       
        public $css ,$db ,$dt,$url;
        public  $toplam, $adet = 10 , $sonraki , $onceki , $data ; 

    function __construct($url) {
        $this->db = self::db;
        
        $this->dt = $url;

            }
  
    
    function paginate($url,$sql){
      
        
      if($url != "NULL"){
        
             $this->url =  $url;
        }
        else {
           
            exit('Error : URL ');
        }
        
        
        if($sql['tablo'] != "NULL"){
        
           $tablo =  $sql['tablo'];
        }
        else {
           
            exit('Error : Tablo ');
        }
        
        if($sql['colum'] != "NULL"){
        
            $colum =  $sql['colum'];
        }
        else {
           
           $colum =  "*";
        }
        
        if(isset($sql['limit'])){
        
            $this->adet  =  $sql['limit'];
        }
      
           if(isset($this->dt->Ss)){
            $active = $this->dt->Ss;
           $ilk = ($this->adet *  ($this->dt->Ss -1 ));
        }
        
        else {
            $active = 1;
            $ilk = 0;

       }
        if(isset($sql['kosul'])){
          
          
             $this->toplam = ceil($this->db->get_var("SELECT count(*)  FROM  {$tablo} WHERE  {$sql['kosul']} ") /  $this->adet);
           
            $kosul =  "WHERE  {$sql['kosul']} LIMIT {$ilk} , {$this->adet}";
        }
        else {
            
            $this->toplam = ceil($this->db->get_var("SELECT count(*)  FROM  {$tablo} ") /  $this->adet);
            $kosul =  " LIMIT {$ilk} , {$this->adet} ";
            
        }  
      
   
        
        $data["veri"] = $this->db->get_results("SELECT {$colum} FROM  {$tablo}  {$kosul} ");
        
        //$js_css = $this->loadcss(SKIN.'paginate/css/cs.php');
        
        $js_css = $this->loadjs(SKIN.'paginate/jquery-1.3.2.js');
        $js_css .= $this->loadjs(SKIN.'paginate/jquery.paginate.js');
        $data["css"] =  $this->css();
        $data["js_css"] = $js_css ;
        
        
            $url =  SITE ."{$_SERVER['REQUEST_URI']}";
            
          
            
            $x = explode("/Ss",$url );
            
           $data["url"]  = $x[0];
           
    

        
         $data["count"] =  $this->toplam ;
         $data["start"] =  $active ;
         
         $data = (object)$data;
    
        
        return $data;
        
    }
   
    function loadcss($path) {
      
        $sc = "<link rel='stylesheet' type='text/csst' href='$path'>"; 
        return $sc;

    }
    
    function loadjs($path) {

        $sc = "<script type='text/javascript' src='$path'></script>"; 
        return $sc;
    }
            
    function css(){
       $this->css =  '
        <style>
          .demo{
                width:580px;
                bottom:0;
                padding:10px;
                margin:10px auto;
                border: 1px solid #fff;
                background-color:#f7f7f7;
            }
     .jPaginate{
    height:34px;
    position:relative;
    color:#a5a5a5;
    font-size:small;
    width:100%;
}
.jPaginate a{
    line-height:15px;
    height:18px;
    cursor:pointer;
    padding:2px 5px;
    margin:2px;
    float:left;
}
.jPag-control-back{
	position:absolute;
	left:0px;
}
.jPag-control-front{
	position:absolute;
	top:0px;
}
.jPaginate span{
    cursor:pointer;
}
ul.jPag-pages{
    float:left;
    list-style-type:none;
    margin:0px 0px 0px 0px;
    padding:0px;
}
ul.jPag-pages li{
    display:inline;
    float:left;
    padding:0px;
    margin:0px;
}
ul.jPag-pages li a{
    float:left;
    padding:2px 5px;
}
span.jPag-current{
    cursor:default;
    font-weight:normal;
    line-height:15px;
    height:18px;
    padding:2px 5px;
    margin:2px;
    float:left;
}
ul.jPag-pages li span.jPag-previous,
ul.jPag-pages li span.jPag-next,
span.jPag-sprevious,
span.jPag-snext,
ul.jPag-pages li span.jPag-previous-img,
ul.jPag-pages li span.jPag-next-img,
span.jPag-sprevious-img,
span.jPag-snext-img{
    height:22px;
    margin:2px;
    float:left;
    line-height:18px;
}

ul.jPag-pages li span.jPag-previous,
ul.jPag-pages li span.jPag-previous-img{
    margin:2px 0px 2px 2px;
    font-size:12px;
    font-weight:bold;
        width:10px;

}
ul.jPag-pages li span.jPag-next,
ul.jPag-pages li span.jPag-next-img{
    margin:2px 2px 2px 0px;
    font-size:12px;
    font-weight:bold;
    width:10px;
}
span.jPag-sprevious,
span.jPag-sprevious-img{
    margin:2px 0px 2px 2px;
    font-size:18px;
    width:15px;
    text-align:right;
}
span.jPag-snext,
span.jPag-snext-img{
    margin:2px 2px 2px 0px;
    font-size:18px;
    width:15px;
     text-align:right;
}
ul.jPag-pages li span.jPag-previous-img{
    background:transparent url(<?php echo SKIN ?>paginate/images/previous.png) no-repeat center right;
            }
ul.jPag-pages li span.jPag-next-img{
    background:transparent url(<?php echo SKIN ?>paginate/images/next.png) no-repeat center left;
            }
span.jPag-sprevious-img{
    background:transparent url(<?php echo SKIN ?>paginate/images/sprevious.png) no-repeat center right;
            }
span.jPag-snext-img{
    background:transparent url(<?php echo SKIN ?>paginate/images/snext.png) no-repeat center left;
            }


</style>
';
       
        return $this->css;
    }

}

