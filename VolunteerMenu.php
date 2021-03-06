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
          <a class="dropdown-item text-danger" href="">Logout</a>
          </div>
        </div>
      </div>
      </nav>
  <div class="col-2 bg-light" id="sidebar">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="" role="tab" aria-controls="" aria-selected="true">Item 1</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="" role="tab" aria-controls="" aria-selected="false">Item 2</a>
    </div>
  </div>
    </header>
    <main>
    <h1>Just a placeholder for now</h1>
    </main>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>
