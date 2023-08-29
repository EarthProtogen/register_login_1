<?php
require("./connect.php");
if (isset($_POST['submit'])) {
    $usrname = $_POST['username'];
    $pass = $_POST['password'];

    $query = "INSERT INTO `users`(`username_u`, `password_u`) VALUES ('$usrname','$pass')";

    mysqli_query($conn, $query);

    header('location:./home.php');
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "DELETE  FROM users WHERE id_u = '$id'";

    mysqli_query($conn, $query);

    header('location:./home.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $usrname = $_POST['username'];
    $pass = $_POST['password'];

    $query = "UPDATE `users` SET `username_u`='$usrname',`password_u`='$pass' WHERE `id_u` = '$id'";

    mysqli_query($conn, $query);

    header('location:./home.php');
}
