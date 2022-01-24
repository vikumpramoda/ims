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
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Search Category</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Search Category</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">

                    <div class="col-lg-11">

                    <form name="myForm" method="POST">
                        <div class="row">
                            <div class="col-12 table-responsive">

                                <div class="form-group">
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
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">

                                <div class="tile">
                                    <h3 class="tile-title">Categories</h3>
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
                    url:'./ajax/ajaxDataCat.php',
                    data:'cat_id='+countryID,
                    success:function(html){
                        $('#ans').html(html);

                    }
                });
            }
        });

    });
</script>

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