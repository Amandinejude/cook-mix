-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 14 Février 2017 à 11:45
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetfinal`
--

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

CREATE TABLE `favorites` (
  `users_us_id` int(11) NOT NULL,
  `places_pl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `favorites`
--

INSERT INTO `favorites` (`users_us_id`, `places_pl_id`) VALUES
(12, 50),
(14, 45),
(14, 50);

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `in_id` int(11) NOT NULL,
  `in_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ingredients`
--

INSERT INTO `ingredients` (`in_id`, `in_name`) VALUES
(39, 'flocons d’avoine'),
(40, 'noisettes'),
(41, 'huile de noisette'),
(42, 'spéculoos'),
(43, 'fruits sec'),
(44, 'sirop d’agave'),
(45, 'avocat'),
(46, 'jus de citron'),
(47, 'fromage frais'),
(48, 'sel '),
(49, 'poivre'),
(50, 'paprika'),
(51, 'persil'),
(52, 'pain'),
(53, 'farine'),
(54, 'sucre'),
(55, 'oeufs'),
(56, 'levure'),
(57, 'beurre'),
(58, 'lait'),
(59, 'cacao en poudre'),
(60, 'bananes'),
(61, 'framboises'),
(62, 'fraises'),
(63, 'myrtilles congelées'),
(64, 'poudre d''açaï'),
(65, 'muesli'),
(66, 'fleur d''oranger'),
(67, 'vanille liquide'),
(68, 'matcha en poudr'),
(69, 'huile végétale'),
(70, 'muscade'),
(71, 'carottes râpées'),
(72, 'noix'),
(73, 'eau'),
(74, 'cannelle'),
(75, 'chocolat lait'),
(76, 'chocolat noir'),
(77, 'chocolat blanc'),
(78, 'pranilé');

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE `places` (
  `pl_id` int(11) NOT NULL,
  `pl_name` varchar(255) DEFAULT NULL,
  `pl_tel` varchar(20) NOT NULL,
  `pl_address` varchar(255) DEFAULT NULL,
  `pl_city` enum('Paris','','','') DEFAULT NULL,
  `pl_district` varchar(5) DEFAULT NULL,
  `pl_website` varchar(255) DEFAULT NULL,
  `pl_instagram` varchar(200) NOT NULL,
  `pl_picture` longtext,
  `users_us_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `places`
--

INSERT INTO `places` (`pl_id`, `pl_name`, `pl_tel`, `pl_address`, `pl_city`, `pl_district`, `pl_website`, `pl_instagram`, `pl_picture`, `users_us_id`) VALUES
(1, 'Café test', '2458745896', 'test test', 'Paris', '14', 'http://test.fr', '@test', 'cheminimage', 1),
(8, 'Season', '+33', '1', 'Paris', '75003', 'https://www.season-paris.com/', '@seasonparis', 'upload/1486996336.jpg', 1),
(9, 'Wild', '+33', '55', 'Paris', '75003', 'http://www.wildandthemoon.com/', '@wildandthemoon', 'upload/1486996371.jpg', 1),
(38, 'Chambelland', '+33', '14', 'Paris', '75011', 'http://chambelland.com/', '@chambellandboulangerie', 'upload/1486996422.jpg', 1),
(39, 'Café', '+33', '3', 'Paris', '75011', 'http://www.cafeoberkampf.com/', '@cafeoberkampf', 'upload/1486996438.jpg', 1),
(40, 'Ob-La-Di', '', '54', 'Paris', '75003', '', '@obladicafe', 'upload/1486996451.jpg', 1),
(41, 'Café', '+33', '51,', 'Paris', '75001', 'https://shop.kitsune.fr/stores', '@cafekitsune', 'upload/1486996499.jpg', 1),
(42, 'Holybelly', '', '19', 'Paris', '75010', 'http://holybel.ly/', '@holybellycafe', 'upload/1486996544.jpg', 1),
(43, 'Ellsworth', '+33', '34,', 'Paris', '75001', 'http://www.ellsworthparis.com/', '@ellsworth.paris', 'upload/1486996561.jpg', 1),
(44, 'Rose', '', '46', 'Paris', '75009', 'http://www.rosebakery.fr/', '@rosebakeryparis', 'upload/1486996577.jpg', 1),
(45, 'Claus', '+33', '14-15', 'Paris', '75001', 'http://www.clausparis.com/', '@clauspetitdejeuner', 'upload/1486996645.jpg', 1),
(46, 'Paperboy', '+33', '137', 'Paris', '75011', '', '@paperboyparis', 'upload/1486996665.jpg', 1),
(47, 'Café', '+33', '58', 'Paris', '75010', 'http://www.cafepinson.fr/home/', '@cafepinson', 'upload/1486996674.jpg', 1),
(48, 'Soul', '+33', '33', 'Paris', '75018', '', '@soulkitchenparis', 'upload/1486996685.jpg', 1),
(49, 'Lockwood', '+33', '73', 'Paris', '75002', 'http://www.lockwoodparis.com/bar/', '@lockwoodparis', 'upload/1486996703.jpg', 1),
(50, 'Broken', '', '10', 'Paris', '75011', '', '@broken_biscuits_paris', 'upload/1486996994.jpg', 1),
(51, 'La', '', '2', 'Paris', '75011', 'https://laguinguettedangele.com/', '@laguinguettedangele', 'upload/1486997005.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `places_has_recipes`
--

CREATE TABLE `places_has_recipes` (
  `places_pl_id` int(11) NOT NULL,
  `recipes_re_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `places_has_recipes`
--

INSERT INTO `places_has_recipes` (`places_pl_id`, `recipes_re_id`) VALUES
(8, 7),
(8, 8),
(8, 9),
(8, 10),
(9, 9),
(9, 10),
(39, 6),
(40, 6),
(40, 7),
(40, 10),
(41, 13),
(42, 8),
(42, 9),
(43, 8),
(44, 12),
(44, 15),
(45, 8),
(45, 11),
(46, 8),
(47, 11),
(47, 13),
(49, 6),
(49, 8),
(50, 11),
(50, 15),
(51, 6),
(51, 10),
(51, 14),
(51, 15);

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `re_id` int(11) NOT NULL,
  `re_name` varchar(255) DEFAULT NULL,
  `re_picture` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recipes`
--

INSERT INTO `recipes` (`re_id`, `re_name`, `re_picture`) VALUES
(5, 'recipeTEST', 'testIMGTEST'),
(6, 'Granola', 'upload/1486997231.jpg'),
(7, 'Avocado', 'upload/1486997211.jpg'),
(8, 'Pancakes', 'upload/1486997295.jpg'),
(9, 'Leopard', 'upload/1486997306.jpg'),
(10, 'Açaï', 'upload/1486997322.jpg'),
(11, 'Madeleine', 'upload/1486997334.jpg'),
(12, 'Cheesecake', 'upload/1486997343.jpg'),
(13, 'Matcha', 'upload/1486997352.jpg'),
(14, 'Carrot', 'upload/1486997377.jpg'),
(15, 'Cookies', 'upload/1486997387.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `recipes_has_ingredients`
--

CREATE TABLE `recipes_has_ingredients` (
  `recipes_re_id` int(11) NOT NULL,
  `ingredients_in_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recipes_has_ingredients`
--

INSERT INTO `recipes_has_ingredients` (`recipes_re_id`, `ingredients_in_id`) VALUES
(6, 39),
(6, 40),
(6, 41),
(6, 43),
(6, 44),
(7, 45),
(7, 46),
(7, 47),
(7, 48),
(7, 49),
(7, 50),
(7, 51),
(7, 52),
(8, 53),
(8, 54),
(8, 55),
(8, 56),
(8, 57),
(8, 58),
(9, 53),
(9, 54),
(9, 56),
(9, 57),
(9, 58),
(9, 59),
(10, 60),
(10, 61),
(10, 62),
(10, 63),
(10, 64),
(10, 65),
(11, 53),
(11, 54),
(11, 55),
(11, 56),
(11, 57),
(11, 66),
(12, 42),
(12, 47),
(12, 54),
(12, 55),
(12, 57),
(12, 67),
(13, 54),
(13, 58),
(13, 68),
(13, 73),
(14, 53),
(14, 54),
(14, 55),
(14, 56),
(14, 67),
(14, 69),
(14, 70),
(14, 71),
(14, 72),
(14, 74),
(15, 48),
(15, 53),
(15, 54),
(15, 55),
(15, 56),
(15, 57),
(15, 67),
(15, 76);

-- --------------------------------------------------------

--
-- Structure de la table `steps`
--

CREATE TABLE `steps` (
  `st_id` int(11) NOT NULL,
  `st_description` longtext NOT NULL,
  `recipes_re_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `steps`
--

INSERT INTO `steps` (`st_id`, `st_description`, `recipes_re_id`) VALUES
(11, 'Préparez vos ingredients :\n\n-300 g de flocons d’avoine\n-150 g d’un mélange amande et noisettes rapidement mixé\n-2 CS d’huile de noisette\n-4 CS de sirop d’agave\n-1 CC de mélange d’épice ou cannelle\n-Quelques noisettes et amandes entières\n-Un petite poignée de fruits secs', 6),
(12, '-Préchauffez votre four à 150°C.\n\n-Versez les flocons d’avoine dans un cul de poule (ou un saladier).\n\n-Ajoutez le sirop d’agave et l’huile de noisettes. Mélangez.\n\n-Ajoutez les amandes et noisettes grossièrement mixées. Mélangez de nouveau.\n\n-Ajoutez des épices, mélangez encore une fois.\n\n-Versez le mélange sur une plaque de cuisson.\n\n-Parsemez les noisettes et amandes entières sur les flocons d’avoine, et enfournez pour 10 minutes.\n\n-Sortez la plaque du four, mélangez et ré-enfournez pour de nouveau 10 minutes.\n\n-Normalement vos flocons d’avoines doivent être joliment dorés. Si ce n’est pas le cas, ré-enfournez de nouveau pour quelques minutes.\n\n-A la sortie du four, laissez complètement refroidir, le mélange va peu à peu devenir croustillant.\n\n-Une fois froid, ajoutez des fruits secs, puis conservez dans un bocal fermé hermétiquement.', 6),
(13, 'Préparez vos ingrédients :\r\n\r\n- 2 avocats bien mûrs\r\n- 4 cuillères à café de jus de citron\r\n- 200 g de fromage frais\r\n- 6 cébettes émincées (oignons nouveaux)\r\n- sel, poivre\r\n- 1 baguette fine (dite ficelle)\r\n- 1 pincée de paprika', 7),
(14, '-Retirez la chair des avocats et placez-la dans un bol. \n\n-Citronnez immédiatement et écrasez grossièrement à la fourchette.\n\n-Ajoutez le fromage frais et les cébettes. Rectifiez l''assaisonnement. \n6Couvrez et réservez au frais.\n\n-Détaillez la ficelle en 16 tranches. \n\n-Toastez-les légèrement et déposez 1 cuillère à soupe de mélange à l''avocat. \n\n-Parsemez de paprika avant de servir.', 7),
(15, 'Préparez vos ingrédients :\r\n\r\n- 250 g de farine\r\n- 30 g de sucre\r\n- 2 oeufs\r\n- 1 sachet de levure traditionnelle\r\n- 65 g de beurre doux\r\n- 1 pincée de sel\r\n- 30 cl de lait', 8),
(16, '-Faire fondre le beurre, dans une casserole à feu doux ou dans un bol au micro-ondes. \n\n-Mettre la farine, la levure et le sucre dans un saladier. Mélanger et creuser un puits. \n\n-Ajouter ensuite les oeufs entiers et fouetter l''ensemble.\n\n-Incorporer le beurre fondu, fouetter puis délayer progressivement le mélange avec le lait afin d''éviter les grumeaux.\n\n-Laisser reposer la pâte au minimum 1 heure au réfrigérateur.\n\n-Dans une poêle chaude et légèrement huilée, faire cuire comme des crêpes, mais en les faisant plus petites. Réserver au chaud et déguster.', 8),
(17, 'Préparez vos ingrédients :\r\n\r\n- 22 cl + 2 cuillères à café de lait \r\n- 50 g de beurre\r\n- 400 g de farine\r\n- 50 g + 1 cuillère à café de sucre\r\n- 3 cuillères à café de cacao non sucré\r\n- 1,5 cuillère à café de levure deshydratée\r\n- 1 cuillère à café de sel', 9),
(18, '-Placez 22 cl de lait, le beurre mou, la farine, le sucre, la levure et le sel dans le bol d''un robot pâtissier et pétrissez pendant 5 min (la pâte doit se décoller de la paroi).\n\n-Dans une tasse, mélangez le cacao, 1 cuillère à café de sucre et 1 cuillère à café de lait. \nMettez la première pâte sur un plan de travail fariné et divisez-la en 2, puis divisez une demi-part encore en 2. Ajoutez un peu de pâte de cacao à un quart de pâte pour obtenir une coloration marron clair. Faites la même chose avec le second quart, mais en ajoutant un peu plus de pâte de cacao de façon à obtenir une couleur marron foncé. \n\n-Divisez la pâte blanche en cinq et chaque pâte de couleur en quatre. Formez 4 boudins de même longueur avec un morceau de chaque pâte. Etalez le boudin marron foncé pour le placer autour du marron clair. Etalez la pâte pâte blanche pour envelopper le tout. Réalisez ainsi 3 autres rouleaux.\n\n-Roulez chaque boudin sur un plan de travail fariné afin de les agrandir et les affiner, pour pouvoir les diviser en 3 rouleaux de 20 cm environ. Placez-les dans un moule à cake chemisé de papier sulfurisé. Finalement, vous devez avoir 12 rouleaux de pâte superposés dans le moule. Etalez le dernier morceau de pâte blanche en un rectangle fin et déposez-les sur les rouleaux.\n\n-Laissez reposer 1h30 environ recouvert d''un torchon dans un endroit tempéré et à l''abri des courants d''air (la pâte doit doubler de volume).\n\n-Préchauffez le four à 170°C (thermostat 5 - 6). \n-Badigeonnez la surface d''une cuillère à café de lait et enfournez 30 minutes. Sortez le pain du four et laissez-le refroidir sur une grille', 9),
(19, 'Préparez vos ingrédients :\r\n\r\n- 1 banane - 1 poignée de framboises ou de fraises \r\n- 1 poignée de myrtilles congelées\r\n- 2 cuillères à soupe en poudre d''açaï\r\n- 1 petit verre de lait (classique, d''amande ou du lait de coco)', 10),
(20, '-Mettez tous ces ingrédients dans un blender et mixez jusqu''à ce que le mélange soit totalement lisse et crémeux (c''est la poudre d''açaï qui donne ce côté "épais" à votre préparation). \r\n\r\n-Versez dans un bol puis agrémentez des fruits de votre choix : baies de goji, fraises, amandes, du kiwi ou de la noix de coco râpé. \r\n\r\n-Pensez également aux accompagnements tels que le muesli ou encore le miel.', 10),
(21, 'Préparez vos ingrédients :\r\n\r\n- 3 oeufs\r\n- 150 g de sucre\r\n- 200 g de farine\r\n- 2 cuillères à soupe d''eau de fleur d''oranger\r\n- 8 g de levure chimique\r\n- 100 g de beurre fondu\r\n- 50 g de lait', 11),
(22, '-Préchauffer le four à 240°C (thermostat 8).\r\n\r\n-Faire fondre le beurre dans une casserole à feu doux, réserver.\r\n\r\n-Mélanger les oeufs avec le sucre, jusqu''à ce que le mélange blanchisse. \r\n\r\n-Ajouter ensuite la fleur d''oranger et 40 g de lait.\r\n\r\n-Ajouter la farine et la levure chimique. \r\n\r\n-C''est ensuite le tour du beurre et le restant du lait; laisser reposer 15 min.\r\n\r\n-Beurrer les moules à madeleines et verser la préparation dedans (mais pas jusqu''en haut, les madeleines vont gonfler !).\r\n\r\n-Enfourner à 240°C (thermostat 8), et baisser au bout de 5 min à 200°C (thermostat 6-7); laisser encore 10 min. Surveiller bien la cuisson !\r\n\r\n-Démouler dès la sortie du four.\r\n', 11),
(23, 'Préparez vos ingrédients :\r\n\r\nPour le fond du gâteau :\r\n- 200 g de biscuits spéculoos\r\n- 80 g de beurre\r\n\r\nPour la garniture :\r\n- 1 kg de St-Morêt \r\n- 150 g de sucre\r\n- 2 oeufs\r\n- 1 cuillère à café de vanille liquide', 12),
(24, '-Préchauffer le four à 180°C (Thermostat 6). \r\n\r\n-Passer les spéculoos au mixer pour obtenir une poudre, puis les mélanger au beurre fondu. \r\n\r\n-Tapisser le fond d''un moule à gâteau (antiadhésif de préférence) avec le mélange, bien tasser, et faire cuire 10 min. \r\n\r\n-Mélanger le St moret avec le sucre, les oeufs et la vanille (au mixer c''est mieux, afin d''obtenir une préparation presque liquide). \r\n\r\n-Verser le mélange sur le fond de spéculoos cuit. \r\n\r\n-Mettre au four 25 à 35 min selon la puissance du four (moins cela cuit, plus cela sera crémeux...). \r\n\r\n-Laisser refroidir puis mettre au réfrigérateur pendant 4 h minimum.', 12),
(25, 'Préparez vos ingrédients :\r\n\r\n-1 CC de thé vert matcha en poudre\r\n-2 CC de sucre\r\n-3CS d''eau chaude\r\n-250ml de lait froid ou 300ml de lait chaud', 13),
(26, '-Mettez la poudre de thé vert matcha et le sucre dans une tasse (ou dans un mug).\r\n\r\n-Ajoutez l''eau chaude et mélangez à la cuillère ou au fouet jusqu''à ce que vous obteniez une pâte vert foncé onctueuse. Cette étape permet d''éviter les grumeaux.\r\n\r\n-Faites chauffer le lait à la casserole puis versez-le dans la tasse jusqu''à ce qu''elle soit presque pleine. Utilisez du lait froid pour un latte glacé.\r\n\r\n-Utilisez un fouet pour mélanger la pâte avec le lait jusqu''à ce que le liquide soit onctueux et vert clair.\r\n\r\n-Si vous le souhaitez, parsemez une pincée de poudre de thé vert matcha sur le dessus pour décorer. Vous pouvez aussi ajouter des glaçons pour un latte glacé extra frais.', 13),
(27, 'Préparez vos ingrédients :\r\n\r\n- 4 œufs \r\n- 180 g d''huile végétale\r\n- 250 g de sucre\r\n- 250 g de farine fluide\r\n- 2 cuillères à café d''extrait de vanille liquide\r\n- 1 cuillères à café rase de muscade\r\n- 1 sachet de levure chimique\r\n- 2 cuillères à café rase de cannelle\r\n- 300 g de carottes râpées (3 à 4 grosses carottes)\r\n- 120 g de noix concassées (pas broyées)', 14),
(28, '-Préchauffer votre four à 175° (thermostat 5/6).\r\n\r\n-Mélanger au fouet électrique les 4 œufs et le sucre.\r\n\r\n-Incorporer l''extrait de vanille, la muscade, la cannelle et l''huile. \r\n\r\n-Mélanger le tout avec le fouet.\r\n\r\n-Ajouter la farine et la levure, tourner avec le fouet éteint pour mélanger un peu puis allumer le fouet en augmentant de puissance progressivement jusqu''à obtention d''une pâte lisse.\r\n\r\n-Ajouter les carottes râpées et les noix concassées. Mélanger au fouet doucement jusqu''à ce que la pâte soit homogène.\r\n\r\n-Huiler et fariner légèrement le moule (voire les 2 moules car la dose le permet) et verser la préparation.\r\n\r\n-Enfourner 30 à 40 minutes selon votre four à 175° (th 5/6). Piquer pour vérifier que le gâteau soit cuit.', 14),
(29, 'Préaprez vos ingrédients :\r\n\r\n- 85 g beurre mou\r\n- 1 oeuf \r\n- 85 g sucre\r\n- Essence de vanille ou 1 sachet de sucre vanillé\r\n- 150 g de farine\r\n- 100 g de chocolat noir\r\n- 1 cuillère à café de sel\r\n- 1 cuillère à café de levure chimique', 15),
(30, '-Détailler le chocolat en pépites.\r\n\r\n-Préchauffer le four à 180°C (thermostat 6).\r\n\r\n-Dans un saladier, mettre 75 g de beurre, le sucre, l''oeuf entier, la vanille et mélanger le tout.\r\n\r\n-Ajouter petit à petit la farine mélangée à la levure, le sel et le chocolat.\r\n\r\n-Beurrer une plaque allant au four et former les cookies sur la plaque.\r\n\r\n-Pour former les cookies, utiliser 2 cuillères à soupe et faire des petits tas espacés les uns des autres; ils grandiront à la cuisson.\r\n\r\n-Enfourner pour 10 minutes de cuisson.', 15);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `us_id` int(11) NOT NULL,
  `us_name` varchar(255) DEFAULT NULL,
  `us_firstname` varchar(255) DEFAULT NULL,
  `us_password` varchar(255) DEFAULT NULL,
  `us_email` varchar(255) DEFAULT NULL,
  `us_type` enum('admin','user') DEFAULT 'user',
  `active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`us_id`, `us_name`, `us_firstname`, `us_password`, `us_email`, `us_type`, `active`) VALUES
(1, 'Mike', 'Sylvestre', 'motdepasse', 'mike@mike.fr', 'user', '1'),
(2, 'update', 'update', 'update', 'up@date.com', NULL, '0'),
(10, 'Massine', 'Djafer', 'webforce3', 'djafer.massine.pro@gmail.com', 'admin', '1'),
(11, 'Warda', 'Moulier', 'webforce3', 'warda.moulier@gmail.com', 'admin', '1'),
(12, 'Amandine', 'Marchand', 'webforce3', 'amandine.marchand.pro@gmail.com', 'admin', '1'),
(14, 'Alice', 'wonderland', 'motdepasse', 'alice@wonderland.com', 'user', '1'),
(15, 'Sheldon', '	Cooper', 'bazinga', '	shelly@bbang.fr', 'user', '1'),
(16, 'new', 'test', 'newpdw', 'new@new.com', 'user', '1'),
(17, 'new', 'test', 'newpdw', 'new2@new.com', 'user', '0'),
(18, 'new', 'test', 'newpdw', 'new2@new.com', 'user', '1'),
(20, 'testhash', 'testhash', '$2y$10$6V1HX5f3Qk5Qfb7G4W/bwuxo6llEjWN5OSIpWZtd.p0HbkSmTRPjK', 'new3@hashage.com', 'user', '1'),
(21, 'TEST', 'TEST', '$2y$10$UICuOwUOCao/Tuf6WBOboOsX9oVw8mmxrcEUJRXsjYvWzM2LMs7tO', 'TEST@TEST.TEST', 'user', '1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`users_us_id`,`places_pl_id`),
  ADD KEY `fk_users_has_places_places1_idx` (`places_pl_id`),
  ADD KEY `fk_users_has_places_users1_idx` (`users_us_id`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`in_id`);

--
-- Index pour la table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`pl_id`),
  ADD KEY `fk_places_users1_idx` (`users_us_id`);

--
-- Index pour la table `places_has_recipes`
--
ALTER TABLE `places_has_recipes`
  ADD PRIMARY KEY (`places_pl_id`,`recipes_re_id`),
  ADD KEY `fk_places_has_recipes_recipes1_idx` (`recipes_re_id`),
  ADD KEY `fk_places_has_recipes_places1_idx` (`places_pl_id`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`re_id`);

--
-- Index pour la table `recipes_has_ingredients`
--
ALTER TABLE `recipes_has_ingredients`
  ADD PRIMARY KEY (`recipes_re_id`,`ingredients_in_id`),
  ADD KEY `fk_recipes_has_ingredients_ingredients1_idx` (`ingredients_in_id`),
  ADD KEY `fk_recipes_has_ingredients_recipes1_idx` (`recipes_re_id`);

--
-- Index pour la table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `fk_steps_recipes1_idx` (`recipes_re_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT pour la table `places`
--
ALTER TABLE `places`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `steps`
--
ALTER TABLE `steps`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_users_has_places_places1` FOREIGN KEY (`places_pl_id`) REFERENCES `places` (`pl_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_has_places_users1` FOREIGN KEY (`users_us_id`) REFERENCES `users` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `fk_places_users1` FOREIGN KEY (`users_us_id`) REFERENCES `users` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `places_has_recipes`
--
ALTER TABLE `places_has_recipes`
  ADD CONSTRAINT `fk_places_has_recipes_places1` FOREIGN KEY (`places_pl_id`) REFERENCES `places` (`pl_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_places_has_recipes_recipes1` FOREIGN KEY (`recipes_re_id`) REFERENCES `recipes` (`re_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recipes_has_ingredients`
--
ALTER TABLE `recipes_has_ingredients`
  ADD CONSTRAINT `fk_recipes_has_ingredients_ingredients1` FOREIGN KEY (`ingredients_in_id`) REFERENCES `ingredients` (`in_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_recipes_has_ingredients_recipes1` FOREIGN KEY (`recipes_re_id`) REFERENCES `recipes` (`re_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `fk_steps_recipes1` FOREIGN KEY (`recipes_re_id`) REFERENCES `recipes` (`re_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
