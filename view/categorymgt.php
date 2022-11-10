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
	<title>Category</title>
</head>
<body>
 <form action="../actions/categoryprocess.php" method="POST">
  <div class="container">
    <h1>Enter Category Name</h1>
    
    <br><br>

    <label for="email"><b>Category Name</b></label><br>
    <input type="text" placeholder="Enter Category Name" name="category_name" id="category_name" required>

    <br><br>

    <button type="submit" class="registerbtn">Submit Category</button>

  </div>
</form>
<br><br><br>

<table>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>

    <?php
        $categorylist = select_all_category_ctrl();
        foreach ($categorylist as $value) {
        $cat_id = $value['cat_id'];
    ?>
      
      <div class="css">
        <tr>
          <td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['cat_name']);
          $cat_id = $value['cat_id'] ?></td>
          <td><div><a href='update_category.php?cat_id=<?php echo($cat_id);?>'>Update</a></div></td>
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