
--
-- Banco de dados: `task_ci`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `category`
--

INSERT INTO `category` (`id`, `description`, `status`) VALUES
(1, 'Trabalho', 1),
(2, 'Lazer', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `created` date NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 active - 0 inative',
  `title` varchar(50) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `task`
--

INSERT INTO `task` (`id`, `created`, `description`, `status`, `title`, `category_id`) VALUES
(2, '2018-09-28', 'Descrição', 0, 'Enviar Link', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
