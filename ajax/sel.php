<?php
//Include database configuration file
include('../db_connector.php');

if(isset($_POST["cat_id"]) && !empty($_POST["cat_id"])){
    //Get all state data
    $query = $con->query("SELECT * FROM sub_cato WHERE cat_id = ".$_POST['cat_id']." ORDER BY sub_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Category</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['sub_id'].'">'.$row['sub_name'].'</option>';
        }
    }else{
        echo '<option value="">Type not available</option>';
    }
}


?>