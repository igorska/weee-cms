# ************************************************************
# Sequel Pro SQL dump
# Версия 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Адрес: 127.0.0.1 (MySQL 5.1.63)
# Схема: weee
# Время создания: 2012-08-20 12:37:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы weee_blogs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weee_blogs`;

CREATE TABLE `weee_blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `posts_count` int(11) NOT NULL,
  `is_open` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `url` (`url`),
  KEY `is_open` (`is_open`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weee_blogs` WRITE;
/*!40000 ALTER TABLE `weee_blogs` DISABLE KEYS */;

INSERT INTO `weee_blogs` (`id`, `title`, `url`, `author`, `posts_count`, `is_open`)
VALUES
	(1,'Тестовый блог','test',1,0,1);

/*!40000 ALTER TABLE `weee_blogs` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы weee_blogs_can_write
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weee_blogs_can_write`;

CREATE TABLE `weee_blogs_can_write` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `blog_id` (`blog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weee_blogs_can_write` WRITE;
/*!40000 ALTER TABLE `weee_blogs_can_write` DISABLE KEYS */;

INSERT INTO `weee_blogs_can_write` (`id`, `blog_id`, `user_id`)
VALUES
	(1,1,1),
	(2,2,1),
	(3,3,1),
	(4,4,1),
	(5,5,1),
	(6,6,1),
	(7,1,1);

/*!40000 ALTER TABLE `weee_blogs_can_write` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы weee_blogs_posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weee_blogs_posts`;

CREATE TABLE `weee_blogs_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `text_html` text NOT NULL,
  `text_short` text NOT NULL,
  `date` datetime NOT NULL,
  `blog` int(11) NOT NULL DEFAULT '0',
  `author` int(11) NOT NULL,
  `rating` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `blog` (`blog`),
  KEY `author` (`author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weee_blogs_posts` WRITE;
/*!40000 ALTER TABLE `weee_blogs_posts` DISABLE KEYS */;

