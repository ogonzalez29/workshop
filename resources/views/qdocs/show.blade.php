@extends('main')
@section('title', '| Certificado de Control Calidad '.'No. '.$doc)
@section('content')
<div class="row">
	<h2 class="text-center text-uppercase">Certificado de Control Calidad # {{$doc}} @if($qdoc->status == 'cancelled')<span class="text-danger">- ANULADO -</span>@endif</h2>
	<hr>
</div>
<div class="row well">
	<div class="header-info col-xs-12 col-sm-3 col-md-4">
		<div class="col-xs-6 col-sm-6 col-md-4">
			<p><strong>Fecha:</strong></p>
			<p><strong>Orden:</strong></p>
			<p><strong>Asesor:</strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ date('d/m/Y', strtotime($qdoc->created_at)) }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->ordernumber }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->e_firstname }} {{ $qdoc->e_lastname }}</p>
		</div>
	</div>
	<div class="header-info col-xs-12 col-sm-5 col-md-4">
		<div class="col-xs-6 col-sm-5 col-md-4">
			<p><strong>Cliente: </strong></p>
			<p><strong>Teléfono: </strong></p>
			<p><strong>Email: </strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->c_firstname }} {{ $qdoc->c_lastname }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{$qdoc->phone}}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->email }}</p>
		</div>
	</div>
	<div class="header-info col-xs-12 col-sm-4 col-md-4">
		<div class="col-xs-6 col-sm-6 col-md-5">
			<p><strong>Vehículo: </strong></p>
			<p><strong>Modelo: </strong></p>
			<p><strong>Placa: </strong></p>
			<p><strong>Kilometraje: </strong></p>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-7">
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $make->name }} {{ $type->name }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->model }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ $qdoc->license }}</p>
			<p class="text-center" style="border-bottom: 1px solid #eee;">{{ number_format($qdoc->mileage,0,",",".") }}</p>
		</div>
	</div>
</div>
<div class="row well">
	<h4 class="text-center text-uppercase"><strong>Puntos de control</strong></h4>
