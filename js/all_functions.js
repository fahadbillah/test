// My JavaScript Document
		 //onClick="changeButtonForCostEdit()"
$("#log_out").click(function(e){		
	if (!confirm("Do you confirm log out?"))
	{
		e.preventDefault();
		return;
	} 		
})

 		
function changeButtonForCostEdit(){
	$('#cost_edit_box_for_local_boss').removeAttr('disabled')
	setTimeout(function(){
		$('#cost_edit').hide('fast')
		$('#cost_edit_finish').show('fast');		
	},500)
} 
function changeButtonForCostEditFinish(){
	value = $('#cost_edit_box_for_local_boss').val()
	if(value == '0' || value == '')
		alert('Please insert valid amount!')
	else
		$.post('form_handler.php', $("#local_boss_cost_edit").serialize(), function(data) {
		  $('#notice').html(data);
		});
	setTimeout(function(){
		$('#cost_edit').show('fast')
		$('#cost_edit_finish').hide('fast');
		$('#cost_edit_box_for_local_boss').attr('disabled', '')
	},500)
}

//$('#')