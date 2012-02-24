<?php
if(!isset($nt))
	$nt = false;
if(!$nt)
{
?><!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="verify-reformal" content="c5a66735deffd80de7afeb12" />
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
		<title>Электронные голосования<?=$title?" - $title":''?></title>
		<link rel="stylesheet" href="/static/css/jquery-ui.css">
		<link rel="stylesheet" href="/static/css/theme/jquery-ui.css">
		<!-- main menu: http://labs.makotokw.com/en/jquery/ui_potato_menu -->
		<!-- link rel="stylesheet" href="/static/css/jquery.ui.potato.menu.css" -->	
		<link rel="stylesheet" href="/static/js/DataTables-1.9.0/media/css/jquery.dataTables.css">
		<link rel="stylesheet" href="/static/css/style.css">
		<!--[if lt IE 9]><script src="/static/js/html5.js"></script><![endif]-->
		<script src="/static/js/jquery-1.7.1.min.js"></script>
		<script src="/static/js/jquery-ui-1.8.17.custom.min.js"></script>
		<script src="/static/js/jquery.maskedinput.min.js"></script>
		<!-- main menu: http://labs.makotokw.com/en/jquery/ui_potato_menu -->
		<!-- script src="/static/js/jquery.ui.potato.menu-min.js"></script -->
		<!-- dataTables: http://datatables.net/index -->
		<script src="/static/js/DataTables-1.9.0/media/js/jquery.dataTables.min.js"></script>
		<script src="/static/js/voting.js"></script>
</head>
<body>
	<div id="header">
		<div id="logo">
			<a href="/">
				<img src="/static/images/eg_logo.png" alt='Электронные голосования' title='Электронные голосования'>
			</a>
			<?php
			//echo Request::factory('widget_region')->execute();
			?>
		</div>
		<!-- main menu: http://labs.makotokw.com/en/jquery/ui_potato_menu -->
		<!-- div id="menu">
			<ul id="main_menu">
				<li>
					<a href="/future">Будущие голосования</a>
					<ul>
						<li>dropdown list</li>
						<li>dropdown list</li>
						<li>dropdown list</li>
						<li>dropdown list</li>
					</ul>
				</li>
				<li>
					<a href="/">Активные голосования</a>
					<ul>
						<li>dropdown list</li>
						<li>dropdown list</li>
						<li>dropdown list</li>
						<li>dropdown list</li>
					</ul>
				</li>
				<li>
					<a href="/archive">Архив голосований</a>
					<ul>
						<li>dropdown list</li>
						<li>dropdown list</li>
						<li>dropdown list</li>
						<li>dropdown list</li>
					</ul>
				</li>
				<li>
					<a href="/about">О проекте</a>
					<ul>
						<li>
							<a href="/about/faq">Часто задаваемые вопросы</a>
							<a href="/about/authors">Авторы</a>
						</li>
					</ul>
				</li>
			</ul>
		</div -->
	</div>
	<div id="page">
		<div id="left_column">
			<div class="header">
				<!-- заголовок текущей страницы -->
				<?=$title?>
			</div>
			<div id="content">
				<!-- содержимое текущей страницы -->
<?php
}
echo $content;
if(!$nt)
{
?>
			</div>
		</div>
		<div id="right_column">
			<!-- внезапно правая колонка -->
			<div class="header">ИНСТРУКЦИЯ</div>
			<ol>
				<li>выбрать голосование</li>
				<li>выбрать варианты</li>
				<li>ввести свой номер телефона</li>
				<li>дождаться смс с кодом подтверждения</li>
				<li>ввести код</li>
				<li>PROFIT!!!111</li>
			</ol>
			<div class="header">О ПРОЕКТЕ</div>
			<p>
				проект разрабатывается группой энтузиастов<br/>
				<a class="green_link" href="http://www.facebook.com/groups/egolosovanie.dev/">facebook.com/groups/egolosovanie.dev</a><br/>
				из Рабочей группы Электронной демократии<br/>
				<a class="green_link" href="http://www.facebook.com/groups/eldem/">facebook.com/groups/eldem</a>
			</p>
			<p>
				<a class="green_link" href="/about/faq">Часто задаваемые вопросы</a>
			</p>
			<div class="not_for_profit">
				<table border="0" cellpadding="0" cellspacing="0"><tr><td><div style="padding: 0.6em; background-color: #DAE6F2; border: 1px solid #B8CFE6; border-radius: 7px; -moz-border-radius: 7px;"><a href="https://money.yandex.ru/embed/?from=sbal" title="Виджеты Яндекс.Денег" style="width: 200px; height: 100px; display: block; margin-bottom: 0.6em; background: url('https://money.yandex.ru/share-balance.xml?id=153598173&key=0006EE96EE457DEA') 0 0 no-repeat; -background: none; -filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='https://money.yandex.ru/share-balance.xml?id=153598173&key=0006EE96EE457DEA', sizingMethod = 'crop');"></a><form action="https://money.yandex.ru/direct-payment.xml" method="post"><input type="hidden" name="receiver" value="410011287869310"/><input type="hidden" name="sum" value="0"/><input type="hidden" name="destination" value="Яндекс.Деньги &#8212; на хорошее дело не жалко!"/><input type="hidden" name="FormComment" value="Пожертвование через виджет &#171Мой баланс&#187;"/><input type="submit" value="Поддержать проект" style="margin-top: 0.6em; width: 100%;"/></form></div></td></tr></table>
			</div>
		</div>
	</div>
		<div id="footer">
			<a href="http://creativecommons.org/licenses/by-nc-sa/3.0/">
				<img src='/static/images/CC-BY-NC-SA.png' alt='Лицензионное соглашение' title='Лицензионное соглашение'>
			</a>
		</div>
	</div>
</body>
<script type="text/javascript">
    var reformalOptions = {
        project_id: 55522,
        project_host: "egolosovanie.reformal.ru",
        tab_orientation: "left",
        tab_indent: 200,
        tab_bg_color: "#33cc33",
        tab_border_color: "#FFFFFF",
        tab_image_url: "http://tab.reformal.ru/T9GC0LfRi9Cy0Ysg0Lgg0L%252FRgNC10LTQu9C%252B0LbQtdC90LjRjw==/FFFFFF/4bfb34d91c8d7fb481972ca3c84aec38/left/0/tab.png",
        tab_border_width: 0
    };
    
    (function() {
        var script = document.createElement('script');
        script.type = 'text/javascript'; script.async = true;
        script.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'media.reformal.ru/widgets/v2/reformal.js';
        document.getElementsByTagName('head')[0].appendChild(script);
    })();
</script>
</html><?php
}
?>
