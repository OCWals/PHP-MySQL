-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 25 Janvier 2017 à 12:11
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mini-chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `pseudo`, `contenu`) VALUES
(1, 'Walson', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla '),
(3, 'walson', 'Contenu bla bla bla [ep. 2]'),
(6, 'Test', 'contenu 3'),
(7, 'test 2', 'contenu 4'),
(11, 'test 3', 'bla bla bal contenu 5'),
(13, 'dq', 'sqdsqdqdqds'),
(14, 'test 27', 'qflhbmozqngfpzaep fqflhbmozqngfpzaep fqflhbmozqngfpzaep fqflhbmozqngfpzaep fqflhbmozqngfpzaep fqflhbmozqngfpzaep fqflhbmozqngfpzaep fqflhbmozqngfpzaep fqflhbmozqngfpzaep fqflhbmozqngfpzaep f'),
(15, 'Walson', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(16, 'Wall-E', ' [2] - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(17, 'testtest', '[3] - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(18, 'finaltestep1', 'Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! Contenu contenu ! '),
(19, 'bba', 'bla bla'),
(20, 'gfds', 'sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf sffdssfd sdgf '),
(21, 'sdgsqgfdwsf', 'ngpjvpp^q,vpeaq,vp,epva,pêv ngpjvpp^q,vpeaq,vp,epva,pêv ngpjvpp^q,vpeaq,vp,epva,pêv ngpjvpp^q,vpeaq,vp,epva,pêv ngpjvpp^q,vpeaq,vp,epva,pêv ngpjvpp^q,vpeaq,vp,epva,pêv ngpjvpp^q,vpeaq,vp,epva,pêv ngpjvpp^q,vpeaq,vp,epva,pêv ngpjvpp^q,vpeaq,vp,epva,pêv '),
(22, 'test', 'Contenu test');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
