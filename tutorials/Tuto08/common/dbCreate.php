<?php require_once 'head.php';?>
<?php
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','6144');

    try {
        $conn = new PDO('mysql:host='.DB_HOST,DB_USER,DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE DATABASE userinfo";
        $conn->exec($sql);

		echo "<div class='alert alert-success'>Database Created Successful!</div>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Fail to Create database!</div>";
    }
    $conn = null;
?>
<?php
    require_once 'foot.php';
?>