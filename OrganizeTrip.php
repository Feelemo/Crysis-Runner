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
      <a class="nav-link active" id="v-pills-home-tab"  href="OrganizeTrip.php" role="tab" aria-controls="" aria-selected="true">Organize Trip</a>
      <a class="nav-link" id="v-pills-profile-tab"  href="manageApplication.php" role="tab" aria-controls="" aria-selected="false">Manage Applications</a>
    </div>
  </div>
    </header>
    <main>
      <p class="h4 mb-4">Organize a Trip</p>
      <form action="insertTrip.php" method="post">
        <div class="form-group row">
          <label for="inputDate" class="col-sm-2 col-form-label">Trip Date</label>
          <div class="col-sm-10">
              <input type="date" name="Date" class="form-control" id="inputDate" placeholder="Date">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputDestination" class="col-sm-2 col-form-label">Destination</label>
          <div class="col-sm-10">
            <input type="text" name="Destination" class="form-control" id="inputDestination" placeholder="Destination">
          </div>
        </div>
		<div class="form-group row">
          <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-10">
            <input type="text" name="Description" class="form-control" id="inputDescription" placeholder="Description">
          </div>
        </div>
		<div class="form-group row">
          <label for="inputDescription" class="col-sm-2 col-form-label">Number of Volunteers Required</label>
		  <label for="inputDescription" class="col-sm-1 col-form-label"> Minimum</label>
          <div class="col-sm-4">
            <input type="number" name="Min" class="form-control" id="inputDescription" min="1" step="1">
          </div>
		  <label for="inputDescription" class="col-sm-1 col-form-label">Maximum</label>
		  <div class="col-sm-4">
            <input type="number" name="Max" class="form-control" id="inputDescription" min="1" step="1">
          </div>
        </div>
		<div class="form-group row">
          <label for="inputDescription" class="col-sm-2 col-form-label">Minimum Duration(in days)</label>
          <div class="col-sm-10">
            <input type="number" name="Duration" class="form-control" id="inputDescription" min="1" step="1">
          </div>
        </div>
		<div class="form-group row">
          <label for="inputDescription" class="col-sm-2 col-form-label">Requirements</label>
          <div class="col-sm-10">
            <input type="text" name="Requirement" class="form-control" id="inputDescription" placeholder="Requirements">
          </div>
        </div>
      <div class="form-group row">
          <legend class="col-form-label col-sm-2 pt-0">Crisis Type</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="Type" id="gridRadios1" value="FLOOD" checked>
              <label class="form-check-label" for="gridRadios1">
                Flood
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="Type" id="gridRadios2" value="EARTHQUAKE">
              <label class="form-check-label" for="gridRadios2">
                Earthquake
              </label>
            </div>
			<div class="form-check">
              <input class="form-check-input" type="radio" name="Type" id="gridRadios3" value="WILDFIRE">
              <label class="form-check-label" for="gridRadios3">
                Wildfire
              </label>
            </div>
          </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Organize</button>
        </div>
      </div>
  </form>
</main>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>
