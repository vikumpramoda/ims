<?php
include('../db_connector.php');

//Collect incoming variables from index page
$NIC = $_POST["NIC"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$DOB = $_POST["DOB"];
$address = $_POST["address"];
$member_category_id = $_POST["bookcato"];
$User_name = $_POST["User_name"];
$Password = $_POST["Password"];
$email = $_POST["email"];
$region_id = $_POST["country"];
$depot_id = $_POST["state"];

if(isset($NIC) && ($first_name) && ($last_name) && ($DOB) && ($address) && ($member_category_id) && ($User_name) && ($Password) && ($email)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid $email email format !";
        echo "$emailErr";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
        $nameErr = "Only letters are allowed !";
        echo "$nameErr";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
        $nameErr = "Only letters are allowed !";
        echo "$nameErr";
    } elseif (!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $Password)){
        $errPass = "Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one Digit !";
        echo "$errPass";
    }
    elseif (!preg_match("/^.*[0-9]{9}[vV].*$/", $NIC)){
        $errPass = "National Identity Card Number must be 9 numbers and must contain V or v letter end of the numbers !";
        echo "$errPass";
    }

    else {

        $query = "";
        $query = "select `User_name` from `member` where `User_name`='$User_name'";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);


//check category is already exist
        if($count != 1){
            $insertQ = "Insert into `member`(`NIC`, `first_name`, `last_name`, `DOB`, `address`, `member-category_id`, `User_name`, `Password`, `email`,`region_id`,`depot_id`) values('$NIC','$first_name','$last_name','$DOB','$address','$member_category_id','$User_name','$Password','$email','$region_id','$depot_id')";
            $insertRes = mysqli_query($con,$insertQ);
            echo "Successfully added";
        } else {
            echo "This $User_name Username Already Taken !";
        }
    }
}
else
{
    echo "Please Fill Fields !";
}


?>



