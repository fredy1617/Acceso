@extends('layouts.app')
@extends('layouts.nav')

@section('nav')
@endsection
 
@section('content')
        <div class="container">
 
            <div class="panel panel-primary">
 			@csrf
              <div class="panel-body">    
                    <div class="row">
                       <div class="col-xs-10 col-sm-10 col-md-10">
                        @if (Session::has('success'))
                           <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif (Session::has('danger'))
                            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @elseif (Session::has('warnning'))
                            <div class="alert alert-primary">{{ Session::get('warnning') }}</div>
                        @endif
                        </div>
                    </div>
                   <div class="row">
                   	<div class="col-lg-12">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                        
                        <table width="100%" border="1" cellpadding="10">
                            <thead>
								<tr>
									<td>Nombre</td>
									<td>Apellidos</td>
									<td>Correo</td>
									<td>Rol</td>
									<td>Foto</td>
									<td>Plantel</td>
									<td>Accion</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($usuarios as $usuarios)
								<tr>
									<td>{{$usuarios->Nombre}}</td>
									<td>{{$usuarios->Apellidos}}</td>
									<td>{{$usuarios->email}}</td>
									<td>{{$usuarios->Rol}}</td>
									<td><img src="perfil/{{$usuarios->Foto}}"></td>							
									<td>{{$usuarios->Plantel}}</td>
									<td>
									<a type="button" class="btn btn-outline-info" href="{{url('/admin-userslist/'.$usuarios->id.'/edit')}}">Editar</a>
									<div class="form-group text-right">
										{!!Form::open(['route'=>['admin-userslist.destroy', $usuarios->id], 'method' => 'DELETE'])!!}
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