<?php
include_once('dbConfig.php');
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$repassword = $_POST['repassword'];
if ($repassword<>$password){header('location: index.php?failedsignup');}
$category=$_POST['category'];
if ($category=='driver')
{
    
    $age=$_POST['age'];
    $licno=$_POST['lic_no'];
    $sql="INSERT INTO driver(name,email,password,age,licno) VALUES('".$name."','".$email."','".$password."',".$age.",".$licno.")";


}
else
{
    $id=$_POST['id'];
    $stop=$_POST['stop'];
    $dept=$_POST['dept'];
     $sql="INSERT INTO passenger(name,email,password,category,passenger_id,stop,dept) VALUES('".$name."','".$email."','".$password."','".$category."','".$id."','".$stop."','".$dept."')";
    echo $sql;

}
$res=mysqli_query($db,$sql);
if ($res)
{
    
         header('Location:index.php');
}

echo $db->error;
?>
