<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $sql = "INSERT INTO alunos (nome, idade, email, curso) VALUES ('$nome', '$idade', '$email', '$curso')";

    if ($conn->query($sql) === TRUE) {
        echo "Aluno cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    header('Location: index.php');
    
if ($conn->query($sql) === TRUE) {
    echo "<div class='success'>Cadastro realizado com sucesso!</div>";
} else {
    echo "<div class='error'>Erro ao cadastrar.</div>";
}
?>
