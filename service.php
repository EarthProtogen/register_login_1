<?php

if (isset($_POST['submit'])) {
    $usrname = $_POST['username'];
    $pass = $_POST['password'];

    $query = "INSERT INTO `users`(`username`, `password`) VALUES ('$usrname','$pass')";

    mysqli_query($conn, $query);

    header('location:./home.php');
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "DELETE  FROM users WHERE id = '$id'";

    mysqli_query($conn, $query);

    header('location:./home.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id_u'];
    $usrname = $_POST['username_u'];
    $pass = $_POST['password_u'];

    $query = "UPDATE `users` SET `username_u`='$usrname',`password`='$pass' WHERE `id_u` = '$id'";

    mysqli_query($conn, $query);

    header('location:./index.php');
}
