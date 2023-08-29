<?php 
session_start();
include('./database.php');

$db = new database();

if(isset($_POST['register'])) {
    $usrname = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

$data = [
    'username_u' => $usrname,
    'email_u' => $email,
    'password_u' => $pass
];

$db -> insertWhere("users",$data,"(SELECT username_u FROM users WHERE username_u = '$usrname')");

if($db -> mysqli -> affected_rows > 0){
    $_SESSION['success'] = "Register Successfully!";
    header('location:'.$_SERVER['REQUEST_URI']);
    return;
}else{
    $_SESSION['alert'] = "Username is already in use!";
    header('location:'.$_SERVER['REQUEST_URI']);
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

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <div class="container-wrapper">
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
                                        <img src="./image/cat.jpg" alt="..." class="img-fluid h-100 w-100"
                                            style="border-radius: 8px;">
                                    </div>
                                    <div class="col-8">
                                        <form action="" method="post">
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
                                                <div class="row">

                                                    <div class="col">
                                                        <button class="btn btn-outline-primary" name="register"
                                                            style="border-radius:20px"
                                                            method="post">สมัครสมาชิก</button>
                                                    </div>
                                                    <div class="col mt-auto text-center"><a href="./index.php"
                                                            class="link-primary">มีบัญชีผู้ใช้งานอยู่แล้ว</a></div>
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
    </div>
    </div>
    </div>
</body>

</html>