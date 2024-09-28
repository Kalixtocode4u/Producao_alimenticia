<?php
require_once("conexao.php");

?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alimentos lista</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2 class="titulo">Alimentos lista</h2>
    </header>
    
    <main>
        <div class="painel_links">
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="index.php">Painel de Alimentos</a>
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="cadastrarAlimento.php">cadastrar Alimento</a>
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="cadastrarIngrediente.php">cadastrar Ingrediente</a>
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="cadastrarReceita.php">cadastrar Receita</a>
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombraTitulo">listar Alimentos</a>
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="listarIngrediete.php" >listar Ingrediente</a>
            <div class="maxWidth sombra"></div>
        </div>
        <div class="formulario">
            <form action="perfilAlimento.php" method="POST">
        
                <label for="">alimentos</label><br>
                <?php
                    $consulta1 = "SELECT id,nome FROM pratos;";
                    $fazConsuta1 = mysqli_query($conexao,$consulta1);
        
                    if(mysqli_num_rows($fazConsuta1) != 0){
                        foreach($fazConsuta1 as $prato){
                ?>
                <button name="alimento[]" type="submit" value="<?= $prato["id"]; ?>"><?= $prato["nome"]; ?></button><br>
                <?php 
                        }
                    }
                ?>

            </form>
        </div>
        
    </main>

</body>
</html>
<?php

?>