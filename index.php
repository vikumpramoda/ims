<!DOCTYPE html>
<?php
@session_start();
include('db_connector.php');

if(isset($_POST['username']) && isset($_POST['pass'])){

    $_SESSION['login'] = false;

    $username = @trim(stripslashes($_POST['username']));
    //$pass     = md5(@trim(stripslashes($_POST['pass'])));
    $pass     = stripslashes($_POST['pass']);


    $selectUser = "SELECT *
	FROM `member`
	WHERE `User_name`='$username' AND `Password` = '$pass'";

    $result = mysqli_query($con,$selectUser);
    $count = mysqli_num_rows($result);

    if($count == 1){
        while($row = mysqli_fetch_array($result)){

            echo $_SESSION['member_id']    = $row['member_id'];
            echo $_SESSION['NIC']          = $row['NIC'];
            echo $_SESSION['first_name']   = $row['first_name'];
            echo $_SESSION['last_name']      = $row['last_name'];
            echo $_SESSION['login']        = TRUE;
            echo $_SESSION['session']      = session_id();
            echo $_SESSION['address']      = $row['address'];
            echo 'session'.$_SESSION['member-category_id']       = $row['member-category_id'];
            echo $_SESSION['User_name']        = $row['User_name'];
            echo $_SESSION['last_login']       = $row['last_login'];
            echo $_SESSION['email']            = $row['email'];
            echo $_SESSION['depot_id']            = $row['depot_id'];
            echo $_SESSION['region_id']            = $row['region_id'];
            //current date time
            $date1 = date("Y-m-d H:i:s");

            $updateUserRecored = "UPDATE `member` SET `last_login`='$date1' WHERE `member_id`=". $row['member_id'];
            mysqli_query($con, $updateUserRecored);


            header("Location: dashboard.php");


        }
    }
    else{
        header("Location: index.php?msg=1");
    }

}

?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/ss.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login to STC Inventory Management System</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo"> 
        <h1>STC Inventory Management System</h1>
    </div>
    <div class="login-box">
        <form class="login-form" action="" method="POST">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label">USERNAME</label>
                <input class="form-control" type="text" placeholder="Username" autofocus name="username" id="username">
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" type="password" placeholder="Password" name="pass" id="pass">
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox"><span class="label-text">Stay Signed in</span>
                        </label>
                    </div>
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                </div>
            </div>

            <div class="form-group" style="color:#F00">
                <?php
                if(isset($_GET['msg'])){
                    ?>
                    Invalid username or password. Please try again !!!
                    <?php
                }
                ?>
            </div>

            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
        </form>
        <form class="forget-form" action="index.html">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
            <div class="form-group">
                <label class="control-label">EMAIL</label>
                <input class="form-control" type="text" placeholder="Email">
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
            </div>
        </form>
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>