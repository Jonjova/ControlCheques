<!-- Aqui comienza el modal de editar -->
<div class="modal fade" id="editBanco" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar información de Banco</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm" enctype="multipart/form-data" class="needs-validation" >
        <div class="modal-body">
         <div class="row">
          <div class="col-sm">
            <input hidden name="id_tipo_banco" id="idBancos">
            <label  >Nombre Banco</label>
            <input type="text" placeholder="Ingrese Nombres" id="nombre_banco_" name="nombre_banco" class="form-control mb-2 mr-sm-2 " required>      
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary pull-left btn-sm" data-dismiss="modal">cerrar</button>
          <button type="submit"  class="btn btn-primary btn-sm">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>

