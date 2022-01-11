<?php
include('../db_connector.php');

//Collect incoming variables from index page

$bookCatol = $_POST["bookCatol"];
$sub_name = $_POST["sub_name"];

if(isset($sub_name) && ($bookCatol)   ) {

    $query = "";
    $query = "select `sub_name` from `sub_cato` where `sub_name`='$sub_name'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);

//check category is already exist
    if ($count != 1) {
        $insertQ = "INSERT INTO `sub_cato`(`cat_id`,`sub_name`) VALUES('$bookCatol','$sub_name')";
        $insertRes = mysqli_query($con, $insertQ);
        echo "Successfully Added a New Category !";

    }
    else {
        echo "This $sub_name Category Already Taken !";
    }

}
else{
    echo "Please Fill Fields !";
}
?>