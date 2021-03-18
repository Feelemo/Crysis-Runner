function login(){
  $(function () {

        $('#logInForm').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'http://localhost/Crysis-Runner/login.php',
            data: $('#logInForm').serialize(),
            success: function (position) {
              console.log(position);
              if(position == "Manager"){
                window.location.href = "RecordStaff.php";
              }
              if(position == "Admin"){
                window.location.href = "OrganizeTrip.html";
              }
              if(position == "Volunteer"){
                window.location.href = "VolunteerMenu.php";
              }
              if(position == "Not Found"){
                // let notification = document.getElementsByTagName('small')[0];
                // notification.style.display = '';
                // notification.innerHTML = "Username or Password Incorrect!";
              }
            },
            error: function(datas){
              alert('form error');
            }
          });

        });

      });
}

function recordStaff(){
  $(function () {

        $('#recordStaffForm').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'http://localhost/Crysis-Runner/InsertStaff.php',
            data: $('#recordStaffForm').serialize(),
            success: function (staff) {
              console.log(staff);
              if(staff == "Added"){
                alert("Staff Added");
              }
              if(staff == "Exists"){
                alert("This Staff exists");
              }
            },
            error: function(datas){
              alert('form error');
            }
          });

        });

      });
}

function recordVolunteer(){
  $(function () {

        $('#recordVolForm').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'http://localhost/Crysis-Runner/InsertVolunteer.php',
            data: $('#recordVolForm').serialize(),
            success: function (staff) {
              console.log(staff);
              if(staff == "Added"){
                alert("Staff Added");
                window.location.href = "login.html";
              }
              if(staff == "Exists"){
                alert("This username is already taken");
              }
            },
            error: function(datas){
              alert('form error');
            }
          });

        });

      });
}

function updateFullName(){
  $(function () {

        $('#updateNameForm').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'http://localhost/Crysis-Runner/UpdateName.php',
            data: $('#updateNameForm').serialize(),
            success: function (name) {
              console.log(name);
              if(name == "Update"){
                alert("Name Updated");
                location.reload();
              }
            },
            error: function(datas){
              alert('form error');
            }
          });

        });

      });
}
function updatePassword(){
  $(function () {

        $('#updatePasswordForm').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'http://localhost/Crysis-Runner/UpdatePassword.php',
            data: $('#updatePasswordForm').serialize(),
            success: function (name) {
              console.log(name);
              if(name == "Update"){
                alert("Password Updated");
                location.reload();
              }
              if(name == "Passwords don't match"){
                console.log("pass no match");
              }
              if(name == "Wrong Password"){
                console.log("Wrong Password");
              }
            },
            error: function(datas){
              alert('form error');
            }
          });

        });

      });
}
function updatePhone(){
  $(function () {

        $('#updatePhoneForm').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'http://localhost/Crysis-Runner/UpdatePhoneNum.php',
            data: $('#updatePhoneForm').serialize(),
            success: function (name) {
              console.log(name);
              if(name == "Update"){
                alert("Phone Number Updated");
                location.reload();
              }
            },
            error: function(datas){
              alert('form error');
            }
          });

        });

      });
}
