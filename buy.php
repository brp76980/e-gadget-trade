<?php
    session_start();
    require_once("database_connection.php");

    if(isset($_SESSION["firstname"])){
    } else {
        header('Location: login.php');
    }

    $alert = null;

    // Add to cart
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['add_to_cart_item_id'])){
            $item_id = $_GET['add_to_cart_item_id'];

            $sql = "INSERT INTO cart (user_id, item_id) VALUES ('".$_SESSION["user_id"]."', '$item_id')";

            if (mysqli_query($conn, $sql)) {
                $alert =  "Added to cart";
            }
        }
    }

    $sql_items = "SELECT * FROM items WHERE item_condition='new'";
    $result_items = mysqli_query($conn, $sql_items);

    // Filter
    $condition = "new";
    $min_price = 0;
    $max_price = 10000000;
    $type0 = $type1 = $type2 = $type3 = $type4 = $type5 = null;
    $location = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["filters"])){


            // Condition filter
            if(isset($_POST["condition"])) {
                $condition = $_POST["condition"];
                if($condition == "used") $condition == "used";
            } else {
                $condition = "new";
            }

            $sql_items = "SELECT * FROM items WHERE item_condition='" . $condition . "'";

            // Price filter
            if(isset($_POST["min_price"]) && $_POST["min_price"] > 0) $min_price = $_POST["min_price"];
            if(isset($_POST["max_price"]) && $_POST["max_price"] > 0 && $_POST["max_price"] > $_POST["min_price"]) $max_price = $_POST["max_price"];

            // Apply price filter
            $sql_items .= " AND price > " . $min_price . " AND price < ". $max_price;

            // Location filter
            $location = $_POST["location"];
            if(isset($_POST["location"])) {
                $sql_items .= " AND location LIKE '%" . $_POST["location"] . "%'";
            } else {
                $location = null;
            }

            $sql_items .= " AND (";

            $isFirst = true;
            // Category type0 filter
            if(isset($_POST["type0"])) {
                $type0 = $_POST["type0"];
                $sql_items .= "type='" . $type0 . "'";
                $isFirst = false;
            } else {
                $type0 = null;
            }

            // Category type1 filter
            if(isset($_POST["type1"])) {
                $type1 = $_POST["type1"];
                if($isFirst) $sql_items .= " type='" . $type1 . "'"; else $sql_items .= " OR type='" . $type1 . "'";
                $isFirst = false;
            } else {
                $type1 = null;
            }

            // Category type1 filter
            if(isset($_POST["type2"])) {
                $type2 = $_POST["type2"];
                if($isFirst) $sql_items .= " type='" . $type2 . "'"; else $sql_items .= " OR type='" . $type2 . "'";
                $isFirst = false;
            } else {
                $type2 = null;
            }

            // Category type1 filter
            if(isset($_POST["type3"])) {
                $type3 = $_POST["type3"];
                if($isFirst) $sql_items .= " type='" . $type3  . "'"; else $sql_items .= " OR type='" . $type3  . "'";
                $isFirst = false;
            } else {
                $type3 = null;
            }

            // Category type1 filter
            if(isset($_POST["type4"])) {
                $type4 = $_POST["type4"];
                if($isFirst) $sql_items .= " type='" .  $type4 . "'"; else $sql_items .= " OR type='" .  $type4 . "'";
                $isFirst = false;
            } else {
                $type4 = null;
            }

            // Category type1 filter
            if(isset($_POST["type5"])) {
                $type5 = $_POST["type5"];
                if($isFirst) $sql_items .= " type='" . $type5 . "'"; else $sql_items .= " OR type='" . $type5 . "'";
                $isFirst = false;
            } else {
                $type5 = null;
            }

            if(!$isFirst) $sql_items .= " OR type != 'null'"; else $sql_items .= " type != 'null'";

            $sql_items .= ")";

            $result_items = mysqli_query($conn, $sql_items);
        }
    }
?>

