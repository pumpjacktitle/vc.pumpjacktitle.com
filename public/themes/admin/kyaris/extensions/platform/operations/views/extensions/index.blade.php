@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{ trans('platform/operations::extensions/general.title') }}
@stop

{{-- Queue assets --}}
{{ Asset::queue('underscore', 'underscore/js/underscore.js', 'jquery') }}
{{ Asset::queue('data-grid', 'cartalyst/js/data-grid.js', 'underscore') }}
{{ Asset::queue('moment', 'moment/js/moment.js') }}

{{-- Inline scripts --}}
@section('scripts')
@parent
<script>
	jQuery(document).ready(function($)
	{
		var dg = $.datagrid('main', '.data-grid', '.data-grid_pagination', '.data-grid_applied', {
			loader: '.loading',
			scroll: '.data-grid',
			callback: function()
			{
				$('#checkAll').prop('checked', false);

				$('#actions').prop('disabled', true);

				$('[data-toggle=tooltip]').tooltip();
			}
		});

		$(document).on('click', '#checkAll', function()
		{
			$('input:checkbox').not(this).prop('checked', this.checked);

			var status = $('input[name="entries[]"]:checked').length > 0;

			$('#actions').prop('disabled', ! status);
		});

		$(document).on('click', 'input[name="entries[]"]', function()
		{
			var status = $('input[name="entries[]"]:checked').length > 0;

			$('#actions').prop('disabled', ! status);
		});

		$(document).on('click', '[data-action]', function(e)
		{
			e.preventDefault();

			var action = $(this).data('action');

			var entries = $.map($('input[name="entries[]"]:checked'), function(e, i)
			{
				return +e.value;
			});

			$.ajax({
				type: 'POST',
				url: '{{ URL::toAdmin('content') }}',
				data: {
					action : action,
					entries: entries
				},
				success: function(response)
				{
					dg.refresh();
				}
			});
		});
	});
</script>
@stop

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li class="active">{{{ trans('platform/operations::extensions/general.title') }}}</li>
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-6">
			<h3 class="m-b-none">{{{ trans('platform/operations::extensions/general.title') }}}</h3>
		</div>
		<div class="col-sm-6 m-t-md text-right">
			<a class="btn btn-primary" href="{{ URL::toAdmin('operations/workshop') }}"><i class="fa fa-plus"></i> {{{ trans('button.create') }}}</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<section class="panel panel-default">
			<div class="row wrapper">
				<div class="col-sm-4">

					<form method="post" action="" accept-charset="utf-8" data-search data-grid="main" class="form-inline" role="form">

						<div class="form-group has-feedback">
							<input name="filter" type="text" placeholder="{{{ trans('general.search') }}}" class="form-control">
							<span class="glyphicon fa fa-search form-control-feedback"></span>
						</div>

						@include('partials/grid/loading')
					</form>
				</div>

				<div class="col-sm-8 m-b-xs text-right">
					{{-- Data Grid : Applied Filters --}}
					<div class="data-grid_applied" data-grid="main"></div>
				</div>
			</div>

			<div class="table-responsive">
				<table class="data-grid table table-striped b-t b-light" data-source="{{ URL::toAdmin('operations/extensions/grid') }}" data-grid="main">
					<thead>
						<tr>
							<th data-sort="name" class="col-md-8 sortable">{{{ trans('platform/operations::extensions/table.name') }}}</th>
							<th data-sort="slug" class="col-md-2 sortable">{{{ trans('platform/operations::extensions/table.slug') }}}</th>
							<th data-sort="version" class="col-md-2 sortable">{{{ trans('platform/operations::extensions/table.version') }}}</th>
						</tr>
					</thead>

					<tbody></tbody>
				</table>
			</div>
			<footer class="panel-footer">
				<div class="row">
					{{-- Data Grid : Pagination --}}
					<div class="data-grid_pagination" data-grid="main"></div>
				</div>
			</footer>
		</section>
	</div>
</div>

@include('platform/operations::extensions/grid/results')
@include('partials/grid/pagination')
@include('partials/grid/filters')
@include('platform/operations::extensions/grid/no-results')
@stop
