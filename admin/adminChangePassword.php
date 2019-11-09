  <?php
        session_start();
        include 'dbConfig.php';
        $username=$_SESSION['user'];
        $password = $_POST['current'];
        $newpassword = $_POST['new'];
        $confirmnewpassword = $_POST['reenternew'];
        $result = mysqli_query($db,"SELECT password FROM admin WHERE
username='".$username."'");
        if(!$result)
            echo "The username you entered does not exist";
        else
        {
         $res= mysqli_fetch_assoc($result);
        if ($password != $res['password'])
            $_SESSION['status']='incorrect';
        else if($newpassword==$confirmnewpassword)
        {
            $sql=mysqli_query($db,"UPDATE admin SET password='$newpassword' where
            username='$username'");
            if($sql)
                $_SESSION['status']='updated';
        }
       else
         $_SESSION['status']='mismatch';
        }
         header('Location:adminprofile.php');
        ?>