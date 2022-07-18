<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
      if (empty($_POST['name'])) {
				$nameErr = "Name Field Required!";
			}
			if (empty($_POST['email'])) {
				$emailErr = "E-mail Field Required!";
			}
			if (empty($_POST['password'])) {
				$pwdErr = "Password Field Required!";
			}
    }
    else if(!preg_match("/^[A-Za-z ]*$/",$_POST['name'])){
      $nameErr = "Only letters and whitespace allowed!";
    }
    else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
      $emailErr = "Invalid email format!";
    }
    else if(strlen($_POST['password']) < 7){
      $pwdErr = "Password should not be less than 6 characters.";
    }
    else{
      header('location:welcome.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Form</title>
  <style>
    .error {
      color : red;
    }
  </style>
</head>
<body>
  <h2>Login Form</h2>
  <h5 class="">Required field will show with <span class="error">*</span></h5>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    Username : 
    <input type="text" name="name" placeholder="Enter your name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    E-mail : 
    <input type="text" name="email" placeholder="Enter your e-mail">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Password : 
    <input type="password" name="password" placeholder="Enter password">
    <span class="error">* <?php echo $pwdErr;?></span>
    <br><br>
    <input type="submit" value="Login">
  </form>
</body>
</html>