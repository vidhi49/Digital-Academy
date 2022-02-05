$(document).ready(function(){
	var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
	var c_Reg=/^[0-9]{10}$/;
	$("#submit").click(function(){
		var conlen = $('#cno').val();	
		if($("#sname").val() == '' && $("#address").val() == '' && $("#email").val() == '' &&  $("#cno").val() == ''  ){
				alert('Please Fill All the fields...');
				$("#sname").focus();	
				return false;
		}
		if ($('#sname').val()=='') {
			alert('Please Fill Name...');
				$("#sname").focus();
				return false;
		}
		if ($('#sname').val() != '') 
				{
					$.ajax({
						type: 'POST',
						url: 'namevalidate2.php',
						data: "sname="+$('#sname').val(),
						success: function (response) {
							if(response != "")
							{
								alert(response);
								$("#sname").focus();
								return false;
							}
						}
					});		
				}
		if ($('#email').val()=='') {
			alert('Please Fill Email...');
				$("#email").focus();
				return false;
			
			
		}
		else{
			if( e_Reg.test($("#email")))
				{
					alert('Please Fill Email in abc@xyz.com Format...');
					$("#email").focus();
					return false;
				}
			
			if ($('#email').val() != '') 
			{
					$.ajax({
						type: 'POST',
						url: 'emailvalidate2.php',
						data: "email="+$('#email').val(),
						success: function (response) {
							if(response != "")
							{
								alert(response);
								$("#email").focus();
								return false;
							}
						}
					});		
			}
		}
		if ($('#address').val()=='') {
			alert('Please Fill Address...');
				$("#address").focus();
				return false;
		}	
		if ($('#cno').val()=='') {
			alert('Please Fill Cnotact Number...');
				$("#cno").focus();
				return false;
		}
		else{
			
			if( conlen.length != 10 || c_Reg.test($("#cno"))==true){ 
				alert('Please Fill 10 Digit Contact');
				$("#cno").focus();
				return false;
			}
		}
	});
	
	$('#email, #cno,#sname').on('keyup', function () 
		{
			var clen=$('#cno').val();
			var email=$('#email').val();
			if ($('#sname').val() != '') 
			{
				$.ajax({
					type: 'POST',
					url: 'namevalidate.php',
					data: "sname="+$('#sname').val(),
					success: function (response) {
					  $('#smessage').html(response).css('color', 'red');
					}
				});
				
					
			}
			
		if( e_Reg.test(email)==false)
				{
					$('#emessage').html('Email Must be in abc@xyz Format').css('color', 'red');
				}
		else {
			$.ajax({
				type: 'POST',
				url: 'emailvalidate.php',
				data: "email="+$('#email').val(),
				success: function (response) {
				  $('#emessage').html(response).css('color', 'red');
				}
			});
			
		}
		
		if(c_Reg.test($("#cno")))
				{
					$('#cmessage').html('Contact Must be of 10 digit only').css('color', 'red');
				}
				else if(clen.length != 10 ){
			$('#cmessage').html(' PLEase enter 10 digit').css('color', 'red');
				
		}else{
			$('#cmessage').html('');
		}
		
			
		});
		
		
});