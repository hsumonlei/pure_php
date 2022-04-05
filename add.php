<?php
require "config.php";
if(!empty($_POST)){
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO todo(title,description) VALUES(:title, :description)";

    $pdostatement = $pdo->prepare($sql);

    $result = $pdostatement->execute(
        array(
            'title'=> $title,
            'description'=>$desc
        )
    );

    if($result){
        echo "<script>alert('New to do is added');window.location.href='index.php';</script>";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New To Do</h2>
            <form action="add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                <input type="submit" name="" class="btn btn-primary" value="SUBMIT">
                <a  type="button" href="index.php" class="btn btn-success" >BACK</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>