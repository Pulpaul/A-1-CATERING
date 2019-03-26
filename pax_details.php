<?php 
$finish_na = "";
	include('functions.php');
	
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
$p_id = $_GET['id'];
$sql = "SELECT * FROM package WHERE package_id = '$p_id' ";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);


	if (isset($_POST['finish_buy'])) {
		$client_id = mysqli_escape_string($db,$_SESSION['user']['id']);
		$full_name = mysqli_escape_string($db,$_POST['full_name']);
		$contact_number = mysqli_escape_string($db,$_POST['contact_number']);
		$email_ad = mysqli_escape_string($db,$_POST['email_ad']);
		$c_address = mysqli_escape_string($db,$_POST['c_address']);
		$packs_id = mysqli_escape_string($db,$_GET['id']);

		$query = "INSERT INTO reserve (client_id, full_name, contact_number, c_address, email_ad, packs_id, status,state) VALUES ('$client_id','$full_name','$contact_number','$c_address','$email_ad','$packs_id','Paid','Pending')";
		mysqli_query($db, $query);
		$finish_na = "<div class='alert alert-success'> Transaction Successful!</div>";
	}
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
						ORDER DETAILS
					</div>
					<div class="panel-body">
						<?php echo $finish_na; ?>
						<form method="POST" action="pax_details.php?id=<?php echo $_GET['id'] ?>">
							<div class="form-group">
								<label>FULL NAME</label>
								<input type="text" name="full_name" class="form-control">
							</div>
							<div class="form-group">
								<label>CONTACT NUMBER</label>
								<input type="number" name="contact_number" class="form-control">
							</div>
							<div class="form-group">
								<label>ADDRESS</label>
								<input type="text" name="c_address" class="form-control">
							</div>
							<div class="form-group">
								<label>EMAIL</label>
								<input type="email" name="email_ad" class="form-control">
							</div>  
					</div>
					<div class="panel-footer">
						<button type="submit" name="finish_buy" class="btn btn-info">FINISH</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script> 
</body>
</html>