@extends('layouts.app')
@extends('layouts.nav')

@section('nav')
@endsection

@section("content")
<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Agregar usuario</h1>
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
	{!! Form::open(['url'=> '/admin7alumnoslist/'.$miembro->id, 'method'=>'POST']) !!}
      <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
			    <div class="form-group">
		        	<div class="form-group{{ $errors->has('U_Admin_Cve') ? ' has-error' : '' }}">
		        		<label for="U_Admin_Cve">Cve. Plantel</label>
						{{Form::text('U_Admin_Cve', $miembro->U_Admin_Cve, ['class'=>'form-control', 'placeholder'=>'Ej. 3321370'])}}
							@if ($errors->has('U_Admin_Cve'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('U_Admin_Cve') }}</strong>
			                    </small>
			                @endif
			        </div>
			     </div>
			     <div class="form-group">
			        <div class="form-group{{ $errors->has('Porm_Gral') ? ' has-error' : '' }}">
			        	<label for="Porm_Gral">Promedio General</label>
						{{Form::text('Porm_Gral', $miembro->Porm_Gral, ['class'=>'form-control', 'placeholder'=>'Ej. 8.9'])}}
							@if ($errors->has('Porm_Gral'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Porm_Gral') }}</strong>
			                    </small>
			                @endif
			        </div>
				</div>
				<div class="form-group">
		        	<div class="form-group{{ $errors->has('Semestre') ? ' has-error' : '' }}">
		        		<label for="Semestre">Semestre</label>{{Form::select('Semestre', ['' => 'Elije', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], null, ['class'=>'form-control'])}}
							@if ($errors->has('Semestre'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Semestre') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
			    <div class="form-group">
		        	<div class="form-group{{ $errors->has('Email_Institucional') ? ' has-error' : '' }}">
		        		<label for="Email_Institucional">Email Institucional</label>
						{{Form::text('Email_Institucional', $miembro->Email_Institucional, ['class'=>'form-control', 'placeholder'=>'Ej. juan27@zac.conalep.edu.mx'])}}
							@if ($errors->has('Email_Institucional'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Email_Institucional') }}</strong>
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
						{{Form::select('Sit_Academica', ['' => 'Elije', 'REGULAR' => 'REGULAR', 'NO REGULAR' => 'NO REGULAR'], null, ['class'=>'form-control'])}}
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