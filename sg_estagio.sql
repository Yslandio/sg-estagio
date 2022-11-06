-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Nov-2022 às 07:37
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sg_estagio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `feriados`
--

CREATE TABLE `feriados` (
  `id` bigint(20) NOT NULL,
  `description_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holidayDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `feriados`
--

INSERT INTO `feriados` (`id`, `description_date`, `holidayDate`) VALUES
(27, 'Confraternização Universal', '2022-01-01'),
(28, 'Recesso de Carnaval', '2022-02-28'),
(29, 'Feriado de Carnaval', '2022-02-01'),
(30, 'Quarta de Cinzas', '2022-02-02'),
(31, 'Feriado Estadual data Magna de PE', '2022-02-06'),
(32, 'Feriado Sexta-Santa', '2022-04-15'),
(33, 'Feriado Tiradentes', '2022-04-21'),
(34, 'Dia do Trabalhador', '2022-05-01'),
(35, 'Ponto Facultativo Corpus Christi', '2022-06-16'),
(36, 'Feriado Municipal São João', '2022-06-24'),
(37, 'Feriado Municipal Padroeira da cidade', '2022-08-15'),
(38, 'Feriado Independência', '2022-09-07'),
(39, 'Feriado Municipal Aniversário de Petrolina', '2022-09-21'),
(40, 'Feriado N. S. Aparecida', '2022-10-12'),
(41, 'Ponto Facultativo Servidor Público', '2022-10-28'),
(42, 'Feriado Nacional Finados', '2022-11-02'),
(43, 'Feriado Nacional Procl. da República', '2022-11-15'),
(45, 'Feriado Nacional Natal', '2022-12-25');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `feriados`
--
ALTER TABLE `feriados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `feriados`
--
ALTER TABLE `feriados`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
