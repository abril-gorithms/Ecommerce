<?php
include "connection.php";
include "template/header.php"
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

    <title>Plants</title>

    <style>
        .item {
            float: left;
            width: 100px;
            height: 100px;
            background: #ce8888;
            margin: 5px
        }
    </style>
</head>

<body>
        <!-- Create a query to get the list of best-seller products -->
        <?php
        //Write a query for all pizzas
        $sql = "SELECT Names
                    , ProductID
                    , Price
                    , Images
                FROM product
                WHERE CategoryID = 2";
        //make query and get the result
        $result = mysqli_query($db, $sql);
        //fetch the resulting row as an array
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free result from the memory
        mysqli_free_result($result);
        //close connection
        mysqli_close($db);
        // print_r($bestSellers);
        ?>

            <div class="box-wrap" ; style="width:100%; height:60px; background-color:#7aaf41; border:1; ">
                <h1 style="font-size: 50px; color:white; text-align: center; margin-top: 25px"><strong>SEEDS</strong></h1>
            </div>
            <br><br>
            <?php foreach ($products as $value) { ?>
                <a href="product.php?page=product&id=<?= $value['ProductID'] ?>">
                    <div class="box-wrap item" ; style="width:300px; height: 300px; background-color:  rgb(187, 218, 187); border:1; margin-left: 100px; margin-bottom: 50px">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($value['Images']); ?>" style="width:250px; height:180px; margin-left: 25px; margin-top: 10px;">
                        <br><br>
                        <p style="font-size:15px; text-align: center; white-space:pre; color: black; width: 200px; margin-left: 20px;"><?php echo htmlspecialchars($value['Names']); ?></p> <br>
                        <p style="color:black;text-indent:20px; text-align:center; white-space:pre; background-color: #73a242; margin-left:45px; font-size:22px; width: 200px;"><?php echo "$ ", htmlspecialchars($value['Price']); ?></p>
                    </div>
                </a>
            <?php } ?>

            <br><br><br> <br><br><br>
            <!-- <footer>
            </footer> -->
        </div>
</body>

</html>