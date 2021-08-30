<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e_gadget_trade_db";

//    $username = "id17316834_e_gadget_trade";
//    $password = "z!G/w_nX1/WnTXK#";
//    $dbname = "id17316834_e_gadget_trade_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }