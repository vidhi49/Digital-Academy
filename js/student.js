
$(document).ready(function () {
	
    var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
	var c_Reg = /^[0-9]+$/;
	 
	$("#submit").click(function ()
    {
		
            if ($('#e').val()!= '') 
			{
				if($('#emsg').text() != "") 
				{
					alert($('#emsg').text());
					$("#e").focus();
					return false;

				}
			}
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
		
		
		
			
	});
	$('#e, #cno').on('keyup', function(){
		if (e_Reg.test($('#e').val()) == false) 
        {
			$('#emsg').html('Please Fill Email in abc@xyz.com').css('color', 'red');
		}
		else {
			$.ajax({
				type: 'POST',
				url: 'studentemail.php',
				data: "e=" + $('#e').val(),
				success: function (response) {  
					$('#emsg').html(response).css('color','red');
				}
			});

		}

		if (c_Reg.test($('#cno').val())==false) {
			$('#cmessage').html('Contact Must be of digit only').css('color', 'red');
		}
		else if($('#cno').val().length != 10)
		 {
			$('#cmessage').html(' Please enter 10 digit').css('color', 'red');

		}
		else 
		{
			$('#cmessage').html('');
		}


	});


});