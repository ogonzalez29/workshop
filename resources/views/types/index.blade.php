@extends('main')
@section('title', '| Líneas de Vehículos Disponibles')
@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 index-header text-center">
		<h1>Líneas de Vehículos Disponibles</h1>
	</div>
	<div class="col-xs-12 col-sm-3 col-md-2 index-button">
		<a href="{{ route('types.create') }}" class="btn btn-lg btn-primary btn-h1-spacing">Crear línea</a>
	</div>
	<div class="col-xs-12 col-sm-9 col-md-10 search-button">
		{!! Form::open(array('method' => 'GET' , 'url' => 'app/admin/types' ,'class' => 'navbar-form navbar-right search-group' , 'role' => 'search')) !!}
	        <div class="form-group search-items">
	         	<input type="text" name="search" class="form-control input-lg" placeholder="Buscar">
	         	<button type="submit" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
	        </div>    	
      	{!! Form::close() !!}
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-12 table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center">No.</th>
				<th class="text-center">Marca</th>
				<th class="text-center">Línea</th>
				<th class="text-center">Fecha de creación</th>
				<th class="text-center">Fecha de última modificación</th>
				<th class="text-center">Opciones</th>
			</thead>
			<tbody>
				@foreach($types as $type)
					<tr>
						<td class="text-center">{{$type->id}}</td>
						<td class="text-center">{{$type->make->name}}</td>
						<td class="text-center">{{$type->name}}</td>
						<td class="text-center">{{date('d/m/Y', strtotime($type->created_at))}}</td>
						<td class="text-center">{{date('d/m/Y', strtotime($type->updated_at))}}</td>
						<td class="text-center">
							<div class="button-group btn-group-xs" role="group">
								<a href="{{route('types.edit', $type->id)}}" class="btn btn-warning">Editar</a> 
								{!! Form::open(array('route' => ['types.destroy', $type->id], 'method' => 'DELETE')) !!}
									{{Form::submit('Eliminar', array('class' => 'btn btn-danger'))}}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $types->appends(Request::only('search'))->links(); !!}
		</div>
	</div>
</div>	
@endsection