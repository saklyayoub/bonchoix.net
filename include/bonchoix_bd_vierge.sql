-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 27 Mai 2013 à 09:57
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `famill_article`
--

CREATE TABLE IF NOT EXISTS `famill_article` (
  `code_famill_art` varchar(50) NOT NULL,
  `nom_famill_art` varchar(100) NOT NULL,
  PRIMARY KEY (`code_famill_art`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
