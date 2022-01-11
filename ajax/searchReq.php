<?php
include('../db_connector.php');
include('../validateSession.php');

$member_id  = $_SESSION['member_id'];

$cato     = $_GET['cat1'];


$query = "SELECT r.reqId
        FROM req_items r
        INNER JOIN items i ON r.item_name = i.item_id WHERE i.item_id= $member_id ";

if($cato != 0){
    $query .= " and `sub_id` =$cato ";
}

$result = mysqli_query($con,$query);
//Adding table data
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Book ID</th>
        <th>Category</th>
        <th>Book Name</th>
        <th>ISBN</th>
        <th>Author Name</th>
        <th>Availability</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count = mysqli_num_rows($result);
    $itemCount = 1;
    if($count > 0){
        while($row = mysqli_fetch_array($result)){

            $book_id = $row['book_id'];
            $book_name = $row['book_name'];
            $book_category_id = $row['book_category_id'];
            $ISBN = $row['ISBN'];
            $author_name = $row['author_name'];
            $availability = $row['availability'];
            $category_text = $row['category_text'];
            ?>
            <tr>
                <td><?php echo $itemCount;?></td>
                <td><?php echo $book_id;?></td>
                <td><?php echo $category_text;?></td>
                <td><?php echo $book_name;?></td>
                <td><?php echo $ISBN;?></td>
                <td><?php echo $author_name;?></td>
                <td>
                    <?php
                    if($availability == '1'){
                        echo 'Available';
                    }
                    else{
                        echo 'Reserved';
                    }

                    ?></td>
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













