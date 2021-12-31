//Versión datatable y ajax.
$(document).ready(function() {

    //Mostrar elementos de la tabla Cheques.
    $('#Cheques').DataTable({
    	"ajax": url + "Ajax/MostrarCheques",
    	"order": [],
    	"language": idioma_espanol
    });
  });

// Acción de Insertar especialidades.
$(function() {
	var $fotoCheque = $("#foto");

	$("#createForm").submit(function(event) {
		var archivos = $fotoCheque[0].files;
		if (archivos.length > 0) {
      var fotos = archivos[0]; //Sólo queremos la primera imagen, ya que el usuario pudo seleccionar más
      var lector = new FileReader();
      //Ojo: En este caso 'foto' será el nombre con el que recibiremos el archivo en el servidor
      var form = new FormData($("#createForm")[0]);
      form.append('foto', fotos);
      $.ajax({
      	url: url + 'Ajax/Guardar',
      	data:form,
      	type: "post",
      	async: false,
      	dataType: 'json',
      	cache:false,
      	contentType:false,
      	processData:false,
      	success: function(response) {

      		if (response !== '') {

                    //alert('Datos guardados correctamente');
                    Swal.fire({
                    	position: 'top-end',
                    	icon: 'success',
                    	title: 'Datos guardados correctamente',
                    	showConfirmButton: false,
                    	timer: 1500
                    });
                    limpiar();

                  } 
                },
                error: function() {
                  Swal.fire({
                   icon: 'error',
                   title: 'Oops...',
                   text: 'Algunos campos son requeridos!'
                 });
                  
                }
              });
      event.preventDefault();
    }
  });

});

//limpia imput y select resetea la validación y remueve la clase del modal 
function limpiar() {
 $('#ClienteModal').modal('hide');
 $('#createForm').trigger("reset");
 var validator = $("#createForm").validate();
 validator.resetForm();
 $('.form-control').removeClass('is-valid is-invalid');
 $('.custom-select').removeClass('is-valid is-invalid');
 $('#Cheques').DataTable().ajax.reload(null, false);
}
// Obtener un datos por id de Cliente en modal.
function verInfo(idCheqe) {
  $.ajax({
    url: url + 'Ajax/obtenerIdCheque/' + idCheqe,
    method: "post",
    dataType: "json",
    success: function(response) {

      $('#idCheque_').text(response.idCheque);
      $('#beneficiario_').text(response.beneficiario);
      $('#cuenta_bancaria_').text(response.cuenta_bancaria);
      $('#numero_cheque_').text(response.numero_cheque);
      $('#fecha_chueque_').text(response.fecha_chueque);
      $('#foto_').text(response.foto);
      $('#monto_').text(response.monto);
      $('#verModal').modal({
        backdrop:"static",
        keyboard:false
      });
    }
  })
}