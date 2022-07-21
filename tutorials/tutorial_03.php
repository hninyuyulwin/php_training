<html>
  <head>
    <title>Age | Calculation</title>
    <style>
      .input-date {
        width : 15%;
        outline : none;
      }
      form {
        margin: 50px auto;
        padding-left : 30%;
      }
    </style>
  </head>
  <body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      Enter your birth date and I will calculate your age : <br><br>
      <input class="input-date" type="date" name="bd"><br><br>
      <input type="submit" value="Calculate">
    </form>
  </body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userBD = $_POST['bd'];
    $nowYear = date('Y');
    if (date('Y', strtotime($userBD)) > date('Y')) {
        echo "<h3>Your birthday is invalid</h3>";
    } else {
        $diff = ($nowYear - date('Y', strtotime($userBD)));
        echo "<h3>Your age is $diff years old.</h3>";
    }
}
?>