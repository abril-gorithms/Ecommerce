<?php
include "connection.php";
include "headercart.php"
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Shopping Cart</title>

    <style>
        .shopping-cart {
            padding-bottom: 50px;
            font-family: 'Montserrat', sans-serif;
        }

        .shopping-cart.dark {
            background-color: #f6f6f6;
        }

        .shopping-cart .content {
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
            background-color: white;
        }

        .shopping-cart .block-heading {
            padding-top: 50px;
            margin-bottom: 40px;
            margin-left: 70px;
            font-size: 50px;
        }


        .shopping-cart .dark .block-heading p {
            opacity: 0.8;
        }

        .shopping-cart .block-heading h1,
        .shopping-cart .block-heading h2,
        .shopping-cart .block-heading h3 {
            margin-bottom: 1.2rem;
            color: black;
        }

        .shopping-cart .items {
            margin: auto;
        }

        .shopping-cart .items .product {
            margin-bottom: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .shopping-cart .items .product .info {
            padding-top: 0px;
            text-align: center;
        }

        .shopping-cart .items .product .info .product-name {
            font-weight: 600;
        }

        .shopping-cart .items .product .info .product-name .product-info {
            font-size: 14px;
            margin-top: 15px;
        }

        .shopping-cart .items .product .info .product-name .product-info .value {
            font-weight: 400;
        }

        .shopping-cart .items .product .info .quantity .quantity-input {
            margin: auto;
            width: 80px;
        }

        .shopping-cart .items .product .info .price {
            margin-top: 15px;
            font-weight: bold;
            font-size: 22px;
        }

        .shopping-cart .summary {
            border-top: 2px solid #5ea4f3;
            background-color: #f7fbff;
            height: 100%;
            padding: 30px;
        }

        .shopping-cart .summary h3 {
            text-align: center;
            font-size: 1.3em;
            font-weight: 600;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .shopping-cart .summary .summary-item:not(:last-of-type) {
            padding-bottom: 10px;
            padding-top: 10px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .shopping-cart .summary .text {
            font-size: 1em;
            font-weight: 600;
        }

        .shopping-cart .summary .price {
            font-size: 1em;
            float: right;
        }

        .shopping-cart .summary button {
            margin-top: 20px;
        }

        @media (min-width: 768px) {
            .shopping-cart .items .product .info {
                padding-top: 25px;
                text-align: left;
            }

            .shopping-cart .items .product .info .price {
                font-weight: bold;
                font-size: 22px;
                top: 17px;
            }

            .shopping-cart .items .product .info .quantity {
                text-align: center;
            }

            .shopping-cart .items .product .info .quantity .quantity-input {
                padding: 4px 10px;
                text-align: center;
            }
        }
    </style>

</head>

<body>

    <!-- ADD PRODUCT TO THE CART -->
    <?php
    // If the user clicked the add to cart button on the product page we can check for the form data
    if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
        // Set the post variables so we easily identify them, also make sure they are integer
        $product_id = (int)$_POST['product_id'];
        $quantity = (int)$_POST['quantity'];
        // Prepare the SQL statement, we basically are checking if the product exists in our databaser
        $stmt = $db->prepare("SELECT * FROM product WHERE ProductID = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        // print_r($results);
        // print_r($_SESSION);
        // Check if the product exists (array is not empty)
        if ($product && $quantity > 0) {
            // Product exists in database, now we can create/update the session variable for the cart
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    // Product exists in cart so just update the quanity
                    $_SESSION['cart'][$product_id] += $quantity;
                } else {
                    // Product is not in cart so add it
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } else {
                // There are no products in cart, this will add the first product to cart
                $_SESSION['cart'] = array($product_id => $quantity);
            }
        }
        // Prevent form resubmission...
        // header('location: cart.php?page=cart');
        // exit;
    }
    ?>
    
    <!-- DELETE PRODUCT FROM THE CART -->
    <?php
    // Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
    if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
        // Remove the product from the shopping cart
        unset($_SESSION['cart'][$_GET['remove']]);
    }
    ?>

    <!-- UPDATE THE QUANTITY OF THE PRODUCT -->
    <?php
    // Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
        // print_r($_POST);
        // Loop through the post data so we can update the quantities for every product in cart
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                // Always do checks and validation
                if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                    // Update new quantity
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
        // Prevent form resubmission...
        // header('location: index.php?page=cart');
        // exit;
    }
    ?>



    <?php
    // Check the session variable for products in cart
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array();
    $subtotal = 0.00;
    // If there are products in cart
    if ($products_in_cart) {
        // There are products in the cart so we need to select those products from the database
        // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), "?"));
        $stmt = $db->prepare('SELECT * FROM product WHERE ProductID IN (' . $array_to_question_marks . ')');
        // // We only need the array keys, not the values, the keys are the id's of the products
        $stmt->execute(array_keys($products_in_cart));
        $result = $stmt->get_result();
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);




        // Calculate the subtotal
        foreach ($products as $product) {
            $subtotal += (float)$product['Price'] * (int)$products_in_cart[$product['ProductID']];
        }
    }
    ?>
    <!-- TEMPLATE FOR CART  -->
    <div class="shopping-cart dark">

        <div class="container">
            <div class="block-heading">
                <h2>Shopping Cart</h2>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            <!-- View of products in the cart -->
                            <?php if (empty($products)) : ?>
                                <tr>
                                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($products as $product) : ?>
                                    <div class="product">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img class="img-fluid mx-auto d-block image" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['Images']); ?>" ; style="height: 170px; width: 300px; padding-top: 20px; padding-left: 20px;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-md-5 product-name">
                                                            <div class="product-name">
                                                                <a href="product.php?page=product&id=<?= $product['ProductID'] ?>"><?php echo htmlspecialchars($product['Names']); ?></a>
                                                                <div class="product-info">
                                                                    <p style="font-size: 14px;"><?php echo htmlspecialchars($product['Descriptions']); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- The quantity of the Product     -->
                                                        <div class="col-md-4 quantity">
                                                            <label for="quantity">Quantity:</label>
                                                            <input id="quantity" type="number" value="<?= $products_in_cart[$product['ProductID']] ?>" placeholder="Quantity" class="form-control quantity-input">
                                                        </div>
                                                        <!-- The Price of The Product -->
                                                        <div class="col-md-3 price">
                                                            <span>&dollar;<?php echo htmlspecialchars($product['Price']); ?></span>
                                                        </div>
                                                        <!-- The subtotal of the Product: Product * Quantity -->
                                                        <div class="col-md-3 price">
                                                            &dollar;<?= $product['Price'] * $products_in_cart[$product['ProductID']] ?>
                                                        </div>
                                                        <div class="d-flex align-items-center" ; style="margin-top: -140px; margin-left:520px;"><a href="cart.php?remove=<?php $product['ProductID'] ?>"><i class="fa fa-trash-o" style="font-size:24px"></i></a>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Summary</h3>
                            <!-- The Total amount of the Cart -->
                            <div class="summary-item"><span class="text">Subtotal</span><span class="price">&dollar;<?= $subtotal ?></span></div>
                            <div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
                            <div class="summary-item"><span class="text">Shipping</span><span class="price">$50</span></div>
                            <div class="summary-item"><span class="text">Total</span><span class="price">$6550</span></div>
                            <form action="cart.php" method="POST">
                               <button class="btn btn-primary btn-lg btn-block" value="1" name="update" type="submit">Update</button>
                            </form>
                            <form action=""?>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Checkout</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>