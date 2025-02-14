<?php
require_once("conexao.php");

?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar alimetos</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <header class="cabeçalho">
        <h2 class="titulo">cadastrar ingrediente</h2>
        <a href="admin.html">
            <span class="circulo"></span>
        </a>
    </header>

    <main class="painel">
        <section class="secão">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                <label for="">nome</label><br>
                <input type="text" name="nome"><br>
                <br>
                <label for="">caloria</label><br>
                <input type="number" name="caloria" step="0.01"><br>
                <br>
                <label for="">proteina</label><br>
                <input type="number" name="proteina" step="0.01"><br>
                <br>
                <label for="">gordura</label><br>
                <input type="number" name="gordura" step="0.01"><br>
                <br>
                <label>Selecione uma imagem</label><br>
                <input type="file" name="imagem" accept="image/*"><br>
                <br>
                <button class="simpleLabel" type="submit" name="submit">cadastrar</button>
            </form>
        </section>
    </main>

    <footer class="rodapé">
        <p class="assinatura">Por Kalixtocode4u</p>
    </footer>
</body>
</body>
</html>
<?php

$nome = "";
$proteina;
$gordura;
$caloria;
$src = "";

if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"])){
    $src = "ingredientes/".$_FILES["imagem"]["name"];
}

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $proteina = $_POST['proteina'];
    $gordura = $_POST['gordura'];
    $caloria = $_POST['caloria'];
    
    $inserir = "INSERT INTO ingredientes(item,proteina,gordura,caloria, src_ingrediente) VALUES('$nome', '$proteina', '$gordura','$caloria','$src');";
    
    $operacao = mysqli_query($conexao,$inserir);
    
    if(mysqli_affected_rows($conexao) > 0){
        echo "Cliente cadastrado com sucesso!";
    }else{
        echo "Erro no cadastro";
    }
}

?>