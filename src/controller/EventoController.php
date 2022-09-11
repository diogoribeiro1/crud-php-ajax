<?php
include_once '/home/diogo/PhpstormProjects/crud-php/src/model/Evento.php';
{
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            if ($_POST['methodRequest'] == 'POST')
            {
                saveEvent();
            }else
            {
                deleteEvent();
            }
            break;
        case 'GET':
            getEventById();
            break;
    }

    function saveEvent()
    {
        $eventoModel = new Evento();

        $eventoModel->nome = $_POST['nome'];
        $eventoModel->data = $_POST['dataInput'];
        $eventoModel->local = $_POST['local'];

        $eventoModel->salvarEvento($eventoModel);
    }

    function deleteEvent()
    {
        $eventoModel = new Evento();
        $eventoModel->deletarEvento($_POST['jsonId']);
    }

    function updateEvent()
    {
        $eventoModel = new Evento();
        $eventoModel->deletarEvento($_POST['jsonId']);
    }

    function getEventById()
    {
        $eventoModel = new Evento();
        $evento = $eventoModel->selecionarEventoPeloId($_GET['id']);
        $evento = json_encode($evento);
        echo $evento;
    }

}