<html>
<!-- view po -->
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


                        $queryl = "select * from purchase p, member m where  p.user = m.member_id and p.status = 'incomplete' ";
                        $resultl = mysqli_query($con,$queryl);
                        $countl  = mysqli_num_rows($resultl);

                        if ($resultl->num_rows > 0) {
                            echo " <table class=\"table table-striped id=\"req\"> 
                                   <thead> 
                                   <tr> 
                                   <th>PO Number</th> 
                                   <th>Date </th> 
                                   <th>User</th> 
                                   <th>Action</th> 
                                   </tr> 
                                   </thead> ";
                            // output data of each row
                            while($row = $resultl->fetch_assoc()) {
                                echo "<tr> 
                                      <td>PO_" . $row["pur_id"]. "</td>
                                      <td>" . $row["pur_date"]. "</td>
                                      <td>" . $row["first_name"]. "</td> 
                                      <td><a href='generate_po.php?pur_id=".$row['pur_id']."'><i class=\"fa fa-get-pocket\" style=\"font-size:26px;\">   </i>    Complete Here</a></td>
                                      </tr>";
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