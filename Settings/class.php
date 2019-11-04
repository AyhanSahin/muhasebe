<?php
                        
class ayhan {
		
    private $deger = "sistem";
    // dataguvenliği  (strip_tags()  "s" ) veya ( htmlentities "h" ) 
    public $yontem = "h" ,$head = array(),$class , $data , $post;
    public static $fnc;
    public static $dil;
    
    
    public static $obje;
            
    function head(){
    
        return (OBJECT)$this->head;
    }
               
                        
       static function language(){
            
          if(isset($_SESSION["dil"])){
                ayhan::$dil = json_decode(file_get_contents(LANG.'web/'.$_SESSION["dil"].'json'));
            
            }  
            else{
               
             ayhan::$dil = json_decode(file_get_contents(LANG.'web/tr.json'));   
            }
        }
         static function userlanguage(){
            
            if(isset($_SESSION["dil"])){
                ayhan::$dil = json_decode(file_get_contents(LANG.'user/'.$_SESSION["dil"].'json'));
            
            }  
            else{
               
             ayhan::$dil = json_decode(file_get_contents(LANG.'user/tr.json'));   
            }
        }
         static function adminlanguage(){
            
            if(isset($_SESSION["dil"])){
                ayhan::$dil = json_decode(file_get_contents(LANG.'admin/'.$_SESSION["dil"].'json'));
            
            }  
            else{
               
             ayhan::$dil = json_decode(file_get_contents(LANG.'admin/tr.json'));   
            }
        }
    
    
    function request(){
       global $request ;
       return $request;
    }

    public function post(){
        global $post ;
        return $post;
    }
    
    
  public static function functionName() {
        
        return self::$fnc;
        
    }

  public static function set_obje($obj) {
        
       
      self::$obje = $obj;
        
    }
	
