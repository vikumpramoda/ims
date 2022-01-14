<?php

include('db_connector.php');
//one_req 

$member_id  = $_SESSION['member_id'];
?>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<script src="js/plugins/pace.min.js"></script>

<script>
    $(document).ready(function() {
        loadCombo();
    });


    function loadCombo(){
        var items="";

        $.getJSON("./ajax/aRegion.php",function(data){
            items="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items="<option value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCatol").html(items);
        });
        $.getJSON("./ajax/aDepot.php",function(data){
            items="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items="<option value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCatoll").html(items);
        });
        $.getJSON("./ajax/aMember.php",function(data){
            items="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items="<option value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCato").html(items);
        });

    }

</script>

<html>
<head>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="./css/select2.min.css" />

    <style>
        .select2-dropdown {
            top: 10px !important;
            left: 1px !important;}
    </style>
</head>

<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Stores Requisition</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">


                    <div class="col-lg-12">
                        <div class="container">

                            <form method="post" id="user_form">

                                <?php
                                include('db_connector.php');

                                $id = intval($_GET['req_number']);


                                $selectUserl = "SELECT r.date,m.item_name,d.item_name,d.qty,b.first_name,p.depot_name
                                                FROM req r
                                                JOIN req_items d ON r.req_number = d.req_number 
                                                JOIN items m ON m.item_id = d.item_name 
                                                JOIN member b ON b.member_id = r.user
                                                JOIN depot p ON p.depot_id=r.depot
                                                WHERE r.req_number= $id";



                                $resultl = mysqli_query($con,$selectUserl);
                                $countl = mysqli_num_rows($resultl);




                                ?>
                                <div class="form-group">
                                    <label for="req_id">Requestion ID</label>
                                    <input class="form-control" name="req_id" type="text" value="<?php echo $id;?>" id="req_id" readonly >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date</label>
                                    <input class="form-control" name="date" id="date" type="Date" value="<?php echo $date;?>"   >
                                </div>

                                <div class="form-group">
                                    <label for="bookCato">Officer</label>
                                    <input class="form-control" name="user" id="user" type="text" value="<?php echo $user;?>" >


                                </div>

                                <div class="form-group">
                                    <label for="bookCatoll">Depot Name</label>
                                    <input class="form-control" name="depot" id="depot" type="text" value="<?php echo $depot;?>" >

                                </div>




                                <div class="table-responsive">
                                    <?php
                                    //Include database configuration file
                                    include('db_connector.php');

                                    //Get all Main Category data
                                    $query = $con->query("SELECT * FROM main_cato ORDER BY cat_name ASC");

                                    //Count total number of rows
                                    $rowCount = $query->num_rows;
                                    ?>
                                    <div class="form-group">
                                        <label for="exampleSelect1">Main Category</label>
                                        <select name="country" id="country" class="form-control">
                                            <option value="">Select Main Category</option>
                                            <?php
                                            if($rowCount > 0){
                                                while($row = $query->fetch_assoc()){
                                                    echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
                                                }
                                            }else{
                                                echo '<option value="">Main Category not available</option>';
                                            }
                                            ?>
                                        </select>

                                    </div>


                                    <div class="form-group">
                                        <label for="exampleSelect1">Sub Category</label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="">Select Sub Category first</option>
                                        </select>
                                    </div>



                                    <br>

                                    <table class="table table-striped table-bordered" id="user_data">

                                        <tr>
                                            <th>Item Code</th>
                                            <th>Quantity</th>
                                            <th>Details</th>
                                            <th>Remove</th>
                                        </tr>
                                        <?php
                                        $count = mysqli_num_rows($resultl);
                                        $itemCount = 1;

                                        if ($count > 0) {
                                            while ($row = mysqli_fetch_array($resultl)) {


                                                $item = $row['item_name'];
                                                $qty = $row['qty'];



                                                ?>


                                        <tr>

                                            <td hidden><input class="form-control" name="id[]" type="text" id="id[]" readonly value="<?php echo $id; ?>" ></td>
                                            <td><p><?php echo $item; ?></p></td>
                                            <td><p><?php echo $qty; ?></p></td>



                                        </tr>

                                        <?php
                                        $itemCount++;
                                        }
                                        } else {
                                            echo 'No records found';
                                        }

                                        ?>


                                    </table>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Remarks</label>
                                        <textarea class="form-control" name="remarks" id="remarks" rows="3"></textarea>
                                    </div>
                                </div>

                                <div align="center">
                                    <input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br />

    <div id="user_dialog" title="Add Data">
        <div class="form-group">
            <label for="country">Item Description</label>
            <select name="first_name" id="first_name"">
            <option value="">Select Sub Category first</option>
            </select>
            <span id="error_first_name" class="text-danger"></span>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="text" name="last_name" id="last_name" class="form-control" />
            <span id="error_last_name" class="text-danger"></span>
        </div>
        <div class="form-group" align="center">
            <input type="hidden" name="row_id" id="hidden_row_id" />
            <button type="button" name="save" id="save" class="btn btn-info">Save</button>
        </div>
    </div>
    <div id="action_alert" title="Action">

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script>
        $("#first_name").select2( {
            placeholder: "Select Items",
            allowClear: true
        } );
    </script>




