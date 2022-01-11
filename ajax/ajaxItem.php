<?php
/**
 * Created by PhpStorm.
 * User: Sasini Hathurusinghe
 * Date: 31/05/2019
 * Time: 12:20 PM
 */

include('../db_connector.php');

if(isset($_POST["sub_id"]) && !empty($_POST["sub_id"])) {
    //Get all state data
    $query = "SELECT * FROM items WHERE sub_id = " . $_POST['sub_id'] . " ORDER BY item_name ASC";
    $result = mysqli_query($con,$query);
    ?>
    <table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Item ID</th>
        <th>Item Name</th>

    </tr>
    </thead>
    <tbody>




    <?php
    $count = mysqli_num_rows($result);
    $itemCount = 1;
    if ($count > 0) {
        while ($row = mysqli_fetch_array($result)) {

            $itemType_category_id = $row['item_id'];
            $itemType_name = $row['item_name'];

            ?>
            <tr>
                <td><?php echo $itemCount; ?></td>
                <td><?php echo $itemType_category_id; ?></td>
                <td><?php echo $itemType_name; ?></td>
                <td><button class="btn btn-primary" type="submit" id="submit" name="submit">Edit</button></td>

            </tr>
            <?php
            $itemCount++;
        }
    } else {
        echo 'No records found';
    }
}


?>
    </tbody>
    </table>

<?php

?>