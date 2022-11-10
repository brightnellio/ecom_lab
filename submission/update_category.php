<?php
include("../controllers/product_controller.php");
include("../settings/core.php");

$cat_id = $_GET['cat_id'];
$category_detail = select_category_ctrl($cat_id);

//initiating a server to get the post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Cname_update = $_POST['update_category'];
    $check_update = update_all_category_ctrl($cat_id, $Cname_update);
    if ($check_update) {
        header("Location: ../view/categorymgt.php");
    }
    else{
        return false;
    }
}

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
	<title>Update Category</title>
</head>
<body>
 <form method="POST">
  <div class="container">
    <h1>Update Category Name</h1>
    
    <br><br>

    <input type="hidden" name="cat_id" value="<?php echo($cat_id)?>">

    <br><br>

    <label for="text"><b>Category Name</b></label><br>
    <input type="text" placeholder="Update Category Name" name="update_category" id="update_category" value="<?php echo($category_detail['cat_name'])?>">

    <br><br>

    <button type="submit" name = "submit" class="registerbtn">Update Category</button>

  </div>
    </form>
  </body>
</html>

<?php
}
?>