-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 19 Cze 2011, 21:24
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `channel`
--

CREATE TABLE IF NOT EXISTS `channel` (
  `channel_id` int(10) unsigned NOT NULL auto_increment,
  `channel_name` varchar(255) collate utf8_polish_ci NOT NULL,
  `channel_description` text collate utf8_polish_ci,
  PRIMARY KEY  (`channel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(10) unsigned NOT NULL auto_increment,
  `category_id` int(10) unsigned NOT NULL,
  `item_name` varchar(255) collate utf8_polish_ci NOT NULL,
  `item_description` text collate utf8_polish_ci,
  `item_delay` time NOT NULL,
  PRIMARY KEY  (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- RELACJE TABELI `item`:
--   `category_id`
--       `category` -> `category_id`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `program_id` int(10) unsigned NOT NULL auto_increment,
  `channel_id` int(10) unsigned NOT NULL,
  `program_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `program_items` text collate utf8_polish_ci NOT NULL,
  PRIMARY KEY  (`program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- RELACJE TABELI `program`:
--   `channel_id`
--       `channel` -> `channel_id`
--
