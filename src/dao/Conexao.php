<?php
class Conexao
{
    protected $conexao;

    const HOST = 'localhost:3306', DATABASE= 'eventos_db', USER = 'root', PASS = '1234';

    public function __construct()
    {
        try {
            $dsn = "mysql:host=localhost:3306;dbname=eventos_db";
            $this->conexao = new PDO($dsn, self::USER, self::PASS);

        } catch (\PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
            die();
        }

    }
}