
//modal editar tarefa
$("#Edit1").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var idtarefa = button.data("idtarefa"); // Extract info from data-* attributes
    var titulotarefa = button.data("tarefa"); // Extract info from data-* attributes
    var descricaotarefa = button.data("descricao"); // Extract info from data-* attributes
    var statustarefa = button.data("status"); // Extract info from data-* attributes
    var usuarioTarefa = button.data("nome"); // Extract info from data-* attributes


    var modal = $(this);
    modal.find(".modal-title").text("Atualizar tarefa | ID: " + idtarefa);
    modal.find("#id_tarefa").val(idtarefa);
    modal.find("#nome_tarefa").val(titulotarefa);
    modal.find("#tarefa_descri").val(descricaotarefa);
    modal.find("#tarefa_status").val(statustarefa);
    modal.find("#tarefa_atri").val(usuarioTarefa);
});




//modal deletar tarefa
$("#Deletar").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var idtarefa = button.data("idtarefa"); // Extract info from data-* attributes
    var nomeusuario = button.data("nome"); // Extract info from data-* attributes
    var tarefatitulo = button.data("tarefa"); // Extract info from data-* attributes
    var tarefadescricao = button.data("descricao"); // Extract info from data-* attributes



    var modal = $(this);
    modal.find(".modal-title").text("Deseja excluir tarefa atribuída para: | " + nomeusuario);
    modal.find("#idtarefa").val(idtarefa);
    modal.find("#tarefanome").val(tarefatitulo);
    modal.find("#descricaotarefa").val(tarefadescricao);

});



