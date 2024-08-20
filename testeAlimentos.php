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
        <h2 class="titulo">Opcões</h2>
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
            <a class="headerLabel sombraFicha" href="cadastrarReceita.php">cadastrar Receita</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="listarAlimentos.php">listar Alimentos</a>
            <div class="maxWidth sombraFicha"></div>
            <p class="headerLabel sombraTitulo">teste Alimentos</p>
            <div class="maxWidth sombraFicha"></div>
        </div>

        <div class="conteiner">
            <div class="Prod_painel">
                <h2 id="simpletitulo">Opções de ingredientes</h2>
                <div class="form_box">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                
                        <label>ingredientes</label><br>
                        <!-- <div class="gridConteiner"> -->
                            <?php
                                $consulta1 = "SELECT id,item FROM ingredientes;";
                                $fazConsuta1 = mysqli_query($conexao,$consulta1);
                    
                                if(mysqli_num_rows($fazConsuta1) != 0){
                                    foreach($fazConsuta1 as $ingrediente){
                                        echo "<input type='checkbox' name='escolha[]' value='$ingrediente[id]'> $ingrediente[item]";
                                        echo "<br>";
                                        
                                    }
                                } 
                            ?>
                        <!-- </div> -->
                
                        <br>
                        <button type="submit" name="submit">Show</button>
                    </form>
                </div>
            </div>

            <div id="resultado">
                <h2 id="simpletitulo">resultado de Alimentos</h2>
                <div class="tabelaAlimentos">
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
                </div>
            </div>
        </div>
    </main>

    
</body>
</html>
<?php

?>