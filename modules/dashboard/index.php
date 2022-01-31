<?php
@session_start();
include('db_connector.php');
// dashboard vikum 2022-01-27
$member_id  = $_SESSION['member_id'];

$query = "SELECT * FROM member;";
$result = mysqli_query($con, $query);
$total_members=$result->num_rows;

$query = "SELECT * FROM supplier;";
$result2 = mysqli_query($con, $query);
$total_supplier=$result2->num_rows;

$query = "SELECT * FROM sub_cato;";
$result3 = mysqli_query($con, $query);
$total_sub_cato=$result3->num_rows;

$query = "SELECT * FROM main_stock_item;";
$result4 = mysqli_query($con, $query);
$total_main_stock_item=$result4->num_rows;

?>

	<main class="app-content">
      <div class="app-title">
        <div>
            <h1><a href="dashboard.php"><img class="circular--square" src="upload\logo3.jpg" alt="logo" /> <b>State Timber Corporation Inventory Management System</b></a> </h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Member count</h4>
              <p><b><?=$total_members;?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-truck fa-3x"></i>
            <div class="info">
              <h4>Supplier Count</h4>
              <p><b><?=$total_supplier;?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-sitemap fa-3x"></i>
            <div class="info">
              <h4>S. Category Count</h4>
              <p><b><?=$total_sub_cato;?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-edit fa-3x"></i>
            <div class="info">
              <h4>Item Count</h4>
              <p><b><?=$total_main_stock_item;?></b></p>
            </div>
          </div>
        </div>
      </div>
<!--       <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Monthly Sales</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Support Requests</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
            </div>
          </div>
        </div>
      </div> -->
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
          
            <h1 class="tile-title">Features</h1>
            <ul>
              <li><h5>Stock Requisition System</h5> </li>
              <li><h5>Current Items Adding System</h5> </li>
              <li><h5>Barcode Generation System</h5> </li>
              <li><h5>Stock Transferring System Between Departments</h5> </li>
              
            </ul>
            
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
          <h6 class="tile-title" style="color: #CD7F32;" >Click here to visit our webpage...</h6>
          <a href="http://www.timco.lk/stc/"><img src="upload\logo5.jpg"/></a>
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
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
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
