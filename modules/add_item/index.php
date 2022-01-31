<?php

include('db_connector.php');

$member_id  = $_SESSION['member_id'];

?>

<!-- The javascript plugin to display page loading on top-->
<html>
<body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        loadCombo();
    });



    function loadCombo() {
        var items="";

        $.getJSON("./ajax/aUnit.php",function(data){
            items+="<option value='0'>Select Unit</option>";
            $.each(data,function(index,item)
            {

                items+="<option value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCatol").html(items);
        });


    }


</script>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Add Items</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="add_item.php">Add Items</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">


                    <div class="col-lg-11">
                        <form class="form" method="post" id="add_item" name="add_item">

                            <div class="form-group">
                                <label >Item Name</label>
                                <input class="form-control" id="item_name" name="item_name"  type="text" placeholder="New Item Name" required>
                            </div>

                            <div class="form-group">
                                <label >Unit</label>
                                <select id="bookCatol" name="bookCatol" class="form-control">
                                    <option  value="0" readonly=""></option>
                                </select>

                            </div>

                            <?php
                            //Include database configuration file
                            include('db_connector.php');

                            //Get all country data
                            $query = $con->query("SELECT * FROM main_cato ORDER BY cat_name ASC");

                            //Count total number of rows
                            $rowCount = $query->num_rows;

                            ?>

                            <div class="form-group">
                                <label for="state">Item Type</label>
                                <select class="form-control" name="country" id="country" >
                                    <option value="">Select Item Type</option>
                                    <?php
                                    if($rowCount > 0){
                                        while($row = $query->fetch_assoc()){
                                            echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
                                        }
                                    }else{
                                        echo '<option value="">Types not available</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="country">Item Category</label>
                                <select class="form-control" name="state" id="state">
                                    <option value="">Select Item Type First</option>
                                </select>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="optionsRadios1" type="radio" name="optionsRadios" value="common" >Current Stock Item
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" id="optionsRadios2" type="radio" name="optionsRadios"  value="direct" >Direct Purchase Item
                                </label>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" id="submit" name="submit">Add Item</button>
                            </div>





                        </form>
                    </div>

                </div>


                <?php

                $query ="";
                $query = "select i.item_id,i.item_name,u.unit,s.sub_name from items i, unit u, sub_cato s WHERE i.unit = u.unit_id and i.sub_id = s.sub_id ORDER BY item_id DESC LIMIT 1";
                $result = mysqli_query($con,$query);
                $count  = mysqli_num_rows($result);



                ?>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Last Inserted Item</h1>
                        <table class="table table-hover">
                            <thead>
                            <tr>

                                <th>Item ID</th>
                                <th>Item Name</th>
                                <th>Unit</th>
                                <th>Item category</th>

                            </tr>
                            </thead>
                            <tbody>


                            <?php

                            $count = mysqli_num_rows($result);
                            $itemCount = 1;
                            if ($count > 0) {
                            while ($row = mysqli_fetch_array($result)) {

                            $id = $row['item_id'];
                            $name = $row['item_name'];
                            $unit = $row['unit'];
                            $category = $row['sub_name'];


                            ?>

                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $unit; ?></td>
                                <td><?php echo $category; ?></td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            }

            }
            ?>

                            <div class="tile-footer">
                                <a href="itemView.php">
                                    <button class="btn btn-success" > View Item List
                                    </button>
                                </a>    
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
    $(document).ready(function(){
        $('#country').on('change',function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'POST',
                    url:'./ajax/sel.php',
                    data:'cat_id='+countryID,
                    success:function(html){
                        $('#state').html(html);

                    }
                });
            }else{
                $('#state').html('<option value="">Select country first</option>');

            }
        });


    });
</script>
<script>
    $('#submit').click(function(){
        $.ajax({
            url:"./ajax/add_item.php",
            method:"POST",
            data:$('#add_item').serialize(),
            success:function(data)
            {
                alert(data);


            }
        });
    });

</script>