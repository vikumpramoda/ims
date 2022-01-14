<?php

include("db_connector.php");

if(isset($_GET['sup_id'])) {
  $sup_id = $_GET['sup_id'];
  $query = "DELETE FROM supplier WHERE sup_id = $sup_id";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: viewSupplier.php');
}

?>

