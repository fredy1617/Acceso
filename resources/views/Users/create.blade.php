@extends('layouts.principal')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar usuario') }}</div>

                <div class="card-body">
                    <!--formulario-->
                    {!! Form::open(['url'=> '/admin-userslist/', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
						@csrf

                        <div class="form-group row">
                            <label for="Nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="Nombre" type="text" class="form-control{{ $errors->has('Nombre') ? ' is-invalid' : '' }}" name="Nombre" value="{{ old('Nombre') }}" required autofocus>

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
                                <input id="Apellidos" type="text" class="form-control{{ $errors->has('Apellidos') ? ' is-invalid' : '' }}" name="Apellidos" value="{{ old('Apellidos') }}" required autofocus>

                                @if ($errors->has('Apellidos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                {{Form::select('Rol', ['' => 'Elije', 'ADMINISTRADOR' => 'ADMINISTRADOR', 'SERVICIOS' => 'SERVICIOS'], null, ['class'=>'form-control', 'required'])}}

                                @if ($errors->has('Rol'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Plantel" class="col-md-4 col-form-label text-md-right">{{ __('Plantel') }}</label>

                            <div class="col-md-6">
                                {{Form::select('Plantel', ['' => 'Elije', 'Fresnillo' => 'Fresnillo', 'Mazapil' => 'Mazapil','Zacatecas' => 'Zacatecas'], null, ['class'=>'form-control', 'required'])}}
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
 
  
    