<?php
    session_start();
    require_once 'db.php';
    if(empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])){
      header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showing </title>
    <!-- Font Awesome -->
	<link
	  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
	  rel="stylesheet"
	/>
	<!-- Google Fonts -->
	<link
	  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
	  rel="stylesheet"
	/>
	<!-- MDB -->
	<link
	  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
	  rel="stylesheet"
	/>
</head>
<body>
    
</body>
</html>
<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
    <h2 class="text-success">User List Showing Table</h2>
    <h5 class="text-warning">Welcome <?php echo $_SESSION['username'];?></h5>
    <hr>

    <a href="create.php" type="button" class="btn btn-primary mb-5">Create User</a>
    <div style="float:right">
        <a href="logout.php" class="btn btn-success" onclick="return confirm('Are you sure want to logout?');">Logout</a>
    </div>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Password</th>
            <th>Exp_date</th>
            <th>Reset Link Token</th>
        </tr>
        <?php
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
              while($value = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $value['id'];?></td>
            <td><?php echo $value['name'];?></td>
            <td><?php echo $value['email'];?></td>
            <td><?php echo substr($value['password'],0,15);?></td>
            <td><?php echo $value['exp_date'];?></td>
            <td><?php echo $value['reset_link_token'];?></td>
        </tr>
        <?php
            }
            }
            else {
              echo "0 results";
            }
        ?>
    </table>
    </div>
        </div>
    </div>
<!-- MDB -->
<script
type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>
</body>
</html>