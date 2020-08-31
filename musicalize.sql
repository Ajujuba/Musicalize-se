-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Ago-2020 às 17:18
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `musicalize`
--
CREATE DATABASE IF NOT EXISTS `musicalize` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `musicalize`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `token` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `senha` varchar(30) NOT NULL,
  `rg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`token`, `nome`, `email`, `cpf`, `telefone`, `senha`, `rg`) VALUES
(1234, 'Ana Julia', 'ana@live.com', '36548601840', '48235642', '123', '378474522'),
(1235, 'Lucas Amaral', 'lucasamaralsouza@outlook.com', '989556451', '1148235874', 'teste', '35978154455');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idaluno` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `adm_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idaluno`, `email`, `nome`, `telefone`, `rg`, `cpf`, `adm_token`) VALUES
(4, 'joice@hotmail.com', 'Joice Carvalho Leal', '(22)74854-845', '48574464', '787.878.488-74', 1234),
(5, 'osme.rosa@live.com', 'Osmerindo Rosa Cardoso', '(11) 48235-658', '8784545115', '326.365.478-09', 1234),
(6, 'catho@outlook.com', 'Catharina Mondoni', '(11)98565-4788', '123456780', '365.897.754-51', 1235),
(7, 'lety@hotmail.com', 'Leticia Moreira Amora', '(11) 98565-4541', '123456789', '587.994.878-84', 1234),
(8, 'tamires.souza@hotmail.com', 'Tamires Souza', '(11) 45856-558', '123456998', '548.781.310-25', 1235),
(9, 'raissa@live.com', 'Raissa Mendes', '(11) 69895-448', '456878945', '356.987.910-08', 1234),
(10, 'pedro.ca@live.com', 'Pedro Carvalho', '(11) 96897-8454', '58794645', '859.404.570-04', 1234),
(11, 'tito@live.com', 'Tito Tenedine', '(11) 98785-4548', '123659874', '356.874.451-89', 1235);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_classe`
--

CREATE TABLE `aluno_classe` (
  `aluno_idaluno` int(11) NOT NULL,
  `classe_idclasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno_classe`
--

INSERT INTO `aluno_classe` (`aluno_idaluno`, `classe_idclasse`) VALUES
(4, 2),
(4, 3),
(5, 1),
(6, 1),
(6, 3),
(7, 2),
(7, 3),
(8, 3),
(9, 2),
(10, 3),
(11, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `idclasse` int(11) NOT NULL,
  `professor_idprofessor` int(11) NOT NULL,
  `curso_idcurso` int(11) NOT NULL,
  `periodo` varchar(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`idclasse`, `professor_idprofessor`, `curso_idcurso`, `periodo`, `status`) VALUES
(1, 1, 13, 'Manhã 8:30', 0),
(2, 5, 15, 'Manhã 11:0', 0),
(3, 5, 14, 'Tarde 15:0', 0),
(4, 5, 15, 'Noite 19:0', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `idcontato` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mensagem` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`idcontato`, `nome`, `email`, `mensagem`, `status`) VALUES
(1, 'Julia', 'ju@live.com', 'oi tudo bem? Eu adorei os cursos e queria saber mais sobre a didática do curso de Violino, pois já fiz algumas aulas mas ainda queria me aprimorar.\r\n', 0),
(2, 'Sabrina Gomes', 'sasa@outlook.com', 'Gostei dos cursos e queria saber sobre os valores de cada um e sobre a forma de pagamento! \r\nObrigado pela atenção.', 0),
(3, 'Sabrina Gomes', 'sasa@outlook.com', 'Eu gostei muito dos cursos! queria saber a respeito da forma de pagamento,\r\nAguardo contato!', 0),
(6, 'Mylena Cavalcante Terra', 'mycarelia@hotmail.com', 'Oii adorei o site! vcs são de mais, manda beijo!', 1),
(7, 'Mayla Marjorie', 'mayla@hotmail.com', 'Oii, queria saber sobre os horários das aulas, faço faculdade de manhã, tem como fazer aula de bateria a noite? ', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_aluno`
--

CREATE TABLE `contato_aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato_aluno`
--

INSERT INTO `contato_aluno` (`id`, `nome`, `email`, `telefone`, `status`) VALUES
(1, 'Tatiane', 'tati@live', '11984545452', 1),
(2, 'Juliana Castro Souza', 'jucastro12@hotmail.com', '1198745845', 1),
(3, 'Pedro Daniel da Silva', 'pdaniel@live.com', '119689785444', 0),
(4, 'Victor Medeiros da Silva', 'victor@live.com', '119689785444', 1),
(5, 'Mylena Cavalcante Terra', 'mycarelia@hotmail.com', '1148233323', 0),
(6, 'Fernando Alves', 'fealves@outlook.com', '11932255852', 0),
(7, 'Ana Lucia Terra', 'analu@hotmail.com', '11988439230', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `adm_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idcurso`, `nome`, `descricao`, `adm_token`) VALUES
(13, 'Guitarra', 'Aprenda aqui como tocar guitarra de um jeito descomplicado. As melhores aulas você só encontra no Musicalize-se!', 1235),
(14, 'Violino', 'Temos alunos com diferentes objetivos. Tocar para entrar em uma banda, tocar por hobby, tocar em orquestra, evoluir para ser um profissional. Estamos ', 1235),
(15, 'Bateria', 'Aprenda Bateria, do básico ao avançado, tocando diversos gêneros musicais: Pop, Rock, Funk, Soul, Blues, e muito mais!', 1235);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso_aluno`
--

CREATE TABLE `curso_aluno` (
  `curso_idcurso` int(11) NOT NULL,
  `aluno_idaluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idprofessor` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `senha` varchar(30) NOT NULL,
  `curso` int(11) NOT NULL,
  `adm_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idprofessor`, `nome`, `email`, `rg`, `cpf`, `telefone`, `senha`, `curso`, `adm_token`) VALUES
(1, 'Thainá Araújo Mendonça', 'tha@live.com', '784551751', '123.499.962-18', '(11)96182-3161', '1234', 0, 1235),
(4, 'Maurício Pereira Maurício Alves', 'mauricio@live.com.br', '222323231', '326.365.478-07', '(11)97082-7710', '12343', 14, 1234),
(5, 'Alextraza Souza', 'alextraza@outlook.com', '123456789', '568.987.452-10', '(11)96181-3162', '1232', 13, 1235);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_curso`
--

CREATE TABLE `professor_curso` (
  `professor_idprofessor` int(11) NOT NULL,
  `curso_idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor_curso`
--

INSERT INTO `professor_curso` (`professor_idprofessor`, `curso_idcurso`) VALUES
(1, 13),
(4, 13),
(4, 14),
(5, 13),
(5, 14),
(5, 15);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`token`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idaluno`),
  ADD KEY `fk_aluno_adm1_idx` (`adm_token`);

