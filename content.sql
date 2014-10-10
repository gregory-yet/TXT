-- Importer ce fichier dans la base de données txt

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `txt`
--

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
`id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `content`
--

INSERT INTO `content` (`id`, `uid`, `user`, `titre`, `contenu`) VALUES
(15, '26160b75', 'wayz', 'Salut', 'Comment Ã§a\r\nva ? :)');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `content`
--
ALTER TABLE `content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;