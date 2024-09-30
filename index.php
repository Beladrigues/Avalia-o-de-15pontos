<?php include 'db.php'; // Inclui o arquivo de conexão com o banco de dados ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres para UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividade em dispositivos móveis -->
    <link rel="stylesheet" href="SEILAPHP/css/style.css"> <!-- Link para o arquivo CSS de estilização -->
    <title>Sistema de Cadastro de Alunos</title> <!-- Título da página -->
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <!-- Formulário de cadastro de alunos -->
    <form action="cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br> <!-- Campo para o nome do aluno -->

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br><br> <!-- Campo para a idade do aluno -->

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br> <!-- Campo para o e-mail do aluno -->

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required><br><br> <!-- Campo para o curso do aluno -->

        <input type="submit" value="Cadastrar"> <!-- Botão para enviar o formulário -->
    </form>

    <script>
    // Função para validar o formulário
    function validateForm() {
        var email = document.getElementById('email').value; // Obtém o valor do campo de e-mail
        var regex = /^\S+@\S+\.\S+$/; // Regex para validar o formato do e-mail
        if (!regex.test(email)) { // Testa se o e-mail é válido
            alert('Por favor, insira um e-mail válido.'); // Alerta em caso de e-mail inválido
            return false; // Impede o envio do formulário
        }
        return true; // Permite o envio do formulário
    }
    </script>

    <!-- Listagem de alunos virá aqui -->
    <?php
    $sql = "SELECT * FROM alunos"; // Consulta SQL para selecionar todos os alunos
    $result = $conn->query($sql); // Executa a consulta
    ?>

    <h2>Lista de Alunos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th> <!-- Cabeçalho da coluna ID -->
                <th>Nome</th> <!-- Cabeçalho da coluna Nome -->
                <th>Idade</th> <!-- Cabeçalho da coluna Idade -->
                <th>Email</th> <!-- Cabeçalho da coluna Email -->
                <th>Curso</th> <!-- Cabeçalho da coluna Curso -->
                <th>Ação</th> <!-- Cabeçalho da coluna Ação -->
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?> <!-- Loop através dos resultados da consulta -->
                <tr>
                    <td><?= $row['id']; ?></td> <!-- Exibe o ID do aluno -->
                    <td><?= $row['nome']; ?></td> <!-- Exibe o nome do aluno -->
                    <td><?= $row['idade']; ?></td> <!-- Exibe a idade do aluno -->
                    <td><?= $row['email']; ?></td> <!-- Exibe o e-mail do aluno -->
                    <td><?= $row['curso']; ?></td> <!-- Exibe o curso do aluno -->
                    <td><a href="deletar.php?id=<?= $row['id']; ?>">Excluir</a></td> <!-- Link para excluir o aluno -->
                </tr>
            <?php endwhile; ?> <!-- Fim do loop -->
        </tbody>
    </table>
</body>
</html>
