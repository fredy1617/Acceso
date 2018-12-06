@extends('layouts.app')
@extends('layouts.nav')

@section('nav')
@endsection
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar usuario') }}</div>

                <div class="card-body">
                    <!--formulario-->
					{!! Form::open(['url'=> '/admin-userslist/'.$usuario->id, 'method'=>'PATCH']) !!}
                        @csrf

                        <div class="form-group row">
                            <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="Nombre" type="text" class="form-control{{ $errors->has('Nombre') ? ' is-invalid' : '' }}" name="Nombre" value="{{ $usuario->Nombre }}" required autofocus>

                                @if ($errors->has('Nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="Apellidos" type="text" class="form-control{{ $errors->has('Apellidos') ? ' is-invalid' : '' }}" name="Apellidos" value="{{$usuario->Apellidos }}" required autofocus>

                                @if ($errors->has('Apellidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $usuario->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <a type="button" class="btn btn-outline-info" href="{{url('/userslist/pass-edit/'.$usuario->id)}}">Editar</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                            	{{Form::select('Rol', ['' => 'Elije', 'ADMINISTRADOR' => 'ADMINISTRADOR', 'SERVICIOS' => 'SERVICIOS'], $usuario->Rol, ['class'=>'form-control'])}}

                                @if ($errors->has('Rol'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                {!! Form::file('Foto',array('class' => 'form-control')) !!}
                            
                                @if ($errors->has('Foto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Plantel" class="col-md-4 col-form-label text-md-right">{{ __('Plantel') }}</label>

                            <div class="col-md-6">
                            	{{Form::select('Plantel', ['' => 'Elije', 'Fresnillo' => 'Fresnillo', 'Mazapil' => 'Mazapil','Zacatecas' => 'Zacatecas'], $usuario->Plantel, ['class'=>'form-control'])}}
                                @if ($errors->has('Plantel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Plantel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 