@extends('layouts.app')
@extends('layouts.nav')

@section('nav')
@endsection
 
@section('content')
        <div class="container">
 
            <div class="panel panel-primary">
 
             <div class="panel-heading">ImportData Into Excel</div>
 
              <div class="panel-body">    
 
                   {!! Form::open(array('route' => 'alumnos.import','method'=>'POST','files'=>'true')) !!}
                    <div class="row">
                       <div class="col-xs-10 col-sm-10 col-md-10">
                        @if (Session::has('success'))
                           <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif (Session::has('danger'))
                            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @elseif (Session::has('warnning'))
                            <div class="alert alert-primary">{{ Session::get('warnning') }}</div>
                        @endif
                            <div class="form-group">
                                {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}
                                <div class="col-md-9">
                                {!! Form::file('alumnos', array('class' => 'form-control')) !!}
                                {!! $errors->first('alumnos', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                        {!! Form::submit('Subir',['class'=>'btn btn-success']) !!}
                        </div>
                    </div>
                   {!! Form::close() !!}
                   <div class="row">
                   	<div class="col-lg-8">
 					<a class="btn btn-outline-success" href="{{url('/admin7alumnoslist/create')}}" role="button">Registro(manual)</a>
 					</div>
 					<div class="col-lg-4">
 						{!! Form::open(['url'=> 'admin7alumnoslist/', 'method'=>'GET','autocomplete'=>'off','role'=>'search']) !!}
						<div class="form-group">
							<div class="input-group">
						           {!! Form::text('key',$key,['class'=>'form-control', 'placeholder'=>''])!!}
						           <span class="input-group-btn">
									<button type="submit" class="btn btn-primary"> Buscar </button>		
									</span>
							</div>
						</div>
						{{Form::close()}}
 					</div>
 				   </div>
                   <div class="row">
                   	<div class="col-lg-12">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                        
                        <table width="100%" border="1" cellpadding="10">
                            <thead>
								<tr>
									<td>Matricula</td>
									<td>Nombre</td>
									<td>Apellidos</td>
									<td>UID</td>
									<td>CURP</td>
									<td>Sexo</td>
									<td>Plantel</td>
									<td>Cve.</td>
									<td>Promedio</td>
									<td>Semestre</td>
									<td>Email</td>
									<td>Fecha Nac.</td>
									<td>Edad</td>
									<td>E. Civil</td>				
									<td>Telefono</td>
									<td>Celular</td>
									<td width="19%"> Domicilio    </td>
									<td>Sit. Academica</td>
									<td>Accion</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($miembro as $miembro)
								<tr>
									
									<td>{{$miembro->Matricula}}</td>
									<td>{{$miembro->Nombre}}</td>
									<td>{{$miembro->Primer_Apellido.' '.$miembro->Segundo_Apellido}}</td>
									<td>{{$miembro->UID}}</td>
									<td>{{$miembro->CURP}}</td>
									<td>{{$miembro->Sexo}}</td>
									<td>{{$miembro->U_Admin}}</td>
									<td>{{$miembro->U_Admin_Cve}}</td>
									<td>{{$miembro->Porm_Gral}}</td>
									<td>{{$miembro->Semestre}}</td>
									<td>{{$miembro->Email_Institucional}}</td>
									<td>{{$miembro->Fecha_Nacimiento}}</td>
									<td>{{$miembro->Edad}}</td>
									<td>{{$miembro->Estado_Civil}}</td>
									<td>{{$miembro->Telefono}}</td>
									<td>{{$miembro->Tel_Celular}}</td>
									<td>{{$miembro->Calle.', '.$miembro->Colonia.', '.$miembro->Municipio.', '.$miembro->Estado}}</td>
									<td>{{$miembro->Sit_Academica}}</td>
									<td>
									<a type="button" class="btn btn-outline-info" href="{{url('/admin7alumnoslist/'.$miembro->id.'/edit')}}">Editar</a>
									<div class="form-group text-right">
										{!!Form::open(['route'=>['admin7alumnoslist.destroy', $miembro->id], 'method' => 'DELETE'])!!}
										{!!Form::submit('Eliminar',['class'=>"btn btn-outline-danger"])!!}
										{!!Form::close()!!}
									</div>
									</td>
								</tr>
								@endforeach
							</tbody>
                        </table>
                       </div>
                   </div>
               </div>
 
             </div>
 
            </div>
 
            </div>
@endsection