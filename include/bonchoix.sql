-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 23 Mai 2013 à 00:12
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bonchoix`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `login_admin` varchar(30) NOT NULL,
  `mdp_admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `login_admin` (`login_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login_admin`, `mdp_admin`) VALUES
(1, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `code_art` varchar(10) NOT NULL,
  `design_courte_art` varchar(300) NOT NULL,
  `design_long_art` varchar(500) NOT NULL,
  `prix_art` varchar(20) NOT NULL,
  `code_sous_famill_art` varchar(10) NOT NULL,
  `code_famill_art` varchar(10) NOT NULL,
  `fav_art` tinyint(2) NOT NULL,
  PRIMARY KEY (`code_art`),
  KEY `code_sous_famill_art` (`code_sous_famill_art`),
  KEY `code_famill_art` (`code_famill_art`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`code_art`, `design_courte_art`, `design_long_art`, `prix_art`, `code_sous_famill_art`, `code_famill_art`, `fav_art`) VALUES
('123', '123', '132', '123', 'F_ALL', 'F', 0),
('5050', '5050', '5050', '5050', 'F_BOU', 'F', 0),
('555', 'percing ref 555', 'model 1', '555', 'A_PER', 'A', 1),
('86H526.5', 'ALLIANCE DEMI-TOUR OR 750 JAUNE', 'ALLIANCE DIAMANTS demi-tour or 750, qualitÃ© SÃ©ductions, serti griffe, total  25/100e de carat. \r\nTaille 46 Ã  62. ', '2250.336', 'F_ALL', 'F', 0),
('86H550.8', 'ALLIANCE DEMI-TOUR OR 750 JAUNE', 'ALLIANCE DIAMANTS demi-tour or 750, qualitÃ© SÃ©duction, serti rail, total 25/100e de carat. \r\nTaille 46 Ã  62.', '1458.226', 'F_ALL', 'F', 1),
('90H079.6', 'ALLIANCE OR 375 BLANC DIAMANT', 'ALLIANCE or blanc 375. 14 diamants total 10/100e de carat. T. 48 Ã  60.', '1250.308', 'F_ALL', 'F', 1),
('90H088.5', 'ALLIANCE OR 375 JAUNE DIAMANT', 'ALLIANCE or 375, serti rail, 13 diamants total 5/100e de carat. T. 46 Ã  58.', '633.996', 'F_ALL', 'F', 1),
('90H089.3', 'ALLIANCE OR BLANC 375 DIAMANTS', 'ALLIANCE or  blanc 375, serti rail, 13 diamants total 5/100e de carat. T. 46 Ã  58.', '889.669', 'F_ALL', 'F', 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `email_clt` varchar(30) NOT NULL,
  `nom_clt` varchar(30) NOT NULL,
  `prenom_clt` varchar(30) NOT NULL,
  `mdp_clt` varchar(30) NOT NULL,
  PRIMARY KEY (`email_clt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`email_clt`, `nom_clt`, `prenom_clt`, `mdp_clt`) VALUES
('bb@bb.bb', 'bb', 'bb', 'bb'),
('saklyayoub@live.com', 'sakly', 'ayoub', '20666996'),
('saklyyakoub@live.com', 'sakly', 'yakoub', '20666996'),
('skilatchy2011@hotmail.com', 'Sakly', 'Yakoub', 'skilatchy');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_cmd` varchar(30) NOT NULL,
  `email_clt` varchar(30) NOT NULL,
  `date_cmd` varchar(30) NOT NULL,
  `tel_contact_cmd` varchar(30) NOT NULL,
  `adresslivrison_cmd` varchar(250) NOT NULL,
  `montant_cmd` varchar(30) NOT NULL,
  `etats` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cmd`),
  KEY `email_clt` (`email_clt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_cmd`, `email_clt`, `date_cmd`, `tel_contact_cmd`, `adresslivrison_cmd`, `montant_cmd`, `etats`) VALUES
('201305202254', 'skilatchy2011@hotmail.com', '2013/05/20-22:54', '279571771', 't_ufu', '2250.336', 'facturer'),
('201305211207', 'bb@bb.bb', '2013/05/21-12:07', '20666996', 'tunis', '3500.644', 'facturer'),
('201305211424', 'saklyayoub@live.com', '2013/05/21-14:24', '20666996', 'tunis', '1188.996', 'facturer'),
('201305211425', 'saklyayoub@live.com', '2013/05/21-14:25', '20666996', 'tunis', '1250.308', 'annuler'),
('201305211426', 'saklyayoub@live.com', '2013/05/21-14:26', '20666996', 'tunis', '1458.226', 'en instance'),
('201305211430', 'saklyayoub@live.com', '2013/05/21-14:30', '20666996', 'tunis', '2694.977', 'confirmer');

-- --------------------------------------------------------

--
-- Structure de la table `commande_article`
--

CREATE TABLE IF NOT EXISTS `commande_article` (
  `id_cmd` varchar(30) NOT NULL,
  `code_art` varchar(10) NOT NULL,
  KEY `id_cmd` (`id_cmd`),
  KEY `code_art` (`code_art`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande_article`
--

INSERT INTO `commande_article` (`id_cmd`, `code_art`) VALUES
('201305202254', '86H526.5'),
('201305211207', '86H526.5'),
('201305211207', '90H079.6'),
('201305211424', '555'),
('201305211424', '90H088.5'),
('201305211425', '90H079.6'),
('201305211425', '86H550.8'),
('201305211425', '86H550.8'),
('201305211426', '86H550.8'),
('201305211426', '86H550.8'),
('201305211426', '90H089.3'),
('201305211430', '90H079.6'),
('201305211430', '90H089.3'),
('201305211430', '555');

-- --------------------------------------------------------

--
-- Structure de la table `contacteznous`
--

CREATE TABLE IF NOT EXISTS `contacteznous` (
  `id_cn` int(11) NOT NULL AUTO_INCREMENT,
  `email_cn` varchar(30) NOT NULL,
  `sujet_cn` varchar(150) NOT NULL,
  `message_cn` varchar(5000) NOT NULL,
  `date_cn` varchar(20) NOT NULL,
  `lu_cn` tinyint(1) NOT NULL,
  `repondu_cn` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_cn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `contacteznous`
--

INSERT INTO `contacteznous` (`id_cn`, `email_cn`, `sujet_cn`, `message_cn`, `date_cn`, `lu_cn`, `repondu_cn`) VALUES
(3, 'yyo@live.com', 'test', 'test\r\n', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `famill_article`
--

CREATE TABLE IF NOT EXISTS `famill_article` (
  `code_famill_art` varchar(50) NOT NULL,
  `nom_famill_art` varchar(100) NOT NULL,
  PRIMARY KEY (`code_famill_art`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `famill_article`
--

INSERT INTO `famill_article` (`code_famill_art`, `nom_famill_art`) VALUES
('A', 'Accessoires'),
('E', 'Enfant & Ado'),
('F', 'Femme'),
('H', 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL,
  `nom_du_site` varchar(30) NOT NULL,
  `page_facebook` varchar(250) NOT NULL,
  `page_tweeter` varchar(100) NOT NULL,
  `page_youtube` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `text_recherche` varchar(300) NOT NULL,
  `m_recherche` tinyint(1) NOT NULL,
  `m_newsletter` tinyint(1) NOT NULL,
  `m_facebook` tinyint(1) NOT NULL,
  `m_tweeter` tinyint(1) NOT NULL,
  `m_youtube` tinyint(1) NOT NULL,
  `x_gmaps` double NOT NULL,
  `y_gmaps` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `info`
--

INSERT INTO `info` (`id`, `nom_du_site`, `page_facebook`, `page_tweeter`, `page_youtube`, `description`, `adresse`, `tel`, `text_recherche`, `m_recherche`, `m_newsletter`, `m_facebook`, `m_tweeter`, `m_youtube`, `x_gmaps`, `y_gmaps`) VALUES
(1, 'Guide Bijoux', 'https://www.facebook.com/guidebijouxx', '#', '#', 'Guide Bijoux vous invite Ã  dÃ©couvrir sa bijouterie en ligne spÃ©cialisÃ©e dans les bijoux et montres pour femme, homme et enfant. Notre bijouterie en ligne ne propose que des bijoux d''excellence sÃ©lectionnÃ©s parmi les marques les plus prestigieuses que l''on ne prÃ©sente plus. Parce qu''il existe un bijou pour tous les membres de la famille.<br>La bijouterie en ligne Le bon choix vous offre Ã©galement de nombreux conseils pour bien choisir vos bijoux pour tous les Ã©vÃ©nements de la vie : mariage, fianÃ§ailles, fÃªtes de NoÃ«l ou simple cadeau. <br>Tous nos clients bÃ©nÃ©ficient d''une garantie satisfait ou remboursÃ©" afin d''acheter en toute sÃ©rÃ©nitÃ©.', '23 Rue 7 novembre Carthage', '00 216 22 805 020/00 216 20 666 996', 'nomdusite@mail.com', 1, 1, 1, 1, 1, 36.81592, 10.177149);

-- --------------------------------------------------------

--
-- Structure de la table `jquery`
--

CREATE TABLE IF NOT EXISTS `jquery` (
  `id_jqy` int(11) NOT NULL,
  `titre_jqy` varchar(300) NOT NULL,
  `text_jqy` varchar(300) NOT NULL,
  PRIMARY KEY (`id_jqy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jquery`
--

INSERT INTO `jquery` (`id_jqy`, `titre_jqy`, `text_jqy`) VALUES
(1, 'BONNE FETE', 'FÃªte des maman!'),
(2, 'CrÃ©ez votre bracelet', 'Une offre de guide bijoux'),
(3, 'Les perles de culture', 'Les perles de culture'),
(4, 'BONNE FETE', 'FÃªte des maman'),
(5, 'Profiter de -20% de remise', 'Des remise allant jus''qua -20%');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `email_nl` varchar(100) NOT NULL,
  `date_inscrip_nl` varchar(30) NOT NULL,
  PRIMARY KEY (`email_nl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`email_nl`, `date_inscrip_nl`) VALUES
('a@a.a', '20130518-0009'),
('bb@bb.bb', '20130521-1206'),
('med@yahoo.fr', '20130506-1254'),
('saklyayoub@live.com', '20130505-1627'),
('saklyyakoub@ive.com', '20130519-2345'),
('skilatchy2011@hotmail.com', '20130520-2251');

-- --------------------------------------------------------

--
-- Structure de la table `sous_famill_article`
--

CREATE TABLE IF NOT EXISTS `sous_famill_article` (
  `code_sous_famill_art` varchar(10) NOT NULL,
  `nom_sous_famill_art` varchar(50) NOT NULL,
  `code_famill_art` varchar(10) NOT NULL,
  PRIMARY KEY (`code_sous_famill_art`),
  KEY `code_famill_art` (`code_famill_art`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sous_famill_article`
--

INSERT INTO `sous_famill_article` (`code_sous_famill_art`, `nom_sous_famill_art`, `code_famill_art`) VALUES
('A_PER', 'Piercings', 'A'),
('E_BAG', 'Bagues', 'E'),
('E_BOU', 'Boucles d''oreilles', 'E'),
('E_BRA', 'Bracelets', 'E'),
('E_COL', 'Colliers & Chaines', 'E'),
('E_GOU', 'Gourmettes', 'E'),
('E_MON', 'Montres', 'E'),
('E_PEN', 'Pendentifs', 'E'),
('F_ALL', 'Alliences', 'F'),
('F_BAG', 'Bagues', 'F'),
('F_BOU', 'Boucles d''oreilles', 'F'),
('F_BRA', 'Bracelets', 'F'),
('F_CHI', 'ChaÃ®nes', 'F'),
('F_MON', 'Montres', 'F'),
('F_PEN', 'Pendentifs', 'F'),
('H_ALL', 'Alliences', 'H'),
('H_BAG', 'Bagues', 'H'),
('H_COL', 'Colliers & Chaines', 'H'),
('H_MON', 'Montres', 'H'),
('H_PEN', 'Pendentifs', 'H');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`code_sous_famill_art`) REFERENCES `sous_famill_article` (`code_sous_famill_art`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`code_famill_art`) REFERENCES `sous_famill_article` (`code_famill_art`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`email_clt`) REFERENCES `client` (`email_clt`);

--
-- Contraintes pour la table `commande_article`
--
ALTER TABLE `commande_article`
  ADD CONSTRAINT `commande_article_ibfk_1` FOREIGN KEY (`id_cmd`) REFERENCES `commande` (`id_cmd`),
  ADD CONSTRAINT `commande_article_ibfk_2` FOREIGN KEY (`code_art`) REFERENCES `article` (`code_art`);

--
-- Contraintes pour la table `sous_famill_article`
--
ALTER TABLE `sous_famill_article`
  ADD CONSTRAINT `sous_famill_article_ibfk_5` FOREIGN KEY (`code_famill_art`) REFERENCES `famill_article` (`code_famill_art`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
