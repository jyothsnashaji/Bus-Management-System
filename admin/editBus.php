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
        <div class='container'>
        
        <?php 
          $sql="SELECT * FROM stops WHERE bus_id=".$_POST['bus_id']." ORDER BY to_time ASC ";
          $res_=mysqli_query($db,$sql);
          if (mysqli_num_rows($res_)==0)
          {
            echo "<div class='modal' id='busid_modal' style='display:block;'>
            <div class='modal-dialog'>
          
              <div class='modal-content'>
              <div class='modal-header'>
           
              <span class='close'><a href='bus.php' style='float:right;'>&times;</a></span>
          
                </div>
                <div class='modal-body' style='text-align:center;'>
                <span style='color:red;'>Bus number does not exist</span>
                <form id='getbusid' method='post' action='editBus.php'>
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
    echo "<form action='insertEditBus.php?bus_id=";
    echo $_POST['bus_id'];
    echo "' method='post' ><div id='stopsInput'>";
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
  </div>";

  while($stops=mysqli_fetch_array($res_))
  {
  echo "
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
                <div class=''col-sm-2'><br>
                <span><a style='text-decoration:none; color:#4CAF50;' href='removeStop.php?bus_id=";
                echo $_POST['bus_id'];
                echo "&stop=";
                echo $stops['stop'];
                echo "'>Remove Stop</a></span>
                </div>

        </div>";



  }
 echo " </div> <div class='row justify-content-center'><br><br>
 <span class='btn' onclick='addStop();' >Add Stop</span>
 </div><br><br>
 <div class='row justify-content-center'>

  <input style='width:50%;'  type='submit' value='Apply Changes'>
  </div>
</form>";


  }
    
    ?>
       
    </div>
    
    </body>