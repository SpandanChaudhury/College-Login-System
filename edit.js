$(document).ready(function () {

    $("#FirstName").change(function () {
        // console.log("blur for first name");
        //alert("blurred");
        var x = $("#FirstName").val();
        // console.log(x);
        var y;
        var letters = /^[A-Za-z]+$/;
        if (!(letters.test(x)) || x.length == 0) {
            $("#correct").replaceWith("<span id='correct'> Input should only have alphabets </span>");
            clear_reset(this);

        }
        else {
            $("#correct").replaceWith("<span id='correct' style='color:green'> Input Accepted. </span>");
        }
    });

    $("#guardianName").change(function () {
        // console.log("blur for first name");

        var x = $("#guardianName").val();
        // console.log(x);
        var y;
        var letters = /^[A-Za-z ]+$/;
        // console.log(letters);
        if (!(letters.test(x)) || x.length == 0) {
            $("#message2").replaceWith("<span id='message2'> Input should only have alphabets </span>");
            clear_reset(this);
            //$("#submitbutton").attr('disabled', true);
        }
        else {
            $("#message2").replaceWith("<span id='message2' style='color:green'> Input Accepted. </span>");
            //$("#submitbutton").attr('disabled', false);
        }
    });
    $("#relation").change(function () {
        // console.log("blur for first name");
        //alert("blurred");
        var x = $("#relation").val();
        // console.log(x);
        var y;
        var letters = /^[A-Za-z]+$/;
        // console.log(letters);
        if (!(letters.test(x)) || x.length == 0) {
            $("#message3").replaceWith("<span id='message3'> Input should only have alphabets </span>");
            clear_reset(this);
            //$("#submitbutton").attr('disabled', true);
        }
        else {
            $("#message3").replaceWith("<span id='message3' style='color:green'> Input Accepted. </span>");
            //$("#submitbutton").attr('disabled', false);
        }
    });
    $("#LastName").blur(function () {
        var ln = $("#LastName").val();
        var letters = /^[A-Za-z]+$/;
        if (!(letters.test(ln)) || ln.length == 0) {
            $("#message1").replaceWith("<span id='message1'> Input should contain only alphabets </span>");
            clear_reset(this);
            //$("#submitbutton").attr('disabled', true);
            $("#s_email").val("");
        }
        else {

            $("#message1").replaceWith("<span id='message1' style='color:green'> Input Accepted! </span>");
            //$("#submitbutton").attr('disabled', false);
            var fn = $("#FirstName").val();
            if (fn != "" && ln != "") {
                var s = fn + ln + "@gmail.com";
            }
            else {
                var s = "";

            }
            $("#s_email").val(s);
        }
    });


    $("#student_number").change(function () {
        var x = $("#student_number").val();
        // console.log(x);
        // console.log(typeof (x));
        if (isNaN(x)) {
            $("#incorrect").replaceWith("<span id='incorrect'> Contact number can only contain digits </span>");
            clear_reset(this);
            //$("#submitbutton").attr('disabled', true);
        }
        else if (x.length > 12) {
            $("#incorrect").replaceWith("<span id='incorrect'> Contact number can have maximum 11 digits</span>");
            // $("#submitbutton").attr('disabled', true);
            clear_reset(this);
        }
        else if (x.length < 10) {
            $("#incorrect").replaceWith("<span id='incorrect'> Contact number should have minimum of 10 digits </span>");
            //$("#submitbutton").attr('disabled', true);
            clear_reset(this);
        }
        else {
            $("#incorrect").replaceWith("<span id='incorrect' style='color: green'> Accepted </span>");
            //$("#submitbutton").attr('disabled', false);
        }
    });
    $("#g_number").change(function () {
        var x = $("#g_number").val();
        // console.log(x);
        // console.log(typeof (x));
        if (isNaN(x)) {
            $("#message4").replaceWith("<span id='message4'> Contact number can only contain digits </span>");
            clear_reset(this);
            //$("#submitbutton").attr('disabled', true);
        }
        else if (x.length > 12) {
            $("#message4").replaceWith("<span id='message4'> Contact number can have maximum 11 digits</span>");
            //$("#submitbutton").attr('disabled', true);
            clear_reset(this);
        }
        else if (x.length < 10) {
            $("#message4").replaceWith("<span id='message4'> Contact number should have minimum of 10 digits </span>");
            //$("#submitbutton").attr('disabled', true);
            clear_reset(this);
        }
        else {
            $("#message4").replaceWith("<span id='message4' style='color: green'> Accepted </span>");
            //    $("#submitbutton").attr('disabled', false);
        }
    });
});
function clear_reset(x) {
    console.log("lets reset the field ");
    console.log(x.id);
    document.getElementById(x.id).value = "";
}
