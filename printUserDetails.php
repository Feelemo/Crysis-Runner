<?php
session_start();
$id = $_SESSION['ID'];
$conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
$sql = "SELECT username, name, phone FROM User
WHERE (userID='$id');";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
  $name = $row['name'];
  $phone = $row['phone'];
}
 ?>
