<?php
session_start();
include "connection_student.php";
$first_name = $_REQUEST['fn'];
$last_name = $_REQUEST['ln'];
$guardian_name = $_REQUEST['g_n'];
$relation = $_REQUEST['gs_rel'];
$address = $_REQUEST['addr'];
$student_mail = $_REQUEST['s_mail'];
$guardian_mail = $_REQUEST['g_mail'];
$sic = $_REQUEST['s_id'];
$student_number = $_REQUEST['s_num'];
$guardian_number = $_REQUEST['g_num'];
$alternate_num = $_REQUEST['a_num'];

$facility = $_REQUEST['check'];
$year = $_REQUEST['year'];
$br = $_REQUEST['branch'];
// echo $first_name. '  '. $last_name. "  ". $guardian_name. "  ".$relation. '  '. $address. "  ". $student_mail. "  ".
// $guardian_mail. '  '. $student_number. "  ". $guardian_number. "  ".$alternate_num ."  ". $year. "  ". $br;
// print_r($facility);
if($alternate_num == ""){
    $al = 'NULL';
}
else{
    $al = $alternate_num;
}

$query1 = "UPDATE PERSONAL SET FIRST_NAME = '$first_name',
                                LAST_NAME = '$last_name',
                                GUARDIAN_NAME = '$guardian_name',
                                RELATION = '$relation',
                                ADDRESS = '$address',
                               Student_email_id = '$student_mail',
                               Guardian_email_id = '$guardian_mail',
                               STUDENT_CONTACT_NUM = $student_number,
                               GUARDIAN_CONTACT_NUM = $guardian_number,
                               ALTERNATE_NUM = $al 
           WHERE SIC = $sic ";                    
// echo $query1;

$p_link =mysqli_query($conn, $query1);
if($p_link){
    $query2 = "UPDATE ACADEMICS SET BRANCH = '$br', YEAR_OF_STUDY =$year WHERE SIC = $sic";
    $query3 = "DELETE FROM FACILITY WHERE SIC = $sic";
    $a_link = mysqli_query($conn, $query2);
    $d_link = mysqli_query($conn, $query3);
    foreach($facility as $fac){
        $query = "SELECT FNO FROM FACILITY_MASTER WHERE FACILITY_NAME = '$fac'";
        $link = mysqli_query($conn, $query);
        $fa = mysqli_fetch_array($link);
        $fno = $fa['FNO'];
        echo $fno."<br>";
        $q2 = "INSERT INTO FACILITY VALUES($sic, $fno)";
        // echo $q2;
        $link = mysqli_query($conn, $q2);
    }
    $_SESSION['success'] = "DATA for SIC = $sic  UPDATED SUCCESSFULLY";
}
else{
    $_SESSION['error_edit'] = "SORRY COULD NOT CHANGE THE DATA";
    
}
header("Location: data_table.php");

?>