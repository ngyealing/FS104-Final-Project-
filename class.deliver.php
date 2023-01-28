<?php
    require('./config.php');
    // When form submitted, insert values into the database.
   
$id = $_GET['id'];

$update_datetime = date("Y-m-d H:i:s");
    $query    = "UPDATE `order_details` SET isDeliver ='1', updated_at='$update_datetime'
                Where id = $id";
    $result   = mysqli_query($con, $query);
    if ($result) {
        header('location: /orders.php');
    } 
    mysqli_close($con);
?>