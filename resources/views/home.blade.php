<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  

  <link rel="stylesheet" href={{ asset('bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css') }}>
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset('bootstrap/bower_components/font-awesome/css/font-awesome.min.css') }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href={{ asset('bootstrap/bower_components/Ionicons/css/ionicons.min.css') }}>
  <!-- jvectormap -->
  <link rel="stylesheet" href={{ asset('bootstrap/bower_components/jvectormap/jquery-jvectormap.css') }}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{ asset('bootstrap/dist/css/AdminLTE.min.css') }}>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href={{ asset('bootstrap/dist/css/skins/_all-skins.min.css') }}>

  <link rel="stylesheet" href={{ asset('bootstrap/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]--

  <!-- Google Font -->
  <link rel="stylesheet"
        href={{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') }}>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
     
      
      <span class="logo-mini">Med</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Medicamentos</span>


    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="uploads/avatars/{{ Auth::user()->avatar }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>

            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <p>
                  <img src="uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                  {{ Auth::user()->name }}
                  <small>{{ Auth::user()->email }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a>
                
                </div>
                <div class="pull-right">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      
                    <i class="fa fa-btn fa-sign-out"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src= "uploads/avatars/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Funcionalidad</li>
        

       
      <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Salas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">

            @foreach ($salas as $sala)
    
               <li ><a href="{{  url('sala/'. $sala->id) }}"><i class="fa fa-circle-o"></i>{{ $sala->nombre }}</a></li>

   
              @endforeach

          </ul>
        </li>


 @if (Auth::check())
                @if ($perfil == 'admin' )   

          <li class="treeview">
           <a href="#">
            <i class="fa fa-plus-square"></i> <span>Ingresos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
               <li><a href="{{ route('product.index') }}"> <i class="fa fa-circle-o"></i> Alta Productos </a></li>
                <li><a href="{{ route('product.index') }}"> <i class="fa fa-circle-o"></i> Alta Stocks </a></li>
            </ul>
           
        </li>


        <li class="treeview">
           <a href="#">
            <i class="fa fa-plus-square"></i> <span>Movimientos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
               <li><a href="{{ route('movement.index') }}"> <i class="fa fa-circle-o"></i> Generar Movimientos </a></li>
            </ul>
        </li>
 
      @endif
            @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sala Central 
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sala Central</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
          <div class="row">
              <div class="col-lg-12 col-xs-12">
                 <div class="alert alert-info alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <p style="font-size:15px">
                <i class="icon fa fa-user"></i> Bienvenido a la aplicación de inventario de Inmunología del Municipio de Bahía Blanca.
                           </p>        
               </div>
              </div>

               <div class="col-md-12 col-sm-12 col-xs-12">
                @yield('index-content')
                @yield('script')
              </div>  
           </div>

      
             
          
    </section>      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Municipalidad de Bahia Blanca</a>.</strong> Todos los derechos Reservadors.
  </footer>

</div>

</body>

<link rel="stylesheet" href={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}>

<!-- jQuery 3 -->
<script src={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}></script>
<!-- Bootstrap 3.3.7 -->
<script src={{ asset('bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js') }}></script>
<!-- FastClick -->
<script src={{ asset('bootstrap/bower_components/fastclick/lib/fastclick.js') }}></script>
<!-- AdminLTE App -->
<script src={{ asset('bootstrap/dist/js/adminlte.min.js') }}></script>
<!-- Sparkline -->
<script src={{ asset('bootstrap/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}></script>
<!-- jvectormap  -->
<script src={{ asset('bootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}></script>
<script src={{ asset('bootstrap/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}></script>
<!-- SlimScroll -->
<script src={{ asset('bootstrap/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}></script>
<!-- ChartJS -->
<script src={{ asset('bootstrap/bower_components/chart.js/Chart.js') }}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{ asset('bootstrap/dist/js/pages/dashboard2.js') }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset('bootstrap/dist/js/demo.js') }}></script>

<script src={{ asset('bootstrap/bower_components/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('bootstrap/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>






</html>