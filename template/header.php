<?php
    include "connection.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style1.css">

    <title>Agri Place Shop</title>
</head>
<body>
        <header>
            <div class="topnav">
                    <div class="logo">
                        <img src="Images\Agri_1.png" alt="Agri Place Shop"; style="width:200px; height:150px;
                        margin-top: -70px; margin-left: 20px;">
                    </div>

                    <?php
                        if(isset($_SESSION['login_user']))
                        {
                            ?>
                            
                            <nav>
                                <ul class="nav navbar-nav navbar-right">
                                 <li><a href="">
                                    <div style="color: black">
                                        <?php
                                            
                                            echo "Welcome!".$_SESSION['login_user'];
                                        ?>
                                    </div>
                                    </a></li>
                                    <li><a href="index.php"></a></li>
                                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out">Logout</span></a></li>
                                    <li><a href="help.php"><span class="glyphicon glyphicon-question-sign">Help</span></a></li>
                                </ul>
                            </nav>

                        <?php
                        }
                        else
                        {
                            ?>
                                <nav>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="index.php"></a></li>
                                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in">Login</span></a></li>
                                        <li><a href="Signup.php"><span class="glyphicon glyphicon-user">Signup</span></a></li>
                                        <li><a href="help.php"><span class="glyphicon glyphicon-question-sign">Help</span></a></li>
                                    </ul>
                                </nav>
                        <?php
                        }
                        ?>
              <!-----------SEARCH BUTTON------->
              <div class="srch">
                        <form class="navbar-form" method="post" name="form1">
                            
                                <input style="width: 500px; height: 40px;"type="text" name="search" placeholder="Search products.." required="">
                                <button style="background-color:#73a242;" type="submit" name="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>      
                        </form>
                    </div>
                    <div class="cart">
                    <a href="C:\xampp\htdocs\Ecommerce Website\cart.php" class="cart">
                        <img src="Images\icon - shopping cart.png" alt="cart">
                    </a>
                    </div>
            </div>
        </header>
</body>
</html>