<?php
session_start();
require_once 'actions/db_connect.php';
require_once 'actions/file_upload.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animal WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $picture = $data['picture'];
        $location = $data['location'];
        $description = $data['description'];
        $size = $data['size'];
        $age = $data['age'];
        $vaccinated = $data['vaccinated'];
        $breed = $data['breed'];
        $status = $data['status'];

    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update pet</title>
        <?php require_once 'components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Update your pet <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td><input class="form-control" type="text"  name="name" placeholder ="Change pet name" value="<?php echo $name ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class="form-control" type= "file" name="picture" placeholder="Change image" value ="<?php echo $picture ?>" /></td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td><input class="form-control" type= "text" name="location" placeholder="Change location" value ="<?php echo $location ?>" /></td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td><input class="form-control" type= "text" name="description" placeholder="Change Description" value ="<?php echo $description ?>" /></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td><input class="form-control" type= "text" name="size" placeholder="Change size" value ="<?php echo $size ?>" /></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><input class="form-control" type= "text" name="age" placeholder="Change age" value ="<?php echo $age ?>" /></td>
                    </tr>
                    <tr>
                        <th>Vaccinated</th>
                        <td><input class="form-control" type= "text" name="vaccinated" placeholder="Yes/No" value ="<?php echo $vaccinated ?>" /></td>
                    </tr>
                    <tr>
                        <th>Breed</th>
                        <td><input class="form-control" type= "text" name="breed" placeholder="Change breed" value ="<?php echo $breed ?>" /></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><input class="form-control" type= "text" name="status" placeholder="Change status" value ="<?php echo $status ?>" /></td>
                    </tr>
                    <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $data['id'] ?>" />
                     
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>