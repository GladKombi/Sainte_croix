-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 05:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_saint_croix`
--

-- --------------------------------------------------------

--
-- Table structure for table `affectation`
--

CREATE TABLE `affectation` (
  `id` int(11) NOT NULL,
  `cours` int(11) NOT NULL,
  `enseignant` int(11) NOT NULL,
  `date_affectation` datetime NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affectation`
--

INSERT INTO `affectation` (`id`, `cours`, `enseignant`, `date_affectation`, `supprimer`) VALUES
(1, 1, 1, '2024-09-08 00:00:00', 0),
(2, 2, 1, '2024-09-08 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `anneescolaire`
--

CREATE TABLE `anneescolaire` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `libelle2` int(50) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anneescolaire`
--

INSERT INTO `anneescolaire` (`id`, `libelle`, `libelle2`, `statut`) VALUES
(1, '2024', 2025, 0),
(2, '2025', 2026, 0),
(3, '2026', 2027, 0),
(4, '2027', 2028, 0),
(5, '2028', 2029, 0),
(6, '2029', 2030, 0);

-- --------------------------------------------------------

--
-- Table structure for table `catfrais`
--

CREATE TABLE `catfrais` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catfrais`
--

INSERT INTO `catfrais` (`id`, `description`, `statut`) VALUES
(1, 'Frais du vers', 0),
(2, 'Frais Scolaire', 0),
(3, 'Glas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `nomclasse` text NOT NULL,
  `options` int(11) NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id`, `nomclasse`, `options`, `supprimer`) VALUES
(1, '7 ieme A', 1, 0),
(2, '1 iere A   ', 2, 0),
(3, '2 iem B', 3, 0),
(4, '3iem A', 2, 0),
(5, '3iem A', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `nomcours` text NOT NULL,
  `maxima` int(11) NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `nomcours`, `maxima`, `supprimer`) VALUES
(1, 'Botanique ', 20, 0),
(2, 'Maths ', 40, 0),
(3, 'Anatomies ', 20, 0),
(4, 'Français ', 30, 0),
(5, 'Anglais', 0, 0),
(6, 'Etude', 0, 1),
(7, 'Etude', 0, 1),
(8, 'Algebre', 0, 0),
(9, 'Zoologie', 0, 0),
(10, 'Geometrie', 0, 0),
(11, 'Statistique', 0, 0),
(12, 'Dessin', 0, 0),
(13, 'Histoire', 0, 0),
(14, 'Musique', 0, 0),
(15, 'Religion', 0, 0),
(16, 'Education à la vie', 0, 0),
(17, 'Civisme', 0, 0),
(19, 'Microiologie', 0, 0),
(20, 'pédagogie', 0, 0),
(21, 'physique', 0, 0),
(22, 'Psychologie', 0, 0),
(23, 'SOCAF', 0, 0),
(24, 'Ecologie', 0, 0),
(25, 'Histoire', 0, 0),
(26, 'chimie', 0, 0),
(27, 'Religion', 0, 0),
(28, 'Informatique', 0, 0),
(29, 'Algèbre', 0, 0),
(30, 'Géographie', 0, 0),
(31, 'Etude', 0, 0),
(32, 'Analyse numerique', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

CREATE TABLE `eleve` (
  `matricule` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `adresse` text NOT NULL,
  `lieuNaissance` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `nomPere` varchar(50) NOT NULL,
  `nomMere` varchar(50) NOT NULL,
  `numeroParent` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`matricule`, `nom`, `postnom`, `prenom`, `genre`, `adresse`, `lieuNaissance`, `dateNaissance`, `nomPere`, `nomMere`, `numeroParent`, `photo`, `statut`) VALUES
('CSSC1/2024', 'glad    ', 'kombi    ', 'Jospin ', 'Masculin', 'kambali    ', 'katwa    ', '2005-02-02', 'kikako    ', 'lea    ', '+243975545108', 'WhatsApp Image 2024-06-08 at 08.08.27_d6464311.jpg', 0),
('CSSC2/2024', 'kombi', 'Kombi ', 'Lad_77', 'Masculin', 'kambali', 'katwa', '2007-02-07', 'kambere', 'Glad', '+243973313160', '_75eaa991-3961-4e5f-bacc-f201b6cd49a3.jpeg', 0),
('CSSC3/2024', 'kombi', 'Kombi ', 'kombi', 'Feminin', 'kambali', 'katwa', '2017-01-03', 'kambere', 'Glad', '+243998385019', '_6bfe0b76-6088-4433-a8a0-aa81ee57acbb.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enseignants`
--

CREATE TABLE `enseignants` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `postnom` text NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tel` text NOT NULL,
  `genre` text NOT NULL,
  `adresse` text NOT NULL,
  `jrnepeda` int(11) NOT NULL,
  `photo` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignants`
--

INSERT INTO `enseignants` (`id`, `nom`, `postnom`, `prenom`, `tel`, `genre`, `adresse`, `jrnepeda`, `photo`, `supprimer`) VALUES
(1, 'Glad', 'kombi', 'Lad_77 ', '0997019883', 'Feminin', 'kambali', 1, '_29d6dcd4-8c0d-4440-b251-692e9b58bdaa.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `frais`
--

CREATE TABLE `frais` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `categorie` int(11) NOT NULL,
  `Montant` double NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `frais`
--

INSERT INTO `frais` (`id`, `date`, `description`, `categorie`, `Montant`, `statut`) VALUES
(1, '2024-08-28', 'Gla lar ', 2, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `heure`
--

CREATE TABLE `heure` (
  `id` int(11) NOT NULL,
  `unite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `heure`
--

INSERT INTO `heure` (`id`, `unite`) VALUES
(1, '1e heure'),
(2, '2e heure'),
(3, '3e heure'),
(4, '4e heure'),
(5, '5e heure'),
(6, '6e heure'),
(7, '7e heure');

-- --------------------------------------------------------

--
-- Table structure for table `horaire`
--

CREATE TABLE `horaire` (
  `id` int(11) NOT NULL,
  `affectation` int(11) NOT NULL,
  `classe` int(11) NOT NULL,
  `jours` int(11) NOT NULL,
  `heure` int(11) NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `intituler` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `eleve` text NOT NULL,
  `promotion` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`id`, `date`, `eleve`, `promotion`, `statut`) VALUES
(1, '2024-09-07', 'CSSC1/2024', 1, 0),
(2, '2024-09-08', 'CSSC1/2024', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jours`
--

CREATE TABLE `jours` (
  `id` int(11) NOT NULL,
  `jour` text NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jours`
--

INSERT INTO `jours` (`id`, `jour`, `statut`) VALUES
(1, 'Lundi', 0),
(2, 'Mardi', 0),
(3, 'Mercredi', 0),
(4, 'Jeudi', 0),
(5, 'Vendredi', 0),
(6, 'Samedi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `id` int(11) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id`, `Description`, `statut`) VALUES
(1, 'Cycle d&#039;orientation', 0),
(2, 'Commercial et Gestion', 0),
(3, 'Chimie Biologie', 0),
(4, 'Literature et lettres', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(50) NOT NULL,
  `frais` int(11) NOT NULL,
  `montant` double NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `libelle`, `statut`) VALUES
(1, '1er Periode', 0),
(2, '2er Periode', 0);

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `id` int(11) NOT NULL,
  `eleve` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `cote` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `classe` int(11) NOT NULL,
  `anneeSco` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `classe`, `anneeSco`, `statut`) VALUES
(1, 1, 5, 0),
(2, 2, 5, 0),
(3, 3, 5, 0),
(4, 4, 5, 0),
(5, 5, 5, 0),
(6, 1, 6, 0),
(7, 2, 6, 0),
(8, 3, 6, 0),
(9, 4, 6, 0),
(10, 5, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seuil`
--

CREATE TABLE `seuil` (
  `id` int(11) NOT NULL,
  `montant` double NOT NULL,
  `periode` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seuil`
--

INSERT INTO `seuil` (`id`, `montant`, `periode`, `statut`) VALUES
(1, 100, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `fonction` int(11) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anneescolaire`
--
ALTER TABLE `anneescolaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catfrais`
--
ALTER TABLE `catfrais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frais`
--
ALTER TABLE `frais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heure`
--
ALTER TABLE `heure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jours`
--
ALTER TABLE `jours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seuil`
--
ALTER TABLE `seuil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anneescolaire`
--
ALTER TABLE `anneescolaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catfrais`
--
ALTER TABLE `catfrais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `enseignants`
--
ALTER TABLE `enseignants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frais`
--
ALTER TABLE `frais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `heure`
--
ALTER TABLE `heure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jours`
--
ALTER TABLE `jours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seuil`
--
ALTER TABLE `seuil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
