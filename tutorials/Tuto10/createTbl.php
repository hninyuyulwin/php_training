<?php require_once 'db.php';

    $sql = "CREATE TABLE `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(30) NOT NULL,
        `email` varchar(100) NOT NULL,
        `password` varchar(250) NOT NULL,
        `exp_date` varchar(250) NOT NULL,
        `reset_link_token` varchar(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `email` (`email`)
      )";

    if (mysqli_query($conn, $sql)) {
        echo "Table created successfully";
      } else {
        echo "Error creating table: " . mysqli_error($conn);
      }
      
      mysqli_close($conn);
?>