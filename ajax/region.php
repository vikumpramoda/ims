<?php
//Include database configuration file
include('db_connector.php');

if(isset($_POST["region_id"]) && !empty($_POST["region_id"])){
    //Get all state data
    $query = $con->query("SELECT * FROM depot WHERE region_id = ".$_POST['region_id']." ORDER BY depot_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select state</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['depot_id'].'">'.$row['depot_name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}


?>