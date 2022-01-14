<?php
include 'connection.php';
//other jax tutorial
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ajax Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <br/>
    <br/>
    <br/>
    <br/>
    <h2>Ajax Update</h2>
    <p>Update user info with Jquery Ajax:</p>
    <table class="table">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $table  = mysqli_query($connection ,'SELECT r.req_number ,d.depot_name ,e.date 
                                            FROM req_items r ,items i  ,req e , depot d 
                                            WHERE e.req_number = r.req_number AND r.item_name = i.item_id AND  d.depot_id = e.depot   AND i.status = \'common\' AND r.status = \'approved\' 
                                            GROUP BY r.req_number');

        while($row  = mysqli_fetch_array($table)){ ?>
            <tr id="<?php echo $row['req_number']; ?>">
                <td data-target="firstName"><?php echo $row['req_number']; ?></td>
                <td data-target="lastName"><?php echo $row['depot_name']; ?></td>
                <td data-target="email"><?php echo $row['date']; ?></td>
                <td><a href="#" data-role="update" data-id="<?php echo $row['req_number'] ;?>">Update</a></td>
            </tr>

        <?php }


        ?>

        </tbody>
    </table>


</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">

                <table class="table">

                    <thead>

                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $table  = mysqli_query($connection ,'SELECT i.item_name ,r.qty, i.item_id , r.reqID, r.av FROM items i
                                        JOIN req_items r ON r.item_name = i.item_id
                                        JOIN req rq ON r.req_number = rq.req_number
                                        WHERE i.status = \'common\' AND  r.status = \'approved\' and rq.req_number = $ud
                                        GROUP BY i.item_name');
                    while($row  = mysqli_fetch_array($table)){ ?>

                        <tr id="<?php echo $row['reqID']; ?>">
                            <td data-target="firstName"><?php echo $row['item_name']; ?></td>
                            <td data-target="lastName"><?php echo $row['qty']; ?></td>
                            <td data-target="email"><?php echo $row['reqID']; ?></td>
                            <td><a href="#" data-role="up" data-id="<?php echo $row['reqID'] ;?>">Update</a></td>
                        </tr>
                    <?php }
                    ?>

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

</body>

<script>
    $(document).ready(function(){

        //  append values in input fields
        $(document).on('click','a[data-role=update]',function(){
            var id  = $(this).data('id');
            var firstName  = $('#'+id).children('td[data-target=firstName]').text();
            var lastName  = $('#'+id).children('td[data-target=lastName]').text();
            var email  = $('#'+id).children('td[data-target=email]').text();

            $('#firstName').val(firstName);
            $('#lastName').val(lastName);
            $('#email').val(email);
            $('#userId').val(id);
            $('#myModal').modal('toggle');
        });


        $(document).ready(function(){

            //  append values in input fields
            $(document).on('click','a[data-role=up]',function(){
                var id  = $(this).data('id');
                var firstName  = $('#'+id).children('td[data-target=firstName]').text();
                var lastName  = $('#'+id).children('td[data-target=lastName]').text();
                var email  = $('#'+id).children('td[data-target=email]').text();

                $('#firstName').val(firstName);
                $('#lastName').val(lastName);
                $('#email').val(email);

                $.ajax({
                    url      : 'cIssue.php',
                    method   : 'post',
                    data     : { id: id},
                    success  : function(response){
                        // now update user record in table



                    }
                });
            });

            // now create event to get data from fields and update in database


        });
    });
</script>
</html>
