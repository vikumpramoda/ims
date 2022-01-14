<?php
//generatoe_po
include('db_connector.php');

$member_id  = $_SESSION['member_id'];
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="./css/select2.min.css" />

<style>
    .select2-dropdown {
        top: 10px !important;
        left: 1px !important;}
</style>


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
        $.getJSON("./ajax/aMember.php",function(data){
            items="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items="<option value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCato").html(items);
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

                            $id = intval($_GET['pur_id']);

                            /*$selectUserl = "SELECT `req_number`,`qty`,`item_name` FROM `req_items`  WHERE `req_number` = $id ";
*/
                            $selectUserl = "SELECT p.pur_id,p.qty,m.item_name,m.item_id
                            FROM purchase_item p
                            INNER JOIN items m ON m.item_id = p.item_id WHERE p.pur_id= $id";

                            /*$selectUserl ="SELECT course.course_id,course.course_name,course.enrolKey,course.co_date,member.first_name
                            FROM course
                            INNER JOIN member ON course.lecture_id = member.member_id
                            WHERE course.course_id = $id";
*/
                            $resultl = mysqli_query($con,$selectUserl);
                            $countl = mysqli_num_rows($resultl);

                            if($countl == 0){
                                while($row = mysqli_fetch_array($resultl)){


                                    $item_id       = $row['item_name'];
                                    $qty       = $row['qty'];
                                    $item = $row['item_id'];



                                }
                            }

                            ?>
                            <div class="form-group">
                                <label for="req_id">Purchase No</label>
                                <input class="form-control" name="req_id" type="text" value="<?php echo $id;?>" id="req_id" readonly >
                            </div>

                            <div class="form-group">
                                <label for="sup_id">Supplier Name</label>
                                <select id="sup_id" name="sup_id" class="form-control">
                                    <option  value="0" ></option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label >File Number</label>
                                <input class="form-control" id="file" name="file"  type="text" placeholder="Your File Number" required>
                            </div>

                            <div class="form-group">
                                <label >SQ Number</label>
                                <input class="form-control" id="sq" name="sq"  type="text" placeholder="Your SQ Number" required>
                            </div>

                            <div class="form-group">
                                <label for="bookCato">Officer</label>
                                <select id="bookCato" name="bookCato" class="form-control">
                                    <option  value="0" readonly=""></option>
                                </select>

                            </div>
                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox" value="15" id="vat" name="vat" required><span class="label-text">VAT 15%</span>
                                </label>
                            </div>
                            <div class="animated-checkbox">
                                <label>
                                    <input type="checkbox" value="2" id="nbt" name="nbt" required><span class="label-text">NBT 2%</span>
                                </label>
                            </div>

                            <div>


                                <?php



                                if ($resultl->num_rows > 0) {
                                    echo " <table class=\"table table-hover\" id=\"reqItem\">
                                        <tr> 
                                        <th>Item name</th>  
                                        <th>Quantity </th> 
                                        <th>Unit Price</th>
                                        <th>Discount %</th>
                                        </tr> ";
                                    // output data of each row
                                    while($row = $resultl->fetch_assoc()) {


                                        echo "<tr> 
                                          <td><textarea class=\"form-control\" name=\"item_id[]\" type=\"text\" value=" . $row["item_name"]. " id=\"item_id[]\" readonly>". $row["item_name"]."</textarea></td> 
                                          <td><input class=\"form-control\" name=\"qty[]\" type=\"text\" value=" . $row["qty"]. " id=\"qty[]\"  required></td>
                                          <td><input class=\"form-control\" name=\"unit[]\" type=\"text\" value=\" \" id=\"unit[]\"  required></td> 
                                          <td><input class=\"form-control\" name=\"disc[]\" type=\"text\" value=\" \" id=\"disc[]\" ></td> 
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
                                <label >Delivery Address - NO</label>
                                <input class="form-control" id="no" name="no"  type="text" placeholder="Ex - NO:43" required>
                            </div>
                            <div class="form-group">
                                <label >1st line of Adddress</label>
                                <input class="form-control" id="st1" name="st1"  type="text" placeholder="Street or Lane">
                            </div>
                            <div class="form-group">
                                <label >2nd line of Address </label>
                                <input class="form-control" id="st2" name="st2"  type="text" placeholder="2nd Street">
                            </div>
                            <div class="form-group">
                                <label >3rd line of Address</label>
                                <input class="form-control" id="st3" name="st3"  type="text" placeholder="Town">
                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                            </div>


                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" id="submit" name="submit" value="submit"><i class="fa fa-check-circle"></i>submit</button>



                                <a class="btn btn-danger icon-btn float-right" href="view_po.php" ><i class="fa fa-times"></i>Cancel</a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script>
        $("#sup_id").select2( {
            placeholder: "Select Items",
            allowClear: true
        } );
    </script>
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

<script type="text/javascript">
    document.getElementById("Cancel").onclick = function () {
        location.href = "view_po.php";
    };
</script>

<script>
    $('#submit').click(function(){
        $.ajax({
            url:"./ajax/purFinal.php",
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