<?php include 'db.php'; ?> <!-- Inclui o arquivo de conexão com o banco de dados -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configurações para responsividade -->
    <link rel="stylesheet" href="css/style.css"> <!-- Link para o arquivo CSS para estilização -->
    <title>Sistema de Cadastro de Alunos</title> <!-- Título da página -->
</head>
<body>
    <h1>Cadastro de Alunos</h1> <!-- Título principal da página -->
    <form action="cadastro.php" method="POST"> <!-- Formulário que envia dados para cadastro.php -->
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br> <!-- Campo de entrada para o nome -->

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br><br> <!-- Campo de entrada para a idade -->

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br> <!-- Campo de entrada para o email -->

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required><br><br> <!-- Campo de entrada para o curso -->

        <input type="submit" value="Cadastrar"> <!-- Botão para enviar o formulário -->
    </form>

<script>
// Função para validar o formato do e-mail
function validateForm() {
    var email = document.getElementById('email').value;
    var regex = /^\S+@\S+\.\S+$/; // Regex para validar o formato do e-mail
    if (!regex.test(email)) {
        alert('Por favor, insira um e-mail válido.'); // Mensagem de alerta caso o e-mail seja inválido
        return false; // Impede o envio do formulário
    }
    return true; // Permite o envio do formulário
}
</script>

<!-- Listagem de alunos virá aqui -->
<?php
$sql = "SELECT * FROM alunos"; // Consulta para selecionar todos os registros da tabela alunos
$result = $conn->query($sql); // Executa a consulta e armazena o resultado
?>

<h2>Lista de Alunos</h2> <!-- Título para a lista de alunos -->
<table> <!-- Início da tabela -->
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?> <!-- Loop para percorrer os registros da tabela -->
            <tr>
                <td><?= $row['id']; ?></td> <!-- Exibe o ID do aluno -->
                <td><?= $row['nome']; ?></td> <!-- Exibe o nome do aluno -->
                <td><?= $row['idade']; ?></td> <!-- Exibe a idade do aluno -->
                <td><?= $row['email']; ?></td> <!-- Exibe o email do aluno -->
                <td><?= $row['curso']; ?></td> <!-- Exibe o curso do aluno -->
                <td><a href="deletar.php?id=<?= $row['id']; ?>">Excluir</a></td> <!-- Link para excluir o aluno -->
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
