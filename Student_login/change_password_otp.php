<?php
session_start();
include "connection_student.php";
$pwd = $_REQUEST['new_p'];

$sic = $_COOKIE['sic'];
$query = "SELECT PASSSWORD FROM LOG_IN_DATA WHERE SIC = $sic";
$tbl_link = mysqli_query($conn, $query);
$query_res = mysqli_fetch_array($tbl_link);
$old_pwd = $query_res['PASSSWORD'];
if($old_pwd == $pwd){
    $msg = "NEW PASSWORD CANNOT BE SAME AS OLD PASSWORD";
}
else{
    $query = "UPDATE LOG_IN_DATA SET PASSSWORD = '$pwd' WHERE SIC = $sic";
    $tbl_link = mysqli_query($conn, $query);
    if(!$tbl_link){
        $msg = "SORRY COULD NOT UPDATE THE PASSWORD, PLEASE TRY AGAIN LATER";
    }
    else{
        $msg = "PASSWORD CHANGED!!";
    }
}

setcookie("error", $msg, time() + (86400), '/');
header("Location: change.php");
?>