INSERT INTO `weee_blogs_posts` (`id`, `title`, `text`, `text_html`, `text_short`, `date`, `blog`, `author`, `rating`)
VALUES
	(1,'Тестовая запись','<p>\r\n    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis nisi nec diam pretium in blandit est condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ac ligula nec leo vestibulum bibendum sed nec urna. Pellentesque vitae felis id tellus egestas lobortis id ut elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras purus erat, condimentum sit amet rhoncus eget, blandit quis velit. Suspendisse tempor ligula quis massa molestie vehicula. Maecenas semper velit scelerisque orci tincidunt sed aliquet quam molestie. Mauris lorem lacus, varius at dictum non, porttitor at massa. Nunc auctor, leo et placerat dignissim, mi nunc facilisis nulla, at dictum justo ipsum ut elit.\r\n</p>\r\n\r\n<p>\r\n    Aliquam molestie turpis eget turpis tincidunt eu venenatis erat malesuada. Etiam eros sem, luctus a ultricies nec, dapibus sit amet sem. Vivamus accumsan tempor elit nec laoreet. Vestibulum orci diam, congue ut accumsan vitae, imperdiet non massa. Nam quis nisi tortor, vitae posuere odio. Maecenas auctor quam consequat turpis tincidunt eget condimentum turpis commodo. Vestibulum vitae ligula justo. Donec ut purus sit amet mi scelerisque malesuada. Nulla at volutpat ante. Donec et nisl nunc. Aliquam ligula magna, commodo vel faucibus in, suscipit a tellus. Praesent rhoncus tellus orci, ut semper ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec quis nulla elit, non mollis erat. Duis sed dui eu urna varius fringilla. Nunc feugiat lectus quis nibh porta semper.\r\n</p>\r\n<cut>\r\n<p>\r\n    Etiam sagittis, purus a vehicula gravida, metus massa semper turpis, et pulvinar nisi magna a sapien. In volutpat vehicula magna, in aliquam purus tincidunt sit amet. Nullam lobortis nulla vel arcu accumsan ut dapibus tortor sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris aliquam ligula vel ligula interdum interdum. Nam hendrerit augue sit amet eros aliquam id convallis orci tempus. Pellentesque risus lacus, hendrerit in faucibus in, ullamcorper vitae nisl. Ut tincidunt consequat mauris, a ultricies mauris dapibus ut. Integer in justo vitae justo pharetra facilisis eget at odio. Ut a erat nec nunc pharetra fringilla. Nulla facilisi. Quisque sit amet lobortis mi.\r\n</p>\r\n\r\n<p>\r\n    Vestibulum sit amet odio eget neque tempor viverra ac sit amet urna. Aliquam non dolor ut leo facilisis pharetra et non lorem. Aenean venenatis, lacus in sollicitudin pellentesque, erat nunc dictum mauris, vitae sodales augue ante in tellus. Cras tempus luctus facilisis. Donec vitae nibh at risus viverra feugiat nec nec nulla. Sed id nunc ac enim ultricies ultricies ut at lorem. Praesent lectus tellus, vestibulum in luctus sed, placerat in mi. Vestibulum eros lacus, suscipit at eleifend vitae, interdum vitae nunc. Donec nec velit nibh. Quisque at nisl id lorem pellentesque lacinia. Suspendisse risus nisi, aliquet a adipiscing at, eleifend ac ipsum.\r\n</p>\r\n\r\n<p>\r\n    Pellentesque aliquet lorem id nibh convallis molestie. Donec tempus ipsum dolor, at congue mi. Mauris massa turpis, condimentum sed faucibus vel, auctor non velit. Maecenas lobortis convallis nisi eget fermentum. Quisque ac libero ipsum, vel aliquam tortor. Vestibulum justo leo, elementum in sodales at, faucibus at arcu. Vivamus a odio enim, vel scelerisque arcu. Maecenas et faucibus enim. Curabitur facilisis vestibulum egestas. Phasellus adipiscing dictum augue, a placerat ligula fringilla eget. Sed tempus augue quis erat semper non placerat risus rhoncus. Nulla auctor pellentesque malesuada.\r\n</p>','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis nisi nec diam pretium in blandit est condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ac ligula nec leo vestibulum bibendum sed nec urna. Pellentesque vitae felis id tellus egestas lobortis id ut elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras purus erat, condimentum sit amet rhoncus eget, blandit quis velit. Suspendisse tempor ligula quis massa molestie vehicula. Maecenas semper velit scelerisque orci tincidunt sed aliquet quam molestie. Mauris lorem lacus, varius at dictum non, porttitor at massa. Nunc auctor, leo et placerat dignissim, mi nunc facilisis nulla, at dictum justo ipsum ut elit.<br/>\r\n</p><br/>\r\n<br/>\r\n<p>Aliquam molestie turpis eget turpis tincidunt eu venenatis erat malesuada. Etiam eros sem, luctus a ultricies nec, dapibus sit amet sem. Vivamus accumsan tempor elit nec laoreet. Vestibulum orci diam, congue ut accumsan vitae, imperdiet non massa. Nam quis nisi tortor, vitae posuere odio. Maecenas auctor quam consequat turpis tincidunt eget condimentum turpis commodo. Vestibulum vitae ligula justo. Donec ut purus sit amet mi scelerisque malesuada. Nulla at volutpat ante. Donec et nisl nunc. Aliquam ligula magna, commodo vel faucibus in, suscipit a tellus. Praesent rhoncus tellus orci, ut semper ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec quis nulla elit, non mollis erat. Duis sed dui eu urna varius fringilla. Nunc feugiat lectus quis nibh porta semper.<br/>\r\n</p><br/>\r\n<br/>\r\n<p>Etiam sagittis, purus a vehicula gravida, metus massa semper turpis, et pulvinar nisi magna a sapien. In volutpat vehicula magna, in aliquam purus tincidunt sit amet. Nullam lobortis nulla vel arcu accumsan ut dapibus tortor sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris aliquam ligula vel ligula interdum interdum. Nam hendrerit augue sit amet eros aliquam id convallis orci tempus. Pellentesque risus lacus, hendrerit in faucibus in, ullamcorper vitae nisl. Ut tincidunt consequat mauris, a ultricies mauris dapibus ut. Integer in justo vitae justo pharetra facilisis eget at odio. Ut a erat nec nunc pharetra fringilla. Nulla facilisi. Quisque sit amet lobortis mi.<br/>\r\n</p><br/>\r\n<br/>\r\n<p>Vestibulum sit amet odio eget neque tempor viverra ac sit amet urna. Aliquam non dolor ut leo facilisis pharetra et non lorem. Aenean venenatis, lacus in sollicitudin pellentesque, erat nunc dictum mauris, vitae sodales augue ante in tellus. Cras tempus luctus facilisis. Donec vitae nibh at risus viverra feugiat nec nec nulla. Sed id nunc ac enim ultricies ultricies ut at lorem. Praesent lectus tellus, vestibulum in luctus sed, placerat in mi. Vestibulum eros lacus, suscipit at eleifend vitae, interdum vitae nunc. Donec nec velit nibh. Quisque at nisl id lorem pellentesque lacinia. Suspendisse risus nisi, aliquet a adipiscing at, eleifend ac ipsum.<br/>\r\n</p><br/>\r\n<br/>\r\n<p>Pellentesque aliquet lorem id nibh convallis molestie. Donec tempus ipsum dolor, at congue mi. Mauris massa turpis, condimentum sed faucibus vel, auctor non velit. Maecenas lobortis convallis nisi eget fermentum. Quisque ac libero ipsum, vel aliquam tortor. Vestibulum justo leo, elementum in sodales at, faucibus at arcu. Vivamus a odio enim, vel scelerisque arcu. Maecenas et faucibus enim. Curabitur facilisis vestibulum egestas. Phasellus adipiscing dictum augue, a placerat ligula fringilla eget. Sed tempus augue quis erat semper non placerat risus rhoncus. Nulla auctor pellentesque malesuada.<br/>\r\n</p>','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis nisi nec diam pretium in blandit est condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ac ligula nec leo vestibulum bibendum sed nec urna. Pellentesque vitae felis id tellus egestas lobortis id ut elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras purus erat, condimentum sit amet rhoncus eget, blandit quis velit. Suspendisse tempor ligula quis massa molestie vehicula. Maecenas semper velit scelerisque orci tincidunt sed aliquet quam molestie. Mauris lorem lacus, varius at dictum non, porttitor at massa. Nunc auctor, leo et placerat dignissim, mi nunc facilisis nulla, at dictum justo ipsum ut elit.<br/>\r\n</p><br/>\r\n<br/>\r\n<p>Aliquam molestie turpis eget turpis tincidunt eu venenatis erat malesuada. Etiam eros sem, luctus a ultricies nec, dapibus sit amet sem. Vivamus accumsan tempor elit nec laoreet. Vestibulum orci diam, congue ut accumsan vitae, imperdiet non massa. Nam quis nisi tortor, vitae posuere odio. Maecenas auctor quam consequat turpis tincidunt eget condimentum turpis commodo. Vestibulum vitae ligula justo. Donec ut purus sit amet mi scelerisque malesuada. Nulla at volutpat ante. Donec et nisl nunc. Aliquam ligula magna, commodo vel faucibus in, suscipit a tellus. Praesent rhoncus tellus orci, ut semper ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec quis nulla elit, non mollis erat. Duis sed dui eu urna varius fringilla. Nunc feugiat lectus quis nibh porta semper.<br/>\r\n</p><br/>\r\n','2012-04-24 17:17:23',1,1,0);

