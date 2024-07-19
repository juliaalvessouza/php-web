<?php

class ProdutoRepositorio {

    private PDO $pdo;
    
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function opcoesCafe(): array
    {
        $produtosCafe = [];
        try {
            $sql1 = "SELECT * FROM produtos WHERE tipo =  'Café'  ORDER BY preco";
             $statement = $this->pdo->query($sql1);
             
             if ($statement) {
                 $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);
                 echo 'Dados retornados: ';
             } else {
                 echo 'Falha na execução da consulta.';
             }
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
     
        $dadosCafe = array_map(function($cafe){
            return new Produto($cafe['id'],
                $cafe['tipo'],
                $cafe['nome'],
                $cafe['descricao'],
                $cafe['imagem'],
                $cafe['preco']
            );
        },$produtosCafe);

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array 
    {
        $produtosAlmoco = [];

        try {
            $sql2 = "SELECT * FROM produtos WHERE tipo =  'Almoço' ORDER BY preco";
             $statement = $this->pdo->query($sql2);
             
             if ($statement) {
                 $produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);
                 echo 'Dados retornados: ';
             } else {
                 echo 'Falha na execução da consulta.';
             }
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    
        $dadosAlmoco = array_map(function($almoco){
            return new Produto($almoco['id'],
                $almoco['tipo'],
                $almoco['nome'],
                $almoco['descricao'],
                $almoco['imagem'],
                $almoco['preco']
            );
        },$produtosAlmoco);

        return $dadosAlmoco;
    }

}