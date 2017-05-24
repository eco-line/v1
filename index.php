<?php
// Include library
include 'lib/functions.php';

//check if action parameter passed
if(isset($_POST['action'])){
	if($_POST['action'] == 'login'){
		//Login with username and password returns token
		if(isset($_POST['username']) && isset($_POST['password'])){
				//Sanitize inputs
				$username = sanitize($_POST['username']);
				$password = @trim($_POST['password']);

				$res = auth($username,$password); //check if credentials are correct

				if($res == 1){
					$token = insert_token($username); //insert token if user is authenticated and returns inserted token
					if($token !== 0){
						echo json_encode($token);
					}
					else{
						echo json_encode("There was some problem in token , Please try loggin in after some time !!");
					}
				}
				else{
					echo json_encode("Invalid username/password !!");
				}			
		}
		else{
			echo json_encode("Missing username/password parameter !!");
		}
	}
	else if($_POST['action'] == 'add_product'){
		//to add a new product after user authentication
		if(isset($_POST['username']) && isset($_POST['token']) && isset($_POST['product_name']) && isset($_POST['product_price'])){

			//sanitize input
			$username     = sanitize( $_POST['username'] );
			$token     = sanitize( $_POST['token'] );
			$product_name     = sanitize( $_POST['product_name'] );
			$product_price     = sanitize( $_POST['product_price'] );

			$check_login = check_token($username,$token); //check if username , token combination exists in our db

			if($check_login == 1){
				$res = add_product($product_name,$product_price); //adding product to table

				if($res == 1){
					echo json_encode("Product Added Successfully !!");
				}
				else{
					echo json_encode("There was some problem in adding product , please try again after some time !!");
				}
			}
			else{
				echo json_encode("You are not logged in , Please login and try again !!");
			}
		}
		else{
			echo json_encode("Please Send all parameters !!");
		}		
	}
	else if($_POST['action'] == 'delete_product'){
		//to delete a product after user authentication
		if(isset($_POST['username']) && isset($_POST['token']) && isset($_POST['product_id'])){

			//sanitize input
			$username     = sanitize( $_POST['username'] );
			$token     = sanitize( $_POST['token'] );
			$product_id     = sanitize( $_POST['product_id'] );

			$check_login = check_token($username,$token); //check if username , token combination exists in our db

			if($check_login == 1){
				$res = delete_product($product_id); //delteting product from table

				if($res == 1){
					echo json_encode("Product Deleted Successfully !!");
				}
				else{
					echo json_encode("There was some problem in deleting product , please try again after some time !!");
				}
			}
			else{
				echo json_encode("You are not logged in , Please login and try again !!");
			}
		}
		else{
			echo json_encode("Please Send all parameters !!");
		}				
	}
	else if($_POST['action'] == 'edit_product'){
		//to delete a product after user authentication
		if(isset($_POST['username']) && isset($_POST['token']) && isset($_POST['product_id']) && isset($_POST['new_product_name']) && isset($_POST['new_product_price']) ){

			//sanitize input
			$username     = sanitize( $_POST['username'] );
			$token     = sanitize( $_POST['token'] );
			$product_id     = sanitize( $_POST['product_id'] );
			$new_product_name     = sanitize( $_POST['new_product_name'] );
			$new_product_price     = sanitize( $_POST['new_product_price'] );

			$check_login = check_token($username,$token); //check if username , token combination exists in our db

			if($check_login == 1){
				$res = edit_product($product_id,$new_product_name,$new_product_price); //editing product 

				if($res == 1){
					echo json_encode("Product Edited Successfully !!");
				}
				else{
					echo json_encode("There was some problem in editing product , please try again after some time !!");
				}
			}
			else{
				echo json_encode("You are not logged in , Please login and try again !!");
			}
		}
		else{
			echo json_encode("Please Send all parameters !!");
		}				
	}
	else if($_POST['action'] == 'search_product'){
		//to delete a product after user authentication
		if(isset($_POST['username']) && isset($_POST['token']) && isset($_POST['search_term'])){
			//sanitize input
			$username     = sanitize( $_POST['username'] );
			$token     = sanitize( $_POST['token'] );
			$search_term   = sanitize( $_POST['search_term']);

			$check_login = check_token($username,$token); //check if username , token combination exists in our db

			if($check_login == 1){
				$res = "";
				$res = search_product($search_term); //editing product 
				echo json_encode($res); //$res return array of matching products
			}
			else{
				echo json_encode("You are not logged in , Please login and try again !!");
			}
		}
		else{
			echo json_encode("Please Send all parameters !!");
		}				
	}
	else{
		echo json_encode("Invalid action parameter !!");
	}			
}
else{
	echo json_encode("Missing action parameter !!");
}

?>
