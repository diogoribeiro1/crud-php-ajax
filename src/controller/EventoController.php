<?php
include_once '/home/diogo/PhpstormProjects/crud-php/src/model/Evento.php';
{
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            if ($_POST['methodRequest'] == 'POST')
            {
                saveEvent();
            }else if ($_POST['methodRequest'] == 'DELETE')
            {
                deleteEvent();
            }else if ($_POST['methodRequest'] == 'PUT')
            {
                updateEvent();
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

    function getEventById()
    {
        $eventoModel = new Evento();

        $evento = $eventoModel->selecionarEventoPeloId($_GET['id']);

        $evento = json_encode($evento);

        echo $evento;
    }

    function updateEvent()
    {
        $eventoModel = new Evento();

        $eventoModel->id = $_POST['id'];
        $eventoModel->nome = $_POST['nome'];
        $eventoModel->data = $_POST['dataInput'];
        $eventoModel->local = $_POST['local'];

        $eventoModel->updateEvento($eventoModel);
    }

    function deleteEvent()
    {
        $eventoModel = new Evento();

        $eventoModel->deletarEvento($_POST['jsonId']);
    }

}