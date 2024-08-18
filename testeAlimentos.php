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
        <h2 class="titulo">Opcões</h2><br>
    </header>

    <a class="simpleBttn" href="index.php">Home</a>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

        <label>ingredientes</label><br>
        
        <?php
            $consulta1 = "SELECT id,item FROM ingredientes;";
            $fazConsuta1 = mysqli_query($conexao,$consulta1);

            if(mysqli_num_rows($fazConsuta1) != 0){
                foreach($fazConsuta1 as $ingrediente){
                    echo "<input type='checkbox' name='escolha[]' value='$ingrediente[id]'>$ingrediente[item]";

                    if($ingrediente['id']%3 == 0){
                        echo "<br>";
                    }
                }
            } 
        ?>

        <br>
        <button type="submit" name="submit">Show</button>
    </form>

    <?php
        if(isset($_POST["submit"])){

            $escolhas = $_POST['escolha'];
        
            
            foreach ($escolhas as $escolha) {
                    
                $consulta = "SELECT id_alimento, nome FROM receita
                            INNER JOIN 
                            prato ON prato.id = receita.id_alimento
                            JOIN 
                            ingredientes ON ingredientes.id = receita.id_ingrediente 
                            where id_ingrediente=$escolha;";
                $exeConsulta = mysqli_query($conexao, $consulta);

                if (mysqli_num_rows($exeConsulta) != 0) {
                        foreach ($exeConsulta as $ingredientesEscolhidos) {
                            echo "<h3>$ingredientesEscolhidos[nome]</h3>";

                            $consultaB = "SELECT item FROM receita
                                        INNER JOIN
                                        ingredientes ON ingredientes.id = receita.id_ingrediente
                                        where id_alimento = $ingredientesEscolhidos[id_alimento];";
                            
                            $exeConsultaB = mysqli_query($conexao, $consultaB);

                            if (mysqli_num_rows($exeConsultaB) != 0) {
                                foreach ($exeConsultaB as $alimentosEscolhidos){
                                    echo "<p>$alimentosEscolhidos[item]</p>";
                                }
                            }

                    }
                }
         
            }
        }
    ?>
</body>
</html>
<?php

?>