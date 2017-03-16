<?php
include 'config.php';
session_start();
if(isset($_SESSION['login'])){
  if(isset($_POST['id_item'])){
      $id_produto=$_POST['id_item'];
      $id_user=$_SESSION['login']['id'];
     $a= new Lista();
     $estado=array();
     if($a->excluirItemByLista($id_produto, $id_user)){
         $estado['estado']=TRUE;
     }else{
         $estado['estado']=FALSE;
     }
     echo json_encode($estado);
  }
}