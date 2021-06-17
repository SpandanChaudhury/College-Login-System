<?php
session_start();
                $sic = $_COOKIE['SIC'];
                include "connection_student.php";
                $query = "SELECT Student_email_id, FIRST_NAME, LAST_NAME from PERSONAL WHERE SIC = $sic";
                // echo $query;
                $tbl_link = mysqli_query($conn, $query);
                $res = mysqli_fetch_array($tbl_link);
                // print_r($res);
                $mail_stud = $res[0];
                // echo $mail_stud;
                $name = $res[1]. " ". $res[2];
                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                // echo $otp;
                $msg = "<div> 
                        <h3> Hello $name ($sic) </h3>
                        <p> There was a request to change the password of your account in the Login System.<br>
                        Your 6 digit OTP for the same is: <b>$otp </b>.<br>
                        Enter this in your screen to continue the Changing Password process.<br>
                        </div> ";
                // echo $msg;
                include "connection_student.php";
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
                $mail->addAddress("$mail_stud");

                // $message = "<div> Hello, this is a test message </div>";
                $mail->Subject = "Student System Password Change confirmation";
                $mail->MsgHTML($msg);


                if($mail->Send()){
                    $res = "OTP was sent successfully to the mail id-". $mail_stud;
                    $st = 1;
                }
                else{
                    $res = $mail->ErrorInfo;
                    $st = 0;
                }
            // echo $res."  ". $st;
            $_SESSION['res'] = $res;
            $_SESSION['st'] = $st;
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Change Password</title>
    <style>

        h3{
            color: red;
        }
    </style>
</head>
<body>

<br><br>

<?php if(isset($_SESSION['otp_error'])){?>
           <center> <h3> <?php echo $_SESSION['otp_error'];
            unset($_SESSION['otp_error']); ?> </h3><h4> Retry again or <a href="change.php"> Go Back </a> </h4> <?php } ?> </center>
<h4><?php if(isset($_SESSION['res'])) {?>
    <h4 class="text-center"> <?php echo $_SESSION['res']; } ?> </h4><br><br><br>
            <?php if(isset($_SESSION['st']) && $_SESSION['st'] == 1) { ?>
                <form name = "otp_check" action="check_otp.php" method = "post">
                    <center>
                        <label for="msg">Enter the 6 digit OTP sent on your mail </label>
                        <input type = "tel" required name = "otp"><br><br>
                        <button type="submit" id="otp_submit" class="btn btn-success">Continue </button>
                    </center>
                </form>
            <?php } ?>

</body>

</html>

















                