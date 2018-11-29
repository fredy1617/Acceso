@extends('layouts.app')
@extends('layouts.nav')

@section('nav')
@endsection

@section("content")
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
                   	<div class="col-lg-6 aling-center">
                       <div class="col-xs-6 col-sm-6 col-md-6">
                       	
									
									<td>{{$miembro->Matricula}}</td>
									<td>{{$miembro->Nombre}}</td>
									<td>{{$miembro->Primer_Apellido.' '.$miembro->Segundo_Apellido}}</td>
									<td>{{$miembro->Porm_Gral}}</td>
									<td>{{$miembro->Semestre}}</td>
									<td>{{$miembro->Sit_Academica}}</td>
									
                       </div>
                   </div>
               </div>
          <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    <div class="form-group text-right">
		<a  class="btn btn-danger" onclick="return confirm('¿Estas seguro de Cancelar?')" href="{{url('asignar-credecial/'.$UID)}}">Cancelar</a>
		<a  class="btn btn-success" onclick="return confirm('¿Estas seguro de agregar el Tag')" href="{{url('guardar/'.$UID.'/'.$miembro->id)}}">Guardar</a>
	</div>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection