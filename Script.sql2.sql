CREATE DATABASE  escola;
use escola;
CREATE TABLE alunos (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    idade INT(3),
    email VARCHAR(50),
    curso VARCHAR(50)
    );
   describe alunos;
   select*from alunos;