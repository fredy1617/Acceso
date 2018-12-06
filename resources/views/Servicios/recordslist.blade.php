@extends('layouts.principal')
 
@section('content')
<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Registros de {{$miembro->Nombre}}</h1>
      </div>
      <div class="col-lg-12">
            <br>
            <br>
      </div>
    <!-- /.col-lg-12 -->
  </div>
  <div class="row">
    <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-5">
            	Aqui va la informacion
            	del alumno
            	<br>
            	{{$miembro->Matricula}}
            	<br>
            	{{$miembro->Sit_Academica}}
			</div>
<!-- ---------------------/.col-lg-5 (nested) -->
            <div class="col-lg-7">
            <div class="row"> 
            	<div class="col-lg-12">
           		@include('Servicios.search')
				</div>
				<div class="col-lg-11"> 
			    <table class="table table-striped">
				<thead>
					<tr>
						<td width="30%">Fecha</td>
						<td width="30%">Hora</td>
						<td width="40%">Status</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($records as $record)
					<tr>
						<td>{{$record->Fecha}}</td>
						<td>{{$record->Hora}}</td>
						<td>{{$record->Status}}</td>
					</tr>
					@endforeach
				</tbody>
				</table>
				</div> 
			</div>
			</div>
            <!-- /.col-lg-7 (nested) -->
          </div>
          <!-- /.row (nested) -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection
