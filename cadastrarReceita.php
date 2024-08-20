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
<body>
    <header>
        <h2 class="titulo">cadastrar Receita</h2>
    </header>
    <main>
        <div class="painel_links">
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="index.php">Painel de Alimentos</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="cadastrarAlimento.php">cadastrar Alimento</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="cadastrarIngrediente.php">cadastrar Ingrediente</a>
            <div class="maxWidth sombraFicha"></div>
            <p class="headerLabel sombraTitulo">cadastrar Receita</p>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="listarAlimentos.php">listar Alimentos</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="testeAlimentos.php">teste Alimentos</a>
            <div class="maxWidth sombraFicha"></div>
        </div>
        <div class="form_box">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        
                <label for="">alimento</label><br>
                <select name="alimento" id="">
                
                <?php
                    $consulta1 = "SELECT id,nome FROM prato;";
                    $fazConsuta1 = mysqli_query($conexao,$consulta1);
        
                    if(mysqli_num_rows($fazConsuta1) != 0){
                        foreach($fazConsuta1 as $prato){
                ?>
                    <option value="<?= $prato["id"]; ?>"><?= $prato["nome"]; ?></option>
                <?php }} ?>
        
                </select><br>
                <br>
        
        
        
                <label>ingrediente</label><br>
                <select name="ingrediente">
                
                <?php
                    $consulta2 = "SELECT id,item FROM ingredientes;";
                    $fazConsuta2 = mysqli_query($conexao,$consulta2);
        
                    if(mysqli_num_rows($fazConsuta2) != 0){
                        foreach($fazConsuta2 as $ingrediente){
                ?>
                    <option value="<?= $ingrediente["id"]; ?>"><?= $ingrediente["item"]; ?></option>
                <?php }} ?>
        
                </select><br>
                <br>
                <button type="submit" name="submit">cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>
<?php

$id_prato;
$id_ingrediente;

if(isset($_POST['submit'])){
    $id_prato = $_POST['alimento'];
    $id_ingrediente = $_POST['ingrediente'];
    
    $inserir = "INSERT INTO receita(id_alimento,id_ingrediente) VALUES('$id_prato', '$id_ingrediente');";
    
    $operacao = mysqli_query($conexao,$inserir);
    
    if(mysqli_affected_rows($conexao) > 0){
        echo "Cliente cadastrado com sucesso!";
    }else{
        echo "Erro no cadastro";
    }
}

?>