  public static function get_obje() {
        
       
      return self::$obje ;
        
    }
			
		
    function link($link){
                        
       

        $link = trim($link);
        $r = explode(" ",$link);
        
        global $seg ;
        $seg = $r;
        $adet = count($r); 
            if($r[0]=="") {

               $page = str_replace("/", "", VARSAYILANSAYFA) ;
                       
                include_once FCPATH .ISLEM . VARSAYILANSAYFA .EXT ;
                
                
                new $page($page);


                    //set error handler
                    //@eval($d);

            }
              

            else  {
                $sayfa = $r[0];

                //dizinin ilk  elamanını siliyoruz........... */
                array_shift($r);
                if(isset($r[0])):
                //dizinin ilk  elamanını siliyoruz........... */
                $fonksiyon =  $r[0];
                
                self::$fnc = $fonksiyon ;
                array_shift($r);
                $data["fonksiyon"] = $fonksiyon ;
                unset($fonksiyon);
                else:
                          $data["fonksiyon"] = "ayhan" ;
                endif;
                //#################################
                //  SAYFA ÇA�?RILIRSA VE DATA GÖNDERİLİRSE İ�?LEME GİRECEK
                //#################################			
                    if (file_exists(FCPATH .ISLEM ."/" .$sayfa .EXT)){
                        $sayi = @count($r);
                            if($sayi > 0){
                                $deger = $r;
                                $c = 0;
                                    for($i=1; $sayi > $i;$i+=2){
                                        if($this->yontem == "h"){
                                            $data[$deger[$c]] = htmlentities($deger[$i], ENT_QUOTES, 'UTF-8') ;
                                        }
                                        else if($this->yontem == "s"){
                                            $data[$deger[$c]] = strip_tags($deger[$i]) ; 
                                        }
                                        else {
                                            $data[$deger[$c]] = $deger[$i] ;	
                                        }

                                                            $c += 2;
                                    }
                                }			

                            if(!empty($_POST)){
                                
                                
                                foreach($_POST as $key => $value){
                                    if($this->yontem == "h"){
                                        $p[$key] = $data[$key] = htmlentities($value, ENT_QUOTES, 'UTF-8') ;
                                    }
                                    else if($this->yontem == "s"){
                                        $p[$key] = $data[$key] = strip_tags($value) ;
                                    }
                                    else {
                                        $p[$key] = $data[$key] = $value ;
                                    }
                                }
                            }
                            if(!empty($_GET)){
                                
                              
                                
                                foreach($_GET as $key => $value){
                                    if($this->yontem == "h"){
                                             $data[$key] = htmlentities($value, ENT_QUOTES, 'UTF-8') ;
                                    }
                                    else if($this->yontem == "s"){
                                            $data[$key] = strip_tags($value) ;
                                    }
                                    else {
                                            $data[$key] = $value ;
                                    }

                                }
                            }

                            if(isset($data)){
                                
                                global $sreq;
                                $sreq = $_REQUEST;
                                
                                
                               global $post;

                               unset($post['fonksiyon']);
                               $p="";
                               $p = (OBJECT)$p;
                               $data = (object)$data;
                               $post = $data ;
                               global $request;
                               $request = $p;

                               //global $data;
                             }

                        include_once FCPATH .ISLEM ."/" .$sayfa .EXT  ;
                        $sinif = explode(".",$sayfa);
                        $sinif = str_replace("-","_",$sinif[0]);
                        $this->post = $p;
                        $this->data = $post;

                       // var_dump($this->data);



                        new $sinif($data->fonksiyon);
                        
                    }
                    else{
                        // include_once ERROR ."\\404.php"  ;
                         /* hata sayfasına yonlendır */
                        exit();
                    }
             }	
        }

	

		
	
	
    function __construct(){
			
			if ( ! isset($_SERVER['REQUEST_URI']) OR ! isset($_SERVER['SCRIPT_NAME'])){
				return '';
			}
				//REQUEST_URI  ——— Çalıştırılan ve çağrılan dosyanın yolu.
						$uri = $_SERVER['REQUEST_URI'];
				// SCRIPT_NAME çalıştırlan dosyanın ismini verir.
			if (strpos($uri, $_SERVER['SCRIPT_NAME']) === 0){
				$uri = substr($uri, strlen($_SERVER['SCRIPT_NAME']));
			}
			elseif (strpos($uri, dirname($_SERVER['SCRIPT_NAME'])) === 0){
				$uri = substr($uri, strlen(dirname($_SERVER['SCRIPT_NAME'])));
			}
				//get yontemi ilemi veri gonderilmiş
			if (strncmp($uri, '?/', 2) === 0){
				$uri = substr($uri, 2);
			}
				$parts = preg_split('#\?#i', $uri, 2);
				$uri = $parts[0];
			if (isset($parts[1])){
				// QUERY_STRING ——— Formdaki GET metodu ile gönderilen bilgileri tutar.
				$_SERVER['QUERY_STRING'] = $parts[1];
				parse_str($_SERVER['QUERY_STRING'], $_GET);
			}
			else{
				$_SERVER['QUERY_STRING'] = '';
				$_GET = array();
			}
			if ($uri == '/' || empty($uri) || $uri == '//' || $uri == '///' || $uri == '////'){
				$this->link("");	
				return '/';
			}
				$uri = parse_url($uri, PHP_URL_PATH);
				$url = trim($uri);
				$url = str_replace('/', ' ', $url);
				$this->link($url);
                                
                                
                                
                                
				
		}
	
	

        }
  
        
  
class controller {
    
    public $segment;
    
    public $val ;
    
    public $lang;
    
   
            
    function __construct($run) {
        global $post;
        global $seg;
        $this->segment = $seg;
        $this->val = $post;
        $this->$run();
        if(isset($_SESSION["dil"])){
            
            
        }
        
        

   
    } 
   	
    function base_url(){

            return SITE;

    }   

