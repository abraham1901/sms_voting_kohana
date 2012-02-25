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
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-29479698-1']);
			_gaq.push(['_setDomainName', 'egolosovanie.ru']);
			_gaq.push(['_setAllowLinker', true]);
			_gaq.push(['_trackPageview']);
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
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
				<p>
					1. выбрать варианты<br/>
					2. ввести свой номер телефона<br/>
					3. дождаться смс с кодом подтверждения<br/>
					4. ввести код<br/>
					5. PROFIT!!!11
				</p>
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
			<div id="not_for_profit">
				<iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/embed/small.xml?uid=410011287869310&amp;button-text=04&amp;button-size=l&amp;button-color=orange&amp;targets=%d0%bd%d0%b0+%d1%80%d0%b0%d0%b7%d0%b2%d0%b8%d1%82%d0%b8%d0%b5+%d0%bf%d1%80%d0%be%d0%b5%d0%ba%d1%82%d0%b0+%d0%b8+%d1%8d%d0%bb%d0%b5%d0%ba%d1%82%d1%80%d0%be%d0%bd%d0%bd%d0%be%d0%b9+%d0%b4%d0%b5%d0%bc%d0%be%d0%ba%d1%80%d0%b0%d1%82%d0%b8%d0%b8&amp;default-sum=10" width="auto" height="54"></iframe>
			</div>
		</div>
	</div>
	<div id="footer">
		<div style="float: left;">
			<a href="http://creativecommons.org/licenses/by-nc-sa/3.0/">
				<img src='/static/images/CC-BY-NC-SA.png' alt='Лицензионное соглашение' title='Лицензионное соглашение'>
			</a>
		</div>
		<div>Бла-бла-бла копилефт, бла-бла-бла демократия<br/>Бла-бла-бла, всегда пожалуйсто</p></div>
	</div>
	<!-- Yandex.Metrika counter --><div style="display:none;"><script type="text/javascript">(function(w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter12829282 = new Ya.Metrika({id:12829282, enableAll: true, trackHash:true, webvisor:true}); } catch(e) { } }); })(window, "yandex_metrika_callbacks");</script></div><script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script><noscript><div><img src="//mc.yandex.ru/watch/12829282" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
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
