jQuery(document).ready(function($)
{
	$('[data-selectize="create"]').selectize({ create: true });

	optionsChanger();

	$(document).on('change', '#type', function() { optionsChanger(); });

	function optionsChanger()
	{
		if ($('#type').find(':selected').data('allow-options'))
		{
			$('[data-options]').removeClass('hide');
			$('[data-no-options]').addClass('hide');
		}
		else
		{
			$('[data-options]').addClass('hide');
			$('[data-no-options]').removeClass('hide');
		}
	};

	$(document).on('click', '[data-option-add]', function()
	{
		var totalRows = $('table tbody tr').length;

		if (totalRows >= 2)
		{
			$('[data-options-empty]').addClass('hide');
		}

		var $tr = $('[data-option-clone]').clone();

		$tr.removeClass('hide').removeAttr('data-option-clone');

		$tr.find('input').each(function()
		{
			$(this).val('').attr('name', $(this).attr('name').replace(':number', totalRows + 1));
		});

		$('table tbody').append($tr);
	});

	$(document).on('click', '[data-option-remove]', function()
	{
		$(this).closest('tr').remove();

		var totalRows = $('table tbody tr').length;

		if (totalRows === 2)
		{
			$('[data-options-empty]').removeClass('hide');
		}
	});

	// Sortable rows
	$('table').sortable({
		handle: '[data-option-move]',
		containerSelector: 'table',
		itemPath: '> tbody',
		itemSelector: 'tr',
		nested: true,
		distance: 10,
		placeholder: '<tr><td class="placeholder" colspan="4">Drop here</td></tr>',
	});

	// $('#attributes-form').validate();
});
