<?php
//stock supplier vikum pramoda 2021
include('db_connector.php');
include ('validateSession.php');

$member_id  = $_SESSION['member_id'];
$NIC		=	$_SESSION['NIC'];
$first_name	=		$_SESSION['first_name'];
$last_name	=		$_SESSION['last_name'];
$session_id	=		$_SESSION['session'];
$member_category_id	       = $_SESSION['member-category_id'];
$email =  $_SESSION['email'];

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
        //loadCombo1();
    });

    function loadCombo(){
        var items="";

        $.getJSON("./ajax/supplierJson.php",function(data){
            items+="<option value='0'>Select Category </option>";
            $.each(data,function(index,item)
            {
                items+="<option name='bookCato' value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookcato").html(items);
        });

    }


/*     function loadCombo1(){
        var items="";

        $.get("./ajax/supplierAjax.php"
            +'&cat1='+sup_name.value
            +'&cat2='+sup_contact.value
            +'&cat3='+sup_address.value
            +'&cat4='+saddress.value
            +'&cat5='+taddress.value
            +'&cat6='+faddress.value
            +'&cat7='+bookcato.value
            +'&cat8='+sup_email.value
           
            +'&cat10='+remark.value
            ,function(data){

                $("#ans").html(data);
            });

    } */

</script>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Supplier Details</h1>

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
                        <form class="form" action="" id="add_supplier" name="add_supplier" method="post" >

                            <div class="form-group">
                                <label for="sup_name">Supplier Name</label>
                                <input class="form-control" id="sup_name" type="text" name="sup_name" placeholder="Supplier Name" required>
                            </div>

                            <div class="form-group">
                                <label for="sup_contact">Supplier Contact Number</label>
                                <input class="form-control" id="sup_contact" type="text" name="sup_contact" placeholder="Supplier Contact Number" >
                            </div>

                            <div class="form-group">
                                <label for="sup_address"> Supplier Company Address</label>
                                <input class="form-control" id="sup_address" type="text" name="sup_address" placeholder="Address Line 1" required>
                            </div>

                            <div class="form-group">
                                <label for="sup_address"> Address Line2 :</label>
                                <input class="form-control" id="saddress" type="text" name="saddress" placeholder="Address Line 2" required>
                            </div>

                            <div class="form-group">
                                <label for="sup_address"> Address Line3 :</label>
                                <input class="form-control" id="taddress" type="text" name="taddress" placeholder="Address Line 3" required>
                            </div>

                            <div class="form-group">
                                <label for="sup_address"> Address Line4 :</label>
                                <input class="form-control" id="faddress" type="text" name="faddress" placeholder="City" required>
                            </div>

                            <!-- <div class="form-group">
                                <label for="bookcato">Select Category</label>
                                <select id="bookcato" name="bookcato" class="form-control">
                                    <option value="0">Please select Category</option>
                                </select>
                            </div> -->

                            <div class="form-group">
                                <label for="sup_email">Supplier Email</label>
                                <input class="form-control" id="sup_email" type="email" name="sup_email"  placeholder="E-Mail Address" required>
                            </div>

                            <div class="form-group">
                                    <label for="exampleTextarea">Remarks</label>
                                    <textarea class="form-control" name="remark" id="remark" rows="3"></textarea>
                                </div>

                            <div class="tile-footer">
                                <input class="btn btn-primary" type="submit" value="submit" id="submit" name="submit" >
                                <a href="viewSupplier.php"> <input class="btn btn-dark" type="" value="View List" id="" name="View List" > </a>
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
            url:"./ajax/supplierAjax.php",
            method:"POST",
            data:$('#add_supplier').serialize(),
            success:function(data)

            {
                alert(data);


            }
        });
    });

</script>



