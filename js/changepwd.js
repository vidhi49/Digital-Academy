
$(document).ready(function () {
    var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
    $("#change").click(function () {
        if ($("#currentpassword").val() != "") {
            if($("#currentpwd").text()!="")
            {
                alert($("#currentpwd").text());
                $("#currentpassword").focus();
                return false
            }
        }
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
    
    $('#newpassword, #confirmpassword ,#currentpassword').on('keyup', function () {

        if ($('#currentpassword').val() != '') {
			$.ajax({
				type: 'POST',
				url: 'passwordvalidate.php',
				data: "currentpassword=" + $('#currentpassword').val(),
				success: function (response) {
					$('#currentpwd').html(response).css('color', 'red');
				}
			});

		}
        if ($("#newpassword").val() != "") {
            var password = $("#newpassword").val();
            var len = password.length;
            if (len < 8) {
                $('#newpwd').html(' Password must be greater then 8 characters').css('color', 'red');

            }
            else if ($("#confirmpassword").val() != $("#newpassword").val()) {
                $('#newpwd').html('');
                $('#confirmmessage').html('Password Must be Match').css('color', 'red');


            }
            else {
                $('#confirmmessage').html('');
            }
        }

    });


});