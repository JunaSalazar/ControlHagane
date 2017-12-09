@extends('layout')

@section('content')

      <!-- FIN DE SECCIÓN DE PERFIL -->

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombre del cliente</th>
                <th>Proyecto correspondiente</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nombre del cliente</th>
                <th>Proyecto correspondiente</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
<?php
            $relacion = DB::table('cliente')
            ->join('proyecto', 'cliente.id', '=', 'proyecto.id_cliente')
            ->select('cliente.*','proyecto.id_cliente','proyecto.nombre as nombre_proyecto')
            ->orderBy('id', 'asc')
            ->get();
?>

        @foreach($relacion as $r)
        <?php
                  $nombre=$r->nombre;
                  
                  $a_paterno=$r->apellido_paterno;

                  $a_materno=$r->apellido_materno;

                  $nombre_proyecto=$r->nombre_proyecto;

                  $nombre_cliente = $nombre.' '.$a_paterno.' '.$a_materno;
                ?>
        <tr>
          <td>{{ $nombre_cliente }}</td>
          <td>{{ $nombre_proyecto }}</td>
          
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