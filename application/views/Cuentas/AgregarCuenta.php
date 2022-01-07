<!--Aquí comienza el modal de nuevo tipo de cliente -->

<div>
  <form id="crearCuenta"  method="post"  class="needs-validation" >
    <div class="modal fade " id="CuentaModal" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Nueva Cuenta</h5>
           
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" >
            <div class="row">
             <div class="col-sm">
             <label >Numero de cuenta</label>
              <input type="text" placeholder="Ingrese Numero de cuenta" id="digitos_cuenta_cd" name="digitos_cuenta" class="form-control mb-2 mr-sm-2 "  required>
            </div>
               <div class="col-sm">
             <label >A nombre de </label>
              <input type="text" placeholder="Ingrese nombre de" id="nombre_banco_c" name="nombre_de" class="form-control mb-2 mr-sm-2 "  required>
            </div>
          </div>
          <div class="row">
             <div class="col-sm"  > 
               <label  >Tipo de Banco</label>
               <select name="id_tipo_banco" id="id_tipo_banco_cd" data-width="99%" class="custom-select" required ></select>
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