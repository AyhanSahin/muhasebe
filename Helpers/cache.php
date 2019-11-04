<?php 
   



class cache_help 
{
    public $start_time;
    public $cache_file;
    public $to_create;
    public $cache_time;
    public $dakika=0;


    function Start()
    {
        $this->to_create = TRUE;
        $this->cache_time = 60 * 1* $this->dakika; // use cache files for 60 seconds
       $str = $_SERVER['REQUEST_URI'];
        $this->start_time = microtime();
        
        //$str = $_SERVER['REQUEST_URI'];

        foreach ($_GET as $k => $v)
            $str .= $k . $v;

        foreach ($_POST as $k => $v)
            $str .= $k . $v;
            
       
           
              if($_SESSION["dil"]){
              $str .= $_SESSION["dil"];  
            }
            
              if($_SESSION["user_id"]){
              $str .= $_SESSION["user_id"];  
            }
     if($_SESSION["mobile"]){
              $str .= $_SESSION["mobile"];  
            }
        $this->cache_file = HOME . "cache/" . md5($str) . ".html";
        if (file_exists($this->cache_file) && (time() - $this->cache_time < filemtime($this->cache_file)))
        {
            include($this->cache_file);
            
            
            $this->to_create = FALSE;
            exit;
        }

        ob_start();
    }
	function list_files($dir,$zmn)
	{	
		
		if(is_dir($dir))
		{
			if($handle = opendir($dir))
			{
				while(($file = readdir($handle)) !== false)
				{
					if($file != "." && $file != ".." && $file != "Thumbs.db")
					{
						
					
						if ($zmn > filemtime($dir.$file) ){
							unlink($dir.$file);
						}
					}
				}
				closedir($handle);
			}
		}
	}
    function End()
    {
        $fp = fopen($this->cache_file, 'w');
        fwrite($fp, ob_get_contents());
        fclose($fp);
        ob_end_flush();
        
		$zmn = time() - ($this->cache_time * 2);
		$dir = $_SERVER['DOCUMENT_ROOT'] . "/cache/";
		$this->list_files($dir,$zmn);
       
    }

    function __destruct()
    {
        if ($this->to_create)
            $this->End();
    }
}				
		