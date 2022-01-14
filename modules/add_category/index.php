<?php
include('db_connector.php');
include ('validateSession.php');

$member_id  = $_SESSION['member_id'];
$NIC		=	$_SESSION['NIC'];
$first_name	=		$_SESSION['first_name'];
$last_name	=		$_SESSION['last_name'];
$session_id	=		$_SESSION['session'];
$member_category_id	       = $_SESSION['member-category_id'];
$email =  $_SESSION['email'];


if(($member_category_id == '1') || ($member_category_id == '2')  ){
    ?>
    <html>
    <head>
        <!-- The javascript plugin to display page loading on top-->

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>


        <script>
            $(document).ready(function () {
                loadCombo();
            });


            function loadCombo() {
                var items = "";

                $.getJSON("./ajax/aCategory.php", function (data) {
                    items += "<option value='0'>Select Category</option>";
                    $.each(data, function (index, item) {
                        items += "<option name='bookCatol' value='" + item.ID + "'>" + item.Name + "</option>";
                    });
                    $("#bookCatol").html(items);
                });

            }

        </script>
    </head>
    <body>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i>Add Category</h1>

            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item"><a href="#">Add Category</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="row">


                        <div class="col-lg-11">
                            <form class="form" method="post" name="add_cat" id="add_cat">

                                <div class="form-group">
                                    <label for="bookCatol">Category Name</label>
                                    <select id="bookCatol" name="bookCatol" class="form-control">
                                        <option value=""></option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>New Sub Category Name</label>
                                    <input class="form-control" id="sub_name" name="sub_name" type="text"
                                           placeholder="Category Name" required>
                                </div>


                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit" id="submit" name="submit">submit
                                    </button>
                                </div>


                            </form>
                        </div>

                    </div>

                </div>
            </div>


        </div>

    </main>
    <!-- Essential javascripts for application to work-->


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


<!-- Vikum -->
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
</script>  <!-- Vikum -->





    </body>
    </html>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>

    </script>
    <script>
        $('#submit').click(function () {
            $.ajax({
                url: "./ajax/add_category.php",
                method: "POST",
                data: $('#add_cat').serialize(),
                success: function (data) {
                    alert(data);


                }
            });
        });

    </script>
    <?php
}else{
    header("Location: dashboard.php");
}
    ?>