<?php
//rpt_view
include('db_connector.php');

$member_id  = $_SESSION['member_id'];
$depot_id  = $_SESSION['depot_id'];

$query = "SELECT q.req_number ,q.date ,q.user ,m.first_name 
            FROM req_items r
            INNER JOIN req q on q.req_number = r.req_number
            INNER JOIN member m on m.member_id = q.user
            where q.depot= $depot_id AND r.status = 'issue'
            GROUP BY q.req_number";

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
            <h1><i class="fa fa-th-list"></i>Receipt Orders</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <br />
                <div class="row">
                    <div>

                    </div>

                    <div class="col-lg-12" id="employee_table">

                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th width="10%">Requisition Number</th>
                                <th >Request Officer</th>
                                <th >Request Date</th>
                                <th width="10%">Details</th>


                            </tr>
                            </thead>
                            <?php

                            while($row = mysqli_fetch_array($result))
                            {
                                ?>

                                <tr>
                                    <td><?php echo $row["req_number"]; ?></td>
                                    <td><?php echo $row["first_name"];?></td>
                                    <td><?php echo $row["date"]; ?></td>
                                    <td><input type="button" name="view" value="Details" id="<?php echo $row["req_number"]; ?>" class="btn btn-info btn-xs view_data" /></td>
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

<!-- <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"> Add GRN </h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>


            <div class="modal-body ">
                <form method="post" id="insert_form">
                    <label>Invoice Number</label>
                    <input type="text" name="name" id="name" class="form-control name" />
                    <br />
                    <label>Remarks</label>
                    <input type="text" name="remarks" id="remarks" class="form-control remarks" />
                    <br />


                    <h4 align="center">Enter Item Details</h4>
                    <br />

                    <div class="table-repsonsive">
                        <span id="error"></span>
                        <table class="table table-bordered" id="item_table" >
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>

                                <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
                            </tr>
                        </table>

                    </div>


                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

-->
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Issued Details</h3>
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

        $(document).on('click', '.view_data', function(){
            //$('#dataModal').modal();
            var employee_id = $(this).attr("id");
            $.ajax({
                url:"./ajax/issR.php",
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



