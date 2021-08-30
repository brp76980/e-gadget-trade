<?php
    session_start();
    require_once("database_connection.php");

    if(isset($_SESSION["firstname"])){
    } else {
        header('Location: login.php');
    }

    // Get cart items
    $sql_cart_items = "SELECT * FROM cart WHERE user_id=" . $_SESSION["user_id"];
    $result_cart_items = mysqli_query($conn, $sql_cart_items);

    if (mysqli_num_rows($result_cart_items) > 0) {
        // user shipping information
        $sql_my_shipping_address = "SELECT * FROM shipping_addresses WHERE user_id=" . $_SESSION["user_id"];
        $result_my_shipping_address = mysqli_query($conn, $sql_my_shipping_address);

        $shipping_address_string = "";
        if (mysqli_num_rows($result_my_shipping_address) > 0) {
            $shipping_address = mysqli_fetch_assoc($result_my_shipping_address);

            $shipping_address_string = "names: " . $shipping_address["names"] . ", phone: " . $shipping_address["phone"].
                ", address: " . $shipping_address["address"] . ", country: " . $shipping_address["country"].
                ", province: " . $shipping_address["province"] . ", city: " . $shipping_address["city"] . ", zip code: " .  $shipping_address["zipcode"];
        }

        // user payment info.txt
        $sql_payment_method= "SELECT * FROM payment_method WHERE user_id=" . $_SESSION["user_id"];
        $result_payment_method = mysqli_query($conn, $sql_payment_method);

        $payment_method_string = "";
        if (mysqli_num_rows($result_payment_method) > 0) {
            $payment_method = mysqli_fetch_assoc($result_payment_method);

            $payment_method_string = "Card number: ". $payment_method['card_number']. ", Expiration date: " . $payment_method['expiration_date'].
            ", Security code: " . $payment_method['security_code'] . ", Billing address: " . $payment_method['billing_address'];
        }

        // Create order
        $sql_create_order = "INSERT INTO orders (user_id, total_cost, shipping_information, payment_information) 
                                        VALUES ('".$_SESSION["user_id"]."', 0, '$shipping_address_string', '$payment_method_string'); ";
        $order_id = -1;
        if (mysqli_query($conn, $sql_create_order)) {
            $order_id = mysqli_insert_id($conn);

            // Create order items
            $total_cost = 0;
            while ($row_cart_item = mysqli_fetch_assoc($result_cart_items)) {
                // Get item
                $sql_item = "SELECT * FROM items WHERE id=" . $row_cart_item["item_id"];
                $result_item = mysqli_query($conn, $sql_item);

                if (mysqli_num_rows($result_item) > 0) {
                    while($row_item = mysqli_fetch_assoc($result_item)) {
                        $total_cost = $total_cost + $row_item["price"];
                    }
                }

                // Create order item
                $sql_create_order_item = "INSERT INTO order_items (order_id, item_id) 
                                                            VALUES ('$order_id', '".$row_cart_item["item_id"]."')";

                if (mysqli_query($conn, $sql_create_order_item)) {
                } else {
                    echo "Error: " . $sql_create_order_item . "<br>" . mysqli_error($conn);
                }

                // Empty cart
                $sql_empty_cart = "TRUNCATE TABLE cart;";

                if (mysqli_query($conn, $sql_empty_cart)) {
                } else {
                    echo "Error: " . $sql_empty_cart . "<br>" . mysqli_error($conn);
                }
            }

            // Update order cost
            $sql_update_order = "UPDATE orders SET total_cost = '$total_cost' WHERE id =" . $order_id ;
            if (mysqli_query($conn, $sql_update_order)) {

            } else {
                echo "Error: " . $sql_update_order . "<br>" . mysqli_error($conn);
            }

            header("Location: my_orders.php");
        } else {
            echo "Error: " . $sql_create_order . "<br>" . mysqli_error($conn);
        }
    } else {
        header("Location: home.php?message='no items in cart'");
    }