--
-- Índices para tabela `aluno_classe`
--
ALTER TABLE `aluno_classe`
  ADD PRIMARY KEY (`aluno_idaluno`,`classe_idclasse`),
  ADD KEY `fk_aluno_has_classe_classe1_idx` (`classe_idclasse`),
  ADD KEY `fk_aluno_has_classe_aluno1_idx` (`aluno_idaluno`);

--
-- Índices para tabela `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`idclasse`,`professor_idprofessor`,`curso_idcurso`),
  ADD KEY `fk_classe_professor1_idx` (`professor_idprofessor`),
  ADD KEY `fk_classe_curso1_idx` (`curso_idcurso`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idcontato`);

--
-- Índices para tabela `contato_aluno`
--
ALTER TABLE `contato_aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`),
  ADD KEY `fk_curso_adm_idx` (`adm_token`);

--
-- Índices para tabela `curso_aluno`
--
ALTER TABLE `curso_aluno`
  ADD PRIMARY KEY (`curso_idcurso`,`aluno_idaluno`),
  ADD KEY `fk_curso_has_aluno_aluno1_idx` (`aluno_idaluno`),
  ADD KEY `fk_curso_has_aluno_curso1_idx` (`curso_idcurso`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idprofessor`),
  ADD KEY `fk_professor_adm1_idx` (`adm_token`);

--
-- Índices para tabela `professor_curso`
--
ALTER TABLE `professor_curso`
  ADD PRIMARY KEY (`professor_idprofessor`,`curso_idcurso`),
  ADD KEY `fk_professor_has_curso_curso1_idx` (`curso_idcurso`),
  ADD KEY `fk_professor_has_curso_professor1_idx` (`professor_idprofessor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idaluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `classe`
--
ALTER TABLE `classe`
  MODIFY `idclasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `idcontato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `contato_aluno`
--
ALTER TABLE `contato_aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idprofessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_adm1` FOREIGN KEY (`adm_token`) REFERENCES `adm` (`token`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `aluno_classe`
--
ALTER TABLE `aluno_classe`
  ADD CONSTRAINT `fk_aluno_has_classe_aluno1` FOREIGN KEY (`aluno_idaluno`) REFERENCES `aluno` (`idaluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_has_classe_classe1` FOREIGN KEY (`classe_idclasse`) REFERENCES `classe` (`idclasse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `fk_classe_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_classe_professor1` FOREIGN KEY (`professor_idprofessor`) REFERENCES `professor` (`idprofessor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_adm` FOREIGN KEY (`adm_token`) REFERENCES `adm` (`token`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `curso_aluno`
--
ALTER TABLE `curso_aluno`
  ADD CONSTRAINT `fk_curso_has_aluno_aluno1` FOREIGN KEY (`aluno_idaluno`) REFERENCES `aluno` (`idaluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_has_aluno_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_adm1` FOREIGN KEY (`adm_token`) REFERENCES `adm` (`token`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor_curso`
--
ALTER TABLE `professor_curso`
  ADD CONSTRAINT `fk_professor_has_curso_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professor_has_curso_professor1` FOREIGN KEY (`professor_idprofessor`) REFERENCES `professor` (`idprofessor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
