-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2016 at 02:46 PM
-- Server version: 5.5.47-0+deb8u1
-- PHP Version: 5.6.17-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foro-cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake_sessions`
--

CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cake_sessions`
--

INSERT INTO `cake_sessions` (`id`, `data`, `expires`) VALUES
('1asg2m59jub63p54n8h9ou7f86', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457837308;s:9:"countdown";i:8;}Message|a:0:{}', 1457837308),
('20nm6prod8g8lq0lglvggjpv41', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457834558;s:9:"countdown";i:2;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"3";s:8:"username";s:9:"pulidovpe";s:6:"nombre";s:15:"Pulido V. P. E.";s:6:"correo";s:18:"correo@dominio.com";s:4:"role";s:1:"3";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-09";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"0";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-09 23:42:56";s:8:"modified";s:19:"2016-03-12 19:15:35";}}Message|a:0:{}', 1457834558),
('3ehuv1b26k9vkbn6bgvar3l1j7', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457925009;s:9:"countdown";i:1;}Message|a:0:{}Auth|a:0:{}', 1457925009),
('43srh6v79kssdnehu76gtotm95', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1458015957;s:9:"countdown";i:8;}Message|a:0:{}', 1458015957),
('49nr4q10pqi1omec5p68on4ur5', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457625403;s:9:"countdown";i:4;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"3";s:8:"username";s:9:"pulidovpe";s:6:"nombre";s:15:"Pulido V. P. E.";s:6:"correo";s:18:"correo@dominio.com";s:4:"role";s:1:"3";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-09";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"0";s:11:"comentarios";s:1:"1";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-09 23:42:56";s:8:"modified";s:19:"2016-03-09 23:54:58";}}Message|a:0:{}', 1457625403),
('5tejqt4v72p7qao23kq6u3r0d7', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457832950;s:9:"countdown";i:10;}', 1457832950),
('7i818pi5csk40r4aqbje1cddh4', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457879301;s:9:"countdown";i:7;}Message|a:0:{}Auth|a:0:{}', 1457879301),
('84ij3273dhjmsibqbcrcqd6f37', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1458063192;s:9:"countdown";i:10;}', 1458063192),
('8chnvq9nde51cnhimidbbgptg1', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457970306;s:9:"countdown";i:6;}Message|a:0:{}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"3";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-14 09:28:39";}}', 1457970306),
('9ehgqq5kimakl5cv5djk4uf5t2', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457920639;s:9:"countdown";i:10;}Message|a:0:{}', 1457920639),
('a7bs5dlj35ht94ftoh4mhj0070', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457730892;s:9:"countdown";i:10;}', 1457730892),
('b4clh4r0np833kjeg9q9hou3i1', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457966356;s:9:"countdown";i:10;}', 1457966356),
('b69efohdt48t6uh52jshcpdo42', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457649405;s:9:"countdown";i:10;}', 1457649405),
('bhjcl7tflu89d1pfalqc7k8tk4', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457630722;s:9:"countdown";i:6;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"3";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-09 23:43:01";}}Message|a:0:{}', 1457630735),
('d5g0bm347lv6v2katvjvfkpld4', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457731541;s:9:"countdown";i:7;}Message|a:0:{}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"3";s:8:"username";s:9:"pulidovpe";s:6:"nombre";s:15:"Pulido V. P. E.";s:6:"correo";s:18:"correo@dominio.com";s:4:"role";s:1:"3";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-09";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"0";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-09 23:42:56";s:8:"modified";s:19:"2016-03-11 15:28:30";}}', 1457731541),
('e70u99b3utuca2ouuc4kmofm94', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1458070812;s:9:"countdown";i:6;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"2";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-15 12:03:11";}}Message|a:0:{}', 1458070812),
('eas6gb55okme6tfam12p6gufd7', 'Config|a:3:{s:9:"userAgent";s:32:"a7274ceaf049945513ac3c0dc5854052";s:4:"time";i:1457540468;s:9:"countdown";i:5;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"2";s:8:"username";s:6:"alejo2";s:6:"nombre";s:13:"Manuel Castro";s:6:"correo";s:22:"alejocastro2@gmail.com";s:4:"role";s:1:"3";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-09";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"2";s:11:"comentarios";s:1:"1";s:6:"avatar";s:6:"alejo2";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-09 14:47:10";s:8:"modified";s:19:"2016-03-09 14:49:48";}}Message|a:0:{}', 1457540468),
('fcjuc1hl0g8ipqeu8ics2fe1q7', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457920998;s:9:"countdown";i:4;}Message|a:0:{}', 1457920998),
('fo9qo645ocho3rkhajtu9h67i7', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457498778;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"0";s:11:"comentarios";s:1:"0";s:6:"avatar";s:0:"";s:10:"ip_cliente";s:12:"10.240.0.192";s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-09 00:38:56";}}Message|a:0:{}', 1457498778),
('fqi879kvp69k8t2b3ink4dcqk6', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457904697;s:9:"countdown";i:6;}Message|a:0:{}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"3";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-12 20:05:50";}}', 1457904697),
('gq9jir7omijsf59u63ff0a2le2', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457649678;s:9:"countdown";i:8;}Message|a:0:{}Auth|a:0:{}', 1457649678),
('gs5h8mfbvc732ch22kj3gj9kt0', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457924593;s:9:"countdown";i:10;}', 1457924593),
('h133bs1iqnet4rsf8o1s0bntr7', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457716388;s:9:"countdown";i:10;}Auth|a:0:{}Message|a:0:{}', 1457716388),
('hvteh4c6fh63vl0lg014b05ps0', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457976325;s:9:"countdown";i:8;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"3";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";s:9:"127.0.0.1";s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-14 09:29:11";}}Message|a:0:{}KCEDITOR|a:1:{s:8:"disabled";b:0;}', 1457976325),
('j7blc1f13gsbngurrvcrlvsig0', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457478792;s:9:"countdown";i:8;}Message|a:0:{}Auth|a:0:{}', 1457478792),
('k5a6uv3if8k25qb2hrojdbodm6', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457587499;s:9:"countdown";i:4;}Message|a:0:{}Auth|a:0:{}', 1457587499),
('m56mbksmq6joce3fov8b585fk3', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457499494;s:9:"countdown";i:9;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"0";s:11:"comentarios";s:1:"0";s:6:"avatar";s:0:"";s:10:"ip_cliente";s:12:"10.240.0.192";s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-09 00:38:56";}}Message|a:0:{}', 1457499494),
('m7bpgm6b8spe7bnu0ajavpoai1', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457717175;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"3";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-11 10:30:53";}}Message|a:0:{}', 1457717175),
('ms3umj7mcanji2qukntg944v96', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457639028;s:9:"countdown";i:3;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"3";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";s:9:"127.0.0.1";s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-10 11:54:24";}}Message|a:0:{}', 1457639028),
('mutfnstnlhv24lf9sjqirgume5', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457586777;s:9:"countdown";i:10;}', 1457586777),
('nk2do3rh4me5emo9jiceniarg7', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457559352;s:9:"countdown";i:10;}Auth|a:0:{}Message|a:0:{}', 1457559352),
('o4lornt7u2gffv423b8koocmn0', 'Config|a:3:{s:9:"userAgent";s:32:"a7274ceaf049945513ac3c0dc5854052";s:4:"time";i:1457538455;s:9:"countdown";i:10;}Message|a:0:{}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"2";s:8:"username";s:6:"alejo2";s:6:"nombre";s:13:"Manuel Castro";s:6:"correo";s:22:"alejocastro2@gmail.com";s:4:"role";s:1:"3";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-09";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"0";s:11:"comentarios";s:1:"0";s:6:"avatar";s:6:"alejo2";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-09 14:47:10";s:8:"modified";s:19:"2016-03-09 14:47:10";}}', 1457538456),
('p44pjavgdjlv8cn9ssvg5q2kv5', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1458059506;s:9:"countdown";i:10;}', 1458059506),
('p6matnl1icipdtu0r6pc5difl0', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1458063192;s:9:"countdown";i:10;}Message|a:0:{}Auth|a:0:{}', 1458063192),
('p8p89g1ppunvu2upi4m8628lr3', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457987287;s:9:"countdown";i:5;}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"3";s:8:"username";s:9:"pulidovpe";s:6:"nombre";s:15:"Pulido V. P. E.";s:6:"correo";s:18:"correo@dominio.com";s:4:"role";s:1:"3";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-09";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"0";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-09 23:42:56";s:8:"modified";s:19:"2016-03-14 13:57:37";}}Message|a:0:{}KCEDITOR|a:1:{s:8:"disabled";b:0;}', 1457987287),
('pingl0j63c3gdilcjbtpkon8t4', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457488285;s:9:"countdown";i:8;}Message|a:0:{}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"0";s:11:"comentarios";s:1:"0";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-08 22:13:10";}}', 1457488285),
('q6es932gdemujisfetoln7iqq2', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457469873;s:9:"countdown";i:8;}Message|a:0:{}Auth|a:0:{}', 1457469873),
('q9gj4u2j4it229109vtd8vho86', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457712120;s:9:"countdown";i:1;}Message|a:0:{}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"3";s:8:"username";s:9:"pulidovpe";s:6:"nombre";s:15:"Pulido V. P. E.";s:6:"correo";s:18:"correo@dominio.com";s:4:"role";s:1:"3";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-09";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"0";s:11:"comentarios";s:1:"1";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-09 23:42:56";s:8:"modified";s:19:"2016-03-11 10:27:33";}}', 1457712120),
('r0165nuqdmt5j8pmn6c0nnf992', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457585441;s:9:"countdown";i:1;}Message|a:0:{}Auth|a:1:{s:4:"User";a:18:{s:2:"id";s:1:"1";s:8:"username";s:8:"sysadmin";s:6:"nombre";s:12:"Pablo Pulido";s:6:"correo";s:23:"pulidovpe.dev@gmail.com";s:4:"role";s:1:"1";s:8:"facebook";s:0:"";s:6:"google";s:0:"";s:7:"twitter";s:0:"";s:13:"fecharegistro";s:10:"2016-03-08";s:12:"ultimoacceso";s:10:"0000-00-00";s:6:"activo";s:1:"S";s:5:"firma";s:0:"";s:5:"temas";s:1:"3";s:11:"comentarios";s:1:"4";s:6:"avatar";s:0:"";s:10:"ip_cliente";N;s:7:"created";s:19:"2016-03-08 19:36:53";s:8:"modified";s:19:"2016-03-09 16:05:51";}}', 1457585441),
('r459k6174ps87conne9dss2lv5', 'Config|a:3:{s:9:"userAgent";s:32:"8d29af01dd89f4bfe43119c7e88bf0f6";s:4:"time";i:1457992823;s:9:"countdown";i:6;}Message|a:0:{}Auth|a:0:{}', 1457992823),
('soe8nt50mi51otguslm41f4pi3', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457992782;s:9:"countdown";i:7;}Message|a:0:{}Auth|a:0:{}', 1457992782),
('v40su15imc0mtadlk0430brqk2', 'Config|a:3:{s:9:"userAgent";s:32:"781156fb75a03fe8ec08404f68771ac0";s:4:"time";i:1457544554;s:9:"countdown";i:7;}Auth|a:0:{}Message|a:0:{}', 1457544554);

