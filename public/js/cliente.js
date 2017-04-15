//$(function () {
   // $('.js-basic-example').DataTable();
//}); 

// LLAMAR AL MODAL DE REGISTRO USUARIO
$("#new_cliente").click(function(){ 
    $("#ModalClientes").modal("show");
})
//FIN LLAMAR AL MODAL DE REGISTRO USUARIO


//FUNCION PARA GUARDAR UN NUEVO CLIENTE
function registrar_clientes(){
	var token    = new $('#token').val();
    var datos  = new FormData($("#form-clientes")[0]);
    $.ajax({
    url:"/cliente",
    headers :{'X-CSRF-TOKEN': token},
    type: 'POST',
    dataType: 'json',
    contentType: false,
    processData: false,
    data: datos,
    success:function(res){
      if(res.registro==true){
         swal("Efood!", "El cliente se ha registro correctamente!", "success");
        document.getElementById("form-clientes").reset();  
        $("#ModalClientes").modal("hide");
        $("#table_clientes").load("/lista_Clientes");
       }
     }
	});
}
//FIN FUNCION PARA GUARDAR UN NUEVO CLIENTE

//BUSCAR CLIENTE POR CEDULA

$(document).ready(function(){
    $('#cedula').focus();
  });

$('#Btn_buscarClientes').click(function(){
            var cedula=$('#cedula').val();
           // alert(cedula);
            if(cedula==""){
                swal("El campo cedula esta vacio por favor ingrese una cedulaa")
            }else{
              cargar_datos(cedula);

            }
              
       });

      function AgregarClienteTabla(){
        var id = $('#codigo').val();
        var cedula =$('#cedulaok').val();
        var nombres =$('#nombres').val();
        var correo = $('#correo').val();
        var apellidos =$('#apellidos').val();
        var direccion =$('#direccion').val();
        var telefono =$('#telefono').val();
        alert("nombre"+nombres);
        var y=0;

        if(y==0){
                  
            cadena = "<tr>";
            cadena = cadena + "<td>"+ id +"</td>";
            cadena = cadena + "<td>"+ cedula +"</td>";
            cadena = cadena + "<td>"+ nombres +"</td>";
            cadena = cadena + "<td>"+ apellidos +"</td>";
            cadena = cadena + "<td>"+ correo +"</td>";
            cadena = cadena + "<td>"+ direccion +"</td>";
            cadena = cadena + "<td>"+ telefono +"</td> </tr>";
                 $("#table_clientes tbody").append(cadena);
                }
                
       
        }

function cargar_datos(cedula){
            var route="/Buscarcliente/"+cedula+"";  
             $.get(route,function(res){
               $("#codigo").val(res.id);
              // alert($("#id").val(res.id));
               $("#cedulaok").val(res.cedula);
               $("#nombres").val(res.nombres);
               $("#correo").val(res.correo);
               $("#apellidos").val(res.apellidos);
               $("#direccion").val(res.direccion);
               $("#telefono").val(res.telefono);
                  AgregarClienteTabla();


                  aka

                  renplazas id por res.id


       });
    }