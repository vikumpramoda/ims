<html><?php
include('db_connector.php');
//add member form

$member_id  = $_SESSION['member_id'];

?>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<script>
    $(document).ready(function() {
        loadCombo();
        loadCombo1();

    });


    function loadCombo(){
        var items="";

        $.getJSON("./ajax/memberJson.php",function(data){
            items+="<option value='0'>Select Category </option>";
            $.each(data,function(index,item)
            {
                items+="<option value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookcato").html(items);
        });

    }

</script>

<script type="text/javascript">

function loadCombo1() {
    $(document).ready(function () {
        $('#country').on('change', function () {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: 'POST',
                    url: 'region1.php',
                    data: 'region_id=' + countryID,
                    success: function (html) {
                        $('#state').html(html);
                        $('#city').html('<option value="">Select Region first</option>');
                    }
                });
            } else {
                $('#state').html('<option value="">Select Region First</option>');
                $('#city').html('<option value="">Select state first</option>');
            }
        });


    });

}

</script>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i><b> Member Details</b></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>

        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">



                    <div class="col-lg-11">
                        <form class="form" action="" id="add_name" name="add_name" method="post" >


                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control" id="first_name" name="first_name" type="text" pattern="[a-zA-Z\s]+" placeholder="First Name" required>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" id="last_name" name="last_name" type="text" pattern="[a-zA-Z\s]+" placeholder="Last Name" required>
                            </div>

                            <div class="form-group">
                                <label for="DOB">Date of Birth</label>
                                <input class="form-control" id="DOB" name="DOB" type="date" placeholder="Date of Birth"  max=<?php echo date('Y-m-d');?> required>
                            </div>

                            <div class="form-group">
                                <label for="NIC">National Identity Card Number</label>
                                <input class="form-control" id="NIC" name="NIC" type="text" placeholder="NIC" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control" id="address" name="address" type="text" placeholder="Address" required>
                            </div>

                            <div class="form-group">
                                <label for="bookcato">Select Category</label>
                                <select id="bookcato" name="bookcato" class="form-control">
                                    <option value="0">Please select Category</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="User_name">User name</label>
                                <input class="form-control" id="User_name" name="User_name" type="text" placeholder="User Name" required>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input class="form-control" id="Password" name="Password" type="password" pattern="/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input class="form-control" id="email" type="email" name="email"  placeholder="E-Mail Address" required>
                            </div>


                            <?php
                            //Include database configuration file
                            include('db_connector.php');

                            //Get all country data
                            $query = $con->query("SELECT * FROM region ORDER BY region_name ASC");

                            //Count total number of rows
                            $rowCount = $query->num_rows;
                            ?>
                            <div class="form-group">
                                <label for="country">Select Region</label>
                                <select id="country" name="country" class="form-control">
                                    <option value="">Please select Region</option>

                                    <?php
                                    if($rowCount > 0){
                                        while($row = $query->fetch_assoc()){
                                            echo '<option value="'.$row['region_id'].'">'.$row['region_name'].'</option>';
                                        }
                                    }else{
                                        echo '<option value="">Region not available</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="state">Select Depot</label>
                                <select id="state" name="state" class="form-control">
                                    <option value="">Please select Region first</option>
                                </select>
                            </div>


                            <div class="tile-footer">
                                <input class="btn btn-primary" type="submit" value="submit" id="submit" name="submit" >
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

<!-- Page specific javascripts-->
<!-- Google analytics script-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
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


<script>

    $('#submit').click(function(){
        $.ajax({
            url:"./ajax/memberAjax.php",
            method:"POST",
            data:$('#add_name').serialize(),
            success:function(data)
            {
                alert(data);


            }
        });
    });

</script>

