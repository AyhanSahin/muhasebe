<?php
include('dompdf_config.inc.php'); 

$buff = file_get_contents('../applications.html');
$dompdf = new DOMPDF();
$dompdf->load_html($buff);
$dompdf->render();
$dompdf->stream("sample.pdf");


$dompdf->save_file = TRUE; // Save the file or not



?>
