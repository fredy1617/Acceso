@extends('layouts.app')
@extends('layouts.nav')

@section('nav')
@endsection

@section("content")
<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Editar alumno</h1>
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
		        	<div class="form-group{{ $errors->has('Matricula') ? ' has-error' : '' }}">
		        		<label for="Matricula">Matricula</label>
						{{Form::text('Matricula', $miembro->Matricula, ['class'=>'form-control', 'placeholder'=>'Ej. 101270403-9'])}}
							@if ($errors->has('Matricula'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Matricula') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
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
			    <div class="form-group">
		        	<div class="form-group{{ $errors->has('Sexo') ? ' has-error' : '' }}">
		        		<label for="Sexo">Sexo</label>
						{{Form::select('Sexo', ['' => 'Elije', 'HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], $miembro->Sexo, ['class'=>'form-control'])}}
							@if ($errors->has('Sexo'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Sexo') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
			    <div class="form-group">
		        	<div class="form-group{{ $errors->has('U_Admin') ? ' has-error' : '' }}">
		        		<label for="U_Admin">Plantel</label>
						{{Form::select('U_Admin', ['' => 'Elije', 'Fresnillo' => 'Fresnillo', 'Zacatecas' => 'Zacatecas', 'Mazapil' => 'Mazapil'], $miembro->U_Admin, ['class'=>'form-control'])}}
							@if ($errors->has('U_Admin'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('U_Admin') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
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
		        		<label for="Semestre">Semestre</label>{{Form::select('Semestre', ['' => 'Elije', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], $miembro->Semestre, ['class'=>'form-control'])}}
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
            		<div class="form-group{{ $errors->has('Fecha_Nacimiento') ? ' has-error' : '' }}"> 		        		
            			<label for="Fecha_Nacimiento">Fecha Nacimiento</label> 	
            			{{Form::text('Fecha_Nacimiento', $miembro->Fecha_Nacimiento, ['class'=>'form-control', 'placeholder'=>'Ej. 20-10-1998'])}} 
            				@if ($errors->has('Fecha_Nacimiento'))    
            					<small class="text-danger"> 
            						<strong>{{ $errors->first('Fecha_Nacimiento') }}</strong>
            					</small> 			                
            				@endif 			        
            			</div> 			    
            		</div>
            	<div class="form-group">
			        <div class="form-group{{ $errors->has('Edad') ? ' has-error' : '' }}">
			        	<label for="Edad">Edad</label>
						{{Form::text('Edad', $miembro->Edad, ['class'=>'form-control', 'placeholder'=>'Ej. 16'])}}
							@if ($errors->has('Edad'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Edad') }}</strong>
			                    </small>
			                @endif
			        </div>
				</div>
				<div class="form-group col-lg-6">
		        	<div class="form-group{{ $errors->has('Estado_Civil') ? ' has-error' : '' }}">
		        		<label for="Estado_Civil">Estado Civil</label>
						{{Form::select('Estado_Civil', ['' => 'Elije', 'SOLTERO(A)' => 'SOLTERO(A)', 'CASADO(A)' => 'CASADO(A)', 'COMPROMETIDO(A)' => 'COMPROMETIDO(A)'], $miembro->Estado_Civil, ['class'=>'form-control'])}}
							@if ($errors->has('Estado_Civil'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Estado_Civil') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
			    <div class="form-group">
		        	<div class="form-group{{ $errors->has('Telefono') ? ' has-error' : '' }}">
		        		<label for="Telefono">Telefono</label>
						{{Form::text('Telefono', $miembro->Telefono, ['class'=>'form-control', 'placeholder'=>'Ej. 4921110044'])}}
							@if ($errors->has('Telefono'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Telefono') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
		        <div class="form-group">
		        	<div class="form-group{{ $errors->has('Tel_Celular') ? ' has-error' : '' }}">
		        		<label for="Tel_Celular">Celular</label>
						{{Form::text('Tel_Celular', $miembro->Tel_Celular, ['class'=>'form-control', 'placeholder'=>'Ej. 0456196488'])}}
							@if ($errors->has('Tel_Celular'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Tel_Celular') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
			    <div class="form-group">
		        	<div class="form-group{{ $errors->has('Calle') ? ' has-error' : '' }}">
		        		<label for="Calle">Calle</label>
						{{Form::text('Calle', $miembro->Calle, ['class'=>'form-control', 'placeholder'=>'Ej. 5 DE MAYO 13'])}}
							@if ($errors->has('Calle'))
			                    <small class="text-danger">
				                    <strong>{{ $errors->first('Calle') }}</strong>
			                    </small>
			                @endif
			        </div>
			    </div>
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