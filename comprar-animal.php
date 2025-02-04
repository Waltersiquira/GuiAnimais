<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_back" />
    <title>GuiAnimais</title>
</head>
<body style="text-align: center;">
    <?php require_once 'includes/lojas.php' ?>
    <?php 
    $id = $lojas->real_escape_string($_GET['i'] ?? '');
    if (!empty($id)){
        if ($lojas->query("DELETE FROM adocao_animais WHERE id = '$id'")){
            echo "<h1>Aprovado</h1> <img src='https://upload.wikimedia.org/wikipedia/commons/8/84/Approved_img.png'> <p>Animal comprado com sucesso ele está chegando até sua casa</p>";
        } else {
            echo 'Erro ao tentar comprar o animal <br>';
        }
    } else {
        echo 'Esse Animal não existe <br>';
    }
    ?>
    <button><a href="index.php" style="color: black;"><span class="material-symbols-outlined">arrow_back</span></a></button>
    <?php $lojas->close() ?>
</body>
</html>