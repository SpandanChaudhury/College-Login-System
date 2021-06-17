<?php
session_start();
$x = $_GET['id'];
include "connection_student.php";
// echo $x;
$query = "DELETE FROM FACILITY WHERE SIC = $x";
$query2 = "DELETE FROM ACADEMICS WHERE SIC = $x";
$query3 = "DELETE FROM LOG_IN_DATA WHERE SIC = $x";
$query5 = "DELETE FROM PERSONAL WHERE SIC = $x";
$tbl_link = mysqli_query($conn, $query);
if($tbl_link){
    $tbl_link = mysqli_query($conn, $query2);
    if($tbl_link){
        $tbl_link = mysqli_query($conn, $query3);
        if($tbl_link){
            $tbl_link = mysqli_query($conn, $query5);
            $_SESSION['del_success'] = "Successfully Deleted for Sic-". $x;
        }
        else{
            $msg = "ERROR!! COULD NOT DELETE!!";
        }
    }
    else{
        $msg = "ERROR!! COULD NOT DELETE!!";
    }
}
else{
    $msg = "ERROR!! COULD NOT DELETE!!";
}

$_SESSION['error_del'] = $msg;
header("Location: data_table.php");

?>