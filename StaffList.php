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
      <a class="nav-link active" id="v-pills-home-tab"  href="StaffList.php" aria-controls="" aria-selected="true">Staff List</a>
      <a class="nav-link" id="v-pills-profile-tab"  href="RecordStaff.php" aria-controls="" aria-selected="false">Register Staff</a>
    </div>
  </div>
    </header>
    <main>
      <p class="h4 mb-4">Staff List</p>
      <div class="row justify-content-center">
      <table class="mx-auto table table-hover table-responsive">
        <thead>
          <tr>
          <th scope="col" class="align-middle">Username</th>
          <th scope="col" class="align-middle">Full Name</th>
          <th scope="col" class="align-middle">Phone Number</th>
          <th scope="col" class="align-middle">Position</th>
          <th scope="col" class="align-middle">Date Joined</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
        $sql = "SELECT username, name, phone, position, dateJoined FROM User
        WHERE NOT position='Volunteer';";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['position'] . "</td>";
            echo "<td>" . $row['dateJoined'] . "</td>";
            echo "</tr>";
          }
        } ?>
      </tbody>
      </table>
    </div>
</main>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="CrysisRunner.js">
  </script>
  <script type="text/javascript">
    //recordStaff()
  </script>
</html>
