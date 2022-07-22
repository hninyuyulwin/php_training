<?php
    namespace chillerlan\QRCodeExamples;

    use chillerlan\QRCode\{QRCode, QROptions};

    require_once "vendor/autoload.php";
    
    if (isset($_POST['create'])) {
        $dir = "image/";
        if(!is_dir($dir)){
            mkdir($dir,'0777',true);
        }

        $data = $_POST['qr-text'];
        $file = $dir.'/'.uniqid().'.png';

        $outres = '<img src="'.(new QRCode)->render($data,$file).'" alt="QR Code">';
    }
?>
<html>
    <head>
        <title>QR Code</title>
        <style>
            fieldset {
                width : 500px;
                margin : 80px auto;
            }
            h1 {
                text-align : center;
            }
            .input {
                width : 60%;
                padding : 8px;
                border : 1px solid #FFA500;
                outline : none;
                background-color : #fff;
                border-radius : 5px;
            }
            .btn {
                background-color : #FFA500;
                color : #fff;
                border : 1px solid transparent;
                border-radius : 5px;
                padding : 8px 15px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <h1>Tutorial-07 | QR Code</h1>
        <fieldset>
            <form action="tutorial_07.php" method="post">
                <label for="label-text">Put Any Text to create QR Code</label><br><br>
                <input class="input" type="text" name="qr-text" placeholder="Example : https://www.bing.com"><br><br>
                <input type="submit" name="create" class="btn" value="Create QR"><br><br>
                <?php echo $outres; ?>
            </form>
        </fieldset>
    </body>
</html>