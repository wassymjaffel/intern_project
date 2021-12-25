-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 11:53 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `fiche`
--

CREATE TABLE `fiche` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `teeth` varchar(255) NOT NULL,
  `observations` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fiche`
--

INSERT INTO `fiche` (`id`, `id_patient`, `teeth`, `observations`) VALUES
(5, 4, '{\"0\":\"27\",\"1\":\"18\",\"2\":\"20\"}', 'hahi'),
(6, 2, '{\"0\":\"16\",\"1\":\"15\",\"2\":\"14\",\"3\":\"13\",\"4\":\"12\",\"5\":\"11\",\"6\":\"24\",\"7\":\"27\",\"8\":\"26\"}', 'cznvczjnczen czlnclzenlcnzlc c oznczncnzocnz clzjlcnzenczncljz ckzjcbnjznczncljznc jcnzjcnojzncljzc czcjnzcnzjcnoznc cznconzocnzlcnioz czcnzocnoizcolzcnz clzncznoicnzcnoiznc zczncozncozcnzocnozcn cozncnoznco zncjzebnczbecibzecbizuc zecbzicbiciz cuzicbiuzcben zbcozenoez zenojznoihzeoj chzocnozic cozc'),
(7, 2, '{\"0\":\"17\",\"1\":\"27\",\"2\":\"28\",\"3\":\"61\",\"4\":\"51\",\"5\":\"81\",\"6\":\"71\"}', 'aaaaaaaaaaxxxxxxxxxxxxx'),
(9, 19, '{\"0\":\"28\",\"1\":\"27\",\"2\":\"26\",\"3\":\"25\"}', 'aaaaaaaaaaaaaa'),
(10, 17, '{\"0\":\"17\",\"1\":\"27\",\"2\":\"46\",\"3\":\"73\",\"4\":\"83\",\"5\":\"37\",\"6\":\"53\",\"7\":\"63\",\"8\":\"14\",\"9\":\"24\"}', 'dsdsds');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`user_name`, `user_pass`) VALUES
('wassim', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `profession` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `nom`, `prenom`, `date_de_naissance`, `adresse`, `tel`, `profession`) VALUES
(2, 'aassim', 'kaddour', '1997-08-09', 'aaaaaaaaaaaaaaa', '254789632', 'web developer'),
(4, 'wassim new', 'jaffel ', '2021-08-17', 'cité el thelja ', '2547896', 'web developer '),
(6, 'aassim', 'jaffel', '2021-08-09', 'cité el thelja', '254789632', 'web developer'),
(7, 'wassim new', 'jaffel ', '2021-08-17', 'cité el ghazella', '2547896', 'web developer '),
(8, 'aassim', 'jaffel', '2021-08-09', 'cité el thelja', '254789632', 'web developer'),
(9, 'wassim new', 'jaffel ', '2021-08-17', 'cité el thelja ', '2547896', 'web developer '),
(10, 'aassim', 'jaffel', '2021-08-09', 'cité el thelja', '254789632', 'web developer'),
(11, 'wassim new', 'jaffel ', '2021-08-17', 'cité el thelja ', '2547896', 'web developer '),
(12, 'aassim', 'jaffel', '2021-08-09', 'cité el thelja', '254789632', 'web developer'),
(13, 'wassim new', 'jaffel ', '2021-08-17', 'cité el thelja ', '2547896', 'web developer '),
(14, 'aassim', 'jaffel', '2021-08-09', 'cité el thelja', '254789632', 'web developer'),
(15, 'wassim new', 'jaffel ', '2021-08-17', 'cité el thelja ', '2547896', 'web developer '),
(16, 'aassim', 'jaffel', '2021-08-09', 'cité el thelja', '254789632', 'web developer'),
(17, 'wassim new', 'jaffel ', '2021-08-17', 'cité el thelja ', '2547896', 'web developer '),
(18, 'aassim', 'jaffel', '2021-08-09', 'cité el thelja', '254789632', 'web developer'),
(19, 'wassim new', 'jaffel ', '2021-08-17', 'cité el thelja ', '2547896', 'web developer ');

-- --------------------------------------------------------

--
-- Table structure for table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `intervention` varchar(45) DEFAULT NULL,
  `doit` int(11) NOT NULL,
  `recu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id`, `id_patient`, `date`, `intervention`, `doit`, `recu`) VALUES
(9, 4, '2021-08-06', 'new one by id', 8689999, 99999),
(15, 2, '2021-08-20', 'nahhh', 11111, 11111),
(16, 2, '2021-08-20', 'nahhh', 11111, 11111),
(21, 2, '2021-08-20', 'nahhh', 11111, 11111),
(23, 2, '2021-08-21', 'aaaaaaaaaaggggggggggggggggggg', 4, 5),
(26, 4, '2021-08-21', 'what the fuck', 15, 16),
(27, 19, '2021-08-21', 'aaaaaaaaaaaaaa', 45, 45),
(28, 17, '2021-08-21', 'dsdsds', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fiche`
--
ALTER TABLE `fiche`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_patient_fiche` (`id_patient`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_patient` (`id_patient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fiche`
--
ALTER TABLE `fiche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fiche`
--
ALTER TABLE `fiche`
  ADD CONSTRAINT `fk_patient_fiche` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
