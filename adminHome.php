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
    </head>
    <body>
    


<div class="sidenav">

  <a href="adminHome.php">Search</a>
  <a href='schedule.php'>Schedule</a>
  <a href="bus.php">Bus Services</a>
  <a href="adminprofile.php">Profile</a>
  <a href="logout_admin.php">Logout</a>
</div>
<div class='contents'>
<div class='container'></div>

<form action='adminHome.php' method='post'>
<div class='row justify-content-center'>
    <div class='col'>
        <label for='for'><b>Search For</b></label>
        <select name='for'>
            <option  value='student'>Student</option>
            <option value='staff'>Staff</option>
            <option value='driver'>Driver</option>
        </select>
    </div>
    <div class='col'>
        <label name='id'><b>ID</b></label>
        <input type='text' name='id'>
    </div>
    <div class='col'>
        <input type=submit>
    </div>
</div>

</form>
</div>

</div>

</body>

</html>