<?php 
session_start();
if(!isset($_SESSION['user']))
    header('Location:index.php');
include_once('dbConfig.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HOME</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>

        <header class="page-header" id="header">
            <div class="container-fluid" >
<br>
                <div class="row">
                    <div class="col-sm-8">
                        <img  src="images/logo.jpg">
                    </div>
                    <div class="col-sm-4"  >
                        <div class="row"> <h3 style="float:right;">NIT-C BUS PORTAL</h3></div>
                    </div>
                </div>

            </div>
            <br>

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SCHEDULE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LOGOUT</a>
                    </li>

                </ul>
            </nav>
            <br><br><br>
            </header>
            <div class='container'>
            <?php
            $rr='';
            if ($_SESSION['category']=='driver')
            {
                $sql="SELECT bus_id FROM bus WHERE driver_id=".$_SESSION['user']." ";
                $res=mysqli_query($db,$sql);
                $rr=mysqli_fetch_array($res);

            }
            else
            {
                $sql="SELECT bus_id FROM passenger WHERE passenger_id=".$_SESSION['user']." ";
                $res=mysqli_query($db,$sql);
                $rr=mysqli_fetch_array($res);
            }
            if ($rr['bus_id'])
            {
                echo "Your bus is";
                $rr['bus_id'];

            }
            else{
                echo "Register for bus";
            }
            
            ?>
            
            </div>


    </body>
</html>
