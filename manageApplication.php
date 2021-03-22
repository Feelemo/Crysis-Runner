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
          <div class="dropdown-header">Position: CRS Staff</div>
          <button class="dropdown-item" type="button"><a href="ManageAdminProfile.php">Edit User Profile</a></button>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="">Logout</a>
          </div>
        </div>
      </div>
      </nav>
  <div class="col-2 bg-light" id="sidebar">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link" id="v-pills-home-tab"  href="OrganizeTrip.php" role="tab" aria-controls="" aria-selected="true">Organize Trip</a>
      <a class="nav-link active" id="v-pills-profile-tab"  href="manageApplication.php" role="tab" aria-controls="" aria-selected="false">Manage Applications</a>
    </div>
  </div>
    </header>
    <main>
      <p class="h4 mb-4">Organize a Trip</p>
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
						$query = "Select applicationid, user.userid, name, phone, location, tripdate, description, requirements, minduration, status,trip.tripid from user, application, trip where user.userid=application.userid and application.tripid=trip.tripid and trip.staffid = $userid order by applicationid";
						$result2 = mysqli_query($conn, $query);
					?>
				
					<thead>
						<tr>
							<th scope="col" class="align-middle">Volunteer Name</th>
							<th scope="col" class="align-middle">Phone Number</th>
							<th scope="col" class="align-middle">List of Document</th>
							<th scope="col" class="align-middle">Destination</th>
							<th scope="col" class="align-middle">Trip Date</th>
							<th scope="col" class="align-middle">Trip Description</th>
							<th scope="col" class="align-middle">Requirements</th>
							<th scope="col" class="align-middle">Minimum Duration(in days)</th>
							<th scope="col" class="align-middle">Status</th>
							<th scope="col" class="align-middle"></th>
						</tr>
					</thead>
					
					<?php
						// If the data exist in the table row, loop through the row from the database
						// Print application records
						if (mysqli_num_rows($result2) > 0)
						{
							while($record = mysqli_fetch_array($result2))
							{
					?>
					<tbody id="patientData">
						<tr>
							<td><?php echo $record['name']; ?></td>
							<td><?php echo $record['phone']; ?></td>
							<td><?php $volID = $record['userid']; include "printDocuments.php" ?></td>
							<td><?php echo $record['location']; ?></td>
							<td><?php echo $record['tripdate']; ?></td>
							<td><?php echo $record['description']; ?></td>
							<td><?php echo $record['requirements']; ?></td>
							<td><?php echo $record['minduration']; ?></td>
							<td><?php echo $record['status']; ?></td>
							<td>
							<?php 
								if($record['status'] == "NEW"){?>
									<button name="Manage" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $record['applicationid']; ?>">Manage</button>
								<?php } ?>
							</td>
						</tr>
					</tbody>

<div id="myModal<?php echo $record['applicationid']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		<h4 class="modal-title">Update Application Result</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		<form action="updateApplication.php" method="POST">
        <div class="form-group row">
			<label  class="col-sm-6 col-lg-6 col-form-label">Application ID:</label>
				<div class="col-sm-12 col-lg-6">
					<input type="text" class="form-control" value="<?php echo $record['applicationid']; ?>" name="applicationid" readonly><br>
				</div>
			<label  class="col-sm-6 col-lg-6 col-form-label">Trip ID:</label>
				<div class="col-sm-12 col-lg-6">
					<input type="text" class="form-control" value="<?php echo $record['tripid']; ?>" name="tripid" readonly><br>
				</div>
			<label  class="col-sm-6 col-lg-6 col-form-label"> Volunteer name:</label>
				<div class="col-sm-12 col-lg-6">
					<input type="name" class="form-control" value="<?php echo $record['name']; ?>" name="name" readonly><br>
				</div>

			<label  class="col-sm-6 col-lg-6 col-form-label">Destination</label>
				<div class="col-sm-12 col-lg-6">
					<input type="text" class="form-control" value="<?php echo $record['location']; ?>" name="destination" readonly><br>
				</div>

										
			<label  class="col-sm-6 col-lg-6 col-form-label">Trip Date</label>
				<div class="col-sm-12 col-lg-6">
					<input type="text" class="form-control" value="<?php echo $record['tripdate']; ?>" name="date" readonly><br>
				</div>
          <label for="inputDescription" class="col-sm-2 col-form-label">Remarks</label>
          <div class="col-sm-10">
            <input type="text" name="Remarks" class="form-control" id="inputRemarks" placeholder="Remarks">
          </div>
        </div>
		<label  class="col-sm-6 col-lg-6 col-form-label"><i class="fas fa-poll-h"></i>Result</label>
				<div class="col-sm-12 col-lg-6">
				<!--let user choose result-->
					<select class="form-control" name="result" id="result">
						<option value ="ACCEPTED">ACCEPTED</option>
						<option value ="REJECTED">REJECTED</option>
					</select><br>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Application Result</button>
      </div>
	  </form>
    </div>

  </div>
</div>

					<?php }} ?>
				</table>
			</div>
		</div>
		<hr class="my-4">
</main>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>