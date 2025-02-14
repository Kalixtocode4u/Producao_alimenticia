<?php
require("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <header class="cabeçalho">
        <h2 class="titulo">Ingrediente Perfil</h2>
        <a href="admin.html">
            <span class="circulo"></span>
        </a>
    </header>

    <main class=painel>
        <section class="secão">
            <?php
            $ingredientes = $_POST['ingrediente'];

            foreach ($ingredientes as $item) {
            
                $consulta = "SELECT item,caloria,proteina,gordura,src_ingrediente FROM ingredientes WHERE id = $item";
            
                $exeConsulta = mysqli_query($conexao, $consulta);
                
                if(mysqli_num_rows($exeConsulta) != 0){
                    foreach ($exeConsulta as $items) {
                        ?>
                        <img src="<?= $items['src_ingrediente'] ?>">
                        <p><?= $items['item'] ?>(100g)</p><br>
                        <p>caloria :<?= $items['caloria'] ?></p><br>
                        <p>proteina :<?= $items['proteina'] ?></p><br>
                        <p>gordura :<?= $items['gordura'] ?></p><br>
                        <?php
                    
                    }
                }else{
                    echo "nenhum registro";
                }
            }
            ?>
        </section>
    </main>

    <footer class="rodapé">
        <p class="assinatura">Por Kalixtocode4u</p>
    </footer>
</body>
</html>