<?php



include 'ez_sql_core.php';
include 'ez_sql_mysql.php';
return
//mysql_connect(DB_HOST,DB_USER,DB_PASS,true) ;
$db = new ezSQL_mysql( DB_USER, DB_PASS, DB_NAME, DB_HOST );


//include 'sql_for_tr.php';


/*
$User = $db->get_row("SELECT baslik, metin FROM slayt WHERE id = 4");

 echo $user->baslik;
 echo $user->metin;

// Tek değişken için 
 $var = $db->get_var("SELECT count(*) FROM slayt");

   echo $var; 
   
   //Birden çok sonuç seçin
   
     $results = $db->get_results("SELECT baslik, metin  FROM slayt");

 foreach ($results as $user) {
     echo $user->baslik;
     echo $user->metin;
 } 
 
 
 //Bir sütun seçin
 
   foreach ($db->get_col("SELECT baslik, metin  FROM slayt", 0) as $isim) {
             echo $baslik;
 } 
 // $db->debug();
 $baslik = "ayhan";
 
  $ekle = $db->query("INSERT INTO slayt (baslik) VALUES ('$baslik')");
 echo $db->insert_id;
 
 $db->query("UPDATE slayt SET baslik='deneme' WHERE id=70");
 */
 
?>