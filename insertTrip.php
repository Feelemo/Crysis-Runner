<?php
session_start();

$tripDate = $_POST["Date"];
$tripDestination = $_POST["Destination"];
$tripDescription = $_POST["Description"];
$tripMin = $_POST["Min"];
$tripMax = $_POST["Max"];
$tripDuration = $_POST["Duration"];
$tripType = $_POST["Type"];
$tripRequirement = $_POST["Requirement"]
$staffid = $_SESSION["UserID"];

//connect to Database
$conn = new mysqli("localhost","root","","crysisrunnerdb");
if ($conn->connect_error){
	die("Connection failure");
}

//insert new testkit into database
$sql = "INSERT INTO trip (description,crisistype,tripDate,location,minVolunteers,maxVolunteers,minDuration,requirements,staffID)
VALUES ('$tripDescription','$tripType','$tripDestination','$tripMin','$tripMax','$tripDuration','$tripRequirement','$staffID')";

if ($conn->query($sql) === TRUE) {
  echo "New trip created successfully";
  echo "<script type='text/javascript'>
		window.location = 'Crysis-Runner/insertTrip.php';
		</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<script type='text/javascript'>
		window.location = 'Crysis-Runner/insertTrip.php';
		</script>";
}
}
?>