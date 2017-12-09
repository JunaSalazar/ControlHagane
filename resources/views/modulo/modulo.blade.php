@extends('layout')

@section('content')

      <!-- FIN DE SECCIÓN DE PERFIL -->

      <!-- PARA ACOMODAR BOTONES EN LA PANTALLA >>>>>>>> ESTE ES PARA PONERLO EN LA DERECHA "pull-right" -->


<!-- Empieza Modal button (AGREGAR MODULOS A PROYECTOS)-->
    @component('modulo.registroModuloModal')

<!-- /////////////////////////////////GUARDAR ID DE PROYECTOS//////////////////////////////////  -->
    @slot('nombre_proyecto')
        @foreach($proyectos as $p)
        <?php
        $nombre=$p->nombre;

        $id_proyecto=$p->id;
        ?>
        <option value = '{{ $id_proyecto }}'>{{ $nombre }}</option>
        @endforeach
    @endslot
    
<!-- /////////////////////////////////GUARDAR ID DE PROYECTOS//////////////////////////////////  -->

<!-- /////////////////////////////////GUARDAR ID DE PROYECTOS//////////////////////////////////  -->

    @slot('nombre_empleados')
      @foreach($empleados as $e)
        <?php
        $nombre=$e->nombre;

        $apellido_paterno=$e->apellido_paterno;

        $apellido_materno=$e->apellido_materno;

        $nombre_completo = $nombre.' '.$apellido_paterno.' '.$apellido_materno;

        $id_empleado=$e->id;
        ?>
        <option value = '{{ $id_empleado }}'>{{ $nombre_completo }}</option>
        @endforeach
    @endslot

<!-- /////////////////////////////////GUARDAR ID DE PROYECTOS//////////////////////////////////  -->
    @endcomponent
    
<!-- Termina Modal button (AGREGAR MODULOS A PROYECTOS)-->




    <!-- **************************************************************************************************
    ////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Datos del módulo</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <!--<span aria-hidden="true">&times;</span>-->
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre del módulo</label>
                <p>MODULO 1</p>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Proyecto al que pertenece</label>
                <p>Aplicación Móvil</p>
              </div>

              <label for="recipient-name" class="form-control-label">Nivel de importancia</label>
              <p>BAJO</p>

              <div class="half left cf">
              <label for="recipient-name" class="form-control-label">Responsable del módulo</label>
                <p>Erick Castillo</p>
                <p>Carlos Salazar</p>
              </div>
              <div class="half right cf">
                <label for="recipient-name" class="form-control-label">Progreso del módulo</label>
                <p>50%</p>
              </div>

              <!-- Caja de comentarios

              <div class="form-group">
                <label for="message-text" class="form-control-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
              -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger gradient" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
<!--     \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    ************************************************************************************************** -->

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Proyecto al que pertenece</th>
                <th>Nombre del módulo</th>
                <th>Nivel de importancia</th>
                <th>Responsable(s) del módulo</th>
                <th>Progreso del módulo</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Proyecto al que pertenece</th>
                <th>Nombre del módulo</th>
                <th>Nivel de importancia</th>
                <th>Responsable(s) del módulo</th>
                <th>Progreso del módulo</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>

          <?php

          $relacion = DB::table('ocupa')
                    ->select('modulo.id as mod_id','modulo.nombre as mod_nombre','modulo.id_proyecto as id_proyecto','empleado.nombre as emp_nombre','modulo.clasificacion as mod_clas','proyecto.nombre as pr_nombre')->distinct()
                    ->join('empleado','empleado.id','=','ocupa.id_empleado')
                    ->join('modulo','modulo.id','=','ocupa.id_modulo')
                    ->join('proyecto','proyecto.id','=','modulo.id_proyecto')
                     ->orderBy('proyecto.nombre')
                     ->get();

          // Select distinct mo.id,pr.nombre, mo.nombre,e.nombre, mo.clasificacion
          // From tablas.empleado as e, tablas.ocupa as o, tablas.modulo as mo, tablas.proyecto as pr
          // Where e.id = o.id_empleado and o.id_modulo= mo.id
          // Order by pr.nombre

          ?>

            @foreach($relacion as $m)
          <tr>
                <td>{{ $m->pr_nombre }}</td>
                <td>{{ $m->mod_nombre }}</td>
                <td>{{ $m->mod_clas }}</td>
                <td>{{ $m->emp_nombre }}</td>
                <td></td>
                <td>
                  <button type="button" class="btn btn-primary gradient"  data-toggle="modal" data-target="#infoModal" data-whatever="@mdo" style="margin-bottom: 5px;"><span class = "glyphicon glyphicon-info-sign" aria-hidden="true"></span></button>

                  <button type="button" class="btn btn-primary gradient" data-whatever="@mdo" style="margin-bottom: 5px;"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>

                </td>
            </tr>
            @endforeach
        </tbody>
</table>      

<!-- <script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
  } );

</script> -->

@stop