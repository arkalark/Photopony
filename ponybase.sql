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
('pony'),
('science'),
('food'),
('random'),
('fun');


-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS threads (
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(20) NOT NULL,
	piclink varchar(200) NOT NULL,
	content blob NOT NULL,
	rating int(11) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE INDEX thread_index ON threads (name);


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
INSERT INTO `users` (id,username,password) VALUES (1,'admin', sha1('password'));
INSERT INTO `users` (id,username,password) VALUES (2,'guest', sha1('computer'));

CREATE INDEX user_index ON users (username);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `comment` blob NOT NULL,
  PRIMARY KEY (`id`)
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

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `commentXthread` (
  `thread_id` int(12) NOT NULL,
  `comment_id` int(12) NOT NULL,
  PRIMARY KEY (`thread_id`, `comment_id`),
  FOREIGN KEY (thread_id) REFERENCES threads(id)
	ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (comment_id) REFERENCES comments(id)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `threadXboard` (
  `thread_id` int(12) NOT NULL,
  `board_name` varchar(70) NOT NULL,
  PRIMARY KEY (`thread_id`, `board_name`),
  FOREIGN KEY (thread_id) REFERENCES threads(id)
	ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (board_name) REFERENCES board(name)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



INSERT INTO threads (id, name, piclink, content, rating) VALUES (NULL, 'Mona Lisa', 'http://www.ibiblio.org/wm/paint/auth/vinci/joconde/joconde.jpg', 'This is a link to the mona lisa!', 0);
INSERT INTO threadXboard (thread_id, board_name) VALUES (1, 'art');
INSERT INTO threads (id, name, piclink, content, rating) VALUES (NULL, 'Starry Night', 'http://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg/300px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg', 'This is a link to Starry Night', 0);
INSERT INTO threadXboard (thread_id, board_name) VALUES (2, 'art');
INSERT INTO threads (id, name, piclink, content, rating) VALUES (NULL, 'Derpy Hooves', 'http://i0.kym-cdn.com/photos/images/original/000/122/118/1291021351967.png?1305073935', 'Derp derp', 0);
INSERT INTO threadXboard (thread_id, board_name) VALUES (3, 'pony');
INSERT INTO threads (id, name, piclink, content, rating) VALUES (NULL, 'faster!', 'http://img.ponibooru.org/_images/46d129ff01bcaf8cd118a41d32c4c6a0/155646%20-%20artist%3Akarzahnii%20derpy_hooves%20twilight_sparkle.png', 'fastest pony', 0);
INSERT INTO threadXboard (thread_id, board_name) VALUES (4, 'random');
