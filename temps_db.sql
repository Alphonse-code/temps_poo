-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 04 août 2022 à 13:17
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `temps_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tmp_avantage`
--

CREATE TABLE `tmp_avantage` (
  `id_avantage` int(11) NOT NULL,
  `nom_avantage` varchar(255) NOT NULL,
  `montant_avantage` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tmp_avantage`
--

INSERT INTO `tmp_avantage` (`id_avantage`, `nom_avantage`, `montant_avantage`) VALUES
(1, 'Frais', 8000),
(2, 'nourriture', 10000);

-- --------------------------------------------------------

--
-- Structure de la table `tmp_avantage_user`
--

CREATE TABLE `tmp_avantage_user` (
  `id_avg_user` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_avantage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tmp_avantage_user`
--

INSERT INTO `tmp_avantage_user` (`id_avg_user`, `id_user`, `id_avantage`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 1, 1),
(4, 1, 2),
(5, 8, 1),
(6, 8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tmp_cout`
--

CREATE TABLE `tmp_cout` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `cout_minute` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tmp_cout`
--

INSERT INTO `tmp_cout` (`id`, `id_user`, `date`, `cout_minute`) VALUES
(3, 1, '2022-08-02', '232.8125'),
(4, 3, '2022-08-02', '1613.1696428571'),
(5, 3, '2022-08-02', '2150.8928571429'),
(6, 3, '2022-08-02', '2628.869047619'),
(7, 1, '2022-08-04', '232.8125');

-- --------------------------------------------------------

--
-- Structure de la table `tmp_notifications`
--

CREATE TABLE `tmp_notifications` (
  `id_notif` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `ntime` datetime DEFAULT NULL,
  `repeat` int(11) NOT NULL DEFAULT 1,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tmp_notifications`
--

INSERT INTO `tmp_notifications` (`id_notif`, `title`, `message`, `ntime`, `repeat`, `publish_date`, `id_user`) VALUES
(5, 'TEMPS DE RAPPELLE DU PROJET temps', 'Hey !!! vous êtez toujours bien sur le même :)', '2022-08-02 17:18:29', 1, '2022-08-04 07:07:27', 3);

-- --------------------------------------------------------

--
-- Structure de la table `tmp_prestation`
--

CREATE TABLE `tmp_prestation` (
  `id_prestation` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_prj` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `heure_debut` varchar(20) NOT NULL,
  `heure_fin` varchar(20) DEFAULT NULL,
  `total_minute` int(11) DEFAULT NULL,
  `depense_supplementaire` varchar(255) DEFAULT NULL,
  `description_dépense` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tmp_prestation`
--

INSERT INTO `tmp_prestation` (`id_prestation`, `date`, `id_prj`, `id_user`, `heure_debut`, `heure_fin`, `total_minute`, `depense_supplementaire`, `description_dépense`) VALUES
(2, '2022-08-02', 1, 1, '12:51:40', '12:54:42', 3, NULL, NULL),
(5, '2022-08-02', 2, 3, '15:04:01', '15:31:01', 27, NULL, NULL),
(8, '2022-08-02', 1, 3, '15:48:03', '15:56:57', 9, NULL, NULL),
(9, '2022-08-02', 2, 3, '16:10:48', '16:18:48', 8, NULL, NULL),
(11, '2022-08-04', 1, 1, '09:48:14', '09:51:03', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tmp_projets`
--

CREATE TABLE `tmp_projets` (
  `id_prj` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `localisation` varchar(200) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin_theorique` date NOT NULL,
  `date_fin_reel` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tmp_projets`
--

INSERT INTO `tmp_projets` (`id_prj`, `nom`, `localisation`, `date_debut`, `date_fin_theorique`, `date_fin_reel`) VALUES
(1, 'Temps', 'FRANCE', '2022-07-19', '2022-07-30', '2022-07-31'),
(2, 'Paris Sportif', 'MADAGASCAR', '2022-07-08', '2022-07-23', '2022-07-14'),
(10, 'SAFEONE', 'FRANCE', '2022-07-12', '2022-07-29', '2022-07-31'),
(13, 'Mobil temps', 'FRANCE', '2022-08-03', '2022-08-31', '2022-09-01');

-- --------------------------------------------------------

--
-- Structure de la table `tmp_temps_rappel`
--

CREATE TABLE `tmp_temps_rappel` (
  `id` int(11) NOT NULL,
  `id_prj` int(11) NOT NULL,
  `tps_rappel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tmp_temps_rappel`
--

INSERT INTO `tmp_temps_rappel` (`id`, `id_prj`, `tps_rappel`) VALUES
(2, 1, 30);

-- --------------------------------------------------------

--
-- Structure de la table `tmp_users`
--

CREATE TABLE `tmp_users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `level` varchar(255) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `salaire` varchar(255) DEFAULT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tmp_users`
--

INSERT INTO `tmp_users` (`id_user`, `nom`, `prenom`, `mail`, `level`, `tel`, `salaire`, `psw`) VALUES
(1, 'SOLOFONDRAIBE', 'Donné Alphonse', 'alphonse@gmail.com', '9', '+261 34 46 261 28', '520000€', '7d8c80efaa80676771291f32576479d1'),
(3, 'RAZAFIMAHAFALY', 'Jean Elson', 'razafimahafaly@gmail.com', '2', '+261344626128', '400000€', '7d8c80efaa80676771291f32576479d1'),
(8, 'Fanid', 'Soilihi', ' fanidsoilihi@gmail.com', '9', '+261322592183', '500000 €', '7d8c80efaa80676771291f32576479d1');

-- --------------------------------------------------------

--
-- Structure de la table `tmp_user_prj`
--

CREATE TABLE `tmp_user_prj` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tmp_user_prj`
--

INSERT INTO `tmp_user_prj` (`id`, `id_user`, `id_prj`) VALUES
(1, 1, 1),
(3, 3, 2),
(4, 8, 10),
(5, 1, 13);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tmp_avantage`
--
ALTER TABLE `tmp_avantage`
  ADD PRIMARY KEY (`id_avantage`);

--
-- Index pour la table `tmp_avantage_user`
--
ALTER TABLE `tmp_avantage_user`
  ADD PRIMARY KEY (`id_avg_user`),
  ADD KEY `id_avantage` (`id_avantage`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `tmp_cout`
--
ALTER TABLE `tmp_cout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `tmp_notifications`
--
ALTER TABLE `tmp_notifications`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `tmp_notifications_ibfk_1` (`id_user`);

--
-- Index pour la table `tmp_prestation`
--
ALTER TABLE `tmp_prestation`
  ADD PRIMARY KEY (`id_prestation`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_prj` (`id_prj`);

--
-- Index pour la table `tmp_projets`
--
ALTER TABLE `tmp_projets`
  ADD PRIMARY KEY (`id_prj`);

--
-- Index pour la table `tmp_temps_rappel`
--
ALTER TABLE `tmp_temps_rappel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prj` (`id_prj`);

--
-- Index pour la table `tmp_users`
--
ALTER TABLE `tmp_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `tmp_user_prj`
--
ALTER TABLE `tmp_user_prj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_prj` (`id_prj`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tmp_avantage`
--
ALTER TABLE `tmp_avantage`
  MODIFY `id_avantage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tmp_avantage_user`
--
ALTER TABLE `tmp_avantage_user`
  MODIFY `id_avg_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tmp_cout`
--
ALTER TABLE `tmp_cout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tmp_notifications`
--
ALTER TABLE `tmp_notifications`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `tmp_prestation`
--
ALTER TABLE `tmp_prestation`
  MODIFY `id_prestation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `tmp_projets`
--
ALTER TABLE `tmp_projets`
  MODIFY `id_prj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `tmp_temps_rappel`
--
ALTER TABLE `tmp_temps_rappel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tmp_users`
--
ALTER TABLE `tmp_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tmp_user_prj`
--
ALTER TABLE `tmp_user_prj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tmp_avantage_user`
--
ALTER TABLE `tmp_avantage_user`
  ADD CONSTRAINT `tmp_avantage_user_ibfk_1` FOREIGN KEY (`id_avantage`) REFERENCES `tmp_avantage` (`id_avantage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tmp_avantage_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tmp_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tmp_cout`
--
ALTER TABLE `tmp_cout`
  ADD CONSTRAINT `tmp_cout_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tmp_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tmp_notifications`
--
ALTER TABLE `tmp_notifications`
  ADD CONSTRAINT `tmp_notifications_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tmp_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tmp_prestation`
--
ALTER TABLE `tmp_prestation`
  ADD CONSTRAINT `tmp_prestation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tmp_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tmp_prestation_ibfk_2` FOREIGN KEY (`id_prj`) REFERENCES `tmp_projets` (`id_prj`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tmp_temps_rappel`
--
ALTER TABLE `tmp_temps_rappel`
  ADD CONSTRAINT `tmp_temps_rappel_ibfk_1` FOREIGN KEY (`id_prj`) REFERENCES `tmp_projets` (`id_prj`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tmp_user_prj`
--
ALTER TABLE `tmp_user_prj`
  ADD CONSTRAINT `tmp_user_prj_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tmp_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tmp_user_prj_ibfk_2` FOREIGN KEY (`id_prj`) REFERENCES `tmp_projets` (`id_prj`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
