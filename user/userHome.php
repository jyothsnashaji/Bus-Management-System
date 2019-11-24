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
                    <li class="nav-item active">
                        <a class="nav-link" href="userHome.php">HOME</a>
                    </li>
                    <li class="nav-item">
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
            <?php

            if(isset( $_GET['busAssigned'] ))
                  {
                    echo '
                    <div class="w3-container">
                      <div class="w3-panel w3-card w3-green w3-display-container">
                        <span onclick="this.parentElement.style.display='."'none'".'"
                        class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                        <h3 style="color:white">Bus Assigned!</h3>
                        <p>Your details have been updated.</p>
                        </div>
                    </div>';
                  }

                  if(isset( $_GET['busNotAssigned'] ))
                        {
                          echo '
                          <div class="w3-container">
                            <div class="w3-panel w3-card w3-red w3-display-container">
                              <span onclick="this.parentElement.style.display='."'none'".'"
                              class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                              <h3 style="color:white">Bus assignment failed</h3>
                              <p>Please try again. If errors persist, contact admin.</p>
                              </div>
                          </div>';
                        }


            $rr='';
            if ($_SESSION['category']=='driver')
            {
                // show driver details
                $sql="SELECT driver_id, name, licno FROM driver WHERE driver_id=".$_SESSION['user']." ";
                $res=mysqli_query($db,$sql);
                //$rr=mysqli_fetch_array($res);

                if ($res->num_rows > 0) {
                  echo "<div class='w3-container'> <table class='w3-table-all w3-centered  w3-hoverable w3-reponsive w3-card-4'><tr><th colspan='3'>Your info</th></tr><tr><th>Driver ID</th><th>Name</th><th>License Number</th>";
                  while($row = $res->fetch_assoc()) {
                      echo "<tr><td>". $row["driver_id"]."</td><td>". $row["name"]."</td><td>". $row["licno"]."</td></tr>";
                  }

                  echo "</table></div>";

                  }



                // show bus details
                $sql="SELECT bus_id FROM bus WHERE driver_id=".$_SESSION['user']." ";
                $res=mysqli_query($db,$sql);
                $rr=mysqli_fetch_array($res);
                $temp = $rr['bus_id'];

                echo "<br>";
                echo "<br>";

                echo "<div class='w3-container'> <table class='w3-table-all w3-centered  w3-hoverable w3-reponsive w3-card-4'><tr><th>Bus ID</th>";
                echo "<tr><td>". $temp."</td></tr>";
                echo "</table></div>";

                echo "<br>";
                echo "<br>";

                // passengers
                $sql="SELECT passenger_id, name, dept, category, stop FROM passenger WHERE bus_id=".$temp." ";
                $res=mysqli_query($db,$sql);
//                $rr=mysqli_fetch_array($res);


                if ($res->num_rows > 0) {
                  echo "<div class='w3-container'> <table class='w3-table-all w3-centered  w3-hoverable w3-reponsive w3-card-4'><tr><th colspan='5'>List of Passengers</th></tr><tr><th>Passenger ID</th><th>Name</th><th>Dept</th><th>Student/Staff</th><th>Stop</th>";
                  while($row = $res->fetch_assoc()) {
                      echo "<tr><td>". $row["passenger_id"]."</td><td>". $row["name"]."</td><td>". $row["dept"]."</td><td>". $row["category"]."</td><td>". $row["stop"]."</td></tr>";
                  }

                  echo "</table></div>";

                  }

                  echo "<br>";
                  echo "<br>";


                // stops
                $sql="SELECT * FROM stops WHERE bus_id=".$temp." ";
                $res=mysqli_query($db,$sql);
                //$rr=mysqli_fetch_array($res);

                if ($res->num_rows > 0) {
                  echo "<div class='w3-container'> <table class='w3-table-all w3-centered  w3-hoverable w3-reponsive w3-card-4'><tr><th colspan='3'>List of Stops</th></tr><tr><th>Stop</th><th>Time (To College)</th><th>Time (From College)</th></tr>";
                  while($row = $res->fetch_assoc()) {
                      echo "<tr><td>".$row["stop"]."</td><td>". $row["to_time"]."</td><td>". $row["from_time"]."</td></tr>";
                  }

                  echo "</table></div>";

                  }



                echo "<br>";





            }
            else
            {
                // show passenger details
                $sql="SELECT passenger_id, name, dept, email FROM passenger WHERE passenger_id='".$_SESSION['user']."' ";
                $res=mysqli_query($db,$sql);
                //$rr=mysqli_fetch_array($res);

                if ($res->num_rows > 0) {
                  echo "<div class='w3-container'> <table class='w3-table-all w3-centered  w3-hoverable w3-reponsive w3-card-4'><tr><th colspan='4'>Your info</th></tr><tr><th>Passenger ID</th><th>Name</th><th>Dept</th><th>Email</th>";
                  while($row = $res->fetch_assoc()) {
                      echo "<tr><td>". $row["passenger_id"]."</td><td>". $row["name"]."</td><td>". $row["dept"]."</td><td>". $row["email"]."</td></tr>";
                  }

                  echo "</table></div>";

                  echo "<br><br>";


                }

                // show your bus, your driver, stop, to and fro time
                $sql="SELECT b.bus_id, d.driver_id, d.name, s.stop, s.to_time, s.from_time FROM passenger p, bus b, stops s, driver d WHERE p.passenger_id='".$_SESSION['user']."' AND p.bus_id = b.bus_id AND b.driver_id = d.driver_id AND p.stop = s.stop";
                $res=mysqli_query($db,$sql);
                //$rr=mysqli_fetch_array($res);

                if ($res->num_rows > 0) {
                  echo "<div class='w3-container'> <table class='w3-table-all w3-centered  w3-hoverable w3-reponsive w3-card-4'><tr><th colspan='6'>Your bus info</th></tr><tr><th>Bus ID</th><th>Driver ID</th><th>Driver Name</th><th>Stop</th><th>To Time</th><th>From Time</th>";
                  while($row = $res->fetch_assoc()) {
                      echo "<tr><td>". $row["bus_id"]."</td><td>". $row["driver_id"]."</td><td>". $row["name"]."</td><td>". $row["stop"]."</td><td>". $row["to_time"]."</td><td>". $row["from_time"]."</td></tr>";
                  }

                  echo "</table></div>";

                }

                else {
                  echo "<center>You do not have a bus yet. Register for one below. If there are issues, contact the admin. <br><br></center>";
                  echo '<center><form action="busregister.php"><input type="submit" value="Register for a bus" /></form></center>';

                }


            }

            // if ($rr['bus_id'])
            // {
            //     echo "Your bus is";
            //     $rr['bus_id'];
            //
            //     print_r($_SESSION);
            //
            // }
            // else{
            //     echo "Register for bus";
            // }

            ?>

            </div>


    </body>
</html>
