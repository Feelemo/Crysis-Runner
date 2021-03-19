<?php
header("Access-Control-Allow-Origin: *");
$id = $_SESSION['ID'];
$conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
$sql = "SELECT expiryDate, documentName, documentType FROM Document
WHERE userID='$id';";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)){
    echo "<li><a href='VolDownloadDoc.php?file_name=" . $row['documentName'] . "'>" .
    $row['documentType'] . ": " . $row['documentName'] . " | Exp Date: " . $row['expiryDate'] . "</a></li>";
  }
}
 ?>
