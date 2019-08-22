@extends('home')
@section('index-content')


<div class="row">
 


<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Almacen - CAP 

    <a class="btn btn-primary btn-social pull-right" href="{{ route('movement.create') }}" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Generar Movimientos
    </a>
  </h1>

</section>



  <section class="content">



      <div class="panel panel-default">
        <div class="panel-body">
       



          <div class="table-container">
            <table id="tablaRemitos" class="table display table-bordred table-striped table-hover" >
             <thead>

              <tr>
               
               <th class="center">Remito</th>
               <th class="center">Autor</th>
               <th class="center">Estado</th>
               <th class="center">Observación</th>
               <th class="center">Tipo</th>
               
             
               </tr>
             </thead>
             <tbody>
              @if($movements->count())  
              
                @foreach($movements as $movement)  
              <tr>
                
                <td class="center">{{$movement->remito}}</td>
                <td class="center">{{$movement->autor}}</td>
                <td class="center">{{$movement->estado}}</td>
                <td class="center">{{$movement->observaciones}}</td>
                 <td class="center">{{$movement->tipo}}</td>
             
              
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
    
    </div>

    <div class="col-md-12 col-md-offset-10">
           <a href="{{ route('product.index') }}">Volver</a>
        </div>




  <link rel="stylesheet" href={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}>

<!-- jQuery 3 -->
<script src={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}></script>


   <script src={{ asset('/bootstrap/bower_components/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('/bootstrap/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>


      <script type="text/javascript">
        $(document).ready(function() {




 

           var table =  $('#tablaRemitos').dataTable();
  


              });
      
  

    </script>
  
</section>


@endsection



