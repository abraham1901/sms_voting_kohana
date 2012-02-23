<div id="poll_<?=$poll->id?>_tabs" class="poll_tabs">
	<ul>
		<li><a href="#poll_<?=$poll->id?>_tabs_answers">Голосование</a></li>
		<li><a href="#poll_<?=$poll->id?>_tabs_description">Описание</a></li>
<?php
if ($region_count > 1)
{ 
?>
		<li><a href="#poll_<?=$poll->id?>_tabs_regions">Регионы</a></li>
<?php
}
?>
		<li><a href="#poll_<?=$poll->id?>_tabs_log">Лог голосования</a></li>
	</ul>
  <div class="poll_tab" id="poll_<?=$poll->id?>_tabs_answers">
    <?php echo View::factory('poll/answers')->bind('poll',$poll); ?>
  </div>
  <div class="poll_tab" id="poll_<?=$poll->id?>_tabs_description">
    <?php echo View::factory('poll/description')->bind('poll',$poll); ?>
  </div>
<?php
if ($region_count > 1)
{ 
?>
  <div class="poll_tab" id="poll_<?=$poll->id?>_tabs_regions">
    <?php echo View::factory('poll/regions')->bind('poll',$poll)->bind('region_count',$region_count); ?>
  </div>
<?php
}
?>
  <div class="poll_tab" id="poll_<?=$poll->id?>_tabs_log">
    <?php echo View::factory('poll/log')->bind('poll',$poll); ?>
  </div>
</div>
<script>
	$( "#poll_<?=$poll->id?>_tabs" ).tabs();
</script>
