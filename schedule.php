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

    

    <div class="sidenav">

        <a href="adminHome.php">Search</a>
        <a href='schedule.php'>Schedule</a>
        <a href="bus.php">Bus Services</a>
        <a href="adminprofile.php">Profile</a>
        <a href="logout_admin.php">Logout</a>
    </div>
    <div class="contents">


    </div>
</body>
</html>