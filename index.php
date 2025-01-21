<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <title>GuiAnimais</title>
</head>
<body>
    <button><a href="adcionar-animal.php" style="text-decoration: none;">Adcionar Animal</a></button>
    <?php require_once 'includes/lojas.php' ?>
    <h1>GuiAnimais</h1>
    <hr>
    <table>
        <?php 
        $busca = $lojas->query('select * from adocao_animais');
        if (!$busca){
            echo 'Erro';
        } else {
            if ($busca->num_rows == 0){
                echo 'Não existe nenhum animal para adotar ainda';
            } else {
                while ($reg=$busca->fetch_object()){
                    echo "<tr><td><a href='pagina-animal.php?i=$reg->id'><img src='$reg->imagem'></a></td><td>$reg->nome</td></tr>";
                }
            }
        }
        ?>
    </table>
    <?php $lojas->close() ?>
</body>
</html>