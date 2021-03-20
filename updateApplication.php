<?php
session_start();


//connect to Database
$conn = new mysqli("localhost","root","","crysisrunnerdb");
if ($conn->connect_error){
	die("Connection failure");

$sql = "INSERT INTO trip (description,crisistype,tripDate,location,minVolunteers,maxVolunteers,minDuration,requirements,staffID)
VALUES ('$tripDescription','$tripType','$tripDate','$tripDestination','$tripMin','$tripMax','$tripDuration','$tripRequirement','$staffid')";

if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>
		alert('Application update successfully');
		window.location = 'manageApplication.php';
		</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<script type='text/javascript'>
		alert('Oops! Error on your code.');
		window.location = 'manageApplication.php';
		</script>";
}
?>