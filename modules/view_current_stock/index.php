<?php
//view current stock - Vikum
include('db_connector.php');
$member_id  = $_SESSION['member_id'];

$selectUser = "SELECT *
	FROM `member` m ,depot d
	WHERE m.member_id='$member_id' and m.depot_id = d.depot_id";

$result = mysqli_query($con,$selectUser);
$count = mysqli_num_rows($result);

if($count == 1){
    while($row = mysqli_fetch_array($result)){

        echo $member_id  = $row['member_id'];
        echo $depot_id  = $row['depot_id'];
        echo $depot_name  = $row['depot_name'];

?>

<html>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="jquery.min.js"></script>
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
</script>

<script>
    function SerchStocks(){
        var items="";
        $.get("./ajax/view_current_stock.php"

            ,function(data){
                $("#ans").html(data);
            });
    }
</script>
<body>
<main class="app-content">
    <div class="app-title">
        <div>
            

            <h1 class="text-center"><i class="fa fa-edit"></i><b> <?php echo $depot_name;?> Current Stock List</b></h1>

            </div>




        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home fa-lg"></i></a></li>


        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">

                    <div class="col-lg-11">

                   


                       <!--  <button class="btn btn-primary btn-lg " type="submit" onclick="SerchStocks()" >Serch Current Stock</button> -->
                        

                        <?php

                        }
                        }

                        ?>
                        <div class="tile">
                            <h3 align="center" class="tile-title"> Stocks Table </h3>

                            
                            <!-- <div id="ans"> </div> -->
                        <!-- table -->


                        <table class="table table-hover table-bordered" id="sampleTable"> 
                            <thead>
                            <tr> 
                            <th>Stock Item ID</th> 
                            <th>Added Officer Name </th> 
                            <th>Added Date</th> 
                            <th>Remarks</th> 
                            <th>Info</th>
                            <th>Delete</th>   
                            </tr> 
                            </thead>
                            

                            <?php
                        include('db_connector.php');


                        $queryl = "SELECT *
                        FROM main_stock m
                        JOIN main_stock_item i ON m.id = i.id
                        JOIN member b ON b.member_id = m.user
                        WHERE m.depot = $depot_id AND m.approve IS NULL 
                        GROUP BY m.id ";

                        $resultl = mysqli_query($con,$queryl);
                            
                            if (mysqli_num_rows($resultl) > 0) {
                            while($row = mysqli_fetch_assoc($resultl)) {?>
                                <tr> 
                                <td style="width:1%"> <?php echo $row['id'];?> </td>
                                <td> <?php echo $row["first_name"];?> </td>
                                <td> <?php echo $row["date"];?> </td> 
                                <td> <?php echo $row["remarks"];?> </td>
                                
                                <td> 
                                <a href="info_main_stock.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker">More Info</i>
                                </a>
                                </td>
                                <td>
                                <a href="deleteSupplier.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt">Delete</i>
                                </a>
                                </td> 
                                </tr>
                                <?php }
                                } ?>
                                </table>
                        </div>

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

