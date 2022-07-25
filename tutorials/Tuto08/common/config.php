<?php
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','6144');
    define('DB_NAME','userinfo');

    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    );

    $conn = new PDO(
        'mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS,$options
    );
?>