/*!40000 ALTER TABLE `weee_blogs_posts` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы weee_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weee_comments`;

CREATE TABLE `weee_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `text` text NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `model_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `model_name` (`model_name`),
  KEY `model_id` (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weee_comments` WRITE;
/*!40000 ALTER TABLE `weee_comments` DISABLE KEYS */;

INSERT INTO `weee_comments` (`id`, `author_id`, `date`, `text`, `model_name`, `model_id`)
VALUES
	(1,1,'2012-04-25 15:51:38','Тестовый комментарий #1','BlogsPosts',1),
	(2,1,'2012-04-25 15:59:48','Тестовый комментарий #2','BlogsPosts',1);

/*!40000 ALTER TABLE `weee_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы weee_news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weee_news`;

CREATE TABLE `weee_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cdate` datetime DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_text` text,
  `text` text,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weee_news` WRITE;
/*!40000 ALTER TABLE `weee_news` DISABLE KEYS */;

INSERT INTO `weee_news` (`id`, `cdate`, `author_id`, `category_id`, `url`, `title`, `short_text`, `text`, `seo_title`, `seo_description`, `seo_keywords`, `sort`)
VALUES
	(1,'2012-08-09 23:33:14',2,1,'testovaya_zapis','Тестовая запись','<p>\r\n	<strike>Lorem Ipsum</strike> - это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя <strong>Lorem Ipsum</strong> для распечатки образцов.</p>\r\n<p>\r\n	Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>\r\n','<p>\r\n	<strike>Lorem Ipsum</strike> - это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя <strong>Lorem Ipsum</strong> для распечатки образцов.</p>\r\n<p>\r\n	Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>\r\n','Тестовая запись','Тестовая запись','Тестовая запись',4),
	(2,'2012-08-18 15:09:06',2,1,'testovaya_zapis_2','Тестовая запись 2','<p>\r\n	Текст</p>\r\n','<p>\r\n	Текст</p>\r\n','Тестовая запись 2','Тестовая запись 2','Тестовая запись 2',1),
	(3,'2012-08-20 12:10:57',2,1,'testovaya_zapis_3','Тестовая запись 3','<p>\r\n	ываыва</p>\r\n','<p>\r\n	ываыва</p>\r\n','Тестовая запись 3','Тестовая запись 3','Тестовая запись 3',2),
	(4,'2012-08-20 12:11:18',2,1,'testovaya_zapis_4','Тестовая запись 4','<p>\r\n	ываыва</p>\r\n','<p>\r\n	ываыва</p>\r\n','Тестовая запись 4','Тестовая запись 4','Тестовая запись 4',3);

