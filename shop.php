<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Best</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href=styles/toastr.css>
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
                    <li class="active">
                        <a href="shop.php">Shop</a>
                    </li>
                    <li class="myaccount">
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

                <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                    <!-- btn btn-primary navbar-btn Begin -->

                    <span class="sr-only">Toggle Search</span>

                    <i class="fa fa-search"></i>

                </button><!-- btn btn-primary navbar-btn Finish -->

            </div><!-- navbar-collapse collapse right Finish -->

            <div class="collapse clearfix" id="search">
                <!-- collapse clearfix Begin -->

                <div class="navbar-form">
                    <!-- navbar-form Begin -->

                    <div class="input-group">
                        <!-- input-group Begin -->

                        <input type="text" class="form-control" placeholder="Search" id="user_query" required>

                        <span class="input-group-btn">
                                <!-- input-group-btn Begin -->

                                <button onclick="search() " id="SearchButton" class="btn btn-primary">
                                    <!-- btn btn-primary Begin -->

                                    <i class="fa fa-search"></i>

                                </button><!-- btn btn-primary Finish -->

                            </span><!-- input-group-btn Finish -->

                    </div><!-- input-group Finish -->

                </div><!-- navbar-form Finish -->

            </div><!-- collapse clearfix Finish -->

        </div><!-- navbar-collapse collapse Finish -->

    </div><!-- container Finish -->

</div><!-- navbar navbar-default Finish -->

<div class="btn-group pull-right" id="sorting">
    <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        Sort By <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li><a id="priceasc" onclick="PriceAsc()">Price: Ascending</a></li>
        <li><a id="pricedesc" onclick="PriceDesc()">Price: Descending</a></li>
        <li><a id="storageasc" onclick="StorageAsc()">Storage: Ascending</a></li>
        <li><a id="storagedesc" onclick="StorageDsc()">Storage: Descending</a></li>
        <li><a id="sortbrand" onclick="SortBrand()">Brand</a></li>
    </ul>
</div>

<h2>Recommendations</h2>
<div id="RecomendationDiv"></div>

<div class="container py-5">
    <div class="row text-center text-white mb-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4">Product List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow" id="shop">
                <!-- list group item-->
                <!-- End -->
            </ul> <!-- End -->
        </div>
    </div>
</div>

<?php

include("includes/footer.php");

?>
<script src="js/jquery-331.min.js"></script>
<script src="js/shop.js" type="module"></script>
<script src="js/cart.js"></script>
<script src="js/toastr.js"></script>
<script src="js/bootstrap-337.min.js"></script>

</body>

</html>