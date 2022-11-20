<?php
session_start();
require_once 'actions/db_connect.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}



$id = $_SESSION['adm'];
$status = 'adm';
$sql = "SELECT * FROM user WHERE status != '$status'";
$result = mysqli_query($connect, $sql);

$res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['adm']);
$rowUser = mysqli_fetch_array($res, MYSQLI_ASSOC);

$sql = "SELECT * FROM animal";
$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result) > 0) {
    while ($rowAnimal = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "  <div class='col'>
        <div class='card h-100'>
          <img src='pictures/" . $rowAnimal['picture'] . "' class='card-img-top' alt='...'>
          <div class='card-body'>
            <h5 class='card-title'>" . $rowAnimal['name'] . "</h5>
            <p class='card-text'>
            <td> Description: " . $rowAnimal['description'] . "</td> <hr/>

          </div>
          <div class='card-footer'>
          <td>
          <a href='update.php?id=" . $rowAnimal['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
          <a href='delete.php?id=" . $rowAnimal['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
          <a href='details.php?id=" . $rowAnimal['id'] . "'><button class='btn btn-warning btn-sm' type='button'>Details</button></a>
          </td>
          </div>
        </div>
      </div>";
    }
    ;
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>




<!doctype html>
<html lang="en">
<html>

<head>
    <title>
        Addoption
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <?php require_once 'components/boot.php' ?>


    </head>

    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <i class="fa-solid fa-list-check" id="icon" style="color:white"></i>
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">


                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php" style="color: white">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="senior.php" style="color: white">Senior</a>
                        </li>

                    </ul>

                    <a class="nav-link" style="color: white">Hi
                        <?php echo $rowUser['first_name']; ?>
                    </a>
                    <div class="hero">
                        <img class="userImage" src="pictures/<?php echo $rowUser['picture']; ?>"
                            alt="<?php echo $rowUser['first_name']; ?>">
                    </div>
                    <a class="nav-link" href="logout.php?logout" style="color: white">Sign Out</a>
                </div>
            </div>
        </nav>
        <!-- Navbar -->

        <!-- Background image -->
        <div class="p-5 text-center bg-image" style="
      background-image: url('https://p.kindpng.com/picc/s/727-7271614_doggie-daycare-dog-boarding-pet-sitting-group-of.png');
      height: 400px;
    ">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <br>
                        <h4 class="mb-3">Adoption</h4>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>



<body>

   <h2 style="text-align:center;">

        <a href="create.php"><button class="btn btn-outline-success me-2" type="button">Add pet</button></a>

    </h2>

    <br>
    <h2 style="text-align:center;">

        <i>Find me</i>


    </h2>

 

    <br>
    <div class="row row-cols-1 row-cols-md-3 g-4">

        <?= $tbody; ?>
    </div>

</body>




<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <i class="fa-brands fa-facebook-f fa-inverse"></i>
            <i class="fa-brands fa-twitter fa-inverse"></i>
            <i class="fa-brands fa-google fa-inverse"></i>
            <i class="fa-brands fa-instagram fa-inverse"></i>
            <i class="fa-brands fa-linkedin fa-inverse"></i>
            <i class="fa-brands fa-github fa-inverse"></i>


        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->





    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-white" href="#">Magdalena Kokanovic</a>
    </div>
    <!-- Copyright -->
</footer>

</html>


<style>
    .userImage {
        width: 70px;
        height: 70px;

    }
</style>