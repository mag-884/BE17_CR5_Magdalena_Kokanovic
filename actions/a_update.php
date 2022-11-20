<?php
require_once 'db_connect.php';
require_once 'file_upload.php';


if ($_POST) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $pictureArray = file_upload($_FILES['picture']); //file_upload() called

    $picture = $pictureArray->fileName;
    $location = $_POST['location'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $vaccinated = $_POST['vaccinated'];
    $breed = $_POST['breed'];
    $status = $_POST['status'];


    $sql = "UPDATE animal SET name = '$name', picture = '$picture', location ='$location', description ='$description', size ='$size', age ='$age', 
    vaccinated ='$vaccinated', breed ='$breed', status ='$status' WHERE id = {$id}";




    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Your pet was successfully updated";
    } else {
        $class = "danger";
        $message = "Error while updating your pet : <br>" . mysqli_connect_error();
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Notification</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <p>
                <?php echo ($message) ?? ''; ?>
            </p>
            <p>
                <?php echo ($uploadError) ?? ''; ?>
            </p>
            <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>