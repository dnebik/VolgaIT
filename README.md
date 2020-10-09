# VolgaIT Задание 1. Упрощенная CMS
<h3>Корневая папка для запуска /web</h3>
<hr/>
<p>При работе я использовал фреймворк Yii2.</p>
<p>СУБД - MySql.</p>
<hr/>
<p>Мой проект состоит из трех контроллеров:</p>
<ul>
<li>Admin - через него мы можем входить в админ панель и просматривать/редактировать заказы</li>
<li>Cart - в данном контроллере мы оперируем с нашей карзиной</li>
<li>Search - поиск по товарам сайта</li>
<li>Site - основная страница сайта</li>
</ul>
<p>Я использовал таблицы в базе данных:</p>
<ul>
<li>good - список товаров</li>
<li>order - список заказов</li>
<li>order_good - таблица связей</li>
<li>user - таблица для входа</li>
</ul>
<hr/>
<p>На основной странице вы можете добавлять в корзину товар. Так же вы можете добавлять товар из результата поиска. В панели навигации вы можете открыть карзину и оперировать с ней, а так же оформить заказ.</p>
<p>В панели навигации для удобства присутствует кнопка входа в административную панель.</p>
<p>Если же вы уже вошли как администратор, то вы увидете кнопки для выхода из администратора и входа в панель управления.</p>
<hr/>
<p>Для входа в административную панель используйте следующие логин и пароль:</p>
login: <b>admin</b>
<br/>
password: <b>123</b>
<br/>
<hr/>
<p>В корне проекта находяится <b>'volga_it.sql'</b>. С помощью него вы можете импортировать базу с парой существующих заказов.</p>
<p>В файле <b>'/config/web/db.php'</b> настройте подключение к базе.</p>