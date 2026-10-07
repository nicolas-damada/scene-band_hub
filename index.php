<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conexao = include 'database/conect.php';
$sql = "SELECT 
            s.id,
            s.titulo,
            s.data_show,
            s.endereco,
            COALESCE(
                string_agg(sb.nome_banda, ', ' ORDER BY sb.nome_banda),
                'Sem banda cadastrada'
            ) AS bandas
        FROM shows s
        LEFT JOIN shows_bandas sb
            ON s.id = sb.show_id
        GROUP BY s.id, s.titulo, s.data_show, s.endereco
        ORDER BY s.data_show ASC";
$stmt = $conexao->query($sql);
$shows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCENA</title>
    <link rel="icon" type="image/svg+xml" href="images\favicon-16x16.png">
    <link rel="stylesheet" href="/scena/css/style.css">
</head>

<body>
    <header>
        <?php include 'includes/header.php' ?>

    </header>
    <main>
        <h1>Shows adicionados recentemente</h1>
        <?php if (empty($shows)): ?>
            <p>Nenhum show cadastrado ainda.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($shows as $show): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($show['titulo']); ?></strong>:
                        <?php echo htmlspecialchars($show['bandas']); ?>
                        em <?php echo htmlspecialchars($show['endereco']); ?>
                        (<?php echo date('d/m/Y', strtotime($show['data_show'])); ?>)

                        <?php if (!empty($_SESSION['is_admin'])): ?>
                            <a href="app/delete.php?id=<?php echo $show['id']; ?>"
                                onclick="return confirm('Tem certeza que deseja excluir este show?');">
                                Excluir
                            </a>
                        <?php endif; ?>

                        <hr>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>

</html>