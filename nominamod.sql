-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2023 a las 01:18:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nominamod`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_economica`
--

CREATE TABLE `actividad_economica` (
  `codigo_ciiu` varchar(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad_economica`
--

INSERT INTO `actividad_economica` (`codigo_ciiu`, `descripcion`) VALUES
('0111', 'Cultivo de cereales (excepto arroz), legumbres y semillas oleaginosas'),
('0121', 'Cultivo de arroz'),
('1011', 'Procesamiento y conservación de carne'),
('1020', 'Procesamiento y conservación de pescados, crustáceos y moluscos'),
('1030', 'Procesamiento y conservación de frutas, legumbres, hortalizas y tubérculos'),
('4711', 'Comercio al por menor en establecimientos no especializados'),
('4771', 'Comercio al por menor de prendas de vestir en establecimientos especializados'),
('5610', 'Restaurantes y puestos de comidas'),
('6201', 'Actividades de programación informática'),
('7310', 'Publicidad'),
('7911', 'Actividades de agencias de viajes y operadores turísticos'),
('8020', 'Servicios de sistemas de seguridad'),
('8531', 'Educación preescolar'),
('9001', 'Artes escénicas'),
('9311', 'Gestión de instalaciones deportivas'),
('9420', 'Actividades de producción cinematográfica y de video'),
('9602', 'Peluquería y otros tratamientos de belleza'),
('9800', 'Actividades de los hogares como empleadores de personal doméstico'),
('9900', 'Organizaciones y órganos extraterritoriales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` varchar(4) NOT NULL,
  `nombre_area` varchar(255) NOT NULL,
  `desc_area` text DEFAULT NULL,
  `id_division` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nombre_area`, `desc_area`, `id_division`) VALUES
('CS01', 'Soporte al Cliente', 'Atención y soporte a clientes', 'CS08'),
('CS02', 'Resolución de Problemas', 'Manejo y resolución de problemas de clientes', 'CS08'),
('ENG1', 'Diseño de Producto', 'Desarrollo y diseño de nuevos productos', 'ENG6'),
('ENG2', 'Ingeniería de Procesos', 'Optimización y mejora de procesos de producción', 'ENG6'),
('FIN1', 'Contabilidad', 'Gestión y registro de transacciones financieras', 'FIN5'),
('FIN2', 'Planificación Financiera', 'Desarrollo de estrategias y planes financieros', 'FIN5'),
('IT01', 'Infraestructura', 'Gestión de la infraestructura tecnológica y servicios', 'IT04'),
('IT02', 'Desarrollo de Software', 'Creación y mantenimiento de software', 'IT04'),
('LOG1', 'Distribución', 'Gestión de la distribución de productos y logística', 'LOG1'),
('MKT1', 'Investigación de Mercado', 'Análisis y estudio de mercado para estrategias de marketing', 'MKT1'),
('MKT2', 'Publicidad', 'Desarrollo y ejecución de campañas publicitarias', 'MKT1'),
('OPS1', 'Cadena de Suministro', 'Gestión y optimización de la cadena de suministro', 'OPS7'),
('OPS2', 'Operaciones', 'Gestión general de operaciones y procesos', 'OPS7'),
('PRD1', 'Producción', 'Gestión del proceso de producción y fabricación', 'PRD1'),
('PRD2', 'Ensamblaje', 'Ensamblaje y montaje de productos', 'PRD1'),
('QA01', 'Control de Calidad', 'Implementación y seguimiento de estándares de calidad', 'QA09'),
('QA02', 'Mejora Continua', 'Desarrollo y aplicación de procesos de mejora continua', 'QA09'),
('RD01', 'Investigación y Desarrollo', 'Investigación y desarrollo de nuevas tecnologías', 'RD10'),
('RD02', 'Innovación', 'Desarrollo de nuevas ideas y productos innovadores', 'RD10'),
('RH01', 'Selección de Personal', 'Gestión del proceso de selección de personal', 'HR01'),
('RH02', 'Desarrollo Organizacional', 'Desarrollo de estrategias para el crecimiento organizacional', 'HR01'),
('RH03', 'Compensación y Beneficios', 'Administración de la compensación y beneficios para empleados', 'HR01'),
('SAL1', 'Gestión de Cuentas', 'Manejo y desarrollo de relaciones con clientes y cuentas comerciales', 'SAL3'),
('SAL2', 'Desarrollo Comercial', 'Planificación y ejecución de estrategias de desarrollo comercial', 'SAL3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_salarial`
--

CREATE TABLE `asignacion_salarial` (
  `id_asignacion` varchar(5) NOT NULL,
  `salario_basico` float NOT NULL,
  `id_grado` varchar(4) NOT NULL,
  `id_cargo` varchar(4) NOT NULL,
  `id_nivel` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` varchar(4) NOT NULL,
  `descripcion_cargo` text NOT NULL,
  `nombre_cargo` varchar(255) NOT NULL,
  `id_nivel` varchar(4) NOT NULL,
  `id_riesgo` varchar(4) NOT NULL,
  `nit` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `cod_ciudad` varchar(5) NOT NULL,
  `nombre_ciudad` varchar(255) NOT NULL,
  `cod_depto` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`cod_ciudad`, `nombre_ciudad`, `cod_depto`) VALUES
('05001', 'Medellín', '05'),
('08001', 'Barranquilla', '08'),
('13001', 'Cartagena', '13'),
('15001', 'Tunja', '15'),
('17001', 'Manizales', '17'),
('18001', 'Florencia', '18'),
('19001', 'Popayán', '19'),
('20001', 'Valledupar', '20'),
('23001', 'Montería', '23'),
('25001', 'Bogotá', '25'),
('27001', 'Quibdó', '27'),
('41001', 'Neiva', '41'),
('44001', 'Riohacha', '44'),
('47001', 'Santa Marta', '47'),
('50001', 'Villavicencio', '50'),
('81001', 'Arauca', '81'),
('85001', 'Yopal', '85'),
('91001', 'Leticia', '91'),
('94001', 'Inírida', '94'),
('95001', 'San José del Guaviare', '95');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id_contrato` varchar(4) NOT NULL,
  `salario_estipulado` decimal(15,2) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado_contrato` varchar(50) DEFAULT NULL,
  `periodo_pago` varchar(50) DEFAULT NULL,
  `id_tipo_contrato` varchar(4) DEFAULT NULL,
  `identificacion_empleado` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_bancaria`
--

CREATE TABLE `cuenta_bancaria` (
  `nro_cuenta` varchar(20) NOT NULL,
  `certificacion` text DEFAULT NULL,
  `id_tipo_cuenta` varchar(4) DEFAULT NULL,
  `cod_banco` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `cod_depto` varchar(4) NOT NULL,
  `nombre_depto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`cod_depto`, `nombre_depto`) VALUES
('05', 'Antioquia'),
('08', 'Atlántico'),
('13', 'Bolívar'),
('15', 'Boyacá'),
('17', 'Caldas'),
('18', 'Caquetá'),
('19', 'Cauca'),
('20', 'Cesar'),
('23', 'Córdoba'),
('25', 'Cundinamarca'),
('27', 'Chocó'),
('41', 'Huila'),
('44', 'La Guajira'),
('47', 'Magdalena'),
('50', 'Meta'),
('81', 'Arauca'),
('85', 'Casanare'),
('91', 'Amazonas'),
('94', 'Guainía'),
('95', 'Guaviare');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE `division` (
  `id_division` varchar(4) NOT NULL,
  `nombre_division` varchar(255) NOT NULL,
  `desc_division` text DEFAULT NULL,
  `nit` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `division`
--

INSERT INTO `division` (`id_division`, `nombre_division`, `desc_division`, `nit`) VALUES
('ADM1', 'Admin', 'Gestión administrativa y secretaría', '500345678'),
('ADM3', 'Admi', 'Gestión administrativa y dirección ejecutiva', '990234567'),
('CS08', 'Servicio al Cliente', 'Atención al cliente y soporte', '700456789'),
('CS2', 'SrvCli', 'Atención al cliente y soporte técnico', '100890123'),
('ENG1', 'Desp', 'Desarrollo y diseño de productos', '400567890'),
('ENG2', 'Ing', 'Desarrollo y diseño de productos', '990234567'),
('ENG6', 'Ingeniería', 'Desarrollo y diseño de productos', '800987654'),
('FIN2', 'Fina', 'Contabilidad y gestión financiera', '200789012'),
('FIN5', 'Finanzas', 'Contabilidad y gestión financiera', '800987654'),
('HR01', 'Recursos Humanos', 'Gestión del talento y recursos humanos', '900123456'),
('HR1', 'RHH', 'Gestión del talento y recursos humanos', '300678901'),
('IT04', 'Tecnología de la Información', 'Gestión de la infraestructura y desarrollo de software', '800987654'),
('IT20', 'TI', 'Soporte técnico y desarrollo de software', '300678901'),
('LOG1', 'Logis', 'Gestión de la cadena de suministro y distribución', '600234567'),
('LOG2', 'Logs', 'Gestión de la cadena de suministro y distribución', '990234567'),
('MKT1', 'Marketing', 'Desarrollo y ejecución de estrategias de marketing', '900123456'),
('MKT2', 'Mkt', 'Desarrollo de estrategias de marketing', '100890123'),
('MRKT', 'Mktn', 'Investigación de mercado y estrategias de marketing', '500345678'),
('OPS1', 'Oper', 'Gestión de operaciones y procesos', '400567890'),
('OPS7', 'Operaciones', 'Gestión de la cadena de suministro y operaciones', '700456789'),
('PRD1', 'Prod', 'Proceso de fabricación y ensamblaje', '600234567'),
('PRO2', 'Prod', 'Proceso de fabricación y ensamblaje', '200789012'),
('QA09', 'Ctrl', 'Garantía de calidad y control de procesos', '700456789'),
('QA21', 'Cal', 'Control de calidad y mejora continua', '300678901'),
('RD10', 'I+D', 'Investigación y desarrollo de nuevos productos', '600234567'),
('RD22', 'I+D', 'Innovación y desarrollo de nuevas tecnologías', '200789012'),
('SAL1', 'Vent', 'Equipo de ventas y desarrollo comercial', '500345678'),
('SAL2', 'Vtas', 'Equipo de ventas y desarrollo comercial', '100890123'),
('SAL3', 'Ventas', 'Equipo de ventas y desarrollo comercial', '900123456'),
('SUP1', 'CDS', 'Gestión de la cadena de suministro y logística', '400567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `identificacion` varchar(12) NOT NULL,
  `nombre1` varchar(255) NOT NULL,
  `nombre2` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `estado_civil` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `tipo_sangre` varchar(10) NOT NULL,
  `nomenclatura` varchar(255) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `zona` varchar(255) NOT NULL,
  `id_supervisor` varchar(12) DEFAULT NULL,
  `cod_sede` varchar(4) NOT NULL,
  `id_area` varchar(4) NOT NULL,
  `nro_cuenta` varchar(20) DEFAULT NULL,
  `id_tipo_empleado` varchar(4) DEFAULT NULL,
  `doc_identidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`identificacion`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `estado_civil`, `correo`, `sexo`, `tipo_sangre`, `nomenclatura`, `calle`, `zona`, `id_supervisor`, `cod_sede`, `id_area`, `nro_cuenta`, `id_tipo_empleado`, `doc_identidad`) VALUES
('1000381826', 'Mateo', 'Prieto', 'Jimenez', 'Me comi el nombre 2', 'Viuda', 'nicompj@gmail.com', 'M', 'C', 'N', 'N', 'N', NULL, 'SE01', 'ENG1', NULL, 'C1', 'Cedula'),
('1141114713', 'Martina', 'Antonio', 'Rodriguez', 'Eureka', 'Pensionado', 'Disponible@gmaul.csa', 'M', 'O', 'Nomenclatura', 'Calle', '45', '1000381826', 'SE15', 'RD01', NULL, 'C1', 'cedula_ciudadania');

--
-- Disparadores `empleado`
--
DELIMITER $$
CREATE TRIGGER `after_insert_empleado` AFTER INSERT ON `empleado` FOR EACH ROW BEGIN
    INSERT INTO usuario (
        identidad_usuario,
        tipo_documento,
        nombre_usuario,
        apellido_usuario,
        id_tipo_usuario,
        telef_usuario,
        direcc_usuario,
        correo_usuario,
        password_usuario,
        usuario_sistema,
        estado_usuario
    )
    VALUES (
        NEW.identificacion,
        NEW.doc_identidad,
        CONCAT(NEW.nombre1, ' ', NEW.nombre2),
        CONCAT(NEW.apellido1, ' ', NEW.apellido2),
        '3',
        NULL,
        CONCAT(NEW.nomenclatura, ' ', NEW.calle, ' ', NEW.zona),
        NEW.correo,
        PASSWORD(NEW.identificacion), -- Almacenar la contraseña utilizando PASSWORD()
        SUBSTRING(MD5(RAND()) FROM 1 FOR 8),
        '1'
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `nit` varchar(12) NOT NULL,
  `correo_empresa1` varchar(255) DEFAULT NULL,
  `correo_empresa2` varchar(255) DEFAULT NULL,
  `razon_social` varchar(255) NOT NULL,
  `telefono_empresa1` varchar(15) DEFAULT NULL,
  `telefono_empresa2` varchar(15) DEFAULT NULL,
  `codigo_ciiu` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`nit`, `correo_empresa1`, `correo_empresa2`, `razon_social`, `telefono_empresa1`, `telefono_empresa2`, `codigo_ciiu`) VALUES
('100890123', 'info@empresa9.com', 'marketing@empresa9.com', 'Empresa 9 S.A.', '8901234567', '4321098765', '6201'),
('200789012', 'info@empresa8.com', 'administracion@empresa8.com', 'Empresa 8 S.A.S.', '7890123456', '3210987654', '9001'),
('300678901', 'info@empresa7.com', 'rrhh@empresa7.com', 'Empresa 7 Ltda.', '6789012345', '1098765432', '4711'),
('400567890', 'info@empresa6.com', 'compras@empresa6.com', 'Empresa 6 S.A.', '5678901234', '2109876543', '1020'),
('500345678', 'info@empresa5.com', 'facturacion@empresa5.com', 'Empresa 5 Ltda.', '3456789012', '4321098765', '5610'),
('600234567', 'info@empresa4.com', 'clientes@empresa4.com', 'Empresa 4 S.A.S.', '2345678901', '5432109876', '4771'),
('700456789', 'info@empresa3.com', 'soporte@empresa3.com', 'Empresa 3 S.A.', '4567890123', '3210987654', '7310'),
('800987654', 'info@empresa2.com', 'ventas@empresa2.com', 'Empresa 2 Ltda.', '9876543210', '1234567890', '6201'),
('900123456', 'info@empresa1.com', 'contacto@empresa1.com', 'Empresa 1 S.A.S.', '1234567890', '9876543210', '5610'),
('990234567', 'info@empresa10.com', 'ventas@empresa10.com', 'Empresa 10 Ltda.', '2345678901', '7654321098', '5610');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_cuenta_bancaria`
--

CREATE TABLE `empresa_cuenta_bancaria` (
  `id_empresa` varchar(12) NOT NULL,
  `nro_cuenta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad_bancaria`
--

CREATE TABLE `entidad_bancaria` (
  `cod_banco` varchar(4) NOT NULL,
  `direccion_banco` varchar(255) DEFAULT NULL,
  `nombre_banco` varchar(255) DEFAULT NULL,
  `correo1` varchar(255) DEFAULT NULL,
  `correo2` varchar(255) DEFAULT NULL,
  `telefono1` varchar(20) DEFAULT NULL,
  `telefono2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudio`
--

CREATE TABLE `estudio` (
  `id_estudio` varchar(4) NOT NULL,
  `institucion` varchar(255) DEFAULT NULL,
  `nivel_estudio` varchar(255) DEFAULT NULL,
  `año_inicio` int(11) DEFAULT NULL,
  `año_fin` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `identificacion` varchar(12) NOT NULL,
  `certificacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar`
--

CREATE TABLE `familiar` (
  `identificacion_con` varchar(12) NOT NULL,
  `nombre1` varchar(50) DEFAULT NULL,
  `nombre2` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `telefono1` varchar(20) DEFAULT NULL,
  `telefono2` varchar(20) DEFAULT NULL,
  `parentezco` varchar(50) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `identificacion` varchar(12) DEFAULT NULL,
  `doc_identidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` varchar(4) NOT NULL,
  `nombre_grado` varchar(255) NOT NULL,
  `nit` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` varchar(4) NOT NULL,
  `nombre_nivel` varchar(255) NOT NULL,
  `nit` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_riesgo`
--

CREATE TABLE `nivel_riesgo` (
  `id_riesgo` varchar(4) NOT NULL,
  `descripcion_riesgo` varchar(255) NOT NULL,
  `porcentajer` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `cod_sede` varchar(4) NOT NULL,
  `nombre_sede` varchar(255) NOT NULL,
  `nomenclatura` varchar(255) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `zona` varchar(50) DEFAULT NULL,
  `cod_postal` varchar(10) DEFAULT NULL,
  `cod_ciudad` varchar(5) NOT NULL,
  `nit` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`cod_sede`, `nombre_sede`, `nomenclatura`, `numero`, `zona`, `cod_postal`, `cod_ciudad`, `nit`) VALUES
('SE01', 'Sede Principal', 'NOM001', '123', 'Zona Norte', '110010', '05001', '900123456'),
('SE02', 'Sucursal A', 'NOM002', '456', 'Zona Este', '220020', '08001', '800987654'),
('SE03', 'Sucursal B', 'NOM003', '789', 'Zona Oeste', '330030', '13001', '700456789'),
('SE04', 'Sede Central', 'NOM004', '101', 'Zona Sur', '440040', '15001', '600234567'),
('SE05', 'Sucursal C', 'NOM005', '112', 'Zona Centro', '550050', '17001', '500345678'),
('SE06', 'Sucursal D', 'NOM006', '213', 'Zona Norte', '660060', '18001', '400567890'),
('SE07', 'Sede Ejecutiva', 'NOM007', '314', 'Zona Este', '770070', '27001', '300678901'),
('SE08', 'Sucursal E', 'NOM008', '415', 'Zona Oeste', '880080', '23001', '200789012'),
('SE09', 'Sucursal F', 'NOM009', '516', 'Zona Sur', '990090', '25001', '100890123'),
('SE10', 'Sede Administrativa', 'NOM010', '617', 'Zona Centro', '101100', '94001', '990234567'),
('SE11', 'Sede Industrial', 'NOM011', '718', 'Zona Norte', '112110', '95001', '900123456'),
('SE12', 'Sucursal G', 'NOM012', '819', 'Zona Este', '223220', '41001', '800987654'),
('SE13', 'Sucursal H', 'NOM013', '920', 'Zona Oeste', '334330', '44001', '700456789'),
('SE14', 'Sede Logística', 'NOM014', '102', 'Zona Sur', '445440', '47001', '600234567'),
('SE15', 'Sede Comercial', 'NOM015', '203', 'Zona Centro', '556550', '50001', '500345678'),
('SE16', 'Sucursal I', 'NOM016', '304', 'Zona Norte', '667660', '81001', '400567890'),
('SE17', 'Sucursal J', 'NOM017', '405', 'Zona Este', '778770', '85001', '300678901'),
('SE18', 'Sede de Producción', 'NOM018', '506', 'Zona Oeste', '889880', '91001', '200789012'),
('SE19', 'Sucursal K', 'NOM019', '607', 'Zona Sur', '990990', '94001', '100890123'),
('SE20', 'Sede de Investigación', 'NOM020', '708', 'Zona Centro', '101001', '95001', '990234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `id_tipo_contrato` varchar(4) NOT NULL,
  `tipo_contrato` varchar(50) DEFAULT NULL,
  `descripcion_tc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cuenta`
--

CREATE TABLE `tipo_cuenta` (
  `id_tipo_cuenta` varchar(4) NOT NULL,
  `nombre_tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `id_tipo_empleado` varchar(4) NOT NULL,
  `nombre_tipo_empleado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_empleado`
--

INSERT INTO `tipo_empleado` (`id_tipo_empleado`, `nombre_tipo_empleado`) VALUES
('C1', 'Contratista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Operador'),
(3, 'Lector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `identidad_usuario` varchar(12) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `apellido_usuario` varchar(255) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `telef_usuario` varchar(15) DEFAULT NULL,
  `direcc_usuario` varchar(255) NOT NULL,
  `correo_usuario` varchar(255) NOT NULL,
  `password_usuario` varchar(255) NOT NULL,
  `usuario_sistema` varchar(50) NOT NULL,
  `estado_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`identidad_usuario`, `tipo_documento`, `nombre_usuario`, `apellido_usuario`, `id_tipo_usuario`, `telef_usuario`, `direcc_usuario`, `correo_usuario`, `password_usuario`, `usuario_sistema`, `estado_usuario`) VALUES
('1000381826', 'cedula_ciudadania', 'Jose', 'Antonio', 1, '3015058861', 'Soacha', 'nicompj@gmail.com', '$2y$10$vkrzUakcIcyEage.3Th8fOO5iblYSjkSsly2CE.T/X.rH9NWS1tGO', 'Usuario1', 1),
('1141114713', 'cedula_ciudadania', 'Martina Antonio', 'Rodriguez Eureka', 3, NULL, 'Nomenclatura Calle 45', 'Disponible@gmaul.csa', '*46088910A6E5FC2F59BBB68995CB19B95328D341', '99dd528b', 1),
('79845345', 'cedula_extranjeria', 'Martin', 'Albeiro', 1, '3009896531', 'Soacha', 'nicompj@gmail.com', '$2y$10$At2nQ9MzyOvm/QLgusz2guU63EfoSofncU5kVw1/OvNrVKi3z2EYa', 'Usuario1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificacion_usuario`
--

CREATE TABLE `verificacion_usuario` (
  `id_verificacion` int(11) NOT NULL,
  `codigo_verificacion` varchar(255) NOT NULL,
  `fecha_verificacion` date NOT NULL,
  `hora_verificacion` time NOT NULL,
  `identidad_usuario` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `verificacion_usuario`
--

INSERT INTO `verificacion_usuario` (`id_verificacion`, `codigo_verificacion`, `fecha_verificacion`, `hora_verificacion`, `identidad_usuario`) VALUES
(2, '8873', '2023-12-10', '20:20:36', '1000381826'),
(3, '8873', '2023-12-10', '12:30:00', '1000381826'),
(4, '8873', '2023-12-10', '14:45:00', '1000381826'),
(5, '8873', '2023-12-10', '17:15:00', '1000381826'),
(6, '8873', '2023-12-10', '19:30:00', '1000381826'),
(7, '8873', '2023-12-10', '21:45:00', '1000381826'),
(8, '8873', '2023-12-11', '09:00:00', '1000381826'),
(9, '8873', '2023-12-11', '11:30:00', '1000381826'),
(10, '8873', '2023-12-11', '14:00:00', '1000381826'),
(11, '8873', '2023-12-11', '16:45:00', '1000381826'),
(12, '8873', '2023-12-11', '19:15:00', '1000381826'),
(13, '7623', '2023-12-13', '01:16:47', '79845345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_economica`
--
ALTER TABLE `actividad_economica`
  ADD PRIMARY KEY (`codigo_ciiu`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `id_division` (`id_division`);

--
-- Indices de la tabla `asignacion_salarial`
--
ALTER TABLE `asignacion_salarial`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `id_grado` (`id_grado`,`id_cargo`,`id_nivel`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `id_nivel` (`id_nivel`),
  ADD KEY `id_riesgo` (`id_riesgo`),
  ADD KEY `nit` (`nit`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`cod_ciudad`),
  ADD KEY `cod_depto` (`cod_depto`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `id_tipo_contrato` (`id_tipo_contrato`),
  ADD KEY `identificacion_empleado` (`identificacion_empleado`);

--
-- Indices de la tabla `cuenta_bancaria`
--
ALTER TABLE `cuenta_bancaria`
  ADD PRIMARY KEY (`nro_cuenta`),
  ADD KEY `id_tipo_cuenta` (`id_tipo_cuenta`),
  ADD KEY `cod_banco` (`cod_banco`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`cod_depto`);

--
-- Indices de la tabla `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id_division`),
  ADD KEY `nit` (`nit`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`identificacion`),
  ADD UNIQUE KEY `nro_cuenta` (`nro_cuenta`),
  ADD KEY `id_supervisor` (`id_supervisor`),
  ADD KEY `cod_sede` (`cod_sede`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `fk_tipo_empleado` (`id_tipo_empleado`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`nit`),
  ADD KEY `codigo_ciiu` (`codigo_ciiu`);

--
-- Indices de la tabla `empresa_cuenta_bancaria`
--
ALTER TABLE `empresa_cuenta_bancaria`
  ADD PRIMARY KEY (`id_empresa`,`nro_cuenta`),
  ADD KEY `nro_cuenta` (`nro_cuenta`);

--
-- Indices de la tabla `entidad_bancaria`
--
ALTER TABLE `entidad_bancaria`
  ADD PRIMARY KEY (`cod_banco`);

--
-- Indices de la tabla `estudio`
--
ALTER TABLE `estudio`
  ADD PRIMARY KEY (`id_estudio`),
  ADD KEY `identificacion` (`identificacion`);

--
-- Indices de la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`identificacion_con`),
  ADD KEY `identificacion` (`identificacion`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`),
  ADD KEY `nit` (`nit`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`),
  ADD KEY `nit` (`nit`);

--
-- Indices de la tabla `nivel_riesgo`
--
ALTER TABLE `nivel_riesgo`
  ADD PRIMARY KEY (`id_riesgo`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`cod_sede`),
  ADD KEY `cod_ciudad` (`cod_ciudad`),
  ADD KEY `nit` (`nit`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`id_tipo_contrato`);

--
-- Indices de la tabla `tipo_cuenta`
--
ALTER TABLE `tipo_cuenta`
  ADD PRIMARY KEY (`id_tipo_cuenta`);

--
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`id_tipo_empleado`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`identidad_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- Indices de la tabla `verificacion_usuario`
--
ALTER TABLE `verificacion_usuario`
  ADD PRIMARY KEY (`id_verificacion`),
  ADD KEY `fk_id_usuario` (`identidad_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `verificacion_usuario`
--
ALTER TABLE `verificacion_usuario`
  MODIFY `id_verificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`id_division`) REFERENCES `division` (`id_division`);

--
-- Filtros para la tabla `asignacion_salarial`
--
ALTER TABLE `asignacion_salarial`
  ADD CONSTRAINT `asignacion_salarial_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `asignacion_salarial_ibfk_2` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`),
  ADD CONSTRAINT `asignacion_salarial_ibfk_3` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`);

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_2` FOREIGN KEY (`id_riesgo`) REFERENCES `nivel_riesgo` (`id_riesgo`),
  ADD CONSTRAINT `cargo_ibfk_3` FOREIGN KEY (`nit`) REFERENCES `empresa` (`nit`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`cod_depto`) REFERENCES `departamento` (`cod_depto`);

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`id_tipo_contrato`) REFERENCES `tipo_contrato` (`id_tipo_contrato`),
  ADD CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`identificacion_empleado`) REFERENCES `empleado` (`identificacion`);

--
-- Filtros para la tabla `cuenta_bancaria`
--
ALTER TABLE `cuenta_bancaria`
  ADD CONSTRAINT `cuenta_bancaria_ibfk_1` FOREIGN KEY (`id_tipo_cuenta`) REFERENCES `tipo_cuenta` (`id_tipo_cuenta`),
  ADD CONSTRAINT `cuenta_bancaria_ibfk_2` FOREIGN KEY (`cod_banco`) REFERENCES `entidad_bancaria` (`cod_banco`);

--
-- Filtros para la tabla `division`
--
ALTER TABLE `division`
  ADD CONSTRAINT `division_ibfk_1` FOREIGN KEY (`nit`) REFERENCES `empresa` (`nit`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_supervisor`) REFERENCES `empleado` (`identificacion`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`cod_sede`) REFERENCES `sede` (`cod_sede`),
  ADD CONSTRAINT `empleado_ibfk_5` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`),
  ADD CONSTRAINT `fk_empleado_cuenta_bancaria` FOREIGN KEY (`nro_cuenta`) REFERENCES `cuenta_bancaria` (`nro_cuenta`),
  ADD CONSTRAINT `fk_tipo_empleado` FOREIGN KEY (`id_tipo_empleado`) REFERENCES `tipo_empleado` (`id_tipo_empleado`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`codigo_ciiu`) REFERENCES `actividad_economica` (`codigo_ciiu`);

--
-- Filtros para la tabla `empresa_cuenta_bancaria`
--
ALTER TABLE `empresa_cuenta_bancaria`
  ADD CONSTRAINT `empresa_cuenta_bancaria_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`nit`),
  ADD CONSTRAINT `empresa_cuenta_bancaria_ibfk_2` FOREIGN KEY (`nro_cuenta`) REFERENCES `cuenta_bancaria` (`nro_cuenta`);

--
-- Filtros para la tabla `estudio`
--
ALTER TABLE `estudio`
  ADD CONSTRAINT `estudio_ibfk_1` FOREIGN KEY (`identificacion`) REFERENCES `empleado` (`identificacion`);

--
-- Filtros para la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD CONSTRAINT `familiar_ibfk_1` FOREIGN KEY (`identificacion`) REFERENCES `empleado` (`identificacion`);

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`cod_ciudad`) REFERENCES `ciudad` (`cod_ciudad`),
  ADD CONSTRAINT `sede_ibfk_2` FOREIGN KEY (`nit`) REFERENCES `empresa` (`nit`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `verificacion_usuario`
--
ALTER TABLE `verificacion_usuario`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`identidad_usuario`) REFERENCES `usuario` (`identidad_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
