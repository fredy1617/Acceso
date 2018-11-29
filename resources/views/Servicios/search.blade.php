<div class="row">
   <div class="col-lg-12">        	
    {!! Form::open(['url'=> 'records7alumnoslist/'.$id, 'method'=>'GET','autocomplete'=>'off','role'=>'search']) !!}
		<div class="form-group">
			<div class="input-group">
			{!! Form::text('inicio',$inicio,['class'=>'form-control', 'placeholder'=>'AA-MM-DD'])!!}
			<label for="key" > A </label>
			{!! Form::text('fin',$fin,['class'=>'form-control', 'placeholder'=>'AA-MM-DD'])!!}
			
			{!! Form::select('Status',[''=>'...','ENTRADA'=>'ENTRADA','SALIDA'=>'SALIDA'] ,null,['class'=>'form-control']) !!}
				<span class="input-group-btn">
				<button type="submit" class="btn btn-primary"> Buscar </button>
				</span>
			</div>
		</div>
	{{Form::close()}}
	</div>
</div>