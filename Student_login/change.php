<?php session_start(); ?>
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
    <script src="js/change_password.js"></script>
    <style>
    body{
            background-color: silver;
            font-family: monospace;
            color:mediumblue;
            padding-top: 50px;
        }
    label{
            color:mediumblue;
            background-color:moccasin;
            text-align: center;

        }
    span{
            color: red;
            font-size: 17px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    h4{
        color: red;
        /* background-color:white; */
    }
    h1{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
            /* background-color: whitesmoke; */
    }
    </style>

</head>
<body>
    <div class="container">
        <br><br><br>
        <h1 class="text-center"><em> CHANGE PASSWORD </em></h1>
      
       
        <?php if(isset($_COOKIE['error'])){?>
                                <h4><?php echo $_COOKIE['error'] ?> </h4>
                           <?php } setcookie('error', '', time()-3500, '/');?>
<br><br>
        <center>
        <h4> Choose one of the two options to change password: </h4>
            <br><br>
            <button type="button" id="mail" class="btn btn-info"> Verify using Email method </button> 
            <button type="button" id="code" class="btn btn-info"> Verify using SIC </button>
        </center>
        <div id="mail_div" class="text-center">
            <br><br>
            <a href="send_otp.php"><button type="button" class="btn btn-secondary"> Send OTP </button></a>
        </div>


        <div id="sic_div">
         
                <br><br>
    <br>
                <form action="change_password.php" method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="id">Enter the SIC</label>
                            <input type = "text" id="sic" name = "sic" required> <br>
                            <span id="user"></span>
                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="password">Enter the new Password </label>
                            <input type="password" id="pswrd" name = "pswrd" required><br>
                            <span id="msg"></span><br>
                            <button type="button" class="btn btn-secondary rounded-pill" onclick = "show();">Show/Hide </button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="confirm" >Confirm Password</label>
                            <input type = "password" id = "confirm" required><br>
                            <span id="error"></span><br>
                            <button type="button" class="btn btn-secondary rounded-pill" onclick = "show_confirm();">Show/Hide</button>
                        </div>
                    </div>
            
                    <button type="submit" class="btn btn-outline-success" id="sbt">Submit</button>
                </form>
                <br> <br>
           
         
                
        </div>
       
    </div>
    <a href="profile.php" class="fixed-bottom">Back to Profile</a>
</body>
<script>
    $(document).ready(function(){
        $("#sic_div").hide();
        $("#mail_div").hide();
        $("#attempt2").hide();
        $("#mail").click(function(){
            $("#sic_div").hide();
            $("#mail_div").toggle();
        });
        $("#code").click(function(){
            $("#mail_div").hide();
            $("#sic_div").toggle();
        })
    });
    function show(){
        var x = document.getElementById("pswrd");
        if(x.type === "password")
            x.type = "type";
        else
            x.type = "password";
    }
    function show_confirm(){
        var x = document.getElementById("confirm");
        if(x.type === "password")
            x.type = "text";
        else 
            x.type = "password";
    }
</script>
</html>