<?php
include('../db_connector.php');
//Collect incoming variables from index page
$sup_name = $_POST["sup_name"];
$sup_contact = $_POST["sup_contact"];
$sup_address = $_POST["sup_address"];
$saddress = $_POST["saddress"];
$taddress = $_POST["taddress"];
$faddress = $_POST["faddress"];
$sup_email = $_POST["sup_email"];
$remark = $_POST["remark"];

if(isset ($sup_name) && ($sup_contact) && ($sup_address) && ($saddress) && ($taddress) && ($faddress) 
&& ($sup_email) && ($remark) ) {
    if (!filter_var($sup_email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid $sup_email email format !";
        echo "$emailErr";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $sup_name)) {
        $nameErr = "Only letters are allowed !";
        echo "$nameErr";
    } elseif (!preg_match("/^(?:0|94|\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)(0|2|3|4|5|7|9)|7(0|1|2|5|6|7|8)\d)\d{6}$/", $sup_contact)){
        $errPass = "Contact Number must be valid phone number with 10 numbers and must start with '0' or '94' or '+94' !";
        echo "$errPass";
    }

    else {

        $query = "";
        $query = "SELECT `sup_id` FROM `supplier` WHERE `sup_name`='$sup_name'";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);


//check category is already exist
        if($count != 1){
            $insertQ = "INSERT INTO
             `supplier`(`sup_name`, `sup_contact`, `sup_address`,`saddress`,`taddress`,`faddress`, `sup_email`,`remark`) 
             values('$sup_name','$sup_contact','$sup_address','$saddress','$taddress','$faddress','$sup_email','$remark')";
            $insertRes = mysqli_query($con,$insertQ);
            echo "Successfully Supplier Added";

        } else {
            echo "This $sup_name Username Already Taken !";
        }
    }
}
else
{
    echo "Please Fill Fields !";
}


?>




