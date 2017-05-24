<?php
 
/*
 * Use         : Gets IP address of request
 * Side effects: None
 * Notes       : NA
*/
function get_client_ip(){
    $ipaddress = 'UNKNOWN';
    if     (getenv('HTTP_CLIENT_IP'))         $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))   $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))       $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))     $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))         $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))            $ipaddress = getenv('REMOTE_ADDR');
    return $ipaddress;
}

/*
 * Use         : Executes an sql query and return the result
 * Side effects: None
 * Notes       : returns null on db failure
*/
function sql_query( $query ){
	// Credentials
	$host     = "localhost";
	$username = "root";
	$password = "NikePuma";
	$dbname   = "wingify";
	
	$con      = mysqli_connect( $host, $username, $password, $dbname );
	if (mysqli_connect_errno( $con )){
		db_failure();
		return NULL;
	}
	$result   = mysqli_query( $con, $query );
	mysqli_close( $con );
	return $result;
}

/*
 * Use         : Authenticates a given username, password pair
 * Side effects: Logs IP address to ip_logs with access type == api
 * Notes       : Current hash is md5 that might offer low security
*/
function auth( $username, $pass ){
	// Lets log it!
	sql_query("insert into `ip_logs` (`username`, `ip`, `access`) values ('".$username."', '".get_client_ip()."', 'api')");
	$result = sql_query("SELECT * from `auth` where `username` = '". $username ."'");
	if($row = mysqli_fetch_array($result)){
		if($row['password'] == md5($pass))
			return 1;
		else
			return 0;
		//return ( $row['password'] == md5( $pass ) ) ? 1 : 0;
	}
	else{
		return 0;
	}
}

/*
 * Use         : Generates new token
 * Side effects: None
 * Notes       : NA
*/
function insert_token( $username ){
	if( !empty( $username) ){
		$rand   = generate_random_string();

		$result = sql_query("insert into `user_token` (`username`,`token`) values ('$username', '$rand')");
		if($result){
			$ret = $rand;
		}
		else{
			$ret = 0;
		}
	}
	else{
		$ret = 0;
	}
	return $ret;
}


/*
 * Use         : Sanitizes string to remove harmful characters
 * Side effects: None
 * Notes       : NA
*/
function sanitize($str){
	$str     = @trim($str);
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}
	$str     = preg_replace('/[^a-z0-9@._]/i', '', $str);
	return $str;
}

/*
 * Use         : Generates random string in alphanumeric set
 * Side effects: None
 * Notes       : NA
*/
function generate_random_string(){
	$length = 16;
	$characters        = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomstring      = '';
	for ( $i = 0; $i < $length; $i++ ) {
		$randomstring .= $characters[ rand( 0, strlen( $characters ) - 1 ) ];
	}
	return $randomstring;
}



/*
 * Use         : authenticates token for a given username
 * Side effects: An ip_logs entry is created
 * Notes       :  returns 0 if no token found and 1 if token found
*/
function check_token( $username, $token ){
	$result  = sql_query("SELECT * from `user_token` where `username` = '". $username ."' AND `token` = '".$token."' ");
	$ret     = 0; // default to no token found
	if( $row = mysqli_fetch_array( $result ) ){
		sql_query("insert into `ip_logs` (`username`, `ip`, `access`) values ('".$username."', '".get_client_ip()."', 'api')");
		$ret = 1; // success
	}
	else{
		sql_query("insert into `ip_logs` (`username`, `ip`, `remarks`, `access`) values ('".$username."', '".get_client_ip()."', 'token mismatch', 'api')");	
		$ret = 0; // token mismatch
	}	
	return $ret;
}


/*
 * Use         : de authenticates a user by deleting its token
 * Side effects: None
 * Notes       : NA
*/
function de_auth( $enroll ){
	$result = sql_query("DELETE from `user_token` where `username` = '". $username ."'");
	return 1;
}

/*
 * Use         : Add a new product
 * Side effects: None
 * Notes       : NA
*/
function add_product($product_name,$product_price){
	$result = sql_query("insert into `products` (`product_name`,`product_price`) values ('".$product_name."','".$product_price."') ");
	if($result){
		return 1;
	}
	else{
		return 0;
	}
}

/*
 * Use         : Deletes a product
 * Side effects: None
 * Notes       : NA
*/
function delete_product($product_id){
	$result = sql_query("DELETE from `products` where `product_id` = '". $product_id ."'");
	if($result){
		return 1;
	}
	else{
		return 0;
	}
}

/*
 * Use         : Edit a product
 * Side effects: None
 * Notes       : NA
*/
function edit_product($product_id,$new_product_name,$new_product_price){
	$result = sql_query('update `products` set `product_name`="'.$new_product_name.'",`product_price` = "'.$new_product_price.'" where `product_id`="'.$product_id.'"');
	if($result){
		return 1;
	}
	else{
		return 0;
	}
}

/*
 * Use         : Search a product
 * Side effects: None
 * Notes       : NA
*/
function search_product($search_term){
	$result = sql_query("SELECT * FROM products WHERE product_name LIKE '%$search_term%'");
	if(mysqli_num_rows($result) > 0){
		$data = array();
		// output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    	$temp = array("product_id"=>$row["product_id"],"product_name"=>$row["product_name"],"product_price"=>$row["product_price"]);
	    	array_push($data,$temp);
	    }
	    return $data;
	}
	else{
		return 0;
	}
}

?>
