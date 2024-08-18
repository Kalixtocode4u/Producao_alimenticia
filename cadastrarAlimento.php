<?php
require_once("conexao.php");

?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar alimetos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body >
    <header>
        <h2 class="titulo">cadastrar Alimento</h2><br>
    </header>

    <main class="corpo_form">
    <div class="painel_links">
            <div class="fill_box"></div>
            <a class="simpleBttn headerBttn" href="index.php">Painel de Alimentos</a>
            <div class="fill_box"></div>
            <p class="simpleBttn title_painel">cadastrar Alimento</p>
            <div class="fill_box"></div>
            <a class="simpleBttn headerBttn" href="cadastrarIngrediente.php">cadastrar Ingrediente</a>
            <div class="fill_box"></div>
            <a class="simpleBttn headerBttn" href="cadastrarReceita.php">cadastrar Receita</a>
            <div class="fill_box"></div>
            <a class="simpleBttn headerBttn" href="listarAlimentos.php">listar Alimentos</a>
            <div class="fill_box"></div>
            <a class="simpleBttn headerBttn" href="testeAlimentos.php">teste Alimentos</a>
            <div class="fill_box"></div>
        </div>
        <div class="form_box">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <label for="">nome</label><br>
                <input type="text" name="nome"><br>
                <br>
                <button class="simpleBttn" type="submit" name="submit">cadastrar</button>
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