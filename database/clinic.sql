-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 fév. 2023 à 06:28
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clinic`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `last_update`) VALUES
(4, 'admin', '0192023a7bbd73250516f069df18b500', '2023-01-04 04:53:01');

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` text DEFAULT NULL,
  `doctorname` text DEFAULT NULL,
  `patientname` text DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` text DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorname`, `patientname`, `consultancyFees`, `appointmentDate`, `postingDate`) VALUES
(1, 'Cardiology', 'Jenny', 'Chantal', 500, '2023/01/01', '2023-01-03 05:05:58');

-- --------------------------------------------------------

--
-- Structure de la table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `fullname` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(11) DEFAULT NULL COMMENT '0:unread, 1:read'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contactus`
--

INSERT INTO `contactus` (`id`, `fullname`, `email`, `phone`, `message`, `last_update`, `IsRead`) VALUES
(1, 'Kotozafy Alexis', 'kotozafy@gmail.com', 345698231, 'Test fandehany Rakotozafy', '2023-01-02 15:43:57', 0),
(2, 'Rasoa Zafy', 'rasoa@gmail.com', 345687920, 'test ihany', '2023-01-03 05:11:37', 1);

-- --------------------------------------------------------

--
-- Structure de la table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `department`
--

INSERT INTO `department` (`id`, `name`, `last_update`) VALUES
(1, 'Secretary', '2023-01-03 03:59:22'),
(2, 'Secourism', '2023-01-03 03:59:52');

-- --------------------------------------------------------

--
-- Structure de la table `docteur`
--

CREATE TABLE `docteur` (
  `id` int(11) NOT NULL,
  `firstname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifiant` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `specialization` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docfees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_role` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: medecin, 1: infirmier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `docteur`
--

INSERT INTO `docteur` (`id`, `firstname`, `lastname`, `email`, `password`, `identifiant`, `image`, `address`, `phone`, `specialization`, `docfees`, `last_update`, `user_role`) VALUES
(5, 'Jenny', 'Rak', 'jenny@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jenny@thclinic.org', 'african-american-black-female-medecin-dans-un-bureau-de-l-hopital-dej07e.jpg', NULL, 323154656, 'Neurologist', NULL, '2022-12-28 12:35:59', 1),
(12, 'Vanny', 'Miffy', 'vanny@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'vanny@thclinic.org', 'beautiful-young-female-doctor-looking-at-camera-in-the-office (1).jpg.jpg', 'Sambaina', 324578965, 'Neurologist', '80000', '2023-01-02 19:16:12', 0),
(13, 'Françia', 'Mino', 'francia@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'françia@thclinic.org', 'black-woman-with-stethoscope.jpg.jpg', 'Antsapany', 345689520, 'Orthopaedic', '1000', '2023-01-02 19:36:36', 0),
(14, 'Mary', 'Kanto', 'mary@gmail.com', 'b5b73fae0d87d8b4e2573105f8fbe7bc', 'mary@thclinic.org', 'african-american-doctor-woman-professionnels-de-la-sante-travaillant-dans-le-choc-la-peur-panique-et-la-peur-d-exprimer-p4121d.jpg.jpg', 'Vohistoa', 345869732, 'Generalist', '500', '2023-01-02 19:39:50', 0),
(15, 'Catthy', 'Nanah', 'catthy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'catthy@thclinic.org', 'beautiful-young-female-doctor-looking-at-camera-in-the-office.jpg.jpg', 'Vohitsoa', 324567895, 'Cardiology', '56600', '2023-01-02 19:42:32', 0),
(16, 'Jao', 'Man', 'jao@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jao@thclinic.org', '30164.JPG.jpg', NULL, 324565987, NULL, NULL, '2023-01-07 18:02:14', 0);

-- --------------------------------------------------------

--
-- Structure de la table `leavepers`
--

CREATE TABLE `leavepers` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `personalid` int(11) DEFAULT NULL,
  `first_date` date DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `leavepers`
--

INSERT INTO `leavepers` (`id`, `title`, `description`, `personalid`, `first_date`, `last_date`, `last_update`, `role`) VALUES
(1, 'Hiatrika fiofanana', 'ho any andafy', 1, '2022-05-31', '2023-06-06', '2023-01-09 00:46:27', 0);

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `pageType` text DEFAULT NULL,
  `pageTitle` text DEFAULT NULL,
  `pageDescription` mediumtext DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `disponibleTime` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `pageType`, `pageTitle`, `pageDescription`, `email`, `phone`, `last_update`, `disponibleTime`) VALUES
(1, 'aboutus', 'About Us', '<ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.313em; margin-left: 1.655em;\" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" center;=\"\" background-color:=\"\" rgb(255,=\"\" 246,=\"\" 246);\"=\"\"><li style=\"text-align: left;\"><font color=\"#000000\">The clinic management system is based on the idea of providing an automated system. This saves additional time and overhead to perform the action. The new system is to control the following information; patient information, room availability, staff and operating room schedules, and patient invoices. These services are to be provided in an efficient, cost effective manner, with the goal of reducing the time and resources currently required for such tasks.</font></li><li style=\"text-align: left;\"><font color=\"#000000\">A significant part of the operation of any hospital involves the acquisition, management and timely retrieval of great volumes of information. This information typically involves; patient personal information and medical history, staff information, room and ward scheduling, staff scheduling, operating theater scheduling and various facilities waiting lists. All of this information must be managed in an efficient and cost wise fashion so that an institution resources may be effectively utilized Th Clinic will automate the management of the hospital making it more efficient and error free. It aims at standardizing data, consolidating data ensuring data integrity and reducing inconsistencies. </font></li></ul>', '', 0, '2023-01-04 03:30:42', ''),
(2, 'contact', 'Contact Details', 'Sambaina, Jerosalema Carter', 'thclinic@gmail.com', 2147483647, '2023-01-04 03:30:52', '7:00 AM to 5:00 PM');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `firstname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`, `gender`, `age`, `address`, `last_update`) VALUES
(1, 'Chantal', 'Josephine', 'chantal@mail.com', 'b5b73fae0d87d8b4e2573105f8fbe7bc', 324568791, 'female', 21, 'Tana', '2023-01-02 14:30:14');

-- --------------------------------------------------------

--
-- Structure de la table `personnal`
--

CREATE TABLE `personnal` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `fullname` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `idenfiant` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnal`
--

INSERT INTO `personnal` (`id`, `image`, `fullname`, `address`, `gender`, `email`, `idenfiant`, `password`, `department`, `last_update`) VALUES
(1, 'two-paramedics-ambulance-african-american-female-paramedic-driving-talking-radio.jpg', 'Rasoa Zanany', 'Ambohibary', 'feminin', 'zanany@gmail.com', 'rasoa@thclinic.org', '827ccb0eea8a706c4c34a16891f84e7b', 'Secourism', '2023-01-03 03:23:58');

-- --------------------------------------------------------

--
-- Structure de la table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `specialization`
--

INSERT INTO `specialization` (`id`, `name`, `last_update`) VALUES
(7, 'Cardiology', '2023-01-02 17:19:28'),
(8, 'Orthopaedic', '2023-01-02 17:19:38'),
(9, 'Neurologist', '2023-01-02 17:19:50'),
(10, 'Generalist', '2023-01-03 03:03:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `docteur`
--
ALTER TABLE `docteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `leavepers`
--
ALTER TABLE `leavepers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnal`
--
ALTER TABLE `personnal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `docteur`
--
ALTER TABLE `docteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `leavepers`
--
ALTER TABLE `leavepers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `personnal`
--
ALTER TABLE `personnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
