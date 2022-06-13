<?php
include_once("database/constants.php");
if (!isset($_SESSION["userid"])) {
  header("location:".DOMAIN."/adminlg.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage Products | Atigala Inventry Management System</title>
    <link rel="icon" href="img/logo/logo.png" type="image/x-icon">

	
	<!---<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>-->

  	<link href="bootstrap-4.4.1-dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<script src="jquery/jquery.min.js"></script>
	<script src="bootstrap-4.4.1-dist/js/bootstrap.js"></script>
	<script type="text/javascript" src=" fontawesome/js/all.js"></script>
	<link href="css/main.css" rel="stylesheet">
	<link href="css/fonts.css" rel="stylesheet">
  	<script type="text/javascript" rel="stylesheet" src="js/main.js"></script>
  	<script type="text/javascript" rel="stylesheet" src="js/manage.js"></script>

 </head>
<body>
	<?php include_once('include/nav-bar.php'); ?>
	<br/><br/>
	<h3 class="title" style="margin-top: 10px; font-size: 30px; margin-left: 14rem;">Manage Products...</h3>
	<br><br>
	<div class="container">
		<table class="table table-hover table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Product</th>
		        <th>Category</th>
		        <th>Price</th>
		        <th>Stock</th>
		        <th>Added Date</th>
		        <th>Status</th>
		        <th>Action</th>
		        <th>Test</th>
		      </tr>
		    </thead>
		    <tbody id="get_product">
		      <!--<tr>
		        <td>1</td>
		        <td>Electronics</td>
		        <td>Root</td>
		        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
		        <td>
		        	<a href="#" class="btn btn-danger btn-sm">Delete</a>
		        	<a href="#" class="btn btn-info btn-sm">Edit</a>
		        </td>
		      </tr>-->
		    </tbody>
		  </table>
	</div>
<?php include_once('templates/product.php'); ?>	
	
</body>
</html>