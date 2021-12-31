<!-- Aqui comienza el modal de editar -->
<div class="modal fade" id="editModal" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar información de Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm" enctype="multipart/form-data" class="needs-validation" >
        <div class="modal-body">
         <div class="row">
          <div class="col-sm">
            <input type="hidden" name="idCliente" id="idCliente">
            <label  >Nombre</label>
            <input type="text" placeholder="Ingrese Nombres" id="nombre_" name="nombre" class="form-control mb-2 mr-sm-2 " id-data="validationCustom01" required>
          </div>
          <div class="col-sm">
            <label >Apellido</label>
            <input type="text" placeholder="Ingrese Apellidos" id="apellido_" name="apellido" class="form-control mb-2 mr-sm-2 " id-data="validationCustom02" required>
          </div>
        </div>

        <div class="row">
         <div class="col-sm">
          <label  >Sexo</label>
          <select name="idSexo" id="idSexo_" class="custom-select" id-data="validationCustom03" required>
          </select>
        </div>
        <div class="col-sm">
          <label>Fecha de nacimiento</label>
          <input type="date" placeholder="dd/MM/yyy" id="fechaNac_" name="fechaNac" class="form-control mb-2 mr-sm-2 " required>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
         <label>Dirección</label>
         <textarea id="direccion_" placeholder="Ingrese Direccion" name="direccion" rows="4" cols="50" class="form-control mb-2 mr-sm-2 " required></textarea>
       </div>
       <div class="col-sm">
        <label>Teléfono</label>
        <input type="text" placeholder="Ingrese teléfono" id="telefono_" name="telefono" class="form-control mb-2 mr-sm-2 " required>
      </div>
    </div>
   
  <div class="row">
   <div class="col-sm"> 
     <label>Correo</label>
     <input type="email" placeholder="Ingrese correo" id="email_" name="email" class="form-control mb-2 mr-sm-2 " required>
   </div>
   <div class="col-sm">
        <label>Estado</label>
         <select class="custom-select" id="estado_" name="estado" required>
          <option >Selecione un estado</option>
          <option value="1">Activo</option>
          <option value="0">Inactivo</option>
        </select>
      </div>
 </div>

</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary pull-left btn-sm" data-dismiss="modal">cerrar</button>
  <button type="submit"  class="btn btn-primary btn-sm">Actualizar</button>
</div>
</form>
<img src="" >
</div>
</div>
</div>

