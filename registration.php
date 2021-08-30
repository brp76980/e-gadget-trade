<?php
    require_once("database_connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST["firstname"];
        $secondname = $_POST["secondname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO users (firstname, secondname, email, password) VALUES ('$firstname', '$secondname',  '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            header('Location: login.php');

            echo "Registered successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>

<html>
    <head>
        <title>Homepage</title>
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
                <a href="logout.php">logout</a>

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

                <?php
            } else {
                ?>
                <a href="login.php">login</a>
                <a href="registration.php" class="active">register</a>
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

        <h1 class="align-center">Registration</h1>

        <div class="main">
            <table>
                <tbody>
                <tr>
                    <td style="width: 75%">
                        <form action="registration.php" method="post">
                            <label>First name</label><br/>
                            <input name="firstname" type="text" required><br/>

                            <label>Second name</label><br/>
                            <input name="secondname" type="text" required><br/>

                            <label>Email</label><br/>
                            <input name="email" type="email" required><br/>

                            <label>Password</label><br/>
                            <input name="password" type="password" required><br/>

                            <br>
                            <button><a>register</a></button>
                        </form>
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