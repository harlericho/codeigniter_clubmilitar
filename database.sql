-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 06:27 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `_crudcodeigmilitar`
--

-- --------------------------------------------------------

--
-- Table structure for table `autorizada`
--

CREATE TABLE `autorizada` (
  `id_autorizada` int(11) NOT NULL,
  `nombres_autorizada` varchar(100) NOT NULL,
  `fecha_autorizada` datetime DEFAULT current_timestamp(),
  `id_socio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autorizada`
--

INSERT INTO `autorizada` (`id_autorizada`, `nombres_autorizada`, `fecha_autorizada`, `id_socio`) VALUES
(2, 'sanchez veronica', '2020-08-09 20:24:30', 24),
(3, 'merino geanella', '2020-08-09 20:44:59', 25),
(4, 'zavala camilo', '2020-08-09 20:51:14', 27);

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `concepto_factura` varchar(200) NOT NULL,
  `fec_factura` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fecha_factura` datetime DEFAULT current_timestamp(),
  `id_socio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`id_factura`, `concepto_factura`, `fec_factura`, `valor`, `fecha_factura`, `id_socio`) VALUES
(4, 'consumo de habitaciones', '2020-08-10', '2300500.00', '2020-08-10 14:51:48', 23),
(5, 'gym anual', '2020-08-11', '1500.00', '2020-08-10 14:52:37', 27),
(6, 'clase de ingles', '2020-08-05', '500.00', '2020-08-11 11:18:50', 30);

-- --------------------------------------------------------

--
-- Table structure for table `socio`
--

CREATE TABLE `socio` (
  `id_socio` int(11) NOT NULL,
  `cedula_socio` varchar(20) NOT NULL,
  `nombres_socio` varchar(100) NOT NULL,
  `fondos_socio` decimal(10,2) NOT NULL,
  `tipo_socio` varchar(100) NOT NULL,
  `fecha_socio` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socio`
--

INSERT INTO `socio` (`id_socio`, `cedula_socio`, `nombres_socio`, `fondos_socio`, `tipo_socio`, `fecha_socio`) VALUES
(23, '2302302300', 'dominguez cavalo', '2198600.00', 'VIP', '2020-08-07 12:48:31'),
(24, '1301301303', 'sanchez armando', '4500000.00', 'VIP', '2020-08-07 13:00:22'),
(25, '1700354663', 'merino javier', '950000.00', 'VIP', '2020-08-07 18:49:26'),
(27, '1717009898', 'zavala jorge', '558500.00', 'REGULAR', '2020-08-08 17:27:07'),
(28, '1311300456', 'meza gabriel', '17800.00', 'REGULAR', '2020-08-08 20:11:01'),
(29, '1890900299', 'crespo jorge', '880500.00', 'REGULAR', '2020-08-08 22:02:13'),
(30, '1878198111', 'choca jose', '500.00', 'REGULAR', '2020-08-11 11:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `nombres_usu` varchar(100) NOT NULL,
  `email_usu` varchar(100) NOT NULL,
  `pass_usu` varchar(200) NOT NULL,
  `fecha_usu` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombres_usu`, `email_usu`, `pass_usu`, `fecha_usu`) VALUES
(1, 'carlos choca', 'charlie@gmail.com', 'dc599a9972fde3045dab59dbd1ae170b', '2020-08-06 13:18:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autorizada`
--
ALTER TABLE `autorizada`
  ADD PRIMARY KEY (`id_autorizada`),
  ADD KEY `IX_Relationship1` (`id_socio`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `IX_Relationship2` (`id_socio`);

--
-- Indexes for table `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`id_socio`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autorizada`
--
ALTER TABLE `autorizada`
  MODIFY `id_autorizada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `socio`
--
ALTER TABLE `socio`
  MODIFY `id_socio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autorizada`
--
ALTER TABLE `autorizada`
  ADD CONSTRAINT `Relationship1` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`);

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `Relationship2` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id_socio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
