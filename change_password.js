$(document).ready(function(){
    $("#sbt").prop("disabled", true);
    $("#sic").change(function(){
        var x = $("#sic").val();
        if(isNaN(x)){
            $("#user").replaceWith("<span id='user'> Username can only have digits </span>");
            $("#sbt").prop("disabled", true);

        }
        else if(x.length != 9){
            $("#user").replaceWith("<span id='user'> SIC length should be of 9 </span> ");
            $("#sbt").prop("disabled", true);

        }
        else{
            $("#user").replaceWith("<span id='user' style= 'color:green'> Username accepted </span>");
        }
    });

    $("#pswrd").change(function(){
        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])");
        var x = $("#pswrd").val();
        var p1 = /^(?=.*\d)/;
        var p2 = /^(?=.*[a-z])/;
        var p3 = /^(?=.*[A-Z])/;
        var p4 = /^(?=.*[!@#$%^&*])/;
        console.log(strongRegex.test(x));
        console.log(p1.test(x));
        console.log(p2.test(x));
        console.log(p3.test(x));
        console.log(p4.test(x));
        console.log(x);
        if(x.length < 8 || x.length > 15){
            $("#msg").replaceWith("<span id='msg'> Password length should be between 8-15</span>");
            $("#sbt").prop("disabled", true);
        }
        else if( !p1.test(x)){
            $("#msg").replaceWith("<span id='msg'> Password should have atleast 1 digit </span>");
            $("#sbt").prop("disabled", true);     
        }
        else if(!p2.test(x)){
            $("#msg").replaceWith("<span id='msg'> Password should have atleast 1 small case alphabet </span>");
            $("#sbt").prop("disabled", true);

        }
        else if(!p3.test(x)){
            $("#msg").replaceWith("<span id='msg'> Password should have atleast 1 capital case alphabet </span>");
            $("#sbt").prop("disabled", true);

        }
        else if(!p4.test(x)){
            $("#msg").replaceWith("<span id='msg'> Password should have atleast 1 special alphabet </span>");  
            $("#sbt").prop("disabled", true);

        }
        else{
            $("#msg").replaceWith("<span id='msg' style='color:green'> Password accepted </span>");
        }
    });
    $("#confirm").change(function(){
        var p = $("#pswrd").val();
        if(p == ''){
            $("#error").replaceWith("<span id='error'> Password not provided </span>");
            $("#sbt").prop("disabled", true);

        }
        else{
            var c = $("#confirm").val();
            if(c == p){
                $("#error").replaceWith("<span id='error' style='color:green'> Password matched </span>");
                $("#sbt").prop("disabled", false);
            }
            else{
                $("#error").replaceWith("<span id='error'> Passwords didnt match </span>");
                $("#sbt").prop("disabled", true);

            }
        }
    });
})