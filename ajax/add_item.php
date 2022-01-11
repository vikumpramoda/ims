<?php
include('../db_connector.php');

//Collect incoming variables from index page

$item_name = $_POST["item_name"];
$bookCatol = $_POST["bookCatol"];
$state = $_POST["state"];
@$status = $_POST["optionsRadios"];



if(isset($item_name) && ($bookCatol) && ($state) && ($status)) {


        $query = "";
        $query = "select `item_name` from `items` where `item_name`='$item_name'";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);

//check category is already exist
        if ($count != 1) {
            $insertQ = "INSERT INTO `items`(`item_name`,`unit`,`sub_id`,`status`) VALUES('$item_name','$bookCatol','$state','$status')";
            $insertRes = mysqli_query($con, $insertQ);
            echo "Successfully Added a New Item !";

        } else {
            echo "This $item_name Item name Already Taken !";
        }

}
else{
    echo "Please Fill Fields !";
}
?>