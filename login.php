<?php
    include "connection.php";
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="style1.css">
    
        <title>Login</title>
        
    </head>
<body>
    <header style="height:130px; width: 1361px;">
        <div class="topnav_login">
             <a href="about.php">
              <img src="Images\Agri_1.png" alt="Agri Place Shop";
                width="150px" height="100px" style="float:left; padding-left:5px; margin-left:5px; margin-top: 10px;"></a>
                <h1 style="color: black; font-size: 25px;word-spacing: 10px; line-height: 80px; margin-top: 20px;">LOG IN</h1>
            </div>
            <div class="nav_login">
                <a href="help.php">Need Help?</a>
            </div>
        
    </header>
<section>
    <br> <br><br>
    <div class="box1">
        <h1 style="text-align: center; color: black; font-size: 30px;"> Log in </h1><br>
        <form name="login" action="" method="post">
            <br><br>
            <div class="login" style="color: black;">
            <input type="text" name="username" placeholder="Username" required=""> <br><br>
            <input type="password" name="userpassword" placeholder="Password" required=""> <br><br>
            <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </form>

        <p style="color: white; padding-left: 2px;">
            <br><br>
            <a style="color:yellow;" href="">Forgot password?</a> &nbsp &nbsp 
            New to this website?<a style="color: blue;" href="signup.php">Sign Up</a>
        </p>
    </div>
    <div class="logo">
        <img src="Images\Agri_1.png"; style="width: 500px; height: 500px; margin-left: 600px; margin-top: -350px;">
    </div>
</section>

<footer>
                
</footer>
<?php
        if(isset($_POST['submit']))
        {   
            $count=0;
            $res=mysqli_query($db, "SELECT * FROM `customer` where username='$_POST[username]' && userpassword='$_POST[userpassword]';");
            
            $row=mysqli_fetch_assoc($res);

            $count=mysqli_num_rows($res);

            if($count==0)
            {
                ?>
                   <div class="alert alert-warning" style="width: 500px; margin-left: 430px; background-color: #de1313; color: white">
                       <strong style="font-size: 18px; margin-left:45px;">The username and password doesn't match.</strong>
                   </div>
                <?php
            }
            else
            {
                $_SESSION['login_user'] = $_POST['username'];
                ?>
                  <script type="text/javascript">
                    window.location="index.php"
                  </script>
                <?php
            }
        }
      ?>
      <?php
                // $footer = 'C:\xampp\htdocs\Ecommerce Website\template\footer.php';
                // include('template/footer.php')
    ?>
</body>
</html>