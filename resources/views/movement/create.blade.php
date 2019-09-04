@extends('home')
@section('index-content')


<div class="row">
 





  <section class="content">


<div class="container">

 <div class="row">
    <div id="app" class="col-lg-12 col-xs-12">
        @include('flash-message')


        @yield('content')
    </div>
</div>


<div class="panel panel-info">
    <div class="panel-heading">
      <h4><i class="glyphicon glyphicon-edit"></i> Generar Remito</h4>
</div>
</div>


<div class="panel-body col-md-12 ">

      

  <div class="form-group row">
       <form id="formRemito" name="formRemito" method="POST" action="{{ route('movement.store') }}" >
        
          {{ csrf_field() }}

             <div  class=" col-md-12 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Remito</h3>
                    </div>
                    <div class="box-body">
                      
                         <div class="form-group ">

                             <label for="comentario" >Estado</label>                         
                              <input type="text" class="form-control input-sm" id="estado" name="estado" readonly="" value="Con Aprobación"/>
                                
                         </div>
               

                        <div class="form-group ">
                            <label for="observaciones" >Observaciones</label>
                                 <input type="text" class="form-control input-sm" id="observaciones" name="observaciones" />
                        </div>
                  
                        <div class="form-group ">  
                                  
                           <label for="unidad">Unidad Sanitaria</label>
                                      
                            <select class="form-control col-sm-6" id="unidad" name="unidad">
                                       
                                   @foreach($salasArray as $sala)

                                      <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                                   @endforeach
                            </select>
                       

                           </div>
                   
                         </div>

                  </div>
                    <!-- /.box-body -->
            </div>

                
            <div class="panel panel-body col-sm-6 col-sm-offset-3">
             
               <input id="refrescarFormulario" class="btn btn-primary" type="button" value="Limpiar Campos"/>
               <input id="abrirTabla" class="btn btn-primary" type="button" value="Abrir Detalle"/>
                <input id="cerrarTabla" class="btn btn-primary" type="button" value="Cerrar Detalle"/>
            </div> 


            <div class="panel panel-body">
              <div id="resultados" class="col-md-12" style="display: none" >
              
                 <div class="modal-body">
                    
                      
                           <table id="remitos" class="table display table-bordred table-striped table-hover" >
                                  <thead>
                                       <tr>
                                         <th>Producto</th>
                                         <th>Cantidad</th>
                                         <th>Stock Actual</th>
                                        
                                         
                                       </tr>
                                   </thead>

                                     @if($stocks->count())  
                      
                                           @foreach($stocks as $producto)  
                                        <tr>
                                              <td class="center">{{$producto->nombre}}</td>
                                              <td class="center"><input type="number" name="{{$producto->codigo}}" value=""></td>
                                              <td class="panel-info" id="{{$producto->codigo}}" >{{$producto->cantidad}}</td>

                                      </tr>
                                   @endforeach 
                                   @else
                                       <tr>
                                        <td colspan="8">No hay registro !!</td>
                                      </tr>
                                   @endif


                                  
                            </table>

                            <div class="panel panel-body col-sm-6 col-sm-offset-5">

                              <button type="button"  id="crear" class="btn btn-primary">Generar Remito</button>
             
                           </div> 

                              

                  </div>
                </div><!-- Carga los datos ajax -->    
            </div>


       </form> 


 
    </div>
    
  </div>

 

         <div class="col-md-12 col-md-offset-10">
           <a href="{{ route('movement.index') }}">Volver</a>
        </div>
</div>



<link rel="stylesheet" href={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}>


<!-- jQuery 3 -->
<script src={{ asset('/bootstrap/bower_components/jquery/dist/jquery.min.js') }}></script>



<script src={{ asset('/bootstrap/bower_components/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('/bootstrap/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.5/sweetalert2.all.min.js"></script>



<script type="text/javascript">


        $(document).ready(function() {

          
            

   $('#crear').click( function() {


       
         var sData = table.$('input').serialize();

         
      

         swal({
  title: 'Desea Grabar un nuevo Remito',
  text: "Se guardará un nuevo remito",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Generar'
}).then((result) => {
  if (result.value) {
    alert("entro");

    $("#formRemito").submit();
    
  }
});
        
            });


   
  var table =  $('#remitos').dataTable( {
       
          'lengthMenu': [[-1], [ "All"]],
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
    });


  });
 
  
      $("#abrirTabla").click(function(){

                            $( "#observaciones" ).prop( "readonly", true );
                            $( "#unidad" ).prop( "readonly", true );
                            $("#resultados").show();

                });



            $("#cerrarTabla").click(function(){

                            $( "#observaciones" ).prop( "readonly", false );
                            $( "#unidad" ).prop( "readonly", false );
                            $("#resultados").hide();
                  

                });
     


      $( "input[type='number']" ).change(function() {
              

              var controlStock =  $(this).attr("name");

               var cantRemitoStock =  $(this).val();

               var stockAlmacen = document.getElementById(controlStock);

               var input = document.getElementById(controlStock);

              
               if (parseInt(stockAlmacen.innerHTML) < parseInt(cantRemitoStock)){
                 
                     
                       $(this).val(stockAlmacen.innerHTML);
                       $(this).css("background-color", "#ff0000");

               }

              else
              {

                        $(this).css("background-color", "#ffffff");

              }
              

        } );



          
      
    </script>


  
</section>




@endsection




