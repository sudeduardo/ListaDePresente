<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author Valmir
 */
class Produto {
    public function setProduto($nome,$descricao,$link){
            $sql="INSERT INTO produto VALUES (?,?,?,?,?);";
        
            $conexao = Conexao::getConexao()->prepare($sql);
        
            $conexao->bindValue(1,0);
            $conexao->bindValue(2,$nome);
            $conexao->bindValue(3,$descricao);
            $conexao->bindValue(4,'./img/produto.png');
            $conexao->bindValue(5,$link);
                   
            $conexao->execute();
        
    }
    
    public function getProduto(){
        $sql="select * from produto";
        
        $conexao = Conexao::getConexao()->prepare($sql);
                       
        $conexao->execute();
        
        if ($conexao->rowCount() > 0) {
            $produto= $conexao->fetchAll(PDO::FETCH_ASSOC);
            return $produto;
        }else{
            return array();
        }
    }
}
