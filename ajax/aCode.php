<?php
//Include database configuration file
include('../db_connector.php');

if(isset($_POST["req_id"]) && !empty($_POST["req_id"])){
    //Get all state data
    $query = $con->query("SELECT * FROM req_items WHERE req_number = ".$_POST['req_id']." ");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Item</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['reqID'].'">'.$row['item_name'].'</option>';

        }

    }else{
        echo '<option value="">Type not available</option>';
    }
}


?>