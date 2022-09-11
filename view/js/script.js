
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
                alert('DELETADO COM SUCESSO!')
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
    $.ajax({
        url: "/src/controller/EventoController.php",
        method: 'GET',
        data: {id},
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
        document.getElementById('inputNomeEditar').value = value.nome;
        document.getElementById('inputDataEditar').value = value.data;
        document.getElementById('inputLocalEditar').value = value.local;
    });
    $('#editarModal').modal('show');
}