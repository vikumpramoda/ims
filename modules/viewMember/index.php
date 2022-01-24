
<?php
//viwe member 
include('db_connector.php');

$member_id  = $_SESSION['member_id'];

?>
<html>
<head>

</head>
<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Members</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Members</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">



                    <div class="col-lg-12">

                    <table class="table table-hover table-bordered" id="sampleTable"> 
                            <thead>
                            <tr> 
                            <th>Member ID</th> 
                            <th>NIC </th> 
                            <th>First Name</th> 
                            <th>Last Name</th> 
                            <th>DOB</th> 
                            <th>Address</th>  
                            <th>Member Category ID</th>
                            <th>User Name</th> 
                            <th>Email</th>  
                            <th>Update</th>
                            <th>Delete</th>  
                            </tr> 
                            </thead>

                        <?php
                        include('db_connector.php');


                        $queryl = "SELECT `member_id`,`NIC`,`first_name`,`last_name`,`DOB`,`address`,`member-category_id`,`User_name`,`email`,`depot_id`,`region_id` from `member`  ";
                        $resultl = mysqli_query($con,$queryl);
                        

                        if (mysqli_num_rows($resultl) > 0) {
                            while($row = mysqli_fetch_assoc($resultl)) {?>
                                <tr> 
                                <td style="width:1%"> <?php echo $row['member_id'];?> </td>
                                <td> <?php echo $row["NIC"];?> </td>
                                <td> <?php echo $row["first_name"];?> </td> 
                                <td> <?php echo $row["last_name"];?> </td>
                                <td> <?php echo $row["DOB"];?> </td>
                                <td> <?php echo $row["address"];?> </td>
                                <td style="width:10%"> <?php echo $row["member-category_id"];?> </td> 
                                <td> <?php echo $row["User_name"];?> </td>
                                <td> <?php echo $row["email"];?> </td>
                                
                                <td> 
                                <a href="updateMember2.php?member_id=<?php echo $row['member_id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker">Edit</i>
                                </a>
                                </td>
                                <td>
                                <a href="deleteMember.php?member_id=<?php echo $row['member_id']?>" class="btn btn-danger">
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




