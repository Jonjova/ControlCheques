<!-- Aqui comienza el modal de editar -->
<div class="modal fade" id="editCuenta" aria-hidden="true" >
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar información de Banco</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editCuentaForm" enctype="multipart/form-data" class="needs-validation" >
        <div class="modal-body">
         <div class="row">
             <div class="col-sm">
             <input hidden name="id_datos_cuenta" id="idDatosCuenta">
             <label >Numero de cuenta</label>
              <input type="text" placeholder="Ingrese Numero de cuenta" id="digitos_cuenta_cde" name="digitos_cuenta" class="form-control mb-2 mr-sm-2 "  >
            </div>
               <div class="col-sm">
             <label >A nombre de </label>
              <input type="text" placeholder="Ingrese nombre de" id="nombre_banco_cde" name="nombre_de" class="form-control mb-2 mr-sm-2 "  >
            </div>
          </div>
          <div class="row">
             <div class="col-sm"  > 
               <label  >Tipo de Banco</label>
               <select name="id_tipo_banco" id="id_tipo_banco_cde" class="custom-select"  ></select>
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

