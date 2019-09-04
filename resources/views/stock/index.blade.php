@extends('home')
@section('index-content')


<div class="row">
 


<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Almacen - CAP {{$sala->nombre}}
  </h1>

</section>



  <section class="content">

     <div class="row">
    <div id="app" class="col-lg-8 col-xs-8">
        @include('flash-message')


        @yield('content')
    </div>
</div>


      <div class="panel panel-default">
        <div class="panel-body">
       



          <div class="table-container">
            <table id="stockTable" class="table display table-bordred table-striped table-hover" >
             <thead>

              <tr>
               <th class="center">Nombre</th>
               <th class="center">Codigo</th>
               <th class="center">Unidad</th>
               <th class="center">Requiere Descartable</th>
               <th class="center">Dosis</th>
               <th class="center">Descartables</th>
               <th class="center">Cantidad Almacen</th>
               <th class="center">En Traslado</th>
               <th class="center">Min</th>
               </tr>
             </thead>
             <tbody>
              @if($stocks->count())  
              
                @foreach($stocks as $producto)  
              <tr>
                <td class="center">{{$producto->nombre}}</td>
                <td class="center">{{$producto->codigo}}</td>
                <td class="center">{{$producto->unidad}}</td>

                @if($producto->requiereDescartable==0)
                      <td class="center">No requiere</td>
                  @else
                       <td class="center">Requiere</td>
                @endif
                
                <td class="center">{{$producto->dosis}}</td>
                <td class="center">{{$producto->descartables}}</td>
                 <td class="center">{{$producto->cantidad}}</td>
                 <td class="center">{{$producto->cantidadEnTraslado}}</td>
                 <td class="center">{{$producto->cantidadMinima}}</td>
              
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

     <div id="imagenStock"  style="min-width: 310px; height: 400px; margin: 0 auto">
       

     </div>

    <div class="col-md-12 col-md-offset-10">
           <a href="{{ route('product.index') }}">Volver</a>
    </div>

<script src={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
        
        <script type="text/javascript">
            

$(document).ready(function() {
     
   

     $('#stockTable').dataTable( {


        "columnDefs": [
            {
                "targets": [ 3 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 4 ],
                "visible": false,
                "searchable": false
            },
             {
                "targets": [ 5 ],
                "visible": false,
                "searchable": false
            },
             {
                "targets": [ 8 ],
                "visible": false,
                "searchable": false
            }
        ],
    
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
     


      var almacen = parseInt(aData[6]);
      var minimoAceptable = parseInt(aData[8]);
     // alert(menor);
   
       if ( almacen <= minimoAceptable )
      {
         if ( almacen == 0) {
              $('td', nRow).css('background-color', '#f2dede' );
         

            }
        else{

             $('td', nRow).css('background-color', '#ffff9e' );
               
        }

       

       }
      else 
      {
        $('td', nRow).css('background-color', '#dff0d8');
      }
     
    }
  } );

});
        </script>

  
</section>

@endsection



