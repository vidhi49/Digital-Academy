$(document).ready(function(){
	var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
    $("#add").click(function(){
		
		if ($('#eid').val()=='') {
			alert('Please Fill Email...');
				$("#eid").focus();
				return false;
		}
		if ($('#emsg').text() != "") {
            alert($('#emsg').text());
            $("#e").focus();
            return false;

        }
		if ($('#mpwd').text() != "") {
            alert($('#mpwd').text());
            $("#pwd").focus();
            return false;

        }
		if ($('#mcpwd').text() != "") {
            alert($('#mcpwd').text());
            $("#cpwd").focus();
            return false;

        }
		if ($('#pwd').val()=='') {
			alert('Please Fill password...');
				$("#pwd").focus();
				return false;
		}
	});
	$('#pwd, #cpwd ,#eid').on('keyup', function () {
        if (e_Reg.test($('#eid').val()) == false) {
            $('#emsg').html('Please Fill Email in abc@xyz.com').css('color', 'red');
        }
        else {
            $.ajax({
				type: 'POST',
				url: 'ajaxEmail.php',
				data: "email=" + $('#eid').val(),
				success: function (response) {
					$('#emsg').html(response).css('color', 'red');
				}
			});
        }

        if ($("#pwd").val() != "") {
            var password = $("#pwd").val();
            var len = password.length;
            if (len < 8) {
                $('#mpwd').html(' Password must be greater then 8 characters').css('color', 'red');

            }
            else if ($("#cpwd").val() != $("#pwd").val()) {
                $('#mpwd').html('');
                $('#mcpwd').html('Password Must be Match').css('color', 'red');


            }
            else {
                $('#mcpwd').html('');
            }
        }

    });

});