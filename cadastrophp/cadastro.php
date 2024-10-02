<?php
include 'db.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    // Prepara a consulta SQL para inserir os dados
    $sql = "INSERT INTO alunos (nome, idade, email, curso) VALUES (?, ?, ?, ?)";
    
    // Usa prepared statements para evitar SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siss", $nome, $idade, $email, $curso); // 'siss' significa string, int, string, string

    // Executa a consulta e verifica se a inserção foi bem-sucedida
    if ($stmt->execute()) {
        // Redireciona para a página de listagem após o cadastro
        header('Location: index.php');
        exit; // Finaliza a execução do script
    } else {
        echo "<div class='error'>Erro ao cadastrar: " . $conn->error . "</div>"; // Mensagem de erro
    }

    $stmt->close(); // Fecha a declaração
}
?>
