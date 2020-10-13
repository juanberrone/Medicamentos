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


          <div class=" panel-body col-sm-10 col-sm-offset-8">

                        <button type="button"  id="modificarStock" class="btn btn-primary">Modificar Stock</button>
                        <input type="hidden" class="form-control input-sm" id="stock" name="stock"/>
                         
          </div>


      <div id="detailsModal" class="modal fade" role="dialog">
      
            <div class="modal-dialog">

            <div class="modal-content">

                <form  id="detail_form" method="post">

                  <div class="modal-header">

                    <button type="button" class="close" aria-label="Close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Actualizar Stock</h4>
                  </div>

                  <div class="modal-body">

                    {{csrf_field()}}

                     <div class="form-group ">

                          <label for="codigo" >Código Producto</label>                         
                          <input type="text" class="form-control " id="codigo" name="codigo" readonly="" />
                                      
                      </div>

                      <div class="form-group ">

                          <label for="cantidadNacion" >Cantidad Nacion</label>                         
                          <input type="text" class="form-control " id="cantidadNacion" name="cantidadNacion" readonly=""  />
                                      
                      </div>

                      <div class="form-group ">

                          <label for="cantidadNacionNueva" >Cantidad Actual Nacion</label>                         
                          <input type="text" class="form-control " id="cantidadNacion" name="cantidadNacion" required />
                                      
                      </div>

                        <div class="form-group ">

                          <label for="cantidadMunicipio" >Cantidad Municipio</label>                         
                          <input type="text" class="form-control " id="cantidadMunicipio" name="cantidadMunicipio" readonly=""  />
                                      
                      </div>

                      <div class="form-group ">

                          <label for="cantidadMunicipioNueva" >Cantidad Actual Municipio</label>                         
                          <input type="text" class="form-control " id="cantidadMunicipioNueva" name="cantidadMunicipioNueva" required />
                          <input type="hidden" class="form-control input-sm" id="sala" name="sala"/>
                                      
                      </div>

                  </div>


                  <div class="modal-footer">
                      <input type="hidden" name="button_actionInDetail" id="button_actionInDetail" value="insert" />

                      <input type="submit" id="actionDetails" value="Grabar" class="btn btn-primary" />
                      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                  </div>

                </form>
 

            </div>

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
               <th class="center">Dosis unidad</th>
               <th class="center">Cantidad Nacion</th>
               <th class="center">Cantidad Municipio</th>
               <th class="center">Sala</th>
               <th class="center">Actualizado</th>
           
               </tr>
             </thead>
             <tbody>
              @if($stocks->count())  
              
                @foreach($stocks as $producto)  
              <tr>
                <td class="center">{{$producto->nombre}}</td>
                <td class="center">{{$producto->codigo}}</td>
                <td class="center">{{$producto->unidad}}</td>                
                <td class="center">{{$producto->dosisUnidad}}</td>
                 <td class="center">{{$producto->cantidadNacion}}</td>
                 <td class="center">{{$producto->cantidadMunicipio}}</td>
                 <th class="center">{{$sala->id}}</th>
                 <td class="center">{{$producto->update}}</td>
                
              
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
<script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>





        
        <style>
    table.dataTable tbody tr.selected {
        color: white;
        background-color: #aaaaaa;  /* Not working */
    }
</style>

        <script type="text/javascript">
            

$(document).ready(function() {
     
     $("#modificarStock").attr("disabled", true);

     var table = $('#stockTable').dataTable(

      
             );

     var stockSelect ;



      $('#stockTable tbody').on( 'click', 'tr', function () {


        $("#modificarStock").attr("disabled", false);

        var codigo = table.fnGetData(this)[1];
        var cantidadNacion = table.fnGetData(this)[4];
        var cantidadMuni = table.fnGetData(this)[5];
        var sala = table.fnGetData(this)[6];
        
       

        $("#codigo").val(codigo);
        $("#cantidadNacion").val(cantidadNacion);
        $("#cantidadMunicipio").val(cantidadMuni);
        $("#sala").val(sala);

         

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');

        }
        

      } );



         $("#modificarStock").click(function(){
                 
           $('#detailsModal').modal('show');
               

                });

    

    
    
    // now do what you need to do wht the row data
 
} );
 
  //  $('#button').click( function () {
    //    table.row('.selected').remove().draw( false );
   // } );

  



        </script>

  
</section>

@endsection



