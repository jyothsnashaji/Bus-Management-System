<?php 
session_start();
if(!isset($_SESSION['user']))
    header('Location:admin.php')
include_once('dbConfig.php');
?>

<html>
    <head>

        <title>Admin
        </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/styles.css" >
        <script src="/js/bootstrap.min.js"></script>
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
        <select name='for'>
            <option  value='student'>Student</option>
            <option value='staff'>Staff</option>
            <option value='driver'>Driver</option>
        </select>
    </div>
    <div class='col-sm-3'>
        <label name='id'><b>ID</b></label>
        <input type='text' name='id'>
    </div>
    <div class='col-sm-3' style='padding-top:40px;'>
        <input type=submit value='Search'>
    </div>
</div>

</form>

<div class='container'>
            <?php 
            if (!empty($_POST))
            { 
                $searchfor=$_POST['for'];
                $id=$_POST['id'];
                if ($searchfor='driver')
                    {
                        $sql="SELECT * FROM driver WHERE driver_id=".$id." ";
                        $res=mysqli_query($db,$sql);
                        if ($res)
                        {
                            $rr=mysqli_fetch_array($res);
                            echo $rr['driver_id'];
                            echo "<br>";
                            echo $rr['name'];
                            echo "<br>";
                            echo $rr['licno'];
                            echo "<br>";
                            echo $rr['age'];
                            echo "<br>";
                        }
                        else
                            echo "Does not exist";
                    }
                else
                    {
                        $sql="SELECT * FROM passenger WHERE passenger_id=".$id." ";
                        $res=mysqli_query($db,$sql);
                        if ($res)
                        {
                            $rr=mysqli_fetch_array($res);

                        }
                        else
                            echo "Does not exist";
                    }
                
          
            }
            ?>
            </div>
</div>

</div>

</body>

</html>
