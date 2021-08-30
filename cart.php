<?php
    session_start();
    require_once("database_connection.php");

    if(isset($_SESSION["firstname"])){
    } else {
        header('Location: login.php');
    }

    // Remove from cart
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['remove_from_cart_item_id'])){
            $item_id = $_GET['remove_from_cart_item_id'];

            $sql_remove_from_cart = "DELETE FROM cart WHERE id= ".$_GET['remove_from_cart_item_id']." AND user_id=".$_SESSION["user_id"].";";

            if (mysqli_query($conn, $sql_remove_from_cart)) {
                echo "Removed from cart";
            }
        }
    }
?>

<html>
<head>
    <title>My cart</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <div class="top-head" id="top">
        <h1>E-GADGET TRADE</h1>
        <p>...simply the best...</p>
    </div>

    <nav>
        <a href="index.php">home</a>
        <a href="buy.php">buy items</a>
        <a href="sell.php">sell item</a>

        <?php
        if(isset($_SESSION["firstname"])) {
            ?>
            <a href="my_items.php">my items</a>

    <?php
            $sql_cart = "SELECT * FROM cart WHERE user_id=" . $_SESSION["user_id"];
            $result_cart = mysqli_query($conn, $sql_cart);
    ?>

            <a href="my_orders.php">my orders</a>
            <a href="cart.php" class="active">
                <img src="images/shopping-cart.png"/>
                cart <b><?php echo mysqli_num_rows($result_cart); ?></b>
            </a>

            <a>
                <img src="images/account.png"/>
                <?php echo $_SESSION["firstname"]; ?>
            </a>
            <a href="setting.php">setting</a>
            <a href="logout.php">logout</a>
    <?php
        } else {
            ?>
            <a href="login.php">login</a>
            <a href="registration.php">register</a>
            <?php
        }
        ?>
    </nav>

    <h1 class="align-center">Shopping Cart</h1>

<div class="main">
    <table>
        <tbody>
        <tr>
            <td>

    <h2>Items</h2>
            <?php
                $total_cost = 0;

                if (mysqli_num_rows($result_cart) > 0) {
                    // output data of each row
                    while ($row_cart = mysqli_fetch_assoc($result_cart)) {
                        // echo $row_cart["item_id"];
                        $sql = "SELECT * FROM items WHERE id=" . $row_cart["item_id"];
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
?>
    <table>
        <tbody>
<?php
                            while($row = mysqli_fetch_assoc($result)) {
                                $total_cost+= $row["price"];

                                ?>
                                <tr>
                                    <td> <img src="images/<?php echo $row['image_link']; ?>" class="image"/></td>
                                    <td>
                                        <h2><?php echo $row["name"]; ?></h2>

                                        <p>
                                            <table class="item-table">
                                                <tbody>
                                                <tr><td><b>Condition</b></td> <td class="item-table-2nd-column">:<?php echo $row["item_condition"]; ?></td></tr>
                                                <tr><td><b>Type</b></td> <td class="item-table-2nd-column">:<?php echo $row["type"]; ?></td></tr>
                                                <tr><td><b>Location</b></td> <td class="item-table-2nd-column">:<?php echo $row["location"]; ?></td></tr>
                                                </tbody>
                                            </table>
                                            <?php echo $row["specifications"]; ?>
                                            <br>
                                            <br>

                                            <button>
                                                <a  href="cart.php?remove_from_cart_item_id=<?php echo $row_cart['id'];?>">$<?php echo $row["price"];?> remove from cart</a>
                                            </button>
                                        </p>
                                    </td>
                                </tr>
                                <?php
                            }
?>

        </tbody>
    </table>
<?php
                        }

                    }
