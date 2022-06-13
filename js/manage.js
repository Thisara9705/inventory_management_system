$(document).ready(function(){
	var DOMAIN = "http://localhost/atigala_inv";

	//Mange Category
	manageCategory(1);
	function manageCategory(pn){
		$.ajax({
			url : DOMAIN+"/include/process.php",
			method : "POST",
			data : {manageCategory:1,pageno:pn},
			success : function(data){
				$("#get_category").html(data);		
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageCategory(pn);
	})

	$("body").delegate(".del_cat","click",function(){
		var did = $(this).attr("did");
		if (confirm("Are you sure ? You want to delete..!")) {
			$.ajax({
				url : DOMAIN+"/include/process.php",
				method : "POST",
				data : {deleteCategory:1,id:did},
				success : function(data){
					if (data == "DEPENDENT_CATEGORY") {
						alert("Sorry ! this Category is dependent on other sub categories");
					}else if(data == "CATEGORY_DELETED"){
						alert("Category Deleted Successfully..!");
						manageCategory(1);
					}else if(data == "DELETED"){
						alert("Deleted Successfully");
						window.location.href = DOMAIN+"/manage_categories.php";
					}else{
						alert(data);
					}
						
				}
			})
		}else{

		}
	})
 

	$("body").delegate(".edit_cat","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/include/process.php",
			method : "POST",
			dataType : "json",
			data : {updateCategory:1,id:eid},
			success : function(data){
				console.log(data);
				$("#cid").val(data["cid"]);
				$("#update_category").val(data["category_name"]);
			}
		})
	})

	$("#update_category_form").on("submit",function(){
		if ($("#update_category").val() == "") {
			$("#update_category").addClass("border-danger");
			$("#cat_error").html("<span class='text-danger'>Please Enter Category Name</span>");
		}else{
			$.ajax({
				url : DOMAIN+"/include/process.php",
				method : "POST",
				data  : $("#update_category_form").serialize(),
				success : function(data){
					window.location.href = "";
				}
			})
		}
	})



	manageProduct(1);
	function manageProduct(pn){
		$.ajax({
			url : DOMAIN+"/include/process.php",
			method : "POST",
			data : {manageProduct:1,pageno:pn},
			success : function(data){
				$("#get_product").html(data);		
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageProduct(pn);
	})

	$("body").delegate(".del_product","click",function(){
		var did = $(this).attr("did");
		if (confirm("Are you sure ? You want to delete..!")) {
			$.ajax({
				url : DOMAIN+"/include/process.php",
				method : "POST",
				data : {deleteProduct:1,id:did},
				success : function(data){
					if (data == "DELETED") {
						alert("Product is deleted");
						manageProduct(1);
					}else{
						alert(data);
					}
						
				}
			})
		}
	})


	fetch_category();
	function fetch_category(){
		$.ajax({
			url : DOMAIN+"/include/process.php",
			method : "POST",
			data : {getCategory:1},
			success : function(data){
				var choose = "<option value=''>Choose Category</option>";
				$("#select_cat_update").html(choose+data);
			}
		})
	}


	$("body").delegate(".edit_product","click",function(){
		var eid = $(this).attr("eid");
		$.ajax({
			url : DOMAIN+"/include/process.php",
			method : "POST",
			dataType : "json",
			data : {updateProduct:1,id:eid},
			success : function(data){
				console.log(data);
				$("#pid").val(data["pid"]);
				$("#update_product").val(data["product_name"]);
				$("#select_cat").val(data["cid"]);
				$("#product_price").val(data["product_price"]);
				$("#product_qty").val(data["product_stock"]);

			}
		})
	})


	$("#update_product_form").on("submit",function(){
		$.ajax({
				url : DOMAIN+"/include/process.php",
				method : "POST",
				data : $("#update_product_form").serialize(),
				success : function(data){
					if (data == "UPDATED") {
						alert("Product Updated Successfully..!");
						manageProduct(1);
					}else{
						alert(data);
					}
				}
			})
	})



	manageUsers(1);
	function manageUsers(pn){
		$.ajax({
			url : DOMAIN+"/include/process.php",
			method : "POST",
			data : {manageUsers:1,pageno:pn},
			success : function(data){
				$("#get_users").html(data);		
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn = $(this).attr("pn");
		manageUsers(pn);
	})

	$("body").delegate(".del_user","click",function(){
		var did = $(this).attr("did");
		if (confirm("Are you sure ? You want to delete..!")) {
			$.ajax({
				url : DOMAIN+"/include/process.php",
				method : "POST",
				data : {deleteUser:1,id:did},
				success : function(data){
					if (data == "DELETED") {
						alert("User is deleted");
						manageUsers(1);
					}else{
						alert(data);
					}
						
				}
			})
		}
	})


	
})



