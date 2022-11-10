<?php

/* include("../settings/core.php");
if (logged_in() == false){
  header('Location: ../index.php');
}
else { */

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="loginprocess.php" method="POST">
  <div class="container">
    <h1>Customer Login</h1>
    <p>Please fill in this form to Login</p>
    
    <br>

    <label for="email"><b>Email</b></label><br>
    <input type="text" placeholder="Enter Email" name="login_email" id="login_email" required>

    <br><br>

    <label for="password"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="login_password" id="login_password" required>

    <br><br>

    <button type="submit" class="registerbtn">Login</button>

  </div>
</form>

<script>"../js/form_validation.js"</script>

</body>
</html>

<?php 
//}
?>