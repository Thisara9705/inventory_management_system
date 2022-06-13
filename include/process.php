<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");


if (isset($_POST["username"]) AND isset($_POST["email"])) {
	$user = new User();
	$result = $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
	echo $result;
	exit();
}


if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
	$user = new User();
	$result = $user->userLogin($_POST["log_email"],$_POST["log_password"]);
	echo $result;
	exit();
}


if (isset($_POST["log_email_admin"]) AND isset($_POST["log_password_admin"])) {
	$user = new User();
	$result = $user->adminLogin($_POST["log_email_admin"],$_POST["log_password_admin"]);
	echo $result;
	exit();
}


if (isset($_POST["category_name"])) {
	$obj = new DBOperation();
	$result = $obj->addCategory($_POST["category_name"]);
	echo $result;
	exit();
}


if (isset($_POST["getCategory"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("categories");
	foreach ($rows as $row) {
		echo "<option value='".$row["cid"]."'>".$row["category_name"]."</option>";
	}
	exit();
}


if (isset($_POST["added_date"]) AND isset($_POST["product_name"])) {
	$obj = new DBOperation();
	$result = $obj->addProduct($_POST["select_cat"],
							$_POST["product_name"],
							$_POST["product_price"],
							$_POST["product_qty"],
							$_POST["added_date"]);
	echo $result;
	exit();
}






if (isset($_POST["manageCategory"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("categories",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["category_name"]; ?></td>>
			        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
			        <td>
			        	<a href="#" did="<?php echo $row['cid']; ?>" class="btn btn btn-secondary btn-sm del_cat" style= "margin-right: 15px;">Delete</a>
			        	<a href="#" eid="<?php echo $row['cid']; ?>" data-toggle="modal" data-target="#form_category" class="btn btn btn-secondary btn-sm edit_cat">Edit</a>
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}



if (isset($_POST["deleteCategory"])) {
	$m = new Manage();
	$result = $m->deleteRecord("categories","cid",$_POST["id"]);
	echo $result;
}


if (isset($_POST["updateCategory"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("categories","cid",$_POST["id"]);
	echo json_encode($result);
	exit();
}


if (isset($_POST["update_category"])) {
	$m = new Manage();
	$id = $_POST["cid"];
	$name = $_POST["update_category"];
	$result = $m->update_record("categories",["cid"=>$id],["category_name"=>$name,"status"=>1]);
	echo $result;
}

//----------------Products---------------------

if (isset($_POST["manageProduct"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("products",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["product_name"]; ?></td>
			        <td><?php echo $row["category_name"]; ?></td>
			        <td>LKR <?php echo $row["product_price"]; ?>.00</td>
			        <td><?php echo $row["product_stock"]; ?></td>
			        <td><?php echo $row["added_date"]; ?></td>
			        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
			        <td>
			        	<a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-secondary btn-sm del_product" style= "margin-right: 15px;" >Delete</a>
			        	<a href="#" eid="<?php echo $row['pid']; ?>" data-toggle="modal" data-target="#form_products" class="btn btn-secondary btn-sm edit_product">Edit</a>
			        </td>
			        <td>test</td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

//Delete 
if (isset($_POST["deleteProduct"])) {
	$m = new Manage();
	$result = $m->deleteRecord("products","pid",$_POST["id"]);
	echo $result;
}

//Update Product
if (isset($_POST["updateProduct"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("products","pid",$_POST["id"]);
	echo json_encode($result);
	exit();
}

//Update Record after getting data
if (isset($_POST["update_product"])) {
	$m = new Manage();
	$id = $_POST["pid"];
	$name = $_POST["update_product"];
	$cat = $_POST["select_cat_update"];
	$price = $_POST["product_price"];
	$qty = $_POST["product_qty"];
	$date = $_POST["added_date"];
	$result = $m->update_record("products",["pid"=>$id],["cid"=>$cat,"product_name"=>$name,"product_price"=>$price,"product_stock"=>$qty,"added_date"=>$date]);
	echo $result;
}


//------------------Users---------------------

//Manage Category
if (isset($_POST["manageUsers"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("user",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["username"]; ?></td>>
			        <td><?php echo $row["email"]; ?></td>>
			        <td><?php echo $row["usertype"]; ?></td>>
			        <td>
			        	<a href="#" did="<?php echo $row['id']; ?>" class="btn btn btn-secondary btn-sm del_user" style= "margin-right: 15px;">Delete</a>
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}


//Delete User
if (isset($_POST["deleteUser"])) {
	$m = new Manage();
	$result = $m->deleteRecord("user","id",$_POST["id"]);
	echo $result;
}


//-------------------------Order Processing--------------

if (isset($_POST["getNewOrderItem"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("products");
	?>
	<tr>
		    <td><b class="number">1</b></td>
		    <td>
		        <select name="pid[]" class="form-control form-control-sm pid" required>
		            <option value="">Choose Product</option>
		            <?php 
		            	foreach ($rows as $row) {
		            		?><option value="<?php echo $row['pid']; ?>"><?php echo $row["product_name"]; ?></option><?php
		            	}
		            ?>
		        </select>
		    </td>
		    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>   
		    <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
		    <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></span>
		    <span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
		    <td>LKR <span class="amt">0</span></td>
	</tr>
	<?php
	exit();
}


//Get price and qty of one item
if (isset($_POST["getPriceAndQty"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("products","pid",$_POST["id"]);
	echo json_encode($result);
	exit();
}


if (isset($_POST["order_date"]) AND isset($_POST["cust_name"])) {
	
	$orderdate = $_POST["order_date"];
	$cust_name = $_POST["cust_name"];


	//Now getting array from order_form
	$ar_tqty = $_POST["tqty"];
	$ar_qty = $_POST["qty"];
	$ar_price = $_POST["price"];
	$ar_pro_name = $_POST["pro_name"];


	$sub_total = $_POST["sub_total"];
	$gst = $_POST["gst"];
	$discount = $_POST["discount"];
	$net_total = $_POST["net_total"];
	$paid = $_POST["paid"];
	$due = $_POST["due"];
	$payment_type = $_POST["payment_type"];


	$m = new Manage();
	echo $result = $m->storeCustomerOrderInvoice($orderdate,$cust_name,$ar_tqty,$ar_qty,$ar_price,$ar_pro_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_type);




}


?>
