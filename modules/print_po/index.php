<?php
include('db_connector.php');
include ('validateSession.php');
//print_po

$member_id  = $_SESSION['member_id'];
$NIC		=	$_SESSION['NIC'];
$first_name	=		$_SESSION['first_name'];
$last_name	=		$_SESSION['last_name'];
$session_id	=		$_SESSION['session'];
$member_category_id	       = $_SESSION['member-category_id'];
$email =  $_SESSION['email'];


if($member_category_id == '1'){
?>

<html>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
The javascript plugin to display page loading on top
<script src="js/plugins/pace.min.js"></script>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i><b>To be complete POs</b></h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home fa-lg"></i></a></li>


        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">

                        <?php
                        include('db_connector.php');

                        //$limit = 100;
                        //if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                        //$start_from = ($page-1) * $limit; LIMIT $start_from,$limit QUERY


                        $queryl = "select * from purchase p, stock_supplier m where  p.supplier = m.sup_id and p.status = 'processing' ORDER BY p.pur_id DESC ";
                        $resultl = mysqli_query($con,$queryl);
                        $countl  = mysqli_num_rows($resultl);


                        if ($resultl->num_rows > 0) {
                            echo " <table class=\"table table-hover table-bordered\" id=\"sampleTable\"> 
                                   <thead> 
                                   <tr> 
                                   <th>PO Number</th> 
                                   <th>Date </th> 
                                   <th>Supplier</th> 
                                   <th>Action</th> 
                                   </tr> 
                                   </thead> ";
                            // output data of each row
                            while($row = $resultl->fetch_assoc()) {
                                echo "<tr> 
                                      <td>PO_" . $row["pur_id"]. "</td>
                                      <td>" . $row["pur_date"]. "</td>
                                      <td>" . $row["sup_name"]. "</td> 
                                      <td><a href='print_view.php?pur_id=".$row['pur_id']."'><i class=\"fa fa-print\" style=\"font-size:26px;\">   </i>    Print Here</a></td>
                                      </tr>";
                            }

                            echo "</table>";

                        } else {
                            echo "0 results";
                        }

                       /* $queryl = "SELECT COUNT(pur_id) FROM purchase";
                        $resultl = mysqli_query($con, $queryl);
                        $row = mysqli_fetch_row($resultl);
                        $total_records = $row[0];
                        $total_pages = ceil($total_records / $limit);
                        $k = (($page+4>$total_pages)?$total_pages-4:(($page-4<1)?5:$page));
                        $pagLink = "";
                        echo "<div class=\"bs-component\" > <ul class=\"pagination\" > ";
                        if($page>=2){

                            echo "<li class=\"\"><a class=\"page-link\" href=\"print_po.php?page=1\"><<</a></li> ";
                            echo "<li class=\"\"><a class=\"page-link\" href=\"print_po.php?page=".($page-1)."\"><</a></li> ";
                        }

                        for ($i=-4; $i<=4; $i++) {
                            if($k+$i==$page)
                            $pagLink .= "
                            <li class=\"page-item active\"><a class=\"page-link\" href='print_po.php?page=".($k+$i)."'>".($k+$i)."</a></li>
                            ";
                            else
                            $pagLink .= "
                            <li class=\"page-item\"><a class=\"page-link\" href='print_po.php?page=".($k+$i)."'>".($k+$i)."</a></li>
                            ";

                        };

                        echo $pagLink;
                        if($page<$total_pages){
                            echo "<li class=\"\"><a class=\"page-link\" href=\"print_po.php?page=".($page+1)."\">></a></li>";
                            echo "<li class=\"\"><a class=\"page-link\" href=\"print_po.php?page=".$total_pages."\">>></a></li>";
                        }
                        echo " </ul> </div>";
                        ?>

                        <div class="inline col-md-2">

                            <input class="form-control" id="pn" type="number" min="1" max="<?php echo $total_pages?>" placeholder="<?php echo $page."/".$total_pages; ?>" size="" required>
                            <button class="btn primary" onclick="go2Page();">Go</button>

                        </div>*/
                       ?>
                    </div>
                </div>
            </div>
            <script>
                function go2Page()
                {
                    var pn = document.getElementById("pn").value;
                    pn = ((pn><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((pn<1)?1:pn));
                    window.location.href = 'print_po.php?page='+pn;
                }
            </script>



                    </div>
                </div>
            </div>

        </div>
    </div>



</main>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
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
<?php }
else {
    header("Location: dashboard.php");
}
?>