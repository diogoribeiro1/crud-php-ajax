$(document).ready(function () {

    var methodRequest = 'GET_ALL';

    $.ajax({
        url: "/src/controller/EventoController.php",
        type: 'GET',
        data:{methodRequest},
        success: function (result) {
            var lista = JSON.parse(result);
            listarEventos(lista);
        },
        error: function (error) {
            alert(error);
        }
    })
});

function listarEventos(lista) {

    var tbody = document.getElementById("tbody");

    lista.map((evento) => {
        $("#tbody").append("<tr> <div class='row'> <td>" + evento.id + "</td> <td>" + evento.nome + "</td> <td>" + evento.data + " </td> <td>" + evento.local + " </td> <td><button type=\"button\" class=\"btn btn-danger\" onclick=\"deletarEvento(" + evento.id + ")\">Delete</button></td> <td><button type=\"button\" class=\"btn btn-primary\" onclick=\"getEventoById(" + evento.id + ")\" data-bs-toggle=\"modal\" data-bs-target=\"#editarModal\">Edit</button></td> </div></tr>");
    })
}

$(function (){
    $("#btnSalvar").on("click", function (){

    var nome = document.getElementById("inputNome").value;
    var dataInput = document.getElementById("inputData").value;
    var local = document.getElementById("inputLocal").value;
    var methodRequest = 'POST';

        $.ajax({
            url: "/src/controller/EventoController.php",
            method: 'POST',
            data: {nome, dataInput, local, methodRequest},
            type: 'json',
            success: function () {
                alert('Salvo com Sucesso!')
                document.location.reload(true);
            },
            error: function () {
                alert('error');
            }
        })
    })
})

$(function (){
    $("#btnEditar").on("click", function (){

        var id = document.getElementById("inputIdEditar").value;
        var nome = document.getElementById("inputNomeEditar").value;
        var dataInput = document.getElementById("inputDataEditar").value;
        var local = document.getElementById("inputLocalEditar").value;
        var methodRequest = 'PUT';

        $.ajax({
            url: "/src/controller/EventoController.php",
            method: 'POST',
            data: {id, nome, dataInput, local, methodRequest},
            type: 'json',
            success: function () {
                alert('Editado com Sucesso!')
                document.location.reload(true);
            },
            error: function () {
                alert('error');
            }
        })
    })
})

function deletarEvento(id)
{
    result = confirm("Deseja realmente apagar?");
    if (result) {
        var jsonId = JSON.parse(id);
        var methodRequest = 'DELETE';

        $.ajax({
            url: "/src/controller/EventoController.php",
            method: 'POST',
            data: {jsonId, methodRequest},
            type: 'json',
            success: function () {
                alert('Deletado com Sucesso!')
                document.location.reload(true);
            },
            error: function () {
                alert('error');
            }
        })
    }
}

function getEventoById(id)
{
    var methodRequest = 'GET_BY_ID';

    $.ajax({
        url: "/src/controller/EventoController.php",
        method: 'GET',
        data: {id, methodRequest},
        type: 'json',
        success: function (result) {
            evento = JSON.parse(result);
            setarInputs(evento);
        },
        error: function () {
            alert('error');
        }
    })
}

function setarInputs(evento)
{
    evento.map(function (value){
        document.getElementById('inputIdEditar').value = value.id;
        document.getElementById('inputNomeEditar').value = value.nome;
        document.getElementById('inputDataEditar').value = value.data;
        document.getElementById('inputLocalEditar').value = value.local;
    });
    $('#editarModal').modal('show');
}
