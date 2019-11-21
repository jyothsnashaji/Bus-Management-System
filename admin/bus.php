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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="/js/bootstrap.min.js"></script>
        <script src='js/jquery.min.js'></script>
        <script src='js/js.js'></script>
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
<div class='contents'>
    <div class='row justify-content-center'>
      <div class='col'>
      <span class='heading' onclick="getBusid('addBus.php');" ><i class="material-icons">add</i> Add</span>

      </div>
      <div class='col'>

      <span class='heading' onclick="getBusid('editBus.php');"><i class="material-icons">edit</i>
Edit</span>

      </div>
      <div class='col'>
      <span class='heading' onclick="getBusid('deleteBus.php');"><i class="material-icons">delete</i>
Delete</span>

      </div>
    </div>
    


<div class='container'>
<table class='table'>

	

<?php 
$sql="SELECT * FROM bus";
$res=mysqli_query($db,$sql);
while($buses=mysqli_fetch_array($res))
{
  $sql="SELECT stop as source FROM stops WHERE  bus_id= ".$buses['bus_id']." ORDER BY to_time ASC ";
  $res_=mysqli_query($db,$sql);
  $row=mysqli_fetch_array($res_);

  $sql="SELECT stop as dest FROM stops WHERE bus_id= ".$buses['bus_id']." ORDER BY to_time DESC ";
  $res_=mysqli_query($db,$sql);
  $row_=mysqli_fetch_array($res_);


  $sql="SELECT * FROM driver WHERE driver_id= ".$buses['driver_id']." ";
  $res_=mysqli_query($db,$sql);
  
  

  echo "<tr class='collapserow' onclick='toggle_collapse(";
  echo $buses['bus_id'];
  echo ")'> <td> Bus num: ";
  echo $buses['bus_id'];
  echo "</td><td>Source: ";
  echo $row['source'];
  echo" </td><td>Destination: ";
  echo $row_['dest'];
  echo "</td><td> ";
  if ($row__=mysqli_fetch_array($res_))
  {
    echo "Driver: ";
    echo $row__['name'];
  }

  else 
    {echo "<form method=post action='allotDriver.php?bus_id=";
      echo $buses['bus_id'];;
      echo "'><select name='driver_id' style='width:40%;'><option selected disabled> Driver</option>";
    $sql="SELECT driver_id FROM driver WHERE driver_id NOT IN (SELECT DISTINCT driver_id FROM bus) ";
    $re=mysqli_query($db,$sql);
    while($driver=mysqli_fetch_array($re))
    {
      echo "<option value=";
      echo $driver['driver_id'];
     echo " >";
      echo $driver['driver_id'];
      echo "</option>";
    }
    echo "</select>  <input style='width:25%;' type=submit value='Allot' ></form>";
  }
 echo "</td></tr>";
 
  $sql="SELECT * FROM stops WHERE bus_id=".$buses['bus_id']." ORDER BY to_time ASC ";
  $res_=mysqli_query($db,$sql);
  echo "<tr id='collapse";
  echo $buses['bus_id'];
  echo "' class='collapse' ><td colspan=4><div><table class='table'>";
  while($stops=mysqli_fetch_array($res_))
  { 
    echo "<tr><td>";
    echo $stops['stop'];
    echo "</td><td>";
    $to=date("H:i", strtotime($stops['to_time']));
    echo $to;
    echo "</td><td>";
    $fro=date("H:i", strtotime($stops['from_time']));
    echo $fro;
     echo "</td></tr>";
  }
  echo "</table></div></td></tr>";
}
?>
		
    </table>
</div>
</div>

<div class="modal" id="busid_modal">
  <div class="modal-dialog">

    <div class="modal-content">
    <div class="modal-header">
 
          <span class="close" onclick="document.getElementById('busid_modal').style.display='none';" >&times;</span>

      </div>
      <div class="modal-body">
      <form id='getbusid' method='post'>
        <input type=number placeholder='Enter the Bus id' name='bus_id' required>
        <div class='modal-footer'>
        <input type='submit'>
        </div>
      </form>
      </div>

     

    </div>
  </div>
</div>
</html>