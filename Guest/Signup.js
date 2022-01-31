$(document).ready(function(){
	var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
	var p_regex1=/([a-zA-Z])/;
	var p_regex2=/([0-9])/;
	var p_regex3=/([!,%,&,@,#,$,^,*,?,_,~])/;
	var username="";
	$("#submit").click(function(){
		var conlen = $('#cno').val();
		var plen = $('#pwd').val();		
		if($("#sname").val() == '' && $("#address").val() == '' && $("#email").val() == '' && $("#uname").val() == '' && $("#cno").val() == '' && $("#pwd").val() == '' && $("#cpwd").val() == ''  ){
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
		if ($('#uname').val()=='') {
			alert('Please Fill Username...');
				$("#uname").focus();
				return false;
		}
		if ($('#uname').val() !=''){
			var data = "user=" + $('#uname').val();
			$.ajax({
					method: "post",
					url: "regi.php",
					data: data,
					success: function(result)
					{
						username = result;
					}	
					
				});
		}
		if( username == "")
			{
				alert('Please take Username...');
				$("#uname").focus();
				return false;
		}
		
		if ($('#pwd').val() == '' || plen.length < 8  ) {
			alert('Please Fill Password of atleast 8 characters...');
				$("#pwd").focus();
				return false;
		}
		else{
				if(p_regex1.test(plen)==false || p_regex2.test(plen)==false || p_regex3.test(plen)==false)
				{
					alert('Please Fill Strong Password...');
						$("#pwd").focus();
						return false;
				}
				else if( $('#pwd').val() != $('#cpwd').val())
					{
						alert('Password Must be Matched...');
						
						$("#cpwd").focus();
						return false;	
					}
		}
		
	});
	$('#uname').on('input', function() {
			var data = "user=" + $('#uname').val();
			$.ajax({
					method: "post",
					url: "regi.php",
					data: data,
					success: function(result)
					{
						$("#umessage").html(result).css('color','red');	
										
					},
					error:function(){}
						
					
				});
		});
	$('#email, #cno ,#pwd ,#cpwd ').on('keyup', function () 
		{
			var len=$('#pwd').val();
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
			if(len.length > 6)
				{
					if ($('#pwd').val() === $('#cpwd').val()) 
					{
						$('#message').html('');
					} 
					else 
					{
						$('#message').html('Not Matching').css('color', 'red');
						
					}
					$('#messagepwd').html('');
				}
			else
				{
					$('#messagepwd').html('Must be greater then 8 character').css('color', 'red');	
				}
			
				
			
		});
		
});