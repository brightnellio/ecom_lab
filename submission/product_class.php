<?php
//connect to database class
require("../settings/db_class.php");

/**
*Product class to handle all product functions 
*/
/**
 *@author Bright Nellio
 *
 */

class general_class extends db_connection
{
	//--INSERT--//

	function insert_brand($a){

		$sql = "INSERT INTO `brands`(`brand_name`) VALUES ('$a')";

		return $this -> db_query($sql);
	}

	//--SELECT--//
	//Select all
	function select_brand(){
		$sql =" SELECT * FROM `brands`";

		return $this -> db_fetch_all($sql);
	}

	//Select one
	function select_one_brand($bid){
		$sql =" SELECT * FROM `brands` WHERE `brand_id` = '$bid'";

		return $this -> db_fetch_one($sql);
	}

	//--UPDATE--//
	function update_brand_cls($bid, $bname){
	$sql = "UPDATE brands SET brand_name = '$bname' WHERE brand_id = $bid";

	return $this -> db_query($sql);
	}


	/* CATEGORIES */

	//--INSERT--//

	function insert_category($a){

		$sql = "INSERT INTO `categories`(`cat_name`) VALUES ('$a')";

		return $this -> db_query($sql);
	}

	//--SELECT--//
	//Select all
	function select_category(){
		$sql =" SELECT * FROM `categories`";

		return $this -> db_fetch_all($sql);
	}

	//Select one
	function select_one_category($cat_id){
		$sql =" SELECT * FROM `categories` WHERE `cat_id` = '$cat_id'";

		return $this -> db_fetch_one($sql);
	}

	//--UPDATE--//
	function update_category_cls($cat_id, $cat_name){
	$sql = "UPDATE categories SET cat_name = '$cat_name' WHERE cat_id = $cat_id";

	return $this -> db_query($sql);
	}




	/* PRODUCT */
	//--INSERT--//

function insert_product($pcat, $pbrand, $ptitle, $pprice, $pdescr, $pimage, $pkey){

	$sql = "INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) 
			VALUES ('$pcat', '$pbrand', '$ptitle', '$pprice', '$pdescr', '$pimage', '$pkey')";

	return $this -> db_query($sql);
}

//--SELECT--//
	//Select all
	function select_product(){
		$sql =" SELECT * FROM `products`";

		return $this -> db_fetch_all($sql);
	}



	//Select one
	function select_one_product($product_id){
		$sql =" SELECT * FROM `products` WHERE `product_id` = '$product_id'";

		return $this -> db_fetch_one($sql);
	}

	//Selects all
	function search_all_products($a){
		$sql ="SELECT * FROM `products` WHERE 'product_keywords' LIKE '%$a%'";
		print_r($this -> db_fetch_all($sql));
		echo($a);
		return $this -> db_fetch_all($sql);
	} */
	function search_products($a){
		$sql = "SELECT * FROM `products` WHERE `product_title` LIKE '%$a%'";
		return $this ->db_fetch_all($sql);
		//return $sql;
	}


	//--UPDATE--//
	function update_product_cls($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkey){
		$sql = "UPDATE products SET product_cat = '$pcat', product_brand = '$pbrand', product_title = '$ptitle', product_price = '$pprice', product_desc = '$pdesc', product_image = '$pimage', product_keywords = '$pkey' 
		WHERE product_id = $pid";
	
		return $this -> db_query($sql);
		}


/* CART */
	//--insert--//

function insert_cart($p_id, $ip_add, $c_id){

	$sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) 
			VALUES ('$p_id', '$ip_add', '$c_id', '1')";

	return $this -> db_query($sql);
}

//select
function select_cart(){
	$sql =" SELECT products.product_id, products.product_title, products.product_price, products.product_desc, products.product_image, cart.qty 
	FROM cart INNER JOIN products ON cart.p_id = products.product_id;";

	return $this -> db_fetch_all($sql);
}

// count cart items class
function count_cart($cid){
	$sql = "SELECT SUM(qty) FROM cart WHERE c_id = $cid";

	return $this -> db_fetch_all($sql);
}

// count cart items class
function count_one_cart($cid){
	$sql = "SELECT qty FROM cart WHERE c_id = $cid";

	return $this -> db_fetch_one($sql);
}

/*                        CART MANAGEMENT                       */

function duplicate_cart($pid, $cid){
	$sql = "SELECT p_id, c_id FROM cart WHERE p_id='$pid' AND c_id='$cid' ";
	return $this ->db_fetch_all($sql);
	//return $sql;
}

function duplicate_one_cart($pid, $cid){
	$sql = "SELECT qty FROM cart WHERE p_id='$pid' AND c_id='$cid' ";
	return $this ->db_fetch_one($sql);
}

function update_cart_qty($pid, $cid){
	$sql = "UPDATE cart SET qty = qty+1 WHERE p_id = '$pid' AND c_id = '$cid'";
	return $this -> db_query($sql);
}

// when quantity is exactly one
function delete_cart_qty($pid, $cid){
	$sql = "DELETE FROM cart WHERE p_id = '$pid' AND '$cid'"; 
	return $this -> db_query($sql);
}

//when quantity is more than 1
function update_more_cart_qty($pid, $cid){
	$sql = "UPDATE cart SET qty = qty-1 WHERE p_id = '$pid' AND c_id = '$cid'";
	return $this -> db_query($sql);
}

function update_textbox($pid, $cid, $txtbox){
	$sql = "UPDATE cart SET qty = '$txtbox' WHERE p_id = '$pid' AND c_id = '$cid'";
	return $this -> db_query($sql);
}



}

?>