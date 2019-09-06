@extends('home')
@section('index-content')


<div class="row">
 


<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Ingrese Orden 

    <a class="btn btn-primary btn-social pull-right" href="{{ route('ingresoVacuna.create') }}" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
  </h1>

</section>



  <section class="content">



      <div class="panel panel-default">
        <div class="panel-body">
       



          <div class="table-container">
            <table id="tablaIngresoVacunas" class="table display table-bordred table-striped table-hover" >
             <thead>

              <tr>
               <th class="center">Codigo</th>
  				<th class="center">Programa</th>
  				<th class="center">Sala</th>
               <th class="center">Orden</th>
               <th class="center">Acciones</th>
               </tr>
             </thead>
             <tbody>
              @if($productos->count())  
              
                @foreach($productos as $producto)  
              <tr>
               
                <td class="center">{{$producto->codigo}}</td>
                <td class="center">{{$producto->nombreprograma}}</td>
                <td class="center">{{$producto->nombresala}}</td>
                <td class="center">{{$producto->orden}}</td>
              
                <td class="center">
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' class='btn btn-primary btn-sm' href=''>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>

                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="" onclick="return confirm('estas seguro de eliminar<?php echo 'aaa'; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
                        </div>
                  </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
      {{ $productos->links() }}
    </div>

    <div class="col-md-12 col-md-offset-10">
           <a href="{{ route('ingresoVacuna.index') }}">Volver</a>
        </div>




         <link rel="stylesheet" href={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}>

<!-- jQuery 3 -->
<script src={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}></script>


   <script src={{ asset('/bootstrap/bower_components/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('/bootstrap/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>


      <script type="text/javascript">
        $(document).ready(function() {


           var table =  $('#tablaIngresoVacunas').dataTable({
       
         
         'language': {

                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible ",
                    "sInfo":           "Mostrando registros  _START_ de _END_  total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros 0 de 0 total de 0 registros",
                    "sInfoFiltered":   "(filtrado total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguinte",
                        "sPrevious": "Anterior"
                    }

                  }
    				});;
  


              });
      
  

    </script>
  
  
</section>




@endsection


