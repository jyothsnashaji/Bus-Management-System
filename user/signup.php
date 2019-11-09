<?php 
include_once('dbConfig.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign Up </title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="main">

            <div class="container">
                <form method="POST" action='registerUser.php' class="appointment-form" id="appointment-form">
                    <h2>User Registration form</h2>
                    <div class="form-group-1">

                        <input type="text" name="name" id="name" placeholder="Enter Name" required />
                        <input type="email" name="email" id="email" placeholder="Enter Email" required />
                        <input type="password" name='password' placeholder="Enter Password" required>
                        <input type="password" name='reeneterpassword' placeholder="Confirm Password "required>

                        <div class="select-list">
                            <select required name="category" id="user_type" onchange='loadinput();' required>
                                <option selected value="">Choose the User Type</option>
                                <option value="student">Student</option>
                                <option value="staff">Staff</option>
                                <option value="driver">Driver</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group-2" id='passenger' style='display:none;'>
                        <input type="text" name="id" placeholder="Enter Id Number"  />

                        <input type="text" name="dept" placeholder="Department" />


                        <div class="select-list">
                            <select name="stop" >
                                <option selected value="">Choose Drop-Off Point</option>
                                <?php
                                $sql="SELECT DISTINCT stop FROM stops ";
                                $res=mysqli_query($db,$sql);
                                while ($rr=mysqli_fetch_array($res))
                                {
                                    echo "<option value='";
                                    echo $rr['stop'];
                                    echo "'>";
                                    echo $rr['stop'];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                        </div>



                    </div>

                    <div class="form-group-2" id='driver' style='display:none;'>
                        <select name="bus_id">

                            <?php
                            $sql="SELECT bus_id FROM bus ";
                            $res=mysqli_query($db,$sql);
                            while ($rr=mysqli_fetch_array($res))
                            {
                                echo "<option value='";
                                echo $rr['bus_id'];
                                echo "'>";
                                echo $rr['bus_id'];
                                echo "</option>";
                            }
                            ?>

                        </select>

                        <input type="number" name="age" id="Age" placeholder="Age" /> 

                        <input type="number" name="lic_no" id="License_number" placeholder="License number" />


                    </div>


                    <div class="form-submit">
                        <input type="submit" name="submit" id="submit" class="submit" value="Create User">
                    </div>

                </form>
            </div>

        </div>

        <!-- JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>