<html>
<head>
    <title>Buy items</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <div class="top-head" id="top">
        <h1>E-GADGET TRADE</h1>
        <p>...simply the best...</p>
    </div>

    <nav>
        <a href="index.php">home</a>
        <a href="buy.php" class="active">buy items</a>
        <a href="sell.php">sell item</a>

        <?php
            if(isset($_SESSION["firstname"])) {
                ?>
                <a href="my_items.php">my items</a>
                <a href="my_orders.php">my orders</a>
                <?php
                $sql_cart = "SELECT * FROM cart WHERE user_id=" . $_SESSION["user_id"];
                $result_cart = mysqli_query($conn, $sql_cart);
                ?>
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

    <h1 class="align-center">Buy items</h1>

    <div class="main">
        <table>
            <tbody>
            <tr>
                <td>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <h3>Filter by condition</h3><br/>
                        <label for="html"><input type="radio" id="html" name="condition" value="new" <?php if($condition == "new") echo "checked"; ?>>new</label>
                        <label for="css"><input type="radio" id="css" name="condition" value="used" <?php if($condition == "used") echo "checked"; ?>>used</label>
                        <br>

                        <h3>Filter by price</h3>
                        <label>Max price</label>
                        <input name="min_price" type="text" placeholder="min price" value="<?php echo $min_price;?>">
                        <br>
                        <label>Min price</label>
                        <input name="max_price" type="text" placeholder="max price" value="<?php echo $max_price;?>">
                        <br>

                        <h3>Filter by category</h3>
                        <label for="type0"><input type="checkbox" id="type0" name="type0" value="Mobile Phone and Accessories" <?php if(isset($type0)) echo "checked";?>> <small>Mobile Phone and Accessories</small></label><br>
                        <label for="type1"><input type="checkbox" id="type1" name="type1" value="Computers and Laptops" <?php if(isset($type1)) echo "checked";?>> <small>Computers and Laptops</small></label><br>
                        <label for="type2"><input type="checkbox" id="type2" name="type2" value="Home Appliances" <?php if(isset($type2)) echo "checked";?>> <small>Home Appliances</small></label><br>
                        <label for="type3"><input type="checkbox" id="type3" name="type3" value="Headphones and Speakers" <?php if(isset($type3)) echo "checked";?>> <small>Headphones and Speakers</small></label><br>
                        <label for="type4"><input type="checkbox" id="type4" name="type4" value="Smart Devices" <?php if(isset($type4)) echo "checked";?>> <small>Smart Devices</small></label><br>
                        <label for="type5"><input type="checkbox" id="type5" name="type5" value="Cameras" <?php if(isset($type5)) echo "checked" ?>> <small>Cameras</small></label>
                        <br>

                        <h3>Filter by area</h3>
                        <input name="location" type="text" placeholder="enter location" value="<?php echo $location;?>"><br>

                        <br>
                        <button name="filters" value="filters"><a>Apply filter</a></button>
                    </form>
                </td>

                <td>
                    <table>
                        <tbody>
                        <?php
                        if (mysqli_num_rows($result_items) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result_items)) {
                                ?>
                                <tr>
                                    <td> <img src="images/<?php echo $row['image_link']; ?>" class="image"/></td>
                                    <td>
                                        <h2><?php echo $row["name"]; ?></h2>

                                        <p>
                                            <table class="item-table">
                                                <tbody>
                                                    <tr><td style="width: 25%"><b>Condition</b></td> <td class="item-table-2nd-column">:<?php echo $row["item_condition"]; ?></td></tr>
                                                    <tr><td style="width: 25%"><b>Type</b></td> <td class="item-table-2nd-column">:<?php echo $row["type"]; ?></td></tr>
                                                    <tr><td style="width: 25%"><b>Location</b></td> <td class="item-table-2nd-column">:<?php echo $row["location"]; ?></td></tr>
                                                </tbody>
                                            </table>
                                            <?php echo $row["specifications"]; ?>
                                            <br>
                                            <br>

                                            <button>
                                                <a  href="buy.php?add_to_cart_item_id=<?php echo $row['id'];?>">$<?php echo $row["price"];?> add to cart</a>
                                            </button>
                                        </p>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "you have no items";
                        }
                        ?>
                        </tbody>
                    </table>
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
                    <td style="width: 75%" class="align-center">
                        <h2>E-GADGET TRADE</h2><br/>
                        <i>...simply the best...</i>

                        <p>
                            <i>.....at E-GADGET TRADE we are fully dedicated to deliver the best customer experience in online e-commerce environment
                            by providing quality services made up of quality goods at pocket friendly prices and great delivery costs.....</i>
                        </p>
                    </td>
                    <td>
                        <p>
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
