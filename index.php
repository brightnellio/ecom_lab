	<!-- landing/index page -->
	<?php

	require("settings/core.php");

	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Index Page</title>
	</head>


	<body>

	<?php
	//checking if the user is logged in.
	if (logged_in() == false){
	?>
		<button type="button" onclick = "document.location= 'login/register.php'"><b>Register</b></button> 
	| 
		<button type="button" onclick = "document.location= 'login/login.php'"><b>Login</b></button>
	<?php

	//checking if the user is an admin so they can access admin privileges.
	}else { if ($_SESSION['user_role'] == 1) {	
	?>

	<button type="button" onclick = "document.location= 'login/register.php'"><b>Register</b></button> 
	| 
	<button type="button" onclick = "document.location= 'login/logout.php'"><b>Logout</b></button>
	|
	<button type="button" onclick = "document.location= 'view/brandmgt.php'"><b>Brand</b></button>
	|
	<button type="button" onclick = "document.location= 'view/categorymgt.php'"><b>Category</b></button>
	| 
	<button type="button" onclick = "document.location= 'view/product.php'"><b>Add Product</b></button>	
	| 
	<button type="button" onclick = "document.location= 'view/all_product.php'"><b>All Products</b></button>
	 
	<form action="view/product_search_result.php" method="GET">
	<input type="text" placeholder="Search by title..." name="search" id="search">
    <button type="submit"><b>Search</b></button> 
	<?php } 
	
	else{ ?> 
	<button type="button" onclick = "document.location= 'login/logout.php'"><b>Logout</b></button> 
	| 
	<button type="button" onclick = "document.location= 'login/register.php'"><b>Register</b></button>	
	| 
	<button type="button" onclick = "document.location= 'view/product.php'"><b>Add Product</b></button>	
	| 
	<button type="button" onclick = "document.location= 'view/all_product.php'"><b>All Products</b></button>

	<form action="view/product_search_result.php" method="GET">
	<input type="text" placeholder="Search by title..." name="search" id="search">
    <button type="submit"><b>Search</b></button> 
	
	 
			<?php }}?>

	</body>

	
	</html>	