<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Valmir
 */
class Usuario {

    public function setUsuario($email, $nome, $senha) {
        try{$data = date("Y-m-d");

        $sql = "INSERT INTO usuario VALUES (?,?,?,?,?,?);";

        $conexao = Conexao::getConexao()->prepare($sql);

        $conexao->bindValue(1,0);
        $conexao->bindValue(2, $email);
        $conexao->bindValue(3, $nome);
        $conexao->bindValue(4, 'usuario.png');
        $conexao->bindValue(5, md5($senha));
        $conexao->bindValue(6, $data);
      
        $conexao->execute();
        }catch(Exception $ex){
           return FALSE;
       }
        
        try{
        $usuario=  $this->getUsuarioByName($email);
       
        $sql="insert into lista values(?,?,?,?)";
         
        $conexao = Conexao::getConexao()->prepare($sql);
        
        $conexao->bindValue(1,0);
        $conexao->bindValue(2,"Lista de $nome");
        $conexao->bindValue(3, md5(date("Y-m-d")));
        $conexao->bindValue(4,$usuario['id']);
        
        $conexao->execute();
             return TRUE;            
       }
       catch(Exception $ex){
           return FALSE;
       }
    } 
    

    public function getUsuario() {
        $sql = "select * from usuario";

        $conexao = Conexao::getConexao()->prepare($sql);

        $conexao->execute();

        if ($conexao->rowCount() > 0) {
            $usuario = $conexao->fetchAll(PDO::FETCH_BOTH);
            return $usuario;
        } else {
            return array();
        }
    }

    public function getUsariobyId($id) {
        $sql = "select nome,data_cadastro, foto from usuario where id=?";

        $conexao = Conexao::getConexao()->prepare($sql);

        $conexao->bindValue(1, $id);

        $conexao->execute();

        if ($conexao->rowCount() > 0) {
            $user = $conexao->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        } else {
            return array();
        }
    }
    public function getUsuarioByName($email) {
            $sql = "select id from usuario where email=?";

        $conexao = Conexao::getConexao()->prepare($sql);

        $conexao->bindValue(1, $email);

        $conexao->execute();

        if ($conexao->rowCount() > 0) {
            $user = $conexao->fetch(PDO::FETCH_ASSOC);
            return $user;
        } else {
            return array();
        }
        
    }
    public function getUsuarioByNameAll($nome) {
        if($nome===""){
             $sql = "select nome, id from usuario";
        }else{
            $sql = "select nome, id from usuario where nome like '".$nome."%'";
        }
        $conexao = Conexao::getConexao()->prepare($sql);

        $conexao->execute();

        if ($conexao->rowCount() > 0) {
            $user = $conexao->fetchAll(PDO::FETCH_ASSOC);
       
            return $user;
        } else {
            return array();
        }
        
    }
    public function login($email, $senha) {
        $sql = "select * from usuario where email=? and senha=?";
        $conexao = Conexao::getConexao()->prepare($sql);
        $conexao->bindValue(1, $email);
        $conexao->bindValue(2, md5($senha));
        $conexao->execute();
        $usuario = $conexao->fetchAll(PDO::FETCH_ASSOC);
        if ($conexao->rowCount() === 1) {
            session_start();
            $_SESSION['login'] = $usuario[0];
            header('Location: perfil.php');
        }
    }

    public function ValidaLogin() {
        session_start();
        if (isset($_SESSION['login'])) {
        }else{
            header('Location: index.php');
        }
    }
    public function logout() {
        if (isset($_SESSION['login'])) {
            session_destroy();
            header('Location: index.php');
        }  else {
        header('Location: index.php');    
        }
        
    }
    
    public function adicionarFoto($foto,$id){
        try{
           $sql="update usuario set foto=? where id=?";
          
           $conexao = Conexao::getConexao()->prepare($sql);
        
            $conexao->bindValue(1,$foto);
            $conexao->bindValue(2,$id);
            
        
            $conexao->execute();
            
            return TRUE;
         }
        catch(Exception $ex){
            return FALSE;
        }
        
        
        }

}
