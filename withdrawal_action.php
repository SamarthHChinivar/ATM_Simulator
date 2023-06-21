<?php
    include "validate_customer.php";
    include "cust.php";

    $card_no = $_SESSION['loggedIn_cust_id'];
    $t_amt = mysqli_real_escape_string($conn, $_POST["t_amt"]);

	

    $sql0 = "SELECT bal FROM customer WHERE card_no=".$card_no;
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();
    $bal = $row["bal"];


    /*  Set appropriate error number if errors are encountered.
        Key (for err_no) :
        -1 = Connection Error.
         0 = Successful Transaction.
         1 = Insufficient Funds.
         2 = Wrong PIN entered. */
    $err_no = 0;

            $final_bal = $bal - $t_amt;

            if ($final_bal >= 0) {
                $sql1 = "UPDATE customer SET bal=$final_bal WHERE card_no=".$card_no;
				$sql2 = "INSERT INTO transaction (card_no, t_amt) VALUES ('$card_no', $t_amt)";
                if (($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE)) {
                    $err_no = 0;
                }
            }
            else {
                $err_no = 1;
            }
    $sql02 = "SELECT * FROM customer WHERE card_no=".$card_no;
    $result02 = $conn->query($sql02);
    $row02 = $result02->fetch_assoc();
	
	$sql01 = "SELECT * FROM bank INNER JOIN customer WHERE customer.b_id=bank.b_id AND customer.card_no=".$card_no;
    $result01 = $conn->query($sql01);
    $row01 = $result01->fetch_assoc();
	
	$sql011 = "SELECT * FROM atm WHERE a_id=1";
    $result011 = $conn->query($sql011);
    $row011 = $result011->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">
</head>
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: black;
  overflow-x: hidden;
  padding-top: 20px;
  border-right-style:solid; 
  border-width: 5px;
  border-color:yellow;
}

.sidenav a {
  padding: 20px 16px 16px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
}
.sidenav a:hover {
  color: white;
  background-color: #4CAF50;
}
.sidenav a.active {
  background-color: #4CAF50;
  color:white;
}


.main {
  margin-left: 240px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 20px 20px;
  text-align: center;
   position: relative;
  bottom: 120px;
  right: 0px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
p.heading
{
	color:white;  
	border-width: 5px; 
	border-bottom-style:solid;  
	border-top-style:solid;  
	border-right-style:solid;  
	border-color:yellow; 
	padding:20px; 
	text-transform: uppercase;
	width: 1244px;
	text-align: center;
	font-size: 60px;
	position:relative;
	bottom: 62px;
	right: -240px;
	background-color: black;
}
.sidenav p {
  color: white;
  margin-left: 10px;
  margin-top: 100px;
  color: lightgreen;
}
</style>
<body>
<div class="sidenav">
  <a href="chome.php" style="border: 5px solid black;">Home</a>
  <a href="withdrawal.php" class="active" class="hover" style="border: 5px solid black;">Withdrawal</a>
  <a href="deposition.php" style="border: 5px solid black;">Deposition</a>
  <a href="balance.php" style="border: 5px solid black;">Balance Enquiry</a>
  <a href="pinchange.php" style="border: 5px solid black;">Pin Change</a>
  <a href="exit.php" style="border: 5px solid black;">Exit</a>
    <p><i>---&nbsp<?php echo $row011["a_name"];?>, &nbsp<?php echo $row011["a_add"]?></i></p>
</div>
<p class="heading">Welcome, &nbsp<?php echo $row02["c_name"]?>!</p>
    <div class="main">
        <div class="flex-item" >
            <?php
            if ($err_no == -1) { ?>
                <p id="info" style="font-size: 30px;"><?php echo "Connection Error ! Please try again later.\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 0) { ?>
                <p id="info" style="font-size: 30px;"><?php echo "Transaction Successful !\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 1) { ?>
                <p id="info" style="font-size: 30px;"><?php echo "Insufficient Funds !\n"; ?></p>
            <?php } ?>

        </div>

        <div class="flex-item" >
            <a href="./withdrawal.php" class="button" style="font-size: 10x; padding: 10px; width: 70px;">Go Back</a>
        </div>
    </div>

</body>
</html>
