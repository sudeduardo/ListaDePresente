<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Valmir
 */
class Controller {

    public $Produtos;
    public $item;
    public $listas;
    public $users;
    public $presentes;

    public function index() {
        $u = new Usuario();
        if (isset($_POST['cadastro'])) {
            $email = $_POST['email'];
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $u->setUsuario($email, $nome, $senha);
        }
        if (isset($_POST['login'])) {

            $u = new Usuario();
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $u->login($email, $senha);
        }
    }

    public function produtos() {


        $p = new Produto();
        $this->Produtos = $p->getProduto();
        if (isset($_POST['cadastro'])) {

            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $link = $_POST['link'];

            $p->setProduto($nome, $descricao, $link);
        }
        $this->item = $p->getProduto();
    }

    public function listas() {
        $l = new Usuario();
        $this->users = $l->getUsuario();
    }

    public function Perfil() {
        $u = new Usuario();
        $u->ValidaLogin();


        $l = new Lista();

        $dados = $l->getListabyUser($_SESSION['login']['id']);
        $_SESSION['nome_lista'] = $dados['nome'];
        $_SESSION['link'] = $dados['link'];

        $id = $_SESSION['login']['id'];
        $l = new Lista();
        $this->presentes = $l->getItensbyId($id);
        
        if(isset($_POST['enviar_lista'])){
            $nome_lista=$_POST['nome_lista'];
            $a= new Lista();
            if($a->editarNome($nome_lista, $_SESSION['login']['id'])){
                $_SESSION['nome_lista']=$nome_lista;
            }
        }
        if (isset($_POST['enviar'])) {
            if (isset($_FILES['imagem'])) {
                $arquivo = $_FILES['imagem'];
                $pasta = "img/";
                $id = $_SESSION['login']['id'];
                $nome=$this->enviaFoto($arquivo, $pasta);
                $u->adicionarFoto($nome, $id);
            }
        }
        
    }

    public function enviaFoto($arquivo, $pasta) {

        
        $temp = $arquivo['tmp_name'];

        $foto = md5(date("Y-m-d")). rand(0, 10000) . '.jpg' ;
       $_SESSION['login']['foto']=$foto;
        if (!move_uploaded_file($temp, $pasta . $foto)) {
            return FALSE;
        } else {
            return $foto;
        }
    }

}
