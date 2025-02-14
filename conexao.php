<?php
$DB_server = "seu server";
$DB_user = "seu usuario";
$DB_pass = " sua senha";
$DB_name = "seu db";

$conexao = mysqli_connect($DB_server,$DB_user,$DB_pass,$DB_name);

if(!$conexao){
    echo "conexao morreu :[";
}
?>