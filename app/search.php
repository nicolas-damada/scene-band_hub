<?php require_once  __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scena</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include __DIR__ . '/../includes/header.php' ?>
    <main>
        <h1>pesquise pelo titulo</h1>
        <form action="" method="post">
            <label for="pesquisa"></label>
            <input type="text" name="pesquisa" id="pesquisa">
        </form>
        <?php
        $shows = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $termo    = $_POST['pesquisa'];
           $sql = "SELECT 
            s.id,
            s.titulo,
            s.data_show,
            s.endereco,
            COALESCE(string_agg(sb.nome_banda, ', '), 'Sem banda cadastrada') AS bandas
        FROM shows s
        LEFT JOIN shows_bandas sb
            ON s.id = sb.show_id
        WHERE s.titulo ILIKE :termo
        GROUP BY s.id
        ORDER BY s.data_show ASC";
            $stmt = $conexao->prepare($sql);
            $termoBusca = "%$termo%";
            $stmt->bindParam(":termo", $termoBusca);
            $stmt->execute();
            $shows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>




        <?php foreach ($shows as $show): ?>
            <p>
                <strong><?php echo htmlspecialchars($show['titulo']); ?></strong>:
                <?php echo htmlspecialchars($show['bandas']); ?>
                em <?php echo htmlspecialchars($show['endereco']); ?>
                (<?php echo date('d/m/Y', strtotime($show['data_show'])); ?>)
            </p>
        <?php endforeach; ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>

</html>