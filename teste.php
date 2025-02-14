<?php
require("conexao.php");

$ingredientes = $_POST['ingrediente'];

foreach ($ingredientes as $item) {

    $consulta = "SELECT item,caloria,proteina,gordura FROM ingredientes WHERE id = $item";

    $exeConsulta = mysqli_query($conexao, $consulta);
    
    if(mysqli_num_rows($exeConsulta) != 0){
        foreach ($exeConsulta as $items) {
    
            echo "(100g)$items[item] <br>";
            echo "caloria : $items[caloria] <br>";
            echo "proteina : $items[proteina] <br>";
            echo "gordura : $items[gordura] <br>";
        
        }
    }else{
        echo "nenhum registro";
    }
}

?>