<?php
//connect to the user account class
include("../classes/customer_class.php");
require("../functions/function.php");

//sanitize data
// function cleanText($data) 
// {
//   $data = trim($data);
//   //$data = stripslashes($data);
//   //$data = htmlspecialchars($data);
//   return $data;
// }



//--INSERT--//
function add_customer_ctrl($a, $b, $c, $d, $e, $f, $g){

// creating an instance
  $add = new customer_class();

// return method
  return $add -> insert_customer($a, $b, $c, $d, $e, $f, $g);
}


  



//--SELECT--//
//LOGIN
function login_customer_ctrl($a, $b){

  // creating instance
  $login = new customer_class();

  // return method
  $data = $login -> login_customer($a);
  if (verify_pass($data['customer_pass'], $b) == true) {
    return $data;
  }
  return null;
}

function user_email_ctrl($cid){

  // creating instance
  $user_email = new customer_class();

  // return method
  $data = $user_email -> user_email($cid);
    return $data;
}
//--UPDATE--//

//--DELETE--//

?>
