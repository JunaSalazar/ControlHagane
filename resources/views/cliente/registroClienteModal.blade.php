<button type="button" class="btn btn-success gradient"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-bottom: 25px;">Registrar cliente</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Alta de cliente</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <!--<span aria-hidden="true">&times;</span>-->
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="/cliente/store">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre(s)</label>
                <input type="text" class="form-control" id="nombre" name = "nombre_cliente" maxlength="20">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Apellido paterno</label>
                <input type="text" class="form-control" id="apellidoPaterno" name = "apellido_paterno" maxlength="20">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Apellido materno</label>
                <input type="text" class="form-control" id="apellidoMaterno" name = "apellido_materno" maxlength="50">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Empresa donde pertenece</label>
                <select class="form-control" id="clienteEmpresa" name="empresa_cliente">
                {{ $empresas }}
                </select>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Teléfono</label>
                <input type="text" class="form-control" name = "telefono_cliente" maxlength="30">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Correo electrónico</label>
                <input type="text" class="form-control" id="correo" name="correo_cliente" maxlength="60">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Constraseña</label>
                <input type="password" class="form-control" id="password" name="password_cliente" maxlength="60">
              </div>

              <fieldset id = "tipo">
                <p><b>Tipo de cliente:</b></p>
              <div class="radio" name="tipo">
                <label><input type="radio" name="tipo" value ="ACTUAL">ACTUAL</label>
              </div>
              <div class="radio" name="tipo">
                <label><input type="radio" name="tipo" value ="PROSPECTO">PROSPECTO</label>
              </div>
              <div class="radio" name="tipo">
                <label><input type="radio" name="tipo" value ="CONFLICTO" required>CONFLICTO</label>
              </div>
              </fieldset>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger gradient" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success gradient">Guardar</button>
              </div>
            </form>
          </div>         
        </div>
      </div>
    </div>

    <script type="text/javascript">
        $('#altaUsuario').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('New message to ' + recipient)
          modal.find('.modal-body input').val(recipient)
      })

    </script>