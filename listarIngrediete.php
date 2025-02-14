<?php
require_once("conexao.php");

?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes lista</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>

    <header class="cabeçalho">
        <h2 class="titulo">Ingredientes lista</h2>
        <a href="admin.html">
            <span class="circulo"></span>
        </a>
    </header>
    
    <main class="painel">
        <section class="secão">
            <form action="ingredienteDetalhes.php" method="POST">
        
                <caption>Ingredientes</caption>
                <table>
                    <thead>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Proteina</th>
                        <th>Gordura</th>
                        <th>Caloria</th>
                        <th>Opções</th>
                    </thead>
                    <tbody>
                    <?php
                        $consulta1 = "SELECT id,item,proteina,gordura,caloria FROM ingredientes;";
                        $fazConsuta1 = mysqli_query($conexao,$consulta1);
            
                        if(mysqli_num_rows($fazConsuta1) != 0){
                            foreach($fazConsuta1 as $item){
                    ?>
                        <tr>
                            <td><?= $item["id"] ?></td>
                            <td><?= $item["item"] ?></td>
                            <td><?= $item["proteina"] ?></td>
                            <td><?= $item["gordura"] ?></td>
                            <td><?= $item["caloria"] ?></td>
                            <td><button name="ingrediente[]" type="submit" value="<?= $item["id"]; ?>">Detalhes</button></td>
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