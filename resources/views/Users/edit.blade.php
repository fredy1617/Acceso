@extends('layouts.app')
@extends('layouts.nav')

@section('nav')
@endsection

@section("content")
<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Editar usuario</h1>
      </div>
      <div class="col-lg-12">
            <br>
            <br>
      </div>
    <!-- /.col-lg-12 -->
  </div>
  <div class="row">
    <div class="col-lg-12">
    <!--formulario-->
	{!! Form::open(['url'=> '/admin6alumnoslist/'.$miembro->id, 'method'=>'PATCH']) !!}
      <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
				<div class="form-group col-lg-12">
					<div class="form-group{{ $errors->has('Nombre') ? ' has-error' : '' }}">
						<label for="Nombre">Nombre(s)</label>
			            {{Form::text('Nombre', $miembro->Nombre, ['class'=>'form-control', 'placeholder'=>'Ej. Juan Manuel'])}}
			                @if ($errors->has('Nombre'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Nombre') }}</strong>
			                    </small>
			                @endif
		        	</div>
		        </div>
		        <div class="form-group col-lg-12">
		        	<div class="form-group{{ $errors->has('Primer_Apellido') ? ' has-error' : '' }}">
		        		<label for="Primer_Apellido">Apellido Paterno</label>
						{{Form::text('Primer_Apellido', $miembro->Primer_Apellido, ['class'=>'form-control', 'placeholder'=>'Ej. Pérez'])}}
							@if ($errors->has('Primer_Apellido'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Primer_Apellido') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
			    <div class="form-group col-lg-12">
		        	<div class="form-group{{ $errors->has('Segundo_Apellido') ? ' has-error' : '' }}">
		        		<label for="Segundo_Apellido">Apellido Materno</label>
						{{Form::text('Segundo_Apellido', $miembro->Segundo_Apellido, ['class'=>'form-control', 'placeholder'=>'Ej. López'])}}
							@if ($errors->has('Segundo_Apellido'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Segundo_Apellido') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>		        
			    <div class="form-group">
		        	<div class="form-group{{ $errors->has('CURP') ? ' has-error' : '' }}">
		        		<label for="CURP">CURP</label>
						{{Form::text('CURP', $miembro->CURP, ['class'=>'form-control', 'placeholder'=>'Ej. JAPL111798HZRSDL98'])}}
							@if ($errors->has('CURP'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('CURP') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
			</div>
<!-- ---------------------/.col-lg-6 (nested) -->
            <div class="col-lg-6">
			    <div class="form-group">
		        	<div class="form-group{{ $errors->has('Colonia') ? ' has-error' : '' }}">
		        		<label for="Colonia">Colonia</label>
						{{Form::text('Colonia', $miembro->Colonia, ['class'=>'form-control', 'placeholder'=>'Ej. Fresnillo'])}}
							@if ($errors->has('Colonia'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Colonia') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
			    <div class="form-group">
		        	<div class="form-group{{ $errors->has('Municipio') ? ' has-error' : '' }}">
		        		<label for="Municipio">Municipio</label>
						{{Form::text('Municipio', $miembro->Municipio, ['class'=>'form-control', 'placeholder'=>'Ej. Fresnillo'])}}
							@if ($errors->has('Municipio'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Municipio') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
			    <!--'Estado','Sit_Academica'-->
			    <div class="form-group">
		        	<div class="form-group{{ $errors->has('Estado') ? ' has-error' : '' }}">
		        		<label for="Estado">Estado</label>
						{{Form::text('Estado', $miembro->Estado, ['class'=>'form-control', 'placeholder'=>'Ej. Zacatecas'])}}
							@if ($errors->has('Estado'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Estado') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
			    <div class="form-group col-lg-4">
		        	<div class="form-group{{ $errors->has('Sit_Academica') ? ' has-error' : '' }}">
		        		<label for="Sit_Academica">Situación Académica</label>
						{{Form::select('Sit_Academica', ['' => 'Elije', 'REGULAR' => 'REGULAR', 'NO REGULAR' => 'NO REGULAR'], $miembro->Sit_Academica, ['class'=>'form-control'])}}
							@if ($errors->has('Sit_Academica'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Sit_Academica') }}</strong>
			                    </small>
			                @endif
			        </div>
			     </div>
			</div>
            <!-- /.col-lg-6 (nested) -->
          </div>
          <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    <div class="form-group text-right">
		<a href="{{url('/admin7alumnoslist')}}">Regresar al listado</a>
		<input type="submit" value="Guardar" class="btn btn-success">
	</div>
    {!! Form::close() !!}
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection