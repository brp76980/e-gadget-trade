<?php
    session_start();
    require_once("database_connection.php");

    $alert = null;

if(isset($_SESSION["firstname"])){
} else {
    header('Location: login.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["shipping_address"])){
        $names = $_POST["names"];
        $phone = $_POST["phone"];
        $address= $_POST["address"];
        $country = $_POST["country"];
        $province = $_POST["province"];
        $city = $_POST["city"];
        $zipcode = $_POST["zipcode"];

        $sql_my_shipping_address = "SELECT * FROM shipping_addresses WHERE user_id=" . $_SESSION["user_id"];
        $result_my_shipping_address = mysqli_query($conn, $sql_my_shipping_address);

        if (mysqli_num_rows($result_my_shipping_address) > 0) {
            // update
            $sql_my_shipping_address = "UPDATE shipping_addresses 
            SET names = '$names', phone = '$phone', address = '$address', country= '$country', province = '$province', city = '$city', 
            zipcode = '$zipcode' WHERE shipping_addresses.user_id=" . $_SESSION["user_id"];

        } else {
            $sql_my_shipping_address = "INSERT INTO shipping_addresses (user_id, names, phone, address, country, province, city, zipcode) 
                                        VALUES ('". $_SESSION["user_id"]."', '$names', '$phone',  '$address', '$country', '$province', '$city', '$zipcode')";
        }

        if (mysqli_query($conn, $sql_my_shipping_address)) {
            $alert = "Shipping address saved";
        } else {
            echo "Error: " . $sql_my_shipping_address . "<br>" . mysqli_error($conn);
        }
    }

    if(isset($_POST["payment_method"])){
        $card_number = $_POST["card_number"];
        $expiration_date = $_POST["expiration_date"];
        $security_code= $_POST["security_code"];
        $billing_address = $_POST["billing_address"];

        $sql_payment_method = "SELECT * FROM payment_method WHERE user_id=" . $_SESSION["user_id"];
        $result_payment_method = mysqli_query($conn, $sql_payment_method);

        if (mysqli_num_rows($result_payment_method) > 0) {
            // Update
            $sql_payment_method = "UPDATE payment_method SET card_number = '$card_number', expiration_date = '$expiration_date', security_code = '$security_code', billing_address = '$billing_address' WHERE user_id=" . $_SESSION["user_id"];
        } else {
            // Create
            $sql_payment_method = "INSERT INTO payment_method (user_id, card_number, expiration_date, security_code, billing_address) 
                                                        VALUES ('". $_SESSION["user_id"]."', '$card_number', '$expiration_date', '$security_code', '$billing_address'); ";
        }

        if (mysqli_query($conn, $sql_payment_method)) {
            $alert = "Payment method saved";
        } else {
            echo "Error: " . $sql_my_shipping_address . "<br>" . mysqli_error($conn);
        }
    }

    if(isset($_POST["account_details"])){
        $firstname = $_POST["firstname"];
        $secondname = $_POST["secondname"];
        $email = $_POST["email"];

        $sql_user = "SELECT * FROM users WHERE id=" . $_SESSION["user_id"];
        $result_user = mysqli_query($conn, $sql_user);

        if (mysqli_num_rows($result_user) > 0) {
            // update
            $sql_user = "UPDATE users 
            SET firstname = '$firstname', secondname = '$secondname', email = '$email' WHERE id=" . $_SESSION["user_id"];
        } else {
            $alert = "Cannot update, user not found";
        }

        if (mysqli_query($conn, $sql_user)) {
            $alert = "Account details updated";
        } else {
            echo "Error: " . $sql_user . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<html>
<head>
    <title>Cart</title>
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
        <a href="cart.php">
            <img src="images/shopping-cart.png"/>
            cart <b><?php echo mysqli_num_rows($result_cart); ?></b>
        </a>
        <a>
            <img src="images/account.png"/>
            <?php echo $_SESSION["firstname"]; ?>
        </a>
        <a href="setting.php" class="active">setting</a>
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


    <h1 class="align-center">Settings</h1>

<div class="main">
    <table style="width: 100%">
        <tbody>
        <tr>
            <td style="width: 75%">
                <h2 id="shipping_information">Shipping address</h2>
<?php
        $sql_my_shipping_address = "SELECT * FROM shipping_addresses WHERE user_id=" . $_SESSION["user_id"];
        $result_my_shipping_address = mysqli_query($conn, $sql_my_shipping_address);

        if (mysqli_num_rows($result_my_shipping_address) > 0) {
            $address = mysqli_fetch_assoc($result_my_shipping_address);
?>
                <form action="setting.php" method="post">
                    <label>Names</label><br>
                    <input name="names" type="text" value="<?php echo $address['names']?>" required><br>

                    <label>Phone number</label><br>
                    <input name="phone" type="tel" value="<?php echo $address['phone']?>" required><br>

                    <label>Address</label><br>
                    <input name="address" type="text" value="<?php echo $address['address']?>" required><br>

                    <label>County</label><br>
                    <select name="country">
                        <option value="Canada" <?php if($address['country']=="Canada") echo "selected"; ?>>Canada</option>
                        <option value="USA" <?php if($address['country']=="USA") echo "selected"; ?>>USA</option>
                        <option value="Mexico" <?php if($address['country']=="Mexico") echo "selected"; ?>>Mexico</option>
                    </select>

                    <br>

                    <label>Province, State or County</label><br>
                    <input name="province" type="text" value="<?php echo $address['province']?>" required><br>

                    <label>City/ Town</label><br>
                    <input name="city" type="text" value="<?php echo $address['city']?>" required><br>

                    <label>Zip code</label><br>
                    <input name="zipcode" type="text" value="<?php echo $address['zipcode']?>" required><br>

                    <br>
                    <button name="shipping_address" value="shipping_address"><a>update shipping details</a></button>
                </form>
<?php
        } else {
?>
                <form action="setting.php" method="post">
                    <label>Names</label><br>
                    <input name="names" type="text" required><br>

                    <label>Phone number</label><br>
                    <input name="phone" type="tel" required><br>

                    <label>Address</label><br>
                    <input name="address" type="text" required><br>

                    <label>County</label><br>
                    <select name="country">
                        <option value="Canada">Canada</option>
                        <option value="USA">USA</option>
                        <option value="Mexico">Mexico</option>
                    </select>

                    <br>

                    <label>Province, State or County</label><br>
                    <input name="province" type="text" required><br>

                    <label>City/ Town</label><br>
                    <input name="city" type="text" required><br>

                    <label>Zip code</label><br>
                    <input name="zipcode" type="text" required><br>

                    <br>
                    <button name="shipping_address" value="shipping_address"><a>save shipping details</a></button>
                </form>
<?php
        }
?>

                <h2 id="payment_method">Payments</h2>
<?php
        $sql_payment_method= "SELECT * FROM payment_method WHERE user_id=" . $_SESSION["user_id"];
        $result_payment_method = mysqli_query($conn, $sql_payment_method);

        if (mysqli_num_rows($result_payment_method) > 0) {
        $payment_method = mysqli_fetch_assoc($result_payment_method);
?>
                <form action="setting.php" method="post">
                    <label>Card number</label><br>
                    <input name="card_number" type="number" value="<?php echo $payment_method['card_number']?>" required><br>

                    <label>Expiration date</label><br>
                    <input name="expiration_date" type="date" value="<?php echo $payment_method['expiration_date']?>" required><br>

                    <label>Security code/ cvc</label><br>
                    <input name="security_code" type="number" value="<?php echo $payment_method['security_code']?>" required><br>

                    <label>Billing address</label><br>
                    <input name="billing_address" type="text" value="<?php echo $payment_method['billing_address']?>" required><br>

                    <br>
                    <button name="payment_method" value="payment_method"><a>update payment details</a></button>
                </form>
            <?php
} else {
?>
                <form action="setting.php" method="post">
                    <label>Card number</label><br>
                    <input name="card_number" type="number" required><br>

                    <label>Expiration date</label><br>
                    <input name="expiration_date" type="date" required><br>

                    <label>Security code/ cvc</label><br>
                    <input name="security_code" type="number" required><br>

                    <label>Billing address</label><br>
                    <input name="billing_address" type="text" required><br>

                    <br>
                    <button name="payment_method" value="payment_method"><a>save payment details</a></button>
                </form>
<?php
    }
?>

<?php
                $sql_user = "SELECT * FROM users WHERE id=" . $_SESSION["user_id"];
                $result_user = mysqli_query($conn, $sql_user);

                if (mysqli_num_rows($result_user) > 0) {
                $user = mysqli_fetch_assoc($result_user);
?>
                <h2 id="payment_method">Account</h2>

                <form action="setting.php" method="post">
                    <label>First name</label><br/>
                    <input name="firstname" type="text" value="<?php echo $user['firstname']?>" required><br/>

                    <label>Second name</label><br/>
                    <input name="secondname" type="text" value="<?php echo $user['secondname']?>" required><br/>

                    <label>Email</label><br/>
                    <input name="email" type="email" value="<?php echo $user['email']?>" required><br/>

                    <br>
                    <button name="account_details" value="account_details"><a>Update account details</a></button>
                </form>
<?php
                }
?>
            </td>

            <td style="width: 25%">
            </td>
        </tr>
        </tbody>
    </table>

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