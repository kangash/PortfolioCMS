-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 14 2021 г., 22:50
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'Page', 0),
(2, 'Default', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `category_item`
--

CREATE TABLE `category_item` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_item`
--

INSERT INTO `category_item` (`id`, `category_id`, `name`, `position`) VALUES
(8, 1, 'All', '0'),
(9, 1, 'Blog', '4'),
(10, 1, 'PHP', '1'),
(11, 1, 'JavaScript', '2'),
(12, 1, 'CSS', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, 'Header'),
(2, 'Footer'),
(5, 'Project');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_item`
--

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `parent` tinyint(1) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 999,
  `link` varchar(255) NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `name`, `parent`, `position`, `link`) VALUES
(1, 1, 'Проекты', 0, 1, '#work-anchor'),
(4, 1, 'Главная', 0, 0, '#home-anchor'),
(8, 2, 'Главная', 0, 0, '#home-anchor'),
(13, 5, 'PHP', 0, 1, '#'),
(14, 5, 'All', 0, 0, '#'),
(22, 5, 'CSS', 0, 3, '#'),
(23, 5, 'JavaScript', 0, 2, '#'),
(25, 2, 'Проекты', 0, 1, '#work-anchor'),
(34, 1, 'О себе', 0, 999, '#about-anchor'),
(35, 1, 'Блог', 0, 999, '#blog-anchor'),
(36, 2, 'О себе', 0, 999, '#about-anchor'),
(37, 2, 'Блог', 0, 999, '#blog-anchor');

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `segment` varchar(255) NOT NULL,
  `type` varchar(155) NOT NULL DEFAULT 'page',
  `name_item_category` varchar(200) NOT NULL DEFAULT '1',
  `image` varchar(155) NOT NULL DEFAULT 'default.jpg',
  `status` varchar(55) NOT NULL DEFAULT 'publish',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `segment`, `type`, `name_item_category`, `image`, `status`, `date`) VALUES
