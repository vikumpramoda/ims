<?php
//user validation sessions
if(
    isset($_SESSION['login']) &&
    isset($_SESSION['member_id'])&&
    isset($_SESSION['member-category_id'])  &&
    isset($_SESSION['session']) &&
    $_SESSION['session'] == session_id() &&
    $_SESSION['login'] == true
){
    //echo('in');
    //echo '<br>';
    //echo("user id : ". $_SESSION['userId']);
    //echo '<br>';
    //echo("session id: ". $_SESSION['session'].' Matching with : '.session_id());
}
else{
    header("Location: index.php");
}

?>