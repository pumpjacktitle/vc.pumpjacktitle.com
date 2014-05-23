$(function() {

    //===== jQuery validate defaults =====//
    if ($.fn.validate) {
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
    }

    //===== jGrowl notifications defaults =====//
    $.jGrowl.defaults.closer = false;
    $.jGrowl.defaults.easing = 'easeInOutCirc';

    // Activate modal windows
    $(document).on('click', '[data-modal], [data-toggle="modal"]', function(e)
    {
        e.preventDefault();

        // Get the modal target
        var target = $(this).data('target');

        // Is this modal target a confirmation?
        if (target === 'modal-confirm')
        {
            $('#modal-confirm .confirm').attr('href', $(this).attr('href'));

            $('#modal-confirm').modal({
                show: true,
                remote: false
            });

            return false;
        }
    });

});