</div>
<div class="row well">
	<div class="col-xs-12 col-sm-6 col-md-6">
		@foreach($names as $mat=>$name)
    		@if($mat < 4)
	    		<table class="table table-condensed">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats[1]); $i++)
			    				<th class="col-md-2 text-center">{{$cats[1][$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats[1]); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[1][$j], $cats[1][$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($qdoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@endif
	    @endforeach
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		@foreach($names as $mat=>$name)
    		@if($mat > 3 && $mat < 6)
	    		<table class="table table-condensed">
	    			<thead>
	    				<tr>
	    					<th class="col-md-6">{{$name}}</th>
			    			@for($i=1; $i <= count($cats[1]); $i++)
			    				<th class="col-md-2 text-center">{{$cats[1][$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-6">{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats[1]); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[1][$j], $cats[1][$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($qdoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@elseif($mat == 6)
	    		<table class="table table-condensed">
	    			<thead>
	    				<tr>
	    					<th class="col-md-4">{{$name}}</th>
			    			@for($i=1; $i <= count($cats[2]); $i++)
			    				<th class="col-md-2 text-center">{{$cats[2][$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-4">{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats[2]); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[2][$j], $cats[2][$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($qdoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@elseif($mat == 7)
	    		<table class="table table-condensed">
	    			<thead>
	    				<tr>
	    					<th class="col-md-4">{{$name}}</th>
			    			@for($i=1; $i <= count($cats[3]); $i++)
			    				<th class="col-md-2 text-center">{{$cats[3][$i]}}</th>
			    			@endfor
			    		</tr>
	    			</thead>
	    			<tbody>
	    				@for($i=1; $i <= count($items[$mat]) ; $i++)
	    					<tr>
	    						<td class="col-md-4">{{$items[$mat][$i]}}</td>
	    						@for($j=1; $j <= count($cats[3]); $j++) 
	    							<td class="col-md-2 text-center">
	    							{{Form::label($cats[3][$j], $cats[3][$j], array('style' => 'display:none'))}}
	    							@php 
	    							$elem = $elements[$mat][$i];
	    							$elem = ($qdoc->$elem == $j ? ' checked' : '');
	    							@endphp
	    							{{Form::radio($elements[$mat][$i], $j, $elem)}}
	    							</td>
	    						@endfor
	    					</tr>
	    				@endfor
	    			</tbody>
	    		</table>
	    	@endif
	    @endforeach
	</div>
</div>
<div class="row well">
	<h4 class="text-center text-uppercase"><strong>Importante:</strong></h4>
	<h4 class="text-center"><strong>Los controles realizados son únicamente sobre los elementos visibles del vehículo y no implican desmontaje alguno, por lo tanto el taller no asume responsabilidad en caso de la no detección de una falla no aparente.</strong></h4>
</div>
<div class="row well">
	<h4 class="text-center"><strong>Llamamos la atención sobre los siguientes trabajos pendientes de realizar:</strong></h4>
</div>
<div class="row well">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="col-xs-4 col-sm-4 col-md-4">
			<h4 class="text-center"><strong>Semáforo</strong></h4>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-center"><strong>Comentarios</strong></h4>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="show-fire col-xs-4 col-sm-4 col-md-4">
			<svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
				<g><circle cx="50%" cy="50%" r="48%" stroke="red" stroke-width="3" fill="red" /></g>
				<text x="50%" y="50%" text-anchor="middle" stroke="#1A1A1A" stroke-width="0.5px" dy=".3em">Inmediato</text>
			</svg>
		</div>
		<div class="comments col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-justify">{{$qdoc->comment1}}</h4>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="show-fire col-xs-4 col-sm-4 col-md-4">
			<svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
				<g><circle cx="50%" cy="50%" r="48%" stroke="yellow" stroke-width="3" fill="yellow" /></g>
				<text x="50%" y="50%" text-anchor="middle" stroke="#1A1A1A" stroke-width="0.5px" dy=".3em">De ser posible</text>
			</svg>
		</div>
		<div class="comments col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-justify">{{$qdoc->comment2}}</h4>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="show-fire col-xs-4 col-sm-4 col-md-4">
			<svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
				<g><circle cx="50%" cy="50%" r="48%" stroke="green" stroke-width="3" fill="green" /></g>
				<text x="50%" y="50%" text-anchor="middle" stroke="#1A1A1A" stroke-width="0.5px" dy=".3em">A prever</text>
			</svg>
		</div>
		<div class="comments col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-justify">{{$qdoc->comment3}}</h4>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="comments-obs comments-title col-xs-4 col-sm-4 col-md-4">
			<h4 class="text-center"><strong>Observaciones:</strong></h4>
		</div>
		<div class="comments-obs comments-desc col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-justify">{{$qdoc->comment4}}</h4>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6 well">
		<h4 class="text-center"><strong>Conformidad factura/trabajos:</strong></h4>
		<div class="showSig" id="sig-employee">
			<div class="sig sigWrapper">
				<canvas class="pad show-pad">
				{{ Form::hidden('e_signature', null, array('class' => 'signature'))}}
			</div>
			<div class="sigFooter">
				<div class="description">Firma del taller</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 well">
		<div class="col-xs-8 col-sm-8 col-md-8">
			<h4 class="text-center"><strong>Próximo mantenimiento a los:</strong></h4>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4">
			<h4 class="text-center"><strong>{{number_format($qdoc->n_mileage,0,",",".")}} kms</strong></h4>
		</div>
		<div class="showSig" id="sig-client">
			<div class="sig sigWrapper">
				<canvas class="pad show-pad">
				{{ Form::hidden('c_signature', null, array('class' => 'signature'))}}
			</div>
			<div class="sigFooter">
				<div class="description">Firma del cliente</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 show-opt text-center">
			<div class="col-xs-6 col-sm-6 col-md-6">
				{!! Html::linkRoute('qdocs.edit', 'Editar', array($qdoc->id), array('class' => 'btn btn-warning btn-block')) !!}
			</div>
			@if (Auth::user()->hasRole('Admin'))
				<div class="col-xs-6 col-sm-6 col-md-6">
					{!! Form::open(array('route' => ['qdocs.destroy', $qdoc->id], 'method' => 'DELETE')) !!}
						{{Form::submit('Eliminar', array('class' => 'btn btn-danger btn-block'))}}
					{!! Form::close() !!}	
				</div>
			@endif
		</div>
	</div>
</div>
{{-- Scroll to top button --}}
<a class="scrollToTop" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up fa-4x" aria-hidden="true"></i></a>
@endsection
@section('scripts')
{{-- Signature pad javascript calling and options configuration --}}
<script type="text/javascript">
	$(function(){
		var options = {
			drawOnly : false,
			displayOnly : true,
			penColour: '#000',
			bgColour: '#f5f5f5',
			lineTop: 160,
			lineMargin: 10,
			validateFields: false
		};

		//Escaping JSON signature data from database
		var showSig_data = {!! $qdoc->e_signature !!};
		$('#sig-employee').signaturePad(options).regenerate(showSig_data);
		//Get second signature only if it exists
		var showSig_data1 = '{!! ($qdoc->c_signature !== null ? $qdoc->c_signature : '') !!}';
		if(showSig_data1 !== ''){
			$('#sig-client').signaturePad(options).regenerate(showSig_data1);
		}
	});
</script>
@endsection