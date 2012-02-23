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
		//echo View::factory('answer/item')->bind('answer', $answer);
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
	</div>
	<div id="poll_<?=$poll->id?>_vote_code_container" style="display:none; float:left;">
		Код подтверждения:
		<input type="text" id="poll_<?=$poll->id?>_vote_code" size="8"/>
	</div>
	<button id="poll_<?=$poll->id?>_vote_button" onclick="vote(<?=$poll->id?>);" data-poll_id="<?=$poll->id?>" style="display:none;">Получить код</button>
</div>
<script>
	$("input:checkbox").bind("change",check_max_answers_per_vote);
	$('button').button();
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
	$('#poll_<?=$poll->id?>_vote_button').button('disable');
	$("#poll_<?=$poll->id?>_vote_phone_code").mask(
		"999",
		{
			completed:function()
			{
				$('#poll_<?=$poll->id?>_vote_phone_number').focus();
			}
		}
	);
	$("#poll_<?=$poll->id?>_vote_phone_number").mask(
		"9999999",
		{
			completed:function()
			{
				$('#poll_<?=$poll->id?>_vote_button').show();
			}
		}
	);
	$("#poll_<?=$poll->id?>_vote_code").mask("99999999");
</script>
