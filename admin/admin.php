
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

<html>
    <head>
        <title> Admin Login
        </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
         <link rel="stylesheet" href="css/styles.css" >
         <link rel="stylesheet" href="../user/css/w3.css" >
        <script src="/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container" style="width:40%;" >

            <form  action="admin_login.php" method="post">
                <div class="imgcontainer">

                    <img src="images/avatar.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit">Login</button>

                </div>


            </form>
        </div>


    </body>

</html>
