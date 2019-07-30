
@extends('home')
@section('index-content')


<div class="row">


<section class="content-header">
  <h1>
    <i class="fa fa-plus-square-o icon-title"></i> Ingresar Vacunas
  </h1>

</section>




	<section class="content">
		<div class="col-md-12 col-md-offset-0">
		


				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('product.store') }}" >
							{{ csrf_field() }}
							<div class="row">
							

                <div class="col-md-12">
          <!-- general form elements -->
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <h2 class="box-title">Formulario de Vacuna</h2>
                     </div>
            <!-- /.box-header -->
            <!-- form start -->
            
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese un Nombre">
                    </div>
                    <div class="form-group">
                      <label for="codigo">Codigo</label>
                      <input type="text" class="form-control" id="codigo" name="codigo" placeholder="codigo">
                     </div>

                     <div class="form-group">
                      <label for="unidad">Unidad</label>
                      <input type="text" class="form-control" id="unidad" name="unidad" placeholder="UNIDAD">
                     </div>
                 
                    <div class="checkbox">
                    <label>
                    <input type="checkbox" id="requiereDescartable" name="requiereDescartable"> Requiere Descartable
                   </label>
                    </div>
                    <div class="form-group">
                      <label for="dosis">Dosis</label>
                      <input type="number" class="form-control" id="dosis" name="dosis"  placeholder="dosis">
                    </div>
                    <div class="form-group">
                      <label for="dosis">Descartables</label>
                      <input type="number" class="form-control" id="descartables" name="descartables"  placeholder="descartables">
                    </div>

                        
                        <button type="submit" class="btn btn-primary">Ingresar</button>



                 </div>
                </div>

               </div>
               
              </div>


               
              


            </form>

        <div class="col-md-12 col-md-offset-10">
           <a href="{{ route('product.index') }}">Volver</a>
        </div>

		</div>
	</section>

	@endsection