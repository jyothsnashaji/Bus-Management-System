<?php 
include_once('dbConfig.php');
$sql="DELETE FROM stops WHERE bus_id=".$_GET['bus_id']." ";
$res=mysqli_query($db,$sql);
if ($res)
{
    for($i=0; $i<count($_POST['stop']); ++$i)
    {

        $sql="INSERT INTO stops (bus_id,stop,to_time,from_time) VALUES (".$_GET['bus_id'].",'".$_POST['stop'][$i]."','".$_POST['totime'][$i]."','".$_POST['fromtime'][$i]."')";
        $res=mysqli_query($db,$sql);
        if(!$res)
        {
            echo $db->error;
        }
        
    } 
    header('Location:bus.php');
}
else
   {
    echo $db->error;
    echo $sql;
   } 
?>