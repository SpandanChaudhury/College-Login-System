$(document).ready(function(){
    $("#personal_section").hide();

   // $("#submitbutton").attr("disabled", true);
    $("#academic_section").hide();
    $("#message_part").hide();
    // $("#personal").hide();
    $("#correct").hide();
    $("#message1").hide();
    $("#message2").hide();
    $("#message3").hide();
    $("#message4").hide();
    $("#incorrect").hide();
    $("#age_id").hide();


    $("#Sect2").click(function(){
        // $("#personal").toggle();
        $("#message_part").toggle();
        // $("#form_submit").hide();
    });
    $("#reset_all").click(function(){
        alert("are you sure you want to reset the entire form??");
    });
    $("#submit_all").click(function(){
        alert(" Are you sure you want to submit??");
    });
    $("#open").click(function(){
        console.log(" this is the tag to open the form ");
        $("#personal_section").show("slow");
        // $("#academic_section"),hide();
    });
    
    $("#close").click(function(){
        console.log(" this is the tag to close the form ");
        $("#personal_section").hide("slow");
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
            $("#pwd_s").replaceWith("<span id='pwd_s''> Password length should be minimum of 8</span>");
        }
        else if( !p1.test(x)){
            $("#pwd_s").replaceWith("<span id='pwd_s'> Password should have atleast 1 digit </span>");
        }
        else if(!p2.test(x)){
            $("#pwd_s").replaceWith("<span id='pwd_s'> Password should have atleast 1 small case alphabet </span>");
        }
        else if(!p3.test(x)){
            $("#pwd_s").replaceWith("<span id='pwd_s'> Password should have atleast 1 capital case alphabet </span>");
        }
        else if(!p4.test(x)){
            $("#pwd_s").replaceWith("<span id='pwd_s'> Password should have atleast 1 special alphabet </span>");  
        }
        else{
            $("#pwd_s").replaceWith("<span id='pwd_s' style='color:green'> Password accepted </span>");
        }
    });
    $("#Username").change(function(){
        var x = $("#Username").val();
        if(isNaN(x)){
            $("#sic_msg").replaceWith("<span id='sic_msg'> Username should be only numbers </span> ");
        }
        else if(x.length != 9){
            $("#sic_msg").replaceWith("<span id='sic_msg'> Username should be of length 9 </span> ");
        }
        else{
            $("#sic_msg").replaceWith("<span id='sic_msg' style='color:green'> Username Accepted </span>");
        }
    });

    $("#c_pswrd").change(function(){
        var ps = $("#pswrd").val();
        if(ps == ""){
            $("#pwd_c").replaceWith("<span id='pwd_c'> PASSWORD NOT PROVIDED </span> ");
            $("#final_submit").attr("disabled", true);
        }
        else{
            var cps = $("#c_pswrd").val();
            if(cps == ps){
                $("#pwd_c").replaceWith("<span id='pwd_c' style='color:green'> Password Matched </span>");
                $("#final_submit").attr("disabled", false);
            }
            else{
                $("#pwd_c").replaceWith("<span id='pwd_c'> Passwords DIDNOT Match </span>");
                $("#final_submit").attr("disabled", true);
            }
        }
    });







    $("#submitbutton").click(function(){
        // console.log("show the academic section ");
        // $("#academic-div").show();
        alert("are you sure you want to continue??");
        let allAreFilled = true;
        console.log("this is under the submit button ");
        document.getElementById("personal_section").querySelectorAll("[required]").forEach(function(i) {
      //if (!allAreFilled) return;
            if (i.value == "") allAreFilled = false;
            if (i.type === "radio") {
                let radioValueCheck = false;
                document.getElementById("personal_section").querySelectorAll(`[name=${i.name}]`).forEach(function(r) {
                     if (r.checked) radioValueCheck = true;
                })
                allAreFilled = radioValueCheck;
            }
            if (i.type === "tel") {
                let radioValueCheck = false;
                document.getElementById("personal_section").querySelectorAll(`[name=${i.name}]`).forEach(function(r) {
                     if (r.checked) radioValueCheck = true;
                })
                allAreFilled = radioValueCheck;
            }
    })
            if (!allAreFilled) {
            alert('Fill all the required fields');
            console.log($("#next").attr('href'));
            $("#next").attr("href", "#personal_section");
            //console.log($("#next").attr('href'));
            //$("#next").prop("disabled", true);            // disable the link of the anchor tag. using the prevent default method works but it cant be undone. prop and attr doesnt work yet.
            //so try to find the way to remove the link. using "" relaods the page so it doesnt help.
            
                // $("#next").click(function(e){
                //     e.preventDefault();
                // });
            // $("#next").attr("href", "#form_div");
            }
            else
            { 
                console.log($("#next").attr('href'));
                //$("#next").attr("href", "form_jquery.html");
            //    // $("#next").attr("disabled", false);
            //     $("#next").click(function(e){
            //         return true;
            //     })
                // $("#next").attr("target", "_blank");
                $("#next").attr('href', '#academic_section');
                $("#academic_section").show();
                $("#reset_btn").attr("disabled", true);
                $("#submitbutton").attr("disabled", true);
                //  console.log($("#next").attr('href'));
            }
});

    // $("#final_submit").click(function(){
    //     alert("Do you want to submit?");
    //     let checkAll = true;
    //     document.getElementById("academic_form").
    // })
    $("#FirstName").change(function(){
        console.log("blur for first name");
        //alert("blurred");
        var x = $("#FirstName").val();
        console.log(x);
        var y;
        var letters = /^[A-Za-z]+$/;
        if(!(letters.test(x))|| x.length==0){
            $("#correct").replaceWith("<span id='correct'> Input should only have alphabets </span>");
            // $("#FirstName").delay( 9000 );
            // $("#FirstName").val("");
            clear_reset(this);
            //$("#submitbutton").attr('disabled', true);
        }
        else{
            $("#correct").replaceWith("<span id='correct' style='color:green'> Input Accepted. </span>");
            //$("#submitbutton").attr('disabled', false);
        } 
    });
    $("#guardianName").change(function(){
        console.log("blur for first name");
        //alert("blurred");
        var x = $("#guardianName").val();
        console.log(x);
        var y;
        var letters = /^[A-Za-z ]+$/;
        console.log(letters);
        if(!(letters.test(x))|| x.length==0){
            $("#message2").replaceWith("<span id='message2'> Input should only have alphabets </span>");
            clear_reset(this);
            //$("#submitbutton").attr('disabled', true);
        }
        else{
            $("#message2").replaceWith("<span id='message2' style='color:green'> Input Accepted. </span>");
            //$("#submitbutton").attr('disabled', false);
        } 
    });
    $("#relation").change(function(){
        console.log("blur for first name");
        //alert("blurred");
        var x = $("#relation").val();
        console.log(x);
        var y;
        var letters = /^[A-Za-z]+$/;
        console.log(letters);
        if(!(letters.test(x))|| x.length==0){
            $("#message3").replaceWith("<span id='message3'> Input should only have alphabets </span>");
            clear_reset(this);
            //$("#submitbutton").attr('disabled', true);
        }
        else{
            $("#message3").replaceWith("<span id='message3' style='color:green'> Input Accepted. </span>");
            //$("#submitbutton").attr('disabled', false);
        } 
    });
    $("#LastName").blur(function(){
        var ln = $("#LastName").val();
        var letters = /^[A-Za-z]+$/;
       // console.log(letters);
        if(!(letters.test(ln))|| ln.length==0){
           $("#message1").replaceWith("<span id='message1'> Input should contain only alphabets </span>");
           clear_reset(this);
           //$("#submitbutton").attr('disabled', true);
            $("#s_email").val("");
        }
        else{

            $("#message1").replaceWith("<span id='message1' style='color:green'> Input Accepted! </span>");
            //$("#submitbutton").attr('disabled', false);
            var fn = $("#FirstName").val();
            if(fn != "" && ln != ""){
                var s = fn + ln + "@gmail.com";
            }
            else{
                var s = "";
                
            }
            $("#s_email").val(s);
          }
    });


    $("#student_number").change(function(){  
        var x = $("#student_number").val();
        console.log(x);
        console.log(typeof(x));
        if(isNaN(x)){
            $("#incorrect").replaceWith("<span id='incorrect'> Contact number can only contain digits </span>");
            clear_reset(this);
            //$("#submitbutton").attr('disabled', true);
        }
        else if(x.length > 12)
        {
            $("#incorrect").replaceWith("<span id='incorrect'> Contact number can have maximum 11 digits</span>");
           // $("#submitbutton").attr('disabled', true);
           clear_reset(this);
        }
        else if(x.length < 10){
            $("#incorrect").replaceWith("<span id='incorrect'> Contact number should have minimum of 10 digits </span>");
            //$("#submitbutton").attr('disabled', true);
            clear_reset(this);
        }
        else{
            $("#incorrect").replaceWith("<span id='incorrect' style='color: green'> Accepted </span>");
            //$("#submitbutton").attr('disabled', false);
        }
    });
    $("#g_number").change(function(){  
        var x = $("#g_number").val();
        console.log(x);
        console.log(typeof(x));
        if(isNaN(x)){
            $("#message4").replaceWith("<span id='message4'> Contact number can only contain digits </span>");
            clear_reset(this);
            //$("#submitbutton").attr('disabled', true);
        }
        else if(x.length > 12)
        {
            $("#message4").replaceWith("<span id='message4'> Contact number can have maximum 11 digits</span>");
            //$("#submitbutton").attr('disabled', true);
            clear_reset(this);
        }
        else if(x.length < 10){
            $("#message4").replaceWith("<span id='message4'> Contact number should have minimum of 10 digits </span>");
            //$("#submitbutton").attr('disabled', true);
            clear_reset(this);
        }
        else{
            $("#message4").replaceWith("<span id='message4' style='color: green'> Accepted </span>");
        //    $("#submitbutton").attr('disabled', false);
        }
    });


    $("#ID").change(function(){
        var x = $("#ID").val();
        console.log(x);
        if(isNaN(x)){
            $("#sid").replaceWith("<span id='sid'> SIC should only have digits </span>");
           // $("#submitbutton").attr('disabled', true);
            clear_reset(this);
        }
        else if(x.length != 9){
            $('#sid').replaceWith("<span id='sid'> SIC should be of 9 digits </span>");
            //$("#submitbutton").attr('disabled', true);
            clear_reset(this);
        }
        else{
            $("#sid").replaceWith("<span id='sid' style='color:green'> Input Accepted. </span>"); 
            //$("#submitbutton").attr('disabled', false);
        }
    });

    $("#dob").change(function(){
        var x = $("#dob").val();
        // console.log(x);
        // console.log(typeof(x));
         var y = new Date(x);
        // console.log(y);
        // console.log(typeof(y));
         var n = new Date();
        // console.log(n);
        var diff = Math.floor((n - y)/(365 * 24 * 3600 * 1000));
        console.log(diff);
        console.log(typeof(diff));
        $("#age_label").val(diff);
        if(diff < 18 || isNaN(diff)){
            //console.log(" age is less than 19 ");
            $("#age_id").replaceWith("<span id='age_id'> Age is less than 19 </span> ");
            clear_reset(this);
            //$("#submitbutton").attr("disabled", true);
        }
        // else if(diff>60){
        //     $("#age_id").replaceWith("<span id='age_id'> Age is more than 60 </span>");
        //     clear_reset(this);
        // }
        else{
            //console.log("age is more than 19");
            $("#age_id").replaceWith("<span id='age_id' style='color:green'> Age accepted </span> ");
            //$("#submitbutton").attr("disabled", false);
        }
       
    });
    $("#age_label").keypress(function(e){
        var x = $("#age_label").val();
        console.log(x);
        e.preventDefault();
    });
    $("input[type='text']").focus(function(){
        $(".change").css("background-color", "green");
    });

});
function clear_reset(x){
    console.log("lets reset the field ");
    console.log(x.id);
    document.getElementById(x.id).value = "";
}
function show(){
    var s = document.getElementById("pswrd");
    if(s.type === "password"){
        s.type = "text";
    }
    else{
        s.type = "password";
    }
}
function show_confirm(){
    var s = document.getElementById("c_pswrd");
    if(s.type === "password"){
        s.type = "text";
    }
    else{
        s.type = "password";
    }
}
function show_pass(){
    var s = document.getElementById("pswd");
    if(s.type === "password"){
        s.type = "text";
    }
    else{
        s.type = "password";
    }
}



