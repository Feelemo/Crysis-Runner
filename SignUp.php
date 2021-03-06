<?php
session_start();
header("Access-Control-Allow-Origin: *");
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

      </nav>

    </header>
    <main>
      <p class="h4 mb-4">Sign Up</p>
      <form name="recordVolForm" id="recordVolForm" method="post">
        <div class="form-group row">
          <label for="inputUsername3" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
              <input type="text" name="username" class="form-control" id="inputUsername3" placeholder="Username">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPhone3" class="col-sm-2 col-form-label">Phone Number</label>
          <div class="col-sm-10">
            <input type="tel" name="phoneNum" class="form-control" id="inputPhone3" placeholder="xxx-xxxxxxxx"  pattern="[0-9]{3}-[0-9]{8}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputName3" class="col-sm-2 col-form-label">Full Name</label>
          <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="inputName3" placeholder="Full Name">
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
    recordVolunteer()
  </script>
</html>
