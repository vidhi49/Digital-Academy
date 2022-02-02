$(document).ready(function(){
    $("#add").click(function(){
		var e_Reg = /^([a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
		if ($('#eid').val()=='') {
			alert('Please Fill Email...');
				$("#eid").focus();
				return false;
		}
		else{
			if( e_Reg.test($("#eid")))
				{
					alert('Please Fill Email in abc@xyz.com Format...');
					$("#eid").focus();
					return false;
				}
			
		}
		if ($('#pwd').val()=='') {
			alert('Please Fill password...');
				$("#pwd").focus();
				return false;
		}
	});
});