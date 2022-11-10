<?php

include("../settings/core.php");
if (logged_in()){
  echo "you are logged in";
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="registerprocess.php" method="POST">
  <div class="container">
    <h1>Register Customer</h1>
    <p>Please fill in this form</p>
    
    <label for="text"><b>Fullname</b></label> <br>
    <input type="text" placeholder="Enter fullname" name="fullname" id="fullname" required>

    <br><br>

    <label for="email"><b>Email</b></label><br>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>

    <br><br>

    <label for="password"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" id="password" 
    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
    title="Must contain at least one number and one uppercase 
  and lowercase letter, and at least 6 or more characters" required>

    <br><br>

  <label for="password2"><b>Confirm Password</b></label><br>
    <input type="password" placeholder="Confirm Password" name="password2" id="password2" required>

    <br>
    <br>
 -->
   <label for="text"><b>Country</b></label><br>
    <input type="text" placeholder="Enter country" name="country" id="country" required>

    <br><br>

   <label for="text"><b>City</b></label><br>
    <input type="text" placeholder="Enter city" name="city" id="city" required>

    <br><br>

   <label for="text"><b>Contact Number</b></label><br>
    <input type="tel" placeholder="Enter contact number" name="contact" id="contact" required>

    <br><br>

    <label for="image"><b>Upload Image</b></label><br>
    <input type="file" name="image" id="image" required>

    <br><br>

    <button type="submit" class="registerbtn">Register</button>
  </div>

  <script>"../js/form_validation.js"</script>
</body>
</html>

