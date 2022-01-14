<!DOCTYPE html>
<?php
include('db_connector.php');
$member_id  = $_SESSION['member_id'];

?>
<html lang="en">
<head>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</head>
<style>
    .select2-dropdown {
        top: 10px !important;
        left: 1px !important;}
</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>GRN</h1>

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

                    <div class="col-lg-11">

                        <form name="add_grn" method="POST" id="add_grn">
                            <div class="row">
                                <div class="col-12 table-responsive">

                                    <div class="form-group">
                                        <?php
                                        //Include database configuration file
                                        include('db_connector.php');

                                        $depot  = $_SESSION['depot_id'];


                                        $query = $con->query("select p.pur_id from purchase p
                                        JOIN purchase_item i on i.pur_id = p.pur_id
                                        JOIN member m on m.member_id = p.user                                      
                                        WHERE  m.depot_id = $depot and i.status = 'approved' 
                                        GROUP BY p.pur_id");


                                        //Count total number of rows
                                        $rowCount = $query->num_rows;
                                        ?>
                                        <div class="form-group">
                                            <label for="exampleSelect1">Purchase Order ID</label>
                                            <select name="country" id="country" class="form-control">
                                                <option value="">Select PO ID</option>
                                                <?php
                                                if($rowCount > 0){
                                                    while($row = $query->fetch_assoc()){
                                                        echo '<option value="'.$row['pur_id'].'">'.$row['pur_id'].'</option>';
                                                    }
                                                }else{
                                                        echo '<option value="">PO not available</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 table-responsive">

                                    <div class="tile">
                                        <b><h3 class="tile-title">Purchase Order Items</h3></b>
                                        <div id="ans" name="ans">





                                        </div>

                                    </div>


                                </div>
                            </div>




                            </section>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="js/select2.min.js"></script>
            <script>
                $("#country").select2( {
                    placeholder: "Select Items",
                    allowClear: true
                } );
            </script>
</main>
<script>

    $(document).ready(function(){
        $('#country').on('change',function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'POST',
                    url:'./ajax/grn.php',
                    data:'pur_id='+countryID,
                    success:function(html){
                        $('#ans').html(html);

                    }
                });
            }
        });

    });
</script>
<!-- Essential javascripts for application to work-->


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