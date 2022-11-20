<?php
session_start();
require_once 'actions/db_connect.php';


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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>

  
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        img {
            width: 700px !important;
            height: 400px !important;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;


        }

        td {
            text-align: left;
            vertical-align: middle;
        }

        tr {
            text-align: center;
        }

        .card-text {
            text-align: center;
        }

        .card-title {
            text-align: center;

        }
        .card-background {
            color: white;
        }
    </style>

</head>

<body>

    <div class="card mb-3" style="background-color:white ;">
        <img src='pictures/<?php echo $picture ?>' class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Name:
                <?php echo $name ?>
            </h5>
            <hr>
            <p class="card-text">Location:
                <?php echo $location ?>
            </p>
            <hr>
            <p class="card-text">Description:
                <?php echo $description ?>
            </p>
            <hr>
            <p class="card-text">Size:
                <?php echo $size ?>
            </p>
            <hr>
            <p class="card-text">Age:
                <?php echo $age ?>
            </p>
            <hr>
            <p class="card-text">Vaccinated:
                <?php echo $vaccinated ?>
            </p>
            <hr>
            <p class="card-text">Breed:
                <?php echo $breed ?>
            </p>
            <hr>



            <p class="card-text"><small class="text-muted">Status:
                    <?php echo $status ?>

                </small></p>

            <p class="card-text">
                <a href="dashboard.php"><button class="class='btn btn-warning btn-sm" type="button">Home</button></a>
            </p>


        </div>


    </div>

</body>

</html>