@extends('home')
@section('index-content')


<div class="row">
 





  <section class="content">


<div class="container">

 <div class="row">
    <div id="app" class="col-lg-8 col-xs-8">
        @include('flash-message')


        @yield('content')
    </div>
</div>


<div class="panel panel-info">
    <div class="panel-heading">
      <h4><i class="glyphicon glyphicon-edit"></i> Generar Remito</h4>
    </div>


    <div class="panel-body">

      

<div class="form-group row">
       <form method="POST" action="{{ route('movement.store') }}" >
        
          {{ csrf_field() }}

             <div  class=" col-md-10">
                   <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Remito</h3>
                    </div>
                    <div class="box-body">
                      
                         
                      <div class="form-group ">
          
                        <label for="comentario" >Observaciones</label>
                        <input type="text" class="form-control input-sm" id="observaciones" name="observaciones" placeholder="Complete una descripción"/>
                          
           
              
                      </div>

                         <div class="form-group ">

                             <label for="comentario" >Estado</label>                         
                              <input type="text" class="form-control input-sm" id="estado" name="estado" readonly="" value="Manual"/>
                    
                      </div>


                      <div class="form-group ">
                                  
                           <label for="empresa">Unidad Sanitaria</label>
                                      
                            <select class="form-control col-sm-6" id="unidad" name="unidad">
                                       
                                   @foreach($salasArray as $sala)

                                      <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                                   @endforeach
                            </select>
                      </div>

                    </div>
                    <!-- /.box-body -->
                  </div>

          </div>
            

             <div class="panel panel-body col-sm-6 col-sm-offset-3">
             
               <input id="refrescar" class="btn btn-primary" type="button" value="Limpiar Campos">
               <input id="abrir" class="btn btn-primary" type="button" value="Abrir Detalle">
                <input id="cerrar" class="btn btn-primary" type="button" value="Cerrar Detalle">
            </div> 


            <div class="panel panel-body">
              <div id="resultados" class="col-md-10" style="display: none" >
              
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
                                              <td class="center"><input type="text" id="{{$producto->codigo}}" name="{{$producto->codigo}}" value=""></td>
                                              <td class="center">{{$producto->cantidad}}</td>

          
                                              
                                            
                                               
                                            
                                      </tr>
                                   @endforeach 
                                   @else
                                       <tr>
                                        <td colspan="8">No hay registro !!</td>
                                      </tr>
                                   @endif


                                  
                            </table>

                            <div class="panel panel-body col-sm-6 col-sm-offset-5">

                              <button type="submit"  id="crear" class="btn btn-primary">Generar Remito</button>
             
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
<script src={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}></script>


   <script src={{ asset('/bootstrap/bower_components/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('/bootstrap/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>


      <script type="text/javascript">
        $(document).ready(function() {




   $('#crear').click( function() {

        
         var sData = table.$('input').serialize();
         
            } );


           var table =  $('#remitos').dataTable();
  


              });


    $('#cerrar').click( function() {

       $("#resultados").hide();
    
  


              });

    $('#abrir').click( function() {

       $("#resultados").show();
     
  


              });
       
  
   

    </script>


  
</section>




@endsection




