<?php 
require_once '../database/conect.php';
function cadastrar_user($conexao, $nome, $email, $senha){
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES(:nome, :email, :senha)";

            try {        //a variavel conexão é do arquivo "conect.php"
                $stmt = $conexao->prepare($sql); //"->" chama um metodo
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":senha", $senhaHash);
                $stmt->execute();
                echo "Usuario cadastrado com sucesso";
            } catch (PDOException $e) {
                echo "erro:" . $e->getMessage();
            }
}


function consultar_user($conexao, $email){

    $sql = "SELECT id,email,senha FROM usuarios WHERE email = :email";
    try{
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    return $usuario;//return para externalizar a variavel
    }catch(PDOException $e){
        echo "ERRO: " . $e->getMessage();
    }
}

function buscar_usuario_por_email($conexao, $email) {
    $sql = "SELECT id, nome, senha, is_admin FROM usuarios WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC); // retorna false se não achar
}
?>