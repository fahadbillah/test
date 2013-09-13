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
	if($(this).text()=="Expand")
		$(this).text("Hide")
	else
		$(this).text("Expand")
	$("#messenger_form_box").slideToggle("slow")
})
$("#toggle_form_add_loc_user").click(function(e){
	if($(this).text()=="Expand")
		$(this).text("Hide")
	else
		$(this).text("Expand")
	$(this).parent().siblings("form").slideToggle("slow")
})
$("#toggle_form_add_exec_loc").click(function(e){
	if($(this).text()=="Expand")
		$(this).text("Hide")
	else
		$(this).text("Expand")
	$(this).parent().siblings("form").slideToggle("slow")
})
$("#toggle_form_limit").click(function(e){
	if($(this).text()=="Expand")
		$(this).text("Hide")
	else
		$(this).text("Expand")
	$(this).parent().siblings("form").slideToggle("slow")
})
$("#toggle_form_new_user").click(function(e){
	if($(this).text()=="Expand")
		$(this).text("Hide")
	else
		$(this).text("Expand")
	$(this).parent().siblings("form").slideToggle("slow")
})
$("#toggle_form_fac_site").click(function(e){
	if($(this).text()=="Expand")
		$(this).text("Hide")
	else
		$(this).text("Expand")
	$(this).parent().siblings("form").slideToggle("slow")
})
$("#toggle_form_add_exec_cent").click(function(e){
	if($(this).text()=="Expand")
		$(this).text("Hide")
	else
		$(this).text("Expand")
	$(this).parent().siblings("form").slideToggle("slow")
})
$("#toggle_form").click(function(e){
	if($(this).text()=="Expand")
		$(this).text("Hide")
	else
		$(this).text("Expand")
	$(this).parent().siblings("form").slideToggle("slow")
})

$(".tab_close").click(function(e){
	$(this).parent().remove()
})

$("#send_pm").click(function(e){
	var rcv = $("#receiver").val();
	var ss = $("#sms").val();
	var sdr = $("#sender").val();
	if(rcv=="" || ss=="" || sdr==""){
		$("#message_notice").hide().html("Blanc field! Please fill properly.").show("slow").delay(3000).hide("slow")
		return
	}
	if (!confirm("Do you confirm sending this message?"))
	{
		e.preventDefault();
		return;
	}
	//alert(id+" "+location)
	buttonLoadingOn("send_pm","Sending Pm...")
	var posting = $.post("pm_process.php",{sender:sdr, receiver:rcv, sms:ss})
	posting.done(function(output){
		//console.log(output)
		$("#message_notice").hide().html(output).show("slow").delay(5000).hide("slow")
		buttonLoadingOff("send_pm","Submit")
		$("#sms").val('')
	})

})

function submit_message(id){
	var rcv = $("#select_receiver").val();
	var ss = $("#tab_textarea_"+id).val();
	var sdr = $("#sender_"+id).val();
	if(rcv=="" || ss=="" || sdr==""){
		$(".mail_notice").hide().html("Blanc field! Please fill properly.").show("slow").delay(3000).hide("slow")
		return
	}
	if (!confirm("Do you confirm sending this message?"))
	{
		return;
	}
	//alert(rcv+" "+ss+" "+sdr+" "+id)
	buttonLoadingOn("tab_submit_"+id,"Sending Pm...")
	var posting = $.post("pm_process.php",{sender:sdr, receiver:rcv, sms:ss})
	posting.done(function(output){
		//console.log(output)
		$(".mail_notice").hide().html(output).show("slow").delay(5000).hide("slow")
		buttonLoadingOff("tab_submit_"+id,"Submit")
		$("#tab_textarea_"+id).val('')
	})

}

function auto_load_messages(){

}

auto_load_messages()

function buttonLoadingOn(id,message){
	loading = '<i class="icon-spinner icon-spin icon-large"></i> '+message
	$('#'+id).html(loading)
	return
}
function buttonLoadingOff(id,message){
	$('#'+id).html(message)
	return
}  


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