<?php
    include "connect.php";

    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['loggedIn_atm_id'])) {
        $sql01 = "SELECT * FROM atm WHERE a_id=".$_SESSION['loggedIn_atm_id'];
        $result1 = $conn->query($sql0);
        $row1 = $result1->fetch_assoc();

    }
?>

