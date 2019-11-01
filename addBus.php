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
        <script src='js/jquery.min.js'></script>
        <script src='js/js.js'></script>
    </head>
    <body>
    
    

<div class="sidenav">
    <a href="adminHome.php">Search</a>
  <a href="bus.php">Bus Services</a>
  <a href="adminprofile.php">Profile</a>
  <a href="logout_admin.php">Logout</a>
</div>
<div class='contents'>
<form action='insertBus.php?bus_id=<?php echo $_POST['bus_id'];?>' method='post' >
    <div class='container'>
        <div id='stopsInput'>
            <div class='row justify-content-center'>
                <div class='col-sm-3'> 
                    <label for='stop'><b>Stop </b></label>
                </div>
                <div class='col-sm-3'> 
                    <label for='time'><b>Morning (To College)</b></label>
                </div>
                <div class='col-sm-3'> 
                    <label for='time'><b>Evening (From College)</b></label>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-sm-3'> 
                    <input type='text' name='stop[]' required>
                </div>
                <div class='col-sm-3'> 
                    <input type='time' name='totime[]' required>
                </div>
                <div class='col-sm-3'> 
                    <input type='time' name='fromtime[]' required>
                </div>
            </div>

            <div class='row justify-content-center'>
                <div class='col-sm-3'> 
                    <label for='stop'><b>Stop </b></label>
                </div>
                <div class='col-sm-3'> 
                    <label for='time'><b>Morning (To College)</b></label>
                </div>
                <div class='col-sm-3'> 
                    <label for='time'><b>Evening (From College)</b></label>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-sm-3'> 
                    <input type='text' name='stop[]' required>
                </div>
                <div class='col-sm-3'> 
                    <input type='time' name='totime[]' required>
                </div>
                <div class='col-sm-3'> 
                    <input type='time' name='fromtime[]' required>
                </div>
            </div>

            <div class='row justify-content-center'>
                <div class='col-sm-3'> 
                    <label for='stop'><b>Stop </b></label>
                </div>
                <div class='col-sm-3'> 
                    <label for='time'><b>Morning (To College)</b></label>
                </div>
                <div class='col-sm-3'> 
                    <label for='time'><b>Evening (From College)</b></label>
                </div>
            </div>
            <div class='row justify-content-center'>
                <div class='col-sm-3'> 
                    <input type='text' name='stop[]' required>
                </div>
                <div class='col-sm-3'> 
                    <input type='time' name='totime[]' required>
                </div>
                <div class='col-sm-3'> 
                    <input type='time' name='fromtime[]' required>
                </div>
            </div>
        </div>
    </div>

    <span class='button' onclick='addStop();' >Add Stop</span>
    <input type='submit' value='Add Bus'>
</form>
</div>
  
</div>
</body>
</html>