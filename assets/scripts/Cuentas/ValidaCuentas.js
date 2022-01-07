$("#crearCuenta").validate({
	rules: 
	{
		digitos_cuenta: {required: true },
		nombre_de:{required: true },
		id_tipo_banco:{required: true }
	},
	messages:
	{
		digitos_cuenta: {required: 'Numero de cuenta es requerido'},
		nombre_de: {required: 'A Nombre de es requerido'},
		id_tipo_banco: {required: 'tipo de banco es requerido'}
	}
});

