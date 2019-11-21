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
        <script src="js/js.js"></script>
    </head>
    <body>



<div class="sidenav">

  <a href="adminHome.php">Search</a>
  <a href='schedule.php'>Schedule</a>
  <a href="bus.php">Bus Services</a>
  <a href="adminprofile.php">Profile</a>
  <a href="logout_admin.php">Logout</a>
</div>
<div class='contents'>
<div class='container'></div>

<form action='adminHome.php' method='post'>
<div class='row justify-content-center'>

    <div class='col-sm-3'>
        <label for='for'><b>Search For</b></label>
        <select id='for' name='for' onchange='displaydb();'>
            <option  value='student'>Student</option>
            <option value='staff'>Staff</option>
            <option value='driver'>Driver</option>
        </select>
    </div>
    <div class='col-sm-3'>
        <label name='id'><b>ID</b></label>
        <input type='text' name='id' placeholder="0" value="0">
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
                if ($searchfor=='driver')
                    {
                        $sql="SELECT * FROM driver WHERE driver_id=".$id." ";
                        $res=mysqli_query($db,$sql);
                        $rr=mysqli_fetch_array($res);
                        if ($rr)
                        {
                            echo "<b>Name: </b>";
                            echo $rr['name'];
                            echo "<br>";
                            echo "<b>Age: </b>";
                            echo $rr['age'];
                            echo "<br>";
                            echo "<b>License Number: </b>";
                            echo $rr['licno'];
                            echo "<br>";
                            $sql="SELECT bus_id FROM bus WHERE driver_id=".$id." ";
                            $res=mysqli_query($db,$sql);
                            echo "<b>Bus: </b>";
                            $rr=mysqli_fetch_array($res);
                            if ($rr['bus_id'])
                            {

                                echo $rr['bus_id'];
                            }
                            else
                            {
                                echo "UNALLOTED";
                            }

                        }
                        else
                            echo "Does not exist";
                    }
                else
                    {
                        $sql="SELECT * FROM passenger WHERE category='".$searchfor."'AND passenger_id=".$id." ";
                        $res=mysqli_query($db,$sql);
                        $rr=mysqli_fetch_array($res);
                        if ($rr)
                        {
                            echo "<table border=0>";
                            echo "<tr><td><b>Name: </b></td><td>";
                            echo $rr['name'];
                            echo "</td></tr><tr><td><b>Department: </b</td><td>";
                            echo $rr['dept'];
                            echo "</td></tr><tr><td><b>Drop-Point: </b</td><td>";
                            echo $rr['stop'];
                            echo "</td></tr><tr><td><b>Bus: </b</td><td>";
                            echo $rr['bus_id'];
                            echo "</table>";

                        }
                        else
                            echo "Does not exist";
                    }


            }
            else
            {
                echo "<div id='student'>";
                $sql="SELECT * FROM passenger WHERE category='student'";
                $res=mysqli_query($db,$sql);
                if($res)
                {
                    echo "<table class='table'><tr><th>ID</th><th>Name</th><th>Department</th><th>Stop</th><th>Bus</th></tr>";
                    while($rr=mysqli_fetch_array($res))
                    {
                        echo "<tr><td>";
                        echo $rr['passenger_id'];
                        echo "</td><td>";
                        echo $rr['name'];
                        echo "</td><td>";
                        echo $rr['dept'];
                        echo "</td><td>";
                        echo $rr['stop'];
                        echo "</td><td>";
                        echo $rr['bus_id'];
                        echo "</td></tr>";
                    }
                    echo "</table>";
                }
                echo"</div>";
                echo "<div id='staff' style='display:none;'>";
                $sql="SELECT * FROM passenger WHERE category='staff'";
                $res=mysqli_query($db,$sql);
                if($res)
                {
                    echo "<table class='table'><tr><th>ID</th><th>Name</th><th>Department</th><th>Stop</th><th>Bus</th></tr>";
                    while($rr=mysqli_fetch_array($res))
                    {
                        echo "<tr><td>";
                        echo $rr['passenger_id'];
                        echo "</td><td>";
                        echo $rr['name'];
                        echo "</td><td>";
                        echo $rr['dept'];
                        echo "</td><td>";
                        echo $rr['stop'];
                        echo "</td><td>";
                        echo $rr['bus_id'];
                        echo "</td></tr>";
                    }
                    echo "</table>";
                }
                echo "</div>";
                echo "<div id='driver' style='display:none;'>";
                $sql="SELECT * FROM driver";
                $res=mysqli_query($db,$sql);
            
                if($res)
                {
                    echo "<table class='table'><tr><th>ID</th><th>Name</th><th>Bus</th></tr>";
                    while($rr=mysqli_fetch_array($res))
                    {
                        $sql="SELECT bus_id FROM bus WHERE driver_id=".$rr['driver_id']." ";
                        $res_=mysqli_query($db,$sql);
                        $bus=mysqli_fetch_array($res_);
                        echo "<tr><td>";
                        echo $rr['driver_id'];
                        echo "</td><td>";
                        echo $rr['name'];
                        echo "</td><td>";
                        if ($bus['bus_id'])
                            echo $bus['bus_id'];
                        else
                            echo "UNALLOTED";
                        echo "</td></tr>";
                    }
                    echo "</table>";
                }
                echo "</div>";

            }
            ?></div>

    </div>

            </div>
</div>

</body>

</html>
