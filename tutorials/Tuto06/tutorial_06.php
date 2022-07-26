<?php
    if (($_SERVER['REQUEST_METHOD'] == 'POST' || $_FILES['upload'])) {
        $dir = $_POST['create'];

        $errors = [];
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $extensions = ['jpeg', 'jpg', 'png', 'gif'];

        if(empty($dir)){
            $input_Err = "Folder name must not empty!";
        }else{
            if (!is_dir($dir)) {
                //echo "Folder created!";
                mkdir($dir,"0777",true);

                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "Extension error!!Only jpg, png & gif are allowed!!";
                }
                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, $dir."/".$file_name);
                    $success = "Image uploaded success!!";
                } else {                    
                    $arr_Errs = $errors;
                }
            }else{         
                //echo "Folder already exits!";           
                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "Extension error!!Only jpg, png & gif are allowed!!";
                }
                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, $dir."/".$file_name);
                    $success = "Image uploaded success!!";
                } else {
                    $arr_Errs = $errors;
                }
            }
        }
    }
?>
<html>
    <head>
        <title>File upload and create</title>
        <style>
            fieldset{
                width : 500px;
                margin : 50px auto;
            }
            .error {
                color : red;
            }
            .success {
                color : blue;
            }
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
            .input-text {
                width : 50%;
                padding : 8px;
                border : 1px solid green;
                outline : none;
            }
        </style>
    </head>
    <body>
        <fieldset>
            <legend><h2>Choose File</h2></legend>
            <h4>Required field will show with red<span class="error"> *</span></h4><hr><br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                <input type="file" name="image" id="">
                <br><br>
                <input class="input-text" type="text" name="create" placeholder="Enter Folder Name">
                <span class="error">* <?php echo empty($input_Err) ? '' : $input_Err;?></span>
                <br><br>
                <input class="btn" type="submit" name="upload" value="Upload Image">
            </form>
            <span class="error"><?php echo empty($arr_Errs) ? '' : print_r($arr_Errs);?></span>
            <h3 class="success"><?php echo $success; ?></h3>
        </fieldset>
    </body>
</html>