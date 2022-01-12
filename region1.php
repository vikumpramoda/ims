<?php
//Include database configuration file
include('db_connector.php');

if(isset($_POST["region_id"]) && !empty($_POST["region_id"])){
    //Get all state data
    $query = $con->query("SELECT * FROM depot WHERE region_id = ".$_POST['region_id']."  ORDER BY depot_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Depot</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['depot_id'].'">'.$row['depot_name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}

/*if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = $db->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}*/
?>