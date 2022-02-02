$(document).ready(function(){
	var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
	$("#submit").click(function(){
		var conlen = $('#cno').val();
		var plen = $('#pwd').val();		
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
		if ($('#address').val()=='') {
			alert('Please Fill Address...');
				$("#address").focus();
				return false;
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
			
		}
		if ($('#cno').val()=='') {
			alert('Please Fill Cnotact Number...');
				$("#cno").focus();
				return false;
		}
		else{
			
			if( conlen.length != 10 ){ 
				alert('Please Fill 10 Digit Contact');
				$("#cno").focus();
				return false;
			}
		}
	});
	$('#email, #cno ').on('keyup', function () 
		{
			
			var clen=$('#cno').val();
			var email=$('#email').val();
			
		if( e_Reg.test(email)==false)
				{
					$('#emessage').html('Email Must be in abc@xyz Format').css('color', 'red');
				}
		else{
			$('#emessage').html('');
				
		}
		
		if(clen.length != 10)
				{
					$('#cmessage').html('Contact Must be of 10 digit only').css('color', 'red');
				}else{
			$('#cmessage').html('');
				
		}
			
			
		});
		
		
});