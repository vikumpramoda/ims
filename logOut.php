<?php
include('db_connector.php');
$_SESSION = array();
session_destroy();
header("Location: index.php");
?>