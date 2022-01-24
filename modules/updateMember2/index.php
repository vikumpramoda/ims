<?php
//update Member Form  Vikum 2022-01-24
include('db_connector.php');
include ('validateSession.php');

if(isset($_POST['update']))
{	

	$member_id = mysqli_real_escape_string($con, $_POST['member_id']);
	$NIC = mysqli_real_escape_string($con, $_POST['NIC']);
	$first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $DOB = mysqli_real_escape_string($con, $_POST['DOB']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
	$User_name = mysqli_real_escape_string($con, $_POST['User_name']);
    $Password = mysqli_real_escape_string($con, $_POST['member-category_id']);
    $email = mysqli_real_escape_string($con, $_POST['email']);	
	
	// checking empty fields
	if(empty($NIC) || empty($last_name) || empty($User_name)) {	
			
		if(empty($NIC)) {
			echo "<font color='red'>NIC is empty.</font><br/>";
		}
		
		if(empty($last_name)) {
			echo "<font color='red'>last name is empty.</font><br/>";
		}
		
		if(empty($User_name)) {
			echo "<font color='red'>user name is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($con, "UPDATE member SET NIC='$NIC',first_name='$first_name',last_name='$last_name',DOB='$DOB' ,address='$address', User_name='$User_name' , Password='$Password' ,email='$email' WHERE member_id=$member_id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: viewMember.php");
	}
}

?>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>

<?php
//getting id from url
$member_id = $_GET['member_id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM member WHERE member_id=$member_id");

while($res = mysqli_fetch_array($result))
{
	$NIC = $res['NIC'];
    $first_name = $res['first_name'];
	$last_name = $res['last_name'];
	$User_name = $res['User_name'];
    $DOB = $res['DOB'];
	$address = $res['address'];
	$Password = $res['Password'];
    $email = $res['email'];
   
}
?>


<html>
<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> User Details Update Form</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="viewMember.php">Update Member</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">


                    <div class="col-lg-11">
                        <form class="updateMember2.php" action="updateMember2.php?id=<?php echo $_GET['member_id']; ?>" id=" " name=" " method="POST" >

                            <div class="form-group">
                                <label for="NIC">User NIC Number *(If you incorrect value added)</label>
                                <input class="form-control" id="NIC" type="text" name="NIC" placeholder="NIC" value="<?php echo $NIC; ?>">
                            </div>

                            <div class="form-group">
                                <label for="first_name">Member First Name</label>
                                <input class="form-control" id="first_name" type="text" name="first_name" placeholder="Member First Name" value="<?php echo $first_name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Member Last Name</label>
                                <input class="form-control" id="last_name" type="text" name="last_name" placeholder="Member Last Name" value="<?php echo $last_name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="last_name"> Date Of Birthday </label>
                                <input class="form-control" id="DOB" type="date" name="DOB" placeholder="Date Of Birthday " value="<?php echo $DOB; ?>">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Member Address* (New address)</label>
                                <input class="form-control" id="address" type="text" name="address" placeholder="New Address " value="<?php echo $address; ?>" >
                            </div>

                            <div class="form-group">
                                <label for="User_name">User Name</label>
                                <input class="form-control" id="User_name" type="text" name="User_name"  placeholder="E-Mail Address" value="<?php echo $User_name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="Password">Change Password</label>
                                <input class="form-control" id="Password" type="text" name="Password"  placeholder="Password" value="<?php echo $Password; ?>">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Member Email * (New Email)</label>
                                <input class="form-control" id="email" type="text" name="email" placeholder="New Email" value="<?php echo $email; ?>" >
                            </div>


                            <div class="tile-footer">
                                <input type="hidden" name="member_id" value=<?php echo $_GET['member_id'];?>>     
                                <input class="btn btn-primary" type="submit" value="Update" id="update" name="update" >
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







