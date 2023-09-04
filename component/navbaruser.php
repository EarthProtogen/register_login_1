<div class="superNav border-bottom py-2 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
                    <select class="me-3 border-0 bg-light">
                        <option value="en-us">EN-US</option>
                    </select>
                    <span
                        class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><strong>Restaurant</strong></span>
                    <span class="me-3"><i class="fa-solid fa-phone me-1 text-primary"></i>
                        <strong>Customer page</strong></span>
                </div>
                <div
                    class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end">
                    <span class="me-3"><i class="fa-solid fa-truck text-muted me-1"></i><a class="text-muted"
                            href="#">Shipping</a></span>
                    <span class="me-3"><i class="fa-solid fa-file  text-muted me-2"></i><a class="text-muted"
                            href="#">Policy</a></span>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
        <div class="container">
            <?php if(isset($_POST['username_u'])); ?>
            <a class="navbar-brand" href="#"><i class="fa-solid fa-shop me-2"></i><strong>Welcome,
                    <?php echo $_SESSION['username_u']; ?></strong></a>
                    <a class="navbar-brand" href="">
                    <img src="./../uploads/<?= $_SESSION['image'] ?>" class="rounded-circle" height="50" width="50">
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="./../page/food.php">Foods</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#">Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="./../page/home.php">Home</a>
                </li>
            
            </ul>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="#"><i class="fa-solid fa-cart-shopping me-1"></i>
                        Cart</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        ACCOUNT
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="edit.php">Edit profile</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="index.php" class="dropdown-item" href="#">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>