<?php
include('../db_connector.php');

$bookCatol      = $_GET['cat1'];

/*$query = "SELECT b.`itemType_category_id`, b.`itemType_name`
		FROM `itemtype_category` b, `item_category` c
		WHERE b.`item_category_id`=c.`item_category_id` AND c.`item_category_name` =$bookCatol ";

*/
$query= "SELECT  b.sub_id, b.sub_name
    FROM sub_cato b
    INNER JOIN main_cato c ON b.cat_id =c.cat_id WHERE c.cat_id= $bookCatol";

$result = mysqli_query($con,$query);

?>
<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Category ID</th>
        <th>Category Name</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $count = mysqli_num_rows($result);
    $itemCount = 1;
    if($count > 0){
        while($row = mysqli_fetch_array($result)){

            $itemType_category_id = $row['sub_id'];
            $itemType_name = $row['sub_name'];

            ?>
            <tr>
                <td><?php echo $itemCount;?></td>
                <td><?php echo $itemType_category_id;?></td>
                <td><?php echo $itemType_name;?></td>

            </tr>
            <?php
            $itemCount++;
        }
    }
    else{
        echo 'No records found';
    }


    ?>
    </tbody>
</table>

<?php

?>













