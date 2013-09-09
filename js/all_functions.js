// My JavaScript Document
		 //onClick="changeButtonForCostEdit()"
		 
var time = 0;
$("#log_out").click(function(e){		
	if (!confirm("Do you confirm log out?"))
	{
		e.preventDefault();
		return;
	} 		
})

function searchSuggestionStart(){
	try {
		clearInterval(time)//stopTimer()	
	}
	catch(err){
		
	}
	time = setInterval(function(){
			keyword = $('#search_box').val()
			posting = $.post('search_requisition.php', keyword);
			console.log(time)
		},4000);		
}
function searchSuggestionEnd(){
	console.log('focus out worksss')
	clearInterval(time)
	console.log(time)
}

$("#toggle_messenger").click(function(e){
	if($(this).text()=="Expand Messenger")
		$(this).text("Hide Messenger")
	else
		$(this).text("Expand Messenger")
	$("#messenger_form_box").slideToggle("slow")
})

$("#search_box").focusin(searchSuggestionStart)

$("#search_box").focusout(searchSuggestionEnd)
 		
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