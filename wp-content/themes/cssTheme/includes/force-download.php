<?php
$file_name = $_GET['file'];
$file = 'dummyfile.pdf';
file_put_contents($file, file_get_contents($file_name));
$extension = pathinfo(basename($file_name));
if ($extension['extension'] == 'pdf' || $extension['extension'] == 'docx' || $extension['extension'] == 'doc') {
    header('Content-Description: File Transfer');
    header('Content-type: application/octet-stream');
    header('Content-Length: ' . filesize($file));
    header('Content-Disposition: attachment; filename="kedia_' . $extension['filename'] . '.' . $extension['extension'] . '"');
    readfile($file);
    exit;
}
?>