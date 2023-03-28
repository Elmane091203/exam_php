-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 28 mars 2023 à 15:13
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exam_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `idMes` int(6) NOT NULL,
  `destinataire` int(11) DEFAULT NULL,
  `idPF` int(11) DEFAULT NULL,
  `objet` varchar(50) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `etat` int(1) NOT NULL DEFAULT 1,
  `etatd` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`idMes`, `destinataire`, `idPF`, `objet`, `contenu`, `date`, `etat`, `etatd`) VALUES
(5, 15, 17, 'vdefr', 'frgrgrg rgrgrgr grfg fgrg rg fgfgrgrg fgrrgdg rg', '2022-03-10 14:33:17', 1, 0),
(6, 2, 3, 'kbkj', '                  ic sbudjxvsoidlkvjs          ', '2023-03-28 12:53:36', 1, 1),
(7, 3, 2, 'kbkj', '                    è-figuohkpiuyt        ', '2023-03-28 12:56:16', 1, 1),
(8, 2, 3, 'ckbsdkc', 'oinioibk                            ', '2023-03-28 13:00:07', 1, 1),
(9, 2, 3, 'yuveshjcb', 'ufyuihl                            ', '2023-03-28 13:11:36', 1, 1),
(10, 2, 3, 'test', '                   ydtfugihojpk         ', '2023-03-28 13:12:32', 0, 1),
(11, 2, 3, 'ckbsdkc', 'oinioibk                            ', '2023-03-28 13:12:47', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `idP` int(11) NOT NULL,
  `nomP` varchar(50) NOT NULL,
  `prenomP` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idP`, `nomP`, `prenomP`, `tel`, `login`, `mdp`) VALUES
(2, 'Abdi Farah', 'Nafissa', '784561230', 'nafi', '482f7629a2511d23ef4e958b13a5ba54bdba06f2'),
(3, 'Elmane', 'Elmane', '784561230', 'elm', '482f7629a2511d23ef4e958b13a5ba54bdba06f2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idMes`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`idP`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `idMes` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
