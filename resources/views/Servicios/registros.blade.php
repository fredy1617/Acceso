@extends('layouts.principal')
 
@section('content')
                   <div class="row">
                   	<div class="col-lg-12">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                       	@if (Session::has('success'))
                           <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif (Session::has('warnning'))
                            <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                        @elseif (Session::has('NoAdmin'))
                            <div class="alert alert-danger">{{ Session::get('NoAdmin') }}</div>
                        @endif

                       	{!! Form::open(['url'=> 'list/registros-alumnos/', 'method'=>'GET','autocomplete'=>'off','role'=>'search']) !!}
						<div class="form-group">
							<div class="input-group">
						           {!! Form::text('key',$key,['class'=>'form-control', 'placeholder'=>''])!!}
						           <span class="input-group-btn">
									<button type="submit" class="btn btn-primary"> Buscar </button>		
									</span>
							</div>
						</div>
						{{Form::close()}}
                        
                        <table width="100%" border="1" cellpadding="10">
                            <thead>
								<tr>
									<td>id</td>
									<td>Matricula</td>
									<td>Nombre</td>
									<td>Apellidos</td>
									<td>UID</td>
									<td>Plantel</td>
									<td>Promedio</td>
									<td>Semestre</td>
									<td>Sit. Academica</td>
									<td>Accion</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($miembro as $miembro)
								<tr>
									<td>{{$miembro->id}}</td>
									<td>{{$miembro->Matricula}}</td>
									<td>{{$miembro->Nombre}}</td>
									<td>{{$miembro->Primer_Apellido.' '.$miembro->Segundo_Apellido}}</td>
									<td>{{$miembro->UID}}</td>
									<td>{{$miembro->U_Admin}}</td>
									<td>{{$miembro->Porm_Gral}}</td>
									<td>{{$miembro->Semestre}}</td>
									<td>{{$miembro->Sit_Academica}}</td>
									<td>

									<a type="button" class="btn btn-outline-info" href="{{url('/records7alumnoslist/'.$miembro->id)}}">Registros</a>
								</tr>
								@endforeach
							</tbody>
                        </table>
                       </div>
                   </div>
               </div>

@endsection