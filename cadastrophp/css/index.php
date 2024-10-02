<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SEILAPHP/css/style.css">
    <title>Sistema de Cadastro de Alunos</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <form action="cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

<script>
function validateForm() {
    var email = document.getElementById('email').value;
    var regex = /^\S+@\S+\.\S+$/;
    if (!regex.test(email)) {
        alert('Por favor, insira um e-mail válido.');
        return false;
    }
    return true;
}
</script>

    <!-- Listagem de alunos virá aqui -->
    <?php
$sql = "SELECT * FROM alunos";
$result = $conn->query($sql);
?>

<h2>Lista de Alunos</h2>
<table>
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
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nome']; ?></td>
                <td><?= $row['idade']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['curso']; ?></td>
                <td><a href="deletar.php?id=<?= $row['id']; ?>">Excluir</a></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
