@extends('layout')

@section('content')

    <!-- Empieza Modal button (Alta de cliente)-->

    @component('empresa.registroEmpresaModal')
    @endcomponent

    <!-- Termina Modal button (Alta de cliente)-->


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Razon Social</th>
                <th>Dirección</th>
                <th>RFC</th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Razon Social</th>
                <th>Dirección</th>
                <th>RFC</th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($empresas as $e)
          <tr>
            <?php 
                $id=$e->id;

                $nombre=$e->nombre;

                $razon=$e->razon_social;

                $calle=$e->calle;

                $numero=$e->numero;

                $colonia=$e->colonia;

                $codigo_postal=$e->codigo_postal;

                $estado=$e->estado;

                $ciudad=$e->ciudad;
                
                $pais=$e->pais;

                $direccion = $calle.' #'.$numero.', '.$colonia.', '.$codigo_postal.', '.$ciudad.', '.$estado.', '.$pais;

                // COMBINAR CALLE,NUMERO,COLONIA,CODIGOPOSTAL,ESTADO,CIUDAD

                $rfc=$e->rfc;
                ?>

                <td>{{ $id }}</td>
                <td>{{ $nombre }}</td>
                <td>{{ $razon }}</td>
                <td>{{ $direccion }}</td>
                <td>{{ $rfc }}</td>
            

                <td>

                  {{-- *************** EMPIEZA BOTÓN DE MOSTRAR DATOS*************** --}}

                  <form action="{{URL('empresa/'. isset($empresa) ?: '')}}" method="POST">
                  <a href="{{URL('empresa/'. $e->id.'/show')}}" class="btn btn-primary gradient"><span class = "glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>
                  </form>

                  {{-- *************** TEMRINA BOTÓN DE MOSTRAR DATOS*************** --}}

                </td>

                <td>
                  {{-- *************** EMPIEZA BOTÓN DE EDITAR DATOS*************** --}}

                  <form action="{{URL('empresa/'. isset($empresa) ?: '')}}" method="POST">
                  <a href="{{URL('empresa/'. $e->id.'/edit')}}" class="btn btn-success gradient glyphicon glyphicon-eye-edit"><span class="glyphicon glyphicon-edit"></span></a>
                  </form>

                  {{-- *************** TERMINA BOTÓN DE EDITAR DATOS*************** --}}

                  
                    @component('empresa.editarempresa')
                    @slot('editar')
                    <label>{{ $nombre }}</label>
                    @endslot
                    @endcomponent

                </td>

                <td>
                  {{-- *************** EMPIEZA BOTÓN DE ELIMINAR DATOS*************** --}}
                 
                  {!!Form::open(['route'=> ['empresa.destroy', $e->id], 'method' => 'DELETE'])!!}

                  {!! Form::submit('Eliminar', ['class' => 'btn btn-danger gradient']) !!}
                  
                  {!! Form::close() !!}

                  {{-- *************** EMPIEZA BOTÓN DE ELIMINAR DATOS*************** --}}
                </td>

            </tr>
            @endforeach
        </tbody>
</table>      

<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
  } );

</script>




@stop