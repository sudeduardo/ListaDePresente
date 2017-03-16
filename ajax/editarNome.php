<?php
include 'config.php';
session_start();
if(isset($_SESSION['login'])){
  if(isset($_POST['up'])){
      $nome=$_POST['nome'];
      $id=$_SESSION['login']['id'];
     $l= new Lista();
     $l->editarNome($nome, $id);
  }
}
