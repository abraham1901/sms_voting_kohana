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
		$('#poll_'+poll_id+'_vote_form').show();
	else
		$('#poll_'+poll_id+'_vote_form').hide();
	if(checked_count >= max_answers)
	{
		$('#poll_'+poll_id+'_vote_phone_code').focus();
		checkboxes.each(function(){$(this).attr("disabled",true);})
	}
	else
		checkboxes.each(function(){$(this).removeAttr("disabled");});
}
// voting		
function vote(poll_id)
{
	var checked_ids = getAttrValues('input:checkbox:checked[data-poll_id="'+poll_id+'"]', 'data-id');
	$('#answer_ids').val(checked_ids.join(','));
	var checked_values = getAttrValues('input:checkbox:checked[data-poll_id="'+poll_id+'"]',"data-value");
	var html = "";
	for(var i = 0; i < checked_values.length; i++)
		html += "<li>"+checked_values[i]+"</li>";
	$('#choise_list').html(html);
	$('#poll_id').val(poll_id);
	$('#phone').val('');
	$('#code').val('');
	$('#step1_button').button('disable');
	$('#step2_button').button('disable');
	$('#step1').hide();
	$('#step2').hide();
	$('#step0').show();
	$("#poll_dialog").dialog({modal:true,autoResize:true});				
}
// voting step 1
function vote_step1()
{
	$('#step0').hide();
	$('#step1').show();
	$('#phone').focus();
}
// voting step 2
function vote_step2()
{
	$.ajax(
		{
			url: '/ajax/get_pin_code',
			data:
				{
					phone: $('#phone').val().replace(/[^\d]+/g,''),
					poll_id: $('#poll_id').val(),
				},
			dataType:'json',
			type:'POST',
			success: function(data)
			{
				if(data.success || data.errorcode == 7)
				{								
					$('#step1').hide();
					$('#step2').show();
					$('#code').focus();
					if(data.error)
						alert(data.error);
					else
						alert(data.result.message);
				}
				else
				{
					alert(data.error);
					if(data.errorcode >= 3 && data.errorcode <= 6)
						$('#poll_dialog').dialog('close');
					else
						$('#phone').focus();
				}
			}
		}
	);
}
// voting step 3
function vote_step3()
{
	$.ajax(
		{
			url: '/ajax/vote',
			data:
				{
					phone: $('#phone').val().replace(/[^\d]+/g,''),
					poll_id: $('#poll_id').val(),
					code: $('#code').val(),
					answers: $('#answer_ids').val()
				},
			dataType:'json',
			type:'POST',
			success: function(data)
			{
				$('#poll_dialog').dialog('close');
				if(data.success)
				{								
					alert(data.result.message);								
				}
				else
				{
					alert(data.error);
				}
			}
		}
	);
}
// go!
$(document).ready(
	function()
	{
		//menu
		//$('#main_menu').ptMenu();
		// buttons
		//$('button').button();
		//$('button').button('disable');
		//$('#step0_button').button('enable');
		//$("#step0_button").button().click(vote_step1);
		//$("#step1_button").button().click(vote_step2);
		//$("#step2_button").button().click(vote_step3);
		// checkboxes
		//$("input:checkbox").bind("change",check_max_answers_per_vote);
		// inputs
		//$("#phone").mask("+7 (999) 999-99-99");
		//$('#code').mask("99999999");
	}
);
