<?php
session_start();
header("Access-Control-Allow-Origin: *");
$name = $_GET['file_name'];

$filepath = 'uploads/' . $name;

if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);

    }
//header("Location: ManageVolunteerProfile.php");
 ?>
