<?php
    require('./config.php');
    // When form submitted, insert values into the database.
    $id = $_GET['id'];
   $sql = "DELETE FROM bookings WHERE id=$id";
   if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: /bookings.php");
  } else {
    echo "Error deleting record: " . $con->error;
  }
    mysqli_close($con);
?>