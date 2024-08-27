<?php
require("conexao.php")
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produção alimenticia</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="#">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Lemonada:wght@300..700&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poetsen+One&display=swap');
    </style>
</head>
<body>
    <header>
        <h1 class="titulo">Produção de Alimentos <i>1.4</i></h1>
    </header>
    <main>
        <div class="painel_links">
            <div class="maxWidth sombraFicha"></div>
            <p class="headerLabel sombraTitulo">Painel de Alimentos</p>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="cadastrarAlimento.php">cadastrar Alimento</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="cadastrarIngrediente.php">cadastrar Ingrediente</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="cadastrarReceita.php">cadastrar Receita</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="listarAlimentos.php">listar Alimentos</a>
            <div class="maxWidth sombraFicha"></div>
            <a class="headerLabel sombraFicha" href="testeAlimentos.php">teste Alimentos</a>
            <div class="maxWidth sombraFicha"></div>
        </div>
        <div class="conteiner">
            <div class="Prod_painel">
                <h2 id="simpletitulo">Opções de ingredientes</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="1"><div class="bloco"><img src="ingredientes/trigo.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="2"><div class="bloco"><img src="ingredientes/tomate.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="3"><div class="bloco"><img src="ingredientes/batata.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="4"><div class="bloco"><img src="ingredientes/carne.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="5"><div class="bloco"><img src="ingredientes/ovo.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="6"><div class="bloco"><img src="ingredientes/leite.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="7"><div class="bloco"><img src="ingredientes/gelo.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="8"><div class="bloco"><img src="ingredientes/pao.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="9"><div class="bloco"><img src="ingredientes/laranja.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="10"><div class="bloco"><img src="ingredientes/oleo.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="11"><div class="bloco"><img src="ingredientes/milho.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="12"><div class="bloco"><img src="ingredientes/macarrão.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="13"><div class="bloco"><img src="ingredientes/alface.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="14"><div class="bloco"><img src="ingredientes/queijo.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="15"><div class="bloco"><img src="ingredientes/pimentao.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="16"><div class="bloco"><img src="ingredientes/pimentao_verm.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="17"><div class="bloco"><img src="ingredientes/peperroni.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="18"><div class="bloco"><img src="ingredientes/oregano.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="19"><div class="bloco"><img src="ingredientes/agua.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="20"><div class="bloco"><img src="ingredientes/cenoura.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="21"><div class="bloco"><img src="ingredientes/brocolis.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="22"><div class="bloco"><img src="ingredientes/porco.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="23"><div class="bloco"><img src="ingredientes/pepino.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="24"><div class="bloco"><img src="ingredientes/rucula.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="25"><div class="bloco"><img src="ingredientes/presunto.png"></div></label>
                    <label class="cheq"><input type="checkbox" name="escolha[]" value="26"><div class="bloco"><img src="ingredientes/morango.png"></div></label>
                    
                    <button class="simpleLabel" type="submit" name="submit"><b>Alimentos</b></button>
                </form>
            </div>
            <div id="Resultado">
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
                                foreach ($exeConsulta as $alimentosEscolhido) {
                    ?>
                <table>
                    <?php 
                        
                        echo "<caption><div><img src='alimento/$alimentosEscolhido[nome].png'><p>$alimentosEscolhido[nome]</p></div></caption>"; 
                    ?>

                            <thead>
                                <tr>
                                    <th>Ingrediente</th>
                                    <th>Caloria</th>
                                    <th>Proteina</th>
                                    <th>Gordura</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                        $consultaB = "SELECT item,caloria,proteina,gordura FROM receita
                                    INNER JOIN
                                    ingredientes ON ingredientes.id = receita.id_ingrediente
                                    where id_alimento = $alimentosEscolhido[id_alimento];";
                                        
                        $exeConsultaB = mysqli_query($conexao, $consultaB);

                        if (mysqli_num_rows($exeConsultaB) != 0) {
                            foreach ($exeConsultaB as $ingredientesEscolhidos){
                                echo 
                                    "<tr>
                                        <td>$ingredientesEscolhidos[item]</td>
                                        <td>$ingredientesEscolhidos[caloria]</td>
                                        <td>$ingredientesEscolhidos[proteina]</td>
                                        <td>$ingredientesEscolhidos[gordura]</td>
                                    </tr>";
                        }}
                    ?>
                            </tbody>
                        </table>
                    <?php
                    }}}}
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
