<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Parrillada el primo</title>
    <!-- ESTILOS CSS -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    {!!Html::style('MaterialDesigne/plugins/bootstrap/css/bootstrap.css')!!}

    <!-- Waves Effect Css -->
    {!!Html::style('MaterialDesigne/plugins/node-waves/waves.css')!!}

    <!-- Animation Css -->
    {!!Html::style('MaterialDesigne/plugins/animate-css/animate.css')!!}

    <!-- Custom Css -->
    {!!Html::style('MaterialDesigne/css/style.css')!!}
    <!-- Effod Css -->
    {!!Html::style('css/efood.css')!!}
    
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">

        <h1 class="titulo">Parrillada el Primo </h1>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"></p>
        <div id="lod" style="display:none"> 
            <img src="{{asset('dist/img/load_usuario.gif')}}" alt="" style="position: absolute; margin-left: 119px; z-index: 1;">
            <h4 style="position: absolute;margin-left: 110px; z-index: 1; margin-top: 106px;">Cargando...
                </h4>
        </div>
 {!!Form::open(['id'=>'login_from'])!!}
     <input  type="hidden" name="_token" value="{{ csrf_token() }}" id="token"> 
         <div class="card">
            <div class="body">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" id="usuario" placeholder="Usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" id="clave" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Recordarme</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" id="login" type="button">INGRESAR</button>
                        </div>
                    </div>
            </div>
        </div>
    {!!Form::close()!!}
  
<!-- Jquery Core Js -->
    {!!Html::script('MaterialDesigne/plugins/jquery/jquery.min.js')!!}

    <!-- Bootstrap Core Js -->
    {!!Html::script('MaterialDesigne/plugins/bootstrap/js/bootstrap.js')!!}

    <!-- Waves Effect Plugin Js -->
    {!!Html::script('MaterialDesigne/plugins/node-waves/waves.js')!!}

    <!-- Validation Plugin Js -->
    {!!Html::script('MaterialDesigne/plugins/jquery-validation/jquery.validate.js')!!}

    <!-- Custom Js -->
    {!!Html::script('MaterialDesigne/js/admin.js')!!}
    {!!Html::script('MaterialDesigne/js/pages/examples/sign-in.js')!!}

    {!!Html::script('js/efood.js')!!}


    <script>
        $("#login").click(function(){
            login();
        });
    </script>
    
 </body>
</html>
