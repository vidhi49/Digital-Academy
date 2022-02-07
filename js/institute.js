$(document).ready(function(){
    $("#signin").click(function(){

		if ($('#address').val()=='')
        {
			alert('Please Fill Address...');
				$("#address").focus();
				return false;
		}
        // if ($('#city').val()=='') {
		// 	alert('Please Select City...');
		// 		$("#address").focus();
		// 		return false;
		// }
        // if ($('#state').val()=='') {
		// 	alert('Please Select State...');
		// 		$("#address").focus();
		// 		return false;
		// }
        // if ($('#country').val()=='') {
		// 	alert('Please Select Country...');
		// 		$("#address").focus();
		// 		return false;
		// }
		
	});
});