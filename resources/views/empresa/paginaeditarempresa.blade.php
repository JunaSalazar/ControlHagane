
@extends('layout')

@section('content')

<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Editar datos de la empresa "{{ $task->nombre }}"</h3>
          </div>
          <div class="modal-body">
				


          		{!! Form::model($task, [
				    'method' => 'PATCH',
				    'route' => ['empresa.update', $task->id]
				]) !!}

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
				    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('razon_social', 'Razón Social:', ['class' => 'control-label']) !!}
					{!! Form::text('razon_social', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('rfc', 'RFC:', ['class' => 'control-label']) !!}
					{!! Form::text('rfc', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('calle', 'Calle:', ['class' => 'control-label']) !!}
					{!! Form::text('calle', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('numero', 'Número:', ['class' => 'control-label']) !!}
					{!! Form::text('numero', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('colonia', 'Colonia:', ['class' => 'control-label']) !!}
				{!! Form::text('colonia', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('codigo_postal', 'Código Postal:', ['class' => 'control-label']) !!}
					{!! Form::text('codigo_postal', null, ['class' => 'form-control']) !!}
				</div>
				{{-- 
				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('pais', 'Pais:', ['class' => 'control-label']) !!}
				    <!-- Start Select list "PAIS"-->
					{!! Form::select('pais', ['Mexico' => 'Mexico', 'EUA' => 'EUA']) !!}
					<!-- Finish Select list "PAIS"-->
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
					
				    {!! Form::label('estado', 'Estado:', ['class' => 'control-label']) !!}
					
					@if('pais'=='Mexico')
					
					{!! Form::select('estado', ['Monterrey' => 'Monterrey']) !!}
					@elseif('pais'=='EUA')
					{!! Form::select('estado', ['Boston' => 'Boston']) !!}
					@endif
					
				</div>
				--}}

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('pais', 'Pais:', ['class' => 'control-label']) !!}
					{!! Form::text('pais', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('estado', 'Estado:', ['class' => 'control-label']) !!}
					{!! Form::text('estado', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('ciudad', 'Ciudad:', ['class' => 'control-label']) !!}
					{!! Form::text('ciudad', null, ['class' => 'form-control']) !!}
				</div>
				
				<!--Empieza Botón de Actualizar y Cerrar-->
				<div class="modal-footer">
					{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

					<a href="{{ url('empresa') }}">
					<button type="button" class="btn btn-danger gradient">Cerrar</button>
					</a>
              	</div>
              	<!--Termina Botón de Actualizar y Cerrar-->
				

          </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    <script src="//geodata.solutions/includes/countrystatecity.js"></script>
    {{-- EL API PARA LOS DROP DOWN DE GEOLOCALIZACIÓN SE OBTUVO DE ESTE ENLACE:
    https://www.geodata.solutions/?chronoform=listbuilder&event=submit --}}

@stop