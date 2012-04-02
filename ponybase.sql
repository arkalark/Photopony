-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2010 at 03:26 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photopony`
--
DROP DATABASE IF EXISTS photopony;
CREATE DATABASE IF NOT EXISTS photopony;
GRANT ALL PRIVILEGES ON photopony.* to 'assist'@'localhost' identified by 'assist';
USE photopony;
-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE IF NOT EXISTS `boards` (
  `name` varchar(70) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boards`
--

INSERT INTO boards (name) VALUES
('art'),
('pony');


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS threads (
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(20) NOT NULL,
	piclink varchar(100) NOT NULL,
	content blob NOT NULL,
	board varchar(70) NOT NULL,
	rating int(11) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `thread` int(11) NOT NULL,
  `comment` blob NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`thread`) REFERENCES threads(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keywordXthread',
-- junction for threads to keywords
--

CREATE TABLE IF NOT EXISTS `keywordXthread` (
  `thread_id` int(12) NOT NULL,
  `kw_id` int(12) NOT NULL,
  PRIMARY KEY (`thread_id`, `kw_id`),
  FOREIGN KEY (thread_id) REFERENCES threads(id)
	ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (kw_id) REFERENCES keywords(id)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `keywords` (
`id` int(12) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

