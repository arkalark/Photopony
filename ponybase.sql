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
-- Database: `session`
--
CREATE DATABASE IF NOT EXISTS photopony;
GRANT ALL PRIVILEGES ON session.* to 'assist'@'localhost' identified by 'assist';
USE session;
-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `boards`
--

INSERT INTO boards (id, name) VALUES
(NULL, 'art');


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS threads (
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(20) NOT NULL,
	piclink varchar(100) NOT NULL,
	content blob NOT NULL,
	board varchar(70) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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


