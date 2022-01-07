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
		numero_cheque: {required: true,number:true},
		cuenta_bancaria: {required: true},
		foto : {required: true},
		monto : {required: true,number:true},
        id_tipo_banco: {required: true}	
	},
	messages:
	{
		nombre_de: {required: 'El campo de nombre de es requerido'},
		numero_cheque: {required: 'El campo de numero cheque es requerido', number:'Solo números'},
		cuenta_bancaria:  {required: 'Cuenta bancaria es requerido'},
		foto : {required: 'Foto es requerido'},
		monto : {required: 'Monto es requerido',number:'Solo números'},
        id_tipo_banco : {required: 'Banco es requerido'}

	}
});

//calidacion ingresar solo numeros
$('input[name="numero_cheque"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});

$('input[name="monto"]').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});
//validación de campos con la libreria de jquery.mask
//$('#numero_cheque').mask('9999-9999');
