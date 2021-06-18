-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 04:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librocaina`
--

-- --------------------------------------------------------

--
-- Table structure for table `autores`
--

CREATE TABLE `autores` (
  `id` int(11) NOT NULL,
  `id_autor` varchar(11) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `ciudad` varchar(15) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `pais` varchar(3) NOT NULL,
  `cod_postal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autores`
--

INSERT INTO `autores` (`id`, `id_autor`, `apellido`, `nombre`, `telefono`, `direccion`, `ciudad`, `estado`, `pais`, `cod_postal`) VALUES
(24, '724-80-9391', 'MacFeather', 'Stearns', '415 354-7128', '44 Upland Hts.', 'Oakland', 'CA', 'USA', 94612),
(25, '756-30-7391', 'Karsen', 'Livia', '415 534-9219', '5720 McAuley St.', 'Oakland', 'CA', 'USA', 94609),
(26, '807-91-6654', 'Panteley', 'Sylvia', '301 946-8853', '1956 Arlington Pl.', 'Rockville', 'MD', 'USA', 20853),
(27, '846-92-7186', 'Hunter', 'Sheryl', '415 836-7128', '3410 Blonde St.', 'Palo Alto', 'CA', 'USA', 94301);

-- --------------------------------------------------------

--
-- Table structure for table `titulos`
--

CREATE TABLE `titulos` (
  `id` int(11) NOT NULL,
  `id_titulo` varchar(6) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `id_pub` varchar(4) NOT NULL,
  `precio` double DEFAULT NULL,
  `avance` double DEFAULT NULL,
  `total_ventas` int(11) DEFAULT NULL,
  `notas` varchar(255) NOT NULL,
  `fecha_pub` datetime NOT NULL,
  `contrato` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titulos`
--

INSERT INTO `titulos` (`id`, `id_titulo`, `titulo`, `tipo`, `id_pub`, `precio`, `avance`, `total_ventas`, `notas`, `fecha_pub`, `contrato`) VALUES
(7, 'MC3021', 'The Gourmet Microwave', 'mod_cook', '0877', 2.99, 15000, 22246, 'Traditional French gourmet recipes adapted for modern microwave cooking.', '1985-06-18 12:00:00', '1'),
(11, 'PC9999', 'Net Etiquette', 'popular_comp', '1389', NULL, NULL, NULL, 'A must-read for computer conferencing debutantes!', '2000-01-10 12:19:13', '0'),
(12, 'PS1372', 'Computer Phobic and Non-Phobic Individuals: Behavior Variati', 'psychology', '0877', 21.6, 7000, 375, 'A must for the specialist, this book examines the difference between those who hate and fear computers and those who think they are swell.', '1989-06-15 12:00:00', '1'),
(13, 'PS2091', 'Is Anger the Enemy?', 'psychology', '0736', 11, 2275, 2045, 'Carefully researched study of the effects of strong emotions on the body.  Metabolic charts included.', '1989-06-15 12:00:00', '1'),
(14, 'PS2106', 'Life Without Fear', 'psychology', '0736', 7, 6000, 111, 'New exercise, meditation, and nutritional techniques that can reduce the shock of daily interactions. Popular audience.  Sample menus included, exercise video available separately.', '1990-10-05 12:00:00', '1'),
(15, 'PS3333', 'Prolonged Data Deprivation: Four Case Studies', 'psychology', '0736', 20, 2000, 4072, 'What happens when the data runs dry?  Searching evaluations of information-shortage effects on heavy users.', '1988-06-12 12:00:00', '1'),
(16, 'PS7777', 'Emotional Security: A New Algorithm', 'psychology', '0736', 7.99, 4000, 3336, 'Protecting yourself and your loved ones from undue emotional stress in the modern world.  Use of computer and nutritional aids emphasized.', '1988-06-12 12:00:00', '1'),
(17, 'TC3218', 'Onions, Leeks, and Garlic: Cooking Secrets of the Mediterran', 'trad_cook', '0877', 21, 7000, 375, 'Profusely illustrated in color, this makes a wonderful gift book for a cuisine-oriented friend.', '1990-10-21 12:00:00', '1'),
(18, 'TC4203', 'Fifty Years in Buckingham Palace Kitchens', 'trad_cook', '0877', 12, 4000, 15096, 'More anecdotes from the Queen\'s favorite cook describing life among English royalty.  Recipes, techniques, tender vignettes.', '1985-06-12 12:00:00', '1'),
(19, 'TC7777', 'Sushi, Anyone?', 'trad_cook', '0877', 15, 8000, 4095, 'Detailed instructions on improving your position in life by learning how to make authentic Japanese sushi in your spare time.  5-10% increase in number of friends per recipe reported from beta test.', '1987-06-12 12:00:00', '1'),
(25, 'BU1032', 'The Busy Executive', 'business', '', 20, NULL, NULL, 'An overview of available database systems with emphasis on common business applications.  Illustrated.', '0000-00-00 00:00:00', ''),
(30, 'DM-123', 'Librocaina centu practica', 'Romantica', '', 500, NULL, NULL, 'Esto es una nota', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `titulo_autor`
--

CREATE TABLE `titulo_autor` (
  `id_autor` varchar(11) NOT NULL,
  `id_titulo` varchar(6) NOT NULL,
  `ord_au` varchar(1) NOT NULL,
  `derechos` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `titulo_autor`
--

INSERT INTO `titulo_autor` (`id_autor`, `id_titulo`, `ord_au`, `derechos`) VALUES
('172-32-1176', 'PS3333', '1', 100),
('213-46-8915', 'BU1032', '2', 40),
('213-46-8915', 'BU2075', '1', 100),
('238-95-7766', 'PC1035', '1', 100),
('267-41-2394', 'BU1111', '2', 40),
('267-41-2394', 'TC7777', '2', 30),
('274-80-9391', 'BU7832', '1', 100),
('409-56-7008', 'BU1032', '1', 60),
('427-17-2319', 'PC8888', '1', 50),
('472-27-2349', 'TC7777', '3', 30),
('486-29-1786', 'PC9999', '1', 100),
('486-29-1786', 'PS7777', '1', 100),
('648-92-1872', 'TC4203', '1', 100),
('672-71-3249', 'TC7777', '1', 40),
('712-45-1867', 'MC2222', '1', 100),
('722-51-5454', 'MC3021', '1', 75),
('724-80-9391', 'BU1111', '1', 60),
('724-80-9391', 'PS1372', '2', 25),
('756-30-7391', 'PS1372', '1', 75),
('807-91-6654', 'TC3218', '1', 100),
('846-92-7186', 'PC8888', '2', 50),
('899-46-2035', 'MC3021', '2', 25),
('899-46-2035', 'PS2091', '2', 50),
('998-72-3567', 'PS2091', '1', 50),
('998-72-3567', 'PS2106', '1', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titulo_autor`
--
ALTER TABLE `titulo_autor`
  ADD PRIMARY KEY (`id_autor`,`id_titulo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
