<?php
    session_start();
    require_once("database_connection.php");

    $alert = null;
?>

<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>

    <body>
        <div class="home-top-head" id="top">
            <table class="home-top-head-table">
                <tr>
                    <td style="width: 15%">
                        <img src="images/logo.png" class="image-logo" alt="logo"/>
                    </td>
                    <td>
                        <br>
                        <h1>E-GADGET TRADE</h1>
                        <p>...simply the best...</p>
                    </td>
                </tr>
            </table>
        </div>

        <nav>
            <a href="index.php" class="active">home</a>
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

        <h1 class="align-center">Welcome to our shopping website.</h1>

        <div class="main">

            <table>
                <tbody>
                <tr>
                    <td>
                        <table>
                            <tbody>
                            <tr>
                                <td><img src="images/shopping-image.png" class="image" alt="shop online"/></td>
                                <td>
                                    <h2>Why shop on our website</h2>
                                    <p>
                                        We offer a versatile product lineup for all liking! We have a large catalogue of product to fit any pocket size and meet any needs.
                                        Our products come with quality assurance, money back guarantee on damaged goods and failed deliveries. You can return an item within
                                        three days on receiving if you do not like the item or does not serve the intended purchase need. A list of advantages enjoyed by our customer.

                                        <ul class="checked-list">
                                            <li>Money back guaranteed.</li>
                                            <li>Upto 30 day return period.</li>
                                            <li>High value for you money.</li>
                                            <li>Variety to choose from.</li>
                                        <li>We have a dedicated 24/7 hour support.</li>
                                        </ul>

                                    <button><a href="buy.php">Shop now</a></button>
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <table>
                            <tbody>
                            <tr>
                                <td><img src="images/sell-online.png" class="image" alt="shop online"/></td>
                                <td>
                                    <h2>Why sell on our website</h2>
                                    <p>
                                        We value our partners a lot, we offer the lowest selling charges on the market as low as 0.75% for total monthly sale!
                                        Our website has your marketing department sorted no need to spend more to get your product around. We have over 100K new daily visitors and
                                        over 40m registered users. These are just the tip of the ice berg below are more advantages you get by partnering with us.

                                        <ul class="checked-list">
                                            <li>High conversion rate in sale of upto 25%, the highest in e-commerce.</li>
                                            <li>We cover all delivery logistics which is charged on monthly revenue of 0.75%</li>
                                            <li>We offer free packaging materials.</li>
                                            <li>We offer free financial and consultation support.</li>
                                            <li>We have a dedicated 24/7 hour support.</li>
                                        </ul>

                                        <button><a href="sell.php">Start selling</a></button>
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width: 25%">
                        Login to your account.<br/>
                        <a href="login.php">login</a>
                        <br/>
                        <br/>
                        Create an new account.<br/>
                        <a href="registration.php">register</a>
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