<?php 
session_start();
if(!isset($_SESSION['user']))
    header('Location:admin.php')
?>

<html>
    <head>

        <title>Admin
        </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/styles.css" >
        <script src="/js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
    </head>
    <body>

    </body>

    <div class="sidenav">

        <a href="adminHome.php">Search</a>
        <a href='schedule.php'>Schedule</a>
        <a href="bus.php">Bus Services</a>
        <a href="adminprofile.php">Profile</a>
        <a href="logout_admin.php">Logout</a>
    </div>
    <div class="contents">
        <div class="container">
            <h3>Change Password</h3>
           <hr> <br>
            
            <?php
    if (isset($_SESSION['status']))
    {
        if ($_SESSION['status']=='updated')
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
 Password Updated Successfully!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
 
</div>';}
        else  if ($_SESSION['status']=='incorrect')
        {
          echo '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
 Password Incorrect
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';}
        else  if ($_SESSION['status']=='mismatch')
        { echo '         
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Passwords do not match
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }
        
    }
    
    ?>
            
            
            <form method="post" action="adminChangePassword.php">
                <label for='current'> <b>Current Password</b></label>
                <input type="password" placeholder="Enter Current Password" name='current' required>
                
                <label for='new'><b>New Password</b> </label>

                <input type="password" placeholder="Enter New Password" name='new' required>
                <label for='reenternew'> <b>Re-enter Password</b></label>

                <input type="password" placeholder="Re-enter New Password" name='reenternew' required>
                <button type="submit">Change</button>
            </form></div>

        

  
</div>   
        
    </div>
</html>