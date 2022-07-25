<?php
    require_once 'head.php';
?>
<?php
    if(isset($_GET['create'])){
?>
    <div class="alert alert-success">Row Created Success!</div>
<?php
    }
?>
<?php
    if(isset($_GET['edit'])){
?>
    <div class="alert alert-success">Row Edited Success!</div>
<?php
    }
?>
<?php 
    if(isset($_GET['delete'])){
?>  
    <div class="alert alert-danger">Deleted Success!</div>
<?php
    }
?>
    <h2 style="color:green;">User List Showing Table</h2><hr>
    <a href="create.php" type="button" class="btn btn-primary mb-5">Create User</a>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Age</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php
            $stmt = $conn->prepare("SELECT * FROM alluser");
            $stmt->execute();
            $res = $stmt->fetchAll();
            if($res){
                foreach ($res as $value) {
        ?>
        <tr>
            <td><?php echo $value['id'];?></td>
            <td><?php echo $value['username'];?></td>
            <td><?php echo $value['email'];?></td>
            <td><?php echo $value['age'];?></td>
            <td><?php echo $value['useraddress'];?></td>
            <td>
                <a href="edit.php?id=<?php echo $value['id']?>" type="button" class="btn btn-warning">Edit</a>
                <a href="delete.php?id=<?php echo $value['id']?>"
                        onclick="return confirm('Are you sure you want to delete this item')"
                        type="button" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php
                }
            }
        ?>
    </table>
    <?php
    require_once 'foot.php';
?>