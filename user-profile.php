<?php

session_start();
include("./classes/config.php");
// show order details
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM order_details Where user_id = $user_id AND isDeliver = '0'";
$result = mysqli_query($con, $sql);
$sql1 = "SELECT * FROM users Where id = $user_id";
$result1 = mysqli_query($con, $sql1);


$status="";
$sub_total_price =0;
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["sku_id"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['sku_id'] === $_POST["sku_id"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
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
  
    <div class="container mt-5 mar-8">
        <div class="row d-flex">
            <div class="col-md-6">
                <h4>User Details</h4>
                <table class="table table-striped table-sm">
                                    
                    <tbody>
                        <?php 
                            if (mysqli_num_rows($result1) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result1)) {
                            ?>
                            <tr>
                            <th scope="col">Name</th>
                            <td><?php echo $row['full_name'];?></td>
                            </tr>
                            <tr>
                            <th scope="col">Email</th>
                            <td><?php echo $row['email'];?></td>
                            </tr>
                            <tr>
                            <th scope="col">Phone Number</th>
                            <td><?php echo $row['phone_number'];?></td>
                            </tr>
                            <tr>
                            <th scope="col">City</th>
                            <td><?php echo $row['city'];?></td>
                            </tr>
                            <?php
                            }
                            } else {
                            echo "0 results";
                            }
                            ?>
                    </tbody>
                </table>
            </div>
            <?php
            if(!empty($_SESSION["shopping_cart"])) { ?>
            <div class="col-md-6">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                            <th scope="col">Product Title</th>
                            <th scope="col">SKU ID</th>
                            <th scope="col">Price in $</th>
                            <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $count =0;
                            $ProdTitleStr='';
                            $SkuIDStr='';
                            $PriceStr='';
                            $QuantityStr='';

                            $ProdTitleArr = [];
                            $SkuIDArr = [];
                            $PriceArr =[];
                            $QuantityArr = [];
                            while($row = mysqli_fetch_assoc($result)) {
                                $count++;
                                $ProdTitleStr .= $row['product_title'].',';
                                $SkuIDStr .= $row['sku_id'].',';
                                $PriceStr .= $row['price'].',';
                                $QuantityStr .= $row['quantity'].',';
                                }

                                $ProdTitleArr = explode(',',$ProdTitleStr);
                                $SkuIDArr = explode(',',$SkuIDStr);
                                $PriceArr = explode(',',$PriceStr);
                                $QuantityArr = explode(',',$QuantityStr);
                            } else {
                            echo "0 results";
                            }
                            ?>
                            <tr>
                                <td>
                                <?php
                                    foreach($ProdTitleArr as $title){
                                       echo '<p>'.$title.'</p>';
                                    }?>
                                </td>
                                <td>
                                    <?php
                                     foreach($SkuIDArr as $SkuID){
                                        echo '<p>'.$SkuID.'</p>';
                                        
                                    }
                                        ?>
                                </td>
                                <td>
                                <?php
                                     foreach($PriceArr as $Price){
                                        echo '<p>'.$Price.'</p>';
                                        
                                    }
                                        ?>
                                </td>
                                <td>
                                <?php
                                     foreach($QuantityArr as $Quantity){
                                        echo '<p>'.$Quantity.'</p>';
                                        
                                    }
                                        ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <?php } ?>
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
    <input type="hidden" name="login_session" value="<?php echo !empty($_SESSION['full_name'])?$_SESSION['full_name']:''; ?>">
    

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
   

        $('#checkout').click(function(e){
            e.preventDefault();
            var login_session = $('input[name=login_session]').val();
            if(login_session){
                window.location.href = "/checkout.php";
            }else{
                if(confirm('Please login for checkout!')){
                    window.location.href = "/login.php";
                }else{
                    
                window.location.href = "/view-cart.php";
                }
            }
        });
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