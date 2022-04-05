<?php
require "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php
    $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER by id DESC");
    $pdostatement->execute();
    
    $result = $pdostatement->fetchAll();
    ?>
    <div class="card">
        <div class="card-body">
            <h1>TO DO HOME PAGE</h1>
            <a type="button" href="add.php" class="btn btn-success">Create New</a><br><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i= 1;
                    if($result){
                        foreach ($result as $value) {
                        ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $value['title'] ?></td>
                                <td><?php echo $value['description'] ?></td>
                                <!-- <td><?php echo $value['created_at'] ?></td> -->
                                <td><?php echo date('Y-m-d',strtotime($value['created_at']))?></td>
                                <td>
                                    <!-- <a href="" style="color:red">Edit</a>
                                    <a href="" style="color:blue">Delete</a> -->
                                    <a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $value['id'];?>">Edit</a>
                                    <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $value['id'];?>">Delete</a>
                                </td>
                            </tr>
                        <?php
                         $i++;   
                        }
                    }
                    ?>
                    
                </tbody>

            </table>
        </div>
    </div>
</body>
</html>