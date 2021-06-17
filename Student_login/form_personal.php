<?php 
session_start();
// session_destroy();
// setcookie("Eror_msg", 'No error', time() + 86400, '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
<!-- 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/personal_try.js"></script>
    <link rel="stylesheet" href="css/form_2.css">
</head>
<body>
    <section id="first">
        <center>
            <h2 class="col-md-8"> WELCOME TO THE LOG IN/ SIGN IN PAGE </h2>
            <?php if(isset($_SESSION['name'])){?>
                <h5 style='color:green'>
                    <?php echo $_SESSION['name']; unset($_SESSION['name']); ?>
                    ,Please Login to continue.
                 </h5>
            <?php } 
            else if(isset($_SESSION['error'])){?>
                <span><?php echo $_SESSION['error']; unset($_SESSION['error']); ?> </span>
            <?php } ?>
            <h2 class="col-md-8"> Choose any of the two options </h2>
            <button type="button" class="btn btn-outline-light" id="Sect1" data-toggle="modal" data-target='#form_md'>Log In</button>
            <button type='button' class="btn btn-outline-light" id="Sect2">Sign In</button>
        </center>
    </section>
    <hr> <hr><hr>
    <section id="log_in">
        <div id="logged">
            <?php if(isset($_COOKIE['error_log'])){?>
                <h5 class='text-center' style='color:red'><strong><?php echo $_COOKIE['error_log'] ?></strong> </h5>
            <?php } ?>

            <div class="modal fade" id="form_md" tabindex="-1" role="dialog" aria-labelledby="sign_in" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="sign_in">Enter your credentials</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                           <div class="text-center" id="bot">
                                <h5>Enter your credentials</h5>
                                <form name="log_in_form" action="log_in_student.php" method="post"> 
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label name="Username"><strong>Enter your Username</strong> </label>
                                            <input type="text" id="Username" placeholder="Username" required name="sic_code"><br>
                                            <span id="sic_msg"></span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label name="pswd"><strong>Password</strong></label>
                                            <input type="password" id="pswd" placeholder="Password" name="pwd_log" required><br>
                                            <button type="button" class="btn btn-primary rounded-pill" onclick = show_pass();>Hide/Show</button><br><br>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <button type="reset" class="btn btn-danger" id="reset_all"><strong>Reset</strong></button>
                                            <button type="submit" class="btn btn-success" id="submit_all"><strong>Proceed</strong></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- <div class="modal-footer">
                        < <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button> >
                            
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="personal">
        <div class="container">
            <div id="message_part">
                <center>
                    <h3 class="col-md-8"> enter the details in the form </h3>

                    <button id="open" type="button" class="btn btn-outline-light"> Click to open the form </button>
                    <button id = "close" type='button' class="btn btn-outline-light"> Click to close the form </button>
                </center>
                
            </div>
            <div id="form_submit">
                <form name="personal_form" id="personal_form" enctype="multipart/form-data" action="details_store.php" method="post">
                    <fieldset id="personal_section">
                        <legend>
                            <hr><hr>
                            <h3 class="text-center"><strong> PERSONAL INFO SECTION </strong></h3>
                        </legend>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="FirstName"><strong>First Name</strong></label>
                                <input  type="text" class="form-control" id="FirstName" placeholder="First Name" name="fn" required>
                                <span id="correct"> </span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="LastName"><strong>Last Name</strong></label>
                                <input type="text" class="form-control" id="LastName" placeholder="last name" name = "ln" required>
                                <span id ="message1">Message </span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="guardianName"><strong>Guardian's Name</strong></label>
                                <input type="text" class="form-control" id="guardianName"  placeholder="Guardian's Name" required name="g_n">
                                <span id="message2"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="relation"><strong>Guardian's relation with student</strong></label>
                                <input type="text" class="form-control" id="relation"  placeholder="relation" required name="gs_rel">
                                <span id='message3'></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="address"><strong>Address </strong></label>
                                <input type="text" class="form-control" id="address"  placeholder="1234 Main St" required name = "addr">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="s_email"><strong>Student's email id</strong></label>
                                <input type="email" class="form-control" id="s_email" placeholder="student's email" required name = "s_mail">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="g_email"><strong>Guardian's email id</strong></label>
                                <input type="email" class="form-control" id="g_email"   placeholder="guardian's email" name = "g_mail" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class = "form-group col-md-6">
                                <label for="Student_Id"><strong>Student Id</strong></label>
                                <input type="text" class="form-control" id="ID" placeholder="Student Id" name = "s_id" required>
                                <span id="sid"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="student_number"><strong>Student's contact number</strong></label>
                                <input type="tel" class="form-control" id="student_number"  placeholder="Student's contact number" name = "s_num" required>
                                <span id="incorrect">Contact number can only contain digits</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="g_number"><strong>Guardian's contact number</strong></label>
                                <input type="tel" class="form-control" id="g_number" placeholder="Guardian's contact number" name = "g_num" required>
                                <span id="message4"></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="alternate_number"><strong>Alternate Contact Number</strong> </label>
                                <input type="tel" class="form-control" id="alternate_number" placeholder="Alternate Contact Number" name = "a_num">
                            </div>  
                        </div>        
                        <div class='form-row'>
                            <div class="form-group col-md-6">
                                <p> <strong>Gender</strong> </p>
                                <input type="radio" name="sex" value='M' required>male
                                <input type="radio" name="sex" value = "F" required>female
                                <input type="radio" name="sex" value="O" required>Others
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dob"> Date of Birth </label>
                                <input type="date" id = "dob" name = "dob" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label id="age_l"> Age </label>
                                <input typ="text" id="age_label" name = "age_s"><br>
                                <span id= "age_id"> this is the message span </span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="image">Provide student image </label>
                                <input type="file" id = "img" name ="img" required>
                            </div>
                        </div>
                        <center>
                            <!-- <button type="submit" id="acad" class="btn btn-success"> <a href="form_jquery.html">Next</a></button></a> -->
                            <a href="" id="next"><button type="button" id="submitbutton" class="btn btn-outline-success">Next</button></a>
                            <!-- <button type="button" id="submitbutton" class="btn btn-success">Next</button> -->
                            <button type="reset" id="reset_btn" class="btn btn-outline-danger">Reset</button>
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
                                <input type="checkbox" name="check[]" value="Bus"id = 'fac'>Bus
                                <input type="checkbox" name="check[]" value="Mess"id='fac'>Mess
                                <input type="checkbox" name="check[]" value="Gym" id='fac'>Gym
                            </div>
                            <div class="form-group col-md-4">
                                <p> <strong>YEAR OF STUDY</strong></p>
                                <input type = "radio" name = "year" value= "1" required id='fac'> 1st Year
                                <input type = "radio" name = "year" value = "2" required id='fac'> 2nd Year
                                <input type = "radio" name = "year" value = "3" required id='fac'> 3rd Year
                                <input type = "radio" name = "year" value = "4" required id='fac'> 4th Year
                            </div>
                            <div class="form-group col-md-4">
                                <p><strong> BRANCH </strong></p>
                                <input type="radio"  id="branch" value="CSE" name="branch" required>CSE
                                <input type="radio"  id = "branch" value = "ECE" name = "branch" required> ECE
                                <input type="radio"  id="branch" value = "EEE" name = "branch" required>EEE
                                <input type="radio" id='branch' value="EIE" name="branch" required> EIE
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <P><strong>PASSWORD </strong></P>
                                <input type="password" id='pswrd' name="password" required><br>
                                <span id="pwd_s"></span><br>
                                <!-- <input type="checkbox" id="show_pwd" onclic -->
                                <button type="button" class="btn btn-dark rounded-pill" onclick = show();>Hide/show</button>

                            </div>
                            <div class="form-group col-md-4">
                                <P><strong>CONFIRM PASSWORD </strong></P>
                                <input type="password" id='c_pswrd' name="check_pwd" required><br>
                                <span id="pwd_c"></span><br>
                                <button type="button" class="btn btn-dark rounded-pill" onclick = show_confirm();>Hide/show</button>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <!-- <div class="text-center"> -->
                                <span>
                                    <p> The password should have:</p>
                                    <ul>
                                        <li>Atleast one digit</li>
                                        <li>Atleast one upper case character </li>
                                        <li>Atleast one lower case character </li>
                                        <li>Atleast one special character - !@#$%^&*</li>
                                        <li>The length between 8-15</li>
                                    </ul>
                                </span>
                                <!-- </div> -->
                            </div>
                        </div>
                
                        <center>
                            <button type="submit" id="final_submit" class="btn btn-success">Submit </button>
                            <button type="reset" id="final_reset" class="btn btn-danger">Reset </button>
                        </center>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
    <a href="index.html" class="fixed-bottom">Return to Index </a>
</body>
</html>