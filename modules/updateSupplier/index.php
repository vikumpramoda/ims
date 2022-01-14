<?php
//update supplier
include('db_connector.php');
include ('validateSession.php');

if(isset($_POST['update']))
{	

	$sup_id = mysqli_real_escape_string($con, $_POST['sup_id']);
	$sup_name = mysqli_real_escape_string($con, $_POST['sup_name']);
	$sup_contact = mysqli_real_escape_string($con, $_POST['sup_contact']);
    $sup_address = mysqli_real_escape_string($con, $_POST['sup_address']);
    $saddress = mysqli_real_escape_string($con, $_POST['saddress']);
    $taddress = mysqli_real_escape_string($con, $_POST['taddress']);
    $faddress = mysqli_real_escape_string($con, $_POST['faddress']);
	$sup_email = mysqli_real_escape_string($con, $_POST['sup_email']);	
	
	// checking empty fields
	if(empty($sup_name) || empty($sup_address) || empty($sup_email)) {	
			
		if(empty($sup_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($sup_address)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($sup_email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($con, "UPDATE supplier SET sup_name='$sup_name',sup_contact='$sup_contact',sup_address='$sup_address',saddress='$saddress' ,taddress='$taddress',faddress='$faddress',sup_email='$sup_email' WHERE sup_id=$sup_id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: viewSupplier.php");
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
$sup_id = $_GET['sup_id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM supplier WHERE sup_id=$sup_id");

while($res = mysqli_fetch_array($result))
{
	$sup_name = $res['sup_name'];
    $sup_contact = $res['sup_contact'];
	$sup_address = $res['sup_address'];
	$sup_email = $res['sup_email'];
    $s_address = $res['saddress'];
	$t_address = $res['taddress'];
	$f_address = $res['faddress'];
    $remark = $res['remark'];
}
?>


<html>
<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Supplier Details Update Form</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Add Supplier</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">


                    <div class="col-lg-11">
                        <form class="updateSupplier.php" action="updateSupplier.php?id=<?php echo $_GET['sup_id']; ?>" id=" " name=" " method="POST" >

                            <div class="form-group">
                                <label for="sup_name">Supplier Name</label>
                                <input class="form-control" id="sup_name" type="text" name="sup_name" placeholder="Supplier Name" value="<?php echo $sup_name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="sup_contact">Supplier Contact Number</label>
                                <input class="form-control" id="sup_contact" type="text" name="sup_contact" placeholder="Supplier Contact Number" value="<?php echo $sup_contact; ?>">
                            </div>

                            <div class="form-group">
                                <label for="sup_address"> Supplier Company Address</label>
                                <input class="form-control" id="sup_address" type="text" name="sup_address" placeholder="Address Line 1" value="<?php echo $sup_address; ?>">
                            </div>

                            <div class="form-group">
                                <label for="sup_address"> Address Line2 :</label>
                                <input class="form-control" id="saddress" type="text" name="saddress" placeholder="Address Line 2" value="<?php echo $s_address; ?>">
                            </div>

                            <div class="form-group">
                                <label for="sup_address"> Address Line3 :</label>
                                <input class="form-control" id="taddress" type="text" name="taddress" placeholder="Address Line 3" value="<?php echo $t_address; ?>" >
                            </div>

                            <div class="form-group">
                                <label for="sup_address"> Address Line4 :</label>
                                <input class="form-control" id="faddress" type="text" name="faddress" placeholder="City" value="<?php echo $f_address; ?>">
                            </div>

                        

                            <div class="form-group">
                                <label for="sup_email">Supplier Email</label>
                                <input class="form-control" id="sup_email" type="email" name="sup_email"  placeholder="E-Mail Address" value="<?php echo $sup_email; ?>">
                            </div>

                            <!-- <div class="form-group">
                                    <label for="exampleTextarea">Remarks</label>
                                    <textarea class="form-control" name="remark" id="remark" rows="3" value="<?php echo $remark; ?>"></textarea>
                                </div> -->

                            <div class="tile-footer">
                                <input type="hidden" name="sup_id" value=<?php echo $_GET['sup_id'];?>>     
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







