<?php
session_start();
header("Access-Control-Allow-Origin: *");

// Uploads files
  // if save button on the form is clicked
    // name of the uploaded file
$expiryDate = $_POST['expiryDate'];
$docType = $_POST['documentType'];
$filename = $_FILES['document']['name'];
$userID = $_SESSION['ID'];
// destination of the file on the server
mkdir('uploads/' . $userID);
$destination = 'uploads/' . $userID . '/' . $filename;

// get the file extension
$extension = pathinfo($filename, PATHINFO_EXTENSION);

// the physical file on a temporary uploads directory on the server
$file = $_FILES['document']['tmp_name'];
$size = $_FILES['document']['size'];

if (!in_array($extension, ['zip', 'pdf', 'docx', 'txt'])) {
    echo "You file extension must be .zip, .pdf or .docx";
} elseif ($_FILES['document']['size'] > 30000000) { // file shouldn't be larger than 30Megabyte
    echo "File too large!";
} else {
    // move the uploaded (temporary) file to the specified destination
    if (move_uploaded_file($file, $destination)) {
      $conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
        $sql = "INSERT INTO Document (expiryDate, documentName, documentType, userID)
        VALUES ('$expiryDate', '$filename', '$docType', '$userID')";
        if (mysqli_query($conn, $sql)) {
            echo "File uploaded successfully";
        }
    } else {
        echo "Failed to upload file.";
    }
}
header("Location: ManageVolunteerProfile.php");
 ?>
