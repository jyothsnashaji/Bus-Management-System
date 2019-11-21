<?php 
session_start();
if(!isset($_SESSION['user']))
    header('Location:admin.php');
include_once('dbConfig.php');
?>

<html>
    <head>

        <title>Admin
        </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/styles.css" >
        <script src="/js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
    </head>
    <body>

    

    <div class="sidenav">

        <a href="adminHome.php">Search</a>
        <a href='schedule.php'>Schedule</a>
        <a href="bus.php">Bus Services</a>
        <a href="adminprofile.php">Profile</a>
        <a href="logout_admin.php">Logout</a>
    </div>
    <div class="contents">

    <form action='schedule.php' method='post'>
            <div class='row justify-content-center'>

                <div class='col-sm-3'>
                    <label for='for'><b>Schedule by</b></label>
                    <select name='for'>
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


                        }
                        ?></div>

                </div>

                        </div>
            </div>


    </div>
</body>
</html>