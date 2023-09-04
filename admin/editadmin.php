<?php 
session_start();

include('./../system/database.php');

$db = new database();
$currentpage = basename(__FILE__);
$db -> secureCheck();

$userid = $_SESSION['id_u'];
$db -> select("users", "*", " WHERE id_u = '$userid'");
$myself = $db -> query -> fetch_assoc();

if(isset($_POST['edit_profile'])){
    $usrname = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $file = $_FILES['file'];
    $fileold = $_POST['fileold'];
    
    if($file['name'] != ''){
        $fileNew = $db -> uploadFile($file);
        $_SESSION['image'] = $fileNew;
    }else{
        $fileNew = $fileold;
    }
    
    $data = [
        'username_u' => $usrname,
        'password_u' => $pass,
        'email_u' => $email,
        'image' => $fileNew,
    ];

    $db -> update("users",$data," id_u = $userid");

    if($db -> query){
        // Update session variables
        $_SESSION['username_u'] = $usrname; // Update the username
        $_SESSION['email_u'] = $email;     // Update the email
        $_SESSION['image'] = $fileNew;     // Update the image
        
        $_SESSION['success'] = "Edit Success";
        header('location:./editadmin.php');
        return;
    }else{
        $_SESSION['error'] = "Edit Error";
        header('location:'.$_SERVER['REQUEST_URI']);
        return;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</head>

<body style="background: rgb(238,253,255);
background: radial-gradient(circle, rgba(238,253,255,1) 29%, rgba(117,238,255,1) 82%, rgba(114,192,255,1) 100%);">

    <head>
        <!-- สิ้นสุดโค้ด CSS เพิ่มเติม -->
    </head>

    <body>
        <!--Main layout-->
        <main style="margin-top: 58px;">

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="fading-box">
                        <div class="card shadow" style="border-radius: 8px;">
                            <div class="card-body m-0 p-0">
                                <div class="row">


                                    <div class="row">
                                        <?php 
                include("./../page/error.php");
                ?>
                                        <!-- tab controller -->
                                        <ul class="nav nav-tabs nav-fill mb-3" id="navtab1" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a href="#tabs1" class="nav-link active" id="tab1" data-bs-toggle="tab"
                                                    role="tab" aria-controls="tabs1"
                                                    aria-selected="true">แก้ไขโปรไฟล์</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a href="#tabs2" class="nav-link " id="tab2" data-bs-toggle="tab"
                                                    role="tab" aria-controls="tabs2" aria-selected="true">
                                                    แก้ไขรหัสผ่าน
                                                </a>
                                            </li>
                                        </ul>

                                        <!-- tab1 -->
                                        <div class="tab-content" id="tab-content">
                                            <div class="tab-pane fade show active" id="tabs1" role="tabpanel"
                                                aria-labelledby="tab1">
                                                <div class="row">
                                                    <div class="col-3"></div>
                                                    <div class="col-6">
                                                        <!-- Default form login -->
                                                        <form class=" border border-light p-5" action="" method="post"
                                                            enctype="multipart/form-data">

                                                            <p class="h4 mb-4 text-center">Edit Profile</p>

                                                            <!-- Firstname -->
                                                            <label for="" class="form-label">Username</label>
                                                            <input type="text" id="defaultLoginFormUsername"
                                                                class="form-control mb-4" name="username"
                                                                placeholder="Username"
                                                                value="<?= $myself['username_u'] ?>">

                                                            <!-- Lastname -->
                                                            <label for="" class="form-label">Password</label>
                                                            <input type="text" id="defaultLoginFormPassword"
                                                                class="form-control mb-4" name="password"
                                                                placeholder="Password"
                                                                value="<?= $myself['password_u'] ?>">

                                                            <!-- Address -->
                                                            <label for="" class="form-label">Email</label>
                                                            <input type="text" id="defaultLoginFormEmail"
                                                                class="form-control mb-4" name="email"
                                                                placeholder="Email" value="<?= $myself['email_u'] ?>">

                                                            <!-- Profile -->
                                                            <img src="./../uploads/<?= $_SESSION['image'] ?>"
                                                                class="rounded-circle" height="100" width="100"
                                                                loading="lazy" />
                                                            <label for="" class="form-label">Profile</label>


                                                            <input type="file" id="defaultLoginFormProfile"
                                                                class="form-control mb-4 mt-2" name="file">

                                                            <input type="hidden" name="fileold"
                                                                value="<?= $myself['image'] ?>">

                                                            <!-- Edit Profile -->
                                                            <button class="btn btn-info btn-block my-4 text-white"
                                                                name="edit_profile" type="submit">Edit</button>
                                                            <a href="./adminhome.php" class="link-danger">Cancel</a>

                                                        </form>
                                                    </div>
                                                    <div class="col-3"></div>
                                                </div>
                                            </div>
                                            <!-- tab2 -->
                                            <div class="tab-pane fade" id="tabs2" role="tabpanel"
                                                aria-labelledby="tab2">
                                                <div class="tab-pane fade show active" id="tabs1" role="tabpanel"
                                                    aria-labelledby="tab1">
                                                    <div class="row">
                                                        <div class="col-3"></div>
                                                        <div class="col-6">
                                                            <!-- Default form login -->
                                                            <form class=" border border-light p-5" action=""
                                                                method="post">

                                                                <p class="h4 mb-4 text-center">Edit Password</p>

                                                                <!-- Password -->
                                                                <label for="" class="form-label">Password</label>
                                                                <input type="text" id="defaultLoginFormEmail"
                                                                    class="form-control mb-4" name="password_old"
                                                                    placeholder="Password">

                                                                <!-- Password-New -->
                                                                <label for="" class="form-label">Password New</label>
                                                                <input type="text" id="defaultLoginFormEmail"
                                                                    class="form-control mb-4" name="password_new"
                                                                    placeholder="Password New">

                                                                <!-- Password-Confirm -->
                                                                <label for="" class="form-label">Password
                                                                    Confirm</label>
                                                                <input type="text" id="defaultLoginFormPassword"
                                                                    class="form-control mb-4" name="password_confirm"
                                                                    placeholder="Password Confirm">


                                                                <!-- Edit Password -->
                                                                <button class="btn btn-info btn-block my-4 text-white"
                                                                    name="edit_password" type="submit">Edit</button>
                                                                <a href="./adminhome.php" class="link-danger">Cancel</a>

                                                            </form>
                                                        </div>
                                                        <div class="col-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        </main>
        <!--Main layout-->
    </body>


</html>