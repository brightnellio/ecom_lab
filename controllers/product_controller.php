<?php
//connect to the user account class
include("../classes/product_class.php");

//sanitize data
function cleanText($data) 
{
  $data = trim($data);
  //$data = stripslashes($data);
  //$data = htmlspecialchars($data);
  return $data;
}



//--INSERT--//

// BRAND
function add_brand_ctrl($a){

  //creating an instance
  $add_brand = new general_class();

  // return method
  return $add_brand -> insert_brand($a);
}

//--SELECT--//
//selecting one brand
function select_brand_ctrl($bid){

  // creating instance
  $select_brand = new general_class();

  // return method
  $data = $select_brand -> select_one_brand($bid);
    return $data;
}

//selecting all brands
function select_all_brands_ctrl(){

  // creating instance
  $select_brand = new general_class();

  // return method
  $data = $select_brand -> select_brand();
    return $data;
}
//--UPDATE--//
//update all brands
function update_all_brands_ctrl($bid, $bname){

  //creating instance
  $update_brand = new general_class();

  // return method
  $data = $update_brand -> update_brand_cls($bid, $bname);
    return $data;
}

/* CATEGORIES */
//insert
function add_category_ctrl($a){

  //creating an instance
  $add_category = new general_class();

  // return method
  return $add_category -> insert_category($a);
}

//--SELECT--//
//selecting one brand
function select_category_ctrl($cat_id){

  // creating instance
  $select_category = new general_class();

  // return method
  $data = $select_category -> select_one_category($cat_id);
    return $data;
}

//selecting all brands
function select_all_category_ctrl(){

  // creating instance
  $select_category = new general_class();

  // return method
  $data = $select_category -> select_category();
    return $data;
}
//--UPDATE--//
//update all brands
function update_all_category_ctrl($cat_id, $cat_name){

  //creating instance
  $update_category = new general_class();

  // return method
  return $update_category -> update_category_cls($cat_id, $cat_name);
  
}




/* PRODUCT */

//--INSERT--//

function add_product_ctrl($pcat, $pbrand, $ptitle, $pprice, $pdescr, $pimage, $pkey){

  //creating an instance
  $add_product = new general_class();

  // return method
  return $add_product -> insert_product($pcat, $pbrand, $ptitle, $pprice, $pdescr, $pimage, $pkey);
}

//SELECT
//selecting all brands
function select_all_product_ctrl(){

  // creating instance
  $select_product = new general_class();

  // return method
  $select_product -> select_product();
    return $select_product;
}

//selecting all brands
function select_all_products_ctrl(){

  // creating instance
  $select_product = new general_class();

  // return method
  $data = $select_product -> select_product();
    return $data;
}

//search all products
/* function search_all_products_ctrl($a){

  // creating instance
  $search_product = new general_class();

  // return method
  $data = $search_product -> search_all_products($a);
  echo($a);
  print_r($data);
    return $data;
} */

function search_products_ctrl($a){

  $search_product = new general_class();

  return $search_product -> search_products($a);

}

//selecting one product
function select_product_ctrl($product_id){

  // creating instance
  $select_product = new general_class();

  // return method
  $data = $select_product -> select_one_product($product_id);
    return $data;
}

//--UPDATE--//
//update all product
function update_all_product_ctrl($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkey){

  //creating instance
  $update_category = new general_class();

  // return method
  return $update_category -> update_product_cls($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkey);
  
}



// CART
function add_cart_ctrl($p_id, $ip_add, $c_id){

  //creating an instance
  $add_cart = new general_class();

  // return method
  return $add_cart -> insert_cart($p_id, $ip_add, $c_id);
}

function select_cart_ctrl(){

  //creating an instance
  $select_cart = new general_class();

  // return method
  return $select_cart -> select_cart();
}

// count cart
function count_cart_ctrl($cid){

  $count_cart = new general_class();

  return $count_cart -> count_cart($cid);
}

// count one cart item
function count_one_cart_ctrl($cid){

  $count_one_cart = new general_class();

  return $count_one_cart -> count_one_cart($cid);
}

function duplicate_cart_ctrl($pid, $cid){

  $duplicate_cart = new general_class();

  return $duplicate_cart -> duplicate_cart($pid, $cid);
}

function duplicate_one_cart_ctrl($pid, $cid){

  $duplicate_one_cart = new general_class();

  return $duplicate_one_cart -> duplicate_one_cart($pid, $cid);
}

function update_cart_qty_ctrl($pid, $cid){
  $update_cart = new general_class();
  return $update_cart -> update_cart_qty($pid, $cid);
}

function update_more_cart_qty_ctrl ($pid, $cid){
  $update_more_cart = new general_class();
  return $update_more_cart -> update_more_cart_qty($pid, $cid);
}

  // 
function delete_cart_qty_ctrl($pid, $cid){
  $delete_cart = new general_class();
  return $delete_cart -> delete_cart_qty($pid, $cid);
}

function update_textbox_ctrl($pid, $cid, $txtbox){
  $update_textbox = new general_class();
  return $update_textbox -> update_textbox($pid, $cid, $txtbox);
}


?>
