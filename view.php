<?php include "db_connector.php"; ?>
<!-- view bar code - Vikum 2021-12-09 -->
<!-- view bar code List -->
<!DOCTYPE html>

<html>
<head>
<!-- 
  <link rel="stylesheet" href="bootstrap.min.css"> -->
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <script src="html2canvas.js"></script> 
	<title>View</title>
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

     <a href="view_barcode.php">&#8592;</a>
	    
      
     <?php 

          $sql = "SELECT * FROM images ORDER BY id DESC";
          $res = mysqli_query($con,  $sql);
          
          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
			 <div id="display">
			<ul> 
				<li>
        
             <div class=" ">
             	<img src="uploads/<?=$images['image_url']?>" id="barcode">
             </div>
			 
      
			 </li>
			</ul>
			 
			
			</div>   
    <?php } }?>
	
	<div class="footer">
	<button type="button" class=" btn-block btn btn-success btn-sm" id="print">Print</button>
    <button type="button" class=" btn-block btn btn-primary btn-sm" id="save">Download</button> 
	</div>
	
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
          $('#display').html(resp)
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
    $('#print').click(function(){
      var openWindow = window.open("", "", "_blank");
      openWindow.document.write($('#display').parent().html());
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
