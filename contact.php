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
    <title>Travel Contact | Memoravel</title>

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
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trip.php">Trip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact</a>
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
  
    <section class="section mt-5 pt-5" id="about" style="background-color: #BFBFBF;">
        <div class="container mt-5 pt-2">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <h2 class="section-title text-left">Contact Details</h2>
                    <p class="p-0 m-0">500 Terry Francois St.</p>
                    <p class="p-0 m-0">San Francisco, CA 94158</p>
                    <p class="p-0 m-0">123-456-7890</p>
                    <p class="p-0 m-0">info@mysite.com</p>
                </div>
                <div class="col-lg-6">
                    <form action="" method="post" id="contact_form">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="first_name">Firstname</label>
                                    <input id="first_name" type="text" name="first_name" class="form-control"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" type="text" name="last_name" class="form-control"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input id="email" type="email" name="email_id" class="form-control"
                                        required="required">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" name="message" class="form-control" required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button id="contact_save">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
    <section class="section" id="about" style="background-color: #fff;">
        <div class="container">
            <div class="row justify-content-center">
                <div style="width: 100%"><iframe width="100%" height="500" frameborder="0" scrolling="no"
                        marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                            href="https://www.maps.ie/distance-area-calculator.html">distance maps</a></iframe></div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/Ollie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


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
    <script>
        // step 5
        $("#contact_save").click(function (e) {
            e.preventDefault();
            if ($('#contact_form').valid()) {
                var first_name = $("input[name=first_name]").val();
                var last_name = $("input[name=last_name]").val();
                var email = $("input[name=email_id]").val();
                var message = $("textarea[name=message]").val();

                $.ajax({
                    url: "./classes/class.contact.php",
                    method: 'POST',
                    data: {
                        first_name: first_name,
                        last_name: last_name,
                        email: email,
                        message: message,
                    },
                    success: function (response) {
                        var response = JSON.parse(response);
                        if (response.statusCode == '200') {
                            $('#contact_form').trigger("reset");
                            alert('Thank you for submitting your enquiry, we will get back to you ASAP.');
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