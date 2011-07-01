-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 01 Lip 2011, 21:14
-- Wersja serwera: 5.0.51
-- Wersja PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `programtv`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) unsigned NOT NULL auto_increment,
  `category_name` varchar(255) collate utf8_polish_ci NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Dokumentalne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `channel`
--

CREATE TABLE IF NOT EXISTS `channel` (
  `channel_id` int(10) unsigned NOT NULL auto_increment,
  `channel_name` varchar(255) collate utf8_polish_ci NOT NULL,
  `channel_description` text collate utf8_polish_ci,
  PRIMARY KEY  (`channel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `channel`
--

INSERT INTO `channel` (`channel_id`, `channel_name`, `channel_description`) VALUES
(1, 'TVN', 'Program telewizji TVN S.A.'),
(2, 'Polsat', 'Program telewizji Polsat'),
(3, 'TVN24', 'Program informacyjny telewizji TVN'),
(5, 'TVP 1', 'Program Telewizji Polskiej S.A.'),
(6, 'TVP2', 'Program Telewizji Polskiej S.A. test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(10) unsigned NOT NULL auto_increment,
  `category_id` int(10) unsigned NOT NULL,
  `item_name` varchar(255) collate utf8_polish_ci NOT NULL,
  `item_description` text collate utf8_polish_ci,
  `item_delay` int(11) NOT NULL,
  PRIMARY KEY  (`item_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `item`
--

INSERT INTO `item` (`item_id`, `category_id`, `item_name`, `item_description`, `item_delay`) VALUES
(1, 1, 'Przykladowy', 'Jakis opis filmu dokumentalnego', 1309214100),
(2, 1, 'kolejny dokumentalny film', 'ten film bÄ™dzie trwaÅ‚ ok. 55 minut', 1309215300);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `program_id` int(10) unsigned NOT NULL auto_increment,
  `channel_id` int(10) unsigned NOT NULL,
  `program_date` date NOT NULL,
  `program_items` text collate utf8_polish_ci NOT NULL,
  PRIMARY KEY  (`program_id`),
  KEY `channel_id` (`channel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `program`
--

INSERT INTO `program` (`program_id`, `channel_id`, `program_date`, `program_items`) VALUES
(1, 1, '0000-00-00', 'a:12:{i:1309471200;s:1:"1";i:1309473000;s:1:"2";i:1309474800;s:1:"1";i:1309476600;s:1:"1";i:1309478400;s:1:"2";i:1309480200;s:1:"1";i:1309482000;s:1:"1";i:1309483800;s:1:"1";i:1309485600;s:1:"1";i:1309487400;s:1:"2";i:1309489200;s:1:"1";i:1309491000;s:1:"2";}'),
(3, 2, '2011-07-01', 'a:2:{i:1309471200;s:1:"1";i:1309505400;s:1:"2";}'),
(4, 2, '2011-07-05', 'a:5:{i:1309471200;s:1:"1";i:1309473000;s:1:"1";i:1309478400;s:1:"1";i:1309489200;s:1:"1";i:1309505400;s:1:"1";}');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(20) collate utf8_polish_ci NOT NULL,
  `password` varchar(60) collate utf8_polish_ci NOT NULL,
  PRIMARY KEY  (`login`,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`login`, `password`) VALUES
('admin', '0948400944fe6648936b7b6749d3a28c4ad538e4');