(24, 'Структура данных - стек', '<p>Как загружать любые файлы, например, картинки на сервер с помощью AJAX и jQuery? Делается это довольно просто! И ниже мы все обстоятельно разберем.</p><p>В те «древние» времена, когда еще не было jQuery, а может он был, но браузеры были не так наворочены, загрузка файла на сайт с помощью AJAX была делом муторным: через всякие костыли вроде iframe. Я то время не застал, да и кому это теперь интересно. А интересно теперь другое - что сохранение файлов на сайт делается очень просто. Даже не обладающий опытом и пониманием, того как работает AJAX, вебмастер, сможет быстро разобраться что-куда. А эта статья ему в помощь. Если подкрепить эти возможности&nbsp;<a href=\"https://wp-kama.ru/function-cat/zagruzka-upload\">функциями WordPress</a>, то безопасная обработка и загрузка файлов на сервер становится совсем плёвым и даже интересным делом (пример с WordPress смотрите в конце статьи).</p><p>Однако, как бы все просто не было, нужно заметить, что минимальный опыт работы с файлами и базовые знания в Javascript, jQuery и PHP все же необходимы! Минимум, нужно представлять как загружаются файлы на сервер, как в общих чертах работает AJAX и хоть немного надо уметь читать и понимать код.</p><p>Описанный ниже метод довольно стабилен, и по сути опирается на Javascript объект&nbsp;<var data-redactor-tag=\"var\">new FormData()</var>, базовая поддержка которого есть во всех браузерах.</p><p>Для более понятного восприятия материала, он разделен на шаги. На этом все, полетели...</p>', 'structure-data', 'content', 'PHP', 'php.jpg', 'publish', '2020-12-23 15:09:54'),
(25, 'Dependency injection', '<p>В каждой системе должен быть глобальный обьект в котором хранятся все необходимые данные для построения структурированного клиентского кода.<br>В данном dependency injection (DI контацнер) хранятся:<br>Объекты системы и их данные (которые в основном хранятся в самих вложенных объектах).<br>Алгоритм создания зависимости следующий:<br>Создаётся экземпляр класса<br>Добавляется в контейнер зависимостей<br><br>[Проблема]<br>Но в данном алгоритме есть недостаток!<br>При создание экземпляра класса, конструктор большинство объектов зависят от данных которые хранятся в самом ДИ контейнере. Проблема заключается в следующем: есть большая вероятность того, что конструктор экземпляра запросит данные которые ещё небыли проиниациализированны в самом контейнере.<br><br>[Решение]<br>Создать метод перехватчик не привязанный к созданию экземпляра и инициализировать его после того, как все зависимости были добавлены в контейнер обьекта зависимостей.<span class=\"redactor-invisible-space\" data-verified=\"redactor\" data-redactor-tag=\"span\" data-redactor-class=\"redactor-invisible-space\">​</span><span class=\"redactor-invisible-space\" data-verified=\"redactor\" data-redactor-tag=\"span\" data-redactor-class=\"redactor-invisible-space\"></span></p>', 'di', 'content', 'PHP', 'php.jpg', 'publish', '2020-12-23 15:18:14'),
(26, 'Pattern Active Record', '<p>У php когда-то были проблемы, но сейчас это Статически типизированный и объектный&nbsp;ориентированный язык программирования.</p><p>Плохой код есть в любом языке и не нужно говорить что в каком-то языке нет низкопроизводительного и неоптимизированного кода.<span class=\"redactor-invisible-space\" data-verified=\"redactor\" data-redactor-tag=\"span\" data-redactor-class=\"redactor-invisible-space\" style=\"background-color: initial;\" rel=\"background-color: initial;\" data-redactor-style=\"background-color: initial;\">​</span></p>', 'pattern-active-record', 'project', 'PHP', 'maxresdefault-1-.jpg', 'publish', '2020-12-24 10:29:14'),
(27, 'flexibleCMS', '<p>​This project was created for training purposes and is a reflection of the code for a video course on creating a site content management system from&nbsp;<a href=\"https://www.youtube.com/watch?v=cGrIAFycpwA&amp;list=PLZFDSY0g9advV820J80psX3aP_oXGQDT2​\" target=\"_blank\">YouTube</a></p><p>Ссылка проекта на:&nbsp;<a href=\"https://github.com/kangash/flexibleCMS​\" target=\"_blank\">GitHub</a></p>', 'flexiblecms', 'project', 'PHP', 'php.jpg', 'publish', '2021-01-12 20:15:32'),
(28, 'Ссылки объектов', '<p>Объекты всегда передаются по ссылке, даже если происходит клонирование объектов которое имеет зависимость от другого объекта, то оба класса будут ссылаться на один и тот же объект.<br>Это значит, что если изменить данные в данном объекте, они также изменяться в тех объектах которые зависят от него.<span class=\"redactor-invisible-space\" data-verified=\"redactor\" data-redactor-tag=\"span\" data-redactor-class=\"redactor-invisible-space\">​</span><span class=\"redactor-invisible-space\" data-verified=\"redactor\" data-redactor-tag=\"span\" data-redactor-class=\"redactor-invisible-space\"></span></p>', 'link-object', 'content', 'PHP', 'php.jpg', 'publish', '2021-01-14 07:28:24'),
(29, 'Внедрение зависимостей от интерфейса', '<p>Если создать зависимость от интерфейса и внедрять объекты классы которых имеют производную от данного интерфейса, то будет ли эта ошибка?<span class=\"redactor-invisible-space\" data-verified=\"redactor\" data-redactor-tag=\"span\" data-redactor-class=\"redactor-invisible-space\">​</span></p>', 'vnedrenie-zavisimostey-ot-interfeysa', 'content', 'PHP', 'php.jpg', 'publish', '2021-01-14 08:59:00'),
(30, 'Клонирование объектов', '<p>До PHP 4 как и сейчас экземпляр класса создавался путем создание объектной переменной и при присваивание значений этой переменной к другой - объекты невольно копировались. Также копирование происходило когда метод возвращал определенный объект или когда методу передавалось зависимость .<br>Но начиная с версии PHP 5 и выше копирование объектов возможно только с помощью ключевого слова clone. В контексте класса можно реализовать метод __clone, он будет вызываться в момент клонирование из контексте нового обьекта.<br>Это означает, что все изменения в методе __clone отразиться только на новой копии объекта.<br>Для чего необходимо клонирование объектов?&nbsp;<span class=\"redactor-invisible-space\">​</span><span class=\"redactor-invisible-space\" data-verified=\"redactor\" data-redactor-tag=\"span\" data-redactor-class=\"redactor-invisible-space\"></span></p>', 'clone-object', 'content', 'PHP', 'php.jpg', 'publish', '2021-01-14 08:59:07'),
(31, 'Верстака border-box', '<p>​При помощи box-sizing: border-box мы можем сказать браузеру, что ширина, которую мы ставим, относится к элементу полностью, включая border и padding.<br>Свойство box-sizing может принимать одно из двух значений – border-box или content-box. В зависимости от выбранного значения браузер по-разному трактует значение свойств width/height.&nbsp;<span class=\"redactor-invisible-space\" data-verified=\"redactor\" data-redactor-tag=\"span\" data-redactor-class=\"redactor-invisible-space\">​</span></p>', 'verstaka-border-box', 'content', 'CSS', 'css.jpg', 'publish', '2021-01-14 09:39:39'),
(32, 'YouTube', '<p>В данном проекте на нативном JavaScript был сделан следующий функционал:</p><ul><li>Скроллинг скрытого меню</li><li>Динамическое уменьшение контента у постов</li><li>Создание нового элемента и добавление на сайте&nbsp;</li></ul>', 'youtube', 'project', 'JavaScript', 'Tutorial-Javascript.jpg', 'publish', '2021-01-14 19:38:08');

-- --------------------------------------------------------

--
-- Структура таблицы `plugin`
--

