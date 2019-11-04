<?php
if(!isset($sysguvenlik)) exit("Ulaşmak istediğiniz sayfa BU değil !");
    
 $database = "Model";
	$system_path = 'Settings';
$dbaglanti = "driver";

	$application_folder = 'Controller';
	$kutuphane = 'kutuphane';
	$sistem = 'System';
	

	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	
	$system_path = rtrim($system_path, '/').'/';


	if ( ! is_dir($system_path))
	{
		exit("sistem: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}


	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
        define("HOME",dirname(__FILE__)."/");
	define("TEMA",dirname(__FILE__)."/View");
	define('EXT', '.php');
	
		define('ISLEM', str_replace("\\", "/", $application_folder));
	//URL
		
	$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	
	$site = $protocol."://".$_SERVER['HTTP_HOST'];

                
	define('SITE',$site);
	define('SAYFALAMA_ADET','20');
	define('KUTUPHANE', str_replace("\\", "/", $kutuphane));
	
	define('SISTEM', str_replace("\\", "/", $sistem));
	
	
	define('BASEPATH', str_replace("\\", "/", $system_path));
	
	define('XXX', str_replace(SELF, '', __FILE__));
        
        define('FCPATH', str_replace('\\','/',XXX));
	
	 

		
	
	define('ANADIZIN', FCPATH .str_replace("\\", "/", $application_folder));
	
	define('DATA', FCPATH .str_replace("\\", "/", $database));
	
	define('DATABAGLANTI', DATA ."/".str_replace("\\", "/", $dbaglanti));


	
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));
define('VARSAYILANSAYFA', '/index');

	define('SQL', str_replace("Settings/", "Model/", BASEPATH));

	
	
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Uygulama klos�r olu�tur: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}
		//TEMA

  	
                 define('LANG', FCPATH .'language/');
        
		 
		  
		//  define('TEMA',"\\Template");
		
		//html için 
	
		
		define('HELP', FCPATH .'Helpers');
		define('ERROR',TEMA ."/error");
               
		
		define('URL',$site."/");
		define("RESIMYOK",URL."upload/nothumb.png");
		define('UPLOAD', FCPATH.'upload/');
                define(SITE, $site."/");
                
		
		$skin = $site."/Themes/" ;
               
               define('SKIN',$skin);

               
               $skin = SKIN ."error/" ;
               define('SKIN_E',$skin);
               
               define('TEMPLATE',TEMA ."");
               
		define('KTPHN',FCPATH.$kutuphane);
		
		//################DATABASE 
		
		//ini_set("display_errors", 0);  
		
		// db baglantısı için vt seçimi
		/*
		mysql
		mysqli
		mssql
		sqlite
		pdo
		oracle
		postgresql
	
		

	
		// gelen post get veya dataları iki yontemle guvenlik kontrolu yapılır.
		// strip_tags() ve htmlentities($data, ENT_QUOTES, 'UTF-8'); 
		// iki yontem rasındaki fark strip_tags() tum html tagları temızler
		// htmlentities ise html taglarını encode ederek zararsız hale donusrturur.
		// bunlardsan hangisinin kullanılacağı
		// dataguvenliği  (strip_tags()  "s" ) veya ( htmlentities "h" ) 
		
		// class.php private $yontem = "h";
		*/
                
                


?>
