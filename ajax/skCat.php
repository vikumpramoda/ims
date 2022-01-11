<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Mendis
 * Date: 11/03/2019
 * Time: 1:04 PM
 */
//Include database configuration file
include('../db_connector.php');

if(isset($_POST["cat_id"]) && !empty($_POST["cat_id"])){
    //Get all state data
    $query = $con->query("SELECT * FROM sub_cato WHERE cat_id = ".$_POST['cat_id']." ORDER BY sub_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Sub Category</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['sub_id'].'">'.$row['sub_name'].'</option>';
        }
    }else{
        echo '<option value="">Sub Category not available</option>';
    }
}

if(isset($_POST["sub_id"]) && !empty($_POST["sub_id"])){
    //Get all city data
    $query = $con->query("SELECT * FROM items WHERE sub_id = ".$_POST['sub_id']." ORDER BY item_name ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display Item list
    if($rowCount > 0){
        echo '<option value="">Select Items</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['item_id'].'">'.$row['item_name'].'='.$row['item_id'].'</option>';
        }
    }else{
        echo '<option value="">Item not available</option>';
    }
}
?>