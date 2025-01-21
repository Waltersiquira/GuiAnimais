<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_back" />
    <title>GuiAnimais</title>
</head>
<body>
    <?php require_once 'includes/lojas.php' ?>
    <?php 
    $id = $lojas->real_escape_string($_GET['i'] ?? '');
    $busca = $lojas->query("select * from adocao_animais where id = '$id'");
    if (!empty($id)){
        if (!$busca){
            echo 'Erro <br>';
        } else {
            if ($busca->num_rows == 0){
                echo 'Não existe nenhum animal desse <br>';
            } else {
                while ($reg=$busca->fetch_object()){
                    echo "<img src='$reg->imagem' width='300'> <h3>$reg->nome</h3> <h4>R$$reg->preço</h4> <hr> <p>$reg->descrição</p> <button><a href='comprar-animal.php?i=$reg->id' style='text-decoration: none;'>Comprar</a></button> <br>";
                }
            }
        }
    } else {
        echo 'Não existe nenhum animal desse <br>';
    }
    ?>
    <button><a href="index.php" style="color: black;"><span class="material-symbols-outlined">arrow_back</span></a></button>
    <?php $lojas->close() ?>
</body>
</html>