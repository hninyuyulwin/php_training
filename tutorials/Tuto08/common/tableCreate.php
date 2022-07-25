<?php require_once 'head.php';?>
<?php
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','6144');
    define('DB_NAME','userinfo');
    try {
        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE alluser (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            age INT(3) NOT NULL,
            useraddress VARCHAR(100) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $conn->exec($sql);

		echo "<div class='alert alert-success'>Table Created Successful!</div>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Fail to Create Table!</div>";
    }
    $conn = null;
?>
<?php
    require_once 'foot.php';
?>