<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lsta
 *
 * @author Valmir
 */
class Lista {
    public function getListas(){
          $sql="select lista.nome,lista.link,usuario.nome from lista
                inner join usuario on lista.usuario_id=usuario.id;";
        
        $conexao = Conexao::getConexao()->prepare($sql);
                       
        $conexao->execute();
        
        if ($conexao->rowCount() > 0) {
            $listas= $conexao->fetchAll(PDO::FETCH_BOTH);
            return $listas;
        }else{
            return array();
        }
    }
    
    public function getItensbyId($id){
        $sql="select produto.nome,produto.descricao,produto.foto,produto.id,produto.link from usuario 
                inner join lista on lista.usuario_id=usuario.id
                inner join item on item.lista_id=lista.id
                inner join produto on produto.id=item.produto_id
                where usuario.id=?;";
        $conexao = Conexao::getConexao()->prepare($sql);
        
        $conexao->bindValue(1,$id);
        
        $conexao->execute();
        
        if ($conexao->rowCount() > 0) {
            $itens= $conexao->fetchAll(PDO::FETCH_BOTH);
            return $itens;
        }else{
            return array();
        }
        
    }
    
    public function getListabyUser($id){
            $sql = "SELECT * FROM lista where usuario_id=?";
        $conexao = Conexao::getConexao()->prepare($sql);
        
        $conexao->bindValue(1,$id);
        
        $conexao->execute();
        
        if ($conexao->rowCount() > 0) {
            $itens= $conexao->fetchAll(PDO::FETCH_ASSOC);
            return $itens[0];
        }else{
            return array();
        }
    }
    
    public function getIdListabyUser($id){
        
        $sql = "SELECT lista.id FROM lista inner join usuario on lista.usuario_id=usuario.id where usuario.id=?";
        
        $conexao = Conexao::getConexao()->prepare($sql);
        
        $conexao->bindValue(1,$id);
        
        $conexao->execute();
        
        if ($conexao->rowCount() > 0) {
            $itens= $conexao->fetch(PDO::FETCH_ASSOC);
            return $itens;
        }else{
            return array();
        }
    }
    
    public function setItem($id_produto, $id_user){
        try {
       
        $sql="INSERT INTO item (produto_id, lista_id) VALUES (?, ?);";
         $conexao = Conexao::getConexao()->prepare($sql);
        $id_lista=$this->getListabyUser($id_user);
         $conexao->bindValue(1,$id_produto);
         $conexao->bindValue(2,$id_lista['id']);
          $conexao->execute();
          return TRUE;  
        } catch (Exception $ex) {
            return FALSE;
        }

    }
    public function excluirItemByLista($id_produto, $id_user) {
          try {
       
        $sql="DELETE FROM item WHERE produto_id = ? AND lista_id = ?";
        
        $conexao = Conexao::getConexao()->prepare($sql);
        $id_lista=$this->getListabyUser($id_user);
        
        $conexao->bindValue(1,$id_produto);
        $conexao->bindValue(2,$id_lista['id']);
        
        $conexao->execute();
          return TRUE;    
          }catch (Exception $ex) {
            return FALSE;
        }
        
    }
  
    public function getUserByLink($link){
        $sql="select usuario_id from lista where link=?";
        
        $conexao = Conexao::getConexao()->prepare($sql);
        
        $conexao->bindValue(1,$link);
        
        $conexao->execute();
        
        if ($conexao->rowCount() > 0) {
            $id= $conexao->fetch(PDO::FETCH_ASSOC);
            return $id['usuario_id'];
        }else{
            return array();
        }
        
        
    }
    
    public function editarNome($nome_lista,$id) {
        
        try{
        $sql="update lista set nome=? where usuario_id=?";
        
        $conexao = Conexao::getConexao()->prepare($sql);
        
        $conexao->bindValue(1,$nome_lista);
        $conexao->bindValue(2,$id);
        $conexao->execute();
        return TRUE;
    }catch(Exception $ex){
        return FALSE;
    }
  }
}

