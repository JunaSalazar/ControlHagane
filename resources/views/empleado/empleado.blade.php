@extends('layout')

@section('content')

    <!-- Empieza Modal button (Alta de empleado)-->
    
    @component('empleado.registroEmpleadoModal')
    @endcomponent

    <!-- Termina Modal button (Alta de empleado)-->

{{-- FALTA LA VISTA PARA DESPLEGAR DATOS DE LA FILA --}}

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
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
                <th>Contraseña</th>
                <th>Ver</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($empleados as $emp)
          <tr>
                <?php 

                $id=$emp->id;

                // CAMPOS PARA NOMBRE COMPLETO**********************************
                $nombre=$emp->nombre;

                $ap=$emp->apellido_paterno;

                $am=$emp->apellido_materno;
                // CAMPOS PARA NOMBRE COMPLETO************************************

                // CAMPOS PARA CORREO************************************
                $correo=$emp->email;
                // CAMPOS PARA CORREO************************************

                // CAMPOS PARA TELEFONO************************************
                $password=$emp->password;
                // CAMPOS PARA TELEFONO************************************


                $nombre_completo = $nombre.' '.$ap.' '.$am;
                ?>
                <td>{{ $id }}</td>
                <td>{{ $nombre_completo }}</td>
                <td>{{ $correo }}</td>
                <td>{{ $password }}</td>

                <td>

                  {{-- *************** EMPIEZA BOTÓN DE MOSTRAR DATOS*************** --}}

                  <form action="{{URL('empleado/'. isset($empleado) ?: '')}}" method="POST">
                  <a href="{{URL('empleado/'. $emp->id.'/show')}}" class="btn btn-primary gradient"><span class = "glyphicon glyphicon-info-sign" aria-hidden="true"></span></a>
                  </form>

                  {{-- *************** TEMRINA BOTÓN DE MOSTRAR DATOS*************** --}}

                </td>

                <td>
                  {{-- *************** EMPIEZA BOTÓN DE EDITAR DATOS*************** --}}

                  <form action="{{URL('empleado/'. isset($empleado) ?: '')}}" method="POST">
                  <a href="{{URL('empleado/'. $emp->id.'/edit')}}" class="btn btn-success gradient glyphicon glyphicon-eye-edit"><span class="glyphicon glyphicon-edit"></span></a>
                  </form>

                  {{-- *************** TERMINA BOTÓN DE EDITAR DATOS*************** --}}

                  
                    @component('empleado.editarempleado')
                    @slot('editar')
                    <label>{{ $nombre }}</label>
                    @endslot
                    @endcomponent

                </td>

                <td>
                  {{-- *************** EMPIEZA BOTÓN DE ELIMINAR DATOS*************** --}}
                 
                  {!!Form::open(['route'=> ['empleado.destroy', $emp->id], 'method' => 'DELETE'])!!}
                  
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
{{-- 
// CAMPOS PARA EMPRESA************************************

                // $empresa = DB::table('empresa')
                //             ->join('empleado', 'empleado.id_empresa', '=', 'empresa.id')
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



