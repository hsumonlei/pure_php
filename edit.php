<?php
require 'config.php';

if($_POST){
    // 

    $title =$_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $pdostatement = $pdo->prepare("UPDATE todo SET title='$title', description = '$desc' WHERE id = '$id' ");
    $result = $pdostatement->execute();

    if($result){
        echo "<script>alert('Update data successfully!');window.location.href='index.php'</script>";
    }



}else{
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();

    // print "<pre>";
    // print_r ($result[0]['id']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
        <h2>Edit To Do</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $result[0]['description'] ?></textarea>
                </div>
                <div class="form-group">
                <input type="submit" name="" class="btn btn-primary" value="UPDATE">
                <a  type="button" href="index.php" class="btn btn-success" >BACK</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>