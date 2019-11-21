
<?php
// remove all session variables
session_unset();

// destroy the session
if(isset($_SESSION))
{session_destroy();}

if(isset( $_GET['failedlogin'] ))
      {
        echo '
        <div class="w3-container">
          <div class="w3-panel w3-card w3-red w3-display-container">
            <span onclick="this.parentElement.style.display='."'none'".'"
            class="w3-button w3-red w3-large w3-display-topright">&times;</span>
            <h3 style="color:white">Login Failed</h3>
            <p>Please try again. If error persists, contact admin.</p>
            </div>
        </div>';
      }

 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>NIT-C BUS PORTAL</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="css/w3.css"> 
    </head>
    <body>

        <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">

                    <div class="col-12 user-img">
                        <img style="border-radius:50%;" src="images/avatar.png">
                    </div>

                    <form class="col-12" method="post" action="login.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name='username' placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">

                            <select required name="category" required>
                                <option selected value="">Choose User</option>
                                <option value="student">Student</option>
                                <option value="staff">Staff</option>
                                <option value="driver">Driver</option>
                            </select>
                        </div>
                        <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i>Login</button>
                    </form>

                    <div class="col-12 sign">
                        <a href="signup.php">Not a Member? Sign Up</a>
                    </div>

                </div>
            </div>
        </div>


    </body>
</html>
