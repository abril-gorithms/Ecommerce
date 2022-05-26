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
    
        <title>SignUp</title>
        
    </head>
<body>
    <header style="height:130px; width: 1361px;">
        <div class="topnav_login">
             <a href="about.php">
              <img src="Images\Agri_1.png" alt="Agri Place Shop";
                width="150px" height="100px" style="float:left; padding-left:5px; margin-left:5px; margin-top: 10px;"></a>
                <h1 style="color: black; font-size: 25px;word-spacing: 10px; line-height: 80px; margin-top: 20px;">Sign Up</h1>
            </div>
            <div class="nav_login">
                <a href="help.php">Need Help?</a>
            </div>
    </header>
    <br>
<section>
    <div class="box2" style="height: 600px; width: 500px; margin-left: 70px;">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Fax;">Sign Up</h1> 
        <br>
      <form name="signup" action="login.php" method="post">
        <div class="">
          <input class="form-control" type="text" name="username" placeholder="Username" required="">
          <input class="form-control" type="password" name="userpassword" placeholder="Password" required="">
          <input class="form-control" type="text" name="lastname" placeholder="Last Name" required=""> 
          <input class="form-control" type="text" name="firstname" placeholder="First Name" required="">
          <input class="form-control" type="text" name="middlename" placeholder="Middle Name" >
          <input class="form-control" type="text" name="email" placeholder="Email" required="">
          <input class="form-control" type="text" name="contactnumber" placeholder="Contact Number" required="">
          <input class="form-control" type="text" name="addresss" placeholder="Address" required=""> 
          <input class="form-control" type="text" name="barangay" placeholder="Barangay" required="">
          <input class="form-control" type="text" name="citymun" placeholder="City/Municipality" required="">
          <input class="form-control" type="text" name="province" placeholder="Province" required="">
          <input class="form-control" type="text" name="country" placeholder="Country" required=""> <br>
          
          <input class="btn btn-default" type="submit" name="submit" value="Create account" style="color: black; width: 120px; height: 30px"> </div>
      </form>
     
    </div>

    <div class="logo">
        <img src="Images\Agri_1.png"; style="width: 500px; height: 400px; margin-left: 750px; margin-top: -700px;">
    </div>
</section>
        <?php

        if(isset($_POST['submit']))
        {
        $count=0;
        $sql="SELECT username from `customer`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
            if($row['username']==$_POST['username'])
            {
            $count=$count+1;
            }
        }
        if($count==0)
        {
            mysqli_query($db,"INSERT INTO `customer` VALUES('', '$_POST[username]', '$_POST[userpassword]', 
           '$_POST[lastname]', '$_POST[firstname]', '$_POST[middlename]', '$_POST[email]', 
            '$_POST[contactnumber]', '$_POST[addresss]', '$_POST[barangay]', '$_POST[citymun]', '$_POST[province]', '$_POST[country]');");
        ?>
            <script type="text/javascript">
            alert("Registration successful");
            </script>
        <?php
        }
        else
        {

            ?>
            <script type="text/javascript">
                alert("The username already exist.");
            </script>
            <?php

            }

        }

        ?>
</body>
</html>