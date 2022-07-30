<?php
    require_once 'db.php';
?>
<?php
    if(isset($_POST['create'])){
        if (empty($_POST['name']) ||empty($_POST['email']) || empty($_POST['password']) ||empty($_POST['exp_date']) ||empty($_POST['reset_link_token'])) {
            if (empty($_POST['name'])) {
                $nameErr = "Name Field Required!";
            }
            if (empty($_POST['email'])) {
                $emailErr = "E-mail Field Required!";
            }
            if (empty($_POST['password'])) {
                $pwdErr = "Password Field Required!";
            }
            if (empty($_POST['exp_date'])) {
                $expErr = "Put something exp date";
            }
            if (empty($_POST['reset_link_token'])) {
                $tokenErr = "Put some token.U can put that u like optional!";
            }
        }
        else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $exp_date = $_POST['exp_date'];
        $reset_link_token = $_POST['reset_link_token'];
   
        $sql = "INSERT INTO users (name, email, password,exp_date,reset_link_token)
VALUES ('$name','$email','$password','$exp_date','$reset_link_token')";

        if (mysqli_query($conn, $sql)) {
            header('location:index.php');
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>  
<?php require_once 'head.php';?>
    <div class="card col-lg-6 m-auto">
        <div class="card-body">
            <h2 style="color:green;">Create User</h2><hr>
                <form class="" action="create.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <p style="color:red"><?php echo empty($nameErr) ? '' : '*'.$nameErr; ?></p>
                        <input type="text" class="form-control" name="name" value="">
                    </div><br>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <p style="color:red"><?php echo empty($emailErr) ? '' : '*'.$emailErr; ?></p>
                        <input type="text" class="form-control" name="email" value="">
                    </div><br>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <p style="color:red"><?php echo empty($pwdErr) ? '' : '*'.$pwdErr; ?></p>
                        <input type="password" class="form-control" name="password" value="">
                    </div><br>
                    <div class="form-group">
                        <label for="">Exp Date</label>
                        <p style="color:red"><?php echo empty($expErr) ? '' : '*'.$expErr; ?></p>
                        <input type="text" class="form-control" name="exp_date" value="">
                    </div><br>
                    <div class="form-group">
                        <label for="">Link Token</label>
                        <p style="color:red"><?php echo empty($tokenErr) ? '' : '*'.$tokenErr; ?></p>
                        <input type="text" class="form-control" name="reset_link_token" value="">
                    </div><br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="create" value="SUBMIT">
                        <a href="index.php" class="btn btn-warning">Back</a>
                    </div>
                </form>
        </div>
    </div>
    <!-- /.card -->


<?php
    require_once 'foot.php';
?>