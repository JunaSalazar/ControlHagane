<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <div class="container">
            <form method="post" action="/empleado/{id}/edit">
              <div class="form-group row">
                {{csrf_field()}}
                  <div class="form-group">
                    <label for="recipient-name" class="form-control-label" id="name">Nombre</label>
                      {{$editar}}
                  </div>
              </div>

              

            </form>
          </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

   $('#editModal').on('show.bs.modal', function (event) {
    console.log("Si entro");
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('whatever2'); // Extract info from data-* attributes
    var modal = $(this);
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
    });                       

</script>