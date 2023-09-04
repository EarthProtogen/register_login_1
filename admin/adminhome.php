<?php
session_start();
include('./../page/connect.php');

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
    if ($row) {
        $userImage = $row['image'];
    } else {
        // Handle case when no user image is found
        $userImage = './../image/cat.jpg'; // Set a default image path
    }
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
<?php include("./../component/navbaradmin.php") ?>
<body style="background: rgb(131,58,180);
background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);">
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
                                    <div class="card-header">Admin name:
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
</body>

</html>