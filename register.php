<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/toastr.css">

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
                        <li>
                            <a href="checkout.php">My Account</a>
                        </li>
                        <li>
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="active">
                            <a href="register.php">Sign up</a>
                        </li>

                    </ul><!-- nav navbar-nav left Finish -->

                </div><!-- padding-nav Finish -->

                <a href="cart.php" class="btn navbar-btn btn-primary right">
                    <!-- btn navbar-btn btn-primary Begin -->

                    <i class="fa fa-shopping-cart"></i>

                    <span>4 Items In Your Cart</span>

                </a><!-- btn navbar-btn btn-primary Finish -->

                <div class="navbar-collapse collapse right">
                    <!-- navbar-collapse collapse right Begin -->

                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        <!-- btn btn-primary navbar-btn Begin -->

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button><!-- btn btn-primary navbar-btn Finish -->

                </div><!-- navbar-collapse collapse right Finish -->

                <div class="collapse clearfix" id="search">
                    <!-- collapse clearfix Begin -->

                    <form method="get" action="results.php" class="navbar-form">
                        <!-- navbar-form Begin -->

                        <div class="input-group">
                            <!-- input-group Begin -->

                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>

                            <span class="input-group-btn">
                                <!-- input-group-btn Begin -->

                                <button type="submit" name="search" value="Search" class="btn btn-primary">
                                    <!-- btn btn-primary Begin -->

                                    <i class="fa fa-search"></i>

                                </button><!-- btn btn-primary Finish -->

                            </span><!-- input-group-btn Finish -->

                        </div><!-- input-group Finish -->

                    </form><!-- navbar-form Finish -->

                </div><!-- collapse clearfix Finish -->

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
                        Sign up
                    </li>
                </ul><!-- breadcrumb Finish -->

            </div><!-- col-md-12 Finish -->

            <div class="col-md-3">
                <!-- col-md-3 Begin -->


            </div><!-- col-md-3 Finish -->

            <div>

                <div class="box">
                    <!-- box Begin -->

                    <div class="box-header">
                        <!-- box-header Begin -->

                        <div style="text-align: center;">
                            <!-- center Begin -->

                            <h2> Create your account</h2>

                            <p class="text-muted">
                                <!-- text-muted Begin -->

                                If you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>

                            </p><!-- text-muted Finish -->

                        </div><!-- center Finish -->

                        <div>
                            <!-- form Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label>Your Username</label>

                                <input type="text" class="form-control" name="c_username" required>

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label>First Name</label>

                                <input type="text" class="form-control" name="c_fname" required>

                            </div><!-- form-group Finish -->

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label>Last Name</label>

                        <input type="text" class="form-control" name="c_lname" required>

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label>Your Email</label>

                        <input type="text" class="form-control" name="c_email" required>

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label>Your Password</label>

                        <input type="password" class="form-control" name="c_pass" required>

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Your Address</label>

                            <input type="text" class="form-control" name="c_address" required>

                        </div><!-- form-group Finish -->

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label>Your Country</label>

                        <input type="text" class="form-control" name="c_country" required>

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label>Your Postal Code</label>

                        <input type="text" class="form-control" name="c_postalcode" required>

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label>Your Phone Number</label>

                        <input type="text" class="form-control" name="c_contact" required>

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label>Your Profile Picture</label>

                        <input type="file" class="form-control form-height-custom" name="c_image">

                    </div><!-- form-group Finish -->

                    <div class="text-center">
                        <!-- text-center Begin -->

                        <button name="register" class="btn btn-primary" onclick="return register()">

                            <i class="fa fa-user-md"></i> Sign up

                        </button>

                    </div><!-- text-center Finish -->

                    </div><!-- form Finish -->

                </div><!-- box-header Finish -->

            </div><!-- box Finish -->

        </div>

    </div><!-- container Finish -->
    </div><!-- #content Finish -->

    <?php

    include("includes/footer.php");

    ?>
    <script src="js/checksession.js"></script>
    <script src="js/register.js"></script>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/toastr.js"></script>

</body>

</html>