<?php
session_start();
if(!isset($_SESSION['user']))
    header('Location:index.php');
include_once('dbConfig.php');
$busid=$_POST['busid2reg'];
$user = $_SESSION['user'];
$sql= "UPDATE passenger SET bus_id = ".$busid." WHERE passenger_id = ".$user." ";
$res=mysqli_query($db,$sql);
if ($res)
{
  header('Location: userHome.php?busAssigned');
}

header('Location: userHome.php?busNotAssigned');
?>
