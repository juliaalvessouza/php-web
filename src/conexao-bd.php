<?php
try {
    $pdo = new PDO('mysql:host=172.17.0.2;port=3306;dbname=serenatto', 'root', 'root', [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]);
    echo 'Conexão bem-sucedida!';
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}


