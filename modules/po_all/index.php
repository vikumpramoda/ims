<?php
//po_all
include('db_connector.php');

$member_id  = $_SESSION['member_id'];
$depot_id  = $_SESSION['depot_id'];
$query = "SELECT m.first_name , g.pur_id,g.pur_date,s.sup_name
          FROM purchase g
          INNER JOIN member m on m.member_id = g.user
          JOIN stock_supplier s ON s.sup_id = g.supplier
          where m.depot_id= $depot_id ORDER BY pur_id DESC";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>GRN</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



</head>
<script type="text/javascript">


    $(document).ready(function() {
        loadCombo();
    });

    function loadCombo(){
        var items="";

        $.getJSON("./ajax/grn_item.php",function(data){
            items+="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items+="<option name='item_name' value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#item_name").html(items);
        });


    }
</script>
<body>



<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Purchase Order Table</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div align="right">

                </div>
                <br />
                <div class="row">
                    <div>

                    </div>

                    <div class="col-lg-12" id="employee_table">

                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th width="20%">PO ID</th>
                                <th width="20%">PO Date</th>
                                <th >Supplier</th>
                                <th >Officer</th>
                                <th width="10%">Details</th>


                            </tr>
                            </thead>
                            <?php

                            while($row = mysqli_fetch_array($result))
                            {
                                ?>

                                <tr>
                                    <td><?php echo $row["pur_id"]; ?></td>
                                    <td><?php echo $row["pur_date"]; ?></td>
                                    <td><?php echo $row["sup_name"]; ?></td>
                                    <td><?php echo $row["first_name"]; ?></td>
                                    <td><input type="button" name="view" value="Details" id="<?php echo $row["pur_id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>



<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
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
</body>
</html>

<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"> Add GRN </h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>


            <div class="modal-body ">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Purchase Order Details</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body" id="employee_detail">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#insert_form').on("submit", function(event){
            event.preventDefault();
            if($('#name').val() == "")
            {
                alert("Invoice Number is required");
            }

            else
            {
                $.ajax({
                    url:"add_newGrn.php",
                    method:"POST",
                    data:$('#insert_form').serialize(),
                    beforeSend:function(){
                        $('#insert').val("Inserting");
                    },
                    success:function(data){
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#employee_table').html(data);
                    }
                });
            }
        });




        $(document).on('click', '.view_data', function(){
            //$('#dataModal').modal();
            var employee_id = $(this).attr("id");
            $.ajax({
                url:"./ajax/po_all.php",
                method:"POST",
                data:{employee_id:employee_id},
                success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal('show');
                }
            });
        });
    });
</script>


