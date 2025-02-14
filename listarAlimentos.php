<?php
require_once("conexao.php");
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alimentos lista</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <header class="cabeçalho">
        <h2 class="titulo">Pratos lista</h2>
        <a href="admin.html">
            <span class="circulo"></span>
        </a>
    </header>
    
    <main class="painel">
        <section class="secão">
            <form action="alimentoDetalhes.php" method="POST">
        
                <table>
                    <caption>alimentos</caption>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $consulta1 = "SELECT id,nome FROM pratos;";
                    $fazConsuta1 = mysqli_query($conexao,$consulta1);
                    
                    if(mysqli_num_rows($fazConsuta1) != 0){
                        foreach($fazConsuta1 as $prato){
                            ?>
                        <tr>
                            <td><?=$prato["id"] ?></td>
                            <td><?= $prato["nome"] ?></td>
                            <td><button name="alimento[]" type="submit" value="<?= $prato["id"]; ?>">Detalhes</button></td>
                        </tr>
                <?php 
                        }
                    }
                    ?>
                    </tbody>
                </table>

            </form>
        </section>
        
    </main>

    <footer class="rodapé">
        <p class="assinatura">Por Kalixtocode4u</p>
    </footer>
</body>
</html>
<?php

?>