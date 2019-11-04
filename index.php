<?php session_start();
 ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
date_default_timezone_set("Europe/Istanbul");
$sysguvenlik = 1 ;
require_once 'sys.php';
require_once 'config.php';
require_once BASEPATH.'router.php';

require_once BASEPATH.'class.php';
new ayhan();
?>