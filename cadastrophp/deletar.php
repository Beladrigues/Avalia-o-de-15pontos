<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM alunos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Aluno excluído com sucesso!";
} else {
    echo "Erro ao excluir: " . $conn->error;
}

header('Location: index.php');

if ($conn->query($sql) === TRUE) {
    echo "<div class='success'>Cadastro realizado com sucesso!</div>";
} else {
    echo "<div class='error'>Erro ao cadastrar.</div>";
}
?>
