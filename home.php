<?php 
session_start();
include('./connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="service.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="username" placeholder="username" class="form-control mb-2" required>
                            <input type="password" name="password" class="form-control mb-2" placeholder="password" required>
                            <button type="submit" name="submit" class="btn btn-primary mb-2">Test</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>


        <table class="table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Manage</th>
            </tr>
            <?php
            $query_show_user = "SELECT * FROM users";
            $result_user = mysqli_query($conn, $query_show_user);


            while ($fetch_result_user = mysqli_fetch_object($result_user)) { ?>
                <tr>
                    <td><?= $fetch_result_user->id_u ?> </td>
                    <td><?= $fetch_result_user->username_u ?></td>
                    <td><?= $fetch_result_user->password_u ?></td>
                    <td>
                        <a href="service.php?id=<?= $fetch_result_user->id_u ?>">Delete</a>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $fetch_result_user->id_u ?>">
                            Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $fetch_result_user->id_u ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="service.php" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="username" placeholder="username" class="form-control mb-2" value="<?= $fetch_result_user->username_u ?>" required>
                                            <input type="text" name="password" class="form-control mb-2" placeholder="password" value="<?= $fetch_result_user->password_u ?>" required>
                                            <input type="hidden" name="id" value="<?= $fetch_result_user->id_u ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="update" class="btn btn-secondary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php }  ?>
        </table>
    </div>
</body>

</html>