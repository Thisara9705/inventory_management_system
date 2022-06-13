<?php include_once("include/dbconnection.php"); ?>
<?php
include_once("database/constants.php");
if (!isset($_SESSION["userid"])) {
  header("location:".DOMAIN."/index.php");
}
?>
<?php 
  $uname = '';
  $name ='';
  $password ='';
  $old_password ='';
  $new_password ='';
  $con_password ='';

  if (isset($_SESSION['userid'])) {

    $uname = mysqli_real_escape_string($connection, $_SESSION['username']);
    $query = "SELECT * FROM user WHERE id = '{$_SESSION["userid"]}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
      if (mysqli_num_rows($result_set) == 1) {

        $result = mysqli_fetch_assoc($result_set);
        $uname = $result['username'];
        $password = $result['password'];
      } else {
        header('Location: admin.php?err=user_not_found'); 
      }
    } else {
      header('Location: admin.php?err=query_failed');
    }
  }


  if (isset($_POST['editprofile'])) {

    $name = $_POST['uname'];
    $old_password = $_POST['cpw'];
    $new_password = $_POST['npw'];
    $con_password = $_POST['cnpw'];


      $name = mysqli_real_escape_string($connection, $_POST['uname']);
      $old_password = mysqli_real_escape_string($connection, $_POST['cpw']);
      $hashed_old_password = password_hash($old_password,PASSWORD_BCRYPT,["cost"=>8]);
      $new_password = mysqli_real_escape_string($connection, $_POST['npw']);
      $hashed_new_password = password_hash($new_password,PASSWORD_BCRYPT,["cost"=>8]);
      $con_password = mysqli_real_escape_string($connection, $_POST['cnpw']);
      $hashed_con_password = password_hash($con_password,PASSWORD_BCRYPT,["cost"=>8]);


      if ($hashed_old_password == $password && $hashed_new_password == $hashed_con_password) {

        $query = "UPDATE user SET username = '{$name}', password = '{$hashed_new_password}' WHERE id = '{$_SESSION['userid']}' LIMIT 1";

        $result = mysqli_query($connection, $query);

        if ($result) {
          header('Location: admin.php?password_change=true');
        } else {
          $errors[] = 'Failed to update the password.';
        }
      }
      
  }



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home | Atigala Inventry Management System</title>
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

<!-- profile -->
<div class="container" style="padding: 20px">
     <div class="row">
        <div class="col-md-4">
          <div class="card" style="width:100%; height: 100%; background-image: url('img/logo/fotter.jpg');">
            <i class="fa fa-user mx-auto" style="font-size: 8rem; margin: auto; padding-top: 10px;""></i>
            <div class="card-body">
<?php
      $query = "SELECT * FROM user WHERE id='{$_SESSION["userid"]}' LIMIT 1";
      $users = mysqli_query($connection, $query);

      while ($user = mysqli_fetch_assoc($users)) {
?>              
              <h4 class="card-title">Profile Info</h4>
              <p class="card-text"><i class="fa fa-user" style="margin-right: 10px;"></i><?php echo $user['username']; ?></p>
              <p class="card-text"><i class="fa fa-user" style="margin-right: 10px;">&nbsp;</i><?php echo $user['usertype']; ?></p>
              <p class="card-text">Last Login :<?php echo $user['last_login']; ?></p>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#profileModal"><i class="fa fa-edit" style="margin-right: 10px;">&nbsp;</i>Edit Profile</button>
<?php  
      }
?>              
            </div>
          </div>
        </div>
 
<!-- orders -->
        <div class="col-md-8">
         <div class="card shadow" style="width:100%; height: 100%; background-image: url('img/logo/fotter.jpg');">
         	<i class="fas fa-shopping-cart" style="font-size: 6rem; margin: auto; padding-top: 10px;"></i>
            <div class="card-body">
              <h3 class="card-title">Orders</h3>
              <h5 class="card-text">Here you can make a new Order and Print Invoice...</h5>
              <a href="new_order.php"><input type="submit" class="btn btn-success"  value="New Oder"" style="margin: 5px;"></a>
            </div>
          </div>
       </div> 
     </div>
   </div>
<!-- categories -->
   <div class="container">
     <div class="row">
       <div class="col-md-6">
         <div class="card shadow" style="width:100%; height: 100%; background-image: url('img/logo/fotter.jpg');">
         	<i class="fas fa-list-alt" style="font-size: 6rem; margin: auto; padding-top: 10px;"></i>
            <div class="card-body">
              <h3 class="card-title">Category</h3>
              <h6 class="card-text">Here you can Add and Manage Categories...</h6>
              <input type="submit" class="btn btn-success"  value="Add" data-toggle="modal" data-target="#add_category" style="margin: 5px;">
              <a href="manage_categories.php"><input type="submit" class="btn btn-success" value="Manage" style="margin: 5px;"></a>
            </div>
          </div>
       </div>
<!-- products -->
       <div class="col-md-6">
         <div class="card shadow" style="width:100%; height: 100%; background-image: url('img/logo/fotter.jpg');">
         	<i class="far fa-calendar-plus" style="font-size: 6rem; margin: auto; padding-top: 10px;"></i>
            <div class="card-body">
              <h3 class="card-title">Products</h3>
              <h6 class="card-text">Here you can Add and Manage Products...</h6>
              <input type="submit" class="btn btn-success"  value="Add" data-toggle="modal" data-target="#add_product" style="margin: 5px;">
              <a href="manage_product.php"><input type="submit" class="btn btn-success"  value="Manage" style="margin: 5px;"> </a>                          
            </div>
          </div>
       </div>
     </div> 
   </div>

<?php include_once('include/footer.php'); ?>

<?php include_once('templates/category.php'); ?>
<?php include_once('templates/product.php'); ?>
<?php include_once('templates/users.php'); ?>
<?php include_once('profile2.php'); ?>

</body>
</html>