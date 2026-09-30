<?php require_once __DIR__ . '/../includes/functions.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <main>
        <h1>Faça login para continuar</h1>
        <form action="" method="post">
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email"><br>

            <label for="turma">Senha: </label>
            <input type="password" name="senha" id="senha"><br>

            <!-- enviar e limpar -->
            <input type="submit" value="Entrar">
            <input type="reset" value="Limpar">

        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $usuario = consultar_user($conexao, $_POST['email']);
            if ($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']) {
                session_start();
                $_SESSION['id'] = $usuario['id'];
                header("location: ../index.php");
                exit();
            } else {
                echo "Usuario ou senha invalidos";
            }
        }
        ?>
    </main>
    
</body>

</html>