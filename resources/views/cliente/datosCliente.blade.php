@extends('layout')

@section('content')

<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Datos del cliente "{{ $task->nombre }}"</h3>
          </div>
          <div class="modal-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Campos:</th>
							<th>Datos:</th>
						</tr>
					</thead>
				<tbody>
					<tr>
						<th scope="row">ID</th>
						<td>{{ $task->id }}</td>
					</tr>
					<tr>
						<th scope="row">Nombre</th>
						<td>{{ $task->nombre }}</td>
					</tr>
					<tr>
						<th scope="row">Apellido paterno</th>
						<td>{{ $task->apellido_paterno }}</td>
					</tr>
					<tr>
						<th scope="row">Apellido materno</th>
						<td>{{ $task->apellido_materno }}</td>
					</tr>
					<tr>
						<th scope="row">Telefono</th>
						<td>{{ $task->telefono }}</td>
					</tr>
					<tr>
						<th scope="row">Correo</th>
						<td>{{ $task->email }}</td>
					</tr>
					<tr>
						<th scope="row">Tipo de cliente</th>
						<td>{{ $task->tipo_cliente }}</td>
					</tr>
					
				</tbody>
				</table>
				<div class="modal-footer">
					
					<a href="{{ url('cliente') }}">
					<button type="button" class="btn btn-default gradient">Regresar</button>
					</a>
              	</div>

          </div>
        </div>
    </div>

@stop