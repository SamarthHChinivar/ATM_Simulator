<?php
    include "connect.php";
    
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

	$card_no = mysqli_real_escape_string($conn, $_POST["card_no"]);
    $card_pin = mysqli_real_escape_string($conn, $_POST["card_pin"]);

    $sql0 =  "SELECT * FROM customer
				WHERE card_no='".$card_no."' AND card_pin='".$card_pin."'";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();
	
	if (($result->num_rows) > 0) {
        $_SESSION['loggedIn_cust_id'] = $row["card_no"];
        $_SESSION['isCustValid'] = true;
        $_SESSION['LAST_ACTIVITY'] = time();
        header("location:./chome.php");
		
    }
    else {
        session_destroy();
        die(header("location:./index.php?loginFailed=true"));
    }
?>
