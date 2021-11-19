-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 19 nov. 2021 à 12:00
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exercices`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `title_article` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `text_article` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `image_article` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `price_article` float NOT NULL,
  `description_article` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `quantity` int(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `title_article`, `text_article`, `image_article`, `price_article`, `description_article`, `quantity`, `id_user`) VALUES
(1, 'Asus ROG', 'Carte graphique 2080 TI Super', '633DB832-BA63-41CB-8AF6-144C6D941F21date=WedNov1790901CET2021d.png', 1200.99, 'Ordinateur GAMING', 19, 1),
(2, 'IPAD', 'Produit trop cher lol', 'ipad-mini-select-202109_FMT_WHHdate=MonNov15124809CET2021d.jpg', 999, 'Electronique', 10000, 1),
(3, 'iBanane', 'Banane jaune', 'shutterstock_553887610-e1557046359887-800x601date=MonNov15165013CET2021d.jpg', 10, 'Fruit', 3, 1),
(4, 'AlienWare', 'Payé pour la marque, pas pour les composants', '000000079195date=MonNov15131100CET2021d.jpg', 2999, 'Ordinateur de luxe', 10, 1),
(8, 'Razer Kraken Chroma 7.1', 'Accessoire Informatique', 'LD0005482968_2.jpg', 149, 'Casque Gaming', 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `star_comment` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `star_comment`, `id_article`, `id_user`) VALUES
(22, 4, 8, 1),
(23, 4, 2, 1),
(24, 3, 8, 2),
(26, 2, 3, 1),
(27, 4, 4, 1),
(28, 4, 4, 3),
(29, 5, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `lastname` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `firstname` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `lastname`, `firstname`, `email`, `password`, `admin`) VALUES
(1, 'Aubrun', 'Boris', 'boris.aubrun@gmail.com', 'b736efda7342c257b42af16d6f7b8da01d5aa165', 1),
(2, 'dupont', 'thierry', 'thierry.dupont', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(3, 'boris', 'aubrun', 'boris.aubrun@free.fr', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(4, 'Michel', 'Frederic', 'michel.frederic@hotmail.fr', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(5, 'dupont', 'dupont', 'dupont.dupont@gmail.com', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(6, 'Martin', 'Solveig', 'martin.solveig@google.com', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(8, 'Micheline', 'longdubas', 'mich@longdu.fr', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(9, 'test', 'foobar', 'test.foobar@gmail.com', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(10, 'wf3', 'admin', 'wf3.admin@gmail.com', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(11, 'testPrenom', 'testNom', 'nom.prenom@mail.fr', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(12, 'Toto', 'Titi', 'toto@wf3.fr', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(13, 'utilisateur', 'user', 'user@gmail.com', 'f8a9b7a4a91fc869afba21f5f11e770629d3762c', 0),
(14, 'lequin', 'vincent', 'vinvent.lequin@gmail.com', '70cb531892df95cc7833eda32bdb2bdbc6d65a3a', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`,`id_article`),
  ADD KEY `id_comment` (`id_comment`),
  ADD KEY `id_comment_2` (`id_comment`,`id_user`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_article_2` (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
