<?php
include_once '/home/diogo/PhpstormProjects/crud-php/src/model/Evento.php';
session_start();

    $eventoModel = new Evento();
    $data = $eventoModel->selecionarTodosEventos();


?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Eventos</h1>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#salvarModal">
        Criar Evento
    </button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Data</th>
            <th scope="col">Local</th>
            <th scope="col">Convidados</th>
            <th scope="col">Deletar</th>
            <th scope="col">Editar</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach($data as $key => $value): ?>
            <tr>
                <div class="row">
                    <td><?=$value['id'];?></td>
                    <td><?=$value['nome']?></td>
                    <td><?=$value['data']?></td>
                    <td><?=$value['local'];?></td>
                    <td><button type="button" class="btn btn-secondary">CONVIDADOS</button></td>
                    <td><button type="button" class="btn btn-danger" onclick="deletarEvento(<?=$value['id']?>)">DELETAR</button></td>
                    <td><button type="button" id="btnEditar" class="btn btn-primary" onclick="getEventoById(<?=$value['id']?>)">EDITAR</button></td>
                </div>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>

<div class="modal" tabindex="-1" id="editarModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form METHOD="POST" class="row g-3">
                    <div class="col-md-6">
                        <label for="inputNomeEditar" class="form-label">Evento</label>
                        <input type="text" class="form-control" id="inputNomeEditar" name="inputNomeEditar">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDataEditar" class="form-label">Data</label>
                        <input type="date" class="form-control" id="inputDataEditar" name="inputDataEditar">
                    </div>
                    <div class="col-12">
                        <label for="inputLocalEditar" class="form-label">Local</label>
                        <input type="text" class="form-control" id="inputLocalEditar" name="inputLocalEditar">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="salvarModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Salvar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form METHOD="POST" class="row g-3">
                    <div class="col-md-6">
                        <label for="inputNome" class="form-label">Evento</label>
                        <input type="text" class="form-control" id="inputNome" name="inputNome">
                    </div>
                    <div class="col-md-6">
                        <label for="inputData" class="form-label">Data</label>
                        <input type="date" class="form-control" id="inputData" name="inputData">
                    </div>
                    <div class="col-12">
                        <label for="inputLocal" class="form-label">Local</label>
                        <input type="text" class="form-control" id="inputLocal" name="inputLocal">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button id="btnSalvar" type="button" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src= "js/script.js"></script>
</body>
</html>
