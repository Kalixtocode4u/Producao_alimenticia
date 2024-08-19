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
        <h2 class="titulo">Alimentos lista</h2>
    </header>
    
    <main>
        <div class="painel_links">
            <div class="fill_box"></div>
            <a class="simpleBttn headerBttn" href="index.php">Painel de Alimentos</a>
            <div class="fill_box"></div>
            <a class="simpleBttn headerBttn" href="cadastrarAlimento.php">cadastrar Alimento</a>
            <div class="fill_box"></div>
            <a class="simpleBttn headerBttn" href="cadastrarIngrediente.php">cadastrar Ingrediente</a>
            <div class="fill_box"></div>
            <a class="simpleBttn headerBttn" href="cadastrarReceita.php">cadastrar Receita</a>
            <div class="fill_box"></div>
            <p class="simpleBttn title_painel">listar Alimentos</p>
            <div class="fill_box"></div>
            <a class="simpleBttn headerBttn" href="testeAlimentos.php">teste Alimentos</a>
            <div class="fill_box"></div>
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
                <button type="submit" name="submit">Show</button>
            </form>
        </div>
        <div id="Resultado">
            <table>
                <thead>
                    <tr>
                        <th>ingrediente</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST["submit"])){
        
                    $prato = $_POST['alimento'];
                
                    $consulta = "SELECT item FROM receita INNER JOIN ingredientes ON ingredientes.id = receita.id_ingrediente where id_alimento=$prato";
                    $exeConsulta = mysqli_query($conexao, $consulta);
        
                    if (mysqli_num_rows($exeConsulta) != 0) {
                        foreach ($exeConsulta as $receita) {
                ?>
                    <tr>
                        <td><?= $receita['item']; ?></td>
                    </tr>
                <?php 
                    }}}
                ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
<?php

?>