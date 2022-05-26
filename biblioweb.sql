-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 26 mai 2022 à 22:10
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
-- Base de données : `biblioweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastname` varchar(30) NOT NULL DEFAULT '',
  `firstname` varchar(30) NOT NULL DEFAULT '',
  `nationality` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `authors`
--

INSERT INTO `authors` (`id`, `lastname`, `firstname`, `nationality`) VALUES
(1, 'Simenon', 'Georges', 'Belgique'),
(2, 'Zola', 'Émile', 'France'),
(3, 'Clark', 'Marie-Higgins', 'Grande-Bretagne'),
(4, 'Dick', 'Philip K.', 'États-Unis'),
(5, 'Balzac', 'Honoré de', 'France'),
(7, 'Maupassant', 'Guy', 'France'),
(8, 'Dujardin', 'Cedric', 'Belgique'),
(9, 'Deneyer', 'Frank', 'Belgique'),
(10, 'Robin', 'Kere', 'France'),
(11, 'Nadia', 'Van houtryve', 'Belgique');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `ref` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `author_id` int(10) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `cover_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`ref`, `title`, `author_id`, `description`, `cover_url`) VALUES
(1, 'le php c\'est cool', 8, 'Bon, PHP… Entre ceux qui trouvent ça cool de dire que t’es naze (sans forcément savoir pourquoi) et ceux qui se demandent chaque année si t’es encore vivant : on est d’accord pour dire que ta cote de popularité n’est pas incroyable. Si on prend le clavier aujourd’hui, c’est pour se demander : pourquoi tant de haine dans le mot hannetonnant, mais surtout sur ce débat ? (ouais, faut la comprendre celle-là). Est-ce que ces critiques sont bien fondées, sont-elles encore d’actualité ? Et surtout : est-ce que PHP est encore utile ? ', NULL),
(3, 'Germinal', 2, 'Germinal est un roman d\'Émile Zola publié en 1885. Écrit d\'avril 1884 à janvier 1885, le treizième roman de la série des Rougon-Macquart paraît d\'abord en feuilleton entre novembre 1884 et février 1885 dans le Gil Blas, l\'année de la grande grève des mineurs d\'Anzin débutée le 2 mars 1884 et temps fort de l\'histoire du Bassin minier du Nord-Pas-de-Calais, où l\'auteur s\'est rendu pour inspirer l\'intrigue. Après sa première édition en mars 1885, le roman a été publié dans plus d\'une centaine de pays et adapté pour le cinéma et la télévision. ', NULL),
(4, 'Maigret et le voleur paresseux', 1, 'Une nuit, un homme est découvert, le crâne défoncé, au Bois de Boulogne. Le Parquet trouve sur les lieux Maigret que l\'inspecteur Fumel, du XVIe arrondissement, a cru bon d\'appeler, mais ces messieurs laissent entendre au commissaire qu\'il a d\'autres tâches à accomplir en un temps où les hold-up se multiplient. ', NULL),
(5, 'Un crime en Hollande', 1, 'Après une soirée donnée chez les Popinga en l\'honneur du professeur Jean Duclos venu faire une conférence à Delfzijl, Conrad Popinga a été tué d\'un coup de revolver. Maigret est envoyé dans la ville afin d\'enquêter sur le meurtre. Les suspects ne manquent pas : Duclos lui-même, qui a découvert bien vite l\'arme du crime ; Beetje Liewens, maîtresse de Conrad, revenue vers la maison des Popinga alors que son amant l\'avait reconduite chez elle ; l\'irascible fermier Liewens, qui avait appris la liaison de sa fille et la désapprouvait ', NULL),
(6, 'Le Chien Jaune', 1, 'À Concarneau, des faits troublants qui s’enchaînent jettent l’émoi. C’est d’abord la tentative d’assassinat dont est victime l’honorable M. Mostaguen, un soir au sortir de sa partie de cartes à l’Hôtel de l’Amiral : il reçoit au ventre une balle tirée de la boîte aux lettres d’une maison vide. Et le sort semble s’acharner sur ses partenaires, car, deux jours après l’arrivée du commissaire Maigret, l’un des habitués du café, un journaliste du nom de Jean Servières disparaît, et sa voiture est retrouvée dans les environs, le siège avant maculé de sang. Puis, c’est au tour de M. Le Pommeret, qui meurt empoisonné. Le quatrième du groupe, le docteur Michoux, qui s’attend à y passer aussi, n’en mène pas large, et Maigret le fait incarcérer pour le protéger. ', NULL),
(7, 'Maigret à la mer', 1, '\" C\'était merveilleux d\'être là, les yeux clos, de sentir les paupières picoter sous la caresse d\'un soleil filtré par les rideaux jaunes ; c\'était merveilleux surtout de se dire qu\'il était deux heures et demie, ou trois heures de l\'après-midi, peut-être plus, peut-être moins, et qu\'au surplus ce rongeur de l\'existence qu\'on appelle une montre n\'avait en l\'occurrence aucune importance.', NULL),
(8, 'La Danseuse du Gai-Moulin', 1, 'Deux jeunes noceurs endettés – un bourgeois désaxé et le fils d\'un employé – fréquentent à Liège « Le Gai-Moulin », une boîte de nuit où ils courtisent l\'entraîneuse Adèle. À la fin d\'une soirée qu\'elle a passée, à une table voisine des jeunes gens, en compagnie d\'un Levantin arrivé le jour même dans la ville, Delfosse et Chabot se laissent enfermer dans la cave de l\'établissement afin de s\'emparer de la recette. Dans l\'obscurité, ils entr\'aperçoivent ce qu\'ils croient être un cadavre, celui du Levantin ', NULL),
(9, 'Le Chat', 1, 'II avait lâché le journal, qui s\'était d\'abord déployé sur ses genoux puis qui avait glissé lentement avant d\'atterrir sur le parquet ciré.\nOn aurait cru qu\'il venait de s\'endormir si, de temps en temps, une mince fente ne s\'était dessinée entre ses paupières.\nEst-ce que sa femme était dupe ?\nElle tricotait, dans son fauteuil bas, de l\'autre côté du foyer. Elle n\'avait jamais l\'air de l\'observer, mais il savait depuis longtemps que rien ne lui.', NULL),
(10, 'Blade Runner', 4, 'Le développement du projet ainsi que le tournage du film sont difficiles. Les producteurs, peu satisfaits de la version du réalisateur, opèrent quelques changements, modifiant notamment la fin du film. À sa sortie, le film est un échec commercial aux États-Unis et est accueilli durement par la critique. Il remporte néanmoins trois BAFTA Awards ainsi que le prix Hugo et rencontre le succès dans le reste du monde. ', NULL),
(11, 'Minority Report', 4, 'Le film place le spectateur dans un futur proche cyberpunk, une dystopie dont le cadre se situe en 2054 à Washington D.C (États-Unis), où trois êtres humains mutants, les précogs, peuvent prédire les crimes à venir grâce à leur don de précognition. Grâce à ces visions du futur, la ville a réussi à éradiquer la criminalité et les agents de l\'organisation gouvernementale Précrime peuvent arrêter les criminels juste avant qu’ils ne commettent leurs méfaits. Mais un jour, le chef de l\'unité John Anderton reçoit des précogs une vision le concernant : dans moins de 36 heures, il aura assassiné un homme qu’il ne connaît pas encore et pour une raison qu’il ignore. Choqué, il prend la fuite, poursuivi par ses coéquipiers qui ont pour mission de l’arrêter ', NULL),
(12, 'Paycheck', 4, 'Seattle, dans un futur proche. Michael Jennings est un ingénieur spécialiste en rétro-ingénierie qui travaille sur des dossiers confidentiels et des techniques de pointe. Par contrat, sa mémoire est effacée après chaque mission et il oublie tout ce qui s\'est passé dans ce laps de temps. Il accepte un contrat de trois ans qui devrait lui permettre de gagner suffisamment d\'argent pour prendre sa retraite. Mais une fois sa mémoire effacée, il découvre qu\'il a renoncé à l\'argent en échange d\'une simple enveloppe contenant des objets dérisoires, et constate que le FBI et des tueurs privés sont à ses trousses. En cavale, il va essayer de reconstruire le puzzle des trois années écoulées. ', NULL),
(13, 'En attendant l\'année dernière', 4, 'Au milieu du XXIème siècle, Eric Sweetscent, chirurgien de talent, est spécialisé dans la transplantation d’organes, une tâche qu’il met moins de temps à effectuer qu’il ne faut pour le dire. Or, il se retrouve au chevet de Gino Molinari, hypochondriaque notable mais aussi et surtout secrétaire des Nations Unies, soit donc le chef de la planète Terre.Or il a conduit cette dernière à faire un pacte avec le peuple de Lillistar, en conflit depuis des siècles avec les R...', NULL),
(14, 'Le Crâne', 4, 'Premier des huit volumes de l\'intégrale des nouvelles de Philip K. Dick restées inédites en France ou devenues difficilement accessibles, Le Crâne comporte, présentés dans l\'ordre chronologique de parution,\nsept récits datant des années 1952-1953. On y voit déjà se dessiner certaines des composantes majeures de l\'œuvre future de Dick : le simulacre, comme dans cette \"Colonie\" peuplée d\'entités capables de simuler tous les objets inanimés contenus dans le vais...', NULL),
(15, 'LeHorla', 7, '8 mai. — Quelle journée admirable ! J\'ai passé toute la matinée étendu sur l\'herbe, devant ma maison, sous l\'énorme platane qui la couvre, l\'abrite et l\'ombrage tout entière. J\'aime ce pays, et j\'aime y vivre parce que j\'y ai mes racines, ces profondes et délicates racines, qui attachent un homme à la terre où sont nés et morts ses aïeux, qui l\'attachent à ce qu\'on pense et à ce qu\'on mange, aux usages comme aux nourritures, aux locutions locales, aux intonations de... ', NULL),
(16, 'Boule de Suif', 7, 'Boule de Suif, première nouvelle de cet ouvrage, c\'est l\'effondrement de toutes les valeurs prônées, avant que le souci de conservation personnelle devienne le seul qui compte : manger les provisions de la prostituée et la jeter dans les bras de l\'officier allemand.\nMarie-Claire Bancquart analyse les vingt et un contes de ce célèbre recueil. Des paysans avides et cruels décrits dans L\'Aveu et Coco aux malheurs de Mathilde Loisel dans La Parure, Maupassant us', NULL),
(17, 'Bel Ami', 7, 'Le monde est une mascarade où le succès va de préférence aux crapules. La réussite, les honneurs, les femmes et le pouvoir: le monde n\'a guère changé. On rencontre toujours - moins les moustaches - dans les salles de rédaction ou ailleurs, de ces jeunes aventuriers de l\'arrivisme et du sexe. Comme Flaubert, mais en riant, Maupassant disait de son personnage, l\'odieux Duroy : \" Bel-Ami, c\'est moi.\" Et pour le cynisme, la fureur sensuelle, l\'athéisme, la peur de l', NULL),
(18, 'L\'Assommoir', 2, 'Gervaise laissant derrière elle sa vie à Plassans a suivi à Paris son mari Auguste Lantier, arrivé à Paris Lantier devient infidèle et paresseux. Il quitte Gervaise pour Adèle, c\'est à cette époque que Coupeau décide de la courtiser. Le nouveau couple connaît une certaine prospérité grâce au travail et aux économies. La famille s\'agrandit grâce à l\'arrivée d\'une petite Anna surnommée Nana. Peu de temps après leur mariage, ils habiteront rue de la Goutte d\'Or, G', NULL),
(19, 'La Bête humaine', 2, 'La bête humaine, c\'est le conducteur de train Lantier, le fils de la pauvre Gervaise de L\'Assommoir et la victime d\'une folie homicide. S\'il désire une femme, un atroce désir de sang l\'étreint. La bête humaine, c\'est aussi sa locomotive à vapeur, la Lison, une puissante machine aimée et entretenue comme une maîtresse. Avec elle, il affronte une tempête de neige sur la ligne Paris-Le Havre et une effroyable catastrophe ferroviaire. C\'est Séverine aussi, une femme dou', NULL),
(20, 'Nana', 2, 'Nana est un roman d’Émile Zola d\'abord publié sous forme de feuilleton dans Le Voltaire du 16 octobre 1879 au 5 février 1880, puis en volume chez Georges Charpentier, le 14 février 18801. C\'est le neuvième volume de la série Les Rougon-Macquart. Cet ouvrage traite du thème de la prostitution féminine à travers le parcours d’une lorette puis cocotte dont les charmes ont affolé les plus hauts dignitaires du Second Empire. Le récit est présenté comme la suite de L\'Assommoir. ', NULL),
(21, 'Thérèse Raquin', 2, 'À vingt-sept ans, en 1867, Émile Zola ne s’est pas encore attaqué aux Rougon-Macquart, son œuvre géante. Comment s’imposer \"quand on a le malheur d’être né au confluent de Hugo et de Balzac\" ? Comment récrire La Comédie humaine après ce dernier ? Les grands créateurs sont parfois gênants pour ceux qui viennent après eux. Mais ses tâtonnements sont brefs. Thérèse Raquin, son premier grand roman, obtient un vif succès. ', NULL),
(22, 'Germinal', 2, 'Ce titre présente de larges extraits de cette oeuvre. L\'étude du thème est : Le travail : Plaute, La Déclaration universelle des droits de \'homme, J.de le Fontaine, V.Hugo, témoignages de J.Gonçalves Dias Un genre : Le roman * Programme de 3ème ', NULL),
(23, 'La Croisière de Noël', 3, 'Mary Higgins Clark et sa fille Carol vous accueillent à bord du Royal Mermaid.\nComme Alvirah Meehan et Regan Reilly, leurs héroïnes préférées, vous ne risquez pas d\'oublier cette croisière de Noël. Disparitions, menaces, détournements... Le voyage s\'annonce mouvementé !\n\nSens de l\'intrigue, rebondissements inattendus, humour : les deux reines du suspense vous souhaitent un Noël plein de frissons... ', NULL),
(27, 'les seigneurs', 9, 'Patrick Orbéra, ancien grand footballeur est désormais alcoolique. Après une agression sur un arbitre sur le plateau de Téléfoot, il est contraint par la justice de trouver un emploi stable. Il est recruté comme entraîneur sur la petite île de Molène en Bretagne. Les amateurs viennent de se qualifier pour le 7e tour de la coupe de France. Face à l\'amateurisme des joueurs, qui sont des employés de la conserverie locale, La Molénaise, menacée de fermeture, il décide de recruter ses anciens coéquipiers de l\'équipe de France pour continuer l\'aventure1 : Léandri veut monter une pièce de théâtre pour accepter de jouer, Ziani découvre qu\'il a encore des fans, Berda sort de prison et intègre l\'équipe pour échapper à ses anciens rivaux armés, Marandella quitte son nightclub à condition d\'être nommé avant-centre et plus gardien, Weké fait croire à sa femme qu\'il part en thalasso pour soigner ses problèmes cardiaques. ', NULL),
(29, 'L\'armée c\'est pour peler des patates', 9, 'pas pour tuer', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `loans`
--

CREATE TABLE `loans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `book_id`, `return_date`) VALUES
(30, 27, 11, '2022-05-21'),
(31, 27, 29, '2022-05-29'),
(32, 27, 1, '2022-05-21'),
(33, 24, 6, '2022-05-29'),
(34, 27, 5, '2022-05-31');

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `book_id` int(11) UNSIGNED NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `book_id`, `rating`) VALUES
(17, 27, 11, 9),
(18, 27, 29, NULL),
(19, 27, 1, 10),
(20, 24, 6, NULL),
(21, 27, 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `statut` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `statut`, `password`, `created_at`, `updated_at`) VALUES
(4, 'ced', 'ceruth@epfc.eu', 'novice', '$2y$10$2bQFIgRl2V/r4xX5xd8ge.gk98f8rpdBd0WlR7L6QKAxIugpr7qKe', '2007-06-21 00:00:00', NULL),
(23, 'jim', 'jim@sull.com', 'admin', '$2y$10$5F1s81rrBcJFtT5y47OlReFSwePxYSlScA7q15NsaK5P1zr13m9eW', '2020-04-24 13:39:03', NULL),
(24, 'bob', 'bob@sull.com', 'membre', '$2y$10$yg87ijlMw6POlXY2nPQg2ObpWjoh/Bake5UzpQOKWAm4YaQZyWG/C', '2021-04-23 16:38:03', NULL),
(25, 'fred', 'fred@sull.com', 'admin', '$2y$10$5F1s81rrBcJFtT5y47OlReFSwePxYSlScA7q15NsaK5P1zr13m9eW', '2021-04-23 16:51:51', NULL),
(26, 'clark', 'cla@sull.com', 'novice', '$2y$10$5F1s81rrBcJFtT5y47OlReFSwePxYSlScA7q15NsaK5P1zr13m9eW', '2021-04-23 16:54:15', NULL),
(27, 'lara', 'lara@sull.com', 'membre', '$2y$10$yg87ijlMw6POlXY2nPQg2ObpWjoh/Bake5UzpQOKWAm4YaQZyWG/C', '2021-04-23 17:02:48', NULL),
(28, 'kaneda', 'link@sull.com', 'admin', '$2y$10$yg87ijlMw6POlXY2nPQg2ObpWjoh/Bake5UzpQOKWAm4YaQZyWG/C', '2021-05-14 14:19:24', NULL),
(29, 'tetsuo', 'tetsuo@gmail.com', 'novice', '$2y$10$yg87ijlMw6POlXY2nPQg2ObpWjoh/Bake5UzpQOKWAm4YaQZyWG/C', '2022-05-17 10:51:20', '2022-05-17 10:50:43'),
(30, 'hubert', 'hubert@gmail.com', 'membre', '$2y$10$QZQSBR3rV57ig0IuX6U4juSBzbygN5WTyrNIhBuYHIcgYdVY0xlxG', '2022-05-23 16:37:16', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ref`),
  ADD KEY `titre` (`title`),
  ADD KEY `auteur_id` (`author_id`);

--
-- Index pour la table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `nom` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `ref` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`ref`) ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`ref`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
