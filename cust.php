<?php
    include "connect.php";

    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['loggedIn_cust_id'])) {
        $sql0 = "SELECT * FROM customer WHERE card_no=".$_SESSION['loggedIn_cust_id'];
        $result = $conn->query($sql0);
        $row = $result->fetch_assoc();

    }
?>

