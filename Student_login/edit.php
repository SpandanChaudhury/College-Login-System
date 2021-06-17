<?php
session_start();
$x = $_GET['sic'];
// echo $x;

include "connection_student.php";
$query = "SELECT P.*, A.BRANCH, A.YEAR_OF_STUDY FROM PERSONAL P, ACADEMICS A WHERE P.SIC = $x AND P.SIC = A.SIC";
$f_query = "SELECT GROUP_CONCAT(FACILITY_NAME) FROM FACILITY_MASTER WHERE FNO IN (SELECT FNO FROM FACILITY WHERE SIC = $x)";
$tbl_link = mysqli_query($conn, $query);
$f_link = mysqli_query($conn, $f_query);
$res = mysqli_fetch_array($tbl_link);
$f_res = mysqli_fetch_array($f_link);
// print_r($f_res);
// exit;
// print_r($f_ar);
// exit;
// echo "<pre>";
// print_r($res);
// print_r($f_res);
// exit;
// echo "<pre>";
// print_r($res);
// exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/edit.js"></script>
    <link rel="stylesheet" href="css/form_2.css">
    <title>Edit details</title>
</head>
<body>
    
  

    <div id="form_submit" class="container">
        
    <h1 class= "text-center" style="background-color: lightblue; color:black; font-size: 75px;"><b> UPDATE DATA </b></h1>
    <hr>
        <form name="personal_form" id="personal_form" action="edit_details.php" method="post">
            <fieldset id="personal_section">
                <legend>
                    <hr><hr>
                    <h3 class="text-center"><strong> PERSONAL INFO SECTION </strong></h3>
                </legend>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="FirstName"><strong>First Name</strong></label>
                        <input  type="text" class="form-control" id="FirstName" value="<?php echo $res['FIRST_NAME'] ?>" name="fn" required>
                        <span id="correct"> </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="LastName"><strong>Last Name</strong></label>
                        <input type="text" class="form-control" id="LastName" value="<?php echo $res['LAST_NAME'] ?>" name = "ln" required>
                        <span id ="message1"> </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="guardianName"><strong>Guardian's Name</strong></label>
                        <input type="text" class="form-control" id="guardianName" value="<?php echo $res['GUARDIAN_NAME'] ?>" required name="g_n">
                        <span id="message2"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="relation"><strong>Guardian's relation with student</strong></label>
                        <input type="text" class="form-control" id="relation" value="<?php echo $res['RELATION'] ?>" required name="gs_rel">
                        <span id='message3'></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="address"><strong>Address </strong></label>
                        <input type="text" class="form-control" id="address"  value="<?php echo $res['ADDRESS'] ?>" required name = "addr">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="s_email"><strong>Student's email id</strong></label>
                        <input type="email" class="form-control" id="s_email" value="<?php echo $res['Student_email_id'] ?>" required name = "s_mail">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="g_email"><strong>Guardian's email id</strong></label>
                        <input type="email" class="form-control" id="g_email"  value="<?php echo $res['Guardian_email_id'] ?>" name = "g_mail" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class = "form-group col-md-6">
                        <input type="hidden" class="form-control" id="ID" value="<?php echo $res['SIC'] ?>" name = "s_id" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="student_number"><strong>Student's contact number</strong></label>
                        <input type="tel" class="form-control" id="student_number"  value="<?php echo $res['STUDENT_CONTACT_NUM'] ?>" name = "s_num" required>
                        <span id="incorrect"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="g_number"><strong>Guardian's contact number</strong></label>
                        <input type="tel" class="form-control" id="g_number" value="<?php echo $res['GUARDIAN_CONTACT_NUM'] ?>" name = "g_num" required>
                        <span id="message4"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="alternate_number"><strong>Alternate Contact Number</strong> </label>
                        <input type="tel" class="form-control" id="alternate_number" value="<?php echo ($res['ALTERNATE_NUM'] == NULL)?"":$res['ALTERNATE_NUM'] ?>" name = "a_num">
                    </div>  
                </div>        
            

                
                <center>
                    <!-- <button type="submit" id="acad" class="btn btn-success"> <a href="form_jquery.html">Next</a></button></a> -->
                    <!-- <a href="" id="next"><button type="button" id="submitbutton" class="btn btn-outline-success">Next</button></a> -->
                    <!-- <button type="button" id="submitbutton" class="btn btn-success">Next</button> -->
                    <!-- <button type="reset" id="reset_btn" class="btn btn-outline-danger">Reset</button> -->
                </center>
                
            </fieldset>
            <fieldset id="academic_section">
                <legend id="academic_legend">
                    <hr><hr>
                    <h3 class="text-center"><strong>ACADEMIC SECTION </strong></h3>
                    <br><br>
                </legend>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <p><strong> FACILITIES REQUIRED </strong></p>
                        <?php $f_ar = explode(",", $f_res[0]);?>
                            <input type="checkbox" name="check[]" value="Bus"id = 'fac' <?php if(in_array("Bus", $f_ar)) { echo 'checked'; }?>> Bus                        
                            <input type="checkbox" name="check[]" value="Mess"id='fac'<?php if(in_array("Mess", $f_ar)) { echo 'checked'; }?>>Mess
                            <input type="checkbox" name="check[]" value="Gym"id='fac'<?php if(in_array("Gym", $f_ar)) { echo 'checked'; }?>>Gym
                    </div>

                    <div class="form-group col-md-4">
                        <p> <strong>YEAR OF STUDY</strong></p>
                        <input type = "radio" name = "year" value="1" required id='fac'<?php if($res['YEAR_OF_STUDY'] == 1) { echo 'checked';} ?>> 1st Year

                        <input type = "radio" name = "year" value="2" required id='fac' <?php if($res['YEAR_OF_STUDY'] == 2) { echo 'checked';} ?>> 2nd Year
                        <input type = "radio" name = "year" value="3" required id='fac'<?php if($res['YEAR_OF_STUDY'] == 3) { echo 'checked';} ?> > 3rd Year
                        <input type = "radio" name = "year" value="4" required id='fac' <?php if($res['YEAR_OF_STUDY'] == 4) { echo 'checked';} ?>> 4th Year
                    </div>
                    <div class="form-group col-md-4">
                        <p><strong> BRANCH </strong></p>
                        <input type="radio"  id="branch" value="CSE" name="branch" required <?php if($res['BRANCH'] == 'CSE') { echo 'checked';} ?>>CSE
                        <input type="radio"  id = "branch" value="ECE" name = "branch" required <?php if($res['BRANCH'] == 'ECE') { echo 'checked';} ?>> ECE
                        <input type="radio"  id="branch" value="EEE" name = "branch" required <?php if($res['BRANCH'] == 'EEE') { echo 'checked';} ?>>EEE
                        <input type="radio" id='branch' value="EIE" name="branch" required <?php if($res['BRANCH'] == 'EIE') { echo 'checked';} ?>> EIE
                    </div>
                </div>
                
                <center>
                    <button type="submit" id="final_submit" class="btn btn-success">Submit </button>
                    <button type="reset" id="final_reset" class="btn btn-danger">Reset </button>
                </center>
            </fieldset>
        </form>

    </div>
    <div>
        <a href="data_table.php">Cancel Edit </a>
</div>

</body>
</html>