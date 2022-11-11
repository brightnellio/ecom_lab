<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*Customer class to handle all customer functions 
*/
/**
 *@author Kekeli Mensah
 *
 */

class customer_class extends db_connection
{
	//--INSERT--//
	function insert_customer($a, $b, $c, $d, $e, $f, $g)
	{
		$sql = "INSERT INTO `customer`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `user_role`) VALUES ('$a','$b','$c','$d','$e', '$f','$g','2')";

		return $this->db_query($sql);
	}

	//--SELECT--// fetching data
	function login_customer($a){

		$sql =" SELECT * FROM `customer` WHERE `customer_email` = '$a'";

		return $this -> db_fetch_one($sql);
	}

	function user_email($cid){
		$sql = "SELECT customer_email FROM customer WHERE customer_id = '$cid'";

		return $this -> db_fetch_one($sql);
	}


	//--UPDATE--//



	//--DELETE--//
	

}

?>