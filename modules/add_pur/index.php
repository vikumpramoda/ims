<?php
//add_pur
include('db_connector.php');

$member_id  = $_SESSION['member_id'];
?>



<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
The javascript plugin to display page loading on top
<script src="js/plugins/pace.min.js"></script>

<script>
    $(document).ready(function() {
        loadCombo();
    });
    $(document).ready(function() {
        loadCom();
    });


    function loadCombo(){
        var items="";

        $.getJSON("./ajax/aRegion.php",function(data){
            items="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items="<option name='bookCatol' value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCatol").html(items);
        });
        $.getJSON("./ajax/aDepot.php",function(data){
            items="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items="<option name='bookCatoll' value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCatoll").html(items);
        });

    }
    function loadCom() {
        var items = "";
        $.getJSON("./ajax/aSup.php", function (data) {
            items += "<option value='0'>Supplier Name</option>";
            $.each(data, function (index, item) {
                items += "<option name='sup_id' value='" + item.ID + "'>" + item.Name + "</option>";
            });
            $("#sup_id").html(items);
        });
    }
</script>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Purchase Order</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Purchase Order</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">



                    <div class="col-lg-11">
                        <form class="form" method="post" name="add_name" id="add_name" >
                            <?php
                            include('db_connector.php');

                            $id = intval($_GET['req_number']);

                            /*$selectUserl = "SELECT `req_number`,`qty`,`item_name` FROM `req_items`  WHERE `req_number` = $id ";
*/
                            $selectUserl = "SELECT d.req_number,d.qty,m.item_name,m.item_id
                            FROM req_items d
                            INNER JOIN items m ON m.item_id = d.item_name WHERE d.req_number= $id";

                            /*$selectUserl ="SELECT course.course_id,course.course_name,course.enrolKey,course.co_date,member.first_name
                            FROM course
                            INNER JOIN member ON course.lecture_id = member.member_id
                            WHERE course.course_id = $id";
*/
                            $resultl = mysqli_query($con,$selectUserl);
                            $countl = mysqli_num_rows($resultl);

                            if($countl == 1){
                                while($row = mysqli_fetch_array($resultl)){


                                    $item_id       = $row['item_name'];
                                    $qty       = $row['qty'];
                                    $item = $row['item_id'];

                                    

                                }
                            }

                            ?>
                            <div class="form-group">
                                <label for="req_id">Requestion ID</label>
                                <input class="form-control" name="req_id" type="text" value="<?php echo $id;?>" id="req_id" readonly >
                            </div>

                            <div class="form-group">
                                <label for="sup_id">Supplier Name</label>
                                <select id="sup_id" name="sup_id" class="form-control">
                                    <option  value="0" ></option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="bookCatol">Region Name</label>
                                <select id="bookCatol" name="bookCatol" class="form-control">
                                    <option  value="0" readonly=""></option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="bookCatoll">Depot Name</label>
                                <select id="bookCatoll" name="bookCatoll" class="form-control">
                                    <option  value="0" readonly=""></option>
                                </select>

                            </div>
                        <div>


                            <?php



                            if ($resultl->num_rows > 0) {
                                echo " <table class=\"table table-hover\" id=\"reqItem\">
                                        <tr> 
                                        <th>Item name</th>  
                                        <th>Quantity </th> 
                                        <th>Unit Price</th> 
                                        <th>Total</th> 
                                        </tr> ";
                                // output data of each row
                                while($row = $resultl->fetch_assoc()) {


                                    echo "<tr> 
                                          <td><input class=\"form-control\" name=\"item_id[]\" type=\"text\" value=" . $row["item_name"]. " id=\"item_id[]\" readonly></td> 
                                          <td><input class=\"form-control\" name=\"qty[]\" type=\"text\" value=" . $row["qty"]. " id=\"qty[]\"  required></td>
                                          <td><input class=\"form-control\" name=\"unit[]\" type=\"text\" value=\" \" id=\"unit[]\"  required></td>
                                           <td><input class=\"form-control\" name=\"total[]\" type=\"text\" value=\" \" id=\"total[]\" required></td> 
                                           <td><input class=\"form-control\" name=\"item_code[]\" type=\"text\" value=" . $row["item_id"]. " id=\"item_code[]\" hidden readonly></td> 
                                           </tr>";


                                }

                                echo "</table>";
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </div>


                            <div class="form-group">
                                <label for="member_id">Issuing Officer</label>
                                <input class="form-control" name="member_id" type="text" value="<?php echo $member_id;?>" id="member_id" readonly >

                            </div>
                            <div class="form-group">
                                <label for="pur_date">Date</label>
                                <input class="form-control" id="pur_date" type="date" name="pur_date" placeholder="Date" max=<?php echo date('Y-m-d');?> required>

                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" id="submit" name="submit" value="submit">submit</button>
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
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<!-- Google analytics script-->

<script>
    $('#submit').click(function(){
        $.ajax({
            url:"./ajax/name_pur.php",
            method:"POST",
            data:$('#add_name').serialize(),
            success:function(data)
            {
                alert(data);


            }
        });
    });

</script>
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


