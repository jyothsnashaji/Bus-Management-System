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
  <a href="bus.php">Bus Services</a>
  <a href="adminprofile.php">Profile</a>
  <a href="logout_admin.php">Logout</a>
</div>
    <div class='contents'>
        <div class='container'>
        
        <?php 

     echo "<form action='insertEditBus.php?bus_id=";
    echo $_POST['bus_id'];
    echo "' method='post' ><div id='stopsInput'>";
 
  $sql="SELECT * FROM stops WHERE bus_id=".$_POST['bus_id']." ORDER BY to_time ASC ";
  $res_=mysqli_query($db,$sql);
  while($stops=mysqli_fetch_array($res_))
  {
    echo "
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
                    <input type='text' name='stop[]'  required value='";
                    echo $stops['stop'];
                    echo "'>
                </div>
                <div class='col-sm-3'> 
                    <input type='time' name='totime[]' required value='";
                    $to=date("H:i", strtotime($stops['to_time']));
                    echo $to;
                    echo "'>
                </div>
                <div class='col-sm-3'> 
                    <input type='time' name='fromtime[]'required value=";
                    $fro=date("H:i", strtotime($stops['from_time']));
                    echo $fro;
                    echo ">
                </div>
        </div>";



  }
 echo " </div> <span class='button' onclick='addStop();' >Add Stop</span>
  <input type='submit' value='Apply Changes'>
</form>";



    ?>
       
    </div>
    
    </body>