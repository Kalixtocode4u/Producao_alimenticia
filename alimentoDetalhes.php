<?php
require("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil alimentos</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <header class="cabeçalho">
        <h2 class="titulo">Pratos Perfil</h2>
        <a href="admin.html">
            <span class="circulo"></span>
        </a>
    </header>

    <main class="painel">
        <section class="secão">
            <?php
            $alimentos = $_POST['alimento'];

            foreach ($alimentos as $alime){
                $consulta = "SELECT nome,src_prato FROM pratos WHERE id = $alime";

                $exeConsulta = mysqli_query($conexao, $consulta);
                
                if(mysqli_num_rows($exeConsulta) != 0){
                    foreach ($exeConsulta as $items){
                        ?>
                        <img src="<?= $items['src_prato'] ?>">
                        <h2><?= $items['nome']; ?></h2>
                        <?php
                    }
                }
            }

            foreach ($alimentos as $alime) {

                $consulta = "SELECT item FROM receita
                        INNER JOIN
                        ingredientes ON ingredientes.id = receita.id_ingrediente
                        where id_alimento = $alime";
            
                $exeConsulta = mysqli_query($conexao, $consulta);
                
                if(mysqli_num_rows($exeConsulta) != 0){
                    foreach ($exeConsulta as $items) {
                
                        ?>
                        <p><?= $items['item']; ?></p>
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