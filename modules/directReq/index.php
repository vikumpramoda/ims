<!DOCTYPE html>
<?php
include('db_connector.php');
//directReq
$member_id  = $_SESSION['member_id'];

?>
<html lang="en">
<head>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</head>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Direct Purchasing Items</h1>

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

                        <form name="add_pur" method="POST" id="add_pur">
                            <div class="row">
                                <div class="col-12 table-responsive">

                                    <div class="form-group">
                                        <?php
                                        //Include database configuration file
                                        include('db_connector.php');

                                        //Get all Main Category data
                                        //$query = $con->query("select DISTINCT s.sub_name  from req_items r,items i,sub_cato s where r.complete is NULL and r.item_name = i.item_id and i.sub_id = s.sub_id ");

                                        $query = $con->query("select sc.sub_name, sc.sub_id from sub_cato sc
                                        JOIN items i on i.sub_id = sc.sub_id
                                  
                                        JOIN req_items r on r.item_name = i.item_id
                                        WHERE i.status = 'direct' and r.status = 'approved'
                                        GROUP BY sc.sub_name");

                                        //Count total number of rows
                                        $rowCount = $query->num_rows;
                                        ?>
                                        <h5 class="text-right">Date:<?php echo date('Y-m-d');?></h5>
                                        <div class="form-group">
                                            <label for="exampleSelect1">Request Categories</label>
                                            <select name="country" id="country" class="form-control">
                                                <option value="">Select Category</option>
                                                <?php
                                                if($rowCount > 0){
                                                    while($row = $query->fetch_assoc()){
                                                        echo '<option value="'.$row['sub_id'].'">'.$row['sub_name'].'</option>';
                                                    }
                                                }else{
                                                    echo '<option value="">Category not available</option>';
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
                                        <h3 class="tile-title">Request Items</h3>
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
</main>
<script>

    $(document).ready(function(){
        $('#country').on('change',function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'POST',
                    url:'./ajax/directReq.php',
                    data:'sub_id='+countryID,
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