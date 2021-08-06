<?php 

require_once 'classes/autoload.php';
require_once 'functions.php';

$registro = new Registro();

if(!empty($_GET['id'])){
	$registro->extrasSelect = "WHERE id = {$_GET['id']}";
	$registro->select();
	$r                = $registro->fetchAll('OBJ')[0];
	$id               = $r->id;
	$nome             = $r->nome;
	$numero_registro  = formatarCPFCNPJCaracter($r->numero_registro);
	$data_nascimento  = formatarDataBR($r->data_nascimento);
	$endereco         = $r->endereco;
	$descricao_titulo = $r->descricao_titulo;
	$valor            = formatarMoedaReal($r->valor);
	$data_vencimento  = formatarDataBR($r->data_vencimento);
}else {
	$id               =  '';
	$nome             =  '';
	$numero_registro  =  '';
	$data_nascimento  =  '';
	$endereco         =  '';
	$descricao_titulo =  '';
	$valor            =  '';
	$data_vencimento  =  '';
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema - TESTE</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">SiS CFJDev</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
            <li class="nav-item">
              <a href="./index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>
            </li>

            <li class="nav-header">ADMINISTRAÇÃO</li>

            <li class="nav-item">
              <a href="registros.php" class="nav-link active">
                <i class="fas fa-users nav-icon"></i>
                <p>Registros</p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Alterar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Alterar</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-12">
              <form action="data_atualizar.php?id=<?=$id;?>" method="post">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Formulário</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="form-group col-md-6">
                        <label>Nome</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-keyboard"></i></span>
                          </div>
                          <input type="text" class="form-control" value="<?=$nome;?>" name="nome" data-inputmask-alias="nome"  required>
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>CPF/CNPJ</label>

                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-keyboard"></i></span>
                          </div>
                          <input type="text" class="form-control" value="<?=$numero_registro;?>" name="numero_registro" data-inputmask-alias="numero_registro"  required>
                        </div>

                      </div>

                      <div class="form-group col-md-6">
                        <label>Data de nascimento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-keyboard"></i></span>
                          </div>
                          <input type="text" class="form-control" value="<?=$data_nascimento;?>" name="data_nascimento" data-inputmask-alias="datetime" placeholder="dd/mm/aaaa" data-inputmask-inputformat="dd/mm/yyyy" data-mask  required>
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Endereço</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-keyboard"></i></span>
                          </div>
                          <input type="text" class="form-control" value="<?=$endereco;?>" name="endereco" data-inputmask-alias="endereco"  required>
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Valor</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-keyboard"></i></span>
                          </div>
                          <input type="text" class="form-control" value="<?=$valor;?>" name="valor" data-inputmask-alias="valor"  required>
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Data de vencimento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-keyboard"></i></span>
                          </div>
                          <input type="text" class="form-control" value="<?=$data_vencimento;?>" name="data_vencimento" data-inputmask-alias="datetime"
                            data-inputmask-inputformat="dd/mm/yyyy" data-mask  required>
                        </div>
                      </div>
                      
					  <div class="form-group col-md-12">
                        <label>Descrição do título</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-keyboard"></i></span>
                          </div>
                          <textarea class="form-control" name="descricao_titulo" data-inputmask-alias="descricao_titulo"  required><?=$descricao_titulo;?></textarea>
                        </div>
                      </div>
					  
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-sm btn-success">Editar</button>
                    <a href="registros.php" class="btn btn-sm btn-secondary">Cancelar</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">

    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="dist/js/adminlte.js"></script>
  
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard3.js"></script>

  <!-- Bootstrap4 Duallistbox -->
  <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- date-range-picker -->
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- BS-Stepper -->
  <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

      $("input[name='numero_registro']").inputmask({
        mask: ['999.999.999-99', '99.999.999/9999-99'],
        keepStatic: true
      });

      $("input[name='valor']").inputmask( 'currency',{
                'numericInput': true,
                'alias': 'numeric',
                'groupSeparator': '.',
                'autoGroup': true,
                'digits': 2,
                'radixPoint': ",",
                'digitsOptional': false,
                'allowMinus': false,
                'prefix': 'R$ ',
                'placeholder': '0,00',
                'rightAlign': false,
    });

      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })


  </script>

</body>

</html>