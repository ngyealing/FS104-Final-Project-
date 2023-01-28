<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Travel Home | Memoravel</title>

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

    <!--Pre-loader-->
    <div class="loader">
        <img src="assets/imgs/preloader.gif" alt="">
    </div>

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
                        <a class="nav-link active" href="index.php">Home</a>
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

  
    <header id="home" class="header">
        <div class="overlay">
            <video autoplay muted loop id="myVideo">
                <source src="assets/imgs/banner/file.mp4" type="video/mp4">
            </video>
        </div>

        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="container">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="carousel-title">Never Stop Exploring
                                <br> the World
                            </h1>
                            <button class="btn-hero"><a href="trip.php" style="color:white;">Let's Go</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </header>

    <section class="section" id="about" style="background-color: #EFE9E6;">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="section-title">About Us</h2>
                </div>
                <div class="col-lg-5 pt-3">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularized in the 1960s with the release of Letterset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.</p>

                    <a href="#" class="btn-readmore">Read More</a>
                </div>
                <div class="col-lg-5">
                    <div class="owl-carousel">
                        <div><img src="assets/imgs/slider/slider1.jpg" alt=""></div>
                        <div> <img src="assets/imgs/slider/slider2.jpg" alt=""></div>
                    </div>
                </div>
            </div>
    </section>
    <section class="section" id="about" style="background-color: #fff;">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-10 pb-5">
                    <h2 class="section-title text-center">What Makes Us Special</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="justify-content-center">
                        <div class="service-icon m-auto">
                            <svg preserveAspectRatio="xMidYMid meet" data-bbox="32.5 26.4 135 147.2"
                                viewBox="32.5 26.4 135 147.2" xmlns="http://www.w3.org/2000/svg" data-type="shape"
                                role="presentation" aria-hidden="true">
                                <g>
                                    <path
                                        d="M167.5 94.5h-135l64.9 76H72.7v2.9h27.1l.1.2.1-.2h27.1v-2.9h-24.7l65.1-76zm-6.2 2.8L100 169.1 38.7 97.3h122.6z">
                                    </path>
                                    <path
                                        d="M71.3 55c0 15.7 12.9 28.5 28.7 28.5s28.7-12.8 28.7-28.5c0-6.7-2.3-12.8-6.2-17.7h13.4v-2.9h-16c-5.2-4.9-12.2-8-19.9-8s-14.7 3-19.9 8h-16v2.9h13.4c-3.9 4.9-6.2 11-6.2 17.7zm54.5 0c0 14.2-11.6 25.7-25.8 25.7S74.2 69.2 74.2 55c0-6.8 2.7-13.1 7.1-17.7h37.4c4.4 4.6 7.1 10.9 7.1 17.7zM100 29.4c5.8 0 11.2 1.9 15.5 5.1h-31c4.3-3.2 9.7-5.1 15.5-5.1z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <h5 class="text-center  mt-5" style="color:#4C0027;">Local Expert Guides</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="justify-content-center">
                        <div class="service-icon m-auto">
                            <svg preserveAspectRatio="xMidYMid meet" data-bbox="12 24.6 176 150.9"
                                viewBox="12 24.6 176 150.9" xmlns="http://www.w3.org/2000/svg" data-type="shape"
                                role="presentation" aria-hidden="true">
                                <g>
                                    <path
                                        d="M188 175.5l-16.5-23.4h13.7v-2.8h-15.7l-4.7-6.7h20.4v-2.8h-22.4l-34.7-49.4h11.3v-2.8h-13.3l-24.2-34.4 19-27-2.3-1.6-18.4 26.2-.2-.2-.2.3-18.4-24.5-2.3 1.7 19 25-24.2 34.5H60.6v2.8h11.3l-34.7 49.4H14.7v2.8h20.4l-4.7 6.7H14.7v2.8h13.7L12 175.5h176zM99.9 55.6l.2.2.1-.2 22.5 31.9H77.4l22.5-31.9zM75.4 90.4h49.3l34.7 49.4H40.6l34.8-49.4zm-36.8 52.2h122.8l4.7 6.7H33.9l4.7-6.7zm129.5 9.5l14.5 20.5h-165l14.5-20.5h136z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <h5 class="text-center  mt-5" style="color:#4C0027;">Local Expert Guides</h5>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="justify-content-center">
                        <div class="service-icon m-auto">
                            <svg preserveAspectRatio="xMidYMid meet" data-bbox="10 26 180 148" viewBox="10 26 180 148"
                                xmlns="http://www.w3.org/2000/svg" data-type="shape" role="presentation"
                                aria-hidden="true">
                                <g>
                                    <path
                                        d="M87.3 147.2H190l-43.4-64.6c9.2-2 16.2-10.3 16.2-20.2 0-11.4-9.2-20.7-20.6-20.7-7.1 0-13.3 3.6-17 9L108.6 26l-51.3 76.5-8.6-12.9L10 147.2h77.3zm-54.9-2.7l24.9-37.1 24.9 37.1H32.4zm109.9-100c9.8 0 17.8 8 17.8 17.9 0 9-6.6 16.4-15.1 17.7l-18-26.8c3-5.3 8.7-8.8 15.3-8.8zm-16.7 11.6l16.2 24.2c-9.6-.2-17.4-8.2-17.4-17.9 0-2.2.4-4.3 1.2-6.3zm-17-25.2l15.1 22.5c-1.3 2.7-2.1 5.8-2.1 9 0 11.4 9.2 20.7 20.6 20.7.5 0 .9 0 1.4-.1l41.3 61.5H85.5l-26.6-39.6 49.7-74zM15.1 144.5l33.6-50 7 10.4-26.6 39.6h-14z">
                                    </path>
                                    <path d="M187.5 154.5v2.7H12.6v-2.7h174.9z"></path>
                                    <path d="M158.1 163.5v2.7H41.8v-2.7h116.3z"></path>
                                    <path d="M125.8 171.3v2.7H74.2v-2.7h51.6z"></path>
                                </g>
                            </svg>
                        </div>
                        <h5 class="text-center mt-5" style="color:#4C0027;">Local Expert Guides</h5>
                    </div>
                </div>
            </div>
    </section>

    <!-- testimonial -->
    <section class="section" id="about" style="background-color: #EFE9E6;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="section-title text-center py-4">Testimonials</h2>
                </div>
                <div class="col-lg-3">
                    <p class="text-center">“The trip was fabulous. The accommodations were terrific. Steve provided
                        excellent GPS
                        directions.”</p>
                    <h5 class="text-center mt-4">Scott Lowe</h5>
                </div>
                <div class="col-lg-3">
                    <p class="text-center">“The trip was fabulous. The accommodations were terrific. Steve provided
                        excellent GPS
                        directions.”</p>
                    <h5 class="text-center mt-4">Scott Lowe</h5>
                </div>
                <div class="col-lg-3">
                    <p class="text-center">“The trip was fabulous. The accommodations were terrific. Steve provided
                        excellent GPS
                        directions.”</p>
                    <h5 class="text-center mt-4">Scott Lowe</h5>
                </div>
            </div>
    </section>
    <section class="section" id="about"
        style="background-image:url(assets/imgs/testimonials/testimonials.jpg); width: 100%; height: 90vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6" style="padding: 150px 0px;">
                    <h1 class="text-center text-white">“Not all those who wander are lost.”</h1>
                    <p class="text-center text-white">J.R.R. Tolkien</p>
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
        function openNav() {
            document.getElementById("mySidenav").style.width = "350px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
        
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