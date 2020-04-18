-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 17, 2020 at 02:57 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ebay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `pseudo`, `nom`) VALUES
(1, 'celia@hotmail.fr', 'celiac', 'Chaouat'),
(2, 'salome@hotmail.fr', 'salomec', 'Cohen');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `code_postal` int(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `num_tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `username`, `mdp`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `pays`, `num_tel`) VALUES
(1, 'salomec', 'salomec', 'Cohen', 'Salome', '103 avenue de la république', 'Paris', 75011, 'France', 669612441),
(2, 'celiac', 'celiac', 'Chaouat', 'Celia', '7 rue Léon Renault', 'Les Lilas', 93260, 'France', 602674713);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `num_tel` varchar(255) DEFAULT NULL,
  `type_carte` varchar(100) DEFAULT NULL,
  `num_carte` varchar(100) DEFAULT NULL,
  `nom_carte` varchar(100) DEFAULT NULL,
  `date_expi` varchar(100) DEFAULT NULL,
  `code_secur` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `username`, `mdp`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `pays`, `num_tel`, `type_carte`, `num_carte`, `nom_carte`, `date_expi`, `code_secur`) VALUES
(1, 'admin', 'admin', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '', '', '', '', ''),
(2, 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', '75011', 'sa', '0987654321', '', '', '', '', ''),
(3, 'salomec', 'salomec', 'Cohen', 'Salome', '103 avenue de la république', 'Paris', '75011', 'France', '0669612441', '', '', '', '', ''),
(7, 's', 's', 's', 's', 's', 's', 's', 's', 's', '', '', '', '', ''),
(8, 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', '', '', '', '', ''),
(9, 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', '', '', '', '', ''),
(10, 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', '', '', '', '', ''),
(11, 'ss', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', '', '', '', '', ''),
(12, 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', '', '', '', '', ''),
(13, 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'a', 'sa', '', '', '', '', ''),
(14, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '', '', '', '', ''),
(15, 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', 'sa', '', '', '', '', ''),
(16, 'sa', 'sa', 'sa', 'sa', 'sa', 's', 'sa', 'sa', 'sa', '', '', '', '', ''),
(17, 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k', '', '', '', '', ''),
(18, 'sz', 'azsda', 'az', 'aszqd', 'ads', 'QSDF', '12345', 'QSD', '12345', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enchères`
--

CREATE TABLE `enchères` (
  `id_item` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_vendeur` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `attribut` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `id_client`, `id_vendeur`, `id_admin`, `id`, `nom`, `description`, `prix`, `photo`, `attribut`) VALUES
(1, 1, 1, 2, 1, 'Meuble de Bureau', 'Meuble de bureau à multiples tiroirs de rangement, datant du 19siècle.', 300, '/images/upload/meuble.jpg', '1'),
(2, 1, 1, 2, 2, 'Horloge', 'Horloge de bureau datant de 1980.', 150, '/images/upload/horloge.jpg', '1'),
(3, 1, 1, 2, 3, 'Pièce d’or', 'Médaille inspirée d\'une pièce de monnaie mise en circulation en 1315 par le roi de France Louis X. Elle est en or jaune 18 carats et on retrouve dessus l\'Agneau Pascal en train de tenir la croix.\r\nCette médaille mesure 18 mm de diamètre et pèse environ 4,70 grammes. La gravure est offerte pour l\'achat de cette médaille, profitez-en !', 600, '/images/upload/pieceOr.jpg', '1'),
(4, 2, 2, 2, 4, 'Le Cri', 'Le Cri est le nom collectif d\'une série de peintures expressionnistes par l\'artiste norvégien Edvard Munch. Peint en 1893, il représente une figure humanoïde avec une expression horrifiée, fixant le spectateur depuis un pont surplombant des eaux grises, un grand ciel orange s\'étalant autour de lui.\r\nDimensions : 91 × 73,5 cm\r\n', 60000, '/images/upload/lecri.jpg', '2'),
(5, 2, 2, 2, 5, 'Pièce', 'Cette pièce de monnaie dessine le portrait de la reine diadémé avec coiffure en chinion, tourné vers la gauche. \r\nLa \"1000 reis\" est appelé \"Coroa\" en portugais ce qui signifie \"couronne\".', 170, '/images/upload/piece.jpg', '2'),
(22, 2, 2, 2, 6, 'Van Gogh Starry Night', 'Cette peinture de l\'artiste néerlandais Van Gogh a été peinte en 1889. La peinture, peinte en une journée dans un studio d\'hôpital, représente une vue de la fenêtre de la chambre de Van Gogh. La vue comprend également le ciel avant l\'aube et le village fictif.\r\nDimensions : 74 cm x 92 cm\r\n', 50000, '/images/upload/Starry_night.jpg', '2'),
(23, 2, 2, 2, 7, 'Montre', 'Couleur du cadran : Argenté\r\nTaille du boîtier : 34 mm\r\nMatériau du bracelet : Acier\r\nType de cadran : Bâton\r\nSexe : Unisex\r\nMatériau du boîtier : Acier\r\nType de bracelet : Oyster\r\nFermoir : Boucle déployante \r\nMouvement : Automatique\r\nCouleur : Argenté\r\nMatériau de lunette : Acier ', 7000, '/images/upload/rolex.jpg', '3'),
(24, 2, 2, 2, 8, 'Richard Orlinski Gorille', 'Gueule ouverte sur des crocs effrayants, le gorille en résine s’autoproclame invincible en martelant son torse de ses poings menaçants. Richard Orlinski réinterprète la fantastique créature de King Kong.\r\nDimension : (H)52x(L)52x(l)52cm ', 3000, '/images/upload/gorille.jpg', '3'),
(25, 1, 2, 1, 9, 'Messika Collier', 'Collier en or blanc accompagné de 3 diamants blancs.\r\nLa chaîne mesure 42 cm.', 2000, '/images/upload/collier.jpg', '3');

-- --------------------------------------------------------

--
-- Table structure for table `MeilleurOffre`
--

CREATE TABLE `MeilleurOffre` (
  `id_item` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Vendeur`
--

CREATE TABLE `Vendeur` (
  `id_vendeur` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Vendeur`
--

INSERT INTO `Vendeur` (`id_vendeur`, `id_admin`, `pseudo`, `email`, `nom`, `prenom`, `photo`) VALUES
(1, 2, 'celiac', 'celia.chaouat@edu.ece.fr', 'Chaouat', 'Celia', '/images/upload/beyonce.jpg'),
(2, 2, 'salomec', 'salome.cohen@edu.ece.fr', 'Cohen', 'Salome', ''),
(3, NULL, 'b', 'b@ff.fr', 'b', 'b', NULL),
(4, NULL, 'a', 'a@afk.fr', 'a', 'a', ''),
(5, NULL, 'a', 't.boirin@icloud.com', 'a', 'a', 'ted.png'),
(6, NULL, 'salomecohen1999', 't.boirin@icloud.com', 'Boirin', 'Teddy', 'logoAdb.png'),
(7, NULL, 'sasasa', 'salome_cohen@icloud.com', 'sa', 'sa', 'Capture d’écran 2020-04-16 à 23.45.51.png');

-- --------------------------------------------------------

--
-- Table structure for table `Vendeurs`
--

CREATE TABLE `Vendeurs` (
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Vendeurs`
--

INSERT INTO `Vendeurs` (`nom`, `email`, `pseudo`) VALUES
('sa ', 'salome_cohen@icloud.com', ' sa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `enchères`
--
ALTER TABLE `enchères`
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `client_item` (`id_client`),
  ADD KEY `vendeur_item` (`id_vendeur`),
  ADD KEY `admin_item` (`id_admin`);

--
-- Indexes for table `MeilleurOffre`
--
ALTER TABLE `MeilleurOffre`
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `Vendeur`
--
ALTER TABLE `Vendeur`
  ADD PRIMARY KEY (`id_vendeur`),
  ADD KEY `vendeur_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Vendeur`
--
ALTER TABLE `Vendeur`
  MODIFY `id_vendeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enchères`
--
ALTER TABLE `enchères`
  ADD CONSTRAINT `client_enchere` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `item_enchere` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `admin_item` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `client_item` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `vendeur_item` FOREIGN KEY (`id_vendeur`) REFERENCES `Vendeur` (`id_vendeur`);

--
-- Constraints for table `MeilleurOffre`
--
ALTER TABLE `MeilleurOffre`
  ADD CONSTRAINT `client_offre` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `item_offre` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);
