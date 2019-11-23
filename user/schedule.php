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
        <link rel="stylesheet" href="css/w3.css">
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
                    <li class="nav-item">
                        <a class="nav-link" href="userHome.php">HOME</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="schedule.php">SCHEDULE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LOGOUT</a>
                    </li>

                </ul>
            </nav>
            <br><br><br>
            </header>
            <div class='container'>

            <div class='contents'>
            <div class='container'></div>

            <form action='schedule.php' method='post'>
            <div class='row justify-content-center'>

                <div class='col-sm-3'>
                    <label for='for'><b>Schedule by</b></label>
                    <select name='for'>
                        <option value='srcdest'>Source-Destination</option>
                        <option value='stop'>Stop</option>
                        <option value='busid'>Bus ID</option>
                    </select>
                </div>
                <div class='col-sm-3'>
                    <label name='id'><b>Input</b></label>
                    <input type='text' name='id' placeholder="Enter value">
                </div>
                <div class='col-sm-3' style='padding-top:40px;'>
                    <input type=submit value='Search'>
                </div>
            </div>

            </form>

            <div class='container'>
                <div class="row justify-content-center">
                <div><?php
                        if (!empty($_POST))
                        {
                            $searchfor=$_POST['for'];
                            $id=$_POST['id'];
                            if ($searchfor=='stop')
                                {
                                    $sql="SELECT * FROM stops WHERE stop='".$id."' ";
                                    $res=mysqli_query($db,$sql);
                                    if ($res->num_rows > 0) {
                                      echo "<br><br>";
                                      echo "<div class='w3-container'> <table class='w3-table-all w3-centered  w3-hoverable w3-reponsive w3-card-4'><tr><th colspan='4'>Stop info for ".$id."</th></tr><tr><th>Bus ID</th><th>To Time</th><th>From Time</th>";
                                      while($row = $res->fetch_assoc()) {
                                          echo "<tr><td>". $row["bus_id"]."</td><td>". $row["to_time"]."</td><td>". $row["from_time"]."</td></tr>";
                                      }

                                      echo "</table></div>";

                                      }
                                    else
                                        echo "<br><br>Does not exist";
                                }
                            else if ($searchfor=='busid')
                                {
                                    $sql="SELECT s.bus_id, d.driver_id, d.name, s.stop, s.to_time, s.from_time FROM bus b, driver d, stops s WHERE s.bus_id=".$id." AND b.bus_id = s.bus_id AND d.driver_id = b.driver_id";
                                    $res=mysqli_query($db,$sql);
                                    if ($res->num_rows > 0) {
                                      echo "<br><br>";
                                      echo "<div class='w3-container'> <table class='w3-table-all w3-centered  w3-hoverable w3-reponsive w3-card-4'><tr><th colspan='6'>Stop info for bus ".$id."</th></tr><tr><th>Bus ID</th><th>Driver ID</th><th>Driver Name</th><th>Stop</th><th>To Time</th><th>From Time</th>";
                                      while($row = $res->fetch_assoc()) {
                                          echo "<tr><td>". $row["bus_id"]."</td><td>". $row["driver_id"]."</td><td>". $row["name"]."</td><td>". $row["stop"]."</td><td>". $row["to_time"]."</td><td>". $row["from_time"]."</td></tr>";
                                      }

                                      echo "</table></div>";

                                      }
                                    else
                                        echo "<br><br>Does not exist";
                                }
                            else if ($searchfor=='srcdest')
                            {
                              $str=explode("-", $id); // src, dest
                              $src = $str[0];
                              $dest = $str[1];
                              $sql="SELECT * FROM stops ORDER BY bus_id, to_time";
                              $res=mysqli_query($db,$sql);
                              $routes = array();
                              $temparr = array();
                              $tempbus = 0;
                              if ($res->num_rows > 0) {
                                while($row = $res->fetch_assoc()) {
                                  if ($tempbus==0) {$tempbus = $row["bus_id"];}
                                  else if ($row["bus_id"]<>$tempbus) {$tempbus = $row["bus_id"]; $temparr = array();}
                                  if ($row["stop"]==$src){
                                      while (true){
                                        $x = array_push($temparr, $row);
                                        $row = $res->fetch_assoc();
                                        if (!($row)){$temparr = array(); break;}
                                        else if ($row["stop"]==$dest){$x = array_push($temparr, $row); $routes = array_merge($routes, $temparr); $temparr = array(); break;}
                                        else if ($row["bus_id"]<>$tempbus) {$tempbus = $row["bus_id"]; $temparr = array(); break;}

                                  }
                                }

                          }

                            }
                              //print_r($routes);
                              if ($routes){
                                echo "<br><div class='w3-container'> <table class='w3-table-all w3-centered  w3-hoverable w3-reponsive w3-card-4'><tr><th colspan='4'>Stop info for your route ".$id."</th></tr><tr><th>Bus ID</th><th>Stop</th><th>To Time</th><th>From Time</th>";
                                $i = 0;
                                while($i<count($routes)) {
                                    $row = $routes[$i];
                                     echo "<tr><td>". $row["bus_id"]."</td><td>". $row["stop"]."</td><td>". $row["to_time"]."</td><td>". $row["from_time"]."</td></tr>";
                                     $i = $i + 1;
                                 }

                                 echo "</table></div>";
                              }
                              else {
                                echo "Does not exist";
                              }
                            }
                        }?></div>

                </div>

                        </div>
