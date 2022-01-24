<?php
//view supplier Vikum Pramoda 2021-12-31
include('db_connector.php');
$member_id  = $_SESSION['member_id'];
?>


<html>
<head>
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</head>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i><b>View Suppliers</b></h1>

        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home fa-lg"></i></a></li>

        </ul>
    </div>
    <div class="row">
        <div class="col-md-06">
            <div class="tile">
            
                <div class="row">
                    <div class="col-lg-06"  id="employee_table">
                        
                            <table class="table table-hover table-bordered" id="sampleTable"> 
                            <thead>
                            <tr> 
                            <th>Supplier ID</th> 
                            <th>Supplier Name </th> 
                            <th>Supplier Address</th> 
                            <th>Contact Number</th> 
                            <th>Supplier Email</th> 
                            <th>Date</th>  
                            <th>Update</th>
                            <th>Delete</th>   
                            </tr> 
                            </thead>
                            

                            <?php
                        include('db_connector.php');


                            $queryl = "SELECT `sup_id`,`sup_name`,`sup_address`,`saddress`,`taddress`,`faddress`,`sup_contact`,`sup_email`,`sdate` FROM `supplier`  ";
                            $resultl = mysqli_query($con,$queryl);
                            
                            if (mysqli_num_rows($resultl) > 0) {
                            while($row = mysqli_fetch_assoc($resultl)) {?>
                                <tr> 
                                <td style="width:1%"> <?php echo $row['sup_id'];?> </td>
                                <td> <?php echo $row["sup_name"];?> </td>
                                <td> <?php echo $row["sup_address"];?> , <?php echo $row["saddress"];?> , <?php echo $row["taddress"];?> , <?php echo $row["faddress"];?> </td> 
                                <td> <?php echo $row["sup_contact"];?> </td>
                                <td> <?php echo $row["sup_email"];?> </td>
                                <td style="width:10%"> <?php echo $row["sdate"];?> </td> 
                                <td> 
                                <a href="updateSupplier.php?sup_id=<?php echo $row['sup_id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker">Edit</i>
                                </a>
                                </td>
                                <td>
                                <a href="deleteSupplier.php?sup_id=<?php echo $row['sup_id']?>" class="btn btn-danger">
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



</main>

<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>


<!-- Data table plugin-->
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
<!-- Page specific javascripts-->
<!-- Page specific javascripts-->
<!-- Google analytics script-->
<script src="js/plugins/pace.min.js"></script>

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
