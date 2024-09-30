<?php
include 'db.php'; // Inclui o arquivo de conexão com o banco de dados

$id = $_GET['id']; // Obtém o ID do aluno a ser excluído a partir da URL
$sql = "DELETE FROM alunos WHERE id = $id"; // Prepara a consulta SQL para excluir o aluno

// Executa a consulta e verifica se a exclusão foi bem-sucedida
if ($conn->query($sql) === TRUE) {
    echo "Aluno excluído com sucesso!"; // Mensagem de sucesso se a exclusão foi bem-sucedida
} else {
    echo "Erro ao excluir: " . $conn->error; // Mensagem de erro se a exclusão falhou
}

// Redireciona para a página index.php após a exclusão
header('Location: index.php');

// O código abaixo é redundante e não deve estar aqui
// Isso deve estar em outro arquivo, como cadastro.php, pois está relacionado ao cadastro de alunos
if ($conn->query($sql) === TRUE) {
    echo "<div class='success'>Cadastro realizado com sucesso!</div>"; // Mensagem de sucesso ao cadastrar
} else {
    echo "<div class='error'>Erro ao cadastrar.</div>"; // Mensagem de erro ao cadastrar
}
?>
