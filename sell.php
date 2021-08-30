<?php
    session_start();
    require_once("database_connection.php");

    $alert = null;

    // is logegd in
    if(isset($_SESSION["firstname"])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $image = $_FILES["image"];
            $name = $_POST["name"];
            $price = $_POST["price"];
            $condition = $_POST["condition"];
            $type = $_POST["type"];
            $specifications = $_POST["specifications"];
            $location = $_POST["location"];

            if (empty($image)) {
                $alert .= "Item image is required. <br>";
            } else {
                // Allow only images
                $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $alert .= "Item image is should be .png, .jpg or .jpeg <br>";
                }
            }
            if (empty($name)) $alert .= "Item name is required. <br>";
            if (empty($price)) $alert .= "Item image is required. <br>";
            if (empty($type)) $alert .= "Item image is required. <br>";


            if(empty($alert)){
                // Upload image
                $image_link = basename($_FILES["image"]["name"]);

                move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . basename($_FILES["image"]["name"]));

                $user_id = $_SESSION["user_id"];

                $sql = "INSERT INTO items (user_id, name, price, item_condition, image_link, type, specifications, location) 
                                    VALUES ('$user_id', '$name', '$price', '$condition', '$image_link', '$type', '$specifications', '$location')";

                if (mysqli_query($conn, $sql)) {
                    header('Location: my_items.php');

                    echo "item saved successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
        }
    } else {
        header('Location: login.php');
    }
?>

<html>
<head>
    <title>Sell item</title>
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
        <a href="sell.php" class="active">sell item</a>

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

    <h1 class="align-center">Sell item</h1>

    <div class="main">
        <table style="width: 100%">
            <tbody>
            <tr>
                <td style="width: 75%">
                    <h2>Sell a new item form</h2>
                    <form action="sell.php" method="post" enctype="multipart/form-data">
                        <label>Image</label><br>
                        <input name="image" type="file" required><br>

                        <label>Name</label><br>
                        <input name="name" type="text" required><br>

                        <label>Price</label><br>
                        <input name="price" type="number" required><br>

                        <label>Condition</label><br>
                        <label for="html"><input type="radio" id="html" name="condition" value="new" checked>new</label>
                        <label for="css"><input type="radio" id="css" name="condition" value="used">used</label><br>

                        <label>Type</label><br>
                        <select name="type">
                            <option value="Mobile Phone and Accessories">Mobile Phone and Accessories</option>
                            <option value="Computers and Laptops">Computers and Laptops</option>
                            <option value="Home Appliances">Home Appliances</option>
                            <option value="Headphones and Speakers">Headphones and Speakers</option>
                            <option value="Smart Devices">Smart Devices</option>
                            <option value="Cameras">Cameras</option>
                        </select>

                        <br>

                        <label>Location</label><br>
                        <input name="location" type="text" required><br>

                        <label>Specifications</label><br>
                        <textarea name="specifications" type="text"></textarea><br>

                        <br>
                        <button><a>sell item</a></button>
                    </form>
                </td>

                <td style="width: 25%">
                    <h2>Selling Tips</h2>
                    <p>
                        <i>
                            - Use a clear image<br/>
                            - Quote a reasonable price<br>
                        </i>
                    </p>
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
