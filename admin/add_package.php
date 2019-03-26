<?php 
include('../functions.php');

$success = "";
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
if (isset($_POST['add_pax'])) {
	$theme = $_POST['theme'];
	$pax = $_POST['pax'];
	$price = $_POST['price'];
	$food = $_POST['food'];
	$quantity = $_POST['quantity'];

	$sql = "INSERT INTO package (theme, pax, price, food, quantity) VALUES ('$theme','$pax','$price','$food','$quantity')";
	mysqli_query($db,$sql);

	$success = "<div class='alert alert-success'> Adding Package Successful</div>";
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



	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="panel panel-info">
					<div class="panel-heading">
						ADD PACKAGE
					</div>
					<div class="panel-body">
						<?php echo $success; ?>
					<form method="POST" action="add_package.php">
						<div class="form-group">
							<label>THEME</label>
							<input type="text" name="theme" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>PERSON</label>
							<input type="number" name="pax" class="form-control" required="">
						</div>						
						<div class="form-group">
							<label>PRICE</label>
							<input type="number" name="price" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>FOOD</label>
							<textarea rows="3" name="food" class="form-control" required=""></textarea>
						</div>
						<div class="form-group">
							<label>QUANTITY</label>
							<input type="number" name="quantity" class="form-control" required="">
						</div>
					</div>
					<div class="panel-footer">
						<button type="submit" name="add_pax" class="btn btn-info">ADD</button>
					</form>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-right">
				<a href="packages.php" class="btn btn-info"> BACK</a>
			</div>
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