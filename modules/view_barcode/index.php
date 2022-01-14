<?php
//View barcode- vikum
include('db_connector.php');
$member_id  = $_SESSION['member_id'];

$query = "SELECT m.serial, m.item_name , m.date , g.id, g.image_url , m.stockId
          FROM images g
          INNER JOIN main_stock_item m on m.stockId = g.stockId
          ";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Barcode</title>
    <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="html2canvas.js"></script> 
    
    <style>
        
		
		.alb {
			width: 200px;
			height: 50%;
			padding: 15px;
			border-style: dotted;
			
		}
		.alb img {
			width: 100%;
			height: 50%;
			border-style: double;	
		}
		
		a {
			text-decoration: none;
			color: black;
			
		}

		.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			text-align: center;

			}
	</style>


</head>

<body>
<form method="post" action="">    
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> View Barcode List & Printing </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        </ul>  
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div align="right">

                </div>
                <br />
                <div class="row">
                    <div>

                    </div>

                    <div class="col-lg-12" id="employee_table">

                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                <tr>

                    <th> ID</th>
                    <th >Stock ID</th>
                    <th >Item Name </th>
                    <th  >Serial Number</th>
                    <th >Item Added Date</th>
                    <th >BarCode Image png</th>
                    <th width="30%">BarCode Image</th>
                    
                    

                </tr>
                        </thead>
                <?php


                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["stockId"]; ?></td>
                        <td><?php echo $row["item_name"]; ?> </td>
                        <td><?php echo $row["serial"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $row["image_url"]; ?></td>
                        
                        <td>
                        <div class="form-check">
                        <input type="checkbox" name='lang[]' value="<?php echo $row["image_url"]; ?>"> 
                        <div class="alb">
                        <img src="uploads/<?php echo $row["image_url"]?>">
                        </div> 

                        
                        </div>
                        </td>
                    </tr>
                    <?php
                }}
                ?>

                </table>         
                <button type="submit" class=" btn btn-primary btn-sm" value="Add to Printing List" name="PrintTable">Add to Printing List</button>
                </div>


            </div>
        </div>
    </div>



<div id="display2">
    <?php
if(isset($_POST['PrintTable'])){

    if(!empty($_POST['lang'])) {
        /* print_r($_POST['lang']); */
        /* print_r("<br>"); */
        foreach($_POST['lang'] as $value){
            ?>    
            <div class=" ">
                <img src="uploads/<?php echo $value?>"> 
                <br>
                </div>             
          <?php
             /* echo "value : ".$value.'<br/>';  */            
        }
    }
}
?> 

	<button type="button" class=" btn-block btn btn-success btn-sm" id="print2">Print</button>
     
	
    <?php
?> 


    </div>
</div>



</main>


<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

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

</form>

</body>
</html>





<script>
  $('#generate').on('click',function(){
    if($('#code').val() != ''){
      $.ajax({
        url:'barcode.php',
        method:"POST",
        data:{code:$('#code').val(),type:$('#type').val(),label:$('#label').val()},
        error:err=>{
          console.log(err)
        },
        success:function(resp){
          $('#display2').html(resp)
          $('#bcode-card .card-footer').show('slideUp')
        }
      })
    }
  })

    $('#save').click(function(){
    html2canvas($('#field'), {
    onrendered: function(canvas) {                    
      var img = canvas.toDataURL("image/png");
      
      var uri = img.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
      
      var link = document.createElement('a');
          if (typeof link.download === 'string') {
              document.body.appendChild(link); 
              link.download = 'barcode_'+$('#code').val()+'.png';
              link.href = uri;
              link.click();
              document.body.removeChild(link);
          } else {
              location.replace(uri);
          }
      
    }
  }); 
  })
    $('#print2').click(function(){
      var openWindow = window.open("", "", "_blank");
      openWindow.document.write($('#display2').parent().html());
      openWindow.document.write('<style>'+$('style').html()+'</style>');
      openWindow.document.close();
      openWindow.focus();
      openWindow.print();
      // openWindow.close();
      setTimeout(function(){
      openWindow.close();
      },1000)
    })
</script>



