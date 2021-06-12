-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-06-2021 a las 15:28:09
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de datos: `homework`
--
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `tareas`
--
DROP TABLE IF EXISTS `tareas`;
CREATE TABLE IF NOT EXISTS `tareas` (
    `idtarea` int(11) NOT NULL AUTO_INCREMENT,
    `idusario` int(11) NOT NULL,
    `nombreTarea` varchar(50) NOT NULL,
    `descripcion` text NOT NULL,
    `fecha` date NOT NULL,
    `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`idtarea`)
) ENGINE = MyISAM AUTO_INCREMENT = 2 DEFAULT CHARSET = latin1;
--
-- Volcado de datos para la tabla `tareas`
--
INSERT INTO `tareas` (
        `idtarea`,
        `idusario`,
        `nombreTarea`,
        `descripcion`,
        `fecha`,
        `fechaRegistro`
    )
VALUES (
        1,
        1,
        'Ir a clases',
        'Entregar cuestionario al profesor',
        '2021-06-09',
        '2021-06-12 15:12:09'
    );
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuario`
--
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
    `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(50) NOT NULL,
    `apellido` varchar(50) NOT NULL,
    `user` varchar(30) NOT NULL,
    `pass` varchar(100) NOT NULL,
    `estatus` int(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`idUsuario`)
) ENGINE = MyISAM AUTO_INCREMENT = 2 DEFAULT CHARSET = latin1;
--
-- Volcado de datos para la tabla `usuario`
--
INSERT INTO `usuario` (
        `idUsuario`,
        `nombre`,
        `apellido`,
        `user`,
        `pass`,
        `estatus`
    )
VALUES (
        1,
        'Daniel',
        'Ventura',
        '@danielventurard',
        'd979a2b753e76da5ada910d418229b91',
        1
    );
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;