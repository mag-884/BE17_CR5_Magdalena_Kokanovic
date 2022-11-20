<?php
require_once 'db_connect.php';
require_once 'file_upload.php';



if ($_POST) {
    $name = $_POST['name'];
    $pictureArray = file_upload($_FILES['picture']);
    $picture = $pictureArray->fileName;
    $location = $_POST['location'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $vaccinated = $_POST['vaccinated'];
    $breed = $_POST['breed'];



    $sql = "INSERT INTO animal (name, picture, location, description, size, age, vaccinated, breed ) 
    VALUES ('$name', '$pictureArray->fileName','$location','$description','$size','$age','$vaccinated','$breed')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "Your pet was successfully added <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td>  $pictureArray->fileName </td>

           
            </tr></table><hr>";

    } else {
        $class = "danger";
        $message = "Error while adding your pet. Try again: <br>" . $connect->error;
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
    <title>Create</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Notification:</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p>
                <?php echo ($message) ?? ''; ?>
            </p>
            <p>
                <?php echo ($uploadError) ?? ''; ?>
            </p>
            <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>