    function datetime(){

            $objDateTime = new DateTime('NOW');
            return
             $objDateTime->format('Y-m-d H:i:s');	

    }
function detaytarih($x){
    y-ay-gun;
   $tarih = explode("-", $x);
   
    
    
    $aylar = array(1=>'Ocak',2=>'Şubat',3=>'Mart',4=>'Nisan',5=>'Mayıs',6=>'Haziran',7=>'Temmuz',8=>'Ağustos',9=>'Eylül',10=>'Ekim',11=>'Kasım',12=>'Aralık');
    $t = intval($tarih[1]);
                        
    return $tarih[2]." ".$aylar[$t]." ".$tarih[0];
    
}

    function datetimescren($date=""){

            $objDateTime = new DateTime($date);
            return
            $objDateTime->format('d F Y');	
    }
    
    
      function FileIn($page){
                        
                        
        if (file_exists(HELP."/" .$page.EXT)){
            include_once HELP. "/" .$page.EXT ;

        }
        else{
          include_once ERROR ."/404.php"  ;
            /* eroor sayfasına yonlendır
             exit();*/
             exit();
        }

                        
        

    }
    
    function help($page,$deger=''){
                        
                        
        if (file_exists(HELP."/" .$page.EXT)){
            include_once HELP. "/" .$page.EXT ;

        }
        else{
          include_once ERROR ."/404.php"  ;
            /* eroor sayfasına yonlendır
             exit();*/
             exit();
        }

        $array_page = explode("/",$page);
        if($array_page){ $page = end($array_page);}
        if(!$deger):
           $sinif = $page."_help";
        else:
            $sinif = $page."_help(".$deger.")";
        endif;
        

        return new $sinif;
        

    }
    // kutupkaneler de calıstırılacak olan sayfalar    
    function sistem($istek){


        if (file_exists(FCPATH .SISTEM ."/".$istek.EXT)){
                        
             include_once FCPATH .SISTEM ."/".$istek.EXT  ;
             
                        
             return  new $istek;
             
                        
        }
        else{
            include_once TEMP ."\\error\error.php"  ;
                            /* eroor sayfasına yonlendırexit();*/
            exit();

   }

    } 

    function go($adres){

        echo URL.$adres;
    }
    
    function ajaxyonlendir($adres,$data=""){
       
        $_SESSION["var"] = $data;

      if ( ! preg_match('#^(\w+:)?//#i', $adres))
		{
			$uri = URL.$adres;
		}
          echo $uri;  
  
        
    }
    
    
    function RedirectUrl($adres,$data=""){
        
      session_start();
       $_SESSION["var"] = $data;

      if ( ! preg_match('#^(\w+:)?//#i', $adres))
		{
			$adres = URL.$adres;
		}
$method = 'ayhan';
		// IIS environment likely? Use 'refresh' for better compatibility
		if ($method === 'auto' && isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== FALSE)
		{
			$method = 'refresh';
		}
		elseif ($method !== 'refresh' && (empty($code) OR ! is_numeric($code)))
		{
			if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1')
			{
				$code = ($_SERVER['REQUEST_METHOD'] !== 'GET')
					? 303	// reference: http://en.wikipedia.org/wiki/Post/Redirect/Get
					: 307;
			}
			else
			{
				$code = 302;
			}
		}

		switch ($method)
		{
			case 'refresh':
                            header("HTTP/1.1 302 Moved Permanently");
				header('Refresh:0;url='.$uri);
				break;
                        case 'auto':
                            header("HTTP/1.1 302 Moved Permanently");
				header('Refresh:0;url='.$uri);
				break;    
                            
			default:
                            ?>
                            <script type="text/javascript">
                                document.location.replace('<?php echo $adres; ?>');
 
</script><?php
				
				break;
		}
		exit;
	}
      

    
    
                function dt(){
        return $this->data;

    }

    function View($page,$data=""){

        
          if (file_exists(TEMPLATE. "/" .$page.EXT)){
            if($data):    foreach($data as $key => $veri){
                    $$key = $veri;
                }
                endif;
               

               include_once TEMPLATE. "/" .$page.EXT  ;


            }
            else{
                  // echo ERROR ."/404.php"  ;

             include_once ERROR ."/404.php"  ;
                    /* eroor sayfasına yonlendır exit();*/
                exit();
            }

    }

   
	

