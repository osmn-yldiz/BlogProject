<?php

include 'config.php';

if($_SESSION['userID'] > 0) {
    $file_url = $URL.'/uploads/files/'.$_GET['url'];
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
    readfile($file_url);
}
else {
    print "dosyayı görüntülemeye yetkin yok";
}

?>