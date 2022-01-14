<?php
//stock 
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
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/jquery.min.js"></script>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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
<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1 class="text-center"><i class="fa fa-edit"></i><b> <?php echo $depot_name;?> Stock Availability</b></></h1>

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

                        <div>


                        </div>

                        <?php

                        }
                        }

                        ?>
                        <?php
                        include('db_connector.php');


                        $depot_id = $_SESSION['depot_id'];


                        $queryl = "select i.item_name , m.stock_level
                                    from main_stock m
                                    JOIN items i on i.item_id = m.item_id
                                    JOIN depot d on d.depot_id = m.depot_id
                                    where m.depot_id = $depot_id 
                                    GROUP BY i.item_name ";

                        $resultl = mysqli_query($con,$queryl);
                        $countl  = mysqli_num_rows($resultl);



                        if ($resultl->num_rows > 0) {
                            echo " <table class=\"table table-hover\" id=\"req\"> <tr> <th>Item Name</th><th>Available Quantity</th></tr> ";
                            // output data of each row
                            while($row = $resultl->fetch_assoc()) {
                                echo "<tr> <td>" . $row["item_name"]. "</td> <td>" . $row["stock_level" ]. "</td></tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "0 results";
                        }
                        ?>


                    </div>
                </div>
            </div>

        </div>
    </div>



</main>


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

