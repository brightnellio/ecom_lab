<?php require("../controllers/product_controller.php");

session_start();

$cid = $_SESSION['customer_id'];

$count_cart = count_cart_ctrl($cid);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body> 

<h1>All Products</h1>

<br><br>

 
<!-- Form  to search for products -->
<form action="product_search_result.php" method="GET">
<!-- <label for="text"><b>Fullname</b></label> <br> -->
<br><br>
    <input type="text" placeholder="Search..." name="search" id="search">
    <button type="submit"><b>Search</b></button> 
</form>
<br>
<button type="button" onclick = "document.location= 'cart.php'"><b>Cart</b></button>
<p> Total number of items in the cart: <b><?php echo $count_cart[0]['SUM(qty)'] ?></b></p>

<br><br>
<?php
/* 
$products = select_all_product_ctrl();

foreach($products as $product) { */

    
        
    $product_option = select_all_products_ctrl();
    //print_r($product_option);

    //if ($product_option) {
        foreach($product_option as $product_one){
            $product_id = $product_one['product_id'];
            $product_name = $product_one['product_title'];

            //echo "<option value = $product_id>$product_name</option>";
        

    
    //else {echo "<option value = 'not available'>product not found</option>";
    




?>

<div class="container">
  
  <div class="card-columns">
    <div class="card bg-primary">
      <!-- Image of the product -->
      <img src="<?php echo $product_one['product_image']  ?>" style="width: 350px; height: 150px">
      <div class="card-body text-center">
        <p class="card-text"><?php echo $product_one['product_title']?></p>
        <p class="card-text"><b>$<?php echo $product_one['product_price']?></b></p>
        <form action="single_product.php" method="GET">
          <input type="hidden" name="id" value="<?php echo $product_one['product_id'] ?>">
        <button type="submit"><b>View More</b></button> 
        </form>
        <br>
        <form action="../actions/add_to_cart.php" method="GET">
          <input type="hidden" name="pid" value="<?php echo $product_one['product_id']?>">
        <button type="submit"><b>Add to Cart</b></button> 
        </form>
      </div>
    </div>   
    
  </div>
</div>
<?php }?>
</body>
</html>
