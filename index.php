<?php
require("conexao.php")
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produção alimenticia</title>
    <link rel="stylesheet" href="design.css">
    <link rel="shortcut icon" href="#">
</head>
<body>
    <header class="cabeçalho">
        <h1 class="titulo">PRODUÇÃO DE ALIMENTOS<i>1.4</i></h1>
        <a href="login.html">
            <span class="circulo"></span>
        </a>
    </header>
    
    <main class="conteiner">

        <div class="conteudo">
            <!--
            <aside class="informações">
                <h2 class="titulo2">Informações</h2>
                <table>
                    <caption><img>Ingrediente Nome</caption>
                    <thead>
                        <tr>
                            <th>Nutriente</th>
                            <th>Valor(100g)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Caloria</th>
                            <td>82.2</td>
                        </tr>
                        <tr>
                            <th>Proteina</th>
                            <td>985.7</td>
                        </tr>
                        <tr>
                            <th>Gordura</th>
                            <td>989</td>
                        </tr>
                    </tbody>
                </table>
            </aside>
            -->

            <section class="cardapio">
                <h2>Opções de Ingredientes</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                    <div class="catalogo">
                        <?php
                        $consulta = "SELECT id,src_ingrediente FROM ingredientes;";
                        $fazConsulta = mysqli_query($conexao, $consulta);
            
                        if(mysqli_num_rows($fazConsulta) != 0){
                            foreach ($fazConsulta as $ingredintes) {
                        ?>
                        <div class="ingrediente">
                            <label>
                                <input type="checkbox" name="escolha[]" value="<?= $ingredintes['id']; ?>">
                                <img src="<?= $ingredintes['src_ingrediente']; ?>">
                            </label>
                        </div>
                        <?php 
                            }
                        } 
                        ?>
                    </div>
                    <button class="botão" type="submit" name="submit">Gerar alimentos</button>
                </form>
            </section>
            
            <section class="resultado">
                <h2>Pratos</h2>
                <?php
                if(isset($_POST["submit"])){
                    
                    $escolhas = $_POST['escolha'];
                        
                    foreach ($escolhas as $escolha) {
                                
                        $consulta = "SELECT id_alimento, src_prato, nome FROM receita
                                    INNER JOIN 
                                    pratos ON pratos.id = receita.id_alimento
                                    JOIN 
                                    ingredientes ON ingredientes.id = receita.id_ingrediente 
                                    where id_ingrediente=$escolha;";
                            
                        $exeConsulta = mysqli_query($conexao, $consulta);
            
                        if (mysqli_num_rows($exeConsulta) != 0) {
                            foreach ($exeConsulta as $alimentosEscolhido) {
                ?>
                <table>
                    <caption><div><img src="<?= $alimentosEscolhido['src_prato']; ?>"><p><?= $alimentosEscolhido['nome'] ?></p></div></caption> 
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
                    ?>
                        <tr>
                            <td><?= $ingredientesEscolhidos['item'] ?></td>
                            <td><?= $ingredientesEscolhidos['caloria'] ?></td>
                            <td><?= $ingredientesEscolhidos['proteina'] ?></td>
                            <td><?= $ingredientesEscolhidos['gordura'] ?></td>
                        </tr>
                    <?php
                        }}
                    ?>
                    </tbody>
                </table>
                <?php
                }}}}
                ?>
                
            </section>
        </div>
    
    </main>
    
    <footer class="rodapé">
        <p class="assinatura">Por Kalixtocode4u</p>
    </footer>
</body>

</html>
