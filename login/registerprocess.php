<?php
require("../controllers/customer_controller.php");

$name = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$country = $_POST['country'];
$city = $_POST['city'];
$contact = $_POST['contact'];
$image = $_POST['image'];

// password encription using hash.
$hash = password_hash($password, PASSWORD_DEFAULT);

// checking functions
$check= add_customer_ctrl($name, $email, $hash, $country, $city, $contact,$image);

if ($check) {
	echo "Registration Successful";
	header("Location: ../login/login.php");
}

else{
	echo "not working";
}




?>