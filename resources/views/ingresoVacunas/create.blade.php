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
      <h4><i class="glyphicon glyphicon-edit"></i> Generar Ingreso de Vacuna</h4>
</div>
</div>


<div class="panel-body col-md-12 ">

      

  <div class="form-group row">
       <form id="formRemito" name="formRemito" method="POST" action="{{ route('ingresoVacuna.store') }}" >
        
          {{ csrf_field() }}

             <div  class=" col-md-12 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h1 class="box-title">Ingreso a Stock</h1>
                    </div>
                    <div class="box-body">
                      
                       <div class="row">
                        <div class="col-xs-4">
                               <div class="form-group ">

                                   <label for="comentario" >Orden de Compra</label>                         
                                    <input type="text" class="form-control " id="orden" name="orden" />
                                      
                               </div>
                         </div>


                          <div class="col-xs-4">
                            <div class="form-group ">  
                                      
                               <label for="unidad">Programa</label>
                                          
                                <select class="form-control col-sm-6" id="programa" name="programa">
                                           
                                       @foreach($programas as $programaUnidad)

                                          <option value="{{$programaUnidad->id}}">{{$programaUnidad->nombre}}</option>
                                       @endforeach
                                </select>
                           

                               </div>
                         </div>


                         <div class="col-xs-4">
                         <div class="form-group ">  
                                  
                           <label for="unidad">Unidad Sanitaria</label>
                                      
                            <select class="form-control col-sm-6" id="unidad" name="unidad">
                                       
                                   @foreach($salasArray as $sala)

                                      <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                                   @endforeach
                            </select>
                       

                           </div>
                            </div>

                            <div class="col-xs-4">
                            <div class="form-group ">  
                                      
                               <label for="unidad">Programa</label>
                                          
                                <select class="form-control col-sm-6" id="programa" name="programa">
                                           
                                       @foreach($programas as $programaUnidad)

                                          <option value="{{$programaUnidad->id}}">{{$programaUnidad->nombre}}</option>
                                       @endforeach
                                </select>
                           

                               </div>
                         </div>

                   
                         </div>
                    </div>
                  </div>
                    <!-- /.box-body -->
            </div>

                
            <div class="panel panel-body col-sm-6 col-sm-offset-7">
             
               <input id="refrescarFormulario" class="btn btn-primary" type="button" value="Limpiar Campos"/>
               <input id="abrirTabla" class="btn btn-primary" type="button" value="Abrir Detalle"/>
                <input id="cerrarTabla" class="btn btn-primary" type="button" value="Cerrar Detalle"/>
          
            </div> 


            <div  class=" col-md-12 ">

              <div id="baseInputDetalle"  class="box-body" style="display: none">
                     
                   <div class="box-header with-border">
                     <h1 class="box-title">Ingreso Detalle</h1>
                   </div>

                     <div class="box-body">
                       <div class="row">
                        
                          <div class="col-xs-3">
                            
                             <div class="form-group ">
                            
                                <label>Vencimiento</label>

                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control focus.inputmask datepicker" name="vencimiento" id="vencimiento" type="text" >
                                  </div>
                              
                              </div> 
                                
                          </div>


                          <div class="col-xs-3">
                            
                            <div class="form-group ">  
                                      
                               <label for="codigoProducto">Codigo Producto</label>
                                          
                                <select class="form-control col-sm-6" id="codigoProducto" name="codigoProducto">
                                           
                                       @foreach($productos as $productsUnidad)

                                          <option value="{{$productsUnidad->nombre}}">{{$productsUnidad->nombre}}</option>
                                       @endforeach
                                </select>
                           

                               </div>
                         </div>


                          <div class="col-xs-3">
                               <div class="form-group ">

                                   <label for="cantidad" >Cantidad</label>                         
                                    <input type="number" class="form-control " id="cantidad" name="cantidad" />
                                      
                               </div>
                         </div>

                          <div class="col-xs-3">
                               <div class="form-group ">

                                   <label for="cantidad" >lote</label>                         
                                    <input type="text" class="form-control " id="lote" name="lote" />
                                      
                               </div>
                         </div>

                          

                         

                   </div>
                         </div>
                    </div>
                 
                    <!-- /.box-body -->
            </div>

             
             <div class="row">
             <div class="col-xs-12">
                               <div class="form-group ">

                                   <input id="agregarTabla" class="btn btn-primary" type="button" value="Agregar Tabla" style="display: none"/>
                                      
                               </div>
                         </div>

                </div> 
             
                
            


            <div class="panel panel-body">
              <div id="resultados" class="col-md-12" style="display: none" >
              
                 <div class="modal-body">
                    
                      
                      <table id="ingresoDetalle" class="table display table-bordred table-striped table-hover" >
                                  <thead>
                                       <tr>
                                        
                                       <th class="center">Codigo Producto</th>
                                        <th class="center">Cantidad</th>
                                        <th class="center">Lote</th>
                                        <th class="center">Vencimiento</th>
                                                    
                                       </tr>
                                   </thead> 
                                    
                                  
                               


                                  
                            </table>

                            <div class="panel panel-body col-sm-6 col-sm-offset-5">

                              <button type="button"  id="crear" class="btn btn-primary">Confirmar</button>
             
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
<link rel="stylesheet" href={{ asset('bootstrap/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}>

<!-- jQuery 3 -->


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src={{ asset('/bootstrap/bower_components/jquery/dist/jquery.min.js') }}></script>



<script src={{ asset('/bootstrap/bower_components/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('/bootstrap/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.5/sweetalert2.all.min.js"></script>

<script src={{ asset('/bootstrap/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}></script>





<script type="text/javascript">


 var count = 1;
  $('#vencimiento').datepicker();


        $(document).ready(function() {

          
        
        
            

   $('#crear').click( function() {


       
var table =  $('#ingresoDetalle').DataTable();
    
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


   
  var table =  $('#ingresoDetalle').dataTable( {
       
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

var table =  $('#ingresoDetalle').DataTable();

$("#agregarTabla").on( 'click', function () {


 count++;

var valorProducto = $("#codigoProducto").val();            
var inputPrincipio = '<input type="text" size="30" name="'+ valorProducto +count+'"';



var inputMedio = ' readonly="" value="'+ valorProducto +'" />';

var inputProduct = inputPrincipio.concat(inputMedio);

alert(inputProduct);


var row = table.row.add(['' + inputProduct +' ',$("#cantidad").val(),$("#lote").val(),$("#vencimiento").val()]).draw();
 




  });

 
 
  
      $("#abrirTabla").click(function(){

                           
                            $("#resultados").show();
                            $("#baseInputDetalle").show();
                            $("#agregarTabla").show();
                            


                });



            $("#cerrarTabla").click(function(){

                           
                            $("#resultados").hide();
                            $("#baseInputDetalle").hide();
                            $("#agregarTabla").hide();
                  

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




