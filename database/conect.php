<?php
$host = "192.168.10.64";
$dbname = "scena";
$user = "scena";
$pass = "scena";

try {
    $conexao = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexao;
} catch (PDOException $e) {
    echo "erro: " . $e->getMessage();
    return null;
}
?>