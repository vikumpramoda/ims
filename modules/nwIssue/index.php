<!DOCTYPE html>
<?php
include('db_connector.php');
//nwIssue
$member_id  = $_SESSION['member_id'];
$depot  = $_SESSION['depot_id'];
?>
<html lang="en">
<head>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</head>





<form name="add_pur" method="POST" id="add_pur">
    <div class="row">
        <div class="col-12 table-responsive">

            <div class="form-group">
                <?php
                //Include database configuration file
                include('db_connector.php');

                //Get all Main Category data
                //$query = $con->query("select DISTINCT s.sub_name  from req_items r,items i,sub_cato s where r.complete is NULL and r.item_name = i.item_id and i.sub_id = s.sub_id ");

                $query = $con->query("select rq.req_number from items i
                                              JOIN req_items r on r.item_name = i.item_id
                                              JOIN req rq on r.req_number = rq.req_number
                                              JOIN main_stock m on m.item_id = r.item_name
                                              WHERE i.status = 'common' and r.status = 'approved' and r.qty < m.stock_level  and m.depot_id ='$depot' and r.av is null
                                              GROUP BY rq.req_number
                                        ");

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
                                echo '<option value="'.$row['req_number'].'">'.$row['req_number'].'</option>';
                            }
                        }else{
                            echo '<option value="">Requisitions Not Available</option>';
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
                <div id="an" name="an">





                </div>

            </div>


        </div>
    </div>




    </section>
</form>


<script>

    $(document).ready(function(){
        $('#country').on('change',function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'POST',
                    url:'./ajax/itemIssue.php',
                    data:'req_number='+countryID,
                    success:function(html){
                        $('#an').html(html);

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