<?php 
session_start();
include('./../system/database.php');

$db = new database();


if(isset($_POST['login'])) {
    $usrname = $_POST['username'];
    $pass = $_POST['password'];

    $resultCheck = $db -> mysqli -> query("SELECT * FROM `users` WHERE username_u = '$usrname' AND password_u = '$pass'");

    if($resultCheck -> num_rows > 0) {
        $fetch_user = $resultCheck -> fetch_object();

        $_SESSION['id_u'] = $fetch_user->id_u;
        $_SESSION['username_u'] = $fetch_user->username_u;
        $_SESSION['password_u'] = $fetch_user->password_u;
        $_SESSION['email_u'] = $fetch_user->email_u;
        $_SESSION['image'] = $fetch_user->image;
        if($fetch_user -> status === "user"){
            header('location:./home.php');
        }else{
            if($fetch_user -> status === "admin") {
        
        header('location:./../admin/adminhome.php');
        return;
        
             }
    }   
    }else{
        $_SESSION['alert'] = 'Invalid login!';
        header('location:'. $_SERVER['REQUEST_URI']);
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
                        <div class="card shadow" style="border-radius: 8px;">
                            <div class="row">
                                <div class="col-8">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-container m-4">
                                        <input type="hidden" name="edit_id" value="<?php echo $_SESSION['id_u']; ?>">
                                            <div class="form-floating mb-3 mt-3">
                                                <input type="text" placeholder="Username" name="username"
                                                    class="form-control mb-3 shadow-sm" style="border-radius:20px"
                                                    id="" required>
                                                <label for="username">Username</label>
                                            </div>
                                            <hr>
                                            <div class="form-floating mb-3 mt-3">
                                                <input type="text" placeholder="Password" name="password"
                                                    class="form-control mb-3 shadow-sm" style="border-radius:20px"
                                                    id="" required>
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="btn btn-outline-danger" name="login"
                                                        style="border-radius:20px">เข้าสู่ระบบ</button>
                                                </div>
                                                <div class="col mt-auto text-center"><a href="./register.php"
                                                        class="link-danger">ยังไม่มีบัญชีผู้ใช้งาน</a></div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-4">
                                    <img src="./../image/food.jpeg" class="img-fluid h-100 w-100" alt="..."
                                        style="border-radius: 8px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="col mt-3 text-center">
                    <?php include('./error.php') ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>