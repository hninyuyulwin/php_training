<?php
	session_start();
  if ($_POST['logout']) {
    session_destroy();
    header('location:tutorial_04.php');     
  }
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
  <h1>Home Page</h1>
  <form action="" method="post">
    <input type="submit" name="logout" value="Logout">
  </form>
</body>
</html>