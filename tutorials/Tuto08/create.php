<?php
    require_once 'head.php';
?>
<?php
    if(isset($_POST['create'])){
        if (empty($_POST['name']) ||empty($_POST['email']) ||empty($_POST['age']) ||empty($_POST['address'])) {
            if (empty($_POST['name'])) {
                $nameErr = "Name Field Required!";
            }
            if (empty($_POST['email'])) {
                $emailErr = "E-mail Field Required!";
            }
            if (empty($_POST['age'])) {
                $ageErr = "Age Field Required!";
            }
            if (empty($_POST['address'])) {
                $addressErr = "Address Field Required!";
            }
        }else if(!preg_match("/^[A-Za-z ]*$/",$_POST['name'])) {
            $nameErr = "Only letters and space allowed!";
        }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid email format!";
        }else if(!preg_match("/^[0-9]{2}$/", $_POST['age'])){
            $ageErr = "Please fill valid age values!";
        }
        else {            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $address = $_POST['address'];

            $stmt = $conn->prepare("SELECT * FROM alluser WHERE email=:email");
            $stmt->execute([':email'=>$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user){
                $emailErr = "E-mail Duplicated!";
            }else{    
                $stmt = $conn->prepare("INSERT INTO alluser(username,email,age,useraddress) VALUES (:username,:email,:age,:useraddress)");
                $result = $stmt->execute([':username'=>$name,':email'=>$email,':age'=>$age,':useraddress'=>$address]);
                if($result){                
                    header('location:index.php?create=success');
                }
            }
        }
    }
?>  
    <div class="card">
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
                    <label for="age">Age</label>
                    <p style="color:red"><?php echo empty($ageErr) ? '' : '*'.$ageErr; ?></p>
                    <input type="text" class="form-control" name="age" value="">
                </div><br>
                <div class="form-group">
                    <label for="address">Address</label>
                    <p style="color:red"><?php echo empty($addressErr) ? '' : '*'.$addressErr; ?></p>
                    <input type="text" class="form-control" name="address" value="">
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