-- --------------------------------------------------------

--
-- Table structure for table `comentario_foro`
--

CREATE TABLE IF NOT EXISTS `comentario_foro` (
`id` int(5) NOT NULL,
  `id_tema` int(5) NOT NULL,
  `id_usuario` int(7) NOT NULL,
  `comentario` text NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'S',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comentario_foro`
--

INSERT INTO `comentario_foro` (`id`, `id_tema`, `id_usuario`, `comentario`, `activo`, `created`, `modified`) VALUES
(1, 4, 2, 'hola te saludamos en respuesta', 'S', '2016-03-09 14:49:23', '2016-03-09 14:49:23'),
(2, 4, 1, 'El tema fue movido al foro de Presentacion.', 'S', '2016-03-09 14:56:00', '2016-03-09 23:40:22'),
(3, 2, 1, 'Este es un comentario a al saludo anterior', 'S', '2016-03-09 15:14:44', '2016-03-09 15:14:44'),
(4, 2, 1, 'Esta es otra prueba de los comentarios para ver a donde me redirige ', 'S', '2016-03-09 15:21:15', '2016-03-09 15:21:15'),
(5, 4, 1, 'un comentario mas para este tema', 'S', '2016-03-09 15:33:00', '2016-03-10 17:06:44'),
(6, 2, 1, 'Y con este se termina de comprobar si la redireccion esta corregida.', 'S', '2016-03-09 15:55:41', '2016-03-09 15:55:41'),
(7, 2, 3, '<p>Saludos visitante.</p>\r\n\r\n<p>Soy un usuario comun.</p>\r\n\r\n<p><img alt="" src="http://localhost/mis-proyectos/foro-cake/app/webroot/files/243544_175646475826837_7422487_o.jpg" style="height:417px; width:556px" /></p>\r\n', 'S', '2016-03-09 23:43:00', '2016-03-14 00:00:00'),
(8, 3, 3, 'Ya me inscribi como usuario comun', 'S', '2016-03-09 23:54:00', '2016-03-10 16:54:15'),
(9, 4, 3, '<p>Comentario de prueba.</p>\r\n\r\n<p>Despues de haber sido modificado y otra vez modificado.</p>\r\n\r\n<p>Otra vez!</p>\r\n', 'S', '2016-03-11 14:36:29', '2016-03-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `foro_categorias`
--

CREATE TABLE IF NOT EXISTS `foro_categorias` (
`id` int(5) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foro_categorias`
--

INSERT INTO `foro_categorias` (`id`, `categoria`, `descripcion`, `created`, `modified`) VALUES
(1, 'General', 'Categoria para foros de normas y presentacion de usuarios.', '2016-03-08 19:40:47', '2016-03-08 19:40:47'),
(2, 'Categoria Proposito del Foro', 'Aqui van los foros inherentes al proposito del foro. Ej. Si es de carros/autos, aqui van los foros de marcas, modelos, repuestos, etc.', '2016-03-08 19:42:19', '2016-03-08 19:42:19'),
(3, 'Categoria para casos especiales', 'Aca se publican foros no comunes, sean para proyectos o para casos especiales.', '2016-03-08 19:44:14', '2016-03-08 19:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `foro_subforos`
--

CREATE TABLE IF NOT EXISTS `foro_subforos` (
`id` int(5) NOT NULL,
  `id_foro_categoria` int(5) NOT NULL,
  `subforo` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `temas` int(5) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foro_subforos`
--

INSERT INTO `foro_subforos` (`id`, `id_foro_categoria`, `subforo`, `descripcion`, `temas`, `created`, `modified`) VALUES
(1, 1, 'Reglas para publicacion de temas', 'Aqui se publicaran foros con las normas para la publicacion de temas', 2, '2016-03-09 00:51:24', '2016-03-15 12:00:11'),
(2, 1, 'Presentacion', 'Aqui se deberian publicar los saludos apenas un usuario se inscribe.', 2, '2016-03-09 03:54:01', '2016-03-10 14:07:29'),
(3, 2, 'Todo lo relacionado con el tema del foro', 'Aqui deben publicarse los temas acerca de Todo lo relacionado con el tema del foro.', 1, '2016-03-09 03:58:01', '2016-03-10 11:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `foro_temas`
--

CREATE TABLE IF NOT EXISTS `foro_temas` (
`id` int(5) NOT NULL,
  `id_subforo` int(5) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(7) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'D',
  `comentarios` int(5) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foro_temas`
--

INSERT INTO `foro_temas` (`id`, `id_subforo`, `titulo`, `contenido`, `fecha`, `id_usuario`, `activo`, `comentarios`, `created`, `modified`) VALUES
(1, 1, 'La 1era regla', 'La 1era regla es inscribirse en el sistema para probarlo', '2016-03-09', 1, 'N', 0, '2016-03-09 03:46:14', '2016-03-11 10:30:39'),
(2, 2, 'Saludos soy el administrador del foro', '<p>Saludos soy el administrador del foro y el programador.</p>\r\n\r\n<p>Por favor prueben el sistema y denme sus impresiones, criticas y sugerencias.</p>\r\n\r\n<p><img alt="" src="https://quiensoy-pulidovpe.c9.io/img/yo-1.jpg" style="height:365px; width:273px" /></p>\r\n', '2016-03-09', 1, 'S', 4, '2016-03-09 03:55:02', '2016-03-14 15:41:06'),
(3, 3, 'El proposito principal del foro', 'Aqui publicamos cosas sobre el proposito del foro. El tema principal en si', '2016-03-09', 1, 'S', 1, '2016-03-09 14:26:23', '2016-03-10 16:54:15'),
(4, 2, 'Saludo de un Visitante', '<p>Hola esto es un saludo a toda la comunidad soy nuevo.</p>\r\n\n\n<---Este tema ha sido moderado--->', '2016-03-09', 2, 'S', 2, '2016-03-09 14:49:06', '2016-03-14 09:21:49'),
(5, 0, '', '', '0000-00-00', 0, 'D', 1, '2016-03-11 15:46:38', '2016-03-11 15:46:38'),
(6, 0, '', '', '0000-00-00', 0, 'D', 1, '2016-03-11 15:53:48', '2016-03-11 15:53:48'),
(7, 0, '', '', '0000-00-00', 0, 'D', 0, '2016-03-14 09:35:23', '2016-03-14 09:35:23'),
(8, 1, '2da regla', '<p>La 2d regla dice que despues de inscribirte debes:</p>\r\n\r\n<ul>\r\n	<li>Publicar temas.</li>\r\n	<li>Comentar temas.\r\n	<ul>\r\n		<li>Propios.</li>\r\n		<li>De otros.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Subir imagenes, como la siguiente, etc.</li>\r\n</ul>\r\n\r\n<p><img alt="" src="/mis-proyectos/foro-cake/app/webroot/js/kcfinder/upload/images/2012-09-16%2021.21.47.jpg" style="height:344px; width:458px" /></p>\r\n', '2016-03-15', 1, 'S', 0, '2016-03-15 12:00:11', '2016-03-15 12:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(7) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `correo` varchar(100) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0',
  `facebook` varchar(250) NOT NULL,
  `google` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `fecharegistro` date NOT NULL,
  `ultimoacceso` date NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'N',
  `firma` text NOT NULL,
  `temas` int(5) NOT NULL,
  `comentarios` int(5) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `ip_cliente` varchar(40) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nombre`, `correo`, `role`, `facebook`, `google`, `twitter`, `fecharegistro`, `ultimoacceso`, `activo`, `firma`, `temas`, `comentarios`, `avatar`, `ip_cliente`, `created`, `modified`) VALUES
(1, 'sysadmin', 'ef349ce432c4521ff158605b4f8a2deec0d9c6b4', 'Pablo Pulido', 'pulidovpe.dev@gmail.com', 1, '', '', '', '2016-03-08', '0000-00-00', 'S', '', 2, 4, '', '127.0.0.1', '2016-03-08 19:36:53', '2016-03-15 14:03:46'),
(2, 'alejo2', '4a3d37ed3ce34e0af873b1b59b86894d09fa1236', 'Manuel Castro', 'alejocastro2@gmail.com', 3, '', '', '', '2016-03-09', '0000-00-00', 'S', '', 2, 1, 'alejo2', '', '2016-03-09 14:47:10', '2016-03-09 14:52:34'),
(3, 'pulidovpe', '625abc237ebd98926788f99bcedb0872ceeb344f', 'Pulido V. P. E.', 'correo@dominio.com', 3, '', '', '', '2016-03-09', '0000-00-00', 'S', '', 0, 4, '', NULL, '2016-03-09 23:42:56', '2016-03-14 16:29:06'),
(6, '12322777', '625abc237ebd98926788f99bcedb0872ceeb344f', 'Shawnee Roxanne', 'correo@dominio.com', 3, 'Aun no disponible', 'Aun no disponible', 'Aun no disponible', '2016-03-15', '0000-00-00', 'S', '<p>Sin Firma</p>\r\n', 0, 0, 'Aun no disponible', NULL, '2016-03-15 11:07:42', '2016-03-15 11:07:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake_sessions`
--
ALTER TABLE `cake_sessions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentario_foro`
--
ALTER TABLE `comentario_foro`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foro_categorias`
--
ALTER TABLE `foro_categorias`
 ADD PRIMARY KEY (`id`), ADD KEY `id_forocategoria` (`id`);

--
-- Indexes for table `foro_subforos`
--
ALTER TABLE `foro_subforos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foro_temas`
--
ALTER TABLE `foro_temas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario_foro`
--
ALTER TABLE `comentario_foro`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `foro_categorias`
--
ALTER TABLE `foro_categorias`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `foro_subforos`
--
ALTER TABLE `foro_subforos`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `foro_temas`
--
ALTER TABLE `foro_temas`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
