<?php include_once("database/constants.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Atigala Inventry Management System</title>
    <link rel="icon" href="img/logo/logo.png" type="image/x-icon">

	
	<!---<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->

  <link href="bootstrap-4.4.1-dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<script src="jquery/jquery.min.js"></script>
	<script src="bootstrap-4.4.1-dist/js/bootstrap.js"></script>
	<script type="text/javascript" src=" fontawesome/js/all.js"></script>
	<link href="css/main.css" rel="stylesheet">
	<link href="css/fonts.css" rel="stylesheet">
  <script type="text/javascript" rel="stylesheet" src="js/main.js"></script>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php"><img class="logo" src="img/logo/logo.png"></a>
    <div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Login as
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="adminlg.php">Admin</a>
      <a class="dropdown-item" href="index.php">User</a>
    </div>
  </div>
    <h2 class="title ml-auto">Inventory Management System</h2>
  </div>
</nav>

<br/><br/>
<div class="card w-25 mx-auto shadow-lg">
  <i class="far fa-user" style="font-size: 6rem; margin: auto; padding-top: 10px;"></i>
  <h5 class="title mx-auto" style="margin-top: 10px; font-size: 30px;">Admin Login</h5>
  <div class="card-body">
        <form id="form_login_admin" onsubmit="return false" class="login">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="log_email_admin" id="log_email_admin" placeholder="Enter email">
          <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="log_password_admin" id="log_password_admin" placeholder="Password">
          <small id="p_error" class="form-text text-muted"></small>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>    
  </div>
</div>
<br/><br/>
<?php include_once('include/footer.php'); ?>

</body>
</html>
