
@extends('layout')

@section('content')

<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Editar datos del cliente "{{ $task->nombre }}"</h3>
          </div>
          <div class="modal-body">
				


          		{!! Form::model($task, [
				    'method' => 'PATCH',
				    'route' => ['cliente.update', $task->id]
				]) !!}

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
				    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('apellido_paterno', 'Apellido paterno:', ['class' => 'control-label']) !!}
				    {!! Form::text('apellido_paterno', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('apellido_materno', 'Apellido Materno:', ['class' => 'control-label']) !!}
				    {!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('email', 'Correo:', ['class' => 'control-label']) !!}
				    {!! Form::text('email', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('telefono', 'Teléfono:', ['class' => 'control-label']) !!}
				    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group" style="margin-bottom: 10px;">
				    {!! Form::label('tipo_cliente', 'Tipo de cliente:', ['class' => 'control-label']) !!}
				    {!! Form::text('tipo_cliente', null, ['class' => 'form-control']) !!}
				</div>

				<!--Empieza Botón de Actualizar y Cerrar-->
				<div class="modal-footer">
					{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

					<a href="{{ url('cliente') }}">
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