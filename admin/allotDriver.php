<?php
session_start();
if(!isset($_SESSION['user']))
    header('Location:admin.php');
include_once('dbConfig.php');

$sql="UPDATE bus SET driver_id=".$_POST['driver_id']." WHERE bus_id= ".$_GET['bus_id']." ";
$res=mysqli_query($db,$sql);
if($res)
{
    header('Location:bus.php');

}
else{
    echo $db->error;
}



?>