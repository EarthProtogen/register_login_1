<?php
session_start();
include('./connect.php');


// Check if the user is logged in
if (!isset($_SESSION['username_u'])) {
    header('Location: index.php'); // Redirect to login page if not logged in
    exit();
}

// Fetch the image path for the logged-in user
$username = $_SESSION['username_u'];
$query = "SELECT image FROM users WHERE username_u = '$username'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $userImage = $row['image'];
} else {
    // Handle database query error
    $userImage = './../image/cat.jpg'; // Set a default image path
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>

<body style="background: rgb(252,195,70);
background: radial-gradient(circle, rgba(252,195,70,1) 0%, rgba(252,70,70,1) 100%);">
    <?php include("./../component/navbaruser.php") ?>
    <div class="container">
        <div class="container-wrapper mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-5">
                        <div class="fading-box">
                            <div class="card shadow" style="border-radius: 8px;">
                                <div class="row">
                                    <div class="col-8">
                                        <?php $_SESSION['username_u']; ?>
                                        <div class="card-header">Customer name:
                                            <?php echo $_SESSION['username_u']; ?> </div>
                                        <?php $_SESSION['email_u']; ?>
                                        <div class="card-body">Email: <?php echo $_SESSION['email_u'] ?> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-wrapper mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-5">
                        <!-- Carousel -->
                        <div id="demo" class="carousel slide" data-bs-ride="carousel">
                            <!-- Indicators/dots -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="0"
                                    class="active"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                            </div>

                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="./../image/food1.png" alt="Cat Image">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./../image/menu1.jpg" alt="Food Image">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./../image/food3.png" alt="New York Image">
                                </div>
                            </div>

                            <!-- Left and right controls/icons -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#demo"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demo"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>