<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Catering</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body style="background-image: url('images/cs-catering.jpg'); background-size: cover; background-repeat: no-repeat; width: 100%; height: auto;">

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
	      
	    </div>
	  </div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 text-center" style="color: white;"> <br>
				<h1>Providing quality service and delicious foods.</h1>
				<h2>Make your event memorable</h2>
			</div>
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading" style="font-size: 20px; text-align: center;">
						<i class="fa fa-sign-in"></i> SIGN-IN
					</div>
					<div class="panel-body">
						<form method="post" action="login.php">
							<?php echo display_error(); ?>

							<div class="form-group">
								<label>USERNAME</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label>PASSWORD</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="input-group">
								<button type="submit" class="btn btn-info" name="login_btn"><i class="fa fa-sign-in"></i> SIGN-IN</button>
							</div>
							<p>
								
							</p>
						</form>
					</div>
					<div class="panel-footer">
						Not yet a member? <a href="register.php" class="btn" style="text-decoration: none;"><i class="fa fa-user-plus"></i> SIGN-UP</a>
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