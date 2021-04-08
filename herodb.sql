
create database android;

use android;

CREATE TABLE `personagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `ator` varchar(200) NOT NULL,
  `posto` varchar(200) NOT NULL,
  `patente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `personagens`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `personagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `personagens` (`nome`, `ator`, `posto`, `patente`) VALUES
('William Shatner', 'James T. Kirk', 'Oficial Comandante', 'Capitão'),
('Leonard Nimoy', 'Spock', 'Primeiro Oficial / Oficial de Ciências', 'Tenente-Comandante Comandante'),
('DeForest Kelley', 'Leonard McCoy', '	Oficial Médico / Chefe', 'Tenente-Comandante'),
('James Doohan', 'Montgomery Scott', 'Segundo Oficial Engenheiro / Chefe', 'Tenente-Comandante'),
('Nichelle Nichols', '	Nyota Uhura', 'Oficial de Comunicações', 'Tenente'),
('George Takei', 'Hikaru Sulu', '	Piloto / Armas', 'Tenente'),
('Walter Koenig', 'Pavel Chekov', 'Navegador / Oficial de Segurança / Oficial Tático', 'Alferes'),
('Majel Barrett', '	Christine Chapel', 'Enfermeira', 'Tenente'),
('Grace Lee Whitney', 'Janice Rand', 'Ordenança do Capitão', 'Ordenança');



