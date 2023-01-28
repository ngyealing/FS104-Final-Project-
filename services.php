<?php
session_start();
include("./classes/config.php");
$sql = "SELECT * FROM trips";
$result = mysqli_query($con, $sql);

//add to cart
$status="";
if (isset($_POST['sku_id']) && $_POST['sku_id']!=""){
$sku_id = $_POST['sku_id'];
$result1 = mysqli_query($con,"SELECT * FROM `trips` WHERE `sku_id`='$sku_id'");
$row1 = mysqli_fetch_assoc($result1);
$title = $row1['title'];
$sku_id = $row1['sku_id'];
$price = $row1['price'];
$images = $row1['images'];
$quantity = $_POST['quantity'];
$description = $row1['description'];

$cartArray = array(
	$sku_id=>array(
	'title'=>$title,
	'sku_id'=>$sku_id,
	'price'=>$price,
	'quantity'=>$quantity,
	'description'=>$description,
	'images'=>$images)
);
if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($sku_id,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
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
    <title>Travel Service | Memoravel</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/home.css">

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
                        <a class="nav-link active" href="services.php">Services</a>
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

    <!-- Page Header -->
    <header class="header header-mini" style="background-image: url(assets/imgs/banner/banner3.jpg); height: 65vh;">
        <div class="header-title text-white">Ireland Tours & Itineraries</div>
    </header> <!-- End Of Page Header -->

    <section class="section" id="about" style="background-color: #fff;">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="section-title text-center">Book a Service</h2>
                </div>
                <?php 
            if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
               ?>
                <div class="col-lg-4 pt-3">
                    <div>
                        <a href="services-single.php?id=<?php echo $row['id']; ?>">
                            <div class="service-img">
                                <?php $img = explode(",", $row['images']); ?>
                                <div style="width:100%;">
                                 <img src="/classes/media/<?php echo $img[0]; ?>" alt="img" width="100%" height="300px">
                                </div>
                               
                            </div>
                            
                            <div class="service-title">
                                <p class="text-center p-0 m-0"><?php echo $row['title'];?></p>
                            </div>
                            <div class="service-charge">
                                <p class="text-center p-0 m-0">$<?php echo sprintf("%.2f", $row['price']);?></p>
                            </div>
                        </a>
                        <form method="Post">
                        <div class="number">
                            <span class="minus">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24" class="sgjacj_">
                                    <path d="M20,12 L20,13 L5,13 L5,12 L20,12 Z" fill-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input type="text" value="1" name="quantity"/>
                            <span class="plus"><svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24"
                                    class="sgjacj_">
                                    <path
                                        d="M13,5 L13,12 L20,12 L20,13 L13,13 L13,20 L12,20 L11.999,13 L5,13 L5,12 L12,12 L12,5 L13,5 Z"
                                        fill-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="service-btn">
                            <!-- <button onclick="openNav()">Add to Cart</button> -->
                            
                                    <input type="hidden" name="sku_id" value="<?php echo $row['sku_id'];?>">
                                 <button type="submit">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            
               <?php
              }
            } else {
              echo "0 results";
            }
            ?>
            </div>
    </section>
    <section class="section my-3" id="about" style="background-color: #EFE9E6;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 py-5">
                    <h2 class="section-title text-center">Ireland Travel Advice</h2>
                </div>
                <div class="col-lg-5">
                    <div style="border: 1px solid gray;">
                        <div class="">
                            <img src="assets/imgs/services/services4.webp" width="100%" alt="">
                        </div>
                        <div class="pr-3 pl-3 pt-4 pb-4">
                            <h4>Family Adventure in Ireland - 7 Days</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div style="border: 1px solid gray;">
                        <div class="">
                            <img src="assets/imgs/services/services5.webp" width="100%" alt="">
                        </div>
                        <div class="pr-3 pl-3 pt-4 pb-4">
                            <h4>5 Unique Itinerary Idea</h4>
                        </div>
                    </div>
                </div>
            </div>
    </section>
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