<div id="faq_container" class="faq_container">
<h3>Что это?</h3>
<div><p>Говоря просто - голосовалка.</p><p>Точнее, это сайт, реализующий голосование по принципу “один мобильный телефон - один голос”, и позволяющий голосовавшему проверить, правильно ли его голос учтен.</p></div>
<h3>Кто это сделал?</h3>
<div><p>Мы. Команда энтузиастов. Волонтеры. Собрались в группу на фейсбуке, подумали и сделали.</p></div>
<h3>А зачем?</h3>
<div><p>Есть несколько причин.
Первое - острая социальная потребность в честных выборах, обусловленная подорванным доверием населения к власти. Второе - желание сделать что-то полезное не столько для себя, сколько для общества, в котором мы живем. Третья - у нас были идеи и опыт разработки, чтобы это сделать.</p></div>
<h3>Как это работает?</h3>
<div><p>Очень просто - вы заходите на главную страницу сайта, выбираете голосование, ставите галочки напротив тех вариантов, которые вам нравятся, нажимаете на кнопку, вводите номер своего сотового телефона. На этот номер мы отправляем смс-сообщение с уникальным кодом. Вы вводите этот код, мы записываем ваш голос в базу. Всё.</p></div>
<h3>А можно подробнее?</h3>
<div><p>Можно.</p><p>Российская Федерация поделена на много регионов. У каждого оператора сотовой связи за каждым регионом закреплены определенные коды и диапазоны номеров. Эти сведения о распределении номеров сотовых по регионам есть в открытых источниках.</p><p>Когда вы вводите свой номер на нашем сайте голосования, производится проверка, относится ли этот номер к региону, в котором проходит голосование. Если не относится, мы предлагаем вам ввести другой номер телефона - вдруг вы просто опечатались. Если относится - отправляем на этот номер смс с кодом.</p><p>Потом вы вводите этот код, проверяется, что именно этот код был отправлен на ваш номер, и, если все совпало, ваш голос заносится в базу данных.</p></div>
<h3>Голосование может проводиться только в одном регионе?</h3>
<div><p>Нет, может и в нескольких сразу, хоть по всей России.</p></div>
<h3>Мой номер телефона сохраняется в базе данных?</h3>
<div><p>Нет, ваш номер в нашей базе нигде не сохраняется. Как только заканчивается проверка вашего номера телефона, сразу же генерируется код и отправляется смс с кодом на ваш номер.</p></div>
<h3>Если вы не сохраняете номер телефона, как вы узнаете, что введенный код был отправлен на определенный номер?</h3>
<div><p>В системе используется механизм хэширования. Это процесс преобразования одной строки в другую таким образом, что одинаковые строки дают одинаковый результат (так называемый хэш), и по этому результату вычислительно сложно восстановить оригинал.</p><p>В нашей базе данных мы сохраняем хэш номера телефона и хэш кода подтверждения. Это позволяет знать, на какой номер был отправлен код, и не иметь понятия о номере и коде, пока вы их не введете.</p></div>
<h3>Что значит “вычислительно сложно”? На счетах посчитать смогу?</h3>
<div><p>“Вычислительно сложно” означает, что для вычисления аргумента по значению функции необходимо затратить на порядки больше вычислительной мощности, чем для вычислений значения функции по аргументу. На счетах это, конечно, можно посчитать, но это займет очень много времени - тысячи лет. На компьютерах - годы.</p></div>
<h3>Ладно, убедили. А как я узнаю, что вы не подделали мой голос?</h3>
<div><p>Каждый голос маркируется хэшем от хэша номера телефона и хэша кода подтверждения. В логе голосования есть функция поиска голоса. Вы вводите номер телефона, с которого голосовали, код подтверждения, который мы вам отправляли, находите свой голос и убеждаетесь, что запись в базе данных соответствует вашему решению.</p></div>
<h3>Можете привести пример такого хэша?</h3>
<div><p>Посмотрите в логи любого активного голосования.</p></div>
<h3>Какие-то буковки и циферки... Вы точно меня не обманываете?</h3>
<div><p>Нет. Вы можете сами вычислить маркирующий хэш своего голоса и убедиться, что он совпадает с хэшем в логе голосования. Например, на сайте http://md5x.ru/ - введите номер телефона в формате 79999999999, запишите полученный хэш, введите код подтверждения - 8 цифр без пробелов, запишите хеш, потом введите оба хэша без пробелов - и убедитесь, что вычисленное значение и маркер вашего голоса совпадают.</p></div>
<h3>Так, хорошо. Мой голос вы учли правильно. Я могу так же проверить другие голоса?</h3>
<div><p>Можете. Если другой голосовавший сообщит вам номер телефона, с которого он голосовал, и свой код подтверждения.</p></div>
<h3>То есть кто-то может узнать, как именно я проголосовал?</h3>
<div><p>Может. Если вы сообщите ему свои номер телефона и код подтверждения, и это ваше право.</p></div>
<h3>А как убедиться, что вы не вбрасываете голоса?</h3>
<div><p>Есть ряд технических и организационных мероприятий для обеспечения информационной безопасности автоматизированных систем. В настоящий момент нас всего два человека разрабатывающих и сопровождающих данную систему, с двумя разными компетенциями - Разработчик и Системных администратор. У нас есть ряд идей/предложений по поводу того, как избежать “вбросов” внутри системы. Это подписание кода, логгирование sql запросов в режиме “реального времени” и некоторые другие. Основная проблема, что для того, что бы прорабатывать процедуры аудита и проводить аудит, нужны желающие это делать с достаточным уровнем компетенции (помимо нас). Будем с вами честны, что данный вопрос у нас пока еще не достаточно проработан, но мы понимаем риск и у нас есть большое желание его избежать, а так же мы надеемся, что вы нам с этим поможете.</p><p>Если вы хотите провести аудит нашей системы и обладаете необходимыми навыками, мы с радостью предоставим всю необходимую информацию, доступ и необходимый инструментарий. </p></div>
<h3>Но если у кого-то несколько телефонов, он же может накрутить голоса.</h3>
<div><p>Может. У многих людей есть несколько сим-карт. Мы надеемся на то, что такие люди будут голосовать за разных кандидатов, и результат будет более-менее близок к истине.</p></div>
<h3>А злобные (вставьте название сил Тьмы) могут просто вбивать номера по базе сотовых?</h3>
<div><p>Могут. И мы попытаемся отправить на эти номера код подтверждения. Но они или не будут доставлены, или код получит тот, кто не голосовал, и он сможет сообщить о том, что его номером воспользовались.</p></div>
<h3>То есть, в строгом смысле слова, ваше голосование не обеспечивает полной легитимности?</h3>
<div><p>Нет, не обеспечивает. Но, по нашему мнению, реализованная нами голосовалка дает максимальное приближение к легитимному результату при сохранении относительной простоты.</p></div>
<h3>Как-то зыбко все это... “Мы надеемся, по нашему мнению”... Можно сделать надежнее?</h3>
<div><p>Можно. Но это усложнит систему, потребуются проверки документов, верификации номеров... Нужна какая-то организация, волонтеры, офисы, бюрократия... Ничего этого у нас пока нет.</p></div>
<h3>Говорят, есть такая штука - электронный паспортный стол...</h3>
<div><p>Есть. Вернее, разрабатывается. Как только хоть один электронный паспортный стол заработает, мы наладим с ним взаимодействие.</p></div>
<h3>Что мне нужно для голосования, кроме сотового телефона?</h3>
<div><p>Компьютер с выходом в интернет. Не обязательно иметь собственный компьютер - сгодится компьютер друга, в интернет-клубе, смартфон, в конце концов. Кстати, помогите проголосовать вашей бабушке - у нее тоже есть право голоса :)</p></div>
<h3>А я могу проголосовать, просто отправив смс?</h3>
<div><p>Нет, не можете. То есть не можете проголосовать таким образом на нашем сайте. Есть голосовалки, позволяющие изъявлять свою волю посредством простой отправки смс, но они не защищены от накруток.</p></div>
<h3>А с чего вы взяли, что они не защищены?</h3>
<div><p>Не с потолка. Смс-голоса - это товар, и весьма ходовой. Есть фирмы, у которых можно заказать услугу накрутки результата смс-голосования и таким образом делегитимизировать его результаты.</p></div>
<h3>А ваша голосовалка разве защищена от накруток?</h3>
<div><p>Строго говоря, нет. Но накрутка голосования потребует больше времени и ресурсов.</p></div>
<h3>Я могу несколько раз проголосовать, вводя один и тот же номер телефона?</h3>
<div><p>Если настройки голосования позволяют отозвать свой голос, то да. В таком случае ваши предыдущие голоса будут аннулированы, и в итоговый результат войдет только ваш последний голос.</p></div>
<h3>А если я напишу бота?</h3>
<div><p>Пишите, кто ж вам запрещает. Если бот будет подключен к сотовому телефону и будет анализировать входящие смс, он сможет переголосовать сколько угодно раз, если это позволяют настройки конкретного голосования.</p></div>
<h3>Есть же программные телефоны, значит, можно написать бота и без подключения к сотовому?</h3>
<div><p>Есть. Можно. И что? На такой программный телефон будут распространяться те же ограничения, что и на обычный, и эта ситуация, с точки зрения нашей голосовалки, ничем не отличается от разобранной в предыдущем вопросе.</p></div>
<h3>Но если коварные (вставьте название сил Тьмы) купят много-много сим-карт...</h3>
<div><p>Они могут попробовать. Но это атака другого рода, она стоит гораздо дороже, чем бот, и, чтобы ее провести, надо располагать достаточными ресурсами.</p></div>
<h3>Денег-то у них хватает. Что на это скажете?</h3>
<div><p>Им потребуется время на установку сим-карт в телефон. Больше сим-карт - больше времени. Придется нанять много исполнителей, раздать им сим-карты... В общем, получается долго и дорого.</p></div>
<h3>Кстати, о деньгах. За доставку сообщения вы снимете деньги со счета моего сотового?</h3>
<div><p>Нет, это невозможно.</p></div>
<h3>А каким образом вы извлекаете прибыль?</h3>
<div><p>Это общественный проект, некоммерческий.</p></div>
<h3>Смс-сообщения стоят денег, кто за них платит?</h3>
<div><p>Организатор голосования. Или мы оплачиваем сообщения из пожертвований добровольцев.</p></div>
<h3>Как я могу помочь вам?</h3>
<div><p>Можете поставить пива нам лично - мы будем рады ;)</p></div>
<h3>В смысле, не вам, а вашему проекту.</h3>
<div>
<p>Больше всего нам хочется, что бы это был не наш проект, а ваш - общественный, с общественным контролем, управлением и финансированием. Самое ценное, что вы можете привнести в проект, это личное участие, голосуйте сами, рассказывайте о проекте друзьям и знакомым. Именно в открытости и публичности мы видим залог нашего с вами успеха.</p>
<p>Еще вы можете:</p>
<p>
	<ul>
		<li>Пожертвовать на поддержку и развитие проекта, виджет для пожертвований есть на главной странице.</li>
		<li>Если у вас есть идеи как сделать проект 	лучше, вступайте в подгруппу проекта в 	Фейсбуке.</li>
		<li>Если вы хотите поучаствовать в разработке, то свяжитесь с одним из 	координаторов проекта, у нас много идей по доработке и развитию проекта.</li>
	</ul>
</p>
</div>
<h3>Я хочу разместить свое голосование на вашем сайте, как мне это сделать?</h3>
<div><p>Пока у нас нет публичного интерфейса для размещения голосований и добавления кандидатов, вы можете обратиться к одному из координаторов проекта.</p></div>
<h3>Спасибо за ответы, вы очень хорошо все объяснили. Пойду голосовать!</h3>
<div><p>Приятного волеизъявления :)</p></div>
</div>
<script>
//	$('#faq_container').accordion(
//		{
//			clearStyle:true,
//			collapsible:true,
//			icons: false,	
//			active:false,
//			autoHeight: false
//		}
//	);
</script>