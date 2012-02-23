<table id="poll_<?=$poll->id?>_answers_table">
	<thead>
		<tr>
			<td></td>
			<td>Кандидат</td>
			<td>Рейтинг</td>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($answers as $answer)
	{
		?>
		<tr>
			<td>
				<input
					type="checkbox"
					data-poll_id="<?=$poll->id?>"
					data-id="<?=$answer->id?>"
					data-value="<?=$answer->title?>"
					data-max_answers="<?=$poll->max_answers_per_vote?>"/>
			</td>
			<td width="100%">
				<?=$answer->title?>
			</td>
			<td>
				<h3><?=$answer->rating?></h3>
			</td>
		</tr>
		<?php
	}
	?>		
	</tbody>
</table>
<div id="poll_<?=$poll->id?>_vote_form" style="display: none;">
	<div id="poll_<?=$poll->id?>_vote_phone_container" style="float:left;">
		Введите номер телефона, чтобы проголосовать: +7 (
		<input type="text" id="poll_<?=$poll->id?>_vote_phone_code" size="3"/>
		) -
		<input type="text" id="poll_<?=$poll->id?>_vote_phone_number" size="7"/>
		<button id="poll_<?=$poll->id?>_vote_button_get_code" style="display:none;">Получить код</button>
	</div>
	<div id="poll_<?=$poll->id?>_vote_code_container" style="display:none; float:left;">
		Код подтверждения:
		<input type="text" id="poll_<?=$poll->id?>_vote_code" size="8"/>
		<button id="poll_<?=$poll->id?>_vote_button" style="display:none;">Подтвердить голос</button>
	</div>
</div>
<script>
	$("input:checkbox").bind("change",check_max_answers_per_vote);
	//dataTables: http://datatables.net/index
	$('#poll_<?=$poll->id?>_answers_table').dataTable(
		{
			"sScrollY": "500px",
			"bPaginate": false,
			"bInfo": false,
			"aaSorting": [[ 2, "desc" ]],
			"oLanguage":
			{
				"sSearch": "Поиск",
				"sLengthMenu": "Показывать _MENU_ записей на стреницу",
				"sZeroRecords": "Не найдено",
				"sInfo": "Записи с _START_ по _END_ из _TOTAL_",
				"sInfoEmpty": "Записи с 0 по 0 из 0",
				"sInfoFiltered": "(поиск среди _MAX_ записей)"
			}
		}
    );
	$("#poll_<?=$poll->id?>_vote_phone_code").mask(
		"999",
		{
			placeholder:" ",
			completed:function()
			{
				$('#poll_<?=$poll->id?>_vote_phone_number').focus();
			}
		}
	);
	$("#poll_<?=$poll->id?>_vote_phone_number").mask(
		"9999999",
		{
			placeholder:" ",
			completed:function()
			{
				$('#poll_<?=$poll->id?>_vote_button_get_code').show();			
				$('#poll_<?=$poll->id?>_vote_button_get_code').focus();
			}
		}
	);
	$("#poll_<?=$poll->id?>_vote_code").mask(
		"99999999",
		{
			placeholder:" ",
			completed:function()
			{
				$('#poll_<?=$poll->id?>_vote_button').show();			
				$('#poll_<?=$poll->id?>_vote_button').focus();
			}
		}
	);
	$('#poll_<?=$poll->id?>_vote_button_get_code').button();
	$('#poll_<?=$poll->id?>_vote_button_get_code').button().click(
		function()
		{
			$('#poll_<?=$poll->id?>_vote_phone_container').hide();
			$.ajax(
				{
					url: '/ajax/get_pin_code',
					data:
						{
							phone:
								'7'+
								$('#poll_<?=$poll->id?>_vote_phone_code').val() +
								$("#poll_<?=$poll->id?>_vote_phone_number").val(),
							poll_id: <?=$poll->id?>,
						},
					dataType:'json',
					type:'POST',
					success: function(data)
					{
						if(data.success || data.errorcode == 7)
						{
							$('#poll_<?=$poll->id?>_vote_code_container').show();
							$('#poll_<?=$poll->id?>_vote_code').focus();
							if(data.error)
								alert(data.error);
							else
								alert(data.result.message);
						}
						else
						{
							alert(data.error);
							if(data.errorcode < 3 || data.errorcode > 6)
							{
								$('#poll_<?=$poll->id?>_vote_phone_container').show();
								$('#poll_<?=$poll->id?>_vote_phone_code').focus();
							}
						}
					}
				}
			);
		}
	);
	$('#poll_<?=$poll->id?>_vote_button').button();
	$('#poll_<?=$poll->id?>_vote_button').button().click(
		function()
		{
			var checked_ids = getAttrValues('input:checkbox:checked[data-poll_id="<?=$poll->id?>"]', 'data-id').join(',');
			//
			$('#poll_<?=$poll->id?>_vote_code_container').hide();
			$.ajax(
				{
					url: '/ajax/vote',
					data:
						{
							phone: 
								'7'+
								$('#poll_<?=$poll->id?>_vote_phone_code').val() +
								$("#poll_<?=$poll->id?>_vote_phone_number").val(),
							poll_id: <?=$poll->id?>,
							code: $('#poll_<?=$poll->id?>_vote_code').val(),
							answers: checked_ids
						},
					dataType:'json',
					type:'POST',
					success: function(data)
					{
						if(data.success)
						{
							$('#poll_<?=$poll->id?>_vote_phone_container').show();
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
	);
	
</script>
