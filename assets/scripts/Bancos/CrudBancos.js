//Versión datatable y ajax.
$(document).ready(function() {
  //DatosCuenta();
  TB();
    //Mostrar elementos de la tabla Cheques.
    $('#Bancos').DataTable({
    	"ajax": url + "Bancos/MostrarBancos",
    	"order": [],
         destroy: true,
    	"language": idioma_espanol
    });
});

//limpia imput y select resetea la validación y remueve la clase del modal 
function limpiarCuenta() {
	$('#CuentaModal').modal('hide');
    $('#editBanco').modal('hide');

	$('#crearCuenta').trigger("reset");
	var validator = $("#crearCuenta").validate();
	validator.resetForm();
	$('.form-control').removeClass('is-valid is-invalid');
	$('.custom-select').removeClass('is-valid is-invalid');
	$('#Bancos').DataTable().ajax.reload(null, false);
}

// Acción de Insertar Bancos.
$(function() {
	$("#crearCuenta").submit(function(event) {
		$.ajax({
			 type:"POST",
			url: url + 'Bancos/Guardar',
			data: $("#crearCuenta").serialize(),
			success: function(response) {

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
            		icon: 'error',
            		title: 'Oops...',
            		text: 'Algunos campos son requeridos!'
            	})

            }
        });
		event.preventDefault();
	});

    });

// Obtener un id de Cliente.
function obtenIdBanco(idBanco, data) {
    $.ajax({
        url: url + 'Bancos/obtenerIdBanco/' + idBanco,
        method: "post",
        data: { idBanco: idBanco },
        dataType: "json",
        success: function(response) {
              console.log(response.id_tipo_banco);
            $('#idBancos').val(response.id_tipo_banco);
            $('#nombre_banco_').val(response.nombre_banco);
            $('#editBanco').modal({
                backdrop: "static",
                keyboard: false
            });
        }
    })
}

// Acción de Actualizar especialidades.
$("#editForm").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: url + 'Bancos/Actualizar',
        data: $("#editForm").serialize(),
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

