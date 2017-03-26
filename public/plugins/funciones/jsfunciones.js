var _esN = window.navigator.appName=='Netscape' ? true : false;
var _esIE = window.navigator.appName=='Microsoft Internet Explorer' ? true : false;
var jsonRes;
var text_load;


$('#cedula_buscar').focusout(function(){
  if($("#cedula_buscar").val()=="2222222222"){
    new PNotify({
    title: 'Oh!',
    text: 'La cedula ingresada es invalidad por favor vuelva a ingregar.',
    type: 'error',
    delay: '1500'
    });
   
  }
  else if(check_cedula($("#cedula_buscar").val())== true){
    
  }else{
    new PNotify({
    title: 'Oh!',
    text: 'La cedula ingresada es invalidad por favor vuelva a ingregar.',
    type: 'error',
    delay: '1500'
    });
   
  }
});

//FUNCION PARA CREAR EL COMBO SECO 2
    $(document).ready(function() {
      $('select#cmb_seco1').on('change',function(){
        var idS =$(this).val();
        $.ajax({
          type:"POST",
          url:'includes/crear_cmbseco2.php',
          data:{idS:idS},
          success:function(response){
            $("#seco2").html(response);
          }
        });
      });
    });


    //FUNCION PARA CREAR EL COMBO CALDO 2

    $(document).ready(function() {
      $('select#cmb_caldo1').on('change',function(){
        var idC =$(this).val();
        //     document.cookie ='var='+idC;
        $.ajax({
          type:"POST",
          url:'includes/crear_cmbCaldo2.php',
          data:{idC:idC},
          success:function(response){
            $("#caldo2").html(response);
          }
        });
      });
    });
    //FUNCION PARA ELIMNAR ITEM DEL COMBO CALDO2

    function delete_itemC2(valor){
      alert(valor);
      $("#cmb_caldo2").find("option[value='valor']").remove();
    }

    /////////////////////////////////////////////////////////

    // FUNCIONES PARA ACTUALIZAR ELIMINAR TIPO CANTIDAD
    function actualizar_tipoCantidad(id){
       $.ajax({
        url:'platos/consulta_tipocantId.php',
        type:'POST',
        dataType:"json",
        data:{id:id},
        success:function(response){
          $('#id_update').val(response.Rid);
          $('#idlib').val(response.Rid);
          $('#categoria_update').val(response.Rtipo);
        }
      });
    }

    function guardar_update_tipoCantidad(){
       var datosform=$("#formLibro").serialize();
      $.ajax({
        url:'platos/update_tipocant.php',
        type:'POST',
        data:datosform,
        success:function(response){
          swal({   title: "Actualización Correcta!",   text: "Se ha actualizado correctamente",   timer: 2000,   showConfirmButton: false });                   
          $('#lista1').html(response);
        }
      });
    }

    function eliminar_tipoCantidad(id){
      swal({   title: "¿Estás seguro?", 
   text: "De eliminar la unidad de control seleccionada!",  
   type: "warning", 
   showCancelButton: true,  
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Si, Eliminar!",   
   cancelButtonText: "No, Cancelar!",   
   closeOnConfirm: false,  
    closeOnCancel: true
},

 function(isConfirm){ 
   if (isConfirm) {     
    swal("Eliminar!", "La unidad de control seleccionada se ha eliminado", "success");   
            $.ajax({
          url:'platos/delete_tipocant.php',
          type:'POST',
          data:{id:id},
          success:function(response){ $('#lista1').html(response); }
        });
   }
  });

}
    //////////////////////////////////////////////////////////////////////////////////
    /// FUNCIONES PARA ACTULIZAR Y ELIMINAR TIPO DE PLATO
    function guardar_update(){
      var datosform=$("#formLibro").serialize();
      $.ajax({
        url:'platos/update_tipoplato.php',
        type:'POST',
        data:datosform,
        success:function(response){
          swal({   title: "Actualización Correcta!",   text: "se ha actualizado correctamente",   timer: 2000,   showConfirmButton: false });                   
          $('#lista1').html(response);
        }
      });
    }

    function actualizar(id){
       $.ajax({
        url:'platos/consulta_tipoporId.php',
        type:'POST',
        dataType:"json",
        data:{id:id},
        success:function(response){
          $('#id_update').val(response.Rid);
          $('#idlib').val(response.Rid);
          $('#categoria_update').val(response.Rtipo);
        }
      });
    }


  function eliminar(id){
      swal({   title: "¿Estás seguro?", 
   text: "De eliminar esta categoria",  
   type: "warning", 
   showCancelButton: true,  
   confirmButtonColor: "#DD6B55", 
   confirmButtonText: "Si, Eliminar!",   
   cancelButtonText: "No, Cancelar!",   
   closeOnConfirm: false,  
    closeOnCancel: true 
},

 function(isConfirm){ 
   if (isConfirm) {     
    swal("Eliminar!", "La categoria seleccionada se eliminado", "success");   
    $.ajax({
          url:'platos/delete_tipoplato.php',
          type:'POST',
          data:{id:id},
          success:function(response){
            //alert("Tipo ha sido elimindado correcto");
            $('#lista1').html(response);
            //divResultado.innerHTML = ajax.responseText
          }
        });
   } 
       });

}

    //////////////////////////////////////////////////////////////////



    $(document).ready(function(){
      $("#btn_tipo").click(function(){
        if($('#tipo').val()=="")
        {
          $('#vacio').fadeIn(500);
          $('#vacio').fadeOut(1000);
          $('#tipo').focus();
        }else {
          var tipo =$('#tipo').val();
          $("#respuesta").html("<img src='dist/img/load.gif'> ");
          $.ajax({
            type:"POST",
            dataType:"json",
            url:'includes/tipocantAjax.php',
            data:{tipo:tipo},
            success:function(response){
              if(response.respuesta==true){
                setTimeout(function(){
                  //  $('.desvanecer2').hide();
                  $('#respuesta').fadeOut(1000);
                  $('#tipo').val("");
                    //$("#respuesta").html(datos);
                },2000);
                $('#mensaje').fadeIn(2000);
                $('#mensaje').fadeOut(1000);
              }else {
                $('#error').fadeIn(2000);
                $('#error').fadeOut(1000);
              }
            }
          });
        }
      });
    });

    $(document).ready(function(){
      $("#btn_categoria").click(function(){
        if($('#categoria').val()=="")
        {
          new PNotify({title: 'Alerta!',text: 'El campo nueva categoria esta vacio',type: 'error',delay: 2000});
          $('#categoria').focus();
        }else {
          var categoria =$('#categoria').val();
          $("#respuesta").html("<img src='dist/img/load.gif'> ");
          $.ajax({
            type:"POST",
            dataType:"json",
            url:'includes/tipoplatoAjax.php',
            data:{categoria:categoria},
            success:function(response){
              if(response.respuesta==true){
                  swal({   title: "Registro Correcto!",   text: "La nueva categoria se registro correctamente",   timer: 2000,   showConfirmButton: false });           
              }else {
                  swal({   title: "Alerta!",   text: "ha ocurrido un error inesperado en el sistema",   timer: 2000,   showConfirmButton: false });           
                  
                }
            }

          });
        }
      });
    });

    $(document).ready(function(){
      $("#btn_salir").click(function(){
        window.location="salir.php";
      });
    });

  



    function validar(frm) {
      if (frmcliente.cedu.value.length!=9) {
        alert('Codigo del Empleado Imcompleto');
        frmcliente.cedu.focus();
      }
    }

    function solo_numeros(e){
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8 || tecla==9)
      return true;
      patron =/[0-9]/;
      tecla_final = String.fromCharCode(tecla);
      return (patron.test(tecla_final));
    }

    function validar_numeros(e) {
      tecla = e.which || e.keyCode;
      patron = /\d/; // Solo acepta números
      te = String.fromCharCode(tecla);
      return (patron.test(te) || tecla == 9 || tecla == 8);
    }

    function solo_numeros1(e){
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8)
      return true;
      patron =/[1-3]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }


    function solo_monedas(e){
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8)
      return true;
      patron =/[0123456789.]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }

    function solo_fechas(e){
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8)
      return true;
      patron =/[0-9, -]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }

    function solo_letras(e){
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8)
      return true;
      patron =/[A-Z, a-z,ñ,Ñ]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }

    function numeros_letras(e){
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8)
      return true;
      patron =/[A-Z, a-z, 0-9,ñ,Ñ]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }

    function valemail(valor){
      re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
      if(!re.exec(valor))    {
        return false;
      }else{
        return true;
      }
    }



    function sumar(x)
    {
      // var yea=document.getElementById("tabla1").rows.length;
      //  alert("fila : "+x);
      //for(var x=0; x<yea ; x++){

      var valor1=verificar("presa"+x+"1");
      //alert("presa"+x+"1");
      var valor2=verificar("presa"+x+"2");
      var valor3=verificar("presa"+x+"3");
      var valor4=verificar("presa"+x+"4");
      // realizamos la suma de los valores y los ponemos en la casilla del
      // formulario que contiene el total
      //}
      //alert(valor1+" "+valor2+" "+valor3+" "+valor4)
      document.getElementById("total"+x+"").value=parseFloat(valor1)+parseFloat(valor2)+parseFloat(valor3)+parseFloat(valor4);
    }
    /**
    * Funcion para verificar los valores de los cuadros de texto. Si no es un
    * valor numerico, cambia de color el borde del cuadro de texto
    */
    function verificar(id)
    {
      var obj=document.getElementById(id);
      if(obj.value=="")
      value="0";
      else
      value=obj.value;
      if(validate_importe(value,1))
      {
        // marcamos como erroneo
        obj.style.borderColor="#808080";
        return value;
      }else{
        // marcamos como erroneo
        obj.style.borderColor="#f00";
        return 0;
      }
    }

    /**
    * Funcion para validar el importe
    * Tiene que recibir:
    *  El valor del importe (Ej. document.formName.operator)
    *  Determina si permite o no decimales [1-si|0-no]
    * Devuelve:
    *  true-Todo correcto
    *  false-Incorrecto
    */
    function validate_importe(value,decimal)
    {
      if(decimal==undefined)
      decimal=0;
      if(decimal==1)
      {
        // Permite decimales tanto por . como por ,
        var patron=new RegExp("^[0-9]+((,|\.)[0-9]{1,2})?$");

      }else{
        // Numero entero normal
        var patron=new RegExp("^([0-9])*$")
      }
      if(value && value.search(patron)==0)
      {
        return true;
      }
      return false;

    }

    function check_cedula( valor ){
      var cedula = valor;
      array = cedula.split( "" );
      num = array.length;
      if ( num == 10 ){
        total = 0;
        digito = (array[9]*1);
        for( i=0; i < (num-1); i++ ){
          mult = 0;
          if ( ( i%2 ) != 0 ) {
            total = total + ( array[i] * 1 );
          }else{
            mult = array[i] * 2;
            if ( mult > 9 )
            total = total + ( mult - 9 );
            else
            total = total + mult;
          }
        }
        decena = total / 10;
        decena = Math.floor( decena );
        decena = ( decena + 1 ) * 10;
        fin = ( decena - total );
        if ( ( fin == 10 && digito == 0 ) || ( fin == digito ) ) {
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }

    }

    function verificarEntrada(control)
    {
      if (control.value=='')
      alert('Debe ingresar datos');
    }

    function dias_transcurridos($fecha_i,$fecha_f)
    {
      $dias   = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
      $dias   = abs($dias); $dias = floor($dias);
      return $dias;
    }

    ///////////////////////////////////FUNCIONES GLOBALES DEL SISTEMA

    function ajax_cone(div,fun,url,load,noti){
      var ajax = getTransporte();

      ajax.onreadystatechange = function(){
        if(ajax.readyState == 4){
          if(ajax.status==200){
            if(typeof(JSON.parse(ajax.responseText)) != "string" ) {
              //campos_disabled(arrenv,false);
              //campos_disabled(arrenv,false);
              jsonRes=JSON.parse(ajax.responseText);
              if( typeof(fun) != "undefined" ){
                fun();
              }
            }else{
              noti.html(returnyellow("Alerta","vuelva a cargar la página"));
              //  campos_disabled(arrenv,false);
            }
          }else{

            noti.html(returnyellow("Alerta","vuelva a cargar la página y verifique su conexión de internet"));
            div.html(text_load);
            //campos_disabled(arrenv,false);
          }
        }else{
          div.html(load);
          //campos_disabled(arrenv,true);
        }
      };
      ajax.open('POST', url, true);
      ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
      ajax.send(env_form);
      env_form = "";
    }


    function getTransporte() {
      return _esN ? new XMLHttpRequest() : (new
        XObject('Msxml2.XMLHTTP') || new ActiveXObject('Microsoft.XMLHTTP') || false);
      }


      function returngreen(t1,t2){
        return '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><i class="fa fa-check-circle"></i> <strong>'+t1+'</strong> <small>'+t2+'</small>  </div>'
      };
      function returnyellow(t1,t2){
        return '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><i class="fa fa-exclamation-triangle "></i> <strong>'+t1+'</strong> <small>'+t2+'</small>  </div>'
      };
      function returnred(t1,t2){
        return '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><i class="fa fa-exclamation-triangle"></i> <strong>'+t1+'</strong> <small>'+t2+'</small></div>'
      };


/*
* Funcion JavaScript para validar Cedula,Ruc y Pasaporte Ecuatorianos.
*
* La funcion devuelve verdadero (true) en caso de exito y falso cuando hay
* un error en la validacion.
*
* Creado por: Carlos Julio Perez Q.
* cjperez@espol.edu.ec
* carlosjulioperez@gmail.com
* 093-208265 
* Guayaquil-Manta-Ecuador.
*/
   validarDocumento  = function() {          
   
      numero = document.getElementById('cedula').value;
    /* alert(numero); */
      var suma = 0;      
      var residuo = 0;      
      var pri = false;      
      var pub = false;            
      var nat = false;      
      var numeroProvincias = 22;                  
      var modulo = 11;
                  
      /* Verifico que el campo no contenga letras */                  
      var ok=1;
      for (i=0; i<numero.length && ok==1 ; i++){
         var n = parseInt(numero.charAt(i));
         if (isNaN(n)) ok=0;
      }
      if (ok==0){
         alert("No puede ingresar caracteres en el número");         
         return false;
      }
                  
      if (numero.length < 10 ){              
         alert('El número ingresado no es válido');                  
         return false;
      }
     
      /* Los primeros dos digitos corresponden al codigo de la provincia */
      provincia = numero.substr(0,2);      
      if (provincia < 1 || provincia > numeroProvincias){           
         alert('El código de la provincia (dos primeros dígitos) es inválido');
     return false;       
      }
      /* Aqui almacenamos los digitos de la cedula en variables. */
      d1  = numero.substr(0,1);         
      d2  = numero.substr(1,1);         
      d3  = numero.substr(2,1);         
      d4  = numero.substr(3,1);         
      d5  = numero.substr(4,1);         
      d6  = numero.substr(5,1);         
      d7  = numero.substr(6,1);         
      d8  = numero.substr(7,1);         
      d9  = numero.substr(8,1);         
      d10 = numero.substr(9,1);                
         
      /* El tercer digito es: */                           
      /* 9 para sociedades privadas y extranjeros   */         
      /* 6 para sociedades publicas */         
      /* menor que 6 (0,1,2,3,4,5) para personas naturales */ 
      if (d3==7 || d3==8){           
         alert('El tercer dígito ingresado es inválido');                     
         return false;
      }         
         
      /* Solo para personas naturales (modulo 10) */         
      if (d3 < 6){           
         nat = true;            
         p1 = d1 * 2;  if (p1 >= 10) p1 -= 9;
         p2 = d2 * 1;  if (p2 >= 10) p2 -= 9;
         p3 = d3 * 2;  if (p3 >= 10) p3 -= 9;
         p4 = d4 * 1;  if (p4 >= 10) p4 -= 9;
         p5 = d5 * 2;  if (p5 >= 10) p5 -= 9;
         p6 = d6 * 1;  if (p6 >= 10) p6 -= 9; 
         p7 = d7 * 2;  if (p7 >= 10) p7 -= 9;
         p8 = d8 * 1;  if (p8 >= 10) p8 -= 9;
         p9 = d9 * 2;  if (p9 >= 10) p9 -= 9;             
         modulo = 10;
      }         
      /* Solo para sociedades publicas (modulo 11) */                  
      /* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
      else if(d3 == 6){           
         pub = true;             
         p1 = d1 * 3;
         p2 = d2 * 2;
         p3 = d3 * 7;
         p4 = d4 * 6;
         p5 = d5 * 5;
         p6 = d6 * 4;
         p7 = d7 * 3;
         p8 = d8 * 2;            
         p9 = 0;            
      }         
         
      /* Solo para entidades privadas (modulo 11) */         
      else if(d3 == 9) {           
         pri = true;                                   
         p1 = d1 * 4;
         p2 = d2 * 3;
         p3 = d3 * 2;
         p4 = d4 * 7;
         p5 = d5 * 6;
         p6 = d6 * 5;
         p7 = d7 * 4;
         p8 = d8 * 3;
         p9 = d9 * 2;            
      }
                
      suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;                
      residuo = suma % modulo;                                         
      /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
      digitoVerificador = residuo==0 ? 0: modulo - residuo;                
      /* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/                         
      if (pub==true){           
         if (digitoVerificador != d9){                          
            alert('El ruc de la empresa del sector público es incorrecto.');            
            return false;
         }                  
         /* El ruc de las empresas del sector publico terminan con 0001*/         
         if ( numero.substr(9,4) != '0001' ){                    
            alert('El ruc de la empresa del sector público debe terminar con 0001');
            return false;
         }
      }         
      else if(pri == true){         
         if (digitoVerificador != d10){                          
            alert('El ruc de la empresa del sector privado es incorrecto.');
            return false;
         }         
         if ( numero.substr(10,3) != '001' ){                    
            alert('El ruc de la empresa del sector privado debe terminar con 001');
            return false;
         }
      }      
      else if(nat == true){         
         if (digitoVerificador != d10){ 
            $('.input-group').addClass("error-div");
             new PNotify({
              title: 'Oh!',
              text: 'El número de cédula ingresada es invalidad por favor vuelva a ingregar una cedula valida.',
              type: 'error',
              delay: '1500'
            });
            $("#cedula").focus();
            return false;
         }         
         if (numero.length >10 && numero.substr(10,3) != '001' ){                    
            alert('El ruc de la persona natural debe terminar con 001');
            return false;
         }
      }      
      return true;   
   }            


function cargar_factura(id){
  $.ajax({
    url:"reporte/consultar_factura.php",
    type:"POST",
    dataType:"json",
    data:{id:id},
    success:function(res){
      $("#nunFacturaM").html(res.vnum);
      $("#idventa").val(res.vid);
    }
  });
}

function cargar_facturaIVA(id){
  $.ajax({
    url:"reporte/consultar_fact2.php",
    type:"POST",
    dataType:"json",
    data:{id:id},
    success:function(res){
      $("#nunFacturaM2").html(res.vnum);
      $("#idventa2").val(res.vid);
      
    }
  });
}