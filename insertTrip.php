<?php
session_start();
$tripDate = $_POST['Date'];
$tripDestination = $_POST['Destination'];
$tripDescription = $_POST['Description'];
$tripMin = $_POST['Min'];
$tripMax = $_POST['Max'];
$tripDuration = $_POST['Duration'];
$tripType = $_POST['Type'];
$tripRequirement = $_POST['Requirement'];
$staffid = $_SESSION['ID'];


//connect to Database
$conn = new mysqli("localhost","root","","crysisrunnerdb");
if ($conn->connect_error){
	die("Connection failure");
}
//insert new testkit into database
$sql = "INSERT INTO trip (description,crisistype,tripDate,location,minVolunteers,maxVolunteers,minDuration,requirements,staffID)
VALUES ('$tripDescription','$tripType','$tripDate','$tripDestination','$tripMin','$tripMax','$tripDuration','$tripRequirement','$staffid')";

if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>
		alert('New trip create successfully');
		window.location = 'OrganizeTrip.php';
		</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<script type='text/javascript'>
		alert('Oops! Error on your code.');
		window.location = 'OrganizeTrip.php';
		</script>";
}
?>