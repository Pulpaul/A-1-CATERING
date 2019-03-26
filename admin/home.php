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



	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-info">
			<div class="panel-heading">
				DASHBOARD
			</div>
			<div class="panel-body"> 
				<div class="form-group text-center">
					<h3><i class="fa fa-registered"></i></h3>
					<h5> <?php 
					$sql = "SELECT * FROM reserve";
					$result = mysqli_query($db,$sql);
					echo mysqli_num_rows($result); ?> Total Reserve </h5>
				</div>
				<div class="form-group text-center">
					<h3><i class="fa fa-dropbox"></i></h3>
					<h5> <?php 
					$sql = "SELECT * FROM package";
					$result = mysqli_query($db,$sql);
					echo mysqli_num_rows($result); ?> Total Package </h5>
				</div>
			</div> 
		</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
			<div class="panel-heading">
				RESERVE DASHBOARD
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						NEW RESERVES
						<table class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>CLIENT</th>
									<th>THEME</th>
									<th>PRICE</th>
									<th>TRANSACTION</th>
									<th>STATUS</th>
									<th>OPTION</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM reserve INNER JOIN package ON reserve.packs_id = package.package_id";
								$result = mysqli_query($db,$sql);
								while ($row = mysqli_fetch_array($result)) {
								?>
								<tr>
									<td><?php echo $row['client_id']; ?></td>
									<td><?php echo $row['full_name']; ?></td>
									<td><?php echo $row['theme']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td><?php echo $row['status']; ?></td>
									<td><?php

											$status = $row['state'];
											if ($status == 'Pending') {
												echo "<span class='label label-warning'>";
												echo $row['state']; 
												echo "</span>";
											}
											elseif ($status == 'Approved') {
												echo "<span class='label label-success'>";
												echo $row['state']; 
												echo "</span>";
											}
										?> </td>
									
									<td><a href="reserve_details.php?id=<?php echo $row['reserve_id']; ?>" data-toggle="tooltip" data-placement="top" title="VIEW"><button class="btn btn-info btn-fab btn-sm" style="border-radius: 50px;"><i class="fa fa-info-circle"></i></button></a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div> 
				</div>
			</div> 
		</div>
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