<html>
    <head>
        <title> Admin Login
        </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
         <link rel="stylesheet" href="css/styles.css" >
        <script src="/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container" style="width:40%;" >

            <form  action="admin_login.php" method="post">
                <div class="imgcontainer">

                    <img src="images/avatar.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit">Login</button>

                </div>

                <div class="container" style="background-color:#f1f1f1">

                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>


    </body>

</html>