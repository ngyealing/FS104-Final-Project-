<?php
    require('./config.php');
    // When form submitted, insert values into the database.
    $first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
    $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `contacts` (first_name, last_name, email, message, created_at)
                 VALUES ('$first_name', '$last_name', '$email', '$message', '$create_datetime')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo json_encode(array("statusCode"=>200));
    } 
    else {
        echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($con);
?>