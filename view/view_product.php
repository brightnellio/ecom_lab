<?php

require("../controllers/product_controller.php");

include("../settings/core.php");
if (logged_in() == false){
  header('Location: ../index.php');
}
else {

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
</head>
<body>
 <form action="../actions/update_product.php" method="GET">
  <div class="container">
    <h1>Enter Product Details</h1>

    <br>

    <button type="button" onclick = "document.location= '../view/product.php'"><b>Add a New Product + </b></button> 
    
    
     <br><br>

    <label for="email"><b>Products Name</b></label><br>
    <input type="text" placeholder="Enter Product Name" name="brand_name" id="brand_name" required>

    <br><br>

    <button type="submit" class="registerbtn">Submit Brand</button>
 -->
  </div>
</form>
<br><br>

<table>
        <th>Product ID</th>
        <th>Product Category</th>
        <th>Product Brand</th>
        <th>Product Title</th>
        <th>Product Price</th>
        <th>Product Description</th>
        <th>Product Image</th>
        <th>Product Keyword</th>

    <?php
        $productlist = select_all_product_ctrl();
        foreach ($productlist as $value) {
        $pid = $value['product_id'];
        $pcat = $value['product_cat'];
        $pbrand = $value['product_brand'];
        $ptitle = $value['product_title'];
        $pprice = $value['product_price'];
        $pdescr = $value['product_desc'];
        $pimage = $value['product_image'];
        $pkey = $value['product_keywords'];
        
    ?>
      
      <div class="css">
        <tr>
        <td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['product_id']);
          $pid = $value['product_id'] ?></td>

          <td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['product_cat']);
          $pid = $value['product_id'] ?></td>

<td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['product_brand']);
          $pid = $value['product_id'] ?></td>

<td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['product_title']);
          $pid = $value['product_id'] ?></td>

<td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['product_price']);
          $pid = $value['product_id'] ?></td>

<td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['product_desc']);
          $pid = $value['product_id'] ?></td>

<td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['product_image']);
          $pid = $value['product_id'] ?></td>

<td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['product_keywords']);
          $pid = $value['product_id'] ?></td>

            <td>
            <form action="../view/update_product.php" method="GET">
        <input type="hidden" name= "pid" value="<?php echo $value['product_id']?>">
        <td><div><a href='update_product.php?pid=<?php echo($pid);?>'>Update</a></div></td>
        </form>
        
        <td>
          <td><div><a href="">Delete</a></div>
</td>

        </tr>
        
        <div>
          
        </div>
        
        
      </div>

<?php

}
?>
  
</table>
</body>
</html>