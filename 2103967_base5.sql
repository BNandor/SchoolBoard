-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2017 at 05:24 PM
-- Server version: 5.5.52-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2103967_base5`
--

-- --------------------------------------------------------

--
-- Table structure for table `IX.B_test_user@gmail.com`
--

CREATE TABLE IF NOT EXISTS `IX.B_test_user@gmail.com` (
  `Name` text NOT NULL,
  `IT` text,
  `IT_final` text,
  `Matematika` text,
  `Matematika_final` text,
  `Roman` text,
  `Roman_final` text,
  `Magyar` text,
  `Magyar_final` text,
  `Fizika` text,
  `Fizika_final` text,
  `Kemia` text,
  `Kemia_final` text,
  `Biologia` text,
  `Biologia_final` text,
  `Angol` text,
  `Deutsch` text,
  `Foldrajz` text,
  `Tortenelem` text,
  `Sport` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IX.B_test_user@gmail.com`
--

INSERT INTO `IX.B_test_user@gmail.com` (`Name`, `IT`, `IT_final`, `Matematika`, `Matematika_final`, `Roman`, `Roman_final`, `Magyar`, `Magyar_final`, `Fizika`, `Fizika_final`, `Kemia`, `Kemia_final`, `Biologia`, `Biologia_final`, `Angol`, `Deutsch`, `Foldrajz`, `Tortenelem`, `Sport`) VALUES
('Kulcsar Istvan', '7 10', ' 8', '10 5', ' 5', '10 10', ' 9', '9 10', ' 7', '6 6', ' 6', '5 8', ' 5', '6 8', ' 10', '10 7', '6 7', '9 9', '8 9', '5 9'),
('Bagosi Bence', '9 7', ' 8', '8 8', ' 10', '9 10', ' 9', '5 7', ' 9', '10 7', ' 10', '7 8', ' 7', '6 8', ' 5', '8 10', '10 8', '9 10', '5 6', '7 8'),
('Banto Klara', '10 6', ' 8', '9 10', ' 8', '7 9', ' 8', '7 5', ' 5', '8 7', ' 9', '8 8', ' 9', '9 6', ' 8', '8 9', '6 9', '8 8', '5 9', '10 9'),
('Banyik Ferenc', '5 6', ' 5', '8 5', ' 5', '5 10', ' 9', '7 9', ' 6', '9 5', ' 8', '7 9', ' 5', '6 5', ' 5', '10 5', '6 10', '5 5', '6 7', '8 8'),
('Csatlos Robert', '7 8', ' 6', '5 5', ' 8', '9 7', ' 8', '9 6', ' 9', '9 9', ' 9', '6 5', ' 9', '8 6', ' 7', '9 8', '8 8', '8 8', '9 5', '7 9'),
('Dacz Balazs', '8 9', ' 8', '7 5', ' 6', '10 9', ' 10', '10 10', ' 8', '9 8', ' 7', '6 10', ' 7', '8 9', ' 7', '5 10', '10 7', '9 6', '8 6', '5 8'),
('Datz Vivien', '9 5', ' 6', '9 6', ' 9', '6 10', ' 9', '6 8', ' 9', '5 9', ' 6', '10 10', ' 7', '7 10', ' 7', '5 5', '6 10', '6 10', '6 7', '10 10'),
('Domokos Oliver Tamas', '7 8', ' 9', '7 9', ' 9', '6 8', ' 6', '6 9', ' 8', '8 5', ' 8', '5 10', ' 5', '7 6', ' 5', '6 10', '6 5', '6 5', '7 8', '6 10'),
('Erdei David Zoltan', '10 6', ' 6', '10 9', ' 9', '6 10', ' 10', '10 8', ' 7', '7 7', ' 6', '9 7', ' 9', '5 9', ' 5', '8 8', '5 7', '9 8', '7 8', '9 10'),
('Farkas Szabolcs Tamas', '7 10', ' 10', '10 7', ' 7', '10 6', ' 5', '10 8', ' 10', '9 7', ' 7', '6 8', ' 7', '10 9', ' 9', '7 5', '6 5', '7 9', '8 7', '6 7'),
('Gaspar Andrea Marta', '6 10', ' 6', '6 6', ' 6', '5 6', ' 8', '8 6', ' 10', '5 10', ' 5', '8 10', ' 6', '8 6', ' 8', '6 6', '7 10', '7 5', '8 8', '9 8'),
('Gergely Krisztian Ivan', '8 10', ' 5', '5 5', ' 8', '10 9', ' 6', '10 8', ' 7', '10 5', ' 8', '10 10', ' 7', '9 5', ' 5', '8 6', '8 10', '9 5', '5 6', '6 7'),
('Gombos Krisztian', '10 6', ' 6', '9 7', ' 6', '7 8', ' 10', '5 10', ' 10', '9 5', ' 5', '8 5', ' 8', '6 7', ' 8', '6 9', '9 5', '9 9', '5 5', '9 9'),
('Istvan Nora', '6 8', ' 7', '8 5', ' 7', '6 7', ' 8', '5 8', ' 7', '5 5', ' 6', '8 10', ' 9', '9 6', ' 5', '9 7', '9 5', '10 5', '5 9', '7 6'),
('Keresztes Beata', '7 7', ' 9', '6 10', ' 9', '8 9', ' 5', '5 6', ' 6', '6 8', ' 7', '8 10', ' 6', '5 5', ' 9', '8 7', '5 6', '6 10', '10 6', '6 8'),
('Kovacs Krisztian', '7 8', ' 5', '10 8', ' 5', '8 10', ' 7', '10 7', ' 10', '8 10', ' 9', '8 5', ' 5', '9 7', ' 9', '9 6', '5 10', '8 10', '10 10', '9 10'),
('Kulcsar Tamas', '7 9', ' 9', '10 9', ' 10', '8 8', ' 9', '8 10', ' 8', '8 8', ' 6', '10 5', ' 7', '7 5', ' 9', '10 8', '8 8', '8 5', '10 9', '7 10'),
('Matis Krisztian', '5 7', ' 5', '5 7', ' 5', '7 9', ' 9', '6 5', ' 6', '7 10', ' 8', '10 8', ' 9', '7 10', ' 9', '6 7', '8 9', '7 6', '5 6', '6 9'),
('Mikula Khatrine', '10 6', ' 8', '5 6', ' 10', '8 8', ' 10', '6 6', ' 10', '8 6', ' 7', '7 10', ' 9', '10 7', ' 8', '8 8', '10 5', '8 10', '7 10', '8 10'),
('Molnar Andrea', '7 7', ' 6', '9 7', ' 10', '8 6', ' 7', '7 8', ' 6', '5 8', ' 9', '5 8', ' 6', '10 5', ' 6', '8 8', '7 5', '6 8', '8 10', '7 9'),
('Nagy Kristof Zsolt', '5 9', ' 6', '6 9', ' 5', '7 6', ' 5', '10 9', ' 7', '9 10', ' 5', '8 7', ' 9', '6 7', ' 5', '5 7', '10 6', '5 5', '8 7', '7 10'),
('Nagy Tifani', '8 7', ' 8', '9 7', ' 5', '8 9', ' 8', '6 9', ' 6', '7 8', ' 5', '10 6', ' 6', '9 7', ' 8', '6 5', '7 9', '7 10', '5 9', '5 9'),
('Pap Miklos', '5 7', ' 8', '10 10', ' 8', '8 9', ' 5', '10 10', ' 8', '6 6', ' 10', '10 6', ' 7', '6 9', ' 5', '9 8', '5 9', '8 9', '10 8', '5 8'),
('Sallai Tamas', '8 8', ' 7', '8 7', ' 6', '8 10', ' 8', '5 10', ' 7', '5 9', ' 9', '8 6', ' 6', '10 9', ' 7', '6 9', '10 8', '10 6', '8 7', '10 7'),
('Solyom Norbert', '10 8', ' 5', '6 9', ' 9', '9 5', ' 6', '10 8', ' 8', '9 7', ' 8', '5 9', ' 6', '5 9', ' 6', '9 8', '9 9', '10 9', '7 8', '5 7'),
('Szepesi Nikolett', '6 8', ' 9', '7 6', ' 8', '6 8', ' 8', '10 8', ' 7', '10 5', ' 6', '10 7', ' 6', '8 5', ' 7', '10 7', '10 6', '8 7', '7 7', '10 6'),
('Varga Matild Katalin', '8 10', ' 5', '10 10', ' 10', '10 7', ' 5', '8 10', ' 7', '7 9', ' 10', '7 10', ' 10', '6 10', ' 7', '8 8', '5 7', '10 9', '7 9', '7 10'),
('Veres Eszter', '9 7', ' 5', '7 6', ' 5', '7 9', ' 10', '6 8', ' 7', '6 10', ' 6', '8 6', ' 6', '6 8', ' 6', '5 6', '7 6', '8 7', '7 7', '7 5');

