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


    <title>Agri Place Shop</title>

    <style>
        html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section, summary,
time, mark, audio, video {
margin:0;
padding:0;
border:0;
outline:0;
font-size:100%;
vertical-align:baseline;
background:transparent;
}

body {
line-height:1;
}

article,aside,details,figcaption,figure,
footer,header,hgroup,menu,nav,section { 
display:block;
}

nav ul {
list-style:none;
}

blockquote, q {
quotes:none;
}

blockquote:before, blockquote:after,
q:before, q:after {
content:'';
content:none;
}

a {
margin:0;
padding:0;
font-size:100%;
vertical-align:baseline;
background:transparent;
}

/* change colours to suit your needs */
ins {
background-color:#ff9;
color:#000;
text-decoration:none;
}

/* change colours to suit your needs */
mark {
background-color:#ff9;
color:#000; 
font-style:italic;
font-weight:bold;
}

del {
text-decoration: line-through;
}

abbr[title], dfn[title] {
border-bottom:1px dotted;
cursor:help;
}

table {
border-collapse:collapse;
border-spacing:0;
}

/* change border colour to suit your needs */
hr {
display:block;
height:1px;
border:0; 
border-top:1px solid #cccccc;
margin:1em 0;
padding:0;
}

input, select {
vertical-align:middle;
}

/*-------------------------------Main code   INDEX ---------------------------------------------------------*/

.wrapper
{
	height: 660px;
	width: 1365px;
	/*background-color: red;*/
}
header
{
	height: 140px;
	width: 1365px;
	background-color: rgb(187, 218, 187);
	padding: 10px;
}
section
{
	height: 550px;
	width: 1365px;
}
.logo
{
  float:left;
  padding-left: 20px;
}
li a
{
  color: rgb(8, 8, 8);
  text-decoration: none;
  font-size: 20px;
  
}
.topnav nav
{
  float: right;
  word-spacing: 30px;
  padding: 50px;
  margin-top: -90px;
}
nav li
{
  display: inline-block;
  line-height: 80px;
}
.topnav nav a:hover {
  background-color:#7aaf41;
  color: black;
}

.srch
    {
     padding-left: 300px;
     margin-top: 50px;
     font-size: 22px;
     
    }

  .cart
  {
    float: right;
    width: 40px;
    height: 40px;
    padding-right: 130px;
    margin-top: -30px;
  }*
    </style>
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
                    <a href="" class="cart">
                        <img src="Images\icon - shopping cart.png" alt="cart">
                    </a>
                    </div>
            </div>
        </header>
</body>
</html>