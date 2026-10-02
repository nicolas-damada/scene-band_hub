<?php
require_once '../database/conect.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Se não estiver logado, manda para login
if (!isset($_SESSION['id'])) {
    header("Location: ../login/login.php");
    exit();
}

// Se não for admin, bloqueia
if (empty($_SESSION['is_admin'])) {
    echo "Acesso negado.";
    exit();
}

// Pega o id do show pela URL
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Se não veio id válido, para tudo
if (!$id) {
    echo "Show inválido.";
    exit();
}

$sql = "DELETE FROM shows WHERE id = :id";

try {
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);

    header("Location: ../index.php");
    exit();

} catch (PDOException $e) {
    echo "Erro ao excluir show: " . $e->getMessage();
}
?>