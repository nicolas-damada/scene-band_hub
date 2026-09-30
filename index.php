<?php
$conexao = include 'database/conect.php';

$sql = "SELECT id, titulo, data_show, endereco FROM shows ORDER BY data_show ASC";
$stmt = $conexao->query($sql);
$shows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCENA</title>
</head>
<body>
    <?php include 'includes/header.php'?>
    <main>
        <h1>Eventos adicionados recentemente</h1>
        <?php if (empty($shows)): ?>
            <p>Nenhum show cadastrado ainda.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($shows as $show): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($show['titulo']); ?></strong>
                        em <?php echo htmlspecialchars($show['endereco']); ?>
                        (<?php echo htmlspecialchars($show['data_show']); ?>)
                        <hr>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>
</body>
</html>