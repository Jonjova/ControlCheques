//efecto en los input de la case needs-validation
jQuery.validator.setDefaults({
    debug: true,
    success: "valid",
    onfocusout: function(e) {
        this.element(e);
    },
    onkeyup: false,

    highlight: function(element) {
        jQuery(element).closest('.form-control').addClass('is-invalid');
        jQuery(element).closest('.custom-select').addClass('is-invalid');
    },
    unhighlight: function(element) {
        jQuery(element).closest('.form-control').removeClass('is-invalid');
        jQuery(element).closest('.form-control').addClass('is-valid');
        jQuery(element).closest('.custom-select').removeClass('is-invalid');
        jQuery(element).closest('.custom-select').addClass('is-valid');
    },

    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function(error, element) {
        if (element.parent('.input-group-prepend').length) {
            $(element).siblings(".invalid-feedback").append(error);
            //error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

//validación de campos con la librería de jquery.validate
$("#createForm").validate({
	rules: 
	{
		nombre_de: {required: true },
		numero_cheque: {required: true, minlength: 2, maxlength: 50 },
		cuenta_bancaria: {required: true},
		foto : {required: true},
		monto : {required: true},
        id_tipo_banco: {required: true}	
	},
	messages:
	{
		nombre_de: {required: 'El campo de nombre de es requerido'},
		numero_cheque: {required: 'El campo de numero cheque es requerido',  minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres'},
		cuenta_bancaria:  {required: 'Cuenta bancaria es requerido'},
		foto : {required: 'Foto es requerido'},
		monto : {required: 'Monto es requerido'},
        id_tipo_banco : {required: 'Banco es requerido'}

	}
});


//validación de campos con la libreria de jquery.mask
$('#telefono').mask('9999-9999');
