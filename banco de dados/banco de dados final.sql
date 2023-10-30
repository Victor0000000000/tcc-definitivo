-- Crie o banco de dados
CREATE DATABASE IF NOT EXISTS curtasifc;

-- Use o banco de dados
USE curtasifc;

-- Crie a tabela 'ano'
CREATE TABLE IF NOT EXISTS ano (
  cod INT AUTO_INCREMENT PRIMARY KEY,
  descricao VARCHAR(255) DEFAULT NULL,
  ano INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insira dados na tabela 'ano' (2016 a 2037)
INSERT INTO ano (descricao, ano) VALUES ('Ano 2016', 2016);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2017', 2017);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2018', 2018);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2019', 2019);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2020', 2020);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2021', 2021);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2022', 2022);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2023', 2023);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2024', 2024);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2025', 2025);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2026', 2026);
INSERT INTO ano (descricao, ano) VALUES ('Ano 2027', 2027);

-- Crie a tabela 'genero'
CREATE TABLE IF NOT EXISTS genero (
  cod INT AUTO_INCREMENT PRIMARY KEY,
  descricao VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insira dados na tabela 'genero'
INSERT INTO genero (descricao) VALUES ('Descrição do Gênero');

-- Crie a tabela 'tema'
CREATE TABLE IF NOT EXISTS tema (
  cod INT AUTO_INCREMENT PRIMARY KEY,
  descricao VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insira dados na tabela 'tema'
INSERT INTO tema (descricao) VALUES ('Descrição do Tema');

-- Crie a tabela 'usuarios'
CREATE TABLE IF NOT EXISTS usuarios (
  cod INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(40) NOT NULL,
  email VARCHAR(40) NOT NULL,
  senha VARCHAR(40) NOT NULL,
  data_nasc DATE NOT NULL,
  adm TINYINT(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insira dados na tabela 'usuarios'
INSERT INTO `usuarios` (`nome`, `email`, `senha`, `cod`, `data_nasc`, `adm`) VALUES
('victor', 'foda@gmail.com', '456', 1, '2006-04-12', 0),
('Victor2', 'teste5@gmail.com', '456', 2, '2006-08-21', 1),
('filipe', 'filipe@gmail.com', '321', 3, '1990-05-11', 0);

-- Crie a tabela 'curta'
CREATE TABLE IF NOT EXISTS curta (
  cod INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  video VARCHAR(255) NOT NULL,
  sinopse TEXT NOT NULL,
  duracao TIME NOT NULL,
  tema INT NOT NULL,
  genero INT NOT NULL,
  turma VARCHAR(255) NOT NULL,
  poster VARCHAR(255) NOT NULL,
  categoria VARCHAR(255) NOT NULL,
  ano INT NOT NULL,
  votos INT DEFAULT 0, -- Adicionado campo de votos
  FOREIGN KEY (ano) REFERENCES ano (cod) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insira dados na tabela 'curta' (incluindo um exemplo de duração em HH:MM:SS)
INSERT INTO curta (titulo, video, sinopse, duracao, tema, genero, turma, poster, categoria, ano) VALUES ('Título do Curta', 'video.mp4', 'Sinopse do Curta', '00:10:00', 1, 1, 'Turma A', 'poster.jpg', 'Categoria 1', 1);

-- Crie a tabela 'votos'
CREATE TABLE IF NOT EXISTS votos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  curta_id INT NOT NULL,
  voto TINYINT(1) NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuarios (cod) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (curta_id) REFERENCES curta (cod) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Defina o valor inicial do campo 'cod' para 1
ALTER TABLE ano AUTO_INCREMENT = 1;

-- Remova registros existentes com 'cod' igual a 0 (isso excluirá os registros com 'cod' igual a 0)
DELETE FROM ano WHERE cod = 0;

-- Defina o campo 'cod' como AUTO_INCREMENT (isso fará com que o campo 'cod' volte a ser auto incremento)
ALTER TABLE ano MODIFY cod INT AUTO_INCREMENT;
