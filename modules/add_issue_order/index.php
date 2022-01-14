<?php

include('db_connector.php');


$member_id  = $_SESSION['member_id'];
?>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<script src="js/plugins/pace.min.js"></script>

<script>
    $(document).ready(function() {
        loadCombo();
    });


    function loadCombo(){
        var items="";

        $.getJSON("./ajax/aRegion.php",function(data){
            items="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items="<option value='"+item.ID+"'>"+item.Name+"</option>";
            });
            $("#bookCatol").html(items);
        });
        $.getJSON("./ajax/aDepot.php",function(data){
            items="<option value='0'> </option>";
            $.each(data,function(index,item)
            {
                items="<option value='"+item.ID+"'>"+item.Name+"</option>";
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

</script>



<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Issue Order</h1>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item"><a href="#">Issue Order</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">



                    <div class="col-lg-11">
                        <form class="form" method="post" action="" name="add_name" id="add_name">

                            <div class="form-group">
                                <label for="req_id">Requestion ID</label>
                                <input class="form-control" id="req_id" type="text" name="req_id" placeholder="Requestion ID" required>
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


                            <label for="country">Item Description</label>

                            <div class="form-group">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td><input type="text" name="item_id[]" id="item_id" placeholder="Item Name" class="form-control name_list" /></td>
                                            <td><input type="text" name="qty[]" id="qty" placeholder="Quantity" class="form-control name_list" /></td>

                                            <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>



                            <div class="form-group">
                                <label for="bookCato">Issue Officer</label>
                                <select id="bookCato" name="bookCato" class="form-control">
                                    <option  value="0" readonly=""></option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input class="form-control" id="date" type="date" name="date" placeholder="Date" required>

                            </div>

                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" id="submit" name="submit" value="submit">Submit</button>
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
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="item_id[]" placeholder="Item ID" class="form-control name_list" /></td><td><input type="text" name="qty[]" id="qty" placeholder="Quantity" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

        $('#submit').click(function(){
            $.ajax({
                url:"./ajax/name_issue.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                    alert(data);
                    location.reload();
                    $('#add_name')[0].reset();
                }
            });
        });

    });
</script>