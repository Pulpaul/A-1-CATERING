<?php 
	include('functions.php');
	
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css"> 
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
	      <a class="navbar-brand" style="color: black;">A-1 CATERING SERVICE SYSTEM</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-center">
	        <li style="border-style: inset; border: 1px black;"><a  href="index.php">HOME</a></li> 
	      </ul> 
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="" style="color: black; cursor: default;"><?php echo $_SESSION['user']['username']; ?></a></li>
		      <li><a href="index.php?logout='1'"><span class=" fa fa-sign-out"></span> LOG-OUT</a></li>
		    </ul>
	    </div>
	  </div>
	</nav>



	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						THEME PACKAGE
					</div>
					<div class="panel-body">
						<h2><?php echo $row['theme']; ?> PACKAGE</h2>
						Price: PHP <?php echo $row['price']; ?> <br>
						Person: <?php echo $row['pax']; ?> <br>
						Food Inclusion: <?php echo $row['food']; ?><br>
						Quantity:<?php echo $row['quantity']; ?> pcs. for each food. 
					</div>
					<div class="panel-footer">
						
					</div>
				</div>
			</div> 
			<div class="col-md-8">
				<div class="panel panel-info">
					<div class="panel-heading">
						RESERVE DETAILS
					</div>
					<div class="panel-body">
						Reserve ID: <?php echo $row['reserve_id']; ?> <br>
						Full Name: <?php echo $row['full_name']; ?> <br>
						Contact Number: <?php echo $row['contact_number']; ?> <br>
						Email: <?php echo $row['email_ad']; ?> <br>
						Address: <?php echo $row['c_address']; ?> <br>
						Package ID: <?php echo $row['packs_id']; ?> <br>
						Package Theme: <?php echo $row['theme']; ?> <br>
						Price: <?php echo $row['price']; ?> <br>
						Status: <?php echo $row['status']; ?> <br>
					</div>
					<div class="panel-footer">
						
					</div>
				</div>
			</div>
		</div>
	</div>

    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script> 
	<script>
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
</body>
</html>