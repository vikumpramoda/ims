<?php
//approve
include('db_connector.php');

$member_id  = $_SESSION['member_id'];


?>

<!-- The javascript plugin to display page loading on top-->
<html>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/jquery.min.js"></script>


        <link href="css/style.css" rel="stylesheet" type="text/css">

        <script src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
<script type="text/javascript"></script>


<script type="text/javascript">

    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"./ajax/fetch.php",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });


    function showRow(row)
    {
        var x=row.cells;
        document.getElementById("custID").value = x[0].innerHTML;
        document.getElementById("fname").value = x[1].innerHTML;
        document.getElementById("lname").value = x[2].innerHTML;

    }




    function searchBook(){
        var items="";
        $.get("./ajax/approve.php"
            +'?cat1='+custID.value
            ,function(data){

                $("#ans").html(data);
            });
    }

</script>
<body>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Requisition</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Requisition</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">

                <div class="col-sm-6">



                    <table class="table table-striped table-hover" id="main">
                        <thead>
                        <tr>
                            <th>Requisition ID</th>
                            <th>Request Date</th>
                            <th>Request Officer</th>



                        </tr>
                        </thead>



                        <tbody id="result">

                        </tbody>
                    </table>
                    <div class="paging_link"></div>
                </div>
                <div class="col-sm-6">
                    <form class="form-horizontal" method="post"  name="add_item" id="add_item">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Requisition ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="custID"  placeholder="Requisition ID" name="custID" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Request Date</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" required placeholder="Request Date" name="fname" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Officer</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lname" required placeholder="Officer" name="lname" >
                            </div>
                        </div>

                        <div hidden class="form-group">
                            <label class="control-label col-sm-3">Approver</label>
                            <div class="col-sm-9">
                                <input class="form-control"  id="member_id" name="member_id" type="text" value="<?php echo $member_id; ?>"  readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-outline-success" name="submit" id="submit">Approve</button>
                                <button type="submit" class="btn btn-outline-fail" name="fail" id="fail">Decline</button>


                               <button type="button" class="btn btn-primary" onclick="searchBook()" name="submit">View</button>
                            </div>
                        </div>
                    </form>

                    <div class="tile">
                        <h3 align="center" class="tile-title">Item Details</h3>
                        <div id="ans"> </div>

                    </div>

                </div>

                </div>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->


<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
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


</body>
</html>
<script>
    $('#submit').click(function(){
        $.ajax({
            url:"./ajax/aApp.php",
            method:"POST",
            data:$('#add_item').serialize(),
            success:function(data)
            {
                alert(data);


            }
        });
    });

</script>
<script>
    $('#fail').click(function(){
        $.ajax({
            url:"./ajax/aFail.php",
            method:"POST",
            data:$('#add_item').serialize(),
            success:function(data)
            {
                alert(data);


            }
        });
    });

</script>

