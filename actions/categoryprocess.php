<?php

include("../controllers/product_controller.php");
// Retrieves the category name and passes it into the add category controller
$category_name = $_POST['category_name'];

$category_check = add_category_ctrl($category_name);

if ($category_check) {
	echo "Category name inserted successfully";
	header('Location: ../view/categorymgt.php');
}
else{
	echo "Category name insertion failed";
}

?>

