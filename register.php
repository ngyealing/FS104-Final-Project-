
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Travel Sign Up | Memoravel</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">

    <!-- Bootstrap + Ollie main styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/register.css">

</head>

<body data-offset="40" id="home">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <?php
    require('./classes/config.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['email'])) {
        if(stripslashes($_REQUEST['password']) != stripslashes($_REQUEST['password-repeat'])){
            echo "<div class='form'>
                  <h3>Confirm Password not matching</h3><br/>
                  </div>"; 
                  header("Location: register.php");
        }
        // removes backslashes
        $email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
        $email = mysqli_real_escape_string($con, $email);
        $full_name    = stripslashes($_REQUEST['full_name']);
        $full_name    = mysqli_real_escape_string($con, $full_name);
        $phone_number    = stripslashes($_REQUEST['phone_number']);
        $phone_number    = mysqli_real_escape_string($con, $phone_number);
        $city    = stripslashes($_REQUEST['city']);
        $city    = mysqli_real_escape_string($con, $city);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $password = md5($password);
        $create_datetime = date("Y-m-d H:i:s");

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $results = mysqli_query($con, $sql);
        $rows1 = mysqli_num_rows($results);

        if ($rows1 > 0) {
            echo "<div class='form'>
            <h3>This Email exists in record.</h3><br/>
            <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
            </div>";
        }
        else {
            $query    = "INSERT into `users` (email, full_name, phone_number, city, password, created_at)
            VALUES ('$email', '$full_name', '$phone_number', '$city', '$password', '$create_datetime')";
                $result   = mysqli_query($con, $query);
                // var_dump($query);
                if ($result) {
                echo "<div class='form'>
                        <h3>You are registered successfully.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a></p>
                        </div>";
                        $_SESSION['email'] = $email;
                        // Redirect to user dashboard page
                        header("Location: login.php");
                } else {
                echo "<div class='form'>
                        <h3>Required fields are missing.</h3><br/>
                        <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                        </div>";
                }
        }
     
    } else {
?>
   <form action="" method="Post" style="border:1px solid #ccc">
                    <div class="container">
                        <h1>Sign Up</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email"><b>Email</b></label>
                                <input type="email" placeholder="Enter Email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="full_name"><b>Full Name</b></label>
                                <input type="text" placeholder="Enter Full Name" name="full_name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="phone_number"><b>Phone Number</b></label>
                                <input type="number" placeholder="Enter Phone Number" name="phone_number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="city"><b>City</b></label>
                                <input type="text" placeholder="Enter City Name" name="city" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="password"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="password-repeat"><b>Repeat Password</b></label>
                                <input type="password" placeholder="Repeat Password" name="password-repeat" required>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms &
                                Privacy</a>.
                        </p>

                        <div class="clearfix">
                            <button type="button" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn">Sign Up</button>
                        </div>
                    </div>
                </form>
<?php
    }
?>
                
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
</body>

</html>