<button type="button" class="btn btn-success gradient"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-bottom: 25px;">Registrar empresa</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Alta de empresa</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <!--<span aria-hidden="true">&times;</span>-->
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="/empresa/store">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre</label>
                <input type="text" class="form-control" name="nombre_empresa" minlength="1" maxlength="20">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Razón Social</label>
                <input type="text" class="form-control" name="razon_social" minlength="1" maxlength="20">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">RFC</label>
                <input type="text" class="form-control" name="rfc" minlength="1" maxlength="20">
              </div>

              <p><b>Dirección:</b></p>

              <div class="half left cf">
              <label for="recipient-name" class="form-control-label">Calle</label>
                <input type="text" class="form-control" id="calleEmpresa" name="calle_empresa" maxlength="50">
              </div>
              <div class="half right cf">
                <label form="recipient-name" class="form-control-label">Número</label>                
                <input type="number" class="form-control" id="numeroEmpresa" name="numero_empresa" maxlength="50">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Colonia</label>
                <input type="text" class="form-control" name="colonia_empresa" maxlength="50">
              </div>

              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Código Postal</label>
                <input type="text" class="form-control" name="codigo_postal" maxlength="50">
              </div>

              <div class="form-group">
                <label form="recipient-name" class="form-control-label">País</label>
                <select name="pais_empresa" class="countries order-alpha form-control" id="countryId" required>
                <option value="">Selecciona el país</option>
                </select>
              </div>

              <div class="half left cf">
                <label form="recipient-name" class="form-control-label">Estado</label> 
                <select name="estado_empresa" class="states order-alpha form-control" id="stateId" required>
                <option value="">Selecciona el estado</option>
                </select>  
              </div>

              <div class="half right cf">
                <label for="recipient-name" class="form-control-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad_empresa" minlength="5" maxlength="20" required>
              </div>
              

              <div class="modal-footer">
                <button type="submit" class="btn btn-success gradient">Guardar</button>
                <button type="button" class="btn btn-danger gradient" data-dismiss="modal">Cerrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
    <script src="//geodata.solutions/includes/countrystatecity.js"></script>
    {{-- EL API PARA LOS DROP DOWN DE GEOLOCALIZACIÓN SE OBTUVO DE ESTE ENLACE:
    https://www.geodata.solutions/?chronoform=listbuilder&event=submit --}}

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