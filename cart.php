<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Cart</title>
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
                        <li class="myaccount">
                            <a href="account.php">My Account</a>
                        </li>
                        <li class="active" id="cartnav">
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

                <a href="cart.php" class="btn navbar-btn btn-primary right" id="cartBtn" >
                    <!-- btn navbar-btn btn-primary Begin -->

                </a><!-- btn navbar-btn btn-primary Finish -->

                <div class="navbar-collapse collapse right">
                    <!-- navbar-collapse collapse right Begin -->

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
                        Cart
                    </li>
                </ul><!-- breadcrumb Finish -->

            </div><!-- col-md-12 Finish -->

            <div id="cart" class="col-md-9" style="width: unset">
                <!-- col-md-9 Begin -->

                <div class="box">
                    <!-- box Begin -->
                    <form action="cart.php" method="post" enctype="multipart/form-data">
                        <!-- form Begin -->

                        <h1>Shopping Cart</h1>
                        <p class="text-muted">You currently have 3 item(s) in your cart</p>

                        <div class="container mb-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Available</th>
                                                <th scope="col" class="text-center">Quantity</th>
                                                <th scope="col" class="text-right">Price</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><img src="https://dummyimage.com/50x50/55595c/fff"/></td>
                                                <td>Product Name Dada</td>
                                                <td>In stock</td>
                                                <td><input class="form-control" type="text" value="1"/></td>
                                                <td class="text-right">124,90 €</td>
                                                <td class="text-right">
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="https://dummyimage.com/50x50/55595c/fff"/></td>
                                                <td>Product Name Toto</td>
                                                <td>In stock</td>
                                                <td><input class="form-control" type="text" value="1"/></td>
                                                <td class="text-right">33,90 €</td>
                                                <td class="text-right">
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="https://dummyimage.com/50x50/55595c/fff"/></td>
                                                <td>Product Name Titi</td>
                                                <td>In stock</td>
                                                <td><input class="form-control" type="text" value="1"/></td>
                                                <td class="text-right">70,00 €</td>
                                                <td class="text-right">
                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Sub-Total</td>
                                                <td class="text-right">255,90 €</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Shipping</td>
                                                <td class="text-right">6,90 €</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>Total</strong></td>
                                                <td class="text-right"><strong>346,90 €</strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="row">
                                        <div class="col-sm-12  col-md-6">
                                            <a href="shop.php" class="btn btn-lg btn-block btn-danger text-uppercase">Continue
                                                Shopping</a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 text-right">
                                            <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><!-- form Finish -->

                </div><!-- box Finish -->


            </div><!-- product same-height Finish -->
        </div><!-- col-md-3 col-sm-6 center-responsive Finish -->

    </div><!-- #row same-heigh-row Finish -->

</div><!-- col-md-9 Finish -->


</div><!-- col-md-3 Finish -->

</div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

include("includes/footer.php");

?>
<script src="js/checksession.js"></script>
<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>

</body>

</html>