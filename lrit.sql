-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 05 nov. 2018 à 21:10
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lrit`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu_ville` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu_pays` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conference` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `journal` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ISSN` int(11) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `mois` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `doi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membres_ext` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposer` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `type`, `titre`, `resume`, `lieu_ville`, `lieu_pays`, `conference`, `journal`, `ISSN`, `ISBN`, `mois`, `annee`, `doi`, `membres_ext`, `detail`, `deposer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Publication(Revue)', 'Social Recommender Approach for Technology Enhanced Learning', 'Social Recommender Approach for Technology Enhanced Learning, International Journal of Learning Technlogy, In Press, Inderscience', 'paris', 'France', NULL, 'International Journal of Learning Technlogy', NULL, NULL, 'Mai', 2018, NULL, 'K. Sehaba, S. Georges,  K. Bouamrane', NULL, 1, '2018-05-08 09:54:16', '2018-05-08 09:54:16', NULL),
(2, 'Chapitre d\'un livre', 'A Reference Model for Educational Adaptive Web Applications', 'A Reference Model for Educational Adaptive Web Applications. in Intelligent and Adaptive Educational-Learning Systems, Springer Berlin Heidelberg', 'Berlin', 'Allemagne', NULL, NULL, NULL, NULL, 'avril', 2013, NULL, 'K. Bouamrane', NULL, 17, '2018-05-08 10:02:48', '2018-05-08 10:37:58', NULL),
(3, 'Article long', 'Approche pour la recommandation de ressources pédagogiques basée sur les liens sociaux', 'Approche pour la recommandation de ressources pédagogiques basée sur les liens sociaux, EIAH 2015', 'Agadir', 'Maroc', 'EIAH 2015', NULL, NULL, NULL, 'Janvier', 2015, NULL, 'S. Georges, K. Sehaba', NULL, 17, '2018-05-08 10:09:10', '2018-05-08 10:09:10', NULL),
(4, 'Article court', 'Recommandation de ressources pédagogiques basée sur les relations sociales', 'Recommandation de ressources pédagogiques basée sur les relations sociales', 'Rochelle', 'France', 'RJCEIAH', NULL, NULL, NULL, 'Decembre', 2014, NULL, NULL, NULL, 17, '2018-05-08 10:13:19', '2018-05-08 10:13:19', NULL),
(6, 'Poster', 'Recommandation de ressources pédagogiques dans les réseaux sociaux en ligne,', 'Recommandation de ressources pédagogiques dans les réseaux sociaux en ligne,', 'Chambéry', ', France.', NULL, NULL, NULL, NULL, 'Mai', 2014, NULL, NULL, NULL, 1, '2018-05-09 05:13:27', '2018-05-09 05:13:27', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `article_user`
--

CREATE TABLE `article_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article_user`
--

INSERT INTO `article_user` (`id`, `user_id`, `article_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '2018-05-08 09:54:16', '2018-05-08 09:54:16'),
(8, 10, 2, '2018-05-08 10:38:00', '2018-05-08 10:38:00'),
(10, 10, 6, '2018-05-09 05:13:27', '2018-05-09 05:13:27'),
(11, 22, 6, '2018-05-09 05:13:27', '2018-05-09 05:13:27');

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `chef_id` int(10) UNSIGNED DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achronymes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `axes_recherche` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`id`, `chef_id`, `intitule`, `resume`, `achronymes`, `axes_recherche`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'EQUIPE SYSTÈMES COMMUNICANTS', 'La maitrise des systèmes d’informations, peut servir à développer certains services des réseaux comme le e-learning, la vente en ligne et la pertinence dans la recherche d’informations sur le web, entre autre la composition de services web, L\'équipe travaille aussi sur les antennes et leur performance qui va améliorer les performances en termes de débits des réseaux sans fil en optimisant la couche transmission.', 'ESC', NULL, '2018-05-02 17:24:49', '2018-05-09 04:59:29', '2018-05-09 06:59:29'),
(2, 10, 'Système d\'information et connaissance', 'Dans les nouveaux contextes de traitement de l’information les données numériques sont devenues souvent:\r\n \r\n \r\nhétérogènes\r\nnon ou partiellement structurées\r\nvolumineuses\r\ndistribuées/réparties\r\ncréées en flux continue et rapide\r\n \r\n\r\n \r\nIl est devenu impératif de disposer de nouveaux modèles de:\r\n \r\nreprésentation,\r\ntransformation,\r\nrecherche,\r\nrecommandation,\r\néchange,\r\nsécurité,\r\nvisualisation\r\ninterprétation des données,\r\nqui soient appropriés à ces spécificités.', 'sidk', NULL, '2018-05-03 07:50:13', '2018-05-09 04:58:21', NULL),
(3, 18, 'Réseau, services distribués et systèmes', '• formation sur l\'administration réseau (installation et configuration de tous les serveurs)\r\n• déploiement de réseaux\r\n• développement d\'applications réseaux\r\n• vidéosurveillance via un réseau wifi mesh\r\n• création, hébergement et maintenance de sites web\r\n• sécurisation d\'un réseau wifi avec un serveur d\'authentification radius professionnel pour les entreprises et les facultés\r\n• formation et déploiement d\'une solution de téléphonie sur ip utilisant l\'ipabx asterisk', 'RSDS', NULL, '2018-05-08 10:48:44', '2018-05-08 11:06:32', NULL),
(4, 3, 'Ingénierie logicielle sécurisée', 'Omniprésence des systèmes informatiques dans la vie quotidienne\r\nSystèmes critiques : vérification du bon fonctionnement\r\n \r\nComplexité croissante des systèmes:\r\n-Conception et vérification complexes\r\n-Coûts et délais non maîtrisés\r\n \r\nIngénierie des exigences:\r\n-Modèles et langages pour la spécification des exigences\r\n-Méthodes et techniques pour valider et vérifier les exigences\r\n-Outils pour supporter la gestion traçabilité des exigences\r\n\r\nvérification & Validation\r\n-Paradigme de correction par construction  \r\n-Combiner les différentes techniques de vérifications et de tests\r\n-Outils pour (semi-)automatiser le processus de vérification & validation', 'ILS', NULL, '2018-05-08 11:11:11', '2018-05-08 11:17:26', '2018-05-08 13:17:26'),
(5, 21, 'Ingénierie logicielle sécurisée', 'Omniprésence des systèmes informatiques dans la vie quotidienne\r\nSystèmes critiques : vérification du bon fonctionnement\r\nComplexité croissante des systèmes:\r\n-Conception et vérification complexes\r\n-Coûts et délais non maîtrisés\r\nIngénierie des exigences:\r\n-Modèles et langages pour la spécification des exigences\r\n-Méthodes et techniques pour valider et vérifier les exigences\r\n-Outils pour supporter la gestion traçabilité des exigences\r\nvérification & Validation\r\n-Paradigme de correction par construction  \r\n-Combiner les différentes techniques de vérifications et de tests\r\n-Outils pour (semi-)automatiser le processus de vérification & validation', 'ILS', NULL, '2018-05-09 04:57:25', '2018-05-09 04:57:25', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(49, '2014_10_12_000000_create_users_table', 1),
(50, '2014_10_12_100000_create_password_resets_table', 1),
(51, '2018_04_08_211322_create_theses_table', 1),
(52, '2018_04_09_204533_add_column_deleted_at_theses', 1),
(53, '2018_04_09_210401_create_articles_table', 1),
(54, '2018_04_10_085223_add_column_deleted_at_articles', 1),
(55, '2018_04_13_163654_add_column_user_id', 1),
(56, '2018_04_14_084232_create_equipes_table', 1),
(57, '2018_04_14_084802_add_column_chef_id_equipes', 1),
(58, '2018_04_14_111044_create_projets_table', 1),
(59, '2018_04_14_111310_add_column_chef_id_projets', 1),
(60, '2018_04_15_092724_add_column_deleted_at_projets', 1),
(61, '2018_04_17_174505_add_column_equipe_id', 1),
(62, '2018_04_17_193937_add_column_deleted_at_equipes', 1),
(63, '2018_04_18_181942_create_article_user_table', 1),
(64, '2018_04_19_103337_create_roles_table', 1),
(65, '2018_04_19_103507_create_addcolumn_roleid_to_users_table', 1),
(66, '2018_04_21_111858_create_projet_users_table', 1),
(67, '2018_04_23_200122_create_paremetres_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

CREATE TABLE `parametres` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parametres`
--

INSERT INTO `parametres` (`id`, `nom`, `logo`, `created_at`, `updated_at`) VALUES
(1, NULL, '/uploads/photo/1525782794.png', '2018-05-07 14:38:36', '2018-05-08 10:33:14'),
(2, 'LRIT', '/uploads/photo/1525711253.png', '2018-05-07 14:40:53', '2018-05-07 14:40:53');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$9BjBqBK1Tb0Uad9vgLsvO.1a0et51bw9ChxbrT8NKiXWLveuJZtaS', '2018-05-02 16:46:19'),
('chikh@azeddine.com', '$2y$10$EgrKUNHokdw.jLFcYJ2vPuGJ1PNaoW8m4bjMsQAioDhZaUhA5mCnu', '2018-05-06 16:01:06'),
('mtadlaoui@hotmail.com', '$2y$10$O5nVLBhfFN.fCyzwWU3o..e8etmTIAsNmoOvuPPBENRYhvnaLf636', '2018-05-08 15:21:07'),
('trari.ahlem@gmail.com', '$2y$10$z10WdTsO4CbWc8MFuHyFJeg0wDqkeR8eK/v3/cdj.vciiR8yRWUIi', '2018-05-08 19:04:40'),
('ferielbrikci96@gmail.com', '$2y$10$qsel97ukIybaU8NIWnXdH.ZJDpdO1SfaLmLEigCWWX4rIm4jAeKNW', '2018-05-08 19:07:31');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` int(10) UNSIGNED NOT NULL,
  `chef_id` int(10) UNSIGNED DEFAULT NULL,
  `intitule` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partenaires` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `chef_id`, `intitule`, `resume`, `type`, `partenaires`, `lien`, `detail`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'la télésurveillance via un réseau wifi mesh', 'la télésurveillance via un réseau wifi mesh', 'Article long', NULL, 'https://mail.google.com/mail/u/0/#sent/15ca6f0fc20d43f6', '/uploads/projet/1525785953.pdf', '2018-05-08 11:25:53', '2018-05-08 11:25:53', NULL),
(2, 18, 'la QOSd\'un lien satellite pour l\'accès internet', 'la QOSd\'un lien satellite pour l\'accès internet\r\n• un projet cnepru déposé au niveau de la dgrsdt et en attente de réponse', 'Livre', 'LRIT', 'https://mail.google.com/mail/u/0/#sent/15ca6f0fc20d43f6', '/uploads/projet/1525786052.pdf', '2018-05-08 11:27:32', '2018-05-08 11:27:32', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `projet_user`
--

CREATE TABLE `projet_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `projet_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projet_user`
--

INSERT INTO `projet_user` (`id`, `user_id`, `projet_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-05-08 11:25:53', '2018-05-08 11:25:53'),
(2, 3, 1, '2018-05-08 11:25:53', '2018-05-08 11:25:53'),
(3, 7, 1, '2018-05-08 11:25:53', '2018-05-08 11:25:53'),
(4, 2, 2, '2018-05-08 11:27:33', '2018-05-08 11:27:33'),
(5, 16, 2, '2018-05-08 11:27:35', '2018-05-08 11:27:35'),
(7, 18, 2, '2018-05-08 11:27:38', '2018-05-08 11:27:38'),
(8, 19, 2, '2018-05-08 11:27:38', '2018-05-08 11:27:38'),
(9, 20, 2, '2018-05-08 11:27:38', '2018-05-08 11:27:38');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'membre', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `theses`
--

CREATE TABLE `theses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `titre` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sujet` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mots_cle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_soutenance` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encadreur_int` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encadreur_ext` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coencadreur_int` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coencadreur_ext` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membre` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `theses`
--

INSERT INTO `theses` (`id`, `user_id`, `titre`, `sujet`, `mots_cle`, `date_debut`, `date_soutenance`, `encadreur_int`, `detail`, `encadreur_ext`, `coencadreur_int`, `coencadreur_ext`, `membre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 22, 'QOS des réseaux mesh', 'QOS des réseaux mesh', NULL, '05/02/2015', NULL, 'MEKKIOUI Zahera', NULL, NULL, NULL, 'belkassem said', NULL, '2018-05-03 08:27:39', '2018-05-08 11:32:34', NULL),
(3, 20, 'la QOS dans les réseaux manet', 'la QOS dans les réseaux manet', NULL, '05/02/2017', NULL, 'BRIXI NIGASSA Amine', '/uploads/these/1525785786.pdf', NULL, 'SMAHI Ismail', NULL, NULL, '2018-05-08 11:23:06', '2018-05-08 11:23:06', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `equipe_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autorisation_public_num_tel` tinyint(1) DEFAULT '0',
  `autorisation_public_photo` tinyint(1) DEFAULT '0',
  `autorisation_public_date_naiss` tinyint(1) DEFAULT '0',
  `lien_rg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `equipe_id`, `name`, `prenom`, `email`, `photo`, `date_naissance`, `grade`, `password`, `num_tel`, `autorisation_public_num_tel`, `autorisation_public_photo`, `autorisation_public_date_naiss`, `lien_rg`, `lien_linkedin`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 2, 'Admin', 'Admin', 'admin@admin.com', 'uploads/photo/1523947924.png', '1996-01-25', 'MAA', '$2y$10$wDQFvH5R85z3pIA6gFhwsuE8Wxu2KiF9avUKmKhJz4YkczSubkFYG', '0541526396', 0, 0, 0, NULL, NULL, 'ieKQbuKNAkJmjv6wEn5hmG3PiSBg3RgSvPhhp6AJFwf02jf8uOYMX0C1tY5A', '2018-04-30 16:29:22', '2018-04-30 16:29:22', 1),
(2, 1, 'MEKKIOUI', 'Zahera', 'mekkioui@zahera.com', 'uploads/photo/userDefault.png', '03/06/1972', 'Professeur', '$2y$10$p1jpG36vYZ4j8u7r.l6b4uM8Oi.dSH6E6LZK.fzoVNK2W2JkFDjZm', '(055) 632-9863', NULL, NULL, NULL, NULL, 'https://fr.linkedin.com/', 'w7578jNh8HzzYOQjF1nQxRJhBDRNgShkeLHRIDalKgs33wShUsflpqepXEx7', '2018-05-02 17:37:52', '2018-05-02 18:03:13', 2),
(3, 1, 'SMAHI', 'Ismail', 'smahi@ismail.com', 'uploads/photo/userDefault.png', '05/01/1976', 'MAA', '$2y$10$lYKy0vR6ZY5qOijusjBZjuI7cwhE7250U0YOszBst0MMFsumjNYlm', '(077) 961-2855', NULL, NULL, NULL, NULL, NULL, 'YiuxFb54aGEnFODjPbowByKMdOQ1D1LX7ar1SdQcUYEhUCDNaAvoHd7cXeM5', '2018-05-02 17:41:09', '2018-05-03 07:27:08', 1),
(4, 1, 'BRIXI NIGASSA', 'Amine', 'brixinigassa@amine.com', 'uploads/photo/userDefault.png', '02/04/1965', 'MAB', '$2y$10$mowWYy77AyLMNotZAPKNQORwjHBQgwiiFyTOdSJBMtZYuhbBLX1GS', '(066) 958-3242', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-02 17:46:25', '2018-05-03 09:05:07', 2),
(5, 1, 'CHAOUCH REMDANE', 'lAMIA', 'chaouchremdane@lamia.com', 'uploads/photo/userDefault.png', '08/03/1973', 'MAA', '$2y$10$jQSXvwUd41Ta6R/D9l10z.bh7bCMMgECpW2Er7SoaoGNfXN5Yjs/C', '(055) 219-9635', 0, 0, 0, 'https://www.google.dz/search?q=researchgate&oq=research&aqs=chrome.1.69i57j0j35i39l2j0l2.5052j1j7&sourceid=chrome&ie=UTF-8', 'https://fr.slideshare.net', NULL, '2018-05-03 07:32:24', '2018-05-03 07:32:24', 2),
(7, 1, 'KHITRI', 'Souad', 'khitri@souad.com', 'uploads/photo/userDefault.png', '05/08/1970', 'MAA', '$2y$10$3fHbMuf9zawey.H27n4VZuHJ.zRy7iObqQh3tfujmwtU2HkvzzorW', '(012) 365-4789', 0, 0, 0, NULL, NULL, NULL, '2018-05-03 07:35:53', '2018-05-03 07:35:53', 2),
(8, 1, 'MERAD BOUDIA', 'Djalal', 'meradboudia@djalal.com', 'uploads/photo/userDefault.png', '05/01/1970', 'MAA', '$2y$10$5wgscXFdZqe12zUi3G83putV2jcIjqYaGaDEjEBBwwTxzYtPNZKJO', '(023) 698-5477', 0, NULL, 0, NULL, NULL, NULL, '2018-05-03 07:40:34', '2018-05-03 07:40:34', 2),
(9, 1, 'ETCHIALI', 'Abdelhak', 'etchiali@abdelhak.com', 'uploads/photo/img2.jpg', '05/01/1980', 'MAA', '$2y$10$kdv08t1w5luoun9tWWIANOFJUHNpW78xoFQatv1fm8u1MMvOcVoo.', '(012) 365-4789', 0, NULL, 0, NULL, NULL, NULL, '2018-05-03 07:42:23', '2018-05-03 07:42:23', 2),
(10, 2, 'CHIKH', 'Azeddine', 'chikh@azeddine.com', 'uploads/photo/1525341298.jpg', '12/12/1956', 'Professeur', '$2y$10$jrgJd..tJZwp54jVY7cM8uDNX2AqUbQM2nuBmj22.OHe/icUhodr2', '(012) 365-4782', 0, NULL, NULL, NULL, NULL, 'y7wmJIREUKJlHXjhlE2TnnNob7aFBksZGujWOSxyXHJo11hzAHpGhv8UcCPR', '2018-05-03 07:54:59', '2018-05-03 09:16:04', 2),
(11, 2, 'MAHFOUD', 'Houari', 'mahfouf@houari.com', 'uploads/photo/userDefault.png', '05/01/1969', 'MCA', '$2y$10$waXrpjmQAq/igaqOLQHyQu3vU/y1BLCBWx9UEFzzMWEsrWvnDEhyW', '(012) 369-6969', 0, NULL, 0, NULL, NULL, NULL, '2018-05-03 08:01:55', '2018-05-03 08:01:55', 2),
(12, 2, 'ELYEBDRI', 'Zeyneb', 'elyebdri@zeyneb.com', 'uploads/photo/userDefault.png', '08/03/1973', 'MAA', '$2y$10$2XW.9qkcIsR6a2h2nY68JeFmhXEpYjmDe7mmWXjkX28bCsq0gQdzG', '(012) 587-4936', 0, NULL, 0, NULL, NULL, NULL, '2018-05-03 08:03:44', '2018-05-03 08:03:44', 2),
(13, 2, 'ILES', 'Nawel', 'iles@nawel.com', 'uploads/photo/userDefault.png', '12/12/1969', 'MAB', '$2y$10$o/L8EjG5jOpii6Ih1vLTme7zuJSuyHzkkT1XGY9I/5eMs9p/LhLv.', '(055) 542-9632', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-03 08:05:41', '2018-05-03 08:05:41', 2),
(14, 2, 'KARA TERKI', 'Hadjira', 'karaterki@hadjira.com', 'uploads/photo/userDefault.png', '05/01/1970', 'MAA', '$2y$10$BVJvIYSbopKTCh/jy/iDbOwGtTS3aN5jW3TBp5rVuj/Z7iNQwjVEy', '(055) 542-3169', 0, NULL, NULL, NULL, NULL, NULL, '2018-05-03 08:07:51', '2018-05-03 08:07:51', 2),
(15, 2, 'MATALLAH', 'Houcine', 'matallah@houcine.com', 'uploads/photo/userDefault.png', '05/01/1963', 'MAB', '$2y$10$8/jmqUehqdrG09PX0NTVZu7ZC4o/3JF1.PuGx0qbhYTQRtHmFm9pm', '(054) 226-8256', 0, NULL, 0, NULL, NULL, NULL, '2018-05-03 08:10:58', '2018-05-03 08:10:58', 2),
(16, 1, 'BENMOUSSAT', 'Chems Eddine', 'benmoussat@chemseddine.com', 'uploads/photo/userDefault.png', '05/01/1980', 'Doctorant', '$2y$10$Wix1gRO/vmmsLXDgc38gKOY9xz9.2r7AzVJVY3uUJqA1DHlORbptK', '(043) 629-6852', NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-03 08:24:12', '2018-05-06 08:27:20', 2),
(18, 3, 'DIDI', 'Fedoua', 'didi@fedoua.com', 'uploads/photo/1525783964.gif', '05/02/1970', 'MCA', '$2y$10$SK08b5FVriY3ZbmCx3XiU.../hdo1vTHqooXZMpYv9cyIweLhddny', '(055) 543-2698', 0, NULL, 0, NULL, NULL, NULL, '2018-05-08 10:52:44', '2018-05-08 10:52:44', 2),
(19, 3, 'MANA', 'Mohamed', 'mana@mohamed.com', 'uploads/photo/userDefault.png', '12/12/1970', 'MCA', '$2y$10$OWUFM23uVs.uPhQ06D5aD.CsABlysk9anrrIveNifbsoLw1kFr6qu', '(055) 582-3164', 0, NULL, 0, NULL, NULL, NULL, '2018-05-08 11:04:32', '2018-05-08 11:04:32', 2),
(20, 3, 'BAMBRIK', 'Ilies', 'bambrik@ilies.com', 'uploads/photo/userDefault.png', '09/06/1990', 'Doctorant', '$2y$10$XN6sQa2Zb3UPXrn81GgTE.poOTCs.3W6NZFvY0Bh1CddaQeXXmSXW', NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-05-08 11:06:10', '2018-05-08 11:06:10', 2),
(21, 4, 'MESSABIHI', 'Mohamed', 'messabihi@mohamed.com', 'uploads/photo/1525785364.png', '09/01/1980', 'Professeur', '$2y$10$JZRRO1Mmsg184Fhgvvd6tuUt9MkDRtkr4pQ9ZFv8.oJhZoaKxADoq', '(077) 014-1363', 0, NULL, 0, NULL, NULL, NULL, '2018-05-08 11:16:04', '2018-05-08 11:16:04', 2),
(22, 2, 'TADLAOUI', 'Mohamed', 'mtadlaoui@hotmail.com', 'uploads/photo/1525800390.jpg', '04/08/1985', 'MCA', '$2y$10$X6kwpAgHJ1Q/kNFuYZMhTOd7Wg0pn1Hi0gcQeADy5HW6.AcMGJYge', '(077) 965-3214', NULL, NULL, NULL, NULL, 'https://www.linkedin.com/in/mohammedtadlaoui/', 'w17nsW0aq4VpeJOKwZhNEOZ3HATQaPYN6sC88Q5Qw5fHzuKSsyKKwR1MJB5F', '2018-05-08 15:26:30', '2018-05-09 05:02:44', 2),
(23, 3, 'TRARI', 'ahlem', 'ferielbrikci96@gmail.com', 'uploads/photo/1525813432.png', NULL, 'Doctorant', '$2y$10$xEFwjzSnjYehdQuTs5cbuuCXG/QY3aE2UrnMX9MiGfIm04rzQHyIC', NULL, NULL, NULL, NULL, NULL, NULL, 'IdkpRqhxnCnBW8BXxRmI3dP2dcpc6T66fSSw1BvHcVx9gGL4YOfy77UJhMel', '2018-05-08 19:03:53', '2018-05-08 19:07:02', 2),
(24, 5, 'Selaadi', 'yasamine', 'seladji@yasmine.com', 'uploads/photo/1525849492.jpg', '12/02/1990', 'MCB', '$2y$10$aeeKR3vLo0src3g4GH1pEONn.dUFwA7KQeNdm1VwehczyWRli61Pi', '(012) 579-9335', NULL, NULL, 0, NULL, NULL, NULL, '2018-05-09 05:04:52', '2018-05-09 05:04:52', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_user`
--
ALTER TABLE `article_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_user_user_id_foreign` (`user_id`),
  ADD KEY `article_user_article_id_foreign` (`article_id`);

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipes_chef_id_foreign` (`chef_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projets_chef_id_foreign` (`chef_id`);

--
-- Index pour la table `projet_user`
--
ALTER TABLE `projet_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projet_user_user_id_foreign` (`user_id`),
  ADD KEY `projet_user_projet_id_foreign` (`projet_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `theses`
--
ALTER TABLE `theses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theses_user_id_foreign` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_equipe_id_foreign` (`equipe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `article_user`
--
ALTER TABLE `article_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `projet_user`
--
ALTER TABLE `projet_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `theses`
--
ALTER TABLE `theses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article_user`
--
ALTER TABLE `article_user`
  ADD CONSTRAINT `article_user_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD CONSTRAINT `equipes_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `projet_user`
--
ALTER TABLE `projet_user`
  ADD CONSTRAINT `projet_user_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projet_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `theses`
--
ALTER TABLE `theses`
  ADD CONSTRAINT `theses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_equipe_id_foreign` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
