<?php
$filename = basename($_GET['file']);
// Specify file path.
$path = '/documents/'; // '/uplods/'
$download_file =  $path.$filename;
$download_file2 =  $filename;

print_r($download_file);
if(!empty($filename)){
    // Check file is exists on given path.
    if(file_exists($download_file))
    {
      header('Content-Disposition: attachment; filename=' . $filename);  
      readfile($download_file); 
      exit;
    }
    else
    {
      echo 'File does not exists on given path';
    }


$filename = "myfile.jpg";
$file = "/uploads/images/".$filename;
}
// header('Content-type: application/octet-stream');
// header("Content-Type: ".mime_content_type($download_file));
// header("Content-Disposition: attachment; filename=".$filename);
// while (ob_get_level()) {
//     ob_end_clean();
// }
// readfile($download_file);