jQuery(document).ready(function($)
{
	// When the content name changes, we generate the slug
	$(document).on('keyup', '#name', function()
	{
		$('#slug').val($(this).val().slugify());
	});

	// When the storage type changes
	$(document).on('change', '#type', function()
	{
		var val = $(this).val();

		$('[data-type]').addClass('hide');

		$('[data-type="' + val + '"]').removeClass('hide');

		$((val == 'filesystem' ? '#file' : '#value')).attr('required', true);

		$((val == 'filesystem' ? '#value' : '#file')).removeAttr('required');
	});

	// Instantiate the editor
	$('.redactor').redactor({
		toolbarFixed: true,
		minHeight: 200,
	});

	// Validate the form
	H5F.setup(document.getElementById('content-form'));
});
