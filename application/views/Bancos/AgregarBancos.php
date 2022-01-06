<!--Aquí comienza el modal de nuevo tipo de cliente -->

<div>
  <form id="crearCuenta"  method="post"  class="needs-validation" >
    <div class="modal fade " id="BancoModal" aria-hidden="true">
      <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Nuevo Banco</h5>
           
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" >
            <div class="row">
             <div class="col-sm">
             <label >Nombre de Banco </label>
              <input type="text" placeholder="Ingrese Cheque" id="nombre_banco" name="nombre_banco" class="form-control mb-2 mr-sm-2 "  required>
            </div>
          </div>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary pull-left btn-sm" data-dismiss="modal" onclick="limpiarCuenta()">Cerrar</button>
          <button  type="submit" id="btnGuardar" class="btn btn-success btn-sm" >Guardar</button> 
        </div>
      </div>
    </div>
  </div>
</form>

  <!--Aquí termina el modal de nuevo tipo de cliente -->