-- --------------------------------------------------------

--
-- Table structure for table `l_aron.antal@yahoo.com`
--

CREATE TABLE IF NOT EXISTS `l_aron.antal@yahoo.com` (
  `Date` date NOT NULL,
  `Log` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `l_b.nandor1998@gmail.com`
--

CREATE TABLE IF NOT EXISTS `l_b.nandor1998@gmail.com` (
  `Date` date NOT NULL,
  `Log` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `l_test_user@gmail.com`
--

CREATE TABLE IF NOT EXISTS `l_test_user@gmail.com` (
  `Date` text NOT NULL,
  `Log` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `l_test_user@gmail.com`
--

INSERT INTO `l_test_user@gmail.com` (`Date`, `Log`) VALUES
('2016:05:07:11:13:24pm', '+  10 Antal Aron XI.B'),
('2016:05:07:11:13:31pm', '+  8 Antal Aron XI.B'),
('2016:05:07:11:13:55pm', '+  9 Antal Aron XI.B'),
('2016:05:08:01:36:10pm', '- 8toIT-Antal Aron XI.B'),
('2016:05:08:01:37:11pm', '+  10toIT-Antal Aron XI.B'),
('2016:05:08:02:34:50pm', '- 9 from IT-Antal Aron XI.B'),
('2016:05:09:06:22:36pm', '- 10 from IT-Antal Aron XI.B'),
('2016:05:09:06:23:14pm', '+  9 to IT-Antal Aron XI.B'),
('2016:05:09:06:24:07pm', '+  8 to IT-Antal Aron XI.B'),
('2016:05:09:06:24:17pm', '- 9 from IT-Antal Aron XI.B'),
('2016:05:09:06:27:20pm', '+  10 to IT-Antal Aron XI.B'),
('2016:05:09:06:27:37pm', '- 10 from IT-Antal Aron XI.B'),
('2016:05:11:05:28:47pm', '- 10 from Foldrajz-Antal Aron XI.B'),
('2016:05:11:07:12:45pm', '+f 9 to Fizika-Lakatos Krisztina XI.B'),
('2016:05:11:07:13:10pm', '+  7 to Fizika-Antal Aron XI.B'),
('2016:05:11:07:13:37pm', '+  10 to Fizika-Lakatos Krisztina XI.B'),
('2016:05:11:08:42:28pm', 'created subject - testy'),
('2016:05:11:08:43:03pm', 'deleted subject - testy'),
('2016:05:12:06:53:41pm', 'created table - testy'),
('2016:05:12:06:54:21pm', 'added column - IT   in testy'),
('2016:05:12:07:08:44pm', 'added column - Matematika   in testy'),
('2016:05:12:07:09:14pm', 'added column - Vallalkozastan   in testy'),
('2016:05:12:07:10:15pm', 'deleted table - testy'),
('2016:05:12:09:37:50pm', '+  8 to IT-Antal Aron XI.B'),
('2016:05:12:09:39:16pm', '+  10 to IT-Domokos Bernat XI.B'),
('2016:05:12:09:39:50pm', '+f 9 to IT-Domokos Bernat XI.B'),
('2016:05:13:08:06:50pm', 'created table - IX.B'),
('2016:05:13:08:07:47pm', 'added column - IT   in IX.B'),
('2016:05:13:08:08:01pm', 'deleted row - name   in IX.B'),
('2016:05:13:08:08:16pm', 'added row - Kulcsar Istvan   in IX.B'),
('2016:05:13:08:08:32pm', '+  10 to IT-Kulcsar Istvan IX.B'),
('2016:05:13:08:08:41pm', '+f 10 to IT-Kulcsar Istvan IX.B'),
('2016:08:13:08:33:00pm', '- 8 from IT-Antal Aron XI.B'),
('2016:08:17:07:33:44am', '+  9 to IT-Antal Aron XI.B'),
('2016:08:17:07:34:16am', '+  7 to IT-Antal Aron XI.B'),
('2016:08:17:07:47:15am', '- 7 from IT-Antal Aron XI.B'),
('2016:08:17:07:48:01am', '-f 10 from IT-Antal Aron XI.B'),
('2016:08:17:07:48:16am', '+f 10 to IT-Antal Aron XI.B'),
('2016:08:17:08:28:50am', '+  5 to IT-Cseke XI.B'),
('2016:08:17:08:29:31am', '+  5 to IT-Cseke Anita XI.B'),
('2016:08:17:08:29:31am', '+  5 to IT-Cseke Anita XI.B'),
('2016:08:17:08:29:31am', '+  5 to IT-Cseke Anita XI.B'),
('2016:08:17:08:29:32am', '+  5 to IT-Cseke Anita XI.B'),
('2016:08:17:08:30:17am', '+  5 to IT-Cseke Anita XI.B'),
('2016:08:17:01:22:22pm', '- 5 from IT-Cseke Anita XI.B'),
('2016:08:17:01:41:18pm', '- 5 from IT-Cseke Anita XI.B'),
('2016:08:17:01:41:33pm', '- 5 from IT-Cseke Anita XI.B'),
('2016:08:17:01:55:43pm', '- 5 from IT-Cseke Anita XI.B'),
('2016:08:17:01:56:05pm', '- 5 from IT-Cseke Anita XI.B'),
('2016:08:17:03:08:46pm', '+f 9 to IT-Antal Aron XI.B'),
('2016:08:17:03:09:09pm', '-f 9 from IT-Antal Aron XI.B'),
('2016:08:19:05:24:53pm', '+f 10 to IT-Balint Bettina XI.B'),
('2016:08:19:05:24:58pm', '-f 10 from IT-Balint Bettina XI.B'),
('2016:08:20:10:28:54am', 'created table - newtabletest'),
('2016:08:20:11:47:43am', 'deleted table - newtabletest'),
('2016:08:20:11:48:52am', 'created table - test'),
('2016:08:20:12:01:00pm', 'deleted table - test'),
('2016:08:20:12:54:40pm', 'created table - testtable'),
('2016:08:20:01:04:00pm', 'added row - Sogor   in testtable'),
('2016:08:20:01:35:24pm', 'deleted row - Sogor   in testtable'),
('2016:08:20:01:36:00pm', 'deleted table - testtable'),
('2016:08:22:01:39:46pm', '+f 8 to IT-Biro Norbert XI.B'),
('2016:08:22:08:31:16pm', '+  0 to IT-Aron Antal XI.B'),
('2016:08:22:08:31:42pm', '+  0 to IT-Antal Aron XI.B'),
('2016:12:08:08:39:57am', '+  4 to IT-Iuhas Gabriel XI.B'),
('2017:01:03:05:27:16pm', '- 0 from IT-Antal Aron XI.B'),
('2017:01:03:05:27:34pm', '- 0 from IT-Antal Aron XI.B'),
('2017:01:03:05:27:45pm', '- 1 from IT-Antal Aron XI.B'),
('2017:01:03:05:27:57pm', '+  10 to IT-Antal Aron XI.B'),
('2017:01:05:02:21:16pm', '+  8 to IT-Bandi Nandor XI.B'),
('2017:03:21:08:59:40am', '+  10 to IT-Demjen David XI.B'),
('2017:03:21:09:01:59am', '+f 5 to IT-Demjen David XI.B'),
('2017:03:21:11:46:27am', '-f 5 from IT-Antal Aron 10 XI.B'),
('2017:03:21:11:47:02am', '-f 8 from IT-Biro Norbert 10 XI.B'),
('2017:03:21:11:48:26am', '-f 10 from IT-Domokos Bernat 8 XI.B'),
('2017:03:21:11:49:02am', '-f 5 from IT-Demjen David 9 XI.B'),
('2017:03:21:05:16:57pm', 'added column - Matematika   in IX.B'),
('2017:03:21:05:17:07pm', 'added column - Roman   in IX.B'),
('2017:03:21:05:17:12pm', 'added column - Magyar   in IX.B'),
('2017:03:21:05:17:32pm', 'added column - Fizika   in IX.B'),
('2017:03:21:05:17:38pm', 'added column - Kemia   in IX.B'),
('2017:03:21:05:17:42pm', 'added column - Biologia   in IX.B'),
('2017:03:21:05:17:53pm', 'added column - Angol   in IX.B'),
('2017:03:21:05:17:57pm', 'added column - Deutsch   in IX.B'),
('2017:03:21:05:18:03pm', 'added column - Foldrajz   in IX.B'),
('2017:03:21:05:18:09pm', 'added column - Tortenelem   in IX.B'),
('2017:03:21:05:18:20pm', 'added column - Sport   in IX.B'),
('2017:03:21:05:18:34pm', '- 10 from IT-Kulcsar Istvan IX.B'),
('2017:03:21:05:19:12pm', '-f 10 from IT-Kulcsar Istvan IX.B'),
('2017:03:21:05:20:26pm', 'added row - Bagosi Bence   in IX.B'),
('2017:03:21:05:21:08pm', 'added row - Banto Klara   in IX.B'),
('2017:03:21:05:21:22pm', 'added row - Banyik Ferenc   in IX.B'),
('2017:03:21:05:21:33pm', 'added row - Csatlos Robert   in IX.B'),
('2017:03:21:05:21:44pm', 'added row - Dacz Balazs   in IX.B'),
('2017:03:21:05:21:54pm', 'added row - Datz Vivien   in IX.B'),
('2017:03:21:05:22:05pm', 'added row - Domokos Oliver Tamas   in IX.B'),
('2017:03:21:05:22:17pm', 'added row - Erdei David Zoltan   in IX.B'),
('2017:03:21:05:22:31pm', 'added row - Farkas Szabolcs Tamas   in IX.B'),
('2017:03:21:05:22:45pm', 'added row - Gaspar Andrea Marta   in IX.B'),
('2017:03:21:05:23:01pm', 'added row - Gergely Krisztian Ivan   in IX.B'),
('2017:03:21:05:23:27pm', 'added row - Gombos Krisztian   in IX.B'),
('2017:03:21:05:23:49pm', 'added row - Istvan Nora   in IX.B'),
('2017:03:21:05:23:59pm', 'added row - Keresztes Beata   in IX.B'),
('2017:03:21:05:24:09pm', 'added row - Kovacs Krisztian   in IX.B'),
('2017:03:21:05:24:20pm', 'added row - Kulcsar Tamas   in IX.B'),
('2017:03:21:05:24:35pm', 'added row - Matis Krisztian   in IX.B'),
('2017:03:21:05:24:46pm', 'added row - Mikula Khatrine   in IX.B'),
('2017:03:21:05:24:54pm', 'added row - Molnar Andrea   in IX.B'),
('2017:03:21:05:25:31pm', 'added row - Nagy Kristof Zsolt   in IX.B'),
('2017:03:21:05:25:45pm', 'added row - Nagy Tifani   in IX.B'),
('2017:03:21:05:25:54pm', 'added row - Pap Miklos   in IX.B'),
('2017:03:21:05:26:03pm', 'added row - Sallai Tamas   in IX.B'),
('2017:03:21:05:26:13pm', 'added row - Solyom Norbert   in IX.B'),
('2017:03:21:05:26:33pm', 'added row - Szepesi Nikolett   in IX.B'),
('2017:03:21:05:26:49pm', 'added row - Varga Matild Katalin   in IX.B'),
('2017:03:21:05:26:59pm', 'added row - Veres Eszter   in IX.B'),
('2017:03:21:04:16:50pm', 'created subject - TIC'),
('2017:03:21:05:33:31pm', 'created table - X.B'),
('2017:03:21:05:35:46pm', 'deleted row - name   in X.B'),
('2017:03:21:05:36:08pm', 'deleted subject - TIC'),
('2017:03:21:05:36:33pm', 'added column - IT   in X.B'),
('2017:03:21:05:36:38pm', 'added column - Matematika   in X.B'),
('2017:03:21:05:36:40pm', 'added column - Roman   in X.B'),
('2017:03:21:05:36:44pm', 'added column - Magyar   in X.B'),
('2017:03:21:05:36:47pm', 'added column - Fizika   in X.B'),
('2017:03:21:05:36:55pm', 'added column - Kemia   in X.B'),
('2017:03:21:05:36:59pm', 'added column - Biologia   in X.B'),
('2017:03:21:05:37:01pm', 'added column - Angol   in X.B'),
('2017:03:21:05:37:05pm', 'added column - Deutsch   in X.B'),
('2017:03:21:05:37:09pm', 'added column - Foldrajz   in X.B'),
('2017:03:21:05:37:16pm', 'added column - Tortenelem   in X.B'),
('2017:03:21:05:37:27pm', 'added column - Vallas   in X.B'),
('2017:03:21:05:37:34pm', 'added column - Vallalkozastan   in X.B'),
('2017:03:21:05:37:37pm', 'added column - Sport   in X.B'),
('2017:03:21:05:37:57pm', 'added row - Antal Krisztian Tamas   in X.B'),
('2017:03:21:05:38:09pm', 'added row - Bacso Tamas   in X.B'),
('2017:03:21:05:38:23pm', 'added row - Biro Peter   in X.B'),
('2017:03:21:05:38:37pm', 'added row - Domokos Hortenzia   in X.B'),
('2017:03:21:05:38:47pm', 'added row - Futo Szilvia   in X.B'),
('2017:03:21:05:38:58pm', 'added row - Futo Antonia   in X.B'),
('2017:03:21:05:39:08pm', 'added row - Juhos Agota   in X.B'),
('2017:03:21:05:39:25pm', 'added row - Kocsis Oliver Sandor   in X.B'),
('2017:03:21:05:39:57pm', 'added row - Kovacs Attila   in X.B'),
('2017:03:21:05:40:16pm', 'added row - Kovacs Zsuzsanna   in X.B'),
('2017:03:21:05:40:27pm', 'added row - Kovari Laszlo   in X.B'),
('2017:03:21:05:40:40pm', 'added row - Kozma Eva   in X.B'),
('2017:03:21:05:40:51pm', 'added row - Kuglis Krisztian   in X.B'),
('2017:03:21:05:41:05pm', 'added row - Kulcsar Henrietta   in X.B'),
('2017:03:21:05:41:16pm', 'added row - Lukacs Roland Csaba   in X.B'),
('2017:03:21:05:41:27pm', 'added row - Major Bartha Lea   in X.B'),
('2017:03:21:05:41:39pm', 'added row - Matis Daniel    in X.B'),
('2017:03:21:05:41:50pm', 'added row - Mihaly Anett   in X.B'),
('2017:03:21:05:42:02pm', 'added row - Modi Krisztian   in X.B'),
('2017:03:21:05:42:13pm', 'added row - Nagy Adrienn   in X.B'),
('2017:03:21:05:42:24pm', 'added row - Nemes Emilia   in X.B'),
('2017:03:21:05:42:37pm', 'added row - Orosz Arnold Daniel   in X.B'),
('2017:03:21:05:42:46pm', 'added row - Racz Gabor   in X.B'),
('2017:03:21:05:42:57pm', 'added row - Sallai Henrietta   in X.B'),
('2017:03:21:05:43:14pm', 'added row - Stanescu Kristina   in X.B'),
('2017:03:21:05:43:30pm', 'added row - Varga Natalia Edina   in X.B'),
('2017:03:21:06:02:05pm', 'created table - XII.B'),
('2017:03:21:06:03:25pm', 'deleted row - name   in XII.B'),
('2017:03:21:06:03:29pm', 'added column - IT   in XII.B'),
('2017:03:21:06:03:31pm', 'added column - Matematika   in XII.B'),
('2017:03:21:06:03:34pm', 'added column - Roman   in XII.B'),
('2017:03:21:06:03:40pm', 'added column - Fizika   in XII.B'),
('2017:03:21:06:03:43pm', 'added column - Kemia   in XII.B'),
('2017:03:21:06:03:45pm', 'added column - Biologia   in XII.B'),
('2017:03:21:06:03:49pm', 'added column - Angol   in XII.B'),
('2017:03:21:06:03:52pm', 'added column - Deutsch   in XII.B'),
('2017:03:21:06:03:57pm', 'added column - Foldrajz   in XII.B'),
('2017:03:21:06:04:00pm', 'added column - Tortenelem   in XII.B'),
('2017:03:21:06:04:06pm', 'added column - Vallalkozastan   in XII.B'),
('2017:03:21:06:04:09pm', 'added column - Vallas   in XII.B'),
('2017:03:21:06:04:27pm', 'added row - Agoston Krisztian   in XII.B'),
('2017:03:21:06:04:36pm', 'added row - Banto Katalin   in XII.B'),
('2017:03:21:06:04:54pm', 'added row - Czeczei Lilla   in XII.B'),
('2017:03:21:06:05:10pm', 'added row - Dimeny Mark   in XII.B'),
('2017:03:21:06:05:19pm', 'added row - Dobai Istvan   in XII.B'),
('2017:03:21:06:05:30pm', 'added row - Domocos Klaudia   in XII.B'),
('2017:03:21:06:05:37pm', 'added row - Domokos Tamas   in XII.B'),
('2017:03:21:06:05:54pm', 'added row - Gal Timea   in XII.B'),
('2017:03:21:06:06:05pm', 'added row - Gombos Kriszta   in XII.B'),
('2017:03:21:06:06:14pm', 'added row - Gombos Kincso   in XII.B'),
('2017:03:21:06:06:23pm', 'added row - Jurje Monika   in XII.B'),
('2017:03:21:06:06:31pm', 'added row - Kobori Nikolett   in XII.B'),
('2017:03:21:06:06:40pm', 'added row - Kocsis Malvina   in XII.B'),
('2017:03:21:06:06:48pm', 'added row - Matis Gabriella   in XII.B'),
('2017:03:21:06:06:58pm', 'added row - Molnar Alexandra   in XII.B'),
('2017:03:21:06:07:14pm', 'added row - Nagy Reka Nikolett   in XII.B'),
('2017:03:21:06:07:23pm', 'added row - Nemes Amalia   in XII.B'),
('2017:03:21:06:07:54pm', 'added row - Podar Robert   in XII.B'),
('2017:03:21:06:08:05pm', 'added row - Pusok Richard   in XII.B'),
('2017:03:21:06:08:21pm', 'added row - Racz Aliz Arabella   in XII.B'),
('2017:03:21:06:08:39pm', 'added row - Samel Adrien Erika   in XII.B'),
('2017:03:21:06:08:47pm', 'added row - Sepsi Gellert   in XII.B'),
('2017:03:21:06:08:58pm', 'added row - Szasz Boldizsar   in XII.B'),
('2017:03:21:06:09:08pm', 'added row - Szeles Szilard   in XII.B'),
('2017:03:21:06:09:28pm', 'added row - Vancza Johanna   in XII.B'),
('2017:03:29:01:03:14pm', '- 10 from IT-Agoston Krisztian XII.B'),
('2017:03:29:01:03:20pm', '+  10 to IT-Agoston Krisztian XII.B'),
('2017:03:29:01:06:14pm', '- 8 from IT-Antal Aron XI.B'),
('2017:03:29:01:23:15pm', '- 8 from IT-Antal Aron XI.B'),
('2017:03:29:01:23:31pm', '- 8 from IT-Demjen David XI.B'),
('2017:03:29:01:23:57pm', '+  10 to Vallas-Nemeti Boglarka XI.B'),
('2017:04:03:12:35:20pm', '- 6 from IT-Slavu Xenia XI.B'),
('2017:04:03:12:35:36pm', '+  7 to IT-Slavu Xenia XI.B'),
('2017:04:03:12:36:48pm', '-f 10 from IT-Antal Aron XI.B');

-- --------------------------------------------------------

--
-- Table structure for table `s_aron.antal@yahoo.com`
--

CREATE TABLE IF NOT EXISTS `s_aron.antal@yahoo.com` (
  `Subject` text NOT NULL,
  `Password` text NOT NULL,
  `Final` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_b.nandor1998@gmail.com`
--

CREATE TABLE IF NOT EXISTS `s_b.nandor1998@gmail.com` (
  `Subject` text NOT NULL,
  `Password` text NOT NULL,
  `Final` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_test_user@gmail.com`
--

CREATE TABLE IF NOT EXISTS `s_test_user@gmail.com` (
  `Subject` text NOT NULL,
  `Password` text NOT NULL,
  `Final` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_test_user@gmail.com`
--

INSERT INTO `s_test_user@gmail.com` (`Subject`, `Password`, `Final`) VALUES
('IT', '81dc9bdb52d04dc20036dbd8313ed055', 'yes'),
('Matematika', '81dc9bdb52d04dc20036dbd8313ed055', 'yes'),
('Roman', '81dc9bdb52d04dc20036dbd8313ed055', 'yes'),
('Magyar', '81dc9bdb52d04dc20036dbd8313ed055', 'yes'),
('Fizika', '81dc9bdb52d04dc20036dbd8313ed055', 'yes'),
('Kemia', '81dc9bdb52d04dc20036dbd8313ed055', 'yes'),
('Biologia', '81dc9bdb52d04dc20036dbd8313ed055', 'yes'),
('Angol', '81dc9bdb52d04dc20036dbd8313ed055', 'no'),
('Deutsch', '81dc9bdb52d04dc20036dbd8313ed055', 'no'),
('Foldrajz', '81dc9bdb52d04dc20036dbd8313ed055', 'no'),
('Tortenelem', '81dc9bdb52d04dc20036dbd8313ed055', 'no'),
('Sport', '81dc9bdb52d04dc20036dbd8313ed055', 'no'),
('Vallalkozastan', '81dc9bdb52d04dc20036dbd8313ed055', 'no'),
('Vallas', '81dc9bdb52d04dc20036dbd8313ed055', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `t_aron.antal@yahoo.com`
--

CREATE TABLE IF NOT EXISTS `t_aron.antal@yahoo.com` (
  `Table` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_b.nandor1998@gmail.com`
--

CREATE TABLE IF NOT EXISTS `t_b.nandor1998@gmail.com` (
  `Table` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_test_user@gmail.com`
--

CREATE TABLE IF NOT EXISTS `t_test_user@gmail.com` (
  `Table` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_test_user@gmail.com`
--

INSERT INTO `t_test_user@gmail.com` (`Table`, `Password`) VALUES
('XI.B', '81dc9bdb52d04dc20036dbd8313ed055'),
('IX.B', '81dc9bdb52d04dc20036dbd8313ed055'),
('X.B', '81dc9bdb52d04dc20036dbd8313ed055'),
('XII.B', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`) VALUES
(27, 'aron.antal@yahoo.com', '28953f21238058a943868f7b704c2461'),
(21, 'b.nandor1998@gmail.com', 'a1ca3175f6eac7ff386ec3b905bfe1b9'),
(18, 'test_user@gmail.com', 'f032f27ee18f9de67a3bb9c16eae57b3');

-- --------------------------------------------------------

--
-- Table structure for table `X.B_test_user@gmail.com`
--

CREATE TABLE IF NOT EXISTS `X.B_test_user@gmail.com` (
  `Name` text NOT NULL,
  `IT` text,
  `IT_final` text,
  `Matematika` text,
  `Matematika_final` text,
  `Roman` text,
  `Roman_final` text,
  `Magyar` text,
  `Magyar_final` text,
  `Fizika` text,
  `Fizika_final` text,
  `Kemia` text,
  `Kemia_final` text,
  `Biologia` text,
  `Biologia_final` text,
  `Angol` text,
  `Deutsch` text,
  `Foldrajz` text,
  `Tortenelem` text,
  `Vallas` text,
  `Vallalkozastan` text,
  `Sport` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `X.B_test_user@gmail.com`
--

INSERT INTO `X.B_test_user@gmail.com` (`Name`, `IT`, `IT_final`, `Matematika`, `Matematika_final`, `Roman`, `Roman_final`, `Magyar`, `Magyar_final`, `Fizika`, `Fizika_final`, `Kemia`, `Kemia_final`, `Biologia`, `Biologia_final`, `Angol`, `Deutsch`, `Foldrajz`, `Tortenelem`, `Vallas`, `Vallalkozastan`, `Sport`) VALUES
('Antal Krisztian Tamas', '10 8', ' 9', '6 10', ' 10', '9 7', ' 9', '9 8', ' 9', '6 6', ' 10', '6 6', ' 9', '8 7', ' 9', '5 9', '8 7', '7 6', '8 7', '7 10', '8 10', '6 10'),
('Bacso Tamas', '6 7', ' 9', '9 7', ' 9', '8 9', ' 5', '6 7', ' 8', '6 9', ' 5', '6 9', ' 8', '5 7', ' 5', '9 9', '6 9', '6 10', '8 5', '8 10', '9 9', '10 6'),
('Biro Peter', '10 9', ' 5', '5 8', ' 8', '7 5', ' 10', '9 8', ' 5', '10 10', ' 10', '10 9', ' 5', '9 9', ' 8', '10 6', '10 9', '8 5', '9 9', '5 7', '8 10', '5 7'),
('Domokos Hortenzia', '8 7', ' 7', '10 9', ' 7', '5 9', ' 8', '7 8', ' 8', '5 10', ' 7', '10 10', ' 8', '8 5', ' 10', '9 8', '10 6', '10 7', '10 7', '9 5', '8 5', '5 5'),
('Futo Szilvia', '8 7', ' 10', '10 8', ' 9', '6 6', ' 10', '7 5', ' 10', '6 8', ' 10', '9 8', ' 7', '5 8', ' 10', '10 9', '10 8', '6 8', '6 10', '8 6', '9 8', '8 6'),
('Futo Antonia', '10 8', ' 10', '10 5', ' 9', '7 10', ' 9', '8 5', ' 9', '8 8', ' 5', '9 10', ' 7', '8 10', ' 6', '9 9', '10 8', '5 8', '5 10', '9 9', '5 9', '9 6'),
('Juhos Agota', '9 9', ' 9', '9 6', ' 6', '9 5', ' 6', '7 6', ' 10', '9 7', ' 8', '10 9', ' 9', '5 10', ' 5', '9 10', '8 5', '6 5', '6 7', '7 6', '6 10', '9 10'),
('Kocsis Oliver Sandor', '5 5', ' 10', '5 7', ' 9', '9 9', ' 7', '6 6', ' 9', '6 5', ' 10', '9 7', ' 6', '6 7', ' 9', '7 8', '9 10', '5 7', '9 5', '6 10', '10 5', '6 5'),
('Kovacs Attila', '7 9', ' 8', '6 8', ' 8', '10 9', ' 9', '5 9', ' 5', '5 5', ' 6', '6 10', ' 6', '5 10', ' 9', '8 9', '8 6', '5 10', '5 6', '9 6', '10 10', '6 6'),
('Kovacs Zsuzsanna', '5 6', ' 6', '8 8', ' 6', '7 9', ' 7', '7 7', ' 6', '9 7', ' 9', '10 6', ' 8', '8 7', ' 6', '9 8', '8 10', '5 9', '7 5', '9 5', '9 6', '8 7'),
('Kovari Laszlo', '8 10', ' 9', '10 5', ' 8', '7 10', ' 9', '5 6', ' 6', '5 5', ' 7', '10 10', ' 5', '8 7', ' 7', '8 8', '8 8', '10 5', '10 8', '7 10', '9 10', '6 10'),
('Kozma Eva', '7 6', ' 7', '10 6', ' 6', '5 5', ' 8', '7 9', ' 8', '5 6', ' 10', '9 6', ' 5', '10 9', ' 10', '9 8', '7 5', '8 10', '6 7', '5 9', '7 5', '8 6'),
('Kuglis Krisztian', '6 6', ' 6', '7 9', ' 6', '6 5', ' 5', '9 6', ' 8', '7 9', ' 5', '9 7', ' 6', '9 10', ' 7', '7 10', '5 7', '10 9', '8 8', '7 5', '5 6', '8 8'),
('Kulcsar Henrietta', '7 8', ' 6', '7 9', ' 10', '10 8', ' 8', '10 5', ' 7', '6 9', ' 8', '5 10', ' 6', '9 6', ' 7', '7 8', '5 7', '8 6', '10 8', '7 6', '7 6', '6 9'),
('Lukacs Roland Csaba', '9 5', ' 7', '5 8', ' 10', '7 8', ' 5', '9 7', ' 10', '6 9', ' 9', '8 9', ' 10', '7 5', ' 7', '10 5', '5 8', '6 10', '6 6', '7 9', '5 5', '6 8'),
('Major Bartha Lea', '10 10', ' 10', '6 8', ' 5', '10 5', ' 8', '7 5', ' 8', '9 10', ' 5', '5 7', ' 6', '9 9', ' 10', '9 6', '9 10', '7 7', '8 8', '7 9', '7 5', '6 8'),
('Matis Daniel ', '10 7', ' 8', '10 10', ' 9', '6 9', ' 9', '7 5', ' 9', '9 8', ' 8', '5 6', ' 5', '10 7', ' 7', '7 6', '10 5', '10 7', '8 8', '9 8', '7 10', '8 9'),
('Mihaly Anett', '5 9', ' 9', '7 9', ' 7', '8 6', ' 6', '10 8', ' 9', '9 10', ' 5', '8 7', ' 8', '9 7', ' 6', '7 10', '8 8', '6 6', '5 10', '5 6', '8 6', '6 9'),
('Modi Krisztian', '6 6', ' 7', '7 5', ' 8', '10 9', ' 8', '5 9', ' 8', '6 10', ' 6', '8 6', ' 6', '10 9', ' 9', '6 7', '5 7', '8 9', '5 9', '7 6', '10 6', '9 9'),
('Nagy Adrienn', '7 6', ' 6', '6 10', ' 10', '5 6', ' 5', '7 8', ' 8', '9 5', ' 9', '9 10', ' 9', '9 6', ' 10', '9 7', '10 6', '5 5', '9 7', '5 9', '10 8', '8 9'),
('Nemes Emilia', '8 10', ' 8', '7 8', ' 8', '9 10', ' 6', '7 9', ' 6', '7 5', ' 10', '8 7', ' 9', '10 10', ' 10', '6 9', '7 9', '10 6', '7 6', '8 9', '10 10', '9 10'),
('Orosz Arnold Daniel', '6 8', ' 6', '10 8', ' 7', '8 9', ' 9', '10 7', ' 5', '5 5', ' 10', '6 9', ' 7', '5 10', ' 8', '9 10', '8 9', '7 10', '10 6', '10 9', '8 10', '6 8'),
('Racz Gabor', '6 10', ' 7', '10 9', ' 7', '7 5', ' 8', '9 10', ' 7', '7 8', ' 8', '10 10', ' 6', '7 8', ' 8', '10 10', '6 5', '8 8', '5 8', '6 8', '10 10', '5 5'),
('Sallai Henrietta', '5 7', ' 10', '9 10', ' 10', '7 5', ' 5', '10 8', ' 6', '10 9', ' 6', '9 7', ' 7', '6 5', ' 10', '10 7', '9 6', '5 8', '10 5', '8 8', '6 6', '8 5'),
('Stanescu Kristina', '9 6', ' 8', '6 10', ' 9', '8 9', ' 10', '10 9', ' 7', '8 9', ' 9', '10 9', ' 6', '9 10', ' 7', '8 5', '6 5', '7 5', '5 6', '9 5', '9 8', '6 6'),
('Varga Natalia Edina', '6 7', ' 5', '8 9', ' 9', '5 9', ' 7', '10 10', ' 10', '8 6', ' 10', '10 10', ' 10', '5 10', ' 8', '10 9', '8 9', '10 7', '5 10', '9 10', '8 9', '5 10');

-- --------------------------------------------------------

--
-- Table structure for table `XI.B_test_user@gmail.com`
--

CREATE TABLE IF NOT EXISTS `XI.B_test_user@gmail.com` (
  `Name` text NOT NULL,
  `IT` text,
  `IT_final` text,
  `Matematika` text,
  `Matematika_final` text,
  `Magyar` text,
  `Magyar_final` text,
  `Fizika` text,
  `Fizika_final` text,
  `Kemia` text,
  `Kemia_final` text,
  `Biologia` text,
  `Biologia_final` text,
  `Angol` text,
  `Deutsch` text,
  `Foldrajz` text,
  `Tortenelem` text,
  `Sport` text,
  `Vallalkozastan` text,
  `Vallas` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `XI.B_test_user@gmail.com`
--

INSERT INTO `XI.B_test_user@gmail.com` (`Name`, `IT`, `IT_final`, `Matematika`, `Matematika_final`, `Magyar`, `Magyar_final`, `Fizika`, `Fizika_final`, `Kemia`, `Kemia_final`, `Biologia`, `Biologia_final`, `Angol`, `Deutsch`, `Foldrajz`, `Tortenelem`, `Sport`, `Vallalkozastan`, `Vallas`) VALUES
('Antal Aron', ' 9 10 10 9', ' ', '6 6 5', ' 9', '8 7 8', ' 7', '7 10 10 10', ' 8', '6 9 7', ' 9', '10 7 9', ' 6', '6 8 9', '9 6 5', '5 10 5', '8 5 10', '9 8 7', '6 9 9', '6 10 7'),
('Balint Bettina', '8 9 10', ' 5', '8 7 5', ' 10', '6 10 10', ' 7', '5 5 10', ' 9', '9 8 8', ' 6', '6 6 10', ' 5', '5 6 10', '9 7 7', '8 10 9', '5 8 6', '8 7 8', '8 6 6', '9 8 5'),
('Balint Mihaly', '5 10 8', ' 10', '8 6 10', ' 5', '10 7 10', ' 6', '10 6 7', ' 5', '7 6 7', ' 10', '8 6 5', ' 6', '8 9 6', '9 10 7', '8 5 7', '7 5 7', '9 6 5', '6 7 5', '10 10 8'),
('Bandi Nandor', '8 6 9 9', ' 10', '5 10 6', ' 9', '7 5 5', ' 8', '7 5 7', ' 5', '5 9 8', ' 10', '8 5 8', ' 7', '9 8 6', '6 6 8', '8 10 7', '10 7 6', '6 10 8', '7 9 5', '10 8 5'),
('Beczi Eliezer', '6 8 6', ' 9', '7 9 10', ' 7', '6 5 8', ' 8', '6 10 8', ' 9', '6 6 10', ' 9', '7 10 10', ' 7', '10 9 10', '10 6 7', '8 10 5', '7 6 5', '6 7 9', '8 6 5', '8 5 6'),
('Cseke Anita', '10 6 9', ' 7', '9 5 9', ' 7', '9 8 5', ' 9', '7 8 10', ' 5', '5 5 6', ' 6', '7 5 8', ' 5', '9 5 5', '10 8 6', '7 6 7', '7 5 8', '6 6 10', '10 5 7', '6 8 7'),
('Boda Peter', '8 8 10', ' 8', '5 9 6', ' 7', '6 7 6', ' 10', '10 5 7', ' 5', '9 9 7', ' 9', '9 8 5', ' 9', '9 10 5', '7 8 7', '6 6 10', '7 6 10', '7 8 10', '10 5 8', '7 9 6'),
('Domokos Bernat', '10 8 6 5', '9 ', '6 9 8', ' 10', '7 6 7', ' 7', '7 6 8', ' 9', '7 7 6', ' 5', '7 5 7', ' 5', '5 5 5', '7 10 9', '6 10 8', '5 6 8', '8 8 6', '6 8 6', '10 8 6'),
('Domokos Daniel', '10 8 6', ' 9', '8 10 8', ' 7', '8 8 7', ' 5', '5 8 5', ' 8', '5 6 9', ' 7', '7 9 5', ' 9', '5 5 8', '8 6 7', '8 8 10', '10 10 5', '5 8 6', '6 10 5', '9 7 7'),
('Elekes Lukacs', '9 7 10', ' 9', '10 6 8', ' 9', '8 6 6', ' 5', '7 5 10', ' 7', '7 8 10', ' 10', '8 10 5', ' 5', '5 9 5', '6 7 7', '6 8 6', '10 6 5', '10 9 5', '6 8 7', '5 5 7'),
('Bogdan Eszter', '6 9 6', ' 10', '8 5 6', ' 9', '9 7 6', ' 6', '6 10 8', ' 5', '7 5 6', ' 5', '9 5 8', ' 7', '6 5 8', '6 5 9', '5 8 10', '7 8 5', '5 8 9', '8 9 5', '10 8 9'),
('Debre Brigitta', '7 10 5', ' 6', '5 7 7', ' 7', '10 6 8', ' 7', '10 5 6', ' 7', '6 6 5', ' 5', '5 7 7', ' 7', '9 9 9', '7 5 7', '5 5 7', '6 6 10', '7 10 6', '8 8 10', '9 7 10'),
('Vancza Erzsebet', '7 8 10', ' 7', '9 8 8', ' 10', '8 10 10', ' 7', '10 6 7', ' 10', '6 10 7', ' 6', '9 6 7', ' 8', '5 9 7', '7 7 7', '9 8 10', '5 6 9', '10 5 9', '10 5 8', '7 8 8'),
('Lakatos Krisztina', '10 10 8', ' 9', '6 8 7', ' 7', '5 6 9', ' 9', '10 7 7 10', '9 5', '10 9 6', ' 6', '5 7 7', ' 10', '10 10 8', '7 6 7', '9 9 7', '5 5 5', '10 7 10', '8 6 6', '5 8 9'),
('Gergely Dora', '9 8 7', ' 5', '10 9 6', ' 6', '9 8 5', ' 5', '5 6 8', ' 10', '8 6 5', ' 8', '5 5 7', ' 5', '10 8 9', '8 10 8', '6 7 9', '7 9 5', '7 5 6', '7 7 10', '10 10 6'),
('Slavu Xenia', '7 7 7', ' 9', '8 6 10', ' 8', '7 10 5', ' 5', '5 8 8', ' 6', '6 9 5', ' 8', '10 7 8', ' 6', '8 10 5', '8 8 5', '10 8 9', '6 9 9', '6 9 9', '10 8 7', '10 7 8'),
('Major Brigitta', '6 5 5', ' 6', '8 7 8', ' 7', '7 8 5', ' 8', '9 9 8', ' 5', '7 9 8', ' 7', '6 8 7', ' 5', '7 7 5', '5 10 5', '6 10 10', '5 6 7', '6 8 9', '5 6 7', '9 5 8'),
('Kiss Emese', '5 5 9', ' 7', '7 7 6', ' 10', '8 5 9', ' 8', '8 6 7', ' 10', '8 8 7', ' 9', '6 10 10', ' 9', '7 10 5', '9 9 10', '8 10 6', '5 6 5', '8 6 5', '7 7 9', '9 10 10'),
('Petkes Regina', '8 8 6', ' 9', '7 6 8', ' 10', '9 8 8', ' 6', '10 9 6', ' 8', '7 5 5', ' 8', '5 5 10', ' 7', '7 7 7', '7 8 9', '6 10 5', '5 7 5', '6 9 9', '10 10 6', '7 9 10'),
('Tunyogi Rudolf', '10 10 10', ' 5', '9 10 10', ' 7', '9 7 7', ' 6', '9 6 9', ' 5', '6 5 5', ' 5', '10 10 8', ' 5', '7 7 8', '5 7 10', '9 9 7', '6 8 6', '9 7 10', '8 6 9', '5 7 8'),
('Biro Norbert', '6 10 10', ' 9', '6 10 9', ' 8', '5 7 8', ' 10', '9 6 8', ' 10', '9 6 5', ' 5', '10 9 10', ' 8', '9 6 9', '6 8 10', '6 8 7', '5 10 10', '10 10 9', '8 5 7', '8 8 6'),
('Kiraly Istvan', '10 10 8', ' 10', '9 7 9', ' 7', '6 10 6', ' 9', '7 6 7', ' 7', '7 9 9', ' 10', '7 10 7', ' 8', '7 10 9', '10 10 9', '7 9 6', '6 6 10', '7 5 6', '5 8 5', '8 10 7'),
('Iuhas Gabriel', '4 9 8 7', ' 6', '5 5 9', ' 10', '9 10 9', ' 10', '7 6 7', ' 9', '5 6 7', ' 8', '8 8 5', ' 6', '6 7 7', '8 7 5', '7 7 6', '10 8 8', '10 8 5', '5 8 10', '7 10 6'),
('Seres Norbert', '6 7 6', ' 6', '10 7 10', ' 10', '10 8 6', ' 9', '10 9 5', ' 9', '7 5 6', ' 7', '7 9 5', ' 9', '6 7 8', '8 10 6', '8 5 5', '6 9 5', '10 7 10', '10 10 6', '7 7 8'),
('Demjen David', '10 9 8', ' 10', '9 6 8', ' 6', '8 10 5', ' 7', '9 9 10', ' 6', '8 10 7', ' 5', '7 10 7', ' 7', '7 10 7', '7 7 7', '8 6 6', '5 10 6', '8 8 8', '9 10 5', '5 5 5'),
('Nemeti Boglarka', '9 6 8', ' 7', '10 10 8', ' 5', '6 9 7', ' 5', '7 8 5', ' 7', '5 8 10', ' 6', '9 9 5', ' 5', '10 5 7', '7 8 10', '9 5 6', '5 5 10', '10 8 5', '10 8 9', '5 5 9 10');

-- --------------------------------------------------------

--
-- Table structure for table `XII.B_test_user@gmail.com`
--

CREATE TABLE IF NOT EXISTS `XII.B_test_user@gmail.com` (
  `Name` text NOT NULL,
  `IT` text,
  `IT_final` text,
  `Matematika` text,
  `Matematika_final` text,
  `Roman` text,
  `Roman_final` text,
  `Fizika` text,
  `Fizika_final` text,
  `Kemia` text,
  `Kemia_final` text,
  `Biologia` text,
  `Biologia_final` text,
  `Angol` text,
  `Deutsch` text,
  `Foldrajz` text,
  `Tortenelem` text,
  `Vallalkozastan` text,
  `Vallas` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `XII.B_test_user@gmail.com`
--

INSERT INTO `XII.B_test_user@gmail.com` (`Name`, `IT`, `IT_final`, `Matematika`, `Matematika_final`, `Roman`, `Roman_final`, `Fizika`, `Fizika_final`, `Kemia`, `Kemia_final`, `Biologia`, `Biologia_final`, `Angol`, `Deutsch`, `Foldrajz`, `Tortenelem`, `Vallalkozastan`, `Vallas`) VALUES
('Agoston Krisztian', '8 10', ' 7', '7 6', ' 7', '7 6', ' 10', '8 10', ' 10', '8 6', ' 10', '6 7', ' 6', '9 8', '5 9', '9 6', '10 6', '7 5', '6 5'),
('Banto Katalin', '7 8', ' 8', '8 10', ' 9', '8 6', ' 7', '8 8', ' 8', '9 7', ' 6', '9 9', ' 6', '5 9', '10 6', '10 7', '5 7', '9 6', '9 7'),
('Czeczei Lilla', '8 9', ' 6', '5 6', ' 5', '6 6', ' 9', '7 10', ' 9', '5 9', ' 8', '5 5', ' 7', '9 7', '6 8', '7 5', '6 8', '8 8', '5 6'),
('Dimeny Mark', '5 9', ' 5', '8 7', ' 7', '7 5', ' 9', '10 7', ' 6', '5 10', ' 7', '6 6', ' 7', '10 7', '8 7', '6 10', '10 5', '6 5', '6 10'),
('Dobai Istvan', '8 8', ' 8', '8 10', ' 5', '8 8', ' 9', '5 10', ' 8', '8 10', ' 9', '6 10', ' 10', '6 8', '6 7', '5 8', '6 9', '8 5', '5 8'),
('Domocos Klaudia', '10 10', ' 7', '10 10', ' 10', '5 9', ' 5', '6 8', ' 7', '6 7', ' 9', '5 8', ' 5', '10 9', '6 7', '5 6', '5 10', '7 10', '7 5'),
('Domokos Tamas', '8 5', ' 10', '5 5', ' 9', '9 6', ' 5', '9 8', ' 10', '10 10', ' 10', '5 7', ' 8', '6 9', '7 5', '6 8', '9 6', '5 7', '8 10'),
('Gal Timea', '10 7', ' 10', '6 8', ' 8', '6 7', ' 7', '8 6', ' 5', '6 8', ' 8', '8 6', ' 9', '8 6', '6 6', '10 10', '5 5', '9 7', '9 10'),
('Gombos Kriszta', '9 6', ' 5', '6 9', ' 5', '6 10', ' 6', '5 9', ' 10', '10 7', ' 10', '9 7', ' 6', '6 9', '10 10', '7 10', '8 10', '9 8', '5 9'),
('Gombos Kincso', '5 7', ' 10', '5 10', ' 6', '5 9', ' 8', '7 9', ' 9', '6 7', ' 5', '8 7', ' 10', '8 10', '6 7', '10 5', '10 5', '5 7', '10 5'),
('Jurje Monika', '9 10', ' 8', '9 5', ' 5', '6 7', ' 10', '6 10', ' 6', '9 8', ' 5', '6 6', ' 10', '8 5', '8 9', '6 7', '5 9', '10 5', '7 10'),
('Kobori Nikolett', '10 7', ' 10', '9 8', ' 5', '5 10', ' 7', '5 7', ' 6', '7 10', ' 6', '7 10', ' 6', '7 7', '9 8', '8 6', '9 6', '9 7', '7 9'),
('Kocsis Malvina', '6 5', ' 8', '10 10', ' 6', '10 10', ' 6', '8 5', ' 8', '5 10', ' 5', '7 6', ' 5', '6 7', '8 6', '6 5', '6 9', '10 9', '5 7'),
('Matis Gabriella', '6 10', ' 8', '8 7', ' 6', '10 10', ' 6', '9 7', ' 9', '10 9', ' 6', '10 9', ' 7', '6 6', '5 10', '8 8', '5 8', '10 5', '6 6'),
('Molnar Alexandra', '6 9', ' 8', '9 10', ' 7', '5 8', ' 8', '7 7', ' 7', '7 9', ' 5', '7 6', ' 10', '8 10', '5 7', '7 5', '5 5', '6 7', '5 6'),
('Nagy Reka Nikolett', '6 10', ' 9', '9 6', ' 6', '5 10', ' 7', '5 10', ' 10', '10 8', ' 6', '7 8', ' 8', '6 9', '5 5', '8 7', '6 9', '9 10', '6 10'),
('Nemes Amalia', '7 6', ' 6', '5 7', ' 5', '10 5', ' 8', '9 9', ' 5', '6 8', ' 5', '10 6', ' 9', '6 8', '8 10', '5 6', '6 5', '10 9', '5 6'),
('Podar Robert', '7 6', ' 8', '8 6', ' 5', '6 6', ' 8', '9 6', ' 7', '9 6', ' 8', '8 6', ' 7', '10 9', '8 9', '6 9', '8 7', '5 8', '10 9'),
('Pusok Richard', '8 7', ' 10', '6 7', ' 5', '7 10', ' 6', '7 9', ' 8', '7 9', ' 7', '7 8', ' 5', '6 5', '7 8', '5 8', '8 9', '5 8', '5 9'),
('Racz Aliz Arabella', '7 9', ' 7', '9 6', ' 8', '6 7', ' 7', '10 9', ' 9', '10 10', ' 5', '6 5', ' 8', '8 7', '10 6', '6 5', '10 8', '5 7', '5 7'),
('Samel Adrien Erika', '6 10', ' 10', '6 5', ' 9', '8 6', ' 9', '6 10', ' 9', '5 8', ' 5', '9 10', ' 9', '9 5', '6 8', '7 5', '5 7', '5 8', '6 5'),
('Sepsi Gellert', '6 8', ' 6', '10 6', ' 10', '8 6', ' 7', '10 9', ' 9', '7 8', ' 6', '9 6', ' 7', '9 9', '8 6', '6 9', '6 6', '6 6', '10 8'),
('Szasz Boldizsar', '5 10', ' 10', '10 7', ' 9', '6 9', ' 7', '8 9', ' 8', '5 9', ' 6', '6 9', ' 8', '7 9', '5 9', '10 5', '5 10', '7 7', '5 5'),
('Szeles Szilard', '5 6', ' 6', '10 7', ' 7', '8 8', ' 10', '10 6', ' 8', '7 9', ' 9', '6 6', ' 6', '6 6', '5 6', '10 9', '6 5', '8 10', '6 8'),
('Vancza Johanna', '10 7', ' 10', '10 8', ' 6', '9 8', ' 9', '6 8', ' 5', '10 6', ' 9', '5 10', ' 10', '9 6', '9 6', '9 6', '7 10', '10 5', '10 6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
