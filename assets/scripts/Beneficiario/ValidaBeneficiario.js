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
		beneficiario: {required: true, minlength: 2, maxlength: 50, lettersonly: true },
		numero_cheque: {required: true, minlength: 2, maxlength: 50 },
		cuenta_bancaria: {required: true},
		foto : {required: true},
		monto : {required: true}	
	},
	messages:
	{
		beneficiario: {required: 'El campo de beneficiario es requerido', lettersonly: 'Sólo letras', minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres'},
		numero_cheque: {required: 'El campo de numero cheque es requerido',  minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres'},
		cuenta_bancaria:  {required: 'El campo de cuenta bancaria es requerido'},
		foto : {required: 'El campo de foto es requerido'},
		monto : {required: 'El campo de monto es requerido'}
	}
});


//validación de campos con la libreria de jquery.mask
$('#telefono').mask('9999-9999');
