<?php


include("dbConfig.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    $type= mysqli_real_escape_string($db,$_POST['category']);
    if ($type=='driver')
        $sql = "SELECT driver_id FROM driver WHERE name = '$myusername' and password = '$mypassword'";
    else
        $sql = "SELECT passenger_id FROM passenger WHERE name = '$myusername' and password = '$mypassword'";
        
    
    $result = mysqli_query($db,$sql);
    
    $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    session_start();
    if($count == 1) {
        $_SESSION['user'] = $myusername;
        header("location: userHome.php");
    }
    else
    {
       header("location: index.php");
    }
}

?>