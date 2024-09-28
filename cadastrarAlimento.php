<?php
require_once("conexao.php");

?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar alimentos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body >
    <header>
        <h2 class="titulo">cadastrar Alimento</h2>
    </header>

    <main class="corpo_form">
        <div class="painel_links">
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="index.php">Painel de Alimentos</a>
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombraTitulo">cadastrar Alimento</a>
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="cadastrarIngrediente.php">cadastrar Ingrediente</a>
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="cadastrarReceita.php">cadastrar Receita</a>
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="listarAlimentos.php">listar Alimentos</a>
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="listarIngrediete.php" >listar Ingrediente</a>
            <div class="maxWidth sombra"></div>
        </div>
        <div class="formulario">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                <label for="">nome</label><br>
                ►<input type="text" name="nome"><br>
                <br>
                <label>Selecione uma imagem</label><br>
                <input type="file" name="imagem" accept="image/*"><br>
                <br>
                <button class="simpleLabel" type="submit" name="submit">cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>
<?php

$nome = "";
$src = "";

if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"])){
    $src = "ingredientes/".$_FILES["imagem"]["name"];
}

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    
    $inserir = "INSERT INTO pratos(nome, src_prato) VALUES('$nome', '$src');";
    
    $operacao = mysqli_query($conexao,$inserir);
    
    if(mysqli_affected_rows($conexao) > 0){
        echo "Cliente cadastrado com sucesso!";
    }else{
        echo "Erro no cadastro";
    }
}

?>