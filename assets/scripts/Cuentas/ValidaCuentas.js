$("#crearCuenta").validate({
	rules: 
	{
		digitos_cuenta: {required: true,number:true },
		nombre_de:{required: true },
		id_tipo_banco:{required: true }
	},
	messages:
	{
		digitos_cuenta: {required: 'Número de cuenta es requerido',number:'Solo Números'},
		nombre_de: {required: 'A Nombre de es requerido'},
		id_tipo_banco: {required: 'Tipo de banco es requerido'}
	}
});
/*obtener numero de cuenta*/
$('#digitos_cuenta_cd').change(function() {
	$.ajax({
		type: 'POST',
		url: url + 'Cuentas/ObtenerInfoCuenta',
		dataType: 'json',
		data: { 'digitos_cuenta': $(this).val() },
		success: function(msg) {
			//console.log(msg);
			if (msg != null) {
				$('#nombre_banco_c').val(msg.nombre_de).attr('readonly', true);
				$('#id_tipo_banco_cd option:selected').text(msg.nombre_banco).attr("disabled", true)
				$('#id_tipo_banco_cd option:not(:selected)').attr('disabled', true);

				$('#btnGuardar').attr('disabled', true);
				Swal.fire({
					toast:true,
					icon: 'error',
					title: 'Esta cuenta ya existe!',
					timer: 1000,
					timerProgressBar: true,
					showConfirmButton: false
				})

			}else{

				infoCuentaLimpiar();
			}
		}
	});
});

function infoCuentaLimpiar() {
	$('#nombre_banco_c').val('').attr('readonly', false);
	$('#id_tipo_banco_cd option:selected').text('Seleccione...').attr("disabled", true)
	$('#id_tipo_banco_cd option').attr('disabled', false);
	$('#btnGuardar').attr('disabled', false);
	
}

$('input[name="digitos_cuenta"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});
// VALIDAR CUENTA EXISTENTE

/*jQuery.validator.addMethod("inCuenta", function(value) {
    var resp = false;
    $.ajax({
        type: 'POST',
       url: url + 'Cuentas/validarCuenta',
        data: { 'digitos_cuenta': value },
        async: true,
        success: function(msg) {
        	console.log(msg);
            if (msg != 0) {
                resp = false;
            } else {
                resp = true;
            }
        }
    });
    return resp;
},'Esta cuenta ya esxiste!');

*/
