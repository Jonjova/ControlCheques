//Versión datatable y ajax.
$(document).ready(function() {

 obtBancos();
    //Mostrar elementos de la tabla Cuentas.
    $('#Cuenta').DataTable({
    	"ajax": url + "Cuentas/MostrarCuenta",
    	"order": [],
    	"language": idioma_espanol
    });
  });

//obteniendo  Tipo de Cuentas 
function obtBancos() {

  $.ajax({
    url: url + "Cuentas/obtTB",
    type: 'post',
    dataType: 'json',
    cache: false,
    success: function(data) {

      var options = " <option selected disabled value='' title='selecciona...' >selecciona... </option>";
      $.each(data, function(index, object) {
        options += '<option value="' + object.id_tipo_banco + '">' + object.nombre_banco + '</option>'; 
      });
      $('#id_tipo_banco_cd').html(options); 
      $('#id_tipo_banco_cde').html(options);
    }
  })
}

//limpia imput y select resetea la validación y remueve la clase del modal 
function limpiarCuenta() {
	$('#CuentaModal').modal('hide');
  $('#editCuenta').modal('hide');
   infoCuentaLimpiar();
  $('#crearCuenta').trigger("reset");
  var validator = $("#crearCuenta").validate();
  validator.resetForm();
  $('.form-control').removeClass('is-valid is-invalid');
  $('.custom-select').removeClass('is-valid is-invalid');
  $('#Cuenta').DataTable().ajax.reload(null, false);
}

// Acción de Insertar Cuentas.
$(function() {
  $("#crearCuenta").submit(function(event) {
    $.ajax({
     type:"POST",
     url: url + 'Cuentas/Guardar',
     data: $(this).serialize(),
     success: function(response) {
      console.log(response);
      if (response != '') {
        Swal.fire({
          toast:true,
          position: 'top-end',
          icon: 'success',
          title: 'Datos guardados correctamente',
          showConfirmButton: false,
          timer: 1500
        });
        limpiarCuenta();
      }
    },
    error: function() {
      Swal.fire({
        toast:true,
        icon: 'error',
        title: 'Complete los campos!',
        timer: 1000,
        timerProgressBar: true,
        showConfirmButton: false
      })

    }
  });
    event.preventDefault();
  });

});

// Obtener un id de Cuentas.
function obtenIdCuenta(idCuenta, data) {
  $.ajax({
    url: url + 'Cuentas/obtenerIdCuenta/' + idCuenta,
    method: "post",
    data: { idCuenta: idCuenta },
    dataType: "json",
    success: function(response) {
     console.log(response);
     $('#idDatosCuenta').val(response.id_datos_cuenta);
     $('#digitos_cuenta_cde').val(response.digitos_cuenta);
     $('#nombre_banco_cde').val(response.nombre_de);
     $('#id_tipo_banco_cde option:selected').text(response.nombre_banco)
     $('#editCuenta').modal({
      backdrop: "static",
      keyboard: false
    });
   }
 })
}


// Acción de Actualizar Cuenta.
$("#editCuentaForm").submit(function(event) {
  event.preventDefault();
  $.ajax({
    url: url + 'Cuentas/Actualizar',
    data: $("#editCuentaForm").serialize(),
    type: "post",
    async: false,
    dataType: 'json',
    success: function(response) {

      if (response == 1) {

        Swal.fire({
          toast:true,
          position: 'top-end',
          icon: 'success',
          title: 'Actualizado correctamente',
          showConfirmButton: false,
          timer: 1500
        })
        limpiarCuenta();
      }

    },
    error: function() {
      alert("error");
    }
  });
});

