<?php
include 'config.php';

$id=$_GET['id'];
$a=new Lista();
$user= new Usuario();    
$usuario=$user->getUsariobyId($id)[0];
$item=$a->getItensbyId($id);
$array=array(
    'usuario'=>$usuario,
    'itens'=>$item
);
echo json_encode($array); 