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



	<div class="container-fluid">
		<div><a href="add_package.php" class="btn btn-info">ADD PACKAGE</a></div>
		<div class="row"> <br>
			<?php
				$sql = "SELECT * FROM package";
				$result = mysqli_query($db,$sql); 
				while ($row = mysqli_fetch_array($result)) {
			?>
			<div class="col-md-3">
				<div class="panel panel-info">
					<div class="panel-heading text-center">
						<?php echo $row['theme']; ?> PACKAGE
					</div>
					<div class="panel-body">
						Price: <?php echo $row['price']; ?> <br>
						Person: <?php echo $row['pax']; ?> <br>
						Food: <?php echo $row['food']; ?> <br>
						Quantity: <?php echo $row['quantity']; ?>
					</div> 
					<div class="panel-footer">
						<a class="btn btn-danger btn-fab" href="remove_package.php?id=<?php echo $row['package_id']; ?>" style="border-radius: 50px;"><i class="fa fa-trash"></i></a>
					</div>
				</div>
			</div>
			<?php } ?>
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