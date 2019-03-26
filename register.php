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
	      <a class="navbar-brand" href="#" style="color: black;">A-1 CATERING SERVICE SYSTEM</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar"> 
	      
	    </div>
	  </div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				
			</div>
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading" style="font-size: 20px; text-align: center;">
						<i class="fa fa-sign-in"></i> SIGN-IN
					</div>
					<div class="panel-body">
						<form method="post" action="register.php">
							<?php echo display_error(); ?>
							<?php echo $okay; ?>
							<div class="form-group">
								<label>First Name</label>
								<input type="text" name="firstname" maxlength="20" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" name="lastname" maxlength="20" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" maxlength="20" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Contact Number</label>
								<input type="number" name="number" maxlength="11" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" pattern="[1-0a-zA-Z]" maxlength="20" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password_1" class="form-control" reqiured>
							</div>
							<div class="form-group">
								<label>Confirm password</label>
								<input type="password" name="password_2" class="form-control" rquired>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info" name="register_btn"><i class="fa fa-user-plus"></i> SIGN-UP</button>
							</div> 
						</form>
					</div>
					<div class="panel-footer">
						Already a member? <a href="login.php" class="btn" style="text-decoration: none;"><i class="fa fa-sign-in"></i> SIGN-IN</a>
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