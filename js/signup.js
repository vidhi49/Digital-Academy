
$(document).ready(function () {
	var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
	var c_Reg = /^[0-9]+$/;


	$("#submit").click(function () {
		//var conlen = $('#cno').val();
		if ($("#sname").val() == '' && $("#address").val() == '' && $("#email").val() == '' && $("#cno").val() == '') {
			alert('Please Fill All the fields...');
			$("#sname").focus();
			return false;
		}
		if ($('#sname').val() == '') {
			alert('Please Fill Name...');
			$("#sname").focus();
			return false;
		}

		if ($('#email').val() == '') {
			alert('Please Fill Email...');
			$("#email").focus();
			return false;
		}
		else {
			if (e_Reg.test($("#email").val()) == false) {
				alert('Please Fill Email in abc@xyz.com Format...');
				$("#email").focus();
				return false;
			}
		}


		if ($('#address').val() == '') {
			alert('Please Fill Address...');
			$("#address").focus();
			return false;
		}
		if ($('#cno').val() == '') {
			// alert($('#filemessage').text());
			alert('Please Fill Cnotact Number...');
			$("#cno").focus();
			return false;
		}
		else {

			if (c_Reg.test($('#cno').val()) == false) {
				alert('Please Fill Cnotact Number with digit only...');
				$("#cno").focus();
				return false;
			}
			else if ($('#cno').val().length != 10) {
				alert('Please Fill 10 digit number...');
				$("#cno").focus();
				return false;
			}
		}

		if ($('#sname').val() != '') {
			if ($('#smessage').text() != "") {
				alert($('#smessage').text());
				$("#sname").focus();
				return false;

			}
		}
		if ($('#email').val() != '') {
			if ($('#emessage').text() != "") {
				alert($('#emessage').text());
				$("#email").focus();
				return false;

			}
		}
		if ($('#cimg').val() != '') {
		if ($('#filemessage').text() != '') {
			alert($('#filemessage').text());
			$("#cimg").focus();
			return false;

		}
	}

	});
	$('#email, #cno,#sname').on('keyup', function () {
		//var clen = $('#cno').val();
		var email = $('#email').val();
		if ($('#sname').val() != '') {
			$.ajax({
				type: 'POST',
				url: 'namevalidate.php',
				data: "sname=" + $('#sname').val(),
				success: function (response) {
					$('#smessage').html(response).css('color', 'red');
				}
			});


		}

		if (e_Reg.test(email) == false) {
			$('#emessage').html('Email  be in abc@xyz Format').css('color', 'red');
		}
		else {
			$.ajax({
				type: 'POST',
				url: 'emailvalidate.php',
				data: "email=" + $('#email').val(),
				success: function (response) {
					$('#emessage').html(response).css('color', 'red');
				}
			});

		}

		if (c_Reg.test($('#cno').val()) == false) {
			$('#cmessage').html('Contact Must be of digit only').css('color', 'red');
		}
		else if ($('#cno').val().length != 10) {
			$('#cmessage').html(' PLEase enter 10 digit').css('color', 'red');

		}
		else {
			$('#cmessage').html('');
		}


	});


});