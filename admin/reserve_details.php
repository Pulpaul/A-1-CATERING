<?php 
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
$r_id = $_GET['id'];
$sql = "SELECT * FROM reserve INNER JOIN package ON reserve.packs_id = package.package_id WHERE reserve_id = '$r_id' ";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Client</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
</head>
<body style="background-color: #EEE;">
	<nav class="navbar navbar-default" style="background-color: skyblue; padding: 10px 10px;">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" style="color: black;"> A-1 CATERING SERVICE SYSTEM</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-center">
	        <li style="border-style: inset; border: 1px black;"><a  href="home.php">DASHBOARD</a></li>
	        <li style="border-style: inset; border: 1px black;"><a  href="dashboard.php">RESERVES</a></li>  
	        <li style="border-style: inset; border: 1px black;"><a  href="packages.php">PACKAGES</a></li>
	      </ul> 
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="" style="color: black; cursor: default;"><?php echo $_SESSION['user']['username']; ?></a></li>
		      <li><a href="home.php?logout='1'"><span class=" fa fa-sign-out"></span> LOG-OUT</a></li>
		    </ul>
	    </div>
	  </div>
	</nav>



	<div class="container">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					RESERVE DETAILS
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<h4>PACKAGE DETAILS</h4>
							ID: <?php echo $row['package_id']; ?><br>
							THEME: <?php echo $row['theme']; ?><br>
							PRICE: <?php echo $row['price']; ?><br>
							PERSON: <?php echo $row['pax']; ?><br>
							FOOD: <?php echo $row['food']; ?><br>
							QUANTITY: <?php echo $row['quantity']; ?><br>
						</div>
						<div class="col-md-6">
							<h4>CLIENT DETAILS</h4>
							ID: <?php echo $row['client_id']; ?><br>
							FULL NAME: <?php echo $row['full_name']; ?><br>
							CONTACT NUMBER: <?php echo $row['contact_number']; ?><br>
							EMAIL: <?php echo $row['email_ad']; ?><br>
							ADDRESS: <?php echo $row['c_address']; ?><br>
							STATUS: <?php echo $row['status']; ?><br>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<a href="home.php" class="btn btn-info">BACK</a>
				</div> 
			</div>
		</div>
		<div class="col-md-2">
			
		</div> 
	</div>

    <script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script src="../js/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../js/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> 
    <script>
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();   
	});
	</script> 
</body>
</html>