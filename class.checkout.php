<?php
    session_start();
    require('./config.php');
    // When form submitted, insert values into the database.
    // var_dump($_POST);exit;
	$user_id=$_POST['user_id'];
    $full_name=$_POST['full_name'];
	$email=$_POST['email'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	$phone_number1=$_POST['phone_number1'];
	$phone_number2=$_POST['phone_number2'];
	$country=$_POST['country'];
	$state=$_POST['state'];
	$zip=$_POST['zip'];
	$card_number=$_POST['card_number'];
	$expiry_date=$_POST['expiry_date'];
	$cvv=$_POST['cvv'];
	$postal_code=$_POST['postal_code'];
	$product_title=$_POST['product_title'];
	$sku_id=$_POST['sku_id'];
	$price=$_POST['price'];
	$image=$_POST['image'];
	$quantity=$_POST['quantity'];
    $created_at = date("Y-m-d H:i:s");


    $query    = "INSERT into `order_details` (
        user_id, full_name, email, address1, address2, phone_number1, phone_number2, country, state,
        zip, card_number, expiry_date, cvv, postal_code, product_title, sku_id, price, image, quantity, created_at
        )VALUES (
        '$user_id', '$full_name', '$email', '$address1', '$address2', '$phone_number1', '$phone_number2', '$country', '$state',
        '$zip', '$card_number', '$expiry_date', '$cvv', '$postal_code', '$product_title', '$sku_id', '$price', '$image', '$quantity', '$created_at'
        
        )";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo '<script>
        if(confirm("Order Placed Successfully.")){
            window.location.href = "/services.php";
        }else{
            window.location.href = "/services.php";
        }
        </script>';
        unset($_SESSION['shopping_cart']);
    } 
    else {
        '<script>
        if(confirm("Error Occured.")){
            window.location.href = "/checkout.php";
        }else{
            window.location.href = "/checkout.php";
        }
        </script>';
    }
    mysqli_close($con);
?>