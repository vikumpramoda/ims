<?php

include("db_connector.php");

if(isset($_GET['member_id'])) {
  $member_id = $_GET['member_id'];
  $query = "DELETE FROM member WHERE member_id = $member_id";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: viewMember.php');
}

?>

