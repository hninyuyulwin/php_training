<?php
    require_once 'head.php';

    $stmt = $conn->prepare("DELETE FROM alluser where id=".$_GET['id']);
    $stmt->execute();
    header('location:index.php?delete=success');
?>


<?php
    require_once 'foot.php';
?>