<?php 
session_start();
if(!isset($_SESSION['user']))
    header('Location:admin.php');
include_once('dbConfig.php');
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
  <a href='schedule.php'>Schedule</a>
  <a href="bus.php">Bus Services</a>
  <a href="adminprofile.php">Profile</a>
  <a href="logout_admin.php">Logout</a>
</div>
<div class='contents'>
<?php

$sql="SELECT * FROM bus WHERE bus_id=".$_POST['bus_id']." ";
$res=mysqli_query($db,$sql);
if (mysqli_num_rows($res))
{
    echo "<div class='modal' id='busid_modal' style='display:block;'>
    <div class='modal-dialog'>
  
      <div class='modal-content'>
      <div class='modal-header'>
   
          <span class='close'><a href='bus.php'>&times;</a></span>
  
        </div>
        <div class='modal-body'  style='text-align:center;'>
        <span  style='color:red;'>Bus number already exists</span>
        <form id='getbusid' method='post' action='addBus.php'>
          <input type=number placeholder='Enter the Bus id' name='bus_id' required>
          <div class='modal-footer'>
          <input type='submit'>
          </div>
        </form>
        </div>
  
       
  
      </div>
    </div>
    </div>";
}
else
{
    echo "
    <form action='insertBus.php?bus_id=";
   echo $_POST['bus_id'];
   echo "' method='post' >
        <div class='container'>
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
            <div id='stopsInput'>

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
    
        <div class='row justify-content-center'>
        <span class='btn'  onclick='addStop();' >Add Stop</span>
        </div><br><br>
        <div class='row justify-content-center'>
        <input style='width:50%;' type='submit' value='Add Bus'>
        </div>
    </form> ";
}

?>

</div>
  
</div>
</body>
</html>