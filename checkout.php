<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Travel View Cart |Memoravel</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <style>
        .fakeimg img {
            width: 100%;
            height: 275px;
        }

        .main-head {
            padding: 20px;
        }

        .banner {
            background-image: url(assets/imgs/banner-services.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 275px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 80px;
        }

        .d-flex {
            justify-content: center;
        }

        .para {
            text-align: center;
            padding: 10px;
            margin: 0;
        }

        .cart_btn {
            position: relative;
        }

        .increase-btn {
            position: absolute;
            border: none;
            right: 0;
            background: transparent;
            height: 40px;
            font-size: 25px;
        }

        .decrease-btn {
            position: absolute;
            border: none;
            left: 0;
            background: transparent;
            height: 40px;
            font-size: 25px;
        }

        .quantity {
            width: 100%;
            text-align: center;
            height: 40px;
        }

        .add_btn {
            width: 100%;
            margin: 12px 0;
            padding: 10px;
            background: #000;
            color: #fff;
            font-size: 17px;
        }

        .sep {
            width: 20px;
            border: 1px solid #000;
            display: block;
            text-align: center;
            margin: 0 auto;
            margin-bottom: 10px;
        }

        .sidepanel {
            height: 100%;
            /* Specify a height */
            width: 0;
            /* 0 width - change this with JavaScript */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Stay on top */
            top: 0;
            right: 0;
            background-color: #fff;
            /* Black*/
            overflow-x: hidden;
            /* Disable horizontal scroll */
            padding-top: 0px;
            /* Place content 60px from the top */
            transition: 1s;
            /* 0.5 second transition effect to slide in the sidepanel */
            padding-left: 0;
            padding-right: 0;
            z-index: 9999;
        }

        .sidepanel .closebtn {
            position: absolute;
            top: 0;
            left: 15px;
            font-size: 36px;
            color: #fff;
        }

        .side-head {
            text-align: center;
            background: #000;
            padding: 20px;
            color: #fff;
        }

        .side-head p {
            color: #fff;
            opacity: 1;
            font-size: 20px;
        }

        .mt-5 {
            margin-bottom: 50px;
        }

        .side-bot img {
            width: 100px;
            height: 100px;
        }

        .side-bot .cart_btn {
            width: 100px;
        }

        .side-bot {
            padding: 10px;
        }

        .sp {
            padding: 0 10px;
        }

        .sub {
            position: absolute;
            bottom: 0;
            padding: 15px;
            width: 100%;
        }

        .mar-8 {
            margin-top: 150px !important;
            min-height: 430px;
        }

        .d-flex-cr {
            display: flex;
            justify-content: space-around;
        }

        .cart-div {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }

        .d-flex-sm {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body data-offset="40" id="home">

    <nav id="scrollspy" class="navbar navbar-light bg-light navbar-expand-lg fixed-top" data-spy="affix"
        data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="assets/imgs/logo/logo.png" alt="" class="brand-img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trip.php">Trip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#booking">
                            Book Now
                        </a>
                    </li>
                    <?php 
                         if(empty($_SESSION['isLogin'])){ ?>
                          <li class="nav-item ml-0 ml-lg-4">
                            <a class="icon d-flex" href="login.php">
                            <div>
                                <img src="assets/imgs/icons/user.png" alt="">
                            </div>
                            <div>
                                <p>Log In</p>
                            </div>
                        </a>
                    </li>
                        <?php
                         }else{
                            echo '
                            <li class="nav-item ml-0 ml-lg-4">
                            <a class="icon d-flex" href="user-profile.php">
                            <div>
                                <img src="assets/imgs/icons/user.png" alt="">
                            </div>
                            <div>
                                <p>'.$_SESSION["full_name"].'</p>
                                </div>
                            </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                   | Logout
                                </a>
                            </li>';
                         }
                        ?>
                    <li class="nav-item ml-0 ml-lg-4">
                        <a class="icon d-flex" href="view-cart.php">
                            <div>
                                <img src="assets/imgs/cart-icon.png" alt="">
                                <?php
                                    if(!empty($_SESSION["shopping_cart"])) {
                                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                                    ?>
                                <span style="background-color: red; color:white; border-radius:25px; padding: 2px 9px;"><?php echo $cart_count; ?></span>
                                <?php
                                    }
                                ?>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Book Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="" id="booking_form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telephone">Telephone</label>
                                        <input type="number" class="form-control" id="telephone" name="phone_number"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="destination">Destination</label>
                                        <input type="text" class="form-control" id="destination" name="destination"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="trevelling">No. of Peoples Trevelling</label>
                                        <input type="number" min="1" class="form-control" id="trevelling" name="members"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="dod">Date of Departure</label>
                                        <input type="date" class="form-control" id="dod" name="date_of_departure"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="doa">Date of Arrival</label>
                                        <input type="date" class="form-control" id="doa" name="date_of_arrival"
                                            required="required">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="book_btn">Book
                        Now</button>
                </div>
            </div>
        </div>
    </div>
  
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4 order-md-2 mb-4 mt-5">
                <h4 class="d-flex justify-content-between align-items-center mb-3 mt-5">
                    <span class="text-muted">Your cart</span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                        $product_nameArr = [];
                        $priceArr = [];
                        $quantityArr = [];
                        $sku_idArr = [];
                        $imagesArr = [];
                        $total = 0;
                        foreach($_SESSION['shopping_cart'] as $cartItem)
                        {
                            $product_nameArr[] = $cartItem['title'];
                            $priceArr[] = $cartItem['price'];
                            $quantityArr[] = $cartItem['quantity'];
                            $sku_idArr[] = $cartItem['sku_id'];
                            
                            $arr = [];
                            $arr = explode(",", $cartItem['images'], 2);
                            $first = $arr[0];
                            $imagesArr[] = $first;
                        ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?php echo $cartItem['title'] ?></h6>
                                    <small class="text-muted">Quantity: <?php echo $cartItem['quantity'] ?> X Price: <?php echo $cartItem['price'] ?></small>
                                </div>
                                <span class="text-muted">$<?php echo ($cartItem['price']*$cartItem['quantity']) ?></span>
                            </li>
                    <?php
                        $total+=($cartItem['price']*$cartItem['quantity']);
                        }
                    ?>
                
                    <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$<?php echo number_format($total,2);?></strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <?php 
                    if(isset($errorMsg) && count($errorMsg) > 0)
                    {
                        foreach($errorMsg as $error)
                        {
                            echo '<div class="alert alert-danger">'.$error.'</div>';
                        }
                    }
                ?>
                <form class="needs-validation" method="POST" action="/classes/class.checkout.php">
                    <div class="row mt-3">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="full_name" value="<?php echo $_SESSION['full_name']; ?>">
                        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                        <input type="hidden" name="product_title" value="<?php echo implode(',', $product_nameArr); ?>">
                        <input type="hidden" name="sku_id" value="<?php echo implode(',', $sku_idArr); ?>">
                        <input type="hidden" name="price" value="<?php echo implode(',', $priceArr); ?>">
                        <input type="hidden" name="image" value="<?php echo implode(',', $imagesArr); ?>">
                        <input type="hidden" name="quantity" value="<?php echo implode(',', $quantityArr); ?>">
                        <div class="col-md-12 mb-3 mt-3">
                        <h3 class="mt-3">Billing Address</h3>
                        <label for="address1">Address</label>
                        <input type="text" class="form-control" id="address1" name="address1" placeholder="1234 Main St" value="" required>
                        </div>
            
                        <div class="col-md-12 mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite" value="">
                        </div>
                    </div>
                    
        
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone_number1">Phone Number</label>
                            <input type="number" class="form-control" id="phone_number1" name="phone_number1" placeholder="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone_number2">Alternate Phone Number <span style="font-size: 12px;">(Optional)</span></label>
                            <input type="text" class="form-control" id="phone_number2" name="phone_number2" placeholder="">
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" name="country" id="country" >
                            <option value="">Choose...</option>
                            <option value="United States" >United States</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" name="state" id="state" >
                            <option value="">Choose...</option>
                            <option value="California">California</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="" value="" required>
                        </div>
                    </div>
                    <hr class="mb-4">
        
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">Payment with cards</h4>
                        </div>
                        <div class="col-md-6">
                            <img src="/assets/imgs/icons/cards.png" width="60%" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="card_number">Card Number</label>
                            <input type="text" class="form-control" id="card_number" name="card_number" placeholder="xxxxxxxxxxxxxxx" value="" required>
                        </div>
                        <div class="col-md-3">
                            <label for="expiry_date">Expiration Date</label>
                            <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YY" value="" required>
                        </div>
                        <div class="col-md-3">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="xxxx" value="" required>
                        </div>
                        <div class="col-md-3">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="xxxxxx" value="" required>
                        </div>
                    </div>
                
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>                            
    <div class="container">
        <div class="row py-3">
            <div class="col-lg-12 text-center">
                <div class="social-links">
                    <a href="javascript:void(0)" class="text-dark"><i class="ti-instagram"></i></a>
                    <a href="javascript:void(0)" class="text-dark"><i class="ti-facebook"></i></a>
                    <a href="javascript:void(0)" class="text-dark"><i class="ti-twitter-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #EFE9E6;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="my-3 text-center">
                        <script>document.write(new Date().getFullYear())</script> &copy; <a target="_blank"
                            href="http://www.devcrud.com">Memoravel</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Owl carousel  -->
    <script src="assets/vendors/owl-carousel/js/owl.carousel.js"></script>


    <!-- Ollie js -->
    <script src="assets/js/Ollie.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            rtl: true,
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                }
            }
        })

    </script>

     <script>
        // step 5
        $("#book_btn").click(function (e) {
            e.preventDefault();
            if ($('#booking_form').valid()) {
                var name = $("input[name=name]").val();
                var email = $("input[name=email]").val();
                var phone_number = $("input[name=phone_number]").val();
                var destination = $("input[name=destination]").val();
                var members = $("input[name=members]").val();
                var date_of_departure = $("input[name=date_of_departure]").val();
                var date_of_arrival = $("input[name=date_of_arrival]").val();

                $.ajax({
                    url: "./classes/class.booking.php",
                    method: 'POST',
                    data: {
                        name: name,
                        email: email,
                        phone_number: phone_number,
                        destination: destination,
                        members: members,
                        date_of_departure: date_of_departure,
                        date_of_arrival: date_of_arrival,
                    },
                    success: function (response) {
                        var response = JSON.parse(response);
                        if (response.statusCode == '200') {
                            $('#booking_form').trigger("reset");
                            alert('Congratulations for your booking. Happy journey!');
                        }
                        else if (response.statusCode == '201') {
                            alert("Error occured !");
                        }

                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }

        });
    </script>
</body>

</html>