CREATE TABLE `plugin` (
  `id` int(11) NOT NULL,
  `directory` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `plugin`
--

INSERT INTO `plugin` (`id`, `directory`, `is_active`) VALUES
(3, 'ExemplePlugin', 1),
(4, 'ListPlugin', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `key_field` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL,
  `section` varchar(155) NOT NULL DEFAULT 'general'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`id`, `name`, `key_field`, `value`, `section`) VALUES
(1, 'Name site', 'name_site', 'InKognito', 'general'),
(2, 'Description', 'description', 'Example description Cms', 'general'),
(3, 'Admin email', 'admin_email', 'admin@admin.com', 'general'),
(4, 'Language', 'language', 'english', 'general'),
(5, 'Active theme', 'active_theme', 'portfolio', 'theme');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('admin','moderator','user','') NOT NULL,
  `hash` varchar(32) NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `hash`, `date_reg`) VALUES
(1, 'admin@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'admin', '4966d995c3772e703ba1e51687cf51e6', '2017-06-18 17:20:59'),
(2, 'test@admin.com', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'user', 'new', '2017-07-01 19:44:51'),
(3, 'test@admin.com', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'user', 'new', '2017-07-04 20:45:16'),
(4, 'test@admin.com', '8f14e45fceea167a5a36dedd4bea2543', 'user', 'new', '2017-07-04 20:45:26'),
(5, 'user@account.com', '1111', 'admin', '3rrece5g1111', '2020-11-04 21:53:41');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_item`
--
ALTER TABLE `category_item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `plugin`
--
ALTER TABLE `plugin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `key` (`key_field`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `category_item`
--
ALTER TABLE `category_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `plugin`
--
ALTER TABLE `plugin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- База данных: `connect`
--
CREATE DATABASE IF NOT EXISTS `connect` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `connect`;

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`id`, `content`) VALUES
(1, 'Data yes'),
(2, 'putrya'),
(10, 'hello bd'),
(11, ''),
(12, ''),
(13, 'switch case'),
(14, 'Fyton'),
(15, 'Yulya'),
(16, ''),
(17, 'hello bd'),
(18, ''),
(19, ''),
(20, ''),
(21, 'Jod'),
(22, 'word');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- База данных: `inkognito`
--
CREATE DATABASE IF NOT EXISTS `inkognito` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `inkognito`;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','moderator','user','') NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `email`, `password`, `role`, `avatar`, `hash`, `reg_date`) VALUES
(17, 'Eduard Kangash', 'inkognito', 'admin@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'admin', 'avatar.jpg', 'da6785f0451b4e3df9ce8797bc51c524', '2020-11-12 22:57:10'),
(18, 'Eduard Kangash', 'inkognito', 'admin@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'avatar.jpg', '9e181b62f988d39ef85938324f3c5dc9', '2020-11-14 17:18:25'),
(19, 'Eduard Kangash', 'inkognito', 'admin@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'avatar.jpg', '9e181b62f988d39ef85938324f3c5dc9', '2020-11-14 17:21:43');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- База данных: `main-robot`
--
CREATE DATABASE IF NOT EXISTS `main-robot` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `main-robot`;

-- --------------------------------------------------------

--
-- Структура таблицы `mytable`
--

CREATE TABLE `mytable` (
  `id` int(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf32 NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `mytable`
--

INSERT INTO `mytable` (`id`, `name`, `text`) VALUES
(1, 'Эдуард', 'робот собака дружок'),
(2, 'Эдуард', 'робот собака дружок'),
(3, '', ''),
(4, 'Преимущество на главной HN', 'ПЛАНШЕТ MAGIC PAD'),
(5, '', ''),
(7, '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `mytable`
--
ALTER TABLE `mytable`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- База данных: `spectre`
--
CREATE DATABASE IF NOT EXISTS `spectre` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `spectre`;

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `title`, `content`) VALUES
(0, 'The cms and TOP', 'Copy cms and Eduard'),
(1, 'The cms and now', 'Copy cms and sss');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('admin','moderator','user','') NOT NULL,
  `hash` varchar(32) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `hash`, `date`) VALUES
(1, 'admin@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'admin', '22b33657603d61d62ef14941f7dea5d6', '2020-08-05 23:11:22'),
(23, 'test25@admin.com', '1679091c5a880faf6fb5e6087eb1b2dc', 'user', 'news', '2020-09-27 01:44:27'),
(24, 'test25@admin.com', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'user', 'news', '2020-09-27 01:48:15'),
(25, 'test25@admin.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user', 'news', '2020-09-27 01:48:28'),
(26, 'test06@admin.com', 'c81e728d9d4c2f636f067f89cc14862c', 'user', 'news', '2020-10-06 00:04:53'),
(27, 'test06@admin.com', 'a87ff679a2f3e71d9181a67b7542122c', 'user', 'news', '2020-10-06 00:05:59');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- База данных: `testbd`
--
CREATE DATABASE IF NOT EXISTS `testbd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `testbd`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
