<?php
    require('./config.php');
    // When form submitted, insert values into the database.
   
    $title=$_POST['title'];
	$price=$_POST['price'];
	$sku_id=$_POST['sku_id'];
	$quantity=$_POST['quantity'];
	$description=$_POST['description'];
    $create_datetime = date("Y-m-d H:i:s");
    $image_name = [];
    for($i=0;$i<count($_FILES["images"]["name"]);$i++)  
    {  
        $images=$_FILES["images"]["tmp_name"][$i];  
        $folder="./media/";  
  
        move_uploaded_file($_FILES["images"]["tmp_name"][$i], $folder.'/'.$_FILES["images"]["name"][$i]);  
        $image_name[] = $_FILES["images"]["name"][$i];
    }  
    $image_files = implode(',', $image_name);
    $query    = "INSERT into `trips` (title, sku_id, price, quantity, images, description, created_at)
                 VALUES ('$title', '$sku_id', '$price', '$quantity', '$image_files', '$description', '$create_datetime')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo json_encode('200');
    } 
    else {
        echo json_encode("201");
    }
    mysqli_close($con);
?>