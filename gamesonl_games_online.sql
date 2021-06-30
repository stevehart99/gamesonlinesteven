-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2021 at 12:56 PM
-- Server version: 10.3.29-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamesonl_games_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `id` int(11) NOT NULL,
  `username` varchar(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id` int(11) NOT NULL,
  `ulasan` float NOT NULL,
  `rating` float NOT NULL,
  `violance` float NOT NULL,
  `download` int(11) NOT NULL,
  `size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id`, `ulasan`, `rating`, `violance`, `download`, `size`) VALUES
(1, 8, 8, 7, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `nama`, `gambar`) VALUES
(1, 'Garena Free Fire-New', 'freefire.jpg'),
(2, 'Minecraft', 'main.jpg'),
(3, 'Mobile Legends: Bang Bang', 'ml.jpg'),
(4, 'Hitman Sniper', 'hitman.jpg'),
(5, 'Save The Girl', 'save.jpg'),
(6, 'RFS-Real Flight Simulator', 'rfs.jpg'),
(7, 'The Sims Mobile', 'sims.jpg'),
(8, 'Brain Out', 'brain.jpg'),
(9, 'Among Us', 'amongus.jpg'),
(10, 'Call of Duty: Mobile - Garena', 'codm.jpg'),
(11, 'Subway Surfers', 'subway.jpg'),
(12, 'League of Legends: Wild Rift', 'lol.png'),
(13, 'Join Clash 3D', 'joinclash.jpg'),
(14, 'Sushi Roll 3D - Cooking ASMR Game', 'sushi.jpg'),
(15, 'Zona Cacing.io - Ulang Rakus', 'cacing.jpg'),
(16, 'Imposter Solo Kill', 'impos.jpg'),
(17, 'Stickman Party: 1 2 3 4 Permainan Gratis', 'stick.jpg'),
(18, 'Tiles Hop: EDM Rush!', 'tiles.jpg'),
(19, 'Hitmasters', 'hit.jpg'),
(20, '8 Ball Pool', '8.png'),
(21, 'Candy Crush Saga', 'candy.jpg'),
(22, 'Clash of Clans', 'coc.jpg'),
(23, 'Lords Mobile', 'lords.jpg'),
(24, 'Clash Royale', 'royale.jpg'),
(25, 'Hay Day', 'hay.png'),
(26, 'Shadow Fight 2', 'shadow.png'),
(27, 'Life After', 'life.png'),
(28, 'PUBG MOBILE', 'pubg.jpg'),
(29, 'Vector', 'vector.jpg'),
(30, 'Ludo King', 'ludo.jpg'),
(31, 'Stumble Guys: Multiplayer Royale', 'stumbel.png'),
(37, 'Granny house', 'grannyhouse.png'),
(38, 'Real Racing 3', 'realracing3.png'),
(39, 'Hide Online - Hunters vs Props', 'hideonline.png'),
(40, '2 Player games : the Challenge', '2playergame.jpg'),
(41, 'Glow Hockey 2', 'glowhockey2.jpg'),
(42, 'BombSquad', 'BombSquad.png'),
(43, 'Crash Bandicoot: On the Run!', 'CrashBandicootOntheRun.jpg'),
(44, 'Devil Amongst Us! Permainan Deduksi Sosial!', 'Devil Amongst Us Permainan Deduksi Sosial.jpg'),
(45, 'SUP Multiplayer Racing', 'SUP Multiplayer Racing.jpg'),
(46, 'Crash of Cars', 'Crash of Cars.png'),
(47, 'SusuChoco', 'SusuChoco.png'),
(48, 'NARUTO X BORUTO NINJA VOLTAGE', 'NARUTO X BORUTO NINJA VOLTAGE.png'),
(49, 'DUAL!', 'DUAL.png'),
(50, 'War Ops: Penembak Multipemain Permainan', 'War OpsPenembak Multipemain Permainan.png'),
(51, 'Champion of the Fields', 'Champion of the Fields.jpg'),
(52, 'BADLAND', 'BADLAND.png'),
(53, 'Sweet Crossing: Snake.io', 'Sweet Crossing Snakeio.jpg'),
(54, 'Bowling King', 'bowling king.png'),
(55, 'Bingo Pop: Free Live Multiplayer Bingo Board Games', 'Bingo Pop Free.png'),
(56, 'Sword Art Online: Integral Factor', 'Sword Art Online Integral Factor.jpg'),
(57, 'CarX Drift Racing 2', 'CarX Drift Racing 2.png'),
(58, 'Questland: Turn Based RPG', 'Questland Turn Based RPG.jpg'),
(59, 'Gin Rummy - Card Games Online. Classic, Free, Fun!', 'rummy.jpg'),
(60, 'Tile Connect Master: Block Match Puzzle Game', 'Tile Connect Master Block Match Puzzle Game.jpg'),
(61, 'Drift Max Pro - Game Balapan Drifting Mobil', 'Drift Max Pro  Game Balapan Drifting Mobil.png'),
(62, 'Epic Conquest 2', 'Epic Conquest 2.jpg'),
(63, 'Them Bombs: co-op board gameplay with 2-4 friends', 'Them Bombs.jpg'),
(64, 'Bike Racing Multiplayer Games: New Dirt Bike Games', 'Bike Racing Multiplayer Games New Dirt Bike Games.'),
(65, 'The Walking Dead: Survivors', 'The Walking Dead Survivors.jpg'),
(66, 'Snake Rivals.io - Slithery Eater in Worm Battle', 'Snake Rivals.png'),
(67, 'Huntercraft', 'huntercraft.png'),
(68, 'RPG Toram Online - MMORPG', 'TORAM.png'),
(69, 'Tower Duel', 'download.jpg'),
(70, 'Rummikub', 'Rummikub.png'),
(71, 'Gaple-Domino QiuQiu Poker Capsa Ceme Game Online', 'gaple.png'),
(72, 'Wild Deuceus', 'Wild Deuceus.jpg'),
(73, 'Memories - Interactive Otome Stories', 'Memories  Interactive Otome Stories.jpg'),
(74, 'Schnapsen, 66, Sixty-Six - Free Card Game Online', 'schnapsen.png'),
(75, 'Guess the Flag - World Flags Quiz, Trivia Game', 'Guess the Fla.png'),
(76, 'FR Legends', 'FR Legends.png'),
(77, 'Quizify: Multiplayer General Knowledge Quiz Game', 'Quizify.png'),
(78, 'Bingo Holiday: Free Bingo Games', 'bingo holiday.png'),
(79, 'SGR Tour 2021 Free Cartoon Arcade Kart Racing Game', 'sgr tour.jpg'),
(80, 'Bingo Bash featuring MONOPOLY: Live Bingo Games', 'bingo bash.jpg'),
(81, 'Snakes and Ladders - Create &amp; Play - Free Boar', 'snakeladder.png'),
(82, 'Classic Ludo Master Online Multiplayer', 'ludomaster.png'),
(83, 'Sword Fantasy Online - Anime RPG Action MMO', 'swordfantasy.jpg'),
(84, 'War Robots. Pertempuran Multipemain Taktis 6v6', 'warrobot.jpg'),
(85, 'Brawl Stars', 'brawl.png'),
(86, 'Garena Contra Returns', 'contra.png'),
(87, 'Garena AOV: Mist Island', 'aov.png'),
(88, 'Honkai Impact 3', 'honkai.png'),
(89, 'MORTAL KOMBAT: The Ultimate Fighting Game!', 'MK.png'),
(90, 'World War Heroes: Game Perang', 'wwii.jpg'),
(91, 'Dragon Nest M-SEA', 'dragonnest.png'),
(92, 'ONE PIECE Bounty Rush', 'onepiece.png'),
(93, 'DRAGON BALL LEGENDS', 'dbz.png'),
(94, 'Modern Strike Online: Penembak', 'modernstrike.jpg'),
(95, 'Marvel Contest of Champions', 'marvel.png'),
(96, 'Legacy Of Discord (Warisan)', 'legacyofdiscord.jpg'),
(97, 'Dynasty Legends (Global)', 'dynasty.jpg'),
(98, 'LINE Rangers/Crayon Shincan tower defense RPG!', 'lineranger.jpg'),
(99, 'ROCKMAN X DiVE', 'rockman.png'),
(100, 'Hunt Royale', 'huntroyale.png'),
(101, 'Injustice 2', 'injustice.jpg'),
(103, 'Ultraman: Legend Of Heroes', 'ultraman.jpg'),
(104, 'Mario Kart Tour', 'mario.png'),
(105, 'GUNDAM BATTLE GUNPLA WARFARE', 'gundam.png'),
(106, 'Top War: Battle Game', 'top-war-battle-game.png'),
(107, 'Underdogs', 'underdogs.png'),
(108, 'Fall Run: Online Races', 'Fall Run.jpg'),
(109, 'Earth Protect Squad', 'Earth Protect Squad.png'),
(110, 'Badminton Legend', '1_badminton_legend.jpg'),
(111, 'Duel Otters', 'Duel Otters.png'),
(112, 'Soul Knight', 'Soul Knight.jpg'),
(113, 'Toy Warfare', 'Toy Warfare.png'),
(114, 'Cowhop', 'Cowhop.jpg'),
(115, 'WAR GOTY: Online Battle Royale', 'war goty.png'),
(116, 'Top Eleven 2021', 'Top Eleven 2021.jpg'),
(117, 'Universal Battle 2', 'Universal Battle 2.png'),
(118, 'Rise of Heroes: Three Kingdoms', 'Rise of Heroes.jpg'),
(119, 'Word Battle Multiplayer', 'Word Battle Multiplayer.jpg'),
(120, 'Standoff 2', 'Standoff 2.png'),
(121, 'Best Blocks - Free Block Puzzle Games', 'best blocks.png'),
(122, 'Stickman Penembakan 2 ', 'stickman2.png'),
(123, 'Legends of Runeterra', 'Legends of Runeterra.jpg'),
(124, 'Mist Forest', 'Mist Forest.png'),
(125, 'The Walking Zombie 2', 'The Walking Zombie 2.png'),
(126, 'Game Baru', 'bc3ba2417233fe3131c09fc068a4e311.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `datee2` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `sum`, `datee2`) VALUES
(1, 1, '2021-05-27'),
(2, 1, '2021-05-27'),
(3, 1, '2021-05-27'),
(4, 1, '2021-05-27'),
(5, 1, '2021-05-27'),
(6, 1, '2021-05-28'),
(7, 1, '2021-05-28'),
(8, 1, '2021-05-28'),
(9, 1, '2021-05-28'),
(10, 1, '2021-05-31'),
(11, 1, '2021-05-31'),
(12, 1, '2021-05-31'),
(13, 1, '2021-05-31'),
(14, 1, '2021-05-31'),
(15, 1, '2021-05-31'),
(16, 1, '2021-05-31'),
(17, 1, '2021-05-31'),
(18, 1, '2021-06-02'),
(19, 1, '2021-06-02'),
(20, 1, '2021-06-02'),
(21, 1, '2021-06-02'),
(22, 1, '2021-06-02'),
(23, 1, '2021-06-02'),
(24, 1, '2021-06-02'),
(25, 1, '2021-06-02'),
(26, 1, '2021-06-02'),
(27, 1, '2021-06-02'),
(28, 1, '2021-06-02'),
(29, 1, '2021-06-02'),
(30, 1, '2021-06-02'),
(31, 1, '2021-06-02'),
(32, 1, '2021-06-02'),
(33, 1, '2021-06-03'),
(34, 1, '2021-06-03'),
(35, 1, '2021-06-03'),
(36, 1, '2021-06-03'),
(37, 1, '2021-06-03'),
(38, 1, '2021-06-03'),
(39, 1, '2021-06-03'),
(40, 1, '2021-06-03'),
(41, 1, '2021-06-03'),
(42, 1, '2021-06-03'),
(43, 1, '2021-06-03'),
(44, 1, '2021-06-03'),
(45, 1, '2021-06-03'),
(46, 1, '2021-06-03'),
(47, 1, '2021-06-03'),
(48, 1, '2021-06-03'),
(49, 1, '2021-06-03'),
(50, 1, '2021-06-03'),
(51, 1, '2021-06-03'),
(52, 1, '2021-06-03'),
(53, 1, '2021-06-03'),
(54, 1, '2021-06-03'),
(55, 1, '2021-06-03'),
(56, 1, '2021-06-03'),
(57, 1, '2021-06-03'),
(58, 1, '2021-06-03'),
(59, 1, '2021-06-03'),
(60, 1, '2021-06-03'),
(61, 1, '2021-06-03'),
(62, 1, '2021-06-03'),
(63, 1, '2021-06-03'),
(64, 1, '2021-06-03'),
(65, 1, '2021-06-03'),
(66, 1, '2021-06-03'),
(67, 1, '2021-06-03'),
(68, 1, '2021-06-03'),
(69, 1, '2021-06-03'),
(70, 1, '2021-06-03'),
(71, 1, '2021-06-03'),
(72, 1, '2021-06-03'),
(73, 1, '2021-06-03'),
(74, 1, '2021-06-03'),
(75, 1, '2021-06-03'),
(76, 1, '2021-06-03'),
(77, 1, '2021-06-03'),
(78, 1, '2021-06-03'),
(79, 1, '2021-06-03'),
(80, 1, '2021-06-03'),
(81, 1, '2021-06-03'),
(82, 1, '2021-06-03'),
(83, 1, '2021-06-03'),
(84, 1, '2021-06-03'),
(85, 1, '2021-06-03'),
(86, 1, '2021-06-03'),
(87, 1, '2021-06-03'),
(88, 1, '2021-06-03'),
(89, 1, '2021-06-03'),
(90, 1, '2021-06-04'),
(91, 1, '2021-06-04'),
(92, 1, '2021-06-04'),
(93, 1, '2021-06-04'),
(94, 1, '2021-06-04'),
(95, 1, '2021-06-04'),
(96, 1, '2021-06-04'),
(97, 1, '2021-06-04'),
(98, 1, '2021-06-04'),
(99, 1, '2021-06-04'),
(100, 1, '2021-06-04'),
(101, 1, '2021-06-04'),
(102, 1, '2021-06-04'),
(103, 1, '2021-06-04'),
(104, 1, '2021-06-04'),
(105, 1, '2021-06-04'),
(106, 1, '2021-06-04'),
(107, 1, '2021-06-04'),
(108, 1, '2021-06-04'),
(109, 1, '2021-06-04'),
(110, 1, '2021-06-04'),
(111, 1, '2021-06-04'),
(112, 1, '2021-06-04'),
(113, 1, '2021-06-04'),
(114, 1, '2021-06-05'),
(115, 1, '2021-06-05'),
(116, 1, '2021-06-07'),
(117, 1, '2021-06-19'),
(118, 1, '2021-06-19'),
(119, 1, '2021-06-19'),
(120, 1, '2021-06-19'),
(121, 1, '2021-06-19'),
(122, 1, '2021-06-19'),
(123, 1, '2021-06-19'),
(124, 1, '2021-06-19'),
(125, 1, '2021-06-19'),
(126, 1, '2021-06-20'),
(127, 1, '2021-06-20'),
(128, 1, '2021-06-20'),
(129, 1, '2021-06-20'),
(130, 1, '2021-06-20'),
(131, 1, '2021-06-20'),
(132, 1, '2021-06-20'),
(133, 1, '2021-06-20'),
(134, 1, '2021-06-20'),
(135, 1, '2021-06-20'),
(136, 1, '2021-06-20'),
(137, 1, '2021-06-20'),
(138, 1, '2021-06-20'),
(139, 1, '2021-06-20'),
(140, 1, '2021-06-21'),
(141, 1, '2021-06-21'),
(142, 1, '2021-06-21'),
(143, 1, '2021-06-21'),
(144, 1, '2021-06-21'),
(145, 1, '2021-06-21'),
(146, 1, '2021-06-21'),
(147, 1, '2021-06-21'),
(148, 1, '2021-06-21'),
(149, 1, '2021-06-21'),
(150, 1, '2021-06-21'),
(151, 1, '2021-06-21'),
(152, 1, '2021-06-21'),
(153, 1, '2021-06-22'),
(154, 1, '2021-06-22'),
(155, 1, '2021-06-22'),
(156, 1, '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `ulasan` int(11) NOT NULL,
  `rating` float NOT NULL,
  `violance` float NOT NULL,
  `download` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `id_game` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `ulasan`, `rating`, `violance`, `download`, `size`, `id_game`) VALUES
(1, 83864762, 4.3, 12, 500000000, 677, 1),
(2, 2114048, 4, 7, 100000000, 121, 2),
(3, 26139503, 4.1, 7, 100000000, 99, 3),
(4, 850766, 4.4, 18, 10000000, 608, 4),
(5, 938148, 3.9, 7, 100000000, 148, 5),
(6, 92523, 4.3, 3, 1000000, 287, 6),
(7, 1379183, 4.2, 12, 50000000, 109, 7),
(8, 4361362, 4.4, 3, 100000000, 62, 8),
(9, 11641034, 3.4, 7, 100000000, 111, 9),
(10, 2584810, 4.2, 16, 10000000, 2200, 10),
(11, 35423619, 4.4, 7, 1000000000, 135, 11),
(12, 1153649, 4.1, 12, 10000000, 1800, 12),
(13, 1399076, 4.1, 7, 100000000, 64, 13),
(14, 214153, 4, 3, 50000000, 83, 14),
(15, 2010352, 4.3, 3, 100000000, 40, 15),
(16, 135458, 3.8, 16, 10000000, 55, 16),
(17, 868282, 4.4, 7, 450000000, 48, 17),
(18, 2344274, 4.3, 3, 100000000, 83, 18),
(19, 533525, 4.6, 12, 100000000, 89, 19),
(20, 21262786, 4.4, 12, 500000000, 63, 20),
(21, 31006359, 4.6, 3, 1000000000, 82, 21),
(22, 55473105, 4.5, 7, 500000000, 158, 22),
(23, 6373322, 4.3, 7, 100000000, 283, 23),
(24, 30690052, 4.2, 7, 100000000, 127, 24),
(25, 12013535, 4.4, 3, 100000000, 141, 25),
(26, 14135107, 4.6, 12, 100000000, 140, 26),
(27, 558202, 4, 12, 10000000, 2400, 27),
(28, 36432122, 4.3, 16, 100000000, 620, 28),
(29, 3387249, 4.3, 7, 100000000, 89, 29),
(30, 7148092, 4.3, 3, 500000000, 52, 30),
(31, 269532, 4.2, 3, 10000000, 58, 31),
(33, 269532, 4.1, 16, 5000000, 86, 37),
(34, 6630732, 4.3, 3, 100000000, 39, 38),
(35, 1280129, 4.4, 7, 50000000, 48, 39),
(36, 149304, 4.5, 3, 10000000, 20, 40),
(37, 431949, 4.2, 3, 50000000, 10, 41),
(38, 898633, 4.4, 12, 10000000, 74, 42),
(39, 680103, 4.4, 3, 10000000, 137, 43),
(40, 3427, 4.1, 3, 100000, 87, 44),
(41, 402084, 4.2, 3, 10000000, 92, 45),
(42, 416752, 4.3, 3, 10000000, 131, 46),
(43, 523609, 4.2, 12, 10000000, 77, 47),
(44, 789008, 4.1, 12, 10000000, 80, 48),
(45, 142334, 3.8, 3, 10000000, 13, 49),
(46, 3892, 3.8, 12, 500000, 124, 50),
(47, 126499, 4.5, 3, 1000000, 950, 51),
(48, 1583404, 4.5, 7, 100000000, 169, 52),
(49, 239363, 4.6, 3, 10000000, 71, 53),
(50, 2929894, 4.6, 12, 10000000, 37, 54),
(51, 260756, 4.5, 12, 10000000, 111, 55),
(52, 230172, 4.5, 7, 5000000, 69, 56),
(53, 298748, 4.5, 3, 10000000, 1600, 57),
(54, 370503, 4.8, 7, 1000000, 104, 58),
(55, 3983, 4.6, 3, 100000, 49, 59),
(56, 7476, 4.7, 3, 1000000, 30, 60),
(57, 1382534, 4.6, 3, 50000000, 360, 61),
(58, 41715, 4.6, 12, 500000, 133, 62),
(59, 66949, 4.6, 12, 1000000, 55, 63),
(60, 8481, 4.6, 7, 1000000, 43, 64),
(61, 110630, 4.7, 16, 1000000, 407, 65),
(62, 5, 4.8, 3, 500000, 40, 66),
(63, 6415, 4.6, 12, 100000, 35, 67),
(64, 899731, 4.5, 12, 10000000, 58, 68),
(65, 2011, 4, 7, 100000, 110, 69),
(66, 168056, 4.6, 3, 5000000, 75, 70),
(67, 252989, 4.6, 12, 5000000, 115, 71),
(68, 10, 4.6, 3, 500, 31, 72),
(69, 47921, 4.5, 12, 1000000, 112, 73),
(70, 26911, 4.6, 12, 1000000, 39, 74),
(71, 41, 4.7, 3, 1000, 32, 75),
(72, 220906, 4.5, 3, 10000000, 92, 76),
(73, 6, 5, 3, 100000, 11, 77),
(74, 117489, 4.6, 12, 1000000, 87, 78),
(75, 143, 4.7, 3, 5000, 93, 79),
(76, 648475, 4.5, 18, 10000000, 64, 80),
(77, 153, 4.6, 3, 5000, 15, 81),
(78, 79, 5, 3, 100, 26, 82),
(79, 9532, 4.7, 12, 100000, 274, 83),
(80, 4201999, 4, 12, 50000000, 742, 84),
(81, 17607411, 4.3, 7, 100000000, 140, 85),
(82, 99349, 4.1, 12, 1000000, 2200, 86),
(83, 1107704, 4, 12, 10000000, 369, 87),
(84, 376431, 4.3, 12, 5000000, 127, 88),
(85, 4187276, 4.2, 18, 50000000, 1200, 89),
(86, 2386698, 4.5, 16, 50000000, 745, 90),
(87, 117918, 3.5, 16, 5000000, 81, 91),
(88, 218198, 4.3, 12, 10000000, 109, 92),
(89, 1187305, 4.1, 12, 10000000, 90, 93),
(90, 1614167, 4.4, 16, 50000000, 623, 94),
(91, 3100292, 4.2, 12, 100000000, 73, 95),
(92, 934214, 4.2, 12, 10000000, 96, 96),
(93, 15744, 4.4, 12, 100000, 1200, 97),
(94, 2129786, 4.3, 7, 10000000, 98, 98),
(95, 22389, 4.3, 3, 1000000, 43, 99),
(96, 7748, 4.4, 7, 100000, 117, 100),
(97, 803450, 4.2, 16, 10000000, 1400, 101),
(99, 94496, 4.4, 7, 5000000, 657, 103),
(100, 1931225, 4.1, 3, 50000000, 133, 104),
(101, 47852, 3.9, 7, 500000, 64, 105),
(102, 345131, 4.1, 7, 10000000, 156, 106),
(103, 322, 3.8, 3, 10000, 94, 107),
(104, 112230, 4.6, 3, 500000, 20, 108),
(105, 15594, 4.5, 16, 5000000, 87, 109),
(106, 312035, 4.5, 3, 10000000, 24, 110),
(107, 12448, 4.5, 3, 1000000, 33, 111),
(108, 1277585, 4.5, 7, 50000000, 131, 112),
(109, 1490, 4.7, 3, 50000, 104, 113),
(110, 61, 4.6, 3, 5000, 51, 114),
(111, 1633, 4.8, 3, 5000, 158, 115),
(112, 4667074, 4.6, 3, 50000000, 99, 116),
(113, 76, 4.5, 3, 1000, 56, 117),
(114, 1933, 4.7, 12, 10000, 18, 118),
(115, 203, 4.5, 3, 10000, 19, 119),
(116, 4708566, 4.5, 16, 50000000, 889, 120),
(117, 1925, 4.8, 3, 50000, 41, 121),
(118, 8, 5, 7, 500000, 39, 122),
(119, 479977, 4.6, 7, 10000000, 67, 123),
(120, 4028, 4.8, 3, 50000, 438, 124),
(121, 640129, 4.5, 12, 10000000, 55, 125),
(122, 100000, 4.5, 12, 100000, 100, 126);

-- --------------------------------------------------------

--
-- Table structure for table `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id_kritiksaran` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kritiksaran` text NOT NULL,
  `star` int(5) NOT NULL,
  `datee` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kritiksaran`
--

INSERT INTO `kritiksaran` (`id_kritiksaran`, `nama`, `kritiksaran`, `star`, `datee`) VALUES
(19, 'jason', 'untuk sistemnya udah oke, gamenya aja mungkin yang kurang banyak. tingkatkan lagi gann', 4, '2021-01-06'),
(20, 'tasyaaa', 'keren sistemnyaaa, bagusin lagi yaaa', 5, '2021-03-09'),
(21, 'kiky', 'oke lah, cukup memuaskan, hanya saja gamenya saja yang kurang banyak. klo bs ad 100', 4, '2021-04-09'),
(22, 'risa', 'okeoceeee tepennnn', 5, '2021-03-09'),
(23, 'Oliv', 'naisss', 5, '2021-04-19'),
(24, 'Cindysept', 'Tambah lg gameny ', 4, '2021-05-31'),
(25, 'Fenina', '1', 1, '2021-06-02'),
(27, 'Brando', 'tampilan kurang menarik, tolong diperbaiki ya', 3, '2021-06-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminn`
--
ALTER TABLE `adminn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_game` (`id_game`);

--
-- Indexes for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD PRIMARY KEY (`id_kritiksaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminn`
--
ALTER TABLE `adminn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id_kritiksaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `game` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
