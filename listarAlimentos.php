<?php
require_once("conexao.php");

?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastrar alimetos</title>
</head>
<body>
    <h2>Receita lista</h2><br>
    <a href="index.php">Home</a>
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
</body>
</html>
<?php

?>