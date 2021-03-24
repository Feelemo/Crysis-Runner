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
    <title>Record Staff</title>
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
          <div class="dropdown-header">Position: Manager</div>
          <button class="dropdown-item" type="button"><a href="ManageManagerProfile.php">Edit User Profile</a></button>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="Logout.php">Logout</a>
          </div>
        </div>
      </div>
      </nav>
  <div class="col-2 bg-light" id="sidebar">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab"  href="" role="tab" aria-controls="" aria-selected="true">Item 1</a>
      <a class="nav-link" id="v-pills-profile-tab"  href="" role="tab" aria-controls="" aria-selected="false">Item 2</a>
    </div>
  </div>
    </header>
    <main>
      <p class="h4 mb-4">Record CRS Staff</p>
      <form name="recordStaffForm" id="recordStaffForm" method="post">
        <div class="form-group row">
          <label for="inputUsername3" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
              <input type="text" name="username" class="form-control" id="inputUsername3" placeholder="Username" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
          </div>
        </div>
      <div class="form-group row">
        <label for="inputPhone3" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
          <input type="tel" name="phoneNum" class="form-control" id="inputPhone3" placeholder="xxx-xxxxxxxx" required pattern="[0-9]{3}-[0-9]{8}">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputName3" class="col-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="inputName3" placeholder="Full Name" required>
        </div>
      </div>
      <div class="form-group row">
          <legend class="col-form-label col-sm-2 pt-0">Position</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="position" id="gridRadios1" value="Manager" checked>
              <label class="form-check-label" for="gridRadios1">
                Manager
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="position" id="gridRadios2" value="Admin">
              <label class="form-check-label" for="gridRadios2">
                Admin
              </label>
            </div>
          </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </div>
  </form>
</main>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="CrysisRunner.js">
  </script>
  <script type="text/javascript">
    recordStaff()
  </script>
</html>
