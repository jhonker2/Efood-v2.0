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
                                USUARIOS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" id="new_usuario">Nuevo Usuario</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body" id="tusuario">
                             @include('tablas.tablausuario')
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
    </section>




    <!-- Modal Dialogs ====================================================================================================================== -->
            <!-- Default Size -->
            <div class="modal fade" id="ModalUsuario" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    {!!Form::open(['files'=>true, 'id'=>'form-usuario'])!!}
                    <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Nuevo Usuario</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row clearfix">
                                    <div class="col-md-6">
                                        <b>Nombre</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="nombre" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Nombre de usuario:</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="nomUsuario" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Contraseña:</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">vpn_key</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="password" name="clave" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Tipo de Usuario:</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">record_voice_over</i>
                                            </span>
                                            <div class="form-line">
                                                <select  name="tipo" class="form-control show-tick">
                                                    <option value="">-- Please select --</option>
                                                    <option value="Administrador">ADMINISTRADOR</option>
                                                    <option value="Mesero">MESERO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="registrar_usuario()" class="btn btn-link waves-effect">GUARDAR USUARIO</button>
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
    {!!Html::script('js/usuario.js')!!}
    
    
@endsection
