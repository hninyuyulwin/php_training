<?php
    session_start();
    require_once 'db.php';

    if(isset($_POST['login'])){
        if(empty($_POST['email']) || empty($_POST['password'])){
            if(empty($_POST['email'])){
                $emailErr = "E-mail field requied!";
            }
            if(empty($_POST['password'])){
                $pwdErr = "Password field requied!";
            }
        }else{
            $email = $_POST['email'];
            $pwd = $_POST['password'];
    
            $sql = "SELECT * FROM users where email='$email'";
            $res = mysqli_query($conn,$sql);
            $user = mysqli_fetch_assoc($res);

            if($user){
                if(password_verify($pwd,$user['password'])){
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['name'];
                    $_SESSION['logged_in'] = time();
    
                    header('location:index.php');
                }
            }
            $loginErr = "<div class='alert alert-danger'>Incorrect Candidate!!</div>"; 
        }             
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<!-- MDB -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet"/>
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 m-auto mt-5">
                <div class="col-lg-6 m-auto mt-3"> <?php echo empty($loginErr) ? '' : $loginErr ;?></div>
               
                <div class="card col-lg-6 m-auto mt-3">
                    <div class="card-header text-center">
                        <h2>Login Form</h2>
                        <small>Login with your email & password</small>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group mb-3">
                                <label for="email">E-mail</label>
                                <p class="text-danger"><?php echo empty($emailErr) ? '' : '*'.$emailErr; ?></p>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <p class="text-danger"><?php echo empty($pwdErr) ? '' : '*'.$pwdErr; ?></p>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <a href="forget-password.php" class="mt-2">Forgot Password?</a>
                            <div class="form-group">
                                <input type="submit" name="login" value="Login" class="btn btn-success btn-block mt-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>