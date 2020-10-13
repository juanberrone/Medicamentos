@extends('home')
@section('index-content')


<div class="row">
 


<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Almacen - CAP 

  </h1>

</section>



  <section class="content">

    <div class="row">
           <div id="app" class="col-lg-12 col-xs-12">
                @include('flash-message')


              @yield('content')
           </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-body">
       



          <div class="table-container">

          <form id="aprobarRemito" method="post" action="{{ route('ingresoVacuna.aprobarMovimientoRemitos') }}">

             {{csrf_field()}}

             <input type="hidden" class="form-control " id="MovimientoDestino" name="MovimientoDestino" />
             <input type="hidden" class="form-control " id="SalaOrigen" name="SalaOrigen" />
             <input type="hidden" class="form-control " id="SalaDestino" name="SalaDestino" value ="{{$sala->id}}" />

         </form> 

            <table id="tablaRemitos" class="table display table-bordred table-striped table-hover" >
             <thead>

              <tr>
               
               <th class="center">Remito</th>
               <th class="center">Autor</th>
               <th class="center">Estado</th>
               <th class="center">Observación</th>
               <th class="center">Acción</th>
               
             
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
                 <td >
                   
                  <div>
                      

                        <a href="{{ route('products.pdf', ['id'=> $movement->id]) }}" title='ver Remito' class="btn btn-sm btn-primary">PDF  </a>
                         <button title='Confirmar Remito' class='btn btn-primary btn-sm' href='' data-toggle='tooltip' data-placement='top' onclick="confirmarRemito('{{$movement->id}}')" >
                              <i style='color:#fff' class='glyphicon glyphicon-ok'></i>
                          
                              
                          </button>  
                           <a data-toggle='tooltip' data-placement='top' title='Rechazar Remito' class='btn btn-primary btn-sm' href=''>
                              <i style='color:#fff' class='glyphicon glyphicon-remove'></i>
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
    
    </div>



    <div class="col-md-12 col-md-offset-10">
           <a href="{{ route('product.index') }}">Volver</a>
        </div>




  <link rel="stylesheet" href={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}>

<!-- jQuery 3 -->
<script src={{ asset('bootstrap/bower_components/jquery/dist/jquery.min.js') }}></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.5/sweetalert2.all.min.js"></script>


   <script src={{ asset('/bootstrap/bower_components/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script src={{ asset('/bootstrap/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>


      <script type="text/javascript">
        $(document).ready(function() {


            var table =  $('#tablaRemitos').dataTable();
  


              });

       function confirmarRemito(id){


          $('#MovimientoDestino').val(id);
          //origenDel Movimiento
          $('#SalaOrigen').val(1);
            
           

             swal({
                 title: 'Desea Confirmar el Remito',
                  text: 'Se guardará en su Stock los productos enviados',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, Generar'
            }).then((result) => { 
  
                  if (result.value) {
   
                               
                             $("#aprobarRemito").submit();
                     
                                

                          }
                });
          
         
          }
      
  

    </script>
  
</section>


@endsection



