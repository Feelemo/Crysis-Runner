<?php
header("Access-Control-Allow-Origin: *");
include 'printUserDetails.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CrysisRunner.css">
    <title></title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-light bg-light" id="header">
        <h1 class="navbar-brand">CRYSIS-RUNNER</h1>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $username; ?>
          </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <div class="aligning">
          <div class="dropdown-header">Position: Volunteer</div>
          <button class="dropdown-item" type="button"><a href="ManageVolunteerProfile.php">Edit User Profile</a></button>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="Logout.php">Logout</a>
          </div>
        </div>
      </div>
      </nav>
  <div class="col-2 bg-light" id="sidebar">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-home-tab"  href="applyTrip.php" role="tab" aria-controls="" aria-selected="true">Apply for trip</a>
      <a class="nav-link active" id="v-pills-profile-tab"  href="viewApplication.php"  aria-controls="" aria-selected="false">My Applications</a>
    </div>
  </div>
    </header>
    <main>
      <p class="h4 mb-4">My Application</p>
      <form action="insertTrip.php" method="post">
        <div class="row justify-content-center">
			<div class="col-auto">
				<table class="mx-auto table table-hover table-responsive">
					<?php
						//connect to database
						$conn = new mysqli("localhost","root","", "crysisrunnerdb");
						if ($conn->connect_error){
						die("Connection failure: " . mysqli_connect_error());
						}

						//fetch data from three tables in the database
						$userid = $_SESSION['ID'];
						$query = "Select location, description, crisistype, tripdate, minduration, requirements, status, remarks from trip, application where trip.tripid=application.tripid and userid = $userid";
						$result = mysqli_query($conn, $query);
					?>

					<thead>
						<tr>
							<th scope="col" class="align-middle">Destination</th>
							<th scope="col" class="align-middle">Description</th>
							<th scope="col" class="align-middle">Crysis Type</th>
							<th scope="col" class="align-middle">Trip Date</th>
							<th scope="col" class="align-middle">Minimum Duration (in days)</th>
							<th scope="col" class="align-middle">Requirement For The Trip</th>
							<th scope="col" class="align-middle">Application Status</th>
							<th scope="col" class="align-middle">Application Remarks</th>
						</tr>
					</thead>

					<?php
						// If the data exist in the table row, loop through the row from the database
						// Print application records
						if (mysqli_num_rows($result) > 0)
						{
							while($record = mysqli_fetch_array($result))
							{
					?>
					<form method="post">
					<tbody id="patientData">
						<tr>
							<td><?php echo $record['location']; ?></td>
							<td><?php echo $record['description']; ?></td>
							<td><?php echo $record['crisistype']; ?></td>
							<td><?php echo $record['tripdate']; ?></td>
							<td><?php echo $record['minduration']; ?></td>
							<td><?php echo $record['requirements']; ?></td>
							<td><?php echo $record['status']; ?></td>
							<td>
							<?php
								if($record['remarks'] == null){
									echo "Pending";
								}
								else{
									echo $record['remarks'];
								}
							?></td>
						</tr>
					</tbody>
					</form>
					<?php }} ?>
				</table>
			</div>
		</div>
		<hr class="my-4">
  </form>
</main>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>
