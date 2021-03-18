<?php
session_start();
header("Access-Control-Allow-Origin: *");

$newName = $_POST['newName'];
$id = $_SESSION['ID'];
$conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
$sql = "UPDATE User SET name='$newName'
WHERE (userID = '$id');";
$conn->query($sql);
if ($conn->query($sql) === TRUE) {
  echo "Update";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
 ?>
