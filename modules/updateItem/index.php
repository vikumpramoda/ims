<?php
//update item vikun   2022-01-24
include('db_connector.php');
include ('validateSession.php');

if(isset($_POST['update']))
{	

	$item_id = mysqli_real_escape_string($con, $_POST['item_id']);
	$item_name = mysqli_real_escape_string($con, $_POST['item_name']);
	
	
	
		//updating the table
		$result = mysqli_query($con, "UPDATE items SET item_name='$item_name' WHERE item_id=$item_id");
		//redirectig to the display page. In our case, it is index.php
		header("Location: itemView.php");
        
	
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
$item_id = $_GET['item_id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM items WHERE item_id=$item_id");

while($res = mysqli_fetch_array($result))
{
	$item_name = $res['item_name'];
    
}
?>


<html>
<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Change Item Name</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="itemView.php">Item List</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">


                    <div class="col-lg-11">
                        <form class="updateItem.php" action="updateItem.php?id=<?php echo $_GET['item_id']; ?>" id=" " name=" " method="POST" >

                            <div class="form-group">
                                <label for="item_name">Change Item Name</label>
                                <input class="form-control" id="item_name" type="text" name="item_name" placeholder="Enter new name" value="<?php echo $item_name; ?>">
                            </div>

                            
                            

                            <div class="tile-footer">
                                <input type="hidden" name="item_id" value=<?php echo $_GET['item_id'];?>>     
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