// THIS IS BY DISABLING THE SUBMIT BUTTON EACH TIME WHEN THE INPUT IS NOT ACCEPTED
/*
$(document).ready(function(){
    $("#form_div").hide();
    $("#submitbutton").attr("disabled", true);
    $("#academic-div").hide();
    $("#correct").hide();
    $("#message1").hide();
    $("#message2").hide();
    $("#message3").hide();
    $("#message4").hide();
    $("#incorrect").hide();
    $("#age_id").hide();

    $("#open").click(function(){
        console.log(" this is the tag to open the form ");
        $("#form_div").show("slow");
    });
    $("#close").click(function(){
        console.log(" this is the tag to close the form ");
        $("#form_div").hide("slow");
    });
 
    $("#submitbutton").click(function(){
        alert(" form submitted ");
    });

    $("#FirstName").change(function(){
        console.log("blur for first name");
        //alert("blurred");
        var x = $("#FirstName").val();
        console.log(x);
        var y;
        var letters = /^[A-Za-z]+$/;
        if(!(letters.test(x))|| x.length==0){
            $("#correct").replaceWith("<span id='correct'> Input should only have alphabets </span>");
            // $("#FirstName").delay( 9000 );
            // $("#FirstName").val("");
            $("#submitbutton").attr('disabled', true);
        }
        else{
            $("#correct").replaceWith("<span id='correct' style='color:green'> Input Accepted. </span>");
            $("#submitbutton").attr('disabled', false);
        } 
    });
    $("#guardianName").change(function(){
        console.log("blur for first name");
        //alert("blurred");
        var x = $("#guardianName").val();
        console.log(x);
        var y;
        var letters = /^[A-Za-z ]+$/;
        console.log(letters);
        if(!(letters.test(x))|| x.length==0){
            $("#message2").replaceWith("<span id='message2'> Input should only have alphabets </span>");
            $("#submitbutton").attr('disabled', true);
        }
        else{
            $("#message2").replaceWith("<span id='message2' style='color:green'> Input Accepted. </span>");
            $("#submitbutton").attr('disabled', false);
        } 
    });
    $("#relation").change(function(){
        console.log("blur for first name");
        //alert("blurred");
        var x = $("#relation").val();
        console.log(x);
        var y;
        var letters = /^[A-Za-z]+$/;
        console.log(letters);
        if(!(letters.test(x))|| x.length==0){
            $("#message3").replaceWith("<span id='message3'> Input should only have alphabets </span>");
            $("#submitbutton").attr('disabled', true);
        }
        else{
            $("#message3").replaceWith("<span id='message3' style='color:green'> Input Accepted. </span>");
            //$("#submitbutton").attr('disabled', false);
        } 
    });
    $("#LastName").blur(function(){
        var ln = $("#LastName").val();
        var letters = /^[A-Za-z]+$/;
       // console.log(letters);
        if(!(letters.test(ln))|| ln.length==0){
           $("#message1").replaceWith("<span id='message1'> Input should contain only alphabets </span>");
           $("#submitbutton").attr('disabled', true);
            $("#s_email").val("");
        }
        else{

            $("#message1").replaceWith("<span id='message1' style='color:green'> Input Accepted! </span>");
            $("#submitbutton").attr('disabled', false);
            var fn = $("#FirstName").val();
            if(fn != "" && ln != ""){
                var s = fn + ln + "@gmail.com";
            }
            else{
                var s = "";
                
            }
            $("#s_email").val(s);
          }
    });


    $("#student_number").change(function(){  
        var x = $("#student_number").val();
        console.log(x);
        console.log(typeof(x));
        if(isNaN(x)){
            $("#incorrect").replaceWith("<span id='incorrect'> Contact number can only contain digits </span>");
            $("#submitbutton").attr('disabled', true);
        }
        else if(x.length > 12)
        {
            $("#incorrect").replaceWith("<span id='incorrect'> Contact number can have maximum 11 digits</span>");
           $("#submitbutton").attr('disabled', true);
        }
        else if(x.length < 10){
            $("#incorrect").replaceWith("<span id='incorrect'> Contact number should have minimum of 10 digits </span>");
            $("#submitbutton").attr('disabled', true);
        }
        else{
            $("#incorrect").replaceWith("<span id='incorrect' style='color: green'> Accepted </span>");
            $("#submitbutton").attr('disabled', false);
        }
    });
    $("#g_number").change(function(){  
        var x = $("#g_number").val();
        console.log(x);
        console.log(typeof(x));
        if(isNaN(x)){
            $("#message4").replaceWith("<span id='message4'> Contact number can only contain digits </span>");
            $("#submitbutton").attr('disabled', true);
        }
        else if(x.length > 12)
        {
            $("#message4").replaceWith("<span id='message4'> Contact number can have maximum 11 digits</span>");
            $("#submitbutton").attr('disabled', true);
        }
        else if(x.length < 10){
            $("#message4").replaceWith("<span id='message4'> Contact number should have minimum of 10 digits </span>");
            $("#submitbutton").attr('disabled', true);
        }
        else{
            $("#message4").replaceWith("<span id='message4' style='color: green'> Accepted </span>");
            $("#submitbutton").attr('disabled', false);
        }
    });


    $("#ID").change(function(){
        var x = $("#ID").val();
        console.log(x);
        if(isNaN(x)){
            $("#sid").replaceWith("<span id='sid'> SIC should only have digits </span>");
            $("#submitbutton").attr('disabled', true);
        }
        else if(x.length != 9){
            $('#sid').replaceWith("<span id='sid'> SIC should be of 9 digits </span>");
            $("#submitbutton").attr('disabled', true);
        }
        else{
            $("#sid").replaceWith("<span id='sid' style='color:green'> Input Accepted. </span>"); 
            $("#submitbutton").attr('disabled', false);
        }
    });

    $("#dob").change(function(){
        var x = $("#dob").val();
        // console.log(x);
        // console.log(typeof(x));
         var y = new Date(x);
        // console.log(y);
        // console.log(typeof(y));
         var n = new Date();
        // console.log(n);
        var diff = Math.floor((n - y)/(365 * 24 * 3600 * 1000));
        console.log(diff);
        console.log(typeof(diff));
        $("#age_label").val(diff);
        if(diff < 18 || isNaN(diff)){
            //console.log(" age is less than 19 ");
            $("#age_id").replaceWith("<span id='age_id'> Age is less than 19 </span> ");
            $("#submitbutton").attr("disabled", true);
        }
        else{
            //console.log("age is more than 19");
            $("#age_id").replaceWith("<span id='age_id' style='color:green'> Age accepted </span> ");
            $("#submitbutton").attr("disabled", false);
        }
       
    });
    $("#age_label").keypress(function(e){
        var x = $("#age_label").val();
        console.log(x);
        e.preventDefault();
    });

});
*/