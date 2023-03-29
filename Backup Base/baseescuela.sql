-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2023 a las 22:56:24
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baseescuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ALUMNO` varchar(50) CHARACTER SET latin1 NOT NULL,
  `CEDULA` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `NOMBRES` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `APELLIDOS` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `CIUDAD_NACIMIENTO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `SEXO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `PADRE` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `PROFESION_PADRE` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `MADRE` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `PROFESION_MADRE` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `CIUDADRES` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `DIRECCION` longtext CHARACTER SET latin1 DEFAULT NULL,
  `TELEFONO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `CONTACTO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `REFERENCIA` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `CORREO` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `FOTO` blob DEFAULT NULL,
  `SISRES` varchar(45) CHARACTER SET latin1 DEFAULT 'APECS',
  `SISFECHA` datetime DEFAULT NULL,
  `CSLTKO` varchar(250) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ALUMNO`, `CEDULA`, `NOMBRES`, `APELLIDOS`, `FECHA_NACIMIENTO`, `CIUDAD_NACIMIENTO`, `SEXO`, `PADRE`, `PROFESION_PADRE`, `MADRE`, `PROFESION_MADRE`, `CIUDADRES`, `DIRECCION`, `TELEFONO`, `CONTACTO`, `REFERENCIA`, `CORREO`, `FOTO`, `SISRES`, `SISFECHA`, `CSLTKO`) VALUES
