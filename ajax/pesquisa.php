<?php
include 'config.php';
if(isset($_GET['nome'])){
    $nome=$_GET['nome'];
$a= new Usuario();
$json=$a->getUsuarioByNameAll($nome);
echo json_encode($json);
}