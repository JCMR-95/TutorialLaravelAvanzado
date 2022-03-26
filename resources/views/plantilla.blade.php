<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://tutoriallaravelavanzado.test/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://tutoriallaravelavanzado.test/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://tutoriallaravelavanzado.test/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://tutoriallaravelavanzado.test/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://tutoriallaravelavanzado.test/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="http://tutoriallaravelavanzado.test/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="http://tutoriallaravelavanzado.test/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="http://tutoriallaravelavanzado.test/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://tutoriallaravelavanzado.test/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini login-page">
    
  @if(Auth::user())

    <div class="wrapper">

      @include('modulos.cabecera')

      @if(auth()->user()->rol == "Vendedor")

        @include('modulos.menuV')
      
      @else

        @include('modulos.menu')
      
      @endif

      @yield('contenido')

    </div>

  @else

    @yield('content')

  @endif
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://tutoriallaravelavanzado.test/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://tutoriallaravelavanzado.test/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="http://tutoriallaravelavanzado.test/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="http://tutoriallaravelavanzado.test/bower_components/raphael/raphael.min.js"></script>
<script src="http://tutoriallaravelavanzado.test/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="http://tutoriallaravelavanzado.test/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="http://tutoriallaravelavanzado.test/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="http://tutoriallaravelavanzado.test/bower_components/moment/min/moment.min.js"></script>
<script src="http://tutoriallaravelavanzado.test/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="http://tutoriallaravelavanzado.test/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="http://tutoriallaravelavanzado.test/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://tutoriallaravelavanzado.test/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://tutoriallaravelavanzado.test/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://tutoriallaravelavanzado.test/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://tutoriallaravelavanzado.test/dist/js/demo.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

    $('.sidebar-menu').tree()

    $('.table').on('click','.EliminarUsuario', function(){

      var Uid = $(this).attr('Uid');
      var Usuario = $(this).attr('Usuario');

      Swal.fire({

        title: 'Estás seguro de eliminar al Usuario: '+Usuario+'?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#3058d6'

      }).then((result) => {

        if(result.isConfirmed){

          window.location = "Eliminar-Usuario/"+Uid;
        }
      })

    })

</script>

  @if(session('UsuarioCreado') == 'OK')

    <script type="text/javascript">

      Swal.fire(

        'El Usuario ha sido creado',
        '',
        'success'
      )

    </script>

  @endif

  <?php

  $exp = explode('/', $_SERVER["REQUEST_URI"]);

  ?>

  @if($exp[1] == 'Editar-Usuario')

    <script type="text/javascript">

        $(document).ready(function(){

          $('#EditarUsuario').modal('toggle');

        })

    </script>

  @endif

</body>
</html>
