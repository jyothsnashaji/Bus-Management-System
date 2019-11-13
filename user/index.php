
<?php
// remove all session variables
session_unset();

// destroy the session
if(isset($_SESSION))
{session_destroy();}
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>NIT-C BUS PORTAL</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>

        <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">

                    <div class="col-12 user-img">
                        <img src="images/avatar.png">
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
