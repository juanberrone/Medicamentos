@extends('home')
@section('index-content')


<div class="row">
 


<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Almacen - CAP {{$sala->nombre}}
  </h1>

</section>



  <section class="content">



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

     <div id="imagenStock"  class="panel panel-default" style="min-width: 310px; height: 400px; margin: 0 auto">
       

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
     

       if ( aData[6] <= aData[8] )
      {
        $('td', nRow).css('background-color', '#f2dede' );
      }
      else 
      {
        $('td', nRow).css('background-color', '#dff0d8');
      }
     
    }
  } );


     Highcharts.chart('imagenStock', {
    chart: {
        zoomType: 'xy'
    },
    title: {
        text: 'Almacen {{$sala->nombre}} '
    },
    subtitle: {
        text: '{{$sala->direccion}}'
    },
    xAxis: [{
        categories: ['SBN01', 'QUINT01', 'ANVA01', 'SEX01', 'SEX01', 'BCG001',
            'HPV01', 'TRBA01', 'HEPBPE01', 'HEPBAD01', 'HEPA01', 'PREV13'],
        crosshair: true
    }],
    yAxis: [{ // Primary yAxis
        
        title: {
            text: 'Cantidad',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        }
    }, { // Secondary yAxis
       
        labels: {
          
        },
        opposite: true
    }],
    tooltip: {
        shared: true
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 120,
        verticalAlign: 'top',
        y: 100,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
    },
    series: [{
        name: 'Cantidad',
        type: 'column',
        yAxis: 1,
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
        tooltip: {
           
        }

    }, {
        name: 'Alerta Minima',
        type: 'spline',
        data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
        tooltip: {
           
        }
    }]
});
    
} );
        </script>

  
</section>

@endsection



