$(function () {
    $('.js-basic-example').DataTable();
});    

$("#new_producto").click(function(){ // LLAMAR AL MODAL DE REGISTRO USUARIO
    $("#ModalProducto").modal("show");
})


$("radio_7").on('Checked', function(event){
	alert("Iva");
	});

