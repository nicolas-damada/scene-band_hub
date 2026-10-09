<?php
// Certifica-se de que a sessão está ativa antes de verificar a variável
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <nav aria-label="Menu principal">
        <a class="marca" href="/scena/index.php">SCENA</a>

        <div class="menu">
            <a href="/scena/app/create.php">Postar show</a>
            <a href="/scena/app/search.php">Pesquisar</a>
            <a href="/scena/app/quem_somos.php">Quem somos</a>
            
            <?php if (isset($_SESSION['id'])): ?>
                <a href="/scena/login/logout.php">Sair</a>
            <?php elseif (!isset($_SESSION['usuario_id'])): ?>
                <a href="/scena/login/login.php">Entrar</a>
            <?php endif;?>
            
        </div>
    </nav>
</header>