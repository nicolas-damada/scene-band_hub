<?php require_once '../database/conect.php' ?>
<?php 
require_once __DIR__ . '/../login/verifica.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scena</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include '../includes/header.php' ?>
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
            $sql = "SELECT id, titulo, data_show, endereco
                    FROM shows
                    WHERE titulo ILIKE :termo
                    ORDER BY data_show ASC";
            $stmt = $conexao->prepare($sql);
            $termoBusca = "%$termo%";
            $stmt->bindParam(":termo", $termoBusca);
            $stmt->execute();
            $shows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>




        <?php foreach ($shows as $show): ?>
    <p><?php echo $show['titulo']; ?> - <?php echo $show['endereco']; ?></p>
<?php endforeach; ?>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>