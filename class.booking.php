<?php
    require('./config.php');
    // When form submitted, insert values into the database.
    $name=$_POST['name'];
	$email=$_POST['email'];
	$phone_number=$_POST['phone_number'];
	$destination=$_POST['destination'];
	$members=$_POST['members'];
	$date_of_departure=$_POST['date_of_departure'];
	$date_of_arrival=$_POST['date_of_arrival'];
    $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `bookings` (name, email, phone_number, destination, members, date_of_departure, date_of_arrival, created_at)
                 VALUES ('$name', '$email', '$phone_number', '$destination', '$members', '$date_of_departure', '$date_of_arrival', '$create_datetime')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo json_encode(array("statusCode"=>200));
    } 
    else {
        echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($con);
?>