<?php
include_once '/home/diogo/PhpstormProjects/crud-php/src/dao/evento/EventoDao.php';

class Evento
{
    public $id, $nome, $data, $local;

    private $dao;

    function __construct(){
        $this->dao = new EventoDao();
    }

    public function salvarEvento(Evento $evento)
    {
        $this->dao->insertEvento($evento);
    }

    public function selecionarTodosEventos()
    {
        return $this->dao->selectEvento();
    }

    public function selecionarEventoPeloId($id)
    {
        return $this->dao->selectEventoById($id);
    }

    public function deletarEvento($id)
    {
        $this->dao->deleteEvento($id);
    }

}