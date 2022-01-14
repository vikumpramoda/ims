<?php
//update member
include('db_connector.php');

$selectUser = "SELECT `member_id`, `NIC`, `first_name`, `last_name`, `DOB`, `address`, 
	`member_category_id`, `User_name`, `Password`, `last_login`, `email`
	FROM `member`
	WHERE `User_name`='Admin' AND `Password` = 'aa'";

$result = mysqli_query($con,$selectUser);
$count = mysqli_num_rows($result);

if($count == 1){
    while($row = mysqli_fetch_array($result)){

        echo $id  = $row['member_id'];
        echo $member_category_id =$row['member_category_id'];
    }
}


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


    function search(){
        var items="";

        $.get("newsManager/ajax/searchMemgers.php"
            +'?cat1='+reigon.value
            +'&cat2='+depot.value
            +'&cat3='+cat3.value
            +'&cat4='+cat4.value
            +'&tb='+tb1.value
            ,function(data){

                $("#ans").html(data);
            });

    }

    function saveMember(id){
        var items="";

        var cokk = "";
        if ($('#cok').is(':checked')){
            cokk = "yes";
        }
        else{
            cokk = "no";
        }

        $.get("./ajax/updateMember.php"
            +'?id='+id
            +'&fname='+fname.value
            +'&lname='+lname.value
            +'&nic='+nic.value
            +'&address='+address.value
            +'&ename='+ename.value
            +'&uname='+uname.value
            +'&pwd='+pwd.value
            +'&cok='+cokk
            +'&DOB='+dob.value
            ,function(data){
                alert("Record Sucessfuly Updated");
                location.reload();
            });

    }


</SCRIPT>





<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Update Member Details</h1>
            <p>Bootstrap default form components</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Form Components</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">



                    <div class="col-lg-11">
                        <form class="form" method="POST" action="">

                            <div class="form-group">
                                <label for="NIC">NIC</label>
                                <input class="form-control" id="NIC" type="text" placeholder="NIC" required>
                            </div>

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control" id="first_name" type="text" placeholder="First Name" required>
                            </div>

                            <div class="form-group">
                                <label for="last_name">last Name</label>
                                <input class="form-control" id="last_name" type="text" placeholder="Last Name" required>
                            </div>

                            <div class="form-group">
                                <label for="DOB">Date of Birth</label>
                                <input class="form-control" id="DOB" type="date" placeholder="Date of Birth" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control" id="address" type="text" placeholder="Address" required>
                            </div>

                            <div class="form-group">
                                <label for="bookcato">Select Category</label>
                                <select id="bookcato" class="form-control">
                                    <option value="0">Please select Category</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="User_name">User name</label>
                                <input class="form-control" id="User_name" type="text" placeholder="User Name" required>
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input class="form-control" id="Password" type="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input class="form-control" id="email" type="email" aria-describedby="emailHelp" placeholder="E-Mail Address" required><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" onClick="saveMember();">Submit</button>
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





