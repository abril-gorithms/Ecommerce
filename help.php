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
        <link rel="stylesheet" href="help.css">
        <link rel="stylesheet" href="style1.css">

    
        <title>Help</title>
        
    </head>
<body>
<header style="height:130px; width: 1350px;">
        <div class="topnav_help">
             <a href="about.php">
              <img src="Images\Agri_1.png" alt="Agri Place Shop";
                width="150px" height="100px" style="float:left; padding-left:5px; margin-left:5px; margin-top: 10px;"></a>
                <h1 style="color: black; font-size: 25px;word-spacing: 10px; line-height: 80px; margin-top: 20px;">HELP Section</h1>
            </div>
                    <?php
                        if(isset($_SESSION['login_user']))
                        {
                            ?>
                            
                            <nav>
                                <ul class="nav navbar-nav navbar-right"; style="margin-top: -120px;">
                                 <li><a href="">
                                    <div style="color: black">
                                        <?php
                                            
                                            echo "Welcome!".$_SESSION['login_user'];
                                        ?>
                                    </div>
                                    </a></li>
                                    <li><a href="index.php"></a></li>
                                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out">Logout</span></a></li>
                                </ul>
                            </nav>

                        <?php
                        }
                        else
                        {
                            ?>
                                <nav>
                                <ul class="nav navbar-nav navbar-right"; style="margin-top: -120px;">
                                        <li><a href="index.php"></a></li>
                                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in">Login</span></a></li>
                                        <li><a href="Signup.php"><span class="glyphicon glyphicon-user">Signup</span></a></li>
                                    </ul>
                                </nav>
                        <?php
                        }
                        ?>
        </header>
    <br><br><br><br><br>
<div class="container mt-4"; style="width: 1200px; height: 1200px; margin-left: 250px;">
    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <div class="card p-4 mt-3">
                <h1 class="heading mt-5 text-center"; style="font-size: 30px; padding-top: 100px;">Hi! How can we help You?</h1><br><br><br>
                <div class="d-flex justify-content-center px-5";  style="padding-left: 50px; padding-right:50px;">
                    <div class="search"> <input type="text" class="search-input" placeholder="Search..." name=""> <a href="#" class="search-icon"> <i class="fa fa-search"></i> </a> </div>
                </div><br><br>
                <div class="row mt-4 g-1 px-4 mb-5"; style="padding-bottom:150px; padding-top: 50px;padding-right: 25px; padding-left: 25px;">
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/Mb8kaPV.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Account</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/ueLEPGq.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Payments</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/tmqv0Eq.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Delivery</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/D0Sm15i.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Product</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/Z7BJ8Po.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Return</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/YLsQrn3.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Guarantee</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