('UEC-1', '0350506192', 'Daysi Isabella', 'Beltrán Guallpa', NULL, '', 'F', '', '', '', '', '', '', '0960603059', '', '', 'N', 0x75706c6f6164732f313637353230343033385f5545432d312e6a7067, 'APECS', '2023-01-31 11:01:18', ''),
('UEC-10', '0151869145 ', 'Gabriela Alejandra', 'Pañora Tenegañay  ', '2002-11-25', '', 'F', '', '', '', '', '', '', '0918621934 ', '', '', 'N', 0x75706c6f6164732f313637353130383537315f464f2e6a7067, 'APECS', NULL, ''),
('UEC-100', '0350353363', 'Dante Geovanny', 'Caizaguano Campoverde', NULL, '', 'M', '', '', '', '', '', '', '0967777744', '', '', 'N', 0x75706c6f6164732f313637353139393433305f686f6d2e6a7067, 'APECS', NULL, ''),
('UEC-101', '0350263430', 'Andrea Karolina', 'Campoverde Zhagüi', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0993023872', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-102', '0150950939', 'Josselyn Maitte', 'Cumbe Criollo', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0986382095', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-103', '0151196755', 'Mia Guadalupe', 'Cumbe Mendieta', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-104', '0303094916', 'Erik José', 'Garabay Chimbay', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-105', '0350346151', 'Justin Sebastián', 'Guallpa Pérez', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0984842234', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-106', '0350320248', 'Mayte Fernanda', 'Hurtado Zhagüi', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '09671156969', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-107', '0151182953', 'Nathalie Guadalupe', 'Pañora Tenegañay', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0986261934', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-108', '0350312872', 'Samuel Gerardo', 'Puma Puma', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0989543998', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-109', '0350349676', 'David Sebastián', 'Quizhpi Suquisupa', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0967421499', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-11', '0350530002', 'Carlos Román', 'Puma Coronel', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0988642188 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-110', '0350318176', 'Carlos Felipe', 'Nieves Garate', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0998894858', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-111', '0960109205', 'George Sebastian', 'Reyes Espinoza', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-112', '0350349141', 'Justin Steven', 'Rodríguez Tito', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0980338781', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-113', '0151218732', 'Annie Guadalupe', 'Terán Flores', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0981885573', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-114', '0350347324', 'Cristian Andrés', 'Uruchima Heras', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '099839564', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-115', '0151276789', 'Emily Sarahi', 'Vidal Castillo', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0997335002', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-116', '0151298387', 'Geordi Alexander', 'Zhangallimbay Campoverde', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0939469355', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-117', '0150950814', 'Ismael Antonio', 'Zeas Muñoz', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0993309191', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-118', '1755362157', 'Camila Teresa', 'Andrade Arizaga', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0999813704', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-119', '0303123368', 'Marelly Estefany', 'Aguayza Lema', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0999649949', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-12', '0151990694', 'Christhopher', 'Quituisaca Narváez ', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0981121614 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-120', '035033379', 'Bryan Adrián', 'Arteaga Palta', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0959793049', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-121', '0303094890', 'Marco Sebastián', 'Beltrán Supacela', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0988579822', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-122', '0303074132', 'Nathaly Salome', 'Beltrán Gavilanes', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0981464438', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-123', '1150770244', 'Heidy Briggette', 'Pacheco Macas', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0989096756', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-124', '0150801090', 'Naila Jazmin', 'Brito Fajardo', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0994098332', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-125', '0303094924', 'Santiago Ismael', 'Caisaguano Chauca', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '09826547415', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-126', '0303091904', 'Juan Pablo', 'Caizaguano Tito', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0939816438', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-127', '0150500007', 'Carol Isabela', 'Cedillo Molina', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0985767098', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-128', '0150516201', 'Joy Emiliano', 'Guartazaca Cabrera', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-129', '0350266235', 'Jessica Paola', 'Quizhpi Mizhquiri', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0986543573', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-13', '0151983228', 'Ashley Charlotte', 'Quizhpi Fajardo  ', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0967085979 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-130', '0350320248', 'Mariana Elizabeth', 'Quituizaca Cordero', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0986219390', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-131', '0350198602', 'Estefany Nohemí', 'Lema Chauca', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0990101703', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-132', '0303091946', 'Lisseth Estefanía', 'Loja Jara', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0994038133', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-133', '0350275335', 'Oscar Patricio', 'Mizhquiri Aguayza', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0968849521', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-134', '0150677706', 'Luis Antonio', 'Morales Mozombite', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0992499676', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-135', '0303048995', 'Jordi Alejandro', 'Heras Sotamba', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0959839564', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-136', '0303088884', 'Joanna Mariela', 'Paguay Yanza', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0967542609', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-137', '0150621878', 'Sofía Valentina', 'Palaguachi Dután', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0984820438', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-138', '0150611440', 'Melisa Estefanía', 'Sopla Chuquisala', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0980861295', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-139', '0350255758', 'Efraín Alexis', 'Vázquez Gavilanes', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0961863481', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-14', '0350511218', 'Kimberly Ayleen', 'Quizhpi Méndez ', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0969556704 ', NULL, NULL, 'N', 0x4150454353, NULL, NULL, NULL),
('UEC-140', '0303048987', 'Maykel Joao', 'Abad Quizhpi', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0969125663', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-141', '0303044770', 'Nayomi Estefania', 'Aguaiza Zhagüi', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0991163420', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-142', '0303117089', 'María Belén', 'Beltrán Guallpa', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0967367161', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-143', '0303067003', 'Amanda Betzabé', 'Cabrera Zamora', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0967346058', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-144', '0350318069', 'Sebastián Patricio', 'Cuzco Reinoso', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0990673026', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-145', '0303116834', 'Melanie Belén', 'Cusco Illescas', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0939409044', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-146', '0350230512', 'Joselyn Karina', 'Dután Pineda', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0982731879', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-147', '0150491702', 'Denisse Anahí', 'Pañora León', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0990454226', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-148', '0150302412', 'María José', 'Aguayza Uruchima', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0967085979', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-149', '0303049084', 'Jorge Daniel', 'Heras Guamán', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0985186811', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-15', '0350504007', 'Deyvid Ariel', 'Quizhpi Roto', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0980928937', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-150', '0150291607', 'Luis Andrés', 'Idrovo Castillo', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0995323020', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-151', '0303059133', 'Dilan Andrés', 'Marcatoma Caizaguano', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0986689164', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-152', '0150274975', 'Mayte Anahí', 'Morales Mozombite', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0992499676', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-153', '0303107601', 'Evelin Guadalupe', 'Mizhquiri Cayambe', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0990101208', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-154', '0350264388', 'Darikson Alexander', 'Muñoz Lopez', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0992859165', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-155', '0303059182', 'Andres Martin', 'Pañora Guanuchi', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0985570726', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-156', '0303104863', 'Esthefany Mishell', 'Quizhpi Quizhpi', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0967267257', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-157', '0303112197', 'Denis Jhoselyn', 'Tacuri Guaman', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0995699220', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-158', '0350302600', 'Stalin Abraham', 'Tupacyupanqui Cambi', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0987517875', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-159', '0350287868', 'Jhostin Sebastian', 'Sotamba Guaman', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0992778499', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-16', '0151958923', 'Joshep Eduardo', 'Riera Zumba', NULL, NULL, ' M ', NULL, NULL, NULL, NULL, NULL, NULL, ' 0982862981 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-160', '0150233237', 'Ismael William', 'Romero Calle', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0980886548', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-161', '0303052971', 'Blanca Felicia', 'Rubio Zeas', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0969127041', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-162', '0303033773', 'Claudio Marcelo', 'Roto Lema', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0980928937', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-163', '0303042550', 'Jostin Eduardo', 'Uruchima Heras', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0959839564', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-164', '0303049043', 'Brianna Emily', 'Vasconez Caizaguano', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0969739072', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-165', '0303044796', 'Lucas Jeanpierre', 'Vidal Castillo', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0997335002', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-166', '0303088801', 'Cristhoper Eduardo', 'Zumba Tupacyupanqui', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0982989810', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-167', '3050747215', 'Erica Jesenia', 'Aguayza Uruchima', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0993190398', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-168', '0150322089', 'Michael Steven', 'Altamirano Mozombite', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0992499676', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-169', '0150162709', 'Nathaly Janeth', 'Brito Fajardo', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0994098332', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-17', '0350529558', 'Cristian Oswaldo', 'Ruiz Cambizaca', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '992005905', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-170', '0350067716', 'Nathaly Eugenia', 'Altamirano Mozombite', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '09848422134', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-171', '0303099683', 'Mayuri Julissa', 'Campoverde Beltran', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0968197127', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-172', '0350050837', 'Darella Catalina', 'Cardon  Flores', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0984692761', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-173', '0350140448', 'Santiago Josue', 'Calle Rivas', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0962916576', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-174', '0350270500', 'Lissbeth Abigail', 'Chimbay   Huachun', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '2210-493', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-175', '0350051637', 'Kelly Jeanneth', 'Garabi Chimbay', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0968611775', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-176', '0150540268', 'Jair  Isaac', 'Gallegos Cordero', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0984775962', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-177', '0350026787', 'Alexander Ismael', 'Guaman Quizhpi', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0982566214', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-178', '0150053551', 'Dayana Estefania', 'Leon Caisaguano', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0985892798', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-179', '0350060778', 'Jostin Eduardo', 'Lema Chauca', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0990101703', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-18', '0962624334 ', 'Valentina del Carmen', 'Saldaña Beltrán', NULL, NULL, ' F', NULL, NULL, NULL, NULL, NULL, NULL, ' 0953699360', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-180', '0350300927', 'Julio Matias', 'Maldonado Dutan', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0988895121', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-181', '0350004610', 'Nayla Samanta', 'Ochoa Sanchez', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0997665049', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-182', '0350004552', 'Steffy del Rocio', 'Palaguachi Dutan', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0984820438', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-183', '0350061313', 'Lisseth Margarita', 'Pañora Mejia', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0988552743', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-184', '0303106140', 'Ismael Fernando', 'Peña Cumbe', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0989709245', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-185', '0350025706', 'Erik Daniel', 'Quizhpilema Chuquisala', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0991767472', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-186', '0350318077', 'Lenin Jhoel', 'Saldaña Zhinin', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0990822661', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-187', '0952239846', 'Carla Valeria', 'Santacruz Campaña', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0999081469', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-188', '0350005088', 'Jostin Alexander', 'Sinchi Guaman', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0967456107', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-189', '0303113377', 'Daysi Tatiana', 'Tito Mizhquiri', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0986843406', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-19', '0350535993 ', 'Veronica Renata', 'Toledo Urgiles', NULL, NULL, ' F ', NULL, NULL, NULL, NULL, NULL, NULL, ' 0990091087', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-190', '0150373272', 'Cristian Ismael', 'Tito Coronel', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0991348150', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-191', '0931750814', 'Naomi Sophie', 'Arambulo Mora', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0986205438', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-192', '0350130480', 'Erik Yael', 'Beltran Supacela', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0988579822', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-193', '14501500311', 'Mickel Alejandro', 'Benavidez Urgiles', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0981951028', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-194', '0350201885', 'Juan Sebastian', 'Caizaguano Alvarez', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0989446846', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-195', '0150036838', 'Damaris Fernanda', 'Galarza Espejo', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0991783802', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-196', '0302989068', 'Jostin Sebastian', 'Guarquila   Dutan', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0982731873', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-197', '0350051223', 'Lenin Ismael', 'Heras Sotamba', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0979581216', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-198', '0303113609', 'Julia Corina', 'Loja Jara', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0994038133', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-199', '1150364659', 'Anahi Soledad', 'Macas Zhunaula', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0991401732', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-2', '0350536546', 'Sofia Alexandra', 'Bonete Inga', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0986153607', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-20', '0151945193 ', 'Nube Dayana', 'Uruchima Buestan', NULL, NULL, ' M ', NULL, NULL, NULL, NULL, NULL, NULL, ' 0969885058', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-200', '0350299780', 'Nayeli Valeria', 'Muñoz Chauca', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0981701651', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-201', '0107927329', 'Edwin Patricio', 'Puma Villa', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0991891924', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-202', '0150408938', 'Josseth Jesus', 'Ortega Chuya', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0997360375', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-203', '0952531473', 'Cristopher Moises', 'Quinde Maldonado', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0981952709', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-204', '0350201851', 'Eymi Daniela', 'Quizhpi Aguayza', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '3023395', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-205', '0350191391', 'Keyla Johanna', 'Reyes   Chauca', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0967472509', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-206', '0350201885', 'Jason Deivi', 'Sauce Cuzco', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0981070848', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-207', '0350051033', 'Santiago Maximiliano', 'Siguencia Tito', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0993385978', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-208', '0350031696', 'Domenica Lisseth', 'Uruchima Tito', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0990293213', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-209', '0350051389', 'Alan Geovanny', 'Vasconez Caizaguano', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0969739072', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-21', '0151903416', 'Yazmin Abigail', ' Uruchima Cedacero', NULL, NULL, ' F ', NULL, NULL, NULL, NULL, NULL, NULL, ' 0998542767', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-210', '0106929243', 'Adrián Marcelino', 'Zea Zeas', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0988150412', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-211', '0107462202', 'Evelyn del Pilar', 'Altamirano Mozombite', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0992499676', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-212', '0302880422', 'Dayanna Lizeth', 'Correa Zhangallimbay', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0989339149', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-213', '0350045340', 'Lissbeth del Rocio', 'Ochoa Ochoa', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0983101529', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-214', '0302822085', 'Sisa Veronica', 'Macas Puglla', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0979510836', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-215', '0350027538', 'Melanie Carolina', 'Ochoa Uruchima', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0993256851', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-216', '0950465161', 'Jennifer Nayely', 'Ordoñez Cuzco', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0991208444', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-217', '0150300333', 'Ana Gabriela', 'Pauta Cambizaca', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0992005905', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-218', '0302844600', 'Karoll Noemi', 'Pañora   Guanuchi', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0985570726', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-219', '0302844683', 'Karen Priscila', 'Pañora   Guanuchi', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0985570726', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-22', '0151955655', 'Anderson Matías', 'Uruchima Siavichay', NULL, NULL, ' M', NULL, NULL, NULL, NULL, NULL, NULL, ' 4031625 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-220', '0302937693', 'Katherine Alexandra', 'Sempertegui Ordoñez', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0988736047', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-221', '0151097052', 'Jonnathan Steven', 'Sopla Chuquisala', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0980861295', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-222', '0350026076', 'Adrian Israel', 'Tenecela Loja', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0996724013', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-223', '0350202222', 'Edison Geovanny', 'Uruchima Quizhpi', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0994527741', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-224', '0302849320', 'Steven Javier', 'Quizhpilema Aguilar', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0990142127', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-225', '0350067708', 'Paul Alexander', 'Briones Ortega', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '09848422134', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-226', '0302848619', 'Cristian Esteban', 'Campoverde Zhagüi', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0993023872', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-227', '1751749365', 'Max Anthony', 'Saeteros Peñafiel', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0999731269', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-228', '0302844352', 'Ashley Estefania', 'Chauca Uruchima', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0994744979', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-229', '0350051058', 'Lourdes Silvana', 'Coronel  Encalada', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0987517875', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-23', '0350492575', 'Doménica Sofia', 'Aucaquizhpi Zhagüi', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0967156969', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-230', '0302843503', 'Kerly Nayeli', 'Cuzco Paltán', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0991198405', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-231', '0303101091', 'Dianis Yeniluz', 'Gonzalez Dutan', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0980755597', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-232', '0303101091', 'Jose Andres', 'Inga Solis', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0994584681', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-233', '0302875331', 'Jordano Jonas', 'Jativa Cajamarca', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0983276506', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-234', '1150175758', 'Jostin David', 'Macas Zhunaula', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0991401732', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-235', '0350268272', 'Jennyfer Ahilyn', 'Morales Tamay', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '099437009', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-236', '1150316279', 'Ana Paula', 'Narvaez Rueda', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0959626899', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-237', '0350318101', 'Marco Andres', 'Pañora Mejia', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0988552743', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-238', '0350051199', 'Diego Alexander', 'Quinde Maldonado', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0981952709', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-239', '0350051124', 'Jenny Estefania', 'Romero Lliguichuzhca', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0986427670', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-24', '0350496493 ', 'Kevin Fabián', 'Campoverde Beltrán', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0968197127', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-240', '0302844287', 'Cristian Yadiel', 'Saavedra Ochoa', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0968824031', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-241', '0302996137', 'Tanya Elizabeth', 'Tacuri Guaman', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0995699220', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-242', '03028844550', 'Keilyn Dayana', 'Tito Tamay', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0959698516', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-243', '0302842174', 'Kateryn Johanna', 'Uruchima Jara', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0989460608', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-244', '0302980305', 'Erik Alexander', 'Vazquez Gavilanes', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0961863481', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-245', '0350041307', 'Aracely Elizabeth', 'Zamora Siavichay', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0991312302', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-25', '1450505530 ', 'Roger de Jesús', 'Benavidez Urgilés', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0981951028', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-26', '0350490892', 'Jean Carlos', 'Calle Tito', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0988699347', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-27', '0350471553', 'Kevin Daniel', 'Chauca Solís', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0999626932', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-28', '0350457390', 'Jhoanna Vanessa', 'Chuqui Quizhpi', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0982566274', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-29', '0350465308', 'Lesly Jazmin', 'Guamán Dután', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0992313598', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-3', '0151965761', 'Franklin Hernán', 'Brito Fajardo', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0994377226 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-30', '0350482550', 'Erick Alexander', 'Guachún Garnica', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0981860720', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-31', '0350460788', 'María Lisbeth', 'Heras Heras', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0979581216', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-32', '0961456233', 'Sandra Elizabeth', 'Ibarra Ordoñez', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0961134041', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-33', '0350481578', 'Arianna Fiorella', 'Nieves Garate', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0998894858', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-34', '0350466546', 'Ashley Yamileth', 'Ochoa Uruchima', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0993256856', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-35', '0151833993', 'Briana Lisseth', 'Peña Cumbe', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '09627270750', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-36', '0350477873', 'Christopher Steven', 'Puma Paucar', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0994347393', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-37', '0350412086', 'Ronald Alexander', 'Puma Villa', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0991891924', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-38', '0350493979', 'Mateo Andrés', 'Quizhpi Mizhquiri', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0993694996', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-39', '0350462057', 'Thiago Mateo', 'Ramon Guanuchi', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0967431724', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-4', '0151916715', 'Anderson Adrián', 'Collacay Bernal', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0967533374 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-40', '0151716123', 'Mayte Doménica', 'Remache Ochoa', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0968824031', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-41', '0151704418', 'Abigail Monserrat', 'Romero Calle', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0980886545', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-42', '0151752094', 'Ronald Misael', 'Saldaña Heras', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0989211885', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-43', '0151793395', 'Jordán Eduardo ', 'Solís Dután', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0989322206', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-44', '01056730082', 'María José', 'Tito Bravo', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0987434373', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-45', '0961308798', 'Yuleysi Anabel', 'Uruchima Heras', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0979715233', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-46', '0350335618', 'Lady Valentina', 'Yanza Palaguachi', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0980778904', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-47', '01515955287', 'Daniel', 'Bravo Morquecho', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-48', '0350408761', 'Erick Jeyden', 'Beltrán Cordero', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0959852588', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-49', '0302718689', 'Alisson Nicole', 'Caisaguano Cajamarca', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0989234754', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-5', '0350521118 ', 'Luana del Cisne', 'Cumbe Mendieta', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0967537473 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-50', '0350435004', 'Katherine Alexandra', 'Cedacero Collaguazo', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0985310896', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-51', '0151650835', 'Cristopher Renato', 'Cuzco Reinoso', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0990673026', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-52', '0350434478', 'Edwin Leonel', 'Granizo Puma', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0981461702', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-53', '0350407433', 'Mateo Josue', 'Inga Solís', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0994584681', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-54', '0350446639', 'Joel Matías', 'Iñamagua Dután', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0988980718', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-55', '0350418034', 'Michael Sebastian', 'Lema Siguencia', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0999092248', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-56', '0151637188', 'Amy Daniela', 'Loja Nivicela', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0987919737', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-57', '1726946401', 'Massimo Alessandro', 'Marichalez Quishpi', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0960976701', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-58', '0350435509', 'Alex Mateo', 'Morquecho Peralta', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0988340591', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-59', '0350438669', 'Gabriel Ismael', 'Ordoñez Pañora', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-6', '0350493649 ', 'José Ismael', 'Guallpa Tenecela', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0959793103 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-60', '0151672904', 'Christopher Gonzalo', 'Pañora León', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0990454226', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-61', '0151580172', 'Emily Carolina', 'Pañora Tenegañay', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0986261934', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-62', '0350406591', 'Marcos Geovanny', 'Paltán Narváez', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0991371659', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-63', '0350430237', 'Jimmy Alexander', 'Quizhpi Laime', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0985847980', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-64', '0350379079', 'Edid Mayte', 'Quishpilema Chuquisala', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0991767472', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-65', '0350404968', 'David Nicolás', 'Rivas Flores', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0984941020', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-66', '0151535606', 'Klever Ricardo', 'Romero Calle', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0980886548', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-67', '0350434411', 'Alexis Daniel', 'Rodríguez Uzhca', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0939558256', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-68', '0350443792', 'Richard Dylan', 'Santacruz Campaña', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0999081469', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-69', '0350420309', 'Deivid Andrés', 'Siavichay Correa', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0991404460', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-7', '0350482543', 'Kylie Analís', 'Heras Sotamba', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0979510836 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-70', '0350430674', 'Jannalis', 'Tenecela Loja', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-71', '0350441861', 'Camila Yuleisi', 'Tito Coronel', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0991348150', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-72', '0350492575', 'Matías Sebastian', 'Uruchima Mendoza', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0991350777', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-73', '0350435483', 'Amanda Milagros', 'Vásquez Cabrera', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0990338662', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-74', '1851220655', 'Andrés', 'Aucaquizhpi Zhagüi  ', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-75', '0350361762', 'Helen Doménica', 'Beltrán Guallpa', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0967367161', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-76', '0151332830', 'Junior Mauricio', 'Brito Fajardo', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0994098332', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-77', '0151965761', 'Lesly Dayana', 'Cárdenas Illisaca', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0939816438', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-78', '0350378972', 'Yesly Victoria', 'Caisaguano Tito', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0967533374', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-79', '0350401543', 'Daniel Alejandro', 'Campoverde Viñanzaca', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0994404931', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-8', '0350482543 ', 'Paola Jhoanna', 'Macas Puglla', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0979510833 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-80', '0151365632', 'Kerly Anahí', 'Chuya Jurado', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0989904746', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-81', '0350370706', 'Ismael Matías', 'Guarquila Morocho', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0985009678', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-82', '0350361119', 'Juan Diego', 'Heras Heras', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0967551008', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-83', '0151441532', 'Cristian Adrián', 'Landi Chuya', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0988980718', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-84', '0650611049', 'Jostin Jeremías', 'Lema Daquilema', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0963067310', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-85', '0350374088', 'Andy Steven ', 'Iñamagua Dután', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0997669834', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-86', '0151487832', 'Sebastián Josue', 'Molina Siavichay', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0960082556', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-87', '0151342128', 'Amy Gabriela', 'Nacipucha Caisaguano', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0997360375', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-88', '0151358314', 'Jostin Sebastián', 'Ortega Chuya', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0968824031', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-89', '0151475209', 'Thiago Gerard', 'Pereira Naspud', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0979599685', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-9', '0151891793', 'Helen Renata', ' Morales Mozombite', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0992499676 ', NULL, NULL, 'N', NULL, 'APECS', NULL, NULL),
('UEC-90', '0151373859', 'Karla Salome', 'Puma Coronel', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0988642188', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-91', '0350364774', 'Andy Nicolás', 'Remache Ochoa', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0969197783', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-92', '0151385325', 'Kimberly Jamileth', 'Sarmiento Espejo', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '0991783802', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-93', '0350366928', 'Anthony Alexander', 'Uruchima Uzhca', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0979715233', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-94', '0960110047', 'Dilan Ismael', 'Uruchima Heras', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0979715233', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-95', '0151398823', 'Franc Boris', 'Tito Loja', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0989447301', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-96', '0350397626', 'Jossue Nicolás', 'Zuñay Nieves', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0967346362', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-97', '0350388542', 'Josue Ezequiel', 'Zhunio Mejía', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0982812606', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-98', '0350370700', 'Jean', 'Padilla Chauca', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'N', '', 'APECS', NULL, NULL),
('UEC-99', '0350296950', 'Stalin Mateo', 'Caisaguano Duy', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, '0998914298', NULL, NULL, 'N', '', 'APECS', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aopres`
--

CREATE TABLE `aopres` (
  `pork` varchar(10) CHARACTER SET latin1 NOT NULL,
  `psoono` varchar(145) CHARACTER SET latin1 DEFAULT NULL,
  `conrax` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `apesss` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aopres`
--

INSERT INTO `aopres` (`pork`, `psoono`, `conrax`, `apesss`) VALUES
('admin', 'administrador', 'admin', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `ALUMNO` varchar(50) CHARACTER SET latin1 NOT NULL,
  `MATRICULA` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `asiste` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`ALUMNO`, `MATRICULA`, `fecha`, `asiste`) VALUES
('UEC-1', 1, '2023-03-27', 'SI'),
('UEC-1', 1, '2023-03-28', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubxprofesor`
--

CREATE TABLE `clubxprofesor` (
  `club` varchar(45) NOT NULL,
  `profesor` varchar(45) NOT NULL,
  `periodo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `CURSO` varchar(45) CHARACTER SET latin1 NOT NULL,
  `CUPO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `INICIAL` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `CICLO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `ESPECIALIDAD` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `DESCRIPCION` varchar(200) CHARACTER SET latin1 NOT NULL,
  `PROMOVIDO` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`CURSO`, `CUPO`, `INICIAL`, `CICLO`, `ESPECIALIDAD`, `DESCRIPCION`, `PROMOVIDO`) VALUES
('CUARTO EGB', '20', '4 EGB', 'BASICA', 'BASICA', 'CUARTO AÑO DE EDUCACION GENERAL BASICA', 'promovido/a a QUINTO AÑO DE EDUCACIÓN GENERAL BASICA.'),
('DECIMO', '30', '10 MO', 'BASICA S', 'BASICA', 'DÉCIMO AÑO DE EDUCACIÓN GENERAL BÁSICA', 'promovido/a a PRIMER AÑO DE BACHILLERATO'),
('QUINTO EGB', '40', '5 EGB', 'BASICA', 'BASICA', 'QUINTO AÑO DE EDUCACION GENERAL BASICA', 'promovido/a a SEXTO AÑO DE EDUCACIÓN GENERAL BASICA.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fbnotas`
--

CREATE TABLE `fbnotas` (
  `PERIODO` varchar(45) CHARACTER SET latin1 NOT NULL,
  `NOTA` varchar(45) CHARACTER SET latin1 NOT NULL,
  `FI` date NOT NULL,
  `FF` date NOT NULL,
  `ESTADO` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT 'ABIERTO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `idinformacion` int(11) NOT NULL,
  `Nombre` varchar(150) DEFAULT NULL,
  `AMIE` varchar(45) DEFAULT NULL,
  `UbicacionGeografica` varchar(45) DEFAULT NULL,
  `Zona` varchar(45) DEFAULT NULL,
  `Distrito` varchar(45) DEFAULT NULL,
  `Circuito` varchar(45) DEFAULT NULL,
  `TipoInstitucion` varchar(45) DEFAULT NULL,
  `Niveles` mediumtext DEFAULT NULL,
  `NumeroEstudiantes` varchar(45) DEFAULT NULL,
  `Mujeres` varchar(45) DEFAULT NULL,
  `Hombres` varchar(45) DEFAULT NULL,
  `NumeroDocentes` varchar(45) DEFAULT NULL,
  `DocMujeres` varchar(45) DEFAULT NULL,
  `DocHombres` varchar(45) DEFAULT NULL,
  `Rector` varchar(145) DEFAULT NULL,
  `Vicerrector` varchar(145) DEFAULT NULL,
  `PrimerVocal` varchar(145) DEFAULT NULL,
  `SegundoVocal` varchar(145) DEFAULT NULL,
  `TercerVocal` varchar(145) DEFAULT NULL,
  `visualizacer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `MATERIA` varchar(45) CHARACTER SET latin1 NOT NULL,
  `NOMBRE` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `DESCRIPCION` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `HORAS` int(11) DEFAULT NULL,
  `NIVEL` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `TIPO` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT 'CUANTITATIVA',
  `ABREVIATURA` varchar(5) CHARACTER SET latin1 NOT NULL,
  `PRIORIDAD` int(5) NOT NULL DEFAULT 0,
  `AREA` varchar(300) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`MATERIA`, `NOMBRE`, `DESCRIPCION`, `HORAS`, `NIVEL`, `TIPO`, `ABREVIATURA`, `PRIORIDAD`, `AREA`) VALUES
('BIBGU', 'BIOLOGÍA', 'BIOLOGÍA', 4, 'DECIMO', 'CUANTITATIVA', 'BIOL', 0, 'CIENCIAS NATURALES'),
('MATE', 'MATEMATICAS', 'MATEMATICAS BASICAS', 6, 'CUARTO EGB', 'CUALITATIVA', 'MAT', 0, 'ÁREA TECNICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiasxcurso`
--

CREATE TABLE `materiasxcurso` (
  `CURSO` varchar(45) CHARACTER SET latin1 NOT NULL,
  `MATERIA` varchar(45) CHARACTER SET latin1 NOT NULL,
  `PROFESOR` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `PERIODO` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materiasxcurso`
--

INSERT INTO `materiasxcurso` (`CURSO`, `MATERIA`, `PROFESOR`, `PERIODO`) VALUES
('CUARTO EGB', 'BIBGU', 'PROF-04', '2024-2025'),
('DECIMO', 'MATE', 'PROF-04', '2024-2025'),
('CUARTO EGB', 'MATE', 'PROF-05', '2024-2025');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `NUMEROMATRICULA` int(11) NOT NULL,
  `ALUMNO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `PERIODO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `CURSO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `CICLO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `ESPECIALIDAD` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `OBSERVACION` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `REFERENCIA` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `SYSRES` varchar(150) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`NUMEROMATRICULA`, `ALUMNO`, `PERIODO`, `CURSO`, `CICLO`, `ESPECIALIDAD`, `FECHA`, `OBSERVACION`, `REFERENCIA`, `SYSRES`) VALUES
(1, 'UEC-1', '2023-2024', 'CUARTO EGB', 'DIVERSIFICADO', 'GENERAL UNIFICADO', '2023-02-10', 'n', '', ''),
(2, 'UEC-10', '2024-2025', 'DECIMO', 'DIVERSIFICADO', 'prompt', '2023-03-28', 'n', '', ''),
(3, 'UEC-100', '2024-2025', 'DECIMO', 'DIVERSIFICADO', 'GENERAL UNIFICADO TECNICO', '2023-03-13', '', '', ''),
(5, 'UEC-102', '2024-2025', 'DECIMO', 'BASICO', 'GENERAL UNIFICADO', '2023-03-17', '', '', ''),
(6, 'UEC-101', '2024-2025', 'CUARTO EGB', 'DIVERSIFICADO', 'GENERAL UNIFICADO', '2023-03-17', '', '', ''),
(7, 'UEC-104', '2024-2025', 'DECIMO', 'DIVERSIFICADO', 'GENERAL UNIFICADO TECNICO', '2023-03-17', '', '', ''),
(11, 'UEC-108', '2024-2025', 'CUARTO EGB', 'DIVERSIFICADO', 'prompt', '2023-03-17', '', '', ''),
(12, 'UEC-113', '2024-2025', 'DECIMO', 'DIVERSIFICADO', 'GENERAL UNIFICADO TECNICO', '2023-03-17', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula_detalle`
--

CREATE TABLE `matricula_detalle` (
  `MATRICULA` int(11) NOT NULL,
  `MATERIA` varchar(45) CHARACTER SET latin1 NOT NULL,
  `QUIM1` decimal(6,2) DEFAULT 0.00,
  `QUIM2` decimal(6,2) DEFAULT 0.00,
  `TOTAL` decimal(6,2) NOT NULL DEFAULT 0.00,
  `PROMF` decimal(6,2) NOT NULL DEFAULT 0.00,
  `EQUIV` varchar(50) CHARACTER SET latin1 NOT NULL,
  `SUM_TOT` decimal(6,2) NOT NULL,
  `PROM_GE` decimal(6,2) NOT NULL,
  `SUPLETORIO` decimal(6,2) DEFAULT 0.00,
  `REMEDIAL` decimal(6,2) DEFAULT 0.00,
  `GRACIA` decimal(6,2) DEFAULT 0.00,
  `PROMOCION` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT 'APRUEBA\nREPRUEBA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matricula_detalle`
--

INSERT INTO `matricula_detalle` (`MATRICULA`, `MATERIA`, `QUIM1`, `QUIM2`, `TOTAL`, `PROMF`, `EQUIV`, `SUM_TOT`, `PROM_GE`, `SUPLETORIO`, `REMEDIAL`, `GRACIA`, `PROMOCION`) VALUES
(1, 'BIBGU', '8.00', '8.00', '9.00', '8.50', '8', '8.25', '8.00', '0.00', '0.00', '0.00', 'APRUEBA'),
(1, 'MATE', '0.00', '0.00', '0.00', '0.00', '8', '8.00', '8.00', '0.00', '0.00', '0.00', 'REPRUEBA'),
(2, 'BIBGU', '0.00', '0.00', '0.00', '0.00', '10', '10.00', '10.00', '0.00', '0.00', '0.00', 'REPRUEBA'),
(2, 'MATE', '8.00', '8.00', '9.00', '8.50', '8', '8.25', '8.00', '0.00', '0.00', '0.00', 'APRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1675281247),
('m130524_201442_init', 1675281256),
('m190124_110200_add_verification_token_column_to_user_table', 1675281257);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasql`
--

CREATE TABLE `notasql` (
  `ID_NOTAS` int(11) NOT NULL,
  `MATRICULA` int(11) NOT NULL,
  `MATERIA` varchar(45) CHARACTER SET latin1 NOT NULL,
  `P1Q1` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `P2Q1` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `EQUIV80` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `EV_QUIM` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `EQUIV20` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `PROM_QUI` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `EQ_CUAL` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `COMP` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `NF` varchar(10) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notasql`
--

INSERT INTO `notasql` (`ID_NOTAS`, `MATRICULA`, `MATERIA`, `P1Q1`, `P2Q1`, `EQUIV80`, `EV_QUIM`, `EQUIV20`, `PROM_QUI`, `EQ_CUAL`, `COMP`, `NF`) VALUES
(1, 1, 'MATE', '8', '10', '80', '80', '20', '10', 'AAR', 'A', '9'),
(2, 1, 'BIBGU', '8', '8', '65', '8', '15', '8', 'AAR', 'B', '8'),
(3, 3, 'MATE', '9', '10', '80', '10', '20', '10', 'DAR', 'A', '10'),
(4, 2, 'MATE', '9', '10', '80', '10', '20', '10', 'DAR', 'A', '10'),
(5, 3, 'BIBGU', '9', '10', '80', '10', '20', '10', 'DAR', 'A', '10'),
(6, 5, 'BIBGU', '9', '10', '80', '10', '20', '10', 'DAR', 'A', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `NUMERO` int(11) NOT NULL,
  `TITULO` varchar(60) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `NOTICIA` longtext DEFAULT NULL,
  `FOTO` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `id_parametro` int(11) NOT NULL,
  `valor_numerico` double(6,2) NOT NULL,
  `valor_entero` bigint(20) NOT NULL,
  `valor_texto` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial`
--

CREATE TABLE `parcial` (
  `QUIMESTRE` varchar(5) CHARACTER SET latin1 NOT NULL,
  `MATRICULA` int(11) NOT NULL,
  `MATERIA` varchar(45) CHARACTER SET latin1 NOT NULL,
  `PARCIAL` int(11) NOT NULL,
  `TAREAS` decimal(6,2) DEFAULT 0.00,
  `AICLASE` decimal(6,2) DEFAULT 0.00,
  `AGRUPAL` decimal(6,2) DEFAULT 0.00,
  `LECCIONES` decimal(6,2) DEFAULT 0.00,
  `PRUEBAPARCIAL` decimal(6,2) DEFAULT 0.00,
  `NOTAL` decimal(6,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `PERIODO` varchar(45) CHARACTER SET latin1 NOT NULL,
  `Fecha_ini_periodo` date DEFAULT NULL,
  `Fecha_fin_periodo` date DEFAULT NULL,
  `estado` varchar(45) CHARACTER SET latin1 DEFAULT 'ABIERTO',
  `rector` varchar(150) CHARACTER SET latin1 NOT NULL,
  `secretario` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`PERIODO`, `Fecha_ini_periodo`, `Fecha_fin_periodo`, `estado`, `rector`, `secretario`) VALUES
('2023-2024', '2023-02-01', '2023-05-25', 'CERRADO', 'ING. MARCO YEPEZ', 'TLGA. SANDRA ALVARADO'),
('2024-2025', '2023-09-04', '2024-07-30', 'ABIERTO', 'ING. MARCO YEPEZ', 'TLGA. SANDRA ALVARADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portada`
--

CREATE TABLE `portada` (
  `idsitio` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `subtitulo` varchar(45) DEFAULT NULL,
  `cuerpo` longtext DEFAULT NULL,
  `foto` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `PROFESOR` varchar(45) CHARACTER SET latin1 NOT NULL,
  `CEDULA` varchar(25) CHARACTER SET latin1 NOT NULL,
  `NOMBRES` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `DESCRIPCION` varchar(205) CHARACTER SET latin1 DEFAULT NULL,
  `DIRECCION` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `TELEFONO` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `FOTO` blob DEFAULT NULL,
  `CORREO` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `CLAVE` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `HOJAVIDA` longblob DEFAULT NULL,
  `AREA` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `ESTADO` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`PROFESOR`, `CEDULA`, `NOMBRES`, `DESCRIPCION`, `DIRECCION`, `TELEFONO`, `FECHA_NACIMIENTO`, `FOTO`, `CORREO`, `CLAVE`, `HOJAVIDA`, `AREA`, `ESTADO`) VALUES
('PROF-04', '0302164397', 'Carolina Aguaiza', '', '', '', '1983-03-01', NULL, 'caroag@gmail.com', '12345', NULL, '', 'ACTIVO'),
('PROF-05', '0102456678', 'Juan', 'as', 'Cuenca', '', NULL, 0x75706c6f6164732f363431306436636534333664352e6a7067, 'prueba@gmailcom', 'prueba1245', 0x686f6a61766964612f363431306436636534333666312e706466, '', 'ACTIVO'),
('PROF-06', '0102020345', 'Luis Vega', '', '', '', '1983-03-01', 0x75706c6f6164732f363431306463383465646332302e706e67, 'luisve@gmail.com', 'luisveg1234', 0x686f6a61766964612f363431306463383465646333312e706466, '', 'ACTIVO'),
('PROF-3', '0302164398', 'Martin', 'as', 'Cuenca', '7894554545', '1987-02-13', 0x75706c6f6164732f313637373838333631375f2e6a7067, 'martin@gmail.com', '12345', NULL, 'Lengua y Literatura', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quimestres`
--

CREATE TABLE `quimestres` (
  `QUIMESTRE` varchar(5) CHARACTER SET latin1 NOT NULL,
  `MATRICULA` int(11) NOT NULL,
  `MATERIA` varchar(45) CHARACTER SET latin1 NOT NULL,
  `PROMEDIOPARCIAL` decimal(6,2) DEFAULT 0.00,
  `OCHENTA` decimal(6,2) DEFAULT 0.00,
  `EXAMENQUIMESTRAL` decimal(6,2) DEFAULT 0.00,
  `VEINTE` decimal(6,2) DEFAULT 0.00,
  `NOTAQUIMESTRE` decimal(6,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(6, 'Admin', 'AMIigvNCelKYUShRETBY3l7v3TaPXT23', '$2y$13$5hWeSzwxY9N78ENkxsTjP.4FqpZi9gVtMbs/i2tGCB5Pozjwvh.n.', NULL, 'claudio.velecela.est@tecazuay.edu.ec', 10, 1675282062, 1675282062, 'KfKoGwbrHR2y5qiAoq8ZoYhSuf_gzZwy_1675282062'),
(7, 'Admin2', 'cAh2p9hCCLDWiUQExaxEAj2T0Gk_JyeM', '$2y$13$AEHWBQ.WOO4Y2yBzkgf8S.peTVHaanRgLr7uq7GOQcpwXeEIFC7H.', NULL, 'admin@apecs.com', 10, 1675282185, 1675282185, 'xyh8n03UFF25xADMcf1RHoowa9pSGq_6_1675282185'),
(8, 'Admin3', 'yCTzJY745BckTpWldTT_HkEr-73K4HLe', '$2y$13$e5nxFe/1bVCJBHngKrYnw.zclt4ul7TGJgvLT.qnPYdrkBFKx8Imu', NULL, 'admin@apecs3.com', 10, 1675461681, 1675461681, '1AfVJQyODNnNxXVVjo4eSHptYLhCJw-P_1675461681'),
(12, '0302164397', '9????Y??`Ŋj??????pd?kK?p\"3?5pi', '$2y$13$/7iQvc5ii/yj2frGkGCk/uBXu.m4Sc.X0J3ddF/Nt.DnlqH6s5C5i', NULL, 'caroag@gmail.com', 10, 1680034976, 1680034976, 's.??,?e?kd?O??B???W	x?oP???_1680034976');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ALUMNO`),
  ADD UNIQUE KEY `ALUMNO_UNIQUE` (`ALUMNO`);

--
-- Indices de la tabla `aopres`
--
ALTER TABLE `aopres`
  ADD PRIMARY KEY (`pork`),
  ADD UNIQUE KEY `pork_UNIQUE` (`pork`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ALUMNO`,`MATRICULA`,`fecha`),
  ADD KEY `MATRICULA` (`MATRICULA`);

--
-- Indices de la tabla `clubxprofesor`
--
ALTER TABLE `clubxprofesor`
  ADD PRIMARY KEY (`club`,`profesor`,`periodo`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`CURSO`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`idinformacion`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`MATERIA`);

--
-- Indices de la tabla `materiasxcurso`
--
ALTER TABLE `materiasxcurso`
  ADD PRIMARY KEY (`CURSO`,`MATERIA`,`PERIODO`),
  ADD KEY `fk_materia_idx` (`MATERIA`),
  ADD KEY `fk_profesor_idx` (`PROFESOR`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`NUMEROMATRICULA`),
  ADD KEY `ALUMNOKF` (`ALUMNO`),
  ADD KEY `ALUMNOFK2_idx` (`PERIODO`),
  ADD KEY `CURSOFK1_idx` (`CURSO`),
  ADD KEY `NUMEROMATRICULA` (`NUMEROMATRICULA`);

--
-- Indices de la tabla `matricula_detalle`
--
ALTER TABLE `matricula_detalle`
  ADD PRIMARY KEY (`MATRICULA`,`MATERIA`),
  ADD KEY `MATRICULADFK2_idx` (`MATERIA`),
  ADD KEY `MATRICULADFK4_idx` (`QUIM1`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `notasql`
--
ALTER TABLE `notasql`
  ADD PRIMARY KEY (`ID_NOTAS`),
  ADD KEY `fkmateri201` (`MATERIA`),
  ADD KEY `matriculas` (`MATRICULA`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`NUMERO`);

--
-- Indices de la tabla `parcial`
--
ALTER TABLE `parcial`
  ADD PRIMARY KEY (`QUIMESTRE`,`MATRICULA`,`MATERIA`,`PARCIAL`),
  ADD KEY `fkmatri203` (`MATRICULA`),
  ADD KEY `fkmateri203` (`MATERIA`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`PERIODO`);

--
-- Indices de la tabla `portada`
--
ALTER TABLE `portada`
  ADD PRIMARY KEY (`idsitio`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`PROFESOR`),
  ADD UNIQUE KEY `CEDULA` (`CEDULA`);

--
-- Indices de la tabla `quimestres`
--
ALTER TABLE `quimestres`
  ADD PRIMARY KEY (`QUIMESTRE`,`MATRICULA`,`MATERIA`),
  ADD KEY `MATRICULAFK_idx` (`MATRICULA`),
  ADD KEY `MATERIAFK2_idx` (`MATERIA`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `NUMEROMATRICULA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `notasql`
--
ALTER TABLE `notasql`
  MODIFY `ID_NOTAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `NUMERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`MATRICULA`) REFERENCES `matriculas` (`NUMEROMATRICULA`),
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`ALUMNO`) REFERENCES `alumnos` (`ALUMNO`);

--
-- Filtros para la tabla `materiasxcurso`
--
ALTER TABLE `materiasxcurso`
  ADD CONSTRAINT `fk_curso4` FOREIGN KEY (`CURSO`) REFERENCES `cursos` (`CURSO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_materia` FOREIGN KEY (`MATERIA`) REFERENCES `materias` (`MATERIA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkprofe201` FOREIGN KEY (`PROFESOR`) REFERENCES `profesores` (`PROFESOR`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `ALUMNOFK2` FOREIGN KEY (`PERIODO`) REFERENCES `periodos` (`PERIODO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ALUMNOKF` FOREIGN KEY (`ALUMNO`) REFERENCES `alumnos` (`ALUMNO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CURSOFK1` FOREIGN KEY (`CURSO`) REFERENCES `cursos` (`CURSO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `matricula_detalle`
--
ALTER TABLE `matricula_detalle`
  ADD CONSTRAINT `MATRICULADFK` FOREIGN KEY (`MATRICULA`) REFERENCES `matriculas` (`NUMEROMATRICULA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `MATRICULADFK2` FOREIGN KEY (`MATERIA`) REFERENCES `materias` (`MATERIA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notasql`
--
ALTER TABLE `notasql`
  ADD CONSTRAINT `materias` FOREIGN KEY (`MATERIA`) REFERENCES `materias` (`MATERIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matriculas` FOREIGN KEY (`MATRICULA`) REFERENCES `matriculas` (`NUMEROMATRICULA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parcial`
--
ALTER TABLE `parcial`
  ADD CONSTRAINT `QUIMESTREFK` FOREIGN KEY (`QUIMESTRE`,`MATRICULA`,`MATERIA`) REFERENCES `quimestres` (`QUIMESTRE`, `MATRICULA`, `MATERIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkmateri203` FOREIGN KEY (`MATERIA`) REFERENCES `materias` (`MATERIA`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmatri203` FOREIGN KEY (`MATRICULA`) REFERENCES `matriculas` (`NUMEROMATRICULA`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `quimestres`
--
ALTER TABLE `quimestres`
  ADD CONSTRAINT `QUIMESFK2` FOREIGN KEY (`MATRICULA`) REFERENCES `matriculas` (`NUMEROMATRICULA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmateri202` FOREIGN KEY (`MATERIA`) REFERENCES `materias` (`MATERIA`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
