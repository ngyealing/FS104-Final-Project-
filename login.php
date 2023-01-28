
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
            <div class="col-md-4">
<?php
    require('./classes/config.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE email='$email'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die();
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $data = mysqli_fetch_assoc( mysqli_query($con, $query));
            if($data['role'] == 'admin'){
                $_SESSION['full_name'] = $data['full_name'];
                $_SESSION['role'] = 'admin';
                // Redirect to user dashboard page
                header("Location: dashboard.php");
            }else{
                $_SESSION['full_name'] = $data['full_name'];
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['isLogin'] = true;
                header("Location: index.php");
            }
           
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Email/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<form action="" method="Post" name="login" style="border:1px solid #ccc">
                    <div class="container">
                        <h1>Sign Up</h1>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email"><b>Email</b></label>
                                <input type="email" placeholder="Enter Email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="password"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="password" required>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <label>
                                <p class="link"><a href="register.php" style="color: blue;">New Registration</a></p>
                                </label>
                            </div>
                        </div>
                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms &
                                Privacy</a>.
                        </p>

                        <div class="clearfix">
                            <button type="button" class="cancelbtn">Cancel</button>
                            <button type="submit" class="signupbtn">Login</button>
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
</script>
</body>

</html>