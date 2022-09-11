<?php
include_once '/home/diogo/PhpstormProjects/crud-php/src/dao/Conexao.php';

class EventoDao extends Conexao
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = "eventos_tbl";
    }

    public function insertEvento(Evento $model)
    {
        $sql = "INSERT INTO $this->table(nome, data, local) VALUES (?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->data);
        $stmt->bindValue(3, $model->local);

        $stmt->execute();
    }

    public function selectEvento()
    {
        $sql = "SELECT * FROM $this->table";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectEventoById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteEvento($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

    public function updateEvento(Evento $eventModel)
    {
        $sql = "UPDATE $this->table SET nome = ?, data = ?, local = ? WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $eventModel->nome);
        $stmt->bindValue(2, $eventModel->data);
        $stmt->bindValue(3, $eventModel->local);
        $stmt->bindValue(4, $eventModel->id);
        $stmt->execute();
    }




}