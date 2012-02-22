<label for="region">Регион:</label>
<select id="region">
	<option id="0">---</option>
<?php
	foreach($regions as $reg)
	{
	?>
	<option id="<?=$reg->id?>"<?=($reg->id == $region->id)?' selected':''?> ><?=$region->name?></option>
	<?php
	};
?>
</select>
