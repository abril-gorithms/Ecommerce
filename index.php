<?php
include "connection.php";
include "template/header.php";

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
  <style type="text/css">
    * {
      box-sizing: border-box
    }

    /* Slideshow container */
    .slideshow-container {
      max-width: 550px;
      position: relative;
      margin: auto;
      height: 550px;
    }

    /* Hide the images by default */
    .mySlides {
      display: none;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      margin-top: -22px;
      padding: 16px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* Styling for best sellers */


    .element {
      float: left;
      width: 100px;
      height: 100px;
      background: #ce8888;
      margin: 5px
    }


    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
      color: black;
      font-size: 30px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: white;
      font-size: 18px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1.5s;
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }
  </style>
</head>

<body>
  <!-- Slideshow container -->
  <div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="Images/Product/African Violet.jpg" style="width:550px; height:450px;">
      <div class="text">African Violet</div>
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="Images/Product/Agrostemma Githago Milas Rosea.jpg" style="width:100%; height:450px;">
      <div class="text">Agrostemma Githago Milas Rosea</div>
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="Images/Product/Amaryllis.jpg" style="width:100%; height:450px;">
      <div class="text">Amaryllis</div>
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="Images/Product/Acroclinium Grandiflorum Mix.jpg" style="width:100%; height:450px;">
      <div class="text">Acroclinium Grandiflorum Mix</div>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>

  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
  </div>

  <br><br>

  <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }
  </script>

  <div class="category" style="margin-left: 40px;">
    <h1 style="font-size: 25px;"><strong>CATEGORY</strong></h1>
    <br><br>
    <div class="product" style="margin-left: 50px;">
      <a href="plants.php"><img src="Images/Plants/PLANTS1.png" ; style="width:400px; height:300px; border:1" ;></a>
      <a href="seeds.php"><img src="Images/Seeds/SEEDS.png" ; style="width:400px; height:300px; border:1" ;></a>
      <a href="accessories.php"><img src="Images/Accessories/ACCESSORIES1.png" ; style="width:400px; height:300px; border:1"></a>
      <br><br>
    </div>
    <br><br>
    <h1 style="font-size: 25px;"><strong>BEST-SELLER PRODUCTS</strong></h1>
    <br><br>
    <!-- Create a query to get the list of best-seller products -->
    <?php
    //Write a query for all pizzas
    $sql = "CALL getBestSeller()";
    //make query and get the result
    $result = mysqli_query($db, $sql);
    //fetch the resulting row as an array
    $bestSellers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //free result from the memory
    mysqli_free_result($result);
    //close connection
    mysqli_close($db);
    //  print_r($bestSellers);
    ?>
    <!-- container -->
    <div>
      <?php foreach ($bestSellers as $value) { ?>
        <div class="best">
          <a href="product.php?page=product&id=<?= $value['ProductID'] ?>">
            <div class="box3 item" ; style="width:300px; float: left; margin:10px;border: 1px solid #ccc;height:320px; background-color:  rgb(187, 218, 187); border:1; ">
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($value['Image']); ?>" ; style="width:250px; height:180px; margin-left: 25px; margin-top: 10px;" ;>
              <br><br>
              <p style="font-size:20px; text-align: center; white-space:pre; color: black; width: 180px; margin-left: 50px;margin-top:30px;"><?php echo htmlspecialchars($value['Name']); ?></p> <br>
              <p style="color:black;text-indent:20px; text-align: center; white-space:pre; background-color: #73a242; margin-left:45px; font-size:22px; width: 200px; margin-top:-5px;"><?php echo "$ ", htmlspecialchars($value['Price']); ?></p>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1 style="font-size: 25px; margin-top: 1vh; display: inline"><strong>ON-SALE PRODUCTS</strong></h1>
    <div style="margin-top:-250px">
      <div class="box3" ; style="width:300px; height: 350px; background-color:  rgb(187, 218, 187); border:1; margin-left: 2px; margin-top: 300px" ;>
        <!-- <h1 style="font-size: 25px; margin-top: 1vh; background: red;"><strong>ON-SALE PRODUCTS</strong></h1> -->
        <img src="Images/Product/Barberton Daisy.jpg" ; style="width:250px; height:180px; margin-left: 25px; margin-top: 10px;" ;>
        <br><br>
        <p style="font-size:20px; text-align: center; white-space:pre; color: black; width: 180px; margin-left: 50px;">Barberton Daisy</p> <br>
        <p style="color:#979c98;text-indent:20px; white-space:pre; margin-left:20px; font-size:20px; width: 200px;">Before:Php 2,000.00</p><br>
        <p style="color:black;text-indent:20px; white-space:pre; background-color: #73a242; margin-left:45px; font-size:22px; width: 200px;">Php 1,799.00</p>
      </div>
      <br><br><br>
      <div class="box4" ; style="width:300px; height:350px; background-color:  rgb(187, 218, 187); border:1; margin-left: 320px; margin-top: -397px;" ;>
        <img src="Images/Product/African Violet.jpg" ; style="width:250px; height:180px; margin-left: 25px; margin-top: 10px;" ;>
        <br><br>
        <p style="font-size:20px; text-align: center; white-space:pre; color: black; width: 180px; margin-left: 50px;">African Violet</p> <br>
        <p style="color:#979c98;text-indent:20px; white-space:pre; margin-left:20px; font-size:20px; width: 200px;">Before:Php 10,000.00</p><br>
        <p style="color:black;text-indent:20px; white-space:pre; background-color: #73a242; margin-left:45px; font-size:22px; width: 200px;">Php 9,599.00</p>
      </div>
      <br><br><br>
      <div class="box5" ; style="width:300px; height:350px; background-color:  rgb(187, 218, 187); border:1; margin-left: 640px; margin-top: -397px;" ;>
        <img src="Images/Product/Ageratum Mexicanum.jpg" ; style="width:250px; height:180px; margin-left: 25px; margin-top: 10px;" ;>
        <br><br>
        <p style="font-size:20px; text-align: center; white-space:pre; color: black; width: 180px; margin-left: 50px;">Ageratum Mexicanum</p> <br>
        <p style="color:#979c98;text-indent:20px; white-space:pre; margin-left:20px; font-size:20px; width: 200px;">Before:Php 2,000.00</p><br>
        <p style="color:black;text-indent:20px; white-space:pre; background-color: #73a242; margin-left:45px; font-size:22px; width: 200px;">Php 1,850.00</p>
      </div>
      <br><br><br>
      <div class="box5" ; style="width:300px; height:350px; background-color:  rgb(187, 218, 187); border:1; margin-left: 960px; margin-top: -397px;" ;>
        <img src="Images/Product/Agrostemma Githago Milas Rosea.jpg" ; style="width:250px; height:160px; margin-left: 25px; margin-top: 10px;" ;>
        <br><br>
        <p style="font-size:20px; text-align: center; white-space:pre; color: black; width: 180px; margin-left: 50px;">Agrostemma Githago<br> Milas Rosea</p> <br>
        <p style="color:#979c98;text-indent:20px; white-space:pre; margin-left:20px; font-size:20px; width: 200px;">Before:Php 900.00</p><br>
        <p style="color:black;text-indent:20px; white-space:pre; background-color: #73a242; margin-left:45px; font-size:22px; width: 200px;">Php 699.00</p>
      </div>
    </div>
    <br><br><br>
    <button type="clickable" style="color:black; white-space:pre; background-color:green; float: right; font-size:25px; margin-right: 40px; ">See More</button>
    <br><br><br><br>
  </div>
</body>

</html>