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
<body>
    <header>
        <h2 class="titulo">cadastrar Receita</h2>
    </header>
    <a class="simpleBttn" href="index.php">Home</a>
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
            $consulta2 = "SELECT id,nome FROM ingredientes;";
            $fazConsuta2 = mysqli_query($conexao,$consulta2);

            if(mysqli_num_rows($fazConsuta2) != 0){
                foreach($fazConsuta2 as $ingrediente){
        ?>
            <option value="<?= $ingrediente["id"]; ?>"><?= $ingrediente["nome"]; ?></option>
        <?php }} ?>

        </select><br>
        <br>
        <button type="submit" name="submit">cadastrar</button>
    </form>
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