window.app = new Vue({
    el: '#listar',
    data: {
        dados: []
    }
});

$.ajax({
    url: 'ajax/clienteAjax.php', 
    type: 'GET',
    dataType: 'JSON'

}).done((e) => {
    app.dados = e;
});

$(document).on('click', '#abrirModal', function(event){
    event.preventDefault(); 
    var id = $(this).attr('data-id')//pegando id
    window.desc = new Vue({
        el: '#descricoes',
        data: {
            descricoes: []
        }
    });
    
$.ajax({
    url: 'ajax/clienteDescricao.php?id=' + id, 
    type: 'GET',
    dataType: 'JSON'

}).done((e) => { 
    desc.descricoes = e;  
    })
    $('#modalMostrar').iziModal('open');
});

//remover Descrição---------------------------------------------

$(document).on('click','#removerRegistro', function(event){
    event.preventDefault();
    var cli_id = $(this).attr('desc-id')
   $.ajax({
       url: 'ajax/removerRegistro.php?cli_id=' + c_liid,
       type: 'GET',
       dataType: 'JSON',
       data:{cli_id:cli_id}
   }).done((e) =>{
        console.log(e);
   })
})
//----------------------------------------------------------------
$('#modalMostrar').iziModal({
    title: 'Mostrar',
    padding: 10,
    onClosed: function(){
        //location.reload();
    } 
});
//------------------------registrarAtendimento------------------
$(document).on('click','#registrarAtendimento', function(event){
    event.preventDefault();
    $('#modalRegistrar').iziModal('open');
});

$('#modalRegistrar').iziModal({
    title: 'Registrar Atendimento',
    padding: 10
}); 
//------------------------removerREGISTRO------------------
$(document).on('click', '#removerRegist', function(event){
    event.preventDefault();
    $('#modalRemoverRegist').iziModal('open');
});

$('#modalRemoverRegist').iziModal({
    title: 'Certeza',
    padding: 10
})

//------------------------abrirModalCliente------------------
$(document).on('click','#abrirModalCliente', function(event){
    event.preventDefault();
    $('#modalCliente').iziModal('open');
});

$('#modalCliente').iziModal({
    title: 'Cadastrar Cliente',
    padding: 10
});

$(document).on('click', '#alterarRegistro', function(event){
    event.preventDefault();
    $('#modalAlterar').iziModal('open');
});

$('#modalAlterar').iziModal({
    title: 'Alterar Usuário',
    padding: 10
})

