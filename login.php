<?php
session_start();
header("Access-Control-Allow-Origin: *");
$username = $_POST['username'];
$password = $_POST['password'];
$conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
$sql = "SELECT userID, username, password, position FROM User
WHERE (username = '$username' AND password='$password');";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);

    $id = $row['userID'];
    $_SESSION['ID'] = $id;
    if($row["position"]=="Manager"){
      echo "Manager";
      exit;
    }
    elseif ($row["position"]=="Admin") {
      echo "Admin";
      exit;
    }
    elseif ($row["position"]=="Volunteer") {
      echo "Volunteer";
      exit;
    }

}else {
  echo "Not Found";
  exit;
}
 ?>
