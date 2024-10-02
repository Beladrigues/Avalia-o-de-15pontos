CREATE DATABASE IF NOT EXISTS escola;
use escola;
CREATE TABLE IF NOT EXISTS alunos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    idade INT(3),
    email VARCHAR(50),
    curso VARCHAR(50)
    );
   describe alunos;
   select*from alunos;
INSERT INTO alunos (nome, idade, email, curso)
VALUES ('Nayã Lemos', 20, 'nayalemos021213@gmail.com', 'TI');