<?php
session_start();
header("Access-Control-Allow-Origin: *");

$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];
$id = $_SESSION['ID'];
$conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
$sql = "SELECT password FROM User WHERE userID='$id';";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  if($row['password']==$oldPassword){
    if($confirmPassword==$newPassword){
      $sql2 = "UPDATE User SET password='$newPassword'
      WHERE (userID = '$id');";
      $conn->query($sql2);
      if ($conn->query($sql2) === TRUE) {
        echo "Update";
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }else{
      echo "Passwords don't match";
      exit;
    }
  }else{
    echo "Wrong Password";
    exit;
  }
}

$conn->close();
 ?>
