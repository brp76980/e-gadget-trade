<?php
    session_start();
    require_once("database_connection.php");

    if(isset($_SESSION["firstname"])){
    } else {
        header('Location: login.php');
    }
?>

<html>
<head>
    <title>My Orders</title>
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

            <a href="my_orders.php" class="active">my orders</a>
            <a href="cart.php">
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

    <?php if(isset($alert)){?>
        <div class="alert" id="alert" onclick="this.setAttribute('style', 'display: none')">
            <?php echo $alert; ?>
        </div>

        <script>
            setTimeout(function(){
                document.getElementById("alert").setAttribute("style", "display: none");
            }, 3000);
        </script>
    <?php } ?>

    <h1 class="align-center">My orders</h1>

    <div class="main">
        <table style="width: 100%">
            <tbody>
            <tr>
                <td style="width: 75%">
                    <?php
                    $sql_order = "SELECT * FROM orders WHERE user_id=" . $_SESSION["user_id"];
                    $result_orders = mysqli_query($conn, $sql_order);

                    if (mysqli_num_rows($result_orders) > 0) {
                        while ($row_order = mysqli_fetch_assoc($result_orders)) {
                            ?>
                            <h2>Order information</h2>
                            <table class="item-table">
                                <tr><td><b>Order id</b></td><td class="item-table-2nd-column">: QE357B<?php echo $row_order["id"];?></td></tr>
                                <tr><td><b>Total cost</b></td><td class="item-table-2nd-column">: <?php echo $row_order["total_cost"];?></td></tr>
                                <tr><td><b>Order date</b></td><td class="item-table-2nd-column">: <?php echo $row_order["reg_date"];?></td></tr>
                                <tr><td><b>Shipping information</b></td><td class="item-table-2nd-column">: <?php echo $row_order["shipping_information"];?></td></tr>
                                <tr><td><b>Payment information</b></td><td class="item-table-2nd-column">: <?php echo $row_order["payment_information"];?></td></tr>
                            </table>

                            <h2>Order items</h2>
                            <p>
                            <?php
                            $sql_order_item = "SELECT * FROM order_items WHERE order_id=" . $row_order["id"];
                            $result_order_item = mysqli_query($conn, $sql_order_item);

                            if (mysqli_num_rows($result_order_item) > 0) {
                                ?>
                                <table>
                                    <tbody>
                                    <?php
                                    while ($row_order_item = mysqli_fetch_assoc($result_order_item)) {
                                        // Get item
                                        $sql_item = "SELECT * FROM items WHERE id=" . $row_order_item["item_id"];
                                        $result_item = mysqli_query($conn, $sql_item);

                                        if (mysqli_num_rows($result_item) > 0) {
                                            $row = mysqli_fetch_assoc($result_item);
                                            ?>
                                            <tr>
                                                <td> <img src="images/<?php echo $row['image_link']; ?>" class="image-small"/></td>
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
                                                    </p>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>
                            </p>
                            <?php
                        }
                    } else {
                        ?>
                        <h2>No orders</h2>
                        <a href="buy.php">shop for new items</a>|
                        <a href="buy.php">shop for used items</a>
                        <?php
                    }
                    ?>
                </td>

                <td style="width: 25%">
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
