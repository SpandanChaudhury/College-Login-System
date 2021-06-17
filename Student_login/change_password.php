<?php
session_start();
include "connection_student.php";
$x =  $_COOKIE['sic'];

$name = $_REQUEST['sic'];
$pwd = $_REQUEST['pswrd'];

echo $name. " ".$pwd;
if($x == $name){
    $query = "SELECT PASSSWORD FROM LOG_IN_DATA WHERE SIC = $name";
    // echo $x;
    // echo $query;
    // exit;
    $tbl_link = mysqli_query($conn, $query);
    $query_result = mysqli_fetch_array($tbl_link);
    print_r($query_result);
    // exit;
    $old_pwd = $query_result['PASSSWORD'];
    if($old_pwd == $pwd){
        $msg = "NEW PASSWORD CANNOT BE SAME AS OLD PASSWORD";
        // echo $_SESSION['pwd'];
        // header("Location: change.html");
    }
    else{
        $query = "UPDATE LOG_IN_DATA SET PASSSWORD = '$pwd' WHERE SIC = $name";
        echo "<br>".$query;
        $tbl_link = mysqli_query($conn, $query);
        if(!$tbl_link){
            $msg = "SORRY COULD NOT UPDATE THE PASSWORD, PLEASE TRY AGAIN LATER";
            // echo $_SESSION['pwd'];

            // header("Location : change.html");
        }
        else{
            $msg = "PASSWORD CHANGED!!";
            // echo $_SESSION['true'];
        // header("Location: change.html");
        }
    }
}
else{
    $msg = "ENTERED SIC DIDNT MATCH WITH LOGGED IN SIC";
    // echo $_SESSION['pwd'];

    // header("Location: change.html");
}

setcookie("error", $msg, time() + (86400), '/');
header("Location: change.php");

?>