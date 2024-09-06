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
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="index.php">Painel de Alimentos</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraTitulo">cadastrar Alimento</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="cadastrarIngrediente.php">cadastrar Ingrediente</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="cadastrarReceita.php">cadastrar Receita</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="listarAlimentos.php">listar Alimentos</a>
            <div class="maxWidth sombraFicha"></div>
        </div>
        <div class="form_box">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <label for="">nome</label><br>
                <input type="text" name="nome"><br>
                <br>
                <button class="simpleLabel" type="submit" name="submit">cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>
<?php

$nome = "";

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    
    $inserir = "INSERT INTO prato(nome) VALUES('$nome');";
    
    $operacao = mysqli_query($conexao,$inserir);
    
    if(mysqli_affected_rows($conexao) > 0){
        echo "Cliente cadastrado com sucesso!";
    }else{
        echo "Erro no cadastro";
    }
}

?>