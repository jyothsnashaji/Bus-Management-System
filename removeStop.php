<?php
session_start();
if(!isset($_SESSION['user']))
header('Location:admin.php');
include_once('dbConfig.php');

$sql="DELETE FROM stops WHERE bus_id=".$_GET['bus_id']." AND stop='".$_GET['stop']."' ";
$res=mysqli_query($db,$sql);
echo $sql;
if ($res)
{
    $_POST['bus_id']=$_GET['bus_id'];
    header('Location:editBus.php');

}
else{
    echo $db->error;
}

?>