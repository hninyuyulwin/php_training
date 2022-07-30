<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';

    if (isset($_POST['password-reset-token']) && $_POST['email']) {
        include 'db.php';

        $emailId = $_POST['email'];

        $sql = "SELECT * FROM users WHERE email='".$emailId."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        
            $token = md5($emailId).rand(10,9999);

            $expFormat = mktime(date("H") , date("i"), date("s"), date("m"), date("d")+1, date("Y"));
            $expDate = date("Y-m-d H:i:s",$expFormat);

            $sql = "UPDATE users set  reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'";
            $update = mysqli_query($conn,$sql);

            $link = "<a href='http://localhost:8000/Tuto10/reset-password.php?key=".$emailId."&token=".$token."'>Click to reset password</a>";

            $mail = new PHPMailer();

            $mail->CharSet = "utf-8";
            $mail->IsSMTP();
            $mail->SMTPAuth = true;

            $mail->Username = "chengyi5211314@gmail.com";
            $mail->Password = "lteihgkdpjilxjkd";
            $mail->SMTPSecure = "ssl";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = "465";
            $mail->From = "chengyi5211314@gmail.com";
            $mail->FromName = "Cheng Yi";
            $mail->AddAddress($emailId);
            $mail->Subject = "Reseting Password";
            $mail->IsHTML(true);
            $mail->Body = "Click On This Link to Reset Password $link";

            if($mail->Send()){
                echo "<div class='alert alert-success'>Check Your Email and Click on the link sent to your email</div>";
            }else{
                echo "Mail Error ->".$mail->ErrorInfo;
            }
        
    }
?>