</main>
</body>
</html>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<!-- Google analytics script-->
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

</script>
<script>
    $(document).ready(function(){

        var count = 0;

        $('#user_dialog').dialog({
            autoOpen:false,
            width:400
        });

        $('#add').click(function(){
            $('#user_dialog').dialog('option', 'title', 'Add Data');
            $('#first_name').val('');
            $('#last_name').val('');
            $('#error_first_name').text('');
            $('#error_last_name').text('');
            $('#first_name').css('border-color', '');
            $('#last_name').css('border-color', '');
            $('#save').text('Save');
            $('#user_dialog').dialog('open');
        });

        $('#save').click(function(){
            var error_first_name = '';
            var error_last_name = '';
            var first_name = '';
            var last_name = '';
            if($('#first_name').val() == '')
            {
                error_first_name = 'First Name is required';
                $('#error_first_name').text(error_first_name);
                $('#first_name').css('border-color', '#cc0000');
                first_name = '';
            }
            else
            {
                error_first_name = '';
                $('#error_first_name').text(error_first_name);
                $('#first_name').css('border-color', '');
                first_name = $('#first_name').val();
            }
            if($('#last_name').val() == '')
            {
                error_last_name = 'Last Name is required';
                $('#error_last_name').text(error_last_name);
                $('#last_name').css('border-color', '#cc0000');
                last_name = '';
            }
            else
            {
                error_last_name = '';
                $('#error_last_name').text(error_last_name);
                $('#last_name').css('border-color', '');
                last_name = $('#last_name').val();
            }
            if(error_first_name != '' || error_last_name != '')
            {
                return false;
            }
            else
            {
                if($('#save').text() == 'Save')
                {
                    count = count + 1;
                    output = '<tr id="row_'+count+'">';
                    output += '<td>'+first_name+' <input type="hidden" name="hidden_first_name[]" id="first_name'+count+'" class="first_name" value="'+first_name+'" /></td>';
                    output += '<td>'+last_name+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" value="'+last_name+'" /></td>';
                    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
                    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
                    output += '</tr>';
                    $('#user_data').append(output);
                }
                else
                {
                    var row_id = $('#hidden_row_id').val();
                    output = '<td>'+first_name+' <input type="hidden" name="hidden_first_name[]" id="first_name'+row_id+'" class="first_name" value="'+first_name+'" /></td>';
                    output += '<td>'+last_name+' <input type="hidden" name="hidden_last_name[]" id="last_name'+row_id+'" value="'+last_name+'" /></td>';
                    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
                    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
                    $('#row_'+row_id+'').html(output);
                }

                $('#user_dialog').dialog('close');
            }
        });

        $(document).on('click', '.view_details', function(){
            var row_id = $(this).attr("id");
            var first_name = $('#first_name'+row_id+'').val();
            var last_name = $('#last_name'+row_id+'').val();
            $('#first_name').val(first_name);
            $('#last_name').val(last_name);
            $('#save').text('Edit');
            $('#hidden_row_id').val(row_id);
            $('#user_dialog').dialog('option', 'title', 'Edit Data');
            $('#user_dialog').dialog('open');
        });

        $(document).on('click', '.remove_details', function(){
            var row_id = $(this).attr("id");
            if(confirm("Are you sure you want to remove this row data?"))
            {
                $('#row_'+row_id+'').remove();
            }
            else
            {
                return false;
            }
        });

        $('#action_alert').dialog({
            autoOpen:false
        });

        $('#user_form').on('submit', function(event){
            event.preventDefault();
            var count_data = 0;
            $('.first_name').each(function(){
                count_data = count_data + 1;
            });
            if(count_data > 0)
            {
                var form_data = $(this).serialize();
                $.ajax({
                    url:"./ajax/insert.php",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        $('#user_data').find("tr:gt(0)").remove();
                        $('#action_alert').html('<p>Data Inserted Successfully</p>');
                        $('#action_alert').dialog('open');
                    }
                })
            }
            else
            {
                $('#action_alert').html('<p>Please Add atleast one data</p>');
                $('#action_alert').dialog('open');
            }
        });

    });
</script>
<script>

    $(document).ready(function(){
        $('#country').on('change',function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'POST',
                    url:'./ajax/ajaxData.php',
                    data:'cat_id='+countryID,
                    success:function(html){
                        $('#state').html(html);
                        $('#first_name').html('<option value="">Select Sub Category first</option>');

                    }
                });
            }else{
                $('#state').html('<option value="">Select Main Category first</option>');
                $('#first_name').html('<option value="">Select Sub Category first</option>');
            }
        });

        $('#state').on('change',function(){
            var stateID = $(this).val();
            if(stateID){
                $.ajax({
                    type:'POST',
                    url:'./ajax/ajaxData.php',
                    data:'sub_id='+stateID,
                    success:function(html){
                        $('#first_name').html(html);
                    }
                });
            }else{
                $('#first_name').html('<option value="">Select Sub Category first</option>');
            }
        });



    });

</script>