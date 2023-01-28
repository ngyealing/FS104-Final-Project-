<?php
    require('./config.php');
    // When form submitted, insert values into the database.
    $id = $_GET['id'];
   $sql = "DELETE FROM contacts WHERE id=$id";
   if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: /contacts.php");
  } else {
    echo "Error deleting record: " . $con->error;
  }
    mysqli_close($con);
?>