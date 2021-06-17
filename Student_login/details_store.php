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
$gender = $_REQUEST['sex'];
$dob = $_REQUEST['dob'];
$age = $_REQUEST['age_s'];

$facility = $_REQUEST['check'];
$year = $_REQUEST['year'];
$br = $_REQUEST['branch'];
$pwd = $_REQUEST['password'];

echo "<pre>";
print_r($facility);
// print_r($_FILES);
// exit;



$upload_loc = 'input_img';
$curr_loc = $_FILES['img']['tmp_name'];
$curr_name = $_FILES['img']['name'];
$dot_pos = strpos($curr_name, '.');
$extn = substr($curr_name, $dot_pos);
$new_name = $sic.$extn;
// echo "<br>".$new_name;
echo $curr_loc;

$new_loc = "$upload_loc/$new_name";

echo "<br>".$new_loc;
move_uploaded_file($curr_loc, $new_loc);



// $check_pwd = $_REQUEST['check_pwd']


// echo " " . $year. " " . $br. " ". $pwd;
// $facility_insert = array('N', 'N', 'N');
// if(!empty($facility) && is_array($facility)){
// foreach($facility as $check){
//     if($check == 'Bus')
//         $facility_insert[0] = 'Y';
//     if($check == 'Mess')
//         $facility_insert[1] = 'Y';
//     if($check == 'Gym')
//         $facility_insert[2] = 'Y';
// }
// }


// print_r($facility_insert);
// echo $alternate_num == "";
if ($alternate_num=="")
    $alternate_num = "NULL";

echo $alternate_num."<br>";


$query = "INSERT INTO PERSONAL VALUES($sic, '$first_name', '$last_name', '$guardian_name', '$relation', '$address', '$gender', 
'$dob', $age, '$student_mail', '$guardian_mail', $student_number, $guardian_number, '$new_loc', $alternate_num) ";


// echo $query;
// echo $first_name. '  '. $last_name. "  ". $guardian_name. "  ".$relation. '  '. $address. "  ". $student_mail. "  ".$guardian_mail. '  '. $student_number. "  ". $guardian_number. "  ".$alternate_num. '  '. $gender. "  ". $age. "  ". $dob. '  ';

$query2 = "INSERT INTO ACADEMICS VALUES($sic, '$br', '$year')";
// $query3 = "INSERT INTO FACILITY VALUES($sic, '$facility_insert[0]', '$facility_insert[1]', '$facility_insert[2]')";
$query4 = "INSERT INTO LOG_IN_DATA VALUES($sic, '$pwd')";
// // echo $query2."<br>". $query3;

$sql_link = mysqli_query($conn, $query);
if(!$sql_link){
    // setcookie("Error_msg", "Sorry could not insert data, please try again", time() + (86400 * 2), '/');
    $_SESSION['error'] = "Sorry could not insert data, please try again";
}
else{
    $_SESSION['name'] = "Account created for ".$first_name;
    $sql_link = mysqli_query($conn, $query2);
    if(!empty($facility)){
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
    }
    $sql_link = mysqli_query($conn, $query4);
}
if(!empty($facility))
    $x = implode(" ", $facility);
else
    $x = '';
 


require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'chaudhurypaul@gmail.com';
$mail->Password = 'Paul12345';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom("chaudhurypaul@gmail.com", "System");
$mail->addReplyTo("chaudhurypaul@gmail.com", "System");
$mail->addAddress("$student_mail");

$message = "
<h3> These are the details of the Student </h3>
<center>
<h4>Personal Details </h4>
<table>
            <thead> </thead>
            <tbody>

            <tr>
                <th>Student's name</th>
                <td> $first_name $last_name</td>
            </tr>
            <tr>
                <th>SIC</th>
                <td>$sic</td>
             </tr>
          <tr>
            <th>Gender</th>
            <td>
              $gender
            </td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td> $dob </td>
        </tr>
        <tr>
            <th>Age</th>
            <td> $age </td>
        </tr>
        <tr>
          <th>Guardian's Name</th>
          <td>$guardian_name</td>
        </tr>
        <tr>
          <th>Guardian's Relation with Student</th>
          <td>$relation</td>
        </tr>
        <tr>
            <th>Student email id</th>
            <td> $student_mail</td>
        </tr>
        <tr>
            <th>Guardian's email id</th>
            <td> $guardian_mail</td>
        </tr>
        <tr>
            <th>Student contact number </th>
            <td> $student_number</td>
        </tr>
        <tr>
            <th>Guardian's contact number </th>
            <td> $guardian_number</td>
        </tr>
        <tr>
            <th>Alternate Number </th>
            <td> 
              $alternate_num
           </td>
        </tr>
        <tr>
            <th>Address</th>
            <td> $address</td>
        </tr>
      </tbody>
  </table>
  

  <h4> Academic Details </h4>
  <table>
      <thead></thead>
      <tbody>
          <tr>
              <th>Branch</th>
              <td>$br</td>
          </tr>
          <tr>
              <th> Year of Study </th>
              <td>
                    $year
           
              </td>
          </tr>
          <tr> 
              <th>Facilities Availed</th>
              <td>$x
              </td>
          </tr>
      </tbody>
  </table>
            </tbody>
            </table>
            </center>";
$mail->Subject = "Student details as per entered in the form";
$mail->MsgHTML($message);


if($mail->Send()){
    $res = "Mail was sent successfully";
}
else{
    $res = $mail->ErrorInfo;
}
echo $res;

header("Location: form_personal.php");

?>


































<!-- /*
1. PUT EACH FORM IN DIFFERENT PAGES AND REDIRECT TO EACH OF THEM THROUGH THEIR RESPECTIVE .PHP FILES WHEN DATA IN EACH OF THEM IS PROVIDED.
2. CREATE A PSEUDO SUBMIT BUTTON, ON THE CLICK OF WHICH ALL THE VALUES OF THE FIELD WILL BE STORED IN THE $_SESSION VARIABLE AND THEN ON 
THE CLICK OF THE FINAL SUBMIT OF THE LAST FORM, ALL OF THOSE $_SESSION VARIABLES WILL BE ACCESSED IN THE .PHP FILE. THEN ALL THE FORMS WILL BE IN THE
SAME FILE AND THEY NEED NOT TO BE IN WRITTEN IN DIFFERENT .HTML FILES.
(ONLY POSSIBLE IF JS CAN BE WRITTEN IN .PHP FILE BECAUSE PHP CANT BE WRIITEN IN JS FILES COZ PHP IS  IN BACKEND AND JS IS IN FRONTEND).
3. USE AJAX TO DISPLAY THE FORMS.
4. PUT ALL THE DETAILS IN A SINGLE FORM AND THEN SEND THE DATA SELECTIVELY TO THEIR RESPECTIVE TABLES AFTER CHANGING THE QUERIES (EASISEST WAY OUT).
*/ -->