/*!40000 ALTER TABLE `weee_news` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы weee_news_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weee_news_categories`;

CREATE TABLE `weee_news_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weee_news_categories` WRITE;
/*!40000 ALTER TABLE `weee_news_categories` DISABLE KEYS */;

INSERT INTO `weee_news_categories` (`id`, `url`, `name`, `seo_title`, `seo_description`, `seo_keywords`)
VALUES
	(1,'test','Тестовая категория','Тестовая категория','Тестовая категория','Тестовая категория');

/*!40000 ALTER TABLE `weee_news_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы weee_pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weee_pages`;

CREATE TABLE `weee_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cdate` datetime DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weee_pages` WRITE;
/*!40000 ALTER TABLE `weee_pages` DISABLE KEYS */;

INSERT INTO `weee_pages` (`id`, `cdate`, `author_id`, `url`, `title`, `text`, `seo_title`, `seo_description`, `seo_keywords`)
VALUES
	(1,'2012-08-12 00:16:21',1,'kontakty','Контакты','<p>\r\n	Тест</p>\r\n','Контакты','Контакты','Контакты');

/*!40000 ALTER TABLE `weee_pages` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы weee_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weee_users`;

CREATE TABLE `weee_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'user',
  PRIMARY KEY (`id`),
  KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weee_users` WRITE;
/*!40000 ALTER TABLE `weee_users` DISABLE KEYS */;

INSERT INTO `weee_users` (`id`, `login`, `cdate`, `name`, `email`, `password`, `role`)
VALUES
	(2,'Troy','2012-08-18 14:32:58','Troy','troytft@gmail.com','85aa4877144f05016f40bfcf821705d3','administrator');

/*!40000 ALTER TABLE `weee_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
