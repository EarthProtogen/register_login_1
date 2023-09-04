<?php
session_start();
include('./../system/database.php');

$db = new database();

if (isset($_POST['register'])) {
    $usrname = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    // Check if a file was uploaded
    if (isset($_FILES['img'])) {
        $img = $_FILES['img'];
        
        // Define the relative path to the "uploads" folder
        $uploadDir = './../uploads/';
    
        // Generate a unique filename for the uploaded file
        $fileNew = $uploadDir . uniqid('', true) . '_' . $img['name'];
    
        // Move the uploaded file to the "uploads" folder
        if (move_uploaded_file($img['tmp_name'], $fileNew)) {
            // File was moved successfully
        } else {
            // File upload failed
            $_SESSION['alert'] = "File upload failed!";
            header('location:' . $_SERVER['REQUEST_URI']);
            return;
        }
    } else {
        // No file was uploaded
        $_SESSION['alert'] = "No image file uploaded!";
        header('location:' . $_SERVER['REQUEST_URI']);
        return;
    }

    $data = [
        'username_u' => $usrname,
        'email_u' => $email,
        'password_u' => $pass,
        'image' => $fileNew
    ];

    $db->insertWhere("users", $data, "(SELECT username_u FROM users WHERE username_u = '$usrname')");

    if ($db->mysqli->affected_rows > 0) {
        $_SESSION['success'] = "Register Successfully!";
        header('location:' . $_SERVER['REQUEST_URI']);
        return;
    } else {
        $_SESSION['alert'] = "Username is already in use!";
        header('location:' . $_SERVER['REQUEST_URI']);
        return;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</head>

<body style="background: rgb(252,140,70);
background: radial-gradient(circle, rgba(252,140,70,1) 0%, rgba(252,70,70,1) 100%);">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <div class="container-wrapper mt-4">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="fading-box">
                        <?php include('./error.php')  ?>
                        <div class="card shadow" style="border-radius: 8px;">
                            <div class="card-body m-0 p-0">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="./../image/food.jpeg" alt="..." class="img-fluid h-100 w-100"
                                            style="border-radius: 8px;">
                                    </div>
                                    <div class="col-8">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-container m-4">
                                                <h3 class="text-center mb-4">Register Page</h3>
                                                <input type="text" placeholder="Username" name="username"
                                                    class="form-control mb-3 shadow-sm" style="border-radius:20px"
                                                    id="">

                                                <input type="text" placeholder="Email Address" name="email"
                                                    style="border-radius:20px" class="form-control mb-3 shadow-sm"
                                                    id="">
                                                <hr>
                                                <input type="text" placeholder="Password" name="password"
                                                    class="form-control mb-3 shadow-sm" style="border-radius:20px"
                                                    id="">
                                                <input type="text" placeholder="Password confirm" name="password-con"
                                                    class="form-control mb-3 shadow-sm" style="border-radius:20px"
                                                    id="">
                                                <h4 class="text-center m-4">Profile image</h4>
                                                <input type="file" placeholder="Upload profile" name="img"
                                                    class="form-control mb-3 shadow-sm" style="border-radius:20px"
                                                    id="">
                                                <div class="row">

                                                    <div class="col">
                                                        <button class="btn btn-outline-danger" name="register"
                                                            style="border-radius:20px"
                                                            method="post">สมัครสมาชิก</button>
                                                    </div>
                                                    <div class="col mt-auto text-center"><a href="./index.php"
                                                            class="link-danger">มีบัญชีผู้ใช้งานอยู่แล้ว</a></div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</body>

</html>