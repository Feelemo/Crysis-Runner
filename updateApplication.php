<?php
session_start();


//connect to Database
$conn = new mysqli("localhost","root","","crysisrunnerdb");
if ($conn->connect_error){
	die("Connection failure");
}
if($_POST['Remarks'] == ""){
	$remark = "-";
}
else{
	$remark = $_POST['Remarks'];
}
$ACCEPTED = "ACCEPTED";
$result = $_POST['result'];
$applicationid = $_POST['applicationid'];
$exceedNumber = "Exceed volunteer number.";
$exceedNumberResult = "REJECTED";
$tripid = $_POST['tripid'];
$NEW = "NEW";
$sql = "Update application set remarks = '$remark', status = '$result' where applicationid = '$applicationid'";

if ($conn->query($sql) === TRUE) {
	$sql2 ="select COUNT(*) from application where STATUS = '$ACCEPTED' and tripid = '$tripid';";
	$applicationNumber = $conn->query($sql2);
	$sql3 ="select maxVolunteers from trip where tripid = '$tripid';";
	$maxVol = $conn->query($sql3);
	if($applicationNumber == $maxVol){
		$sql4 = "Update application set remarks = '$exceedNumber', status = '$exceedNumberResult' where tripid = '$tripid' and status ='$NEW';";
		$conn->query($sql4);
	}
		
  echo  "<script type='text/javascript'>
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