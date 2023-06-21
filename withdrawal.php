<?php
    include "validate_customer.php";
	include "connect.php";
	
	$card_no = $_SESSION['loggedIn_cust_id'];
    $sql0 = "SELECT * FROM customer WHERE card_no=".$card_no;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();
	
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
.sidenav p {
  color: white;
  margin-left: 10px;
  margin-top: 100px;
  color: lightgreen;
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
  bottom: 100px;
  right: 0px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

input[type=number], select 
{
  	width: 40%;
  	padding: 8px 10px;
  	margin: 35px 0;
  	display: inline-block;
  	border: 1px solid #ccc;
  	border-radius: 8px;
  	box-sizing: border-box;
	font-size: 12px; 
	text-align: center;	
}
input[type=submit] 
{
	width: 40%;
	background-color: #4CAF50;
	color: white;
	align: center;
	margin: 10px 0;
	border: 1px solid #ccc;
	border-radius: 8px;
	cursor: pointer;
	font-size: 12px; 
	padding: 8px 10px;
	border-color:white;
}
input[type=submit]:hover 
	{
  		color: #45a049;
		background-color: rgba(0, 255, 0, 0.18);
		align: center;
		border: 1px solid #ccc;
		border-color: white;
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


</style>
</head>
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
 
 <p class="heading">Welcome, &nbsp<?php echo $row0["c_name"]?>!</p>
<div class="main">

	<form action="withdrawal_action.php" method="POST">
	<br>
	<br>
	<br>
	<label for="t_amt">Please enter the amount to be withdrawn.</label>
	<br>
    	<input type="number" min="0" id="t_amt" name="t_amt" placeholder="Enter amount">
	<br>
	<input type="submit" value="Submit">
  	</form>
</div>
   
</body>
</html> 