    function api($page){
      //  $s="evdenofisdb";
        $s = APIKEY;
        return new api("$s/$page");
      
       
        
    }
    
    function Model($page,$data=""){

        if (file_exists(DATA. "/" .$page.EXT)){
                include_once DATA. "/" .$page.EXT ;
                return $this->sql($page,$data);
            }
            else{
                include_once ERROR ."/404.php"  ;
                /* eroor sayfasına yonlendır exit();*/
                 exit();
            }
    }
    
    
    
                
    function yukle($klosor,$page,$data=""){
            if($klosor == "tema"){
                if (file_exists(TEMP. "/" .$page)){
                    foreach($data as $key => $veri){
                        $$key = $veri;
                    }
                    
                    //  file_get_contents(TEMP. "/" .$page, FILE_USE_INCLUDE_PATH);
                   include_once TEMP. "/" .$page  ;
                     
                    
                }
                else{
                    include_once ERROR ."/404.php"  ;
                        /* eroor sayfasına yonlendır exit();*/
                    exit();
                }
            }


            /// BU kISIM YARDIMCI SINIF İÇİN KULLANILACAK DB DAHİL OLARAK SINIFTA KULLANILACAK		

            else if($klosor == "help"){

                if (file_exists(HELP."/" .$page)){
                    
                    include_once HELP. "/" .$page ;
                    
                    return $this->help($page);
                }
                else{
                    include_once ERROR ."/404.php"  ;
                    /* eroor sayfasına yonlendır
                     exit();*/
                     exit();
                }

            }		

            else if($klosor == "sql"){
                if (file_exists(DATA. "/" .$page)){
                    include_once DATA. "/" .$page ;
                    return $this->sql($page,$data);
                }
                else{
                    include_once ERROR ."/404.php"  ;
                    /* eroor sayfasına yonlendır exit();*/
                     exit();
                }

            }
            else if($klosor == "islem"){
                if (file_exists(ISLEM. "/" .$page)){
                    include_once ISLEM. "/" .$page ;
                    return $data;

                }
            else{
                    include_once ERROR ."/404.php"  ;
                    /* eroor sayfasına yonlendırexit();*/
                    exit();
            }
        } 
    }
	
    function sql($page,$data=''){
        $file =  explode("/",$page);
        $file = end($file);
        
        $sinif =  $file ."_sql";

        
            if($data == "")
                $sql = new $sinif($this->val);
            else 
                $sql = new $sinif($data);
        return $sql ;
            }

    function sinif($deger = ""){
            // $this->deger sistem olarak tanımlıdır.
            if ($deger){

             return new $deger;

                    }
            else {
                    return new $this->deger;
                    }
            }
	
    function guvenlik(){
	    
	     FCPATH .SISTEM ."/guvenlik".EXT;
	    
	    include_once FCPATH .SISTEM ."/guvenlik".EXT  ;
	    
	    $guvenlik = new guvenlik();

	    return $guvenlik; 
	}
				
    function kutuphaneyukle($kutuphane=""){
            include_once  FCPATH ."/kutuphane/" .$kutuphane .".php";
            $ayh = new $kutuphane;

            return $ayh;
            /* kütükhane yüklendikten sonraki çalışma şekli  kutuphane klosorunden çağrı, sayfa ile sınıf aynı olacak sınıf dahıl edıldıkten sonra funcsiyonmlara ulaşılacak. 
                    $mail = $this->kutuphaneyukle("mail");   $mail->deneme(); 
            */	
    }   
        
        
    } 
    
    
class api {
    public  static $xs;
    public function __construct($url) {
        
     api::$xs =  "http://otokontrol.tk/".$url;  
    }
    
     public static function __callStatic($method, $args) {
         
         
         //
         
        $args =  array("function"=>$method,"param"=>$args);
        
           $cookie_file_path   = "cookies.txt";
       $fields_string = http_build_query($args);
       
       
      
       
       
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_ENCODING, "UTF-8" );
        curl_setopt($ch, CURLOPT_HEADER, 0); // Get the header
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Allow redirection
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
        curl_setopt($ch, CURLOPT_URL,api::$xs);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
        curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36");
      
