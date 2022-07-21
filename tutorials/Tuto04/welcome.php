<?php
session_start();
if (isset($_POST['logout'])) {
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
  <style>
    .btn {
            background-color : green;
            color : #fff;
            border : 1px solid transparent;
            border-radius : 5px;
            padding : 8px;
            cursor: pointer;
        }
        .btn:hover {
            background-color : #fff;
            color : #000;
            border : 1px solid green;
        }
        body {
            margin : 50px auto;
            margin-left :20%;
        }
  </style>
</head>
<body>
  <h1>Welcome From Home Page</h1>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum reiciendis nostrum numquam iure dicta <br>sapiente impedit quos cum quam quisquam suscipit est temporibus earum libero,<br> ipsa veritatis illo necessitatibus. Animi.</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum reiciendis nostrum numquam iure dicta <br>sapiente impedit quos cum quam quisquam suscipit est temporibus earum libero,<br> ipsa veritatis illo necessitatibus. Animi.</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum reiciendis nostrum numquam iure dicta <br>sapiente impedit quos cum quam quisquam suscipit est temporibus earum libero,<br> ipsa veritatis illo necessitatibus. Animi.</p>
  <br>
  <h2>Sub Title</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum reiciendis nostrum numquam iure dicta <br>sapiente impedit quos cum quam quisquam suscipit est temporibus earum libero,<br> ipsa veritatis illo necessitatibus. Animi.</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum reiciendis nostrum numquam iure dicta <br>sapiente impedit quos cum quam quisquam suscipit est temporibus earum libero,<br> ipsa veritatis illo necessitatibus. Animi.</p>
  <form action="" method="post">
    <input class="btn" type="submit" name="logout" value="Logout">
  </form>
</body>
</html>
