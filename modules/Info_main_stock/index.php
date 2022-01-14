<?php
// More info main stock -   vikum 
include('db_connector.php');

$member_id  = $_SESSION['member_id'];
?>



<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
The javascript plugin to display page loading on top
<script src="js/plugins/pace.min.js"></script>

<script>
    $(document).ready(function() {
        loadCombo();
    });
    $(document).ready(function() {
        loadCom();
    });


    function loadCombo(){
        var items="";

        $.getJSON("./ajax/aRegion.php",function(data){
            items="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items="<option name='bookCatol' value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCatol").html(items);
        });
        $.getJSON("./ajax/aDepot.php",function(data){
            items="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items="<option name='bookCatoll' value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCatoll").html(items);
        });

    }
    function loadCom() {
        var items = "";
        $.getJSON("./ajax/aSup.php", function (data) {
            items += "<option value='0'>Supplier Name</option>";
            $.each(data, function (index, item) {
                items += "<option name='sup_id' value='" + item.ID + "'>" + item.Name + "</option>";
            });
            $("#sup_id").html(items);
        });
    }
</script>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Current Stock Items </h1>

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



                    <div class="col-lg-11">
                        <form class="form" method="post" >
                            <?php
                            include('db_connector.php');

                            $id = intval($_GET['id']);

 
                            $selectUserl = "SELECT d.stockId, d.id,d.serial,d.date,m.item_name,m.item_id
                            FROM main_stock_item d
                            
                            INNER JOIN items m ON m.item_id = d.item_name
                            
                             WHERE d.id= $id";

                            $resultl = mysqli_query($con,$selectUserl);
                            $countl = mysqli_num_rows($resultl);

                            if($countl == 1){
                                while($row = mysqli_fetch_array($resultl)){


                                    $item_id       = $row['item_name'];
                                    $serial       = $row['serial'];
                                    $date       = $row['date'];
                                    $item = $row['item_id'];


                                    

                                }
                            }

                            ?>
                            <div class="form-group">
                                <label for="stock_id">Item  ID</label>
                                <input class="form-control" name="stock_id" type="text" value="<?php echo $id;?>" id="stock_id" readonly >
                            </div>


                        <div>


                            <?php



                            if ($resultl->num_rows > 0) {
                                echo " <table class=\"table table-hover\" id=\"stockItem\">
                                        <tr> 
                                        <th>Item name</th>  
                                        <th>Serial Number </th> 
                                        <th> Date </th> 
                                        <th> Barcode </th> 
                                        </tr> ";
                                // output data of each row
                                while($row = $resultl->fetch_assoc()) {


                                    echo "<tr> 
                                          <td><textarea class=\"form-control\" name=\"item_id[]\" type=\"text\" value=" . $row["item_name"]. " id=\"item_id[]\" readonly>". $row["item_name"]."</textarea></td> 
                                          <td><input class=\"form-control\" name=\"serial[]\" type=\"text\" value=" . $row["serial"]. " id=\"serial[]\" ></td>
                                          <td><input class=\"form-control\" name=\"serial[]\" type=\"text\" value=" . $row["date"]. " id=\"date[]\" ></td>
                                           <td><input class=\"form-control\" name=\"item_name[]\" type=\"text\" value=" . $row["item_id"]. " id=\"item_name[]\" hidden readonly></td> 
                                           <td> <a href='generate_barcode_index.php?stockId=".$row['stockId']."' class=\"btn btn-small btn-info\" ><i class=\"icon-info-sign\"></i>Generate Barcode </a> </td>
 

                                           </tr>";


                                }

                                echo "</table>";
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </div>




                            <div class="tile-footer">



                                <a class="btn btn-danger icon-btn float-right" href="view_current_stock.php" ><i class="fa fa-times"></i>Cancel</a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
</main>

<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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


