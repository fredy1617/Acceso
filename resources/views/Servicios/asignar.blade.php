@extends('layouts.principal')
 
@section('content')
<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Tag: {{$UID}}</h1>
      </div>
    <!-- /.col-lg-12 -->
  </div>
  <div class="row">
    <div class="col-lg-12">
    <!--formulario-->
      <div class="panel panel-default">
        <div class="panel-heading">
          Informacion del Alumno
        </div>
        <div class="panel-body">
          <div class="row">
                   	<div class="col-lg-12 aling-center">
                   		{!! Form::open(['url'=> '/asignar-credecial/'.$UID, 'method'=>'GET','autocomplete'=>'off','role'=>'search']) !!}
                   		<div class="col-lg-6">
								Sin Tag {{ Form::checkbox('Tag', null) }}
                   		</div>
                       	<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group">
						           {!! Form::text('key',$key,['class'=>'form-control', 'placeholder'=>''])!!}
						           <span class="input-group-btn">
									<button type="submit" class="btn btn-primary"> Buscar </button>		
									</span>
							</div>
						</div>
						</div>
						{{Form::close()}}
						</div>
					</div>
                        <table width="100%" border="1" cellpadding="10">
                            <thead>
								<tr>
									<td>Matricula</td>
									<td>Nombre</td>
									<td>Apellidos</td>
									<td>Promedio</td>
									<td>Semestre</td>
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
									<td>{{$miembro->Porm_Gral}}</td>
									<td>{{$miembro->Semestre}}</td>
									<td>{{$miembro->Sit_Academica}}</td>
									<td>
									<a  class="btn btn-info"  href="{{url('/confirmar/'.$UID.'/'.$miembro->id)}}" >Agregar</a>
									</td>
								</tr>
								@endforeach
							</tbody>
                        </table>
                
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection