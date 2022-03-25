
$(document).ready(function () {
    var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
    $("#reset").click(function () {
        if ($("#newpassword").val() != "") {
            var password = $("#newpassword").val();
            var len = password.length;
            if (len < 8) {
                alert('Password Must be Greater then 8 characters');
                $("#newpassword").focus();
                return false;
            }
            else if ($("#confirmpassword").val() != $("#newpassword").val()) {
                alert('Password Must be matched');
                $("#confirmpassword").focus();
                return false;

            }

        }
    });
    $("#send").click(function () {

        if ($('#emsg').text() != "") {
            alert($('#emsg').text());
            $("#e").focus();
            return false;

        }
    });
    $('#newpassword, #confirmpassword ,#e').on('keyup', function () {

        if (e_Reg.test($('#e').val()) == false) {
            $('#emsg').html('Please Fill Email in abc@xyz.com').css('color', 'red');
        }
        else {
            $('#emsg').html('').css('color', 'red');
        }

        if ($("#newpassword").val() != "") {
            var password = $("#newpassword").val();
            var len = password.length;
            if (len < 8) {
                $('#passwordmessage').html(' Password must be greater then 8 characters').css('color', 'red');

            }
            else if ($("#confirmpassword").val() != $("#newpassword").val()) {
                $('#passwordmessage').html('');
                $('#confirmmessage').html('Password Must be Match').css('color', 'red');


            }
            else {
                $('#confirmmessage').html('');
            }
        }

    });


});