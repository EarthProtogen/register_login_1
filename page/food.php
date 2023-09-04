<?php
session_start();
include('./connect.php');

// Check if the user is logged in
if (!isset($_SESSION['username_u'])) {
    header('Location: index.php'); // Redirect to the login page if not logged in
    exit();
}

// Fetch the list of added foods from the database
$query = "SELECT * FROM food";
$result = mysqli_query($conn, $query);

// Check if there are any rows in the result set
if (mysqli_num_rows($result) > 0) {
    // Start building the HTML for the list
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of Added Foods</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <style>
            .food-card {
                max-width: 300px; /* Set the maximum width for the card */
                margin: 10px; /* Add some margin for spacing between cards */
            }
        </style>
    </head>
    <body style="background: rgb(252,195,70);
    background: radial-gradient(circle, rgba(252,195,70,1) 0%, rgba(252,70,70,1) 100%);">';
    
    include("./../component/navbaruser.php");

    // Create a container for the list of foods
    echo '<div class="container">';
    
    // Loop through the rows in the result set
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="food-card card">
            <img src="./../image/' . $row['image_food'] . '" class="card-img-top" alt="' . $row['name_food'] . '" style="height: 200px;" />
            <div class="card-body">
                <h5 class="card-title">' . $row['name_food'] . '</h5>
                <p class="card-text">Price: ' . $row['price_food'] . '</p>
                <p class="card-text">Type: ' . $row['type_food'] . '</p>
            </div>
        </div>';
    }

    // Close the container and the HTML document
    echo '</div></body></html>';
} else {
    // If there are no rows in the result set, display a message
    echo 'No foods found.';
}
?>
