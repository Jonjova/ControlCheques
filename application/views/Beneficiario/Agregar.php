<!--Aquí comienza el modal de nuevo tipo de cliente -->
<div>
  <form id="createForm"  method="post" enctype="multipart/form-data" class="needs-validation" >
    <div class="modal fade " id="ClienteModal" aria-hidden="true">
      <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Cheque</h5>
            <div id="msg"></div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           
          <div class="row">
            <div class="col-sm">
              <label  >Nombre beneficiario</label>
              <input type="text" placeholder="Ingrese Nombres" id="beneficiario" name="beneficiario" class="form-control mb-2 mr-sm-2 "  required>
            </div>
            <div class="col-sm">
              <label >Numero de Cheque </label>
              <input type="text" placeholder="Ingrese Cheque" id="numero_cheque" name="numero_cheque" class="form-control mb-2 mr-sm-2 "  required>
            </div>
          </div>
          <div class="row">
           <div class="col-sm">
            <label  >Cuenta Bancaria </label>
            <input type="text" placeholder="Ingrese Cuenta Bancaria" id="cuenta_bancaria" name="cuenta_bancaria" class="form-control mb-2 mr-sm-2 "  required>
          </div>
          <div class="col-sm">
            <label>Adjunte archivo</label>
            <input accept="image/*" id="foto" name="foto" type="file" class="form-control mb-2 mr-sm-2 " required>
          </div>
        </div>

        <div class="row">
          <div class="col-sm">
           <label>Monto</label>
           <input type="text" placeholder="Ingrese Monto" id="monto" name="monto" class="form-control mb-2 mr-sm-2 " required>
         </div>
       </div>
     </div>
     <div class="modal-footer">

      <button type="button" class="btn btn-secondary pull-left btn-sm" data-dismiss="modal" onclick="limpiar()">Cerrar</button>
      <button  type="submit" id="btnGuardar" class="btn btn-success btn-sm">Guardar</button> 
    </div>
  </div>
</div>
</div>
</form>

  <!--Aquí termina el modal de nuevo tipo de cliente -->