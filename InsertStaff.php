<?php
session_start();
header("Access-Control-Allow-Origin: *");

$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phoneNum'];
$name = $_POST['name'];
$position = $_POST['position'];
$dateJoined = date("Y-m-j");
$conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
$sql = "SELECT username FROM User WHERE username='$username';";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
  echo "Exists";
  exit;
}
else{
  $sql2 = "INSERT INTO User(username, password, name, phone, position, dateJoined)
  VALUES ('$username', '$password', '$name', '$phone', '$position', '$dateJoined');";
  if($conn->query($sql2)===True){
    echo "Added";
  }else{echo "Error: " . $sql2 . "<br>" . $conn->error . "<br>";}
}
$conn->close();
?>
