
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

                        <?php
                        include('db_connector.php');


                        $queryl = "select `member_id`,`NIC`,`first_name`,`last_name`,`DOB`,`address`,`member-category_id`,`User_name`,`email`,`depot_id`,`region_id` from `member`  ";
                        $resultl = mysqli_query($con,$queryl);
                        $countl  = mysqli_num_rows($resultl);

                        ?>

                        <?php

                        $countl = mysqli_num_rows($resultl);

                        if ($resultl->num_rows > 0) {
                            echo " <table class=\"table table-hover\" id=\"member\"> <tr> <th>Member ID</th> <th>NIC </th> <th>First Name</th> <th>Last Name</th> <th>DOB</th> <th>Address</th> <th>Member Category ID</th> <th>User Name</th> <th>Email</th>  </tr> ";
                            // output data of each row
                            while($row = $resultl->fetch_assoc()) {
                                echo "<tr> <td>" . $row["member_id"]. "</td><td>" . $row["NIC"]. "</td><td>" . $row["first_name"]. "</td> <td>" . $row["last_name"]. "</td><td>" . $row["DOB"]. "</td><td>" . $row["address"]. "</td><td>" . $row["member-category_id"]. "</td><td>" . $row["User_name"]. "</td><td>" . $row["email"]. "</td>  </tr>";
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
<!-- Page specific javascripts-->
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
