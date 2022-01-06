
//validación de campos con la librería de jquery.validate
$("#crearCuenta").validate({
	rules: 
	{
		nombre_banco: {required: true }
		
	},
	messages:
	{
		nombre_banco: {required: 'Nombre banco es requerido'}
	
	}
});


//validación de campos con la libreria de jquery.mask
$('#telefono').mask('9999-9999');