       //   echo curl_exec ($ch);
      return json_decode(curl_exec ($ch));
        
        //$ch = curl_init();

       

        //close connection
        curl_close($ch);
         
     }
     
    
    function re($veri=array()){
        
         $cookie_file_path   = "cookies.txt";
       $fields_string = http_build_query($veri);
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_ENCODING, "UTF-8" );
        curl_setopt($ch, CURLOPT_HEADER, 0); // Get the header
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Allow redirection
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
        curl_setopt($ch, CURLOPT_URL,$this->xs);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
        curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36");
        return json_decode(curl_exec ($ch));
        
        //$ch = curl_init();

       

        //close connection
        curl_close($ch);
            }
                        
                        
    function encode_array($args){
        if(!is_array($args)) return false;
        $c = 0;
        $out = '';
            foreach($args as $name => $value){
                if($c++ != 0) $out .= '&';
                    $out .= urlencode("$name").'=';
                if(is_array($value))
                {
                  $out .= urlencode(serialize($value));
                }else{
                  $out .= urlencode("$value");
                }
            }
        return $out . "\n";
    }

}    
    
    

class load  {
        public $mail = NULL , $pdf = NULL ,$db = NULL ;
        private $mysql = "database/mysql/index";
        private $mysqli = "database/mysqli/demo";
        private $mssql = "database/mssql/demo";
        private $sqlite = "database/sqlite/demo";
        private $pdo = "database/pdo/demo";
        private $oracle = "database/oracle8_9/demo";
        private $postgresql = "database/postgresql/demo";
        private $deger = DB_DRIVER;
        private $guvenlik = "guvenlik/guvenlik";
        
        
        
        function __construct() {
                        
            global $database;
            $this->db = $this->yukle("db");
            $database = $this->db;
          //  $this->ekle();
            
  /*          
  $c = $this->db->get_var("select analytics from google where id = 1 ");      

$bul = "&#039;";
$deg = "'";


global $analytics;
   $analytics = str_replace($bul,$deg,html_entity_decode($c));        
    */
        }
    				
	
  	
        function ekle(){
            $ip = ip2long($_SERVER["REMOTE_ADDR"]);
            $zaman  = time();
            $trh =  date("Y-m-d");
          
            $veri["ip"] = $ip;
            $veri["tarih"] = $trh;
            $veri["zaman"] = $zaman;
            
             $sil = time() - 30;
            $cogul["tarih"] = $trh;
            $cogul["adet"] = 1;


    //     $this->insert("online_user",$data); 
            
            if(!$_SESSION["quest"]){
                
             
                
                $ca = $this->db->get_var("select count(id) from cogul_ziyaretci WHERE tarih = '$trh'");
               
                if($ca >= 1){
                    
                $this->db->query("UPDATE cogul_ziyaretci SET adet = adet + 1 WHERE tarih = '$trh' ");
               
                }else{
                    
                $this->insert("cogul_ziyaretci",$cogul);
                }
                
                  $adet = $this->db->get_var("select count(id) from tekil_ziyaretci WHERE tarih = '$trh' AND ip = '$ip' ");
                 
                 if($adet < 1){
                     
                     $this->insert("tekil_ziyaretci",$veri); 
                        
                 }      
                
              $_SESSION["quest"] = $veri; 
              $this->insert("online_user",$veri); 
                            
            }
            
            else if($_SESSION["quest"]["zaman"] < $sil){
                 $this->db->query("DELETE from online_user WHERE zaman  <  '$sil' ");    
               
                $_SESSION["quest"] = ""; 
                
                
                
            } 
          
                 
        }
 
        
        
        
        function insert($tablo,$data){
            $adet = count($data);
            $i=0;
            $veri = "";
            $alan = "";
                foreach($data as $key => $value){
                    $i++;
                    $alan .= " `$key` ";
                        if($adet>$i){
                            $alan .= ", ";
                        }
                    $veri .= "'".$value."'";
                        if($adet>$i){
                            $veri .= ", ";
                        }
                } 
                
                
       //  echo $sql = "INSERT INTO $tablo  ($alan) VALUES ($veri)";
                        
            $this->db->query("INSERT INTO $tablo ($alan) VALUES ($veri)");
           
            return $this->db->insert_id;
        }	

