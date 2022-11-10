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
	<title>Brand</title>
</head>
<body>
 <form action="../actions/brandprocess.php" method="POST">
  <div class="container">
    <h1>Enter Brand Name</h1>
    
    <br><br>

    <label for="email"><b>Brand Name</b></label><br>
    <input type="text" placeholder="Enter Brand Name" name="brand_name" id="brand_name" required>

    <br><br>

    <button type="submit" class="registerbtn">Submit Brand</button>

  </div>
</form>
<br><br><br>

<table>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>

    <?php
        $brandslist = select_all_brands_ctrl();
        foreach ($brandslist as $value) {
        $bid = $value['brand_id'];
    ?>
      
      <div class="css">
        <tr>
          <td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['brand_name']);
          $bid = $value['brand_id'] ?></td>
          <td><div><a href='update_brand.php?bid=<?php echo($bid);?>'>Update</a></div></td>
          <td><div><a href="">Delete</a></div>
</td>
        </tr>
        <div>
          
        </div>
        
        
      </div>

<?php

}}
?>
  
</table>
</body>
</html>