<?php
require('conexao.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload imagens</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2 class="titulo">upload imagens</h2>
    </header>
    <main>
        <div class="painel_links">
            <div class="maxWidth sombra"></div>
            <a class="headerLabel sombra" href="index.php">Painel de Alimentos</a>
            <div class="maxWidth sombra"></div>
        </div>
        <div class="formulario">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
                <label for="">selecione o Ingrediente</label><br>
                <select name="comida">
              <?php
                    $consulta1 = "SELECT id,item FROM ingredientes;";
                    $fazConsuta1 = mysqli_query($conexao,$consulta1);
        
                    if(mysqli_num_rows($fazConsuta1) != 0){
                        foreach($fazConsuta1 as $ingredinet){
                ?>
                    <option value="<?= $ingredinet["id"]; ?>"><?= $ingredinet["item"]; ?></option>
                <?php }} ?>
                </select>
                <br>
                <label>Selecione uma imagem</label><br>
                <input type="file" name="imagem" accept="image/*"><br>
                <button class="simpleLabel" type="submit" name="submit">cadastrar Imagem</button>
            </form>
        </div>
    </main>
</body>
</html>

<?php
if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"])){
    
    $imagem = "ingredientes/".$_FILES["imagem"]["name"];
    $valor = $_POST["comida"];

    echo $imagem;
    echo $valor;

    //move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);

    $consulta = "UPDATE ingredientes SET src_ingrediente = '$imagem' WHERE id = $valor";
    
    $fazConsuta = mysqli_query($conexao,$consulta);
    echo "upload finalizado";

}
?>