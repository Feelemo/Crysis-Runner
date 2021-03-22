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
          <button class="dropdown-item" type="button"><a>Edit User Profile</a></button>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="">Logout</a>
          </div>
        </div>
      </div>
      </nav>
      <div class="col-2 bg-light" id="sidebar">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="applyTrip.php" role="tab" aria-controls="" aria-selected="true">Apply for trip</a>
          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="viewApplication.php" role="tab" aria-controls="" aria-selected="false">My Applications</a>
        </div>
      </div>

    </header>
    <main>
      <p class="h4 mb-4">Username Profile</p>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Full Name: </label>
        <label class="col-sm-2 col-form-label"><?php echo $name; ?></label>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateFullNameModal">
          Update Full Name
        </button>
      </div>
      <hr>
      <div class="form-group row">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdatePasswordModal">
          Update Password
        </button>
      </div>
      <hr>
        <div class="form-group row">
          <label for="inputPhone3" class="col-sm-2 col-form-label">Phone Number:</label>
            <label for="inputPhone3" class="col-sm-2 col-form-label"><?php echo $phone; ?></label>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdatePhoneModal">
              Update Phone Number
            </button>
        </div>
        <hr>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Documents</label>
            <ul>
              <?php $volID = $_SESSION['ID']; include "printDocuments.php" ?>
            </ul>
        </div>
        <div class="form-group row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UploadDocModal">
              Update New Document
            </button>
        </div>

</main>

<!---Modals--->
<div class="modal fade" id="UpdateFullNameModal" tabindex="-1" role="dialog" aria-labelledby="UpdateFullNameModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateFullNameModalTitle">Update Full Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="updateNameForm" id="updateNameForm">
          <div class="form-group">
            <div class="form-group row">
            <label class="col-sm-4 col-form-label">Current Full Name: </label>
            <label class="col-sm-4 col-form-label"><?php echo $name; ?></label>
          </div>
            <div class="form-group row">
              <label for="inputName3" class="col-sm-4 col-form-label">New Full Name</label>
              <div class="col-sm-8">
                  <input type="text" name="newName" class="form-control mb-2" id="inputName3" placeholder="Full Name">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Full Name</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="UpdatePasswordModal" tabindex="-1" role="dialog" aria-labelledby="UpdatePasswordModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdatePasswordModalTitle">Update Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="updatePasswordForm" id="updatePasswordForm">
          <div class="form-group">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Old Password: </label>
              <div class="col-sm-8">
                <input type="password" name="oldPassword" class="form-control mb-2" id="inputOldPassword3" placeholder="Old Password">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">New Password</label>
              <div class="col-sm-8">
                <input type="password" name="newPassword" class="form-control mb-2" id="inputNewPassword3" placeholder="New Password">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Confirm Password</label>
              <div class="col-sm-8">
                <input type="password" name="confirmPassword" class="form-control mb-2" id="inputConfirmPassword3" placeholder="New Password">
              </div>
            </div>
            </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Password</button>
      </div>
      </form>
    </div>
  </div>
</div>

  <div class="modal fade" id="UpdatePhoneModal" tabindex="-1" role="dialog" aria-labelledby="UpdatePhoneModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UpdatePhoneModalTitle">Update Phone Number</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form name="updatePhoneForm" id="updatePhoneForm">
        <div class="modal-body">

            <div class="form-group">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Current Full Name: </label>
              <label class="col-sm-4 col-form-label"><?php echo $phone; ?></label>
            </div>
              <div class="form-group row">
                <label for="inputPhoneNum3" class="col-sm-4 col-form-label">New Phone Num</label>
                <div class="col-sm-8">
                    <input type="tel" name="newPhoneNum" class="form-control mb-2" id="inputNewPhone3" placeholder="xxx-xxxxxxxx"  pattern="[0-9]{3}-[0-9]{8}">
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update Phone Number</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="UploadDocModal" tabindex="-1" role="dialog" aria-labelledby="UploadDocModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UploadDocModalTitle">Upload Document</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form name="docUpload" id="docUpload" method="post" enctype="multipart/form-data" action="UploadDocument.php">
        <div class="modal-body">

            <div class="form-group">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Expiry Date: </label>
              <input type="date" name="expiryDate" class="form-control col-sm-4 mb-2" id="inputDate3">
            </div>
              <div class="form-group row">
                <label for="inputType3" class="col-sm-4 col-form-label">Document Type: </label>
                <select name="documentType" class="form-control col-sm-4" id="inputType3">
                  <option value="PASSPORT">Passport</option>
                  <option value="CERTIFICATE">Certificate</option>
                  <option value="VISA">Visa</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Upload File</label>
              <input type="file" name="document" class="form-control-file" id="document">
              <small>If Certificate, file name should be what is for</small>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save File</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="CrysisRunner.js">
  </script>
  <script type="text/javascript">
    updateFullName()
    updatePassword()
    updatePhone()
    //uploadDoc()
  </script>
</html>
