<?php
//Stock transfer - Vikum - 2021-12-14   module/index.php
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
                url:"./ajax/transferTable1.php",
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
        document.getElementById("remarks").value = x[2].innerHTML;
        document.getElementById("lname").value = x[3].innerHTML;
    }




    function searchBook(){
        var items="";
        $.get("./ajax/transferTable2.php"
            +'?cat2='+custID.value
            ,function(data){

                $("#ans").html(data);
            });
    }

</script>


<script>
    $(document).ready(function() {
        loadCombo();
        loadCombo1();

    });


    function loadCombo(){
        var items="";

        $.getJSON("./ajax/memberJson.php",function(data){
            items+="<option value='0'>Select Category </option>";
            $.each(data,function(index,item)
            {
                items+="<option value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookcato").html(items);
        });

    }

</script>

<script type="text/javascript">

function loadCombo1() {
    $(document).ready(function () {
        $('#country').on('change', function () {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: 'POST',
                    url: 'region1.php',
                    data: 'region_id=' + countryID,
                    success: function (html) {
                        $('#state').html(html);
                        $('#city').html('<option value="">Select Region first</option>');
                    }
                });
            } else {
                $('#state').html('<option value="">Select Region First</option>');
                $('#city').html('<option value="">Select state first</option>');
            }
        });


    });

}

</script>





<body>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Stock Transfer to Another Dipo</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Stock transfer</a></li>
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
                            <th>Stock ID</th>
                            <th>Item Added Date</th>
                            <th>Remarks</th>
                            <th>Item Added officer Name</th>



                        </tr>
                        </thead>



                        <tbody id="result">

                        </tbody>
                    </table>
                    <div class="paging_link"></div>
                </div>
                <div class="col-sm-6">
                    <!-- Form Form Form Form Form Form Form Form Form Start -->
                    <form class="form-horizontal" method="post"  name="add_item" id="add_item">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Stock ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="custID"  placeholder="Not Selected" name="custID" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Item Added Date</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" required placeholder="Not Selected" name="fname" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Item Added Officer Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lname" required placeholder="Not Selected" name="lname" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Remarks</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="remarks" required placeholder="Not Selected" name="remarks" >
                            </div>
                        </div>

                        <div hidden class="form-group">
                            <label class="control-label col-sm-3">Sender </label>
                            <div class="col-sm-9">
                                <input class="form-control"  id="member_id" name="member_id" type="text" value="<?php echo $member_id; ?>"  readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                               <button type="button" class="btn btn-primary" onclick="searchBook()" name="submit">View more ...</button>
                            </div>
                        </div>

                        
                    

                    <!-- TABLE2 -->
                    <div class="tile">
                        <h3 align="center" class="tile-title">Stock Item More Details</h3>
                        <div id="ans"> </div>
                    </div>



                    <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">   
                                <button type="submit" class="btn btn-outline-danger" name="fail" id="fail">Add to Broken Item List </button>
                            </div>
                        </div>
                    
                    <?php
                            //Include database configuration file
                            include('db_connector.php');

                            //Get all country data
                            $query = $con->query("SELECT * FROM region ORDER BY region_name ASC");

                            //Count total number of rows
                            $rowCount = $query->num_rows;
                            ?>
                            <div class="form-group">
                                <label for="country">Select Region</label>
                                <select id="country" name="country" class="form-control">
                                    <option value="">Please select Region</option>

                                    <?php
                                    if($rowCount > 0){
                                        while($row = $query->fetch_assoc()){
                                            echo '<option value="'.$row['region_id'].'">'.$row['region_name'].'</option>';
                                        }
                                    }else{
                                        echo '<option value="">Region not available</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            

                            <div class="form-group">
                                <label for="state">Select Depot</label>
                                <select id="state" name="state" class="form-control">
                                    <option value="">Please select Region first</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bookcato">Select Officer</label>
                                <select id="bookcato" name="bookcato" class="form-control">
                                    <option value="0">Please select Officer</option>
                                </select>
                            </div>


                            <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-outline-success" name="submit" id="submit">Transfer</button>
                
                            </div>
                        </div>
                        </form>

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
            url:"./ajax/transferUpdate.php",
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
            url:"./ajax/BrokenItems.php",
            method:"POST",
            data:$('#add_item').serialize(),
            success:function(data)
            {
                alert(data);
            }
        });
    });

</script>

