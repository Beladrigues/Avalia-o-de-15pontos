<?php
include 'db.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se a requisição foi feita via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    // Prepara a consulta SQL para inserir os dados na tabela alunos
    $sql = "INSERT INTO alunos (nome, idade, email, curso) VALUES ('$nome', '$idade', '$email', '$curso')";

    // Executa a consulta e verifica se o cadastro foi bem-sucedido
    if ($conn->query($sql) === TRUE) {
        echo "Aluno cadastrado com sucesso!"; // Mensagem de sucesso
    } else {
        echo "Erro ao cadastrar: " . $conn->error; // Mensagem de erro
    }

    // Redireciona para a página index.php após o cadastro
    header('Location: index.php');
    
    // O código abaixo é redundante e deve ser removido, pois já foi verificado acima
    if ($conn->query($sql) === TRUE) {
        echo "<div class='success'>Cadastro realizado com sucesso!</div>"; // Mensagem de sucesso
    } else {
        echo "<div class='error'>Erro ao cadastrar.</div>"; // Mensagem de erro
    }
}
?>
