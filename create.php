<?php session_start();
require_once 'actions/db_connect.php';
require_once 'actions/file_upload.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/boot.php' ?>
    <title>Add Product</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add Pet</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Insert pet name" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control w-50' type="file" name="picture">
                        <span class="text-danger">
                    </td>
                </tr>

                <div class="d-flex">


                    </span>
                </div>
                <tr>
                    <th>Location</th>
                    <td><input class='form-control' type="text" name="location" placeholder="Insert location" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description" placeholder="Insert description" />
                    </td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="Insert pet size" /></td>
                </tr>

                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="text" name="age" placeholder="insert age" /></td>
                </tr>
                <tr>
                    <th>Vaccinated?</th>
                    <td><input class='form-control' type="text" name="vaccinated" placeholder="Yes/No" /></td>
                </tr>

                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" placeholder="Insert breed" /></td>
                </tr>


                <tr>
                    <td><button class='btn btn-success' type="submit">Insert Pet</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>


            </table>
        </form>
    </fieldset>
</body>


</html>