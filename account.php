<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My account</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

<div id="top">
    <!-- Top Begin -->

    <div class="container">
        <!-- container Begin -->

        <div class="col-md-6 offer" id="cart">
            <!-- col-md-6 offer Begin -->

            <a href="#" class="btn btn-success btn-sm">Welcome</a>

        </div><!-- col-md-6 offer Finish -->

        <div class="col-md-6">
            <!-- col-md-6 Begin -->

            <ul class="menu">
                <!-- menu Begin -->

                <li>
                    <a href="register.php">Sign up</a>
                </li>
                <li class="myaccount">
                    <a href="account.php">My Account</a>
                </li>
                <li id="cartmenu">
                </li>
                <li id="login">
                </li>

            </ul><!-- menu Finish -->

        </div><!-- col-md-6 Finish -->

    </div><!-- container Finish -->

</div><!-- Top Finish -->

<div id="navbar" class="navbar navbar-default">
    <!-- navbar navbar-default Begin -->

    <div class="container">
        <!-- container Begin -->

        <div class="navbar-header">
            <!-- navbar-header Begin -->

            <a href="index.php" class="navbar-brand home">
                <!-- navbar-brand home Begin -->

                <img src="images/logo.png" alt="Logo" style="height:70px" class="hidden-xs">


            </a><!-- navbar-brand home Finish -->

            <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                <span class="sr-only">Toggle Navigation</span>

                <i class="fa fa-align-justify"></i>

            </button>

            <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                <span class="sr-only">Toggle Search</span>

                <i class="fa fa-search"></i>

            </button>

        </div><!-- navbar-header Finish -->

        <div class="navbar-collapse collapse" id="navigation">
            <!-- navbar-collapse collapse Begin -->

            <div class="padding-nav">
                <!-- padding-nav Begin -->

                <ul class="nav navbar-nav left">
                    <!-- nav navbar-nav left Begin -->

                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="shop.php">Shop</a>
                    </li>
                    <li class="active myaccount">
                        <a href="account.php">My Account</a>
                    </li>
                    <li id="cartnav">
                        <a href="cart.php">Shopping Cart</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <li id="loginnav">
                        <a href="login.php">Login</a>
                    </li>

                </ul><!-- nav navbar-nav left Finish -->

            </div><!-- padding-nav Finish -->

            <a href="cart.php" class="btn navbar-btn btn-primary right" id="cartBtn">
                <!-- btn navbar-btn btn-primary Begin -->

            </a><!-- btn navbar-btn btn-primary Finish -->

            <div class="navbar-collapse collapse right">
                <!-- navbar-collapse collapse right Begin -->

        </div><!-- navbar-collapse collapse Finish -->

    </div><!-- container Finish -->

</div><!-- navbar navbar-default Finish -->

<div id="content">
    <!-- #content Begin -->
    <div class="container">
        <!-- container Begin -->
        <div class="col-md-12">
            <!-- col-md-12 Begin -->

            <ul class="breadcrumb">
                <!-- breadcrumb Begin -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    My Account
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3">
            <!-- col-md-3 Begin -->

            <?php

            include("includes/sidebar.php");

            ?>

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9">
            <!-- col-md-9 Begin -->

            <div class="box">
                <!-- box Begin -->
                <div id="myTabContent" class="tab-content">
                    <div>
                        <!-- form Begin -->
                        <div class="form-group" id="myaccount">
                        </div>
                    </div>
                </div><!-- box Finish -->
            </div><!-- col-md-9 Finish -->

        </div><!-- container Finish -->
    </div><!-- #content Finish -->

    <?php

    include("includes/footer.php");

    ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/account.js"></script>
    <script src="js/toastr.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>

</html>