?>
            <table>
                <tr><td><img src="images/sample_image.png" class="image" style="visibility: hidden"/></td><td><h1>Total cost $ <?php echo $total_cost; ?></h1></td></tr>
            </table>
            </td>

            <td style="width: 25%">

                    <h2>Shipping information</h2>
                    <?php
                    $sql_my_shipping_address = "SELECT * FROM shipping_addresses WHERE user_id=" . $_SESSION["user_id"];
                    $result_my_shipping_address = mysqli_query($conn, $sql_my_shipping_address);

                    if (mysqli_num_rows($result_my_shipping_address) > 0) {
                        $address = mysqli_fetch_assoc($result_my_shipping_address);

                        ?>
                        <table class="item-table">
                            <tbody>
                            <tr><td><b>Names</b></td><td class="item-table-2nd-column">:<?php echo $address['names']?></td></tr>
                            <tr><td><b>Phone number</b></td><td class="item-table-2nd-column">:<?php echo $address['phone']?></td></tr>
                            <tr><td><b>Address</b></td><td class="item-table-2nd-column">:<?php echo $address['address']?></td></tr>
                            <tr><td><b>County</b></td><td class="item-table-2nd-column">:<?php echo $address['country']?></td></tr>
                            <tr><td><b>Province/State</b></td><td class="item-table-2nd-column">:<?php echo $address['province']?></td></tr>
                            <tr><td><b>City/Town</b></td><td class="item-table-2nd-column">:<?php echo $address['city']?></td></tr>
                            <tr><td><b>Zip code</b></td><td class="item-table-2nd-column">:<?php echo $address['zipcode']?></td></tr>
                            </tbody>
                        </table>

                        <br>
                        <button><a href="setting.php#shipping_information">edit shipping information</a></button>
                        <?php
                    } else {
                        ?>
                        You have not provided shipping information which is required before placing an order.<br>
                        <button><a href="setting.php#shipping_information">set up shipping information</a></button>
                        <?php
                    }
                    ?>

                    <br><br>
                    <h2>Payment information</h2>
                    <?php
                    $sql_payment_method= "SELECT * FROM payment_method WHERE user_id=" . $_SESSION["user_id"];
                    $result_payment_method = mysqli_query($conn, $sql_payment_method);

                    if (mysqli_num_rows($result_payment_method) > 0) {
                        $payment_method = mysqli_fetch_assoc($result_payment_method);
                        ?>
                        <table class="item-table">
                            <tbody>
                            <tr><td><b>Card number</b></td><td class="item-table-2nd-column">:<?php echo $payment_method['card_number']?></td></tr>
                            <tr><td><b>Expiration date</b></td><td class="item-table-2nd-column">:<?php echo $payment_method['expiration_date']?></td></tr>
                            <tr><td><b>Security code/ cvc</b></td><td class="item-table-2nd-column">:<?php echo $payment_method['security_code']?></td></tr>
                            <tr><td><b>Billing address</b></td><td class="item-table-2nd-column">:<?php echo $payment_method['billing_address']?></td></tr>
                            </tbody>
                        </table>

                        <br>
                        <button><a href="setting.php#payment_method">edit payment method</a></button>
                        <?php
                    } else {
                        ?>
                        You have not provided a payment method which is required before placing an order<br>
                        <button><a href="setting.php#payment_method">set up payment method</a></button>
                        <?php
                    }
                    ?>

                    <?php
                    if (mysqli_num_rows($result_payment_method) > 0 && mysqli_num_rows($result_my_shipping_address) > 0) {
                        ?>
                        <br><br>
                        <h2>Place Order</h2>
                        <p>
                            <button><a href="order_processor.php">Place order $<?php echo $total_cost; ?></a></button>
                        </p>
                        <?php
                    }
                    ?>
<?php
                } else {
?>
                    <h2>Cart is empty!</h2>
                    <a href="buy.php">shop for new items</a>|
                    <a href="buy.php">shop for used items</a>
<?php
                }
            ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>

    <br>
    <div class="bottom-foot">
        <table>
            <tbody>
            <tr>
                <td style="width: 75%; color: white" class="align-center">
                    <h2>E-GADGET TRADE</h2><br/>
                    <i>...simply the best...</i>

                    <p>
                        <i>.....at E-GADGET TRADE we are fully dedicated to deliver the best customer experience in online e-commerce environment
                            by providing quality services made up of quality goods at pocket friendly prices and great delivery costs.....</i>
                    </p>
                </td>
                <td style="color: white">
                    <p>
                    <h2>Links</h2><br/>
                    <a href="#top">Top</a><br>
                    <a href="index.php">home</a><br>
                    <a href="buy.php">buy items</a><br>
                    <a href="sell.php">sell item</a><br>

                    <?php
                    if(isset($_SESSION["firstname"])) {
                        ?>
                        <a href="my_items.php">my items</a><br>
                        <a href="my_orders.php">my orders</a><br>
                        <a href="setting.php">Account setting</a><br>
                        <a href="logout.php">logout</a><br>
                        <?php
                    } else {
                        ?>
                        <a href="login.php">login</a><br>
                        <a href="registration.php">register</a>
                        <?php
                    }
                    ?>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>

        <br/>
        <br/>
        <br/>
        <br/>

        <p class="footer-bar align-center">
            @2021 E-GADGET TRADE
        </p>
    </div>
</body>
</html>