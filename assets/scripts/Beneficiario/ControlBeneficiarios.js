//Versión datatable y ajax.
$(document).ready(function() {
  //DatosCuenta();
  TB();
    //Mostrar elementos de la tabla Cheques.
    $('#Cheques').DataTable({
    	"ajax": url + "Ajax/MostrarCheques",
    	"order": [],
    	"language": idioma_espanol
    });
  });


//obteniendo  Tipo de bancos 
function TB() {

  $.ajax({
    url: url + "Ajax/obtTBancos",
    type: 'post',
    dataType: 'json',
    cache: false,
    success: function(data) {

      var options = " <option selected disabled value='' title='selecciona...' >selecciona... </option>";
      $.each(data, function(index, object) {
        options += '<option value="' + object.id_tipo_banco + '">' + object.nombre_banco + '</option>'; 
      });
      $('#id_tipo_banco').html(options);
            //console.log(data);
            // $('.bootstrap-select').selectpicker('refresh');
          }
        })
}

// LLENAR SELECT MUNICIPIOS
jQuery(document).ready(function() {
  $("[name='id_tipo_banco']").on('change', function() {
    event.preventDefault();
    var id_tipo_banco = $(this).val();
    if (id_tipo_banco == '') {
      $("[name='nombre_de']").prop('disabled', true);
    } else {
      $("[name='nombre_de']").prop('disabled', false);
      $.ajax({
        url: url + "Ajax/obtNombreDe",
        type: 'POST',
        dataType: 'json',
        data: { id_tipo_banco: id_tipo_banco },
        success: function(data) {
         //console.log(data);
         $('#nombrePersona').show('slow/3000', function() {

         });
         var options = " <option selected disabled value='' title='Selecciona...' >selecciona... </option>";
         var input ="";
         $.each(data,function(index, el) {
          options += '<option value="' + el.id_datos_cuenta + '">' +el.nombre_de+' '+ el.digitos_cuenta + '</option>'; 
        });
         $('#nombre_de').html(options);
         $('.bootstrap-select').selectpicker('refresh');

       },
       error: function() {
        alert('error ocurio..!');
      }
    });
    }
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
            Swal.fire({
              toast: true,
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
 $('#nombrePersona').hide();
 $('#cuenta').hide();
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

      $('#idCheque_').text(response.id_cheques);
      $('#beneficiario_').text(response.nombre_de);
      $('#nombreBanco_').text(response.nombre_banco);
      $('#cuenta_bancaria_').text(response.digitos_cuenta);
      $('#numero_cheque_').text(response.numero_cheque);
      $('#fecha_chueque_').text(response.fecha_chueque);
      $('#foto_').html('<img src="'+url+'uploads/' + response.foto + '" width="250px" height="150px" style="margin-left: -50px;"/>');
      //$('#foto_').text(response.foto);
      $('#monto_').text(response.monto);
      $('#verModal').modal({
        backdrop:"static",
        keyboard:false
      });
    }
  })
}