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
    <?php 
    require_once 'includes/lojas.php';
    require_once 'includes/funcoes_seguranca.php';
    ?>
    <form method="get">
        digite o nome do animal <br>
        <input type="text" name="nome"> <br>
        digite a descrição do animal <br>
        <input type="text" name="descricao"> <br>
        digite o preço do animal <br>
        <input type="text" name="preco"> <br>
        digite a url da imagem do animal <br>
        <input type="text" name="imagem"> <br>
        <input type="submit">
    </form>
    <?php 
    $nome = proteger_contra_xss_e_sql_injection($_GET['nome'] ?? '');
    $descricao = proteger_contra_xss_e_sql_injection($_GET['descricao'] ?? '');
    $preco = proteger_contra_xss_e_sql_injection($_GET['preco'] ?? '');
    $imagem = proteger_contra_xss_e_sql_injection($_GET['imagem'] ?? '');
    if (!empty($nome) and !empty($descricao) and !empty($preco) and !empty($imagem)){
        if ($lojas->query("INSERT INTO adocao_animais VALUES (DEFAULT, '$nome', '$descricao', '$preco', '$imagem')") == true){
            echo 'Animal adcionado com sucesso✅ <br>';
        } else {
            echo 'Erro ao Inserir dados <br>';
        }
    } else {
        echo 'Adicione os Dados do Animal <br>';
    }
    ?>
    <button><a href="index.php" style="color: black;"><span class="material-symbols-outlined">arrow_back</span></a></button>
    <?php $lojas->close() ?>
</body>
</html>