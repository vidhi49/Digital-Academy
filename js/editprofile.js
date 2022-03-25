
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
			if (e_Reg.test($("#email").val())==false) 
			{
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
			alert('Please Fill Cnotact Number...');
			$("#cno").focus();
			return false;
		}
		else {

			if (c_Reg.test($('#cno').val())==false) {
				alert('Please Fill Cnotact Number with digit only...');
				$("#cno").focus();
				return false;
			}
			else if($('#cno').val().length != 10)
			 {
				alert('Please Fill 10 digit number...');
				$("#cno").focus();
				return false;	
			}
		}
		
		if ($('#sname').val() != '') 
			{
				if($('#smessage').text() != "") 
				{
					alert($('#smessage').text());
					$("#sname").focus();
					return false;

				}
			}
		if ($('#email').val() != '') 
			{
				if($('#emessage').text() != "") 
				{
					alert($('#emessage').text());
					$("#email").focus();
					return false;

				}
			}
			
	});
	$('#e, #cno,#institutename').on('keyup', function () {
		//var clen = $('#cno').val();
		var email = $('#e').val();
		if ($('#institutename').val() != '') {
			$.ajax({
				type: 'POST',
				url: 'ajaxinstitutename.php',
				data: "instname=" + $('#institutename').val(),
				success: function (response) {
					$('#nmsg').html(response).css('color', 'red');
				}
			});


		}

		if (e_Reg.test(email) == false) {
			$('#emsg').html('Email Must be in abc@xyz Format').css('color', 'red');
		}
		else {
			$.ajax({
				type: 'POST',
				url: 'ajaxinstituteemail.php',
				data: "email=" + email,
				success: function (response) {
					$('#emsg').html(response).css('color', 'red');
				}
			});

		}

		if (c_Reg.test($('#cno').val())==false) {
			$('#cmessage').html('Contact Must be of digit only').css('color', 'red');
		}
		else if($('#cno').val().length != 10)
		 {
			$('#cmessage').html(' PLEase enter 10 digit').css('color', 'red');

		}
		else 
		{
			$('#cmessage').html('');
		}


	});


});