// get array of attribute values by selector
function getAttrValues(selector, attrname)
{
	return $(selector).map(function(){return $(this).attr(attrname);}).get();
}
// 
function check_max_answers_per_vote()
{
	var poll_id = $(this).attr('data-poll_id');
	var max_answers = parseInt($(this).attr('data-max_answers'));
	var checked_count = $('input:checkbox:checked[data-poll_id="'+poll_id+'"]').length;
	//$('button[data-poll_id="'+poll_id+'"]').button(checked_count?"enable":"disable");
	var checkboxes = $('input:checkbox:not(:checked)[data-poll_id="'+poll_id+'"]');
	if(checked_count)
		$('#poll_'+poll_id+'_vote_phone_code').removeAttr('disabled');
	else
		$('#poll_'+poll_id+'_vote_phone_code').attr('disabled',true);
	if(checked_count >= max_answers)
	{
		$('#poll_'+poll_id+'_vote_phone_code').focus();
		checkboxes.each(function(){$(this).attr("disabled",true);})
	}
	else
		checkboxes.each(function(){$(this).removeAttr("disabled");});
}
// go!
$(document).ready(
	function()
	{
		//menu
		//$('#main_menu').ptMenu();
	}
);
