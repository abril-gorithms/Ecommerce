<?php
include "connection.php";
session_start();
?>
<html lang="en">

<head>
    <title>Harvest vase</title>
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
</head>

<style>

    body {
        background-color: #fdf1ec;
    }

    .wrapper {
        height: 420px;
        width: 654px;
        margin: 50px auto;
        border-radius: 7px 7px 7px 7px;
        /* VIA CSS MATIC https://goo.gl/cIbnS */
        -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
        box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
    }

    .product-img {
        float: left;
        height: 420px;
        width: 327px;
    }

    .product-img img {
        border-radius: 7px 0 0 7px;
    }

    .product-info {
        float: left;
        height: 420px;
        width: 327px;
        border-radius: 0 7px 10px 7px;
        background-color: #ffffff;
    }

    .product-text {
        height: 300px;
        width: 327px;
    }

    .product-text h1 {
        margin: 0 0 0 38px;
        padding-top: 52px;
        font-size: 34px;
        color: #474747;
    }

    .product-text h1,
    .product-price-btn p {
        font-family: 'Bentham', serif;
    }

    .product-text h2 {
        margin: 0 0 47px 38px;
        font-size: 13px;
        font-family: 'Raleway', sans-serif;
        font-weight: 400;
        text-transform: uppercase;
        color: #d2d2d2;
        letter-spacing: 0.2em;
    }

    .product-text p {
        height: 125px;
        margin: 0 0 0 38px;
        font-family: 'Playfair Display', serif;
        color: #8d8d8d;
        line-height: 1.7em;
        font-size: 15px;
        font-weight: lighter;
        overflow: hidden;
    }

    .product-price-btn {
        height: 103px;
        width: 327px;
        margin-top: 17px;
        position: relative;
    }

    .product-price-btn p {
        display: inline-block;
        position: absolute;
        top: -13px;
        height: 50px;
        font-family: 'Trocchi', serif;
        margin: 0 0 0 38px;
        font-size: 28px;
        font-weight: lighter;
        color: #474747;
    }

    span {
        display: inline-block;
        height: 50px;
        font-family: 'Suranna', serif;
        font-size: 34px;
    }

    .product-price-btn button {
        float: right;
        display: inline-block;
        height: 50px;
        width: 176px;
        margin: 0 40px 0 16px;
        box-sizing: border-box;
        border: transparent;
        border-radius: 60px;
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        color: #ffffff;
        background-color: #9cebd5;
        cursor: pointer;
        outline: none;
    }

    .product-price-btn button:hover {
        background-color: #79b0a1;
    }
</style>

<body>


    <?php
    // Check to make sure the id parameter is specified in the URL
    if (isset($_GET['id'])) {
        $stmt = $db->prepare("SELECT * FROM product WHERE ProductID = ?");
        $stmt->bind_param("i", $_GET['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        // print_r($product);
        // Check if the product exists (array is not empty)
        //  print_r($product);
        if (!$product) {
            // Simple error to display if the id for the product doesn't exists (array is empty)
            exit('Product does not exist!');
        }
    } else {
        // Simple error to display if the id wasn't specified
        exit('Product does not exist!');
    }
    ?>


    <div class="wrapper">
        <div class="product-img">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['Images']); ?>" height="420" width="327">
        </div>
        <div class="product-info">
            <div class="product-text">
                <h1><?php echo htmlspecialchars($product['Names']); ?></h1>
                <?php if ($product['Packet_content']) { ?>
                    <h2>Packet Content: <?php echo htmlspecialchars($product['Packet_content']); ?></h2>
                <?php } ?>

                <p><?php echo htmlspecialchars($product['Descriptions']); ?></p>
            </div>
            <div class="product-price-btn">
                <form action="cart.php" method="POST">
                    <input type="number" name="quantity" value="1" min="1" placeholder="Quantity" required>
                    <input type="hidden" name="product_id" value="<?= $product['ProductID'] ?>">
                    <input type="submit" value="Add To Cart">
                </form>
                <p><span><?php echo htmlspecialchars($product['Price']); ?></span>&dollar;</p>

            </div>
        </div>
    </div>

</body>

</html>