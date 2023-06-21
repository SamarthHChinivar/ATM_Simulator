<?php
    include "validate_customer.php";
    include "cust.php";

    $card_no = $_SESSION['loggedIn_cust_id'];

    $sql0 = "SELECT * FROM customer WHERE card_no=".$card_no;
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();
	
	$sql011 = "SELECT * FROM atm WHERE a_id=1";
    $result011 = $conn->query($sql011);
    $row011 = $result011->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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



.main {
  margin-left: 250px; /* Same as the width of the sidenav */
  font-size: 35px; /* Increased text to enable scrolling */
  text-align: center;
  margin-top:0px;
}
.sidenav a:hover {
  color: white;
  background-color: #4CAF50;
}
.sidenav a.active {
  background-color: #4CAF50;
  color:white;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.info{
	background-color:rgba(20, 70, 90, 0.15);
	padding: 30px 10px;
	text-align: center;	
	width: 50%;
	margin-left: 240px; 
	border-radius: 25px;
	color: black;
	position:relative;
	bottom: 30px;
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
	right: 10px;
	background-color: black;
}
.sidenav p {
  color: white;
  margin-left: 10px;
  margin-top: 100px;
  color: lightgreen;
}
</style>
</head>
<body>

<div class="sidenav">
  <a href="chome.php" style="border: 5px solid black;">Home</a>
  <a href="withdrawal.php" style="border: 5px solid black;">Withdrawal</a>
  <a href="deposition.php" style="border: 5px solid black;">Deposition</a>
  <a href="balance.php" class="active" class="hover" style="border: 5px solid black;">Balance Enquiry</a>
  <a href="pinchange.php" style="border: 5px solid black;">Pin Change</a>
  <a href="exit.php" style="border: 5px solid black;">Exit</a>
    <p><i>---&nbsp<?php echo $row011["a_name"];?>, &nbsp<?php echo $row011["a_add"]?></i></p>
</div>
<div class="main">
	<p class="heading">Welcome, &nbsp<?php echo $row["c_name"]?>!</p>
	<div class="info" style="font-size: 25px;">
	<b>Account Number : </b><?php echo $row["acc_no"]; ?>
	<br>
	<br>
	<b>Balance : </b><?php echo number_format($row["bal"]); ?>/-
	<br>
	<br>
	<b>Total Withdrawn Amount : </b><?php echo number_format($row["t_amt"]); ?>/-
	<br>
	<br>
	<b>Total Deposited Amount : </b><?php echo number_format($row["d_amt"]); ?>/-
	</div>
</div>
   
</body>
</html> 
