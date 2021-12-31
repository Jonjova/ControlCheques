
<body>
	<div class="container"><br>
		<h2>Lista de cheques</h2><br>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ClienteModal">
			Agregar Nuevo Cheque
		</button><br><br>
		<!--Aquí se listan las Cliente.-->
		<div class="table-responsive-sm">
			<table id="Cheques" class="display table table-hover" style="width: 100%;" >
				<thead class="thead-dark">
					<tr>
						<th>Id</th>
						<th>Beneficiario </th>
						<th>Fecha chueque</th>
						<th>Foto</th>
						<th>Monto</th>
						<th>Accion</th>	
					</tr>
				</thead>

			</table>
		</div>
<!--<input accept="image/*" id="fotoAlumno" type="file">
<button id="guardarImagen">Subir</button>-->
</body>

<script type="text/javascript">
/*
	$(function() {
  var $fotoAlumno = $("#fotoAlumno"),
    $btnGuardar = $("#guardarImagen");


  $btnGuardar.click(function() {
    var archivos = $fotoAlumno[0].files;
    if (archivos.length > 0) {
      var foto = archivos[0]; //Sólo queremos la primera imagen, ya que el usuario pudo seleccionar más
      var lector = new FileReader();
      //Ojo: En este caso 'foto' será el nombre con el que recibiremos el archivo en el servidor
      var form = new FormData();
      form.append('foto', foto);
      $.ajax({
        url: url + "Ajax/ponerFotoCheque",
        data: form,
        type: 'POST',
        contentType: false,
        processData: false,
        success: function(resultados) {
          console.log("Petición terminada. Resultados", resultados);
        }

      });
    }
  });
});*/
</script>


