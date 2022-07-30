<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
    <!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<!-- MDB -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet"/>
</head>
<body class="bg-dark">
<div class="container">
    <div class="col-lg-6 m-auto mt-auto">
        <div class="card col-lg-6 m-auto mt-5">
            <div class="card-header text-center">
                <h3>Forgot Password</h3>
                <small>Enter your email address</small>
            </div>
            <div class="card-body">
            <form action="password-reset-token.php" method="post">
                <div class="form-group mb-3">                    
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <a href="login.php">Remember password?Login!</a>
                <input type="submit" name="password-reset-token" class="btn btn-warning btn-block mt-3" value="Reset">
              </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>