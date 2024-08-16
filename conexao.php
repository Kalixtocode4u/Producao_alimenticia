<?php
$DB_server = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "prod_comida";

$conexao = mysqli_connect($DB_server,$DB_user,$DB_pass,$DB_name);

if(!$conexao){
    echo "conexao morreu :[";
}
?>