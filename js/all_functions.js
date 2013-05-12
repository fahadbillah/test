// My JavaScript Document
		
$("#log_out").click(function(e){		
	if (!confirm("Do you confirm log out?"))
	{
		e.preventDefault();
		return;
	} 		
})