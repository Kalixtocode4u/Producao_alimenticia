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
    <header>
        <h1 id="titulo">PRODUÇÃO DE ALIMENTOS<i>1.4</i></h1>
    </header>
    
    <main>
    
        <div class="conteiner">
            <h2>Opções de ingredientes</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <div class="painel">
                    <?php
                    $consulta = "SELECT id,src_ingrediente FROM ingredientes;";
                    $fazConsulta = mysqli_query($conexao, $consulta);
        
                    if(mysqli_num_rows($fazConsulta) != 0){
                        foreach ($fazConsulta as $ingredintes) {
                    ?>
                    <label class="cheq">
                        <input type="checkbox" name="escolha[]" value="<?= $ingredintes['id']; ?>">
                        <div class="bloco">
                            <img src="<?= $ingredintes['src_ingrediente']; ?>">
                        </div>
                    </label>
                    <?php 
                        }
                    } 
                    ?>
                </div>
                <button class="btt" type="submit" name="submit">Alimentos</button>
            </form>
        </div>
    
        <div class="output">
            <h2>resultado de Alimentos</h2>
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
                <caption><div><img src="<?= $alimentosEscolhido['src_prato']; ?>"><p><?= $alimentosEscolhido['nome'] ?></p></div></caption>"; 
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
            
        </div>

        <div class="info">
            <h2>Info</h2>
            
            <a href="#">Painel de Alimentos</a>
            
            <a href="cadastrarAlimento.php">cadastrar Alimento</a>
            
            <a href="cadastrarIngrediente.php">cadastrar Ingrediente</a>
            
            <a href="cadastrarReceita.php">cadastrar Receita</a>
            
            <a href="listarAlimentos.php">listar Alimentos</a>
            
            <a href="listarIngrediete.php" >listar Ingrediente</a>
        </div>
    
    </main>
    
    <footer class="flex-around">
        <p>criado por Carlos Pedro</p>
        <p>UNLICENSED</p>
        <p>PHP,Laragon,SQL</p>
    </footer>
</body>

</html>
