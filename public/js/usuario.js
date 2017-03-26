$(function () {
    $('.js-basic-example').DataTable();
});    

$("#new_usuario").click(function(){ // LLAMAR AL MODAL DE REGISTRO USUARIO
    $("#ModalUsuario").modal("show");
})


// FUNCION PARA GUARDAR UN NUEVO USUARIO

function registrar_usuario(){
	var token    = new $('#token').val();
    var datos  = new FormData($("#form-usuario")[0]);
    $.ajax({
    url:"/usuario",
    headers :{'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'json',
    contentType: false,
    processData: false,
    data: datos,
    success:function(res){
      if(res.registro==true){
         swal("Efood!", "El usuario se ha registro correctamente!", "success");
        document.getElementById("form-usuario").reset();  
        $("#ModalUsuario").modal("hide");
        $("#tusuario").load("/lista_usuarios");
       }
     }
	});
}
