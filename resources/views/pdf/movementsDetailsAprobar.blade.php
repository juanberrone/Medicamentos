
	
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      

      	<div ><img src="{{ asset('/bootstrap/dist/img/bahiaMuni.png') }}"></img> </div>
    

        <title>Remito Aprobado - Municipalidad de Bahia Blanca</title>

    </head>
    <body>
        <div class="container">

 				<div class="box-body">
                      
                         
 				  <label> Movimiento Nro : {{$movimiento->remito}} </label>        
                    <br /> 
                  <label> Autor del Remito : {{$movimiento->autor}} </label>        
                  <br />  
                  <label> tipo : {{$movimiento->tipo}} </label>        
                  <br /> 
                  <label> Obsevaciones : {{$movimiento->observaciones}} </label>        
                  <br /> 
                  
                                
                    <div class="row">
               				 <div class="col-xs-12">
                	 <table class="table table-hover table-striped">
				        <thead>
				            <tr>
				                <th>Movimiento</th>
				                <th>Producto</th>
				                <th>Cantidad</th>
				                
				            </tr>                            
				        </thead>
				        <tbody>
				           @if($movimientoDetalle->count())  
              
                          @foreach($movimientoDetalle as $mov) 
				            <tr>
				                <td>{{$movimiento->remito}}</td>
				                <td>{{$mov->nombre}}</td>
				                <td>{{$mov->cantidad}}</td>
				               
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

          
        </div>
    </body>
</html>

<p></p>
