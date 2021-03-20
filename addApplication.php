<?php
session_start();
$tripid = $_POST['inputtripid'];
$userid = $_SESSION['ID'];

//connect to Database
$conn = new mysqli("localhost","root","","crysisrunnerdb");
if ($conn->connect_error){
	die("Connection failure");
}
//insert new apllication into database
$sql = "INSERT INTO application (applicationDate,userID,tripID)
VALUES ( curdate(),'$userid','$tripid')";

if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>
		alert('New application apply successfully');
		window.location = 'applyTrip.php';
		</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<script type='text/javascript'>
		alert('Oops! Error on your code.');
		window.location = 'applyTrip.php';
		</script>";
}
?>