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
    } else if (!preg_match("/^[A-Za-z ]*$/", $_POST['name'])) {
        $nameErr = "Only letters and space allowed!";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format!";
    } else if (strlen($_POST['password']) < 7) {
        $pwdErr = "Password should not less than 6 letters.";
    } else {
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
        fieldset{
            width : 500px;
            margin : 50px auto;
            background-color : #000;
            color : #fff;
        }
        .input-data {
            width : 50%;
            padding : 8px;
            border : 1px solid #000;
            outline : none;
            border-radius : 8px;
        }
        .btn {
            background-color : pink;
            color : #000;
            border : 1px solid transparent;
            border-radius : 5px;
            padding : 8px;
            cursor: pointer;
        }
        .btn:hover {                
            background-color : #fff;
            border : 1px solid pink;
        }
        .border-bottom {
            border-bottom : 1px solid #fff;
            padding-bottom : 15px; 
        }
    </style>
</head>
<body>
  <fieldset>
    <h1>Login Form</h1>
      <h5 class="border-bottom">Required field will show with <span class="error">*</span></h5>
      <br>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="name">Enter Username : </label><br><br>
        <input class="input-data" type="text" name="name" placeholder="Enter your name">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        <label for="email">Enter E-mail : </label><br><br>
        <input class="input-data" type="text" name="email" placeholder="Enter your e-mail">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        <label for="password">Enter Password : </label><br><br>
        <input class="input-data" type="password" name="password" placeholder="Enter password">
        <span class="error">* <?php echo $pwdErr; ?></span>
        <br><br>
        <input class="btn" type="submit" value="Login">
      </form>
  </fieldset>
</body>
</html>