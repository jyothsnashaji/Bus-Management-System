<?php


include("dbConfig.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    $type= mysqli_real_escape_string($db,$_POST['category']);
    if ($type=='driver')
        $sql = "SELECT driver_id as id FROM driver WHERE name = '$myusername' and password = '$mypassword'";
    else
        $sql = "SELECT passenger_id as id FROM passenger WHERE name = '$myusername' and password = '$mypassword' and category = '$type'";


    $result = mysqli_query($db,$sql);

    $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    session_start();
    if($count == 1) {
        $rr=mysqli_fetch_array($result);
        $_SESSION['user'] = $rr['id'];
        $_SESSION['category']=$type;
        header("location: userHome.php");
    }
    else
    {
       header("location: index.php?failedlogin");

    }
}

?>
