		<?php  
		session_start(); 
		if(isset($_SESSION['admin_sid']) || isset($_SESSION['customer_sid']) || isset($_SESSION['owner_sid']))
		{
		  header("location:index.php");
		} 
		else{
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="msapplication-tap-highlight" content="no">
		  <title>Login</title>

		  <!-- CORE CSS-->
		  
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		  <style>
		  body{
		      background-image: url("images/background.png");
		      background-size: 100%;
		      background-repeat: no-repeat;
		    }
	    /* Remove the navbar's default margin-bottom and rounded borders */ 
	    .navbar {
	      margin-bottom: 0;
	      border-radius: 0;
	    }
	    
	    /* Set black background color, white text and some padding */
	    footer {
	      background-color: #555;
	      color: white;
	      padding: 15px;
	      alignment-baseline: auto;
	    }
	    .row.content {height: 610px}
	  </style>
	</head>
	<body>
	<div class="container-fluid text-center">    
	  <div class="row content">
	    <div class="col-sm-3">
	    </div>
	    <div class="col-sm-9"> 
	     <div class="container-fluid col-md-8">
				<div class="page-header bg-danger text-white">
					<span class="lead">Welcome</span>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading text-danger">Enter Login details</div>
					<div class="panel-body">
						<form name="loginForm" class="form-horizontal"
							action="routers/router.php" method="POST" autocomplete="off"
							onsubmit="return validate()">
							        <div class="navbar-fixed">
		            <h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1"><img src="images/l2.png" alt="logo" width="200px"; height="90px";></a> <span class="logo-text">
			        </div>
							<div class="form-group row">
								<label class="control-label col-sm-4" for="username">User
									Name:</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="username"
										name="username" placeholder="Enter username" maxlength="20"
										required="required" autofocus="autofocus">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-sm-4" for="pwd">Password:</label>
								<div class="col-sm-6">
									<input type="password" class="form-control" id="password"
										name="password" placeholder="Enter password" maxlength="20"
										required="required">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-offset-4 col-md-6">
									<button type="submit" class="btn btn-primary btn-block">Login</button>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-offset-4 col-md-6">
									Don't have an account? <a href="register.php">Register here</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
	    </div>

	  </div>
	</div>
<?php include("footer.php");?>
		</body>
		</html>
		<?php
		}
		?>