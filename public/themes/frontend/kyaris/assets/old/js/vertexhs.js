$(".validate").validate({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if (element.parent().parent().attr("class") == "checker" || element.parent().parent().attr("class") == "choice" ) {
          error.appendTo( element.parent().parent().parent().parent().parent() );
        }
        else if (element.parent().parent().attr("class") == "checkbox" || element.parent().parent().attr("class") == "radio" ) {
          error.appendTo( element.parent().parent().parent() );
        }
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});
