<?php
session_start();
include "connection_student.php";

$username = $_REQUEST['sic_code'];
$pwd = $_REQUEST['pwd_log'];

// echo $username."<br>". $pwd;
if($username == 'admin' && $pwd == '123456789'){
    $_SESSION['admin'] = "WELCOME ADMIN!!";
    header("Location: admin_login.php");
}
else{
    $query = "SELECT PASSSWORD FROM log_in_data WHERE SIC = $username";
    // echo $query;

    $db_link = mysqli_query($conn, $query);
    if(!$db_link){
        $msg = "Sorry, could not connect with data base";
        // echo $_SESSION['error_log'];
        setcookie("error_log", $msg, time() + 86400, '/');
        header("Location: form_personal.php");
    }
    else{
        $sql_result = mysqli_fetch_array($db_link);
        // print_r($sql_result);
        $stored_password = $sql_result['PASSSWORD'];
        // echo "<br>".$stored_password;
        $count = mysqli_num_rows($db_link);
        // echo "<br>".$count;
        if($count == 1){
            
            if($pwd == $stored_password){
                $query_name = "SELECT FIRST_NAME, LAST_NAME, IMAGE_PATH FROM PERSONAL WHERE SIC = '$username'";
                $db_link = mysqli_query($conn, $query_name);
                if(!$db_link){
                    $msg = "Sorry, could not load data from data base";
                    setcookie("error_log", $msg, time() + 86400, '/');
                    header("Location: form_personal.php");
                    // header("Location: form_personal.php");
                    // echo $_SESSION['error_log'];

                }
                else{
                    $sql_result = mysqli_fetch_array($db_link);
                    // echo "<br>";
                    // print_r($sql_result);
                    $first_name = $sql_result[0];
                    $last_name = $sql_result[1];
                    $msg = "Welcome ".$first_name.' '. $last_name;
                    // echo $msg;
                    // $_SESSION['welcome'] = $msg;
                    // $_SESSION['sic'] = $username;
                    // $_SESSION['path'] = $sql_result['IMAGE_PATH'];
                    setcookie("welcome", $msg, time() + 86400, '/');
                    setcookie("sic", $username, time() + 86400, '/');
                    setcookie("path", $sql_result['IMAGE_PATH'], time() + 86400, '/');
                    header("Location: logged_in.php");
                }
            }
            else{
                $msg = "Incorrect Password. Access Denied";
                setcookie("error_log", $msg, time() + 86400, '/');
                header("Location: form_personal.php");
                // header("Location: form_personal.php");
                // echo $_SESSION['error_log'];

            }
        }
        else{
            $msg = "No such data exists, please Sign in first.";
            setcookie("error_log", $msg, time() + 86400, '/');
            header("Location: form_personal.php");
            // header("Location: form_personal.php");
            // echo $_SESSION['error_log'];

        }
        
    }
}










?>
