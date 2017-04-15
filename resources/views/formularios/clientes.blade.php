@extends("layouts.Principal")

@section('css')
     <!-- Bootstrap Select Css -->
    {!!Html::style('MaterialDesigne/plugins/bootstrap-select/css/bootstrap-select.css')!!}


@endsection
@section('content')
    <section class="content">
        <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                GESTION DE CLIENTES
                            </h2>
                               <div class="input-group-btn"> <span class="input-group-addon">Buscar</span>
                                    <input id="cedula" name="cedula" type="text" class="form-control Tamano" placeholder="Ingresa la canción de este Disco que deseas Buscar...">
                                    <span class="input-group-btn">
                                  <button id="Btn_buscarClientes" name="buscarClientes" class="btn btn-success" type="button">Go!</button>
                                </span>
                               </div>
                                  <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>

                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" id="new_cliente">Nuevo Cliente</a></li>
                                    </ul>
                                </li>
                            </ul>
                            
                        </div>
                        
                        <div class="body" id="table_clientes">
                         
                        @include('tablas.tablaCliente')

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
    </section>




    <!-- Modal Dialogs ====================================================================================================================== -->
            <!-- Default Size -->
            <div class="modal fade" id="ModalClientes" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    {!!Form::open(['files'=>true, 'id'=>'form-clientes'])!!}
                    <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    <input  type="hidden" name="codigo" id="codigo"> 
                    <input  type="hidden" name="cedulaok" id="cedulaok"> 
                    <input  type="hidden" name="nombres" id="nombres"> 
                    <input  type="hidden" name="correo" id="correo"> 
                    <input  type="hidden" name="apellidos" id="apellidos"> 
                    <input  type="hidden" name="direccion" id="direccion"> 
                    <input  type="hidden" name="telefono" id="telefono">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" align="center" id="defaultModalLabel">INGRESE NUEVO CLIENTE</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row clearfix">
                                    <div class="col-md-6">
                                        <b>Cedula:</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="txt_cedula" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Nombres:</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="txt_nombre" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                        <b>Apellidos:</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="txt_apellido" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Correo:</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="txt_correo" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Direccion:</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="txt_direccion" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Telefono:</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="txt_telefono" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="registrar_clientes()" class="btn btn-link waves-effect">GUARDAR CLIENTE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCELAR</button>
                        </div>
                    </div>
                    {!!Form::close()!!} 
                </div>
            </div>
@endsection

@section('js')


<!-- Jquery DataTable Plugin Js -->
    {!!Html::script('MaterialDesigne/plugins/jquery-datatable/jquery.dataTables.js')!!}
    {!!Html::script('MaterialDesigne/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')!!}
    {!!Html::script('MaterialDesigne/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')!!}
    {!!Html::script('MaterialDesigne/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')!!}
    {!!Html::script('MaterialDesigne/plugins/jquery-datatable/extensions/export/jszip.min.js')!!}
    {!!Html::script('MaterialDesigne/plugins/jquery-datatable/extensions/export/pdfmake.min.js')!!}
    {!!Html::script('MaterialDesigne/plugins/jquery-datatable/extensions/export/vfs_fonts.js')!!}
    {!!Html::script('MaterialDesigne/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')!!}
    {!!Html::script('MaterialDesigne/plugins/jquery-datatable/extensions/export/buttons.print.min.js')!!}

     <!-- Select Plugin Js -->
    {!!Html::script('MaterialDesigne/plugins/bootstrap-select/js/bootstrap-select.js')!!}
    {!!Html::script('js/cliente.js')!!}
    
    
@endsection
