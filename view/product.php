<?php
require("../controllers/product_controller.php");
include("../settings/core.php");
/* if (logged_in()){
  echo "you are logged in";
  exit();
}
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTS</title>
</head>
<body>
    <form action="../actions/add_product.php" method="POST" enctype="multipart/form-data">
  <div class="container">
    <h1>Add Product</h1>
    <p>Please fill in this form to add a product</p>
    
<label for="category"><b>Select a category:</b></label>

<br><br>

        <select name="category" id="category">
            <option value="cat1">cat1</option>
            <option value="cat2">cat2</option>
            <option value="cat3">cat3</option>
            <option value="cat4">cat4</option>
        
        </select>

    <br><br>

    <label for="brand"><b>Select a brand:</b></label>

<br><br>


        <select name="brand" id="brand">
            <option value="brand1">brand1</option>
            <option value="brand2">brand2</option>
            <option value="brand3">brand3</option>
            <option value="brand4">brand4</option>

        </select>

        <br><br>

    <label for="text"><b>Product Title</b></label><br>
    <input type="text" placeholder="Enter Product title" name="ptitle" id="ptitle" required>

    <br><br>

    <label for="text"><b>Product Price</b></label><br>
    <input type="number" placeholder="Enter product price" name="pprice" id="pprice" required>

    <br><br>

   <label for="text"><b>Product Description</b></label><br>
    <input type="text" placeholder="Enter description" name="pdescr" id="pdescr" required>

    <br><br>

    <label for="image"><b>Product Image</b></label><br>
    <input type="file" name="pimage" id="pimage">

    <br><br>

    <label for="text"><b>Product Keyword</b></label><br>
    <input type="text" placeholder="Enter product keyword" name="pkey" id="pkey" required>

    <br><br>

    <button type="submit" class="registerbtn" name="add_product">Add Product</button>
  </div>

  <script>"../js/form_validation.js"</script>
</body>
</html>

