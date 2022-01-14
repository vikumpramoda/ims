<!DOCTYPE html>
<?php
include('db_connector.php');
//itemView
$member_id  = $_SESSION['member_id'];

?>
<html lang="en">
<head>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>

        $(document).ready(function() {
            loadCombo();
        });

        function searchBook(){
            var items="";
            $.get("./ajax/searchCat.php"
                +'?cat1='+bookCatol.value
                ,function(data){

                    $("#ans").html(data);
                });
        }



        function loadCombo() {
            var items = "";

            $.getJSON("./ajax/aCategory.php", function (data) {
                items += "<option value='0'>Select Category</option>";
                $.each(data, function (index, item) {
                    items += "<option name='bookCatol' value='" + item.ID + "'>" + item.Name + "</option>";
                });
                $("#bookCatol").html(items);
            });
        }



    </SCRIPT>
</head>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Items</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Items</a></li>
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
                                        $query = $con->query("SELECT * FROM sub_cato ORDER BY sub_name ASC");

                                        //Count total number of rows
                                        $rowCount = $query->num_rows;
                                        ?>
                                        <div class="form-group">
                                            <label for="exampleSelect1">Category</label>
                                            <select name="country" id="country" class="form-control">
                                                <option value="">Select Category</option>
                                                <?php
                                                if($rowCount > 0){
                                                    while($row = $query->fetch_assoc()){
                                                        echo '<option value="'.$row['sub_id'].'">'.$row['sub_name'].'</option>';
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
                    url:'./ajax/ajaxItem.php',
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