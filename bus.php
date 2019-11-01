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
    
    </body>

<div class="sidenav">
    <a href="adminHome.php">Search</a>
  <a href="bus.php">Bus Services</a>
  <a href="adminprofile.php">Profile</a>
  <a href="logout_admin.php">Logout</a>
</div>
<div class='contents'>
    <span onclick="getBusid('addBus.php');" >Add</span>
    <span onclick="getBusid('editBus.php');">Edit</span>
    <span onclick="getBusid('deleteBus.php');">Delete</span>
    
</div>


<?php 
$sql="SELECT * FROM bus";
$res=mysqli_query($db,$sql);
while($buses=mysqli_fetch_array($res))
{
  echo $buses['bus_id'];
  $sql="SELECT * FROM stops WHERE bus_id=".$buses['bus_id']." ORDER BY to_time ASC ";
  $res_=mysqli_query($db,$sql);
  while($stops=mysqli_fetch_array($res_))
  {
    echo $stops['stop'];
    echo $stops['to_time'];
    echo $stops['from_time'];
  }
}
?>

<div class="modal" id="busid_modal">
  <div class="modal-dialog">
    <div class="modal-content">
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