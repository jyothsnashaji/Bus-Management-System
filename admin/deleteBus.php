<?php 
include_once('dbConfig.php');
$sql="DELETE FROM stops WHERE bus_id=".$_POST['bus_id']." ";
$res=mysqli_query($db,$sql);
if ($res)
{
    $sql="DELETE FROM bus WHERE bus_id=".$_POST['bus_id']." ";
    $res=mysqli_query($db,$sql);
    if ($res)
    {
    header('Location:bus.php');
    }
    else
   {
    echo $db->error;
    echo $sql;
   } 
}
else
   {
    echo $db->error;
    echo $sql;
   } 
?>