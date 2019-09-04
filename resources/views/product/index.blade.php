@extends('home')
@section('index-content')


<div class="row">
 


<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Vacunas

    <a class="btn btn-primary btn-social pull-right" href="{{ route('product.create') }}" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
  </h1>

</section>



  <section class="content">



      <div class="panel panel-default">
        <div class="panel-body">
       



          <div class="table-container">
            <table id="mytable" class="table display table-bordred table-striped table-hover" >
             <thead>

              <tr>
               <th class="center">Nombre</th>
               <th class="center">Codigo</th>
               <th class="center">Unidad</th>
               <th class="center">Requiere Descartable</th>
               <th class="center">Dosis</th>
               <th class="center">Descartables</th>
               <th class="center">Acciones</th>
               </tr>
             </thead>
             <tbody>
              @if($productos->count())  
              
                @foreach($productos as $producto)  
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
           <a href="{{ route('product.index') }}">Volver</a>
        </div>
  
</section>




@endsection


