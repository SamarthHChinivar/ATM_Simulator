<?php
    include "connect.php";
	$sql="SELECT * FROM transaction_log ORDER BY t_id DESC LIMIT 10 ";
	$result = $conn->query($sql);
	
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
	{	font-family: "Lato", sans-serif;
		font-weight: bold;
		font-size: 40px;
		color: black;
		text-align: center;
		position: fixed;
  		bottom: 390;
		right: 0;
		width: 1279px;
		color: darkgreen;
		
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
  		width: 70%;
  		padding: 5px 5px;
  		margin: 7px 0;
  		display: inline-block;
  		border: 1px solid #ccc;
  		border-radius: 8px;
  		box-sizing: border-box;
		font-size: 12px; 
		text-align: center;
	}

	input[type=submit] 
	{
		width: 70%;
  		background-color: #4CAF50;
  		color: white;
		align: center;
  		margin: 7px 0;
  		border: none;
  		border-radius: 8px;
  		cursor: pointer;
		font-size: 12px; 
		padding: 5px 5px;
		border: 1px solid #ccc;
		border-color: #45a049;
	}
	input[type=password], select 
	{
  		width: 70%;
  		padding: 5px 5px;
  		margin: 7px 0;
  		display: inline-block;
  		border: 1px solid #ccc;
  		border-radius: 8px;
  		box-sizing: border-box;
		font-size: 12px; 
		text-align: center;
	}

	input[type=submit]:hover 
	{
  		color: #45a049;
		background-color: rgba(0, 255, 0, 0.18);
		align: center;
		border: 1px solid #ccc;
		border-color: white;
	}

	/*div.form
	{
  		width: 550px;
		text-align:center;
		border-radius: 20px;
		font-family: "Lato", sans-serif;
		display: grid;
		position:fixed;
		right:450;
	}*/

	div.form
	{
  		width: 550px;
		position: fixed;
  		bottom: 213;
  		right:  450;
		text-align:center;
		border-radius: 20px;
		font-family: "Lato", sans-serif;
		display: grid;
	}
	table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
  text-align:center;
  background-color: rgba(0, 250, 0, 0.05);
  border-radius: 5px;
  padding: 7px;
  border-spacing: 5px;

}

</style>
</head>
<body>
	<div class="topnav" id="myTopnav">
  
   <a href="tlog.php" class="active">WITHDRAWAL LOG</a>
   <a href="dlog.php">DEPOSITION LOG</a>
  <a href="index.php">HOME</a>
 
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
	<div class="form">
	<table style="margin-top:-60.7%; align:center;">
	<thead>
	<tr>
	<td><b>ID</b></td>
	<td><b>AMOUNT</b></td>
	<td><b>DATE AND TIME</b></td>
	</tr>
	</thead>
	<tfoot>
	
  		<?php if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<br>";
					echo "<tr>";
					echo "<td>".$row["t_id"]."</td>";
					echo "<td>".$row["t_amt"]."</td>";
					echo "<td>".$row["time"]."</td>";
					echo "<br>";
					echo "<tr>";
				}
			} 
			?>
	</tr>
	</tfoot>
	</table>
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