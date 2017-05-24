<?php
error_reporting(E_ALL); ini_set('display_errors', '1');

function curl_req($data){
	$ch        = curl_init();
	$post_data = $data;				
	curl_setopt($ch, CURLOPT_URL           , 'http://localhost/v1/');
	curl_setopt($ch, CURLOPT_NOBODY        , true);
	curl_setopt($ch, CURLOPT_HEADER        , false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT       , 10);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POST          , 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS    , http_build_query($post_data) );
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}

function login($username, $password){
	$data = array(  
					'action' => 'login',
					'username' => ''.$username,
					'password'   => ''.$password
				);
	$token = curl_req($data);
	return $token;
} 

function add_product($username,$token,$product_name,$product_price){
	$data = array(  
					'action' => 'add_product',
					'username' => ''.$username,
					'token'   => ''.$token,
					'product_name' => ''.$product_name,
					'product_price' => ''.$product_price
				);
	$res = curl_req($data);
	return $res;	
}

function search_product($username,$token,$search_item){
	$data = array(  
					'action' => 'search_product',
					'username' => ''.$username,
					'token'   => ''.$token,
					'search_term' => ''.$search_item
				);
	$res = curl_req($data);
	return $res;	
}

$token = login('vaibhavbansal23','NikePuma');
echo "Token :".$token;

echo "<br><br>";

echo add_product('vaibhavbansal23',$token,'JBL Speakers','6500');

echo "<br><br>";

echo search_product('vaibhavbansal23',$token,'iphone');






?>
