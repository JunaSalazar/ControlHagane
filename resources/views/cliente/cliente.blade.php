@extends('layout')

@section('content')

    <!-- Empieza Modal button (Alta de cliente)-->
    
    @component('cliente.registroClienteModal')
        @slot('empresas')
            @foreach($empresas as $e)
                <?php
                $nombre=$e->nombre;
                $id=$e->id;
                ?>
            <option value = '{{ $id }}'>{{ $nombre }}</option>
            @endforeach      
        @endslot
    @endcomponent

    <!-- Termina Modal button (Alta de cliente)-->

{{-- FALTA LA VISTA PARA DESPLEGAR DATOS DE LA FILA --}}

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Empresa</th>
                <th>Tipo</th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Empresa</th>
                <th>Tipo</th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($clientes as $c)
          <tr>
                <?php 

                $id=$c->id;

                // CAMPOS PARA NOMBRE COMPLETO**********************************
                $nombre=$c->nombre;

                $ap=$c->apellido_paterno;

                $am=$c->apellido_materno;
                // CAMPOS PARA NOMBRE COMPLETO************************************

                // CAMPOS PARA CORREO************************************
                $correo=$c->email;
                // CAMPOS PARA CORREO************************************

                // CAMPOS PARA TELEFONO************************************
                $telefono=$c->telefono;
                // CAMPOS PARA TELEFONO************************************

                foreach($empresas as $e){
                    if($e->id == $c->id_empresa){
                        $empresa = $e->nombre;
                        $empresa=$empresa;
                        
                        if($empresa==0){
                            $empresa=$empresa;
                            
                        }
                    }
                }

                // CAMPOS PARA TIPO************************************
                $tipo=$c->tipo_cliente;
                // CAMPOS PARA TIPO************************************


                $nombre_completo = $nombre.' '.$ap.' '.$am;
                ?>
                <td>{{ $id }}</td>
                <td>{{ $nombre_completo }}</td>
                <td>{{ $correo }}</td>
                <td>{{ $telefono }}</td>

                <td>{{ $empresa }}</td>
                <td>{{ $tipo }}</td>

                <td>

                  {{-- *************** EMPIEZA BOTÓN DE MOSTRAR DATOS*************** --}}

                  <form action="{{URL('cliente/'. isset($cliente) ?: '')}}" method="POST">
                  <a href="{{URL('cliente/'. $c->id.'/show')}}" class="btn btn-primary gradient"><span class = "glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>
                  </form>

                  {{-- *************** TEMRINA BOTÓN DE MOSTRAR DATOS*************** --}}

                </td>

                <td>
                    @if(!Auth::user()->hasRole('customer'))
                  {{-- *************** EMPIEZA BOTÓN DE EDITAR DATOS*************** --}}

                  <form action="{{URL('cliente/'. isset($cliente) ?: '')}}" method="POST">
                  <a href="{{URL('cliente/'. $c->id.'/edit')}}" class="btn btn-success gradient glyphicon glyphicon-eye-edit"><span class="glyphicon glyphicon-edit"></span></a>
                  </form>

                  {{-- *************** TERMINA BOTÓN DE EDITAR DATOS*************** --}}

                  
                    @component('cliente.editarcliente')
                    @slot('editar')
                    <label>{{ $nombre }}</label>
                    @endslot
                    @endcomponent

                </td>

                <td>
                  {{-- *************** EMPIEZA BOTÓN DE ELIMINAR DATOS*************** --}}
                 
                  {!!Form::open(['route'=> ['cliente.destroy', $e->id], 'method' => 'DELETE'])!!}
                  
                  {!! Form::submit('Eliminar', ['class' => 'btn btn-danger gradient']) !!}
                  
                  {!! Form::close() !!}

                  {{-- *************** EMPIEZA BOTÓN DE ELIMINAR DATOS*************** --}}
                </td>
                @endif

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
{{-- 
// CAMPOS PARA EMPRESA************************************

                // $empresa = DB::table('empresa')
                //             ->join('cliente', 'cliente.id_empresa', '=', 'empresa.id')
                //             ->select('empresa.id','empresa.nombre')
                //             ->get();

                // foreach($empresas as $e){
                //     if(($e->id) == ($c->id_empresa)){
                //         $empresa = $e->nombre;
                //         $empresa=substr($empresa,1);
                //         $empresa = str_replace("}","",$empresa);
                //         if((strcmp(substr($empresa,-1),'"'))==0){
                //             $empresa=substr($empresa,1);
                //             $empresa = str_replace('"','',$empresa);
                //         }
                //     }
                // }
                // CAMPOS PARA EMPRESA************************************ --}}



