<?php
    if (isset($_GET['loginFailed'])) {
        $message = "Invalid Credentials ! Please try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>
<html>
<head>
<style>
	.topnav {
  overflow: hidden;
  background-color: black;
}

.topnav a {
   font-family: "Lato", sans-serif;
   float: right;
   color: white;
   display: block;
   text-align: center;
   padding: 16px 58px;
   text-decoration: none;
   font-size: 18px;
   width: 396;
   height: 25;
}

.topnav a:hover {
  background-color: #ddd;
  color:black;
}

.topnav a.active {
  background-color: #4CAF50;
  color:white;
}
.topnav .icon {
  display: none;
}
	body 
	{
  		margin: 0;
		background-image: url("4.jpeg");
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
	}	
	p.heading
	{	font-family: Impact, fantasy;
		font-size: 29px;
		text-align: center;
		position: fixed;
  		bottom: 390;
		right: 610;
		width: 265px;
		border: none;
		background-color: white;
		color: black;

		border-radius: 20px;
	}
	label
	{
    	display: inline-block;
    	float: center;
    	clear: left;
   		width: 250px;
    	text-align: center;
		font-size: 16px;
		font-family: "Lato", sans-serif;
	}
	input[type=text], select 
	{
  		width: 90%;
  		padding: 5px 5px;
  		margin: 7px 0;
  		display: inline-block;
  		border: 1px solid #ccc;
  		border-radius: 8px;
  		box-sizing: border-box;
		font-size: 15px; 
		text-align: center;
		background-color: white;
		color: black;
	}

	input[type=submit] 
	{
		width: 90%;
  		background-color: #4CAF50;
  		color: white;
		align: center;
  		margin: 7px 0;
  		border: none;
  		border-radius: 8px;
  		cursor: pointer;
		font-size: 15px; 
		padding: 5px 5px;
		border: 1px solid #ccc;
		border-color: #45a049;
	}
	input[type=password], select 
	{
  		width: 90%;
  		padding: 5px 5px;
  		margin: 7px 0;
  		display: inline-block;
  		border: 1px solid #ccc;
  		border-radius: 8px;
  		box-sizing: border-box;
		font-size: 15px; 
		text-align: center;
		background-color: white;
		color: black;
	}

	input[type=submit]:hover 
	{
  		color: grey;
		background-color: rgba(0, 255, 0, 0.18);
		align: center;
		border: 1px solid #ccc;
		border-color: rgba(0, 255, 0, 0.18);
	}

	div.form
	{
  		width: 450px;
		margin: auto;
  		border: none;
		position: fixed;
  		bottom: 175;
  		right: 525;
		text-align:center;
		border-radius: 10px;
		color: black;
		font-size:50px;
	}
	img {
  border: none;
  border-radius: 4px;
  padding: 15px;
  width: 500px;
  position:absolute;
  bottom:465px;
  right:485px;
  clip: rect(20px,475.5px,110px,10px);
}
</style>
</head>
<body>
	<div class="topnav" id="myTopnav">
  
   <a href="tlog.php" >WITHDRAWAL LOG</a>
   <a href="dlog.php">DEPOSITION LOG</a>
  <a href="index.php" class="active">HOME</a>
 
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
	<p class="heading">ATM SIMULATOR</p>
	<img src="image.jpg">
	<div class="form">
  		<form action="customer_login_action.php" method="post">

    		<br>
		<label for="card_no">Card No.</label>
    		<input type="text" id="card_no" name="card_no" placeholder="Enter Card No." minlength="10" maxlength="10">
		
		<br>
		<label for="card_pin">Card Pin</label>
    		<input type="password" id="card_pin" name="card_pin" placeholder="Enter Card Pin"  minlength="4" maxlength="4">

  		<br>
		<input type="submit" value="Submit">

  		</form>
	</div>
</body>
</html>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<script>