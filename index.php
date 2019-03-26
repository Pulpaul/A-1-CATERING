<?php 
	include('functions.php');
	
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
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
						<?php
							$sql = "SELECT * FROM package";
							$result = mysqli_query($db,$sql);
							while ($row = mysqli_fetch_array($result)) { 
						?>
						<div class="form-group text-center">
							<h1><?php echo $row['theme']; ?> PACKAGE</h1>
							<p>PHP <?php echo $row['price']; ?></p>
							<p><a href="pax_details.php?id=<?php echo $row['package_id']; ?>" class="btn btn-info">AVAIL</a></p>
						</div> 
						<?php } ?>
					</div>
					<div class="panel-footer">
						
					</div>
				</div>
			</div> 
			<div class="col-md-8">
				<div class="panel panel-info">
					<div class="panel-heading">
						RESERVE
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>FULL NAME</th>
									<th>THEME</th>
									<th>PRICE</th>
									<th>TRANSACTION</th>
									<th>STATUS</th>
									<th>OPTION</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$your_id = $_SESSION['user']['id'];
									$sql = "SELECT * FROM reserve INNER JOIN package ON reserve.packs_id = package.package_id WHERE client_id = '$your_id' ";
									$res = mysqli_query($db,$sql);
									while ($fetch = mysqli_fetch_array($res)) { 
									
								?>
								<tr>
									<td><?php echo $fetch['full_name']; ?></td>
									<td><?php echo $fetch['theme']; ?></td>
									<td>PHP <?php echo $fetch['price']; ?></td>
									<td><?php echo $fetch['status']; ?></td>
									<td>
										<?php

											$status = $fetch['state'];
											if ($status == 'Pending') {
												echo "<span class='label label-warning'>";
												echo $fetch['state']; 
												echo "</span>";
											}
											elseif ($state == 'Approved') {
												echo "<span class='label label-success'>";
												echo $fetch['state']; 
												echo "</span>";
											}
										?> 
									</td>
									<td><a href="reserve_details.php?id=<?php echo $fetch['reserve_id']; ?>" data-toggle="tooltip" data-placement="top" title="VIEW"><button class="btn btn-info btn-fab btn-sm" style="border-radius: 50px;"><i class="fa fa-info-circle"></i></button></a>
										<a href="delete_order.php?id=<?php echo $fetch['reserve_id']; ?>" data-toggle="tooltip" data-placement="top" title="VIEW"><button class="btn btn-danger btn-fab btn-sm" style="border-radius: 50px;"><i class="fa fa-trash"></i></button></a></td>
								<?php } ?>
								</tr>
							</tbody>
						</table>
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