<?php
//before the include statement, put $volID = (the volunteers ID)
$conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
$sql = "SELECT expiryDate, documentName, documentType FROM Document
WHERE userID='$volID';";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)){
    echo "<li><a href='DownloadDoc.php?file_name=" . $volID . "/" . $row['documentName'] . "'>" .
    $row['documentType'] . ": " . $row['documentName'] . " | Exp Date: " . $row['expiryDate'] . "</a></li>";
  }
}
 ?>