        function update($tablo,$data,$sql=""){
            $i=0;
            $veri = "";
                $adet = count($data);
                        foreach($data as $key => $value){
                                $i++;

                                $veri .= $key ." = '". $value ."' " ; 

                                        if($adet>$i){
                                                $veri .= ", ";
                                                        }
                                } 
                        if($sql) $sql = "WHERE ".$sql ;
                                
                        
                     //  echo "UPDATE  $tablo SET  $veri  $sql";
                                 $this->db->query("UPDATE  $tablo SET  $veri  $sql");
                        }						
	
    //sistem için clasları çağırmak
  
     function yukle($istek,$parametre=""){
            if($istek == "db"){
                if($this->deger=="mysql"){
                    include_once FCPATH .SISTEM ."/" .$this->mysql .EXT  ;
                }
                if($this->deger=="mysqli"){
                    include_once FCPATH .SISTEM ."/" .$this->mysqli .EXT  ;
                }
                if($this->deger=="mssql"){
                    include_once FCPATH .SISTEM ."/" .$this->mssql .EXT  ;
                }
                if($this->deger=="sqlite"){
                    include_once FCPATH .SISTEM ."/" .$this->sqlite .EXT  ;
                }
                if($this->deger=="pdo"){
                    include_once FCPATH .SISTEM ."/" .$this->pdo .EXT  ;
                }
                if($this->deger=="oracle"){
                    include_once FCPATH .SISTEM ."/" .$this->oracle .EXT  ;
                }
                if($this->deger=="postgresql"){
                    include_once FCPATH .SISTEM ."/" .$this->postgresql .EXT  ;
                }   
                if($parametre=='cache'):

                    // Cache süresi ne zaman dolacak?
                    $db->cache_timeout = CAHE_TIMEOUT; // Verilen değer Dakika cinsinden!
                    // CACHE sabit sys.php de tanımlandı 
                    // Cache dizini
                    $db->cache_dir = CACHE;
                    //Disk önbellekleme özelliğini aç
                    // $db->cache_queries query işlemlerini önbellekler select vb
                    // $db->cache_inserts insert işlemlerini önbellekler. 		
                    $db->cache_queries    = true;
                    //$db->cache_inserts    = true;
                    $db->use_disk_cache = true;
                endif;
            return $db;

            }
				
            if($istek == "guvenlik"){

                include_once FCPATH .SISTEM ."/" .$this->guvenlik .EXT  ;
                return $guvenlik; 

            }

            else{
                include_once ERROR ."/404.php"  ;
                /* eroor sayfasına yonlendır exit();*/
                exit();

            }

        }
        
        function sistem($verí){
           
            
             if (file_exists(FCPATH .SISTEM ."/" .$verí .EXT)){
                 
                 //$yol = FCPATH .SISTEM ;
                    include_once FCPATH .SISTEM ."/" .$verí .EXT  ;
                    
                 

                }
            else{
                    
                    exit("cagrilan sistem dosyasi hatali");
            }
            
            
            
        }
	
     function help($page,$deger=''){

        if (file_exists(HELP."/" .$page.EXT)){
            include_once HELP. "/" .$page.EXT ;

        }
        else{
          include_once ERROR ."/404.php"  ;
            /* eroor sayfasına yonlendır
             exit();*/
             exit();
        }


        if(!$deger):
           $sinif = $page."_help";
        else:
            $sinif = $page."_help(".$deger.")";
        endif;
        

        return new $sinif;
        

    }
    // kutupkaneler de calıstırılacak olan sayfalar    
    
         
       }        
		 
	

			
