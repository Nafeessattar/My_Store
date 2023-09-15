<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper bg-white">
    <div class="h2 text-center">Admin</div>
    <div class="h4 text-muted text-center pt-2">Enter your login details</div>
    <form class="pt-3" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group py-2">
            <div class="input-field"> <span class="far fa-user p-2"></span>
             <input type="text" placeholder="Enter Username" required class="username" name="username"> </div>
        </div>
        <div class="form-group py-1 pb-2">
            <div class="input-field"> <span class="fas fa-lock p-2"></span> 
            <input type="password" placeholder="Enter Password" required class="password" name="password"> 
            </div>
        </div>
        <div class="d-flex align-items-start">
        </div> <button class="btn btn-block text-center my-3" name="login">Log in</button>
    </form>
    <?php
        include("config.php");
            if(isset($_POST['login']))
            {
              
                    $query="select * from user where username='".$_POST['username']."' and password='".$_POST['password']."'";
                    $result=mysqli_query($conn,$query);
        
                    if(mysqli_num_rows($result)==1)
                    {
                        session_start();
                        $_SESSION['username']=$_POST['username'];
                        $_SESSION['password']=$_POST['password'];

                        header("location:productform.php");
                    }
                    else
                    {
                        echo "incorrect";
                    }
               }
            

        
        ?>
</div>
</body>
</html>
