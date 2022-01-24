<html><?php

include('db_connector.php');
// view member form
$member_id  = $_SESSION['member_id'];

?>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>

<script>
    $(document).ready(function() {
        loadCombo();
    });



    function loadCombo(){
        var items="";

        $.getJSON("./ajax/aRegion.php",function(data){
            items="<option value='0'></option>";
            $.each(data,function(index,item)
            {

                items="<option value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCatol").html(items);
        });

        $.getJSON("./ajax/aDepot.php",function(data){
            items="<option value='0'></option>";
            $.each(data,function(index,item)
            {

                items="<option value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCatoll").html(items);
        });

    }

</script>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Profile</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Profile</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">

                    <div class="col-lg-11">

                        <?php
                        include('db_connector.php');

                        $member_id  = $_SESSION['member_id'];

                        $selectUser = "SELECT * FROM `member` WHERE member_id='$member_id'";

                        $result = mysqli_query($con,$selectUser);
                        $count = mysqli_num_rows($result);

                        if($count == 1){
                            while($row = mysqli_fetch_array($result)){

                                $member_id    = $row['member_id'];
                                $NIC         = $row['NIC'];
                                $first_name   = $row['first_name'];
                                $last_name      = $row['last_name'];
                                $address     = $row['address'];
                                $bookCatol      = $row['member-category_id'];
                                $User_name        = $row['User_name'];
                                $last_login       = $row['last_login'];
                                $email            = $row['email'];
                                $DOB            = $row['DOB'];
                            }
                        }
                        else{
                            header("Location: signin.php?msg=1");
                        }

                        ?>



                        <div class="form-group">

                            <label for="first_name">First Name</label>
                            <input class="form-control" name="fname" type="text" value="<?php echo $first_name; ?>" id="fname" readonly>

                        </div>
                        <div class="form-group">

                            <label for="last_name">Last Name</label>
                            <input class="form-control" name="lname" type="text" value="<?php echo $last_name; ?>" id="lname" readonly>

                        </div>

                        <div class="form-group">

                            <label for="DOB">Date Of Birth</label>
                            <input class="form-control" name="dob" type="text" value="<?php echo $DOB; ?>" id="dob" readonly>


                        </div>

                        <div class="form-group">

                            <label for="NIC">National Identity Card Number</label>
                            <input class="form-control" name="nic" type="text" value="<?php echo $NIC; ?>" id="nic" readonly>

                        </div>

                        <div class="form-group">

                            <label for="address">Permanent Address</label>
                            <input class="form-control" name="address" type="text" value="<?php echo $address; ?>" id="address" readonly>

                        </div>

                        <div class="form-group">

                            <label for="User_name">User Name</label>
                            <input class="form-control" name="uname" type="text" value="<?php echo $User_name; ?>" id="uname" readonly>

                        </div>

                        <div class="form-group">

                            <label for="email">Email</label>
                            <input class="form-control" name="ename" type="text" value="<?php echo $email; ?>" id="ename" readonly>

                        </div>
                        <div class="form-group">
                            <label for="bookCatol">Region Name</label>
                            <select id="bookCatol" class="form-control">
                                <option  value="<?php echo $bookCatol; ?>" readonly=""></option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="bookCatoll">Depot Name</label>
                            <select id="bookCatoll" class="form-control">
                                <option  value="<?php echo $bookCatoll; ?>" readonly=""></option>
                            </select>

                        </div>

                    </div>
                </div>


                <div class="tile-footer">
                    <div ><a class="btn btn-primary" href="updateInfo.php" target="_blank">EDIT</a></div>
                </div>

                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
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



