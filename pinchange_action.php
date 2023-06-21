<?php
    include "validate_customer.php";
    include "cust.php";
	include "connect.php";

    /*  Set appropriate error number if errors are encountered.
        Key (for err_no) :
        -1 = Connection Error.
         0 = Successful Change.
         1 = Old password is incorrect.
         2 = Passwords do not match.
         3 = Old and new passwords are same. */
    $err_no = -1;

    $card_no = $_SESSION['loggedIn_cust_id'];
	
	$sql02 = "SELECT * FROM customer WHERE card_no=".$card_no;
    $result02 = $conn->query($sql02);
    $row02 = $result02->fetch_assoc();
	
    $pinchp = mysqli_real_escape_string($conn, $_POST["pinchp"]);
    $pinchc = mysqli_real_escape_string($conn, $_POST["pinchc"]);
    $pincha = mysqli_real_escape_string($conn, $_POST["pincha"]);

    $sql0 = "SELECT * FROM customer WHERE card_no=".$card_no." AND card_pin='".$pinchp."'";
    $info_string = "PIN";
    $result0 = $conn->query($sql0);
    if (($result0->num_rows) > 0) {
        if ($pinchc == $pincha) {
            if ($pinchp != $pinchc) {
               $sql1 = "UPDATE customer SET card_pin = '$pinchc' WHERE card_no=".$card_no;
                
            if (($conn->query($sql1) === TRUE)) {
                    $err_no = 0;
            }
			}
		
			else {
			$err_no = 3;
			}
        }
    
		else {
            $err_no = 2;
		}
    }
    else {
        $err_no = 1;
    }
	
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
.sidenav a:hover {
  color: white;
  background-color: #4CAF50;
}
.sidenav a.active {
  background-color: #4CAF50;
  color:white;
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
<body>
<div class="sidenav">
  <a href="chome.php" style="border: 5px solid black;">Home</a>
  <a href="withdrawal.php" style="border: 5px solid black;">Withdrawal</a>
  <a href="deposition.php" style="border: 5px solid black;">Deposition</a>
  <a href="balance.php" style="border: 5px solid black;">Balance Enquiry</a>
  <a href="pinchange.php" class="active" class="hover" style="border: 5px solid black;">Pin Change</a>
  <a href="exit.php" style="border: 5px solid black;">Exit</a>
    <p><i>---&nbsp<?php echo $row011["a_name"];?>, &nbsp<?php echo $row011["a_add"]?></i></p>
</div>
<p class="heading">Welcome, &nbsp<?php echo $row02["c_name"]?>!</p>
    <div class="main">
        <div class="flex-item">
            <?php
            if ($err_no == -1) { ?>
                <p id="info" style="font-size: 30px;"><?php echo "Connection Error! Please try again later.\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 0) { ?>
                <p id="info" style="font-size: 30px;"><?php echo $info_string." successfully changed!\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 1) { ?>
                <p id="info" style="font-size: 30px;"><?php echo "Old ".$info_string." is incorrect!\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 2) { ?>
                <p id="info" style="font-size: 30px;"><?php echo $info_string."s do not match!\n"; ?></p>
            <?php } ?>

            <?php
            if ($err_no == 3) { ?>
                <p id="info" style="font-size: 30px;"><?php echo "Old and New ".$info_string."s are same!\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./pinchange.php" class="button" style="font-size: 10x; padding: 10px; width: 70px;">Go Back</a>
        </div>
    </div>

</body>
</html>
