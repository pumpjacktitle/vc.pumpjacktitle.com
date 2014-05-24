@extends('layouts/fixed-top-bottom')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans('pjtitle/virtualcourthouse::search/general.title') }}}
@stop

{{-- Queue assets --}}
{{ Asset::queue('underscore', 'js/libs/underscore-min.js', 'jquery') }}
{{ Asset::queue('data-grid', 'js/cartalyst/js/data-grid.js', 'underscore') }}
{{ Asset::queue('moment', 'js/libs/moment.min.js') }}

{{ Asset::queue('results-style', 'pjtitle/virtualcourthouse::css/results/style.css') }}

{{ Asset::queue('tablesorter', 'js/tablesorter/tablesorter.min.js', 'jquery') }}

{{-- Inline scripts --}}
@section('scripts')
@parent
<script>
	jQuery(document).ready(function($)
	{
		var dg = $.datagrid('main', '.data-grid', '.data-grid_pagination', '.data-grid_applied', {
			loader: '.loading',
			scroll: '.data-grid',
			throttle: 10,
			callback: function(e)
			{
				$('#checkAll').prop('checked', false);

				$('#actions').prop('disabled', true);

				$ ( ".surveySortable" ).tablesorter({
					cssAsc: 'sortable asc',
					cssDesc: 'sortable desc',
					cssHeader: 'sortable'
				}); 
			}
		});

		$(document).on('click', '[data-page]', function(e) {

			$('#contentSection').animate({ scrollTop: 0 }, "slow");

		});

		$(document).on('click', '#checkAll', function()
		{
			$('input:checkbox').not(this).not('[disabled]').prop('checked', this.checked);

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

			var entries = $.map($('input[name="entries[]"]:checked'), function(e)
			{
				return e.value;
			});

			$.ajax({
				type: 'POST',
				url: '{{ URL::to('vc/search/results') }}',
				data: {
					action : action,
					entries: entries,
					searchId: '{{ $searchId }}'
				},
				success: function(response)
				{
					dg.refresh();
				}
			});
		});

		$(document).on('click', '.action-exclude', function(e)
		{
			e.preventDefault();

			var entries = [ $(this).data('cwlid') ];

			$.ajax({
				type: 'POST',
				url: '{{ URL::to('vc/search/results') }}',
				data: {
					action : 'exclude',
					entries: entries,
					searchId: '{{ $searchId }}'
				},
				success: function(response)
				{
					dg.refresh();
				}
			});
		});

		$(document).on('click', '.action-preview', function(e)
		{
			e.preventDefault();

			var cwlId = $(this).data('cwlid');

			window.open(
			  '{{ URL::to("vc/search/document/'+ cwlId +'/preview")}}',
			  '_blank' // <- This is what makes it open in a new window.
			);
		});

		$(document).on('click', '.action-download', function(e)
		{
			e.preventDefault();

			var cwlId = $(this).data('cwlid');

			window.open(
			  '{{ URL::to("vc/search/document/'+ cwlId +'/download")}}'
			);
		});

		$(document).on('click', '.action-view', function(e)
		{
			e.preventDefault();

			var cwlId = $(this).data('cwlid');

			window.open(
			  '{{ URL::to("vc/search/document/'+ cwlId +'")}}'
			);
		});

		$('.modal').unbind().on('submit', 'form[data-async]', function(e) {

			var entries = $.map($('.modal input[name="entries[]"]'), function(e)
			{
				return e.value;
			});

			$.ajax({
				type: 'POST',
				url: '{{ URL::to('vc/search/results') }}',
				data: {
					action : 'saveSearch',
					entries: entries,
					searchId: '{{ $searchId }}'
				},
				success: function(response)
				{
					$('#search-saved-name').html(entries[0]);
					$('#save-search-modal').modal('hide');
					alert('Search Saved!');
				},
				error: function(response)
				{
					alert("Oops, we couldn't save your search");
				}
			});

			e.preventDefault();
		});
	});
</script>
@stop

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li><a href="{{ URL::to('vc/search/create') }}">{{{ trans('pjtitle/virtualcourthouse::search/general.title') }}}</a></li>
<li class="active">{{{ trans('pjtitle/virtualcourthouse::results/general.title') }}}</li>
@stop

@section('contentFooter')
<div class="row m-t-sm">
	{{-- Data Grid : Pagination --}}
	<div class="data-grid_pagination" data-grid="main"></div>
</div>
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-6">
			<h3 class="m-b-none" id="search-saved-name">{{{ empty($search['savedName']) ? trans('pjtitle/virtualcourthouse::results/general.title') : $search['savedName'] }}}</h3>
		</div>
		<div class="col-sm-6 m-t-md text-right">
			
			<div class="btn-group">
			  <a href="{{ URL::to("vc/search/{$searchId}/update") }}" class="btn btn-default" data-toggle="tooltip" data-original-title="{{{ trans('pjtitle/virtualcourthouse::results/button.modify_search') }}}"><i class="fa fa-edit"></i></a>
			  <a href="{{ URL::to("vc/search/create/{$search['view']}") }}" class="btn btn-default" data-toggle="tooltip" data-original-title="{{{ trans('pjtitle/virtualcourthouse::results/button.new_search') }}}"><i class="fa fa-plus"></i></a>
			  <a class="btn btn-default" data-toggle="modal" data-target="#save-search-modal"><i class="fa fa-save"></i></a>
			</div>
<!-- 			<a class="btn btn-primary" href="{{ URL::to("vc/search/{$searchId}/update") }}"><i class="fa fa-edit"></i> {{{ trans('pjtitle/virtualcourthouse::results/button.modify_search') }}}</a>
			<a class="btn btn-danger" href="{{ URL::to('vc/search/create') }}"><i class="fa fa-plus"></i> {{{ trans('pjtitle/virtualcourthouse::results/button.new_search') }}}</a>
 -->		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<section class="panel panel-default">
			<div class="row wrapper">
				<div class="col-sm-4">

					<form method="post" action="" accept-charset="utf-8" data-search data-grid="main" class="form-inline" role="form">
						
						<div class="form-group">
							<select name="column" class="form-control" data-toggle="tooltip" data-original-title="Choose a column to filter by">
							       <option value="all">All</option>
							       <option value="county">County</option>
							       <option value="recordType">Book</option>
							       <option value="instrumentType">Type</option>
							       <option value="instrumentNumber">Instrument #</option>
							       <option value="volume">Volume</option>
							       <option value="page">Page</option>
							       <option value="instrumentDate">Executed</option>
							       <option value="fileDate">Filed</option>
							       <option value="grantor">Grantor</option>
							       <option value="grantee">Grantee</option>
							       <option value="surveyAbstractNumbers" data-label="surveyAbstractNumbers:Abstract Number">Abstract Number</option>
							       <option value="surveyNames" data-label="surveyNames: Name">Survey Name</option>
							       <option value="surveyNumbers" data-label="surveyNumbers: Number">Survey Number</option>
							       <option value="surveySubdivisions" data-label="surveySubdivisions:Subdivision">Subdivision</option>
							       <option value="surveyBlocks" data-label="surveyBlocks:Block">Block</option>
							       <option value="surveyLots" data-label="surveyLots:Lots">Lot</option>
							   </select>
						</div>

						<div class="form-group has-feedback">
							<input name="filter" type="text" placeholder="{{{ trans('general.search') }}}" class="form-control" data-toggle="tooltip" data-original-title="Add terms to filter by. Click the filter button to the right to add a filter tag.">
							<span class="glyphicon fa fa-search form-control-feedback"></span>
						</div>

						<button class="btn btn-default" data-toggle="tooltip" data-original-title="Add to Filters"><i class="fa fa-filter"></i></button>
						<a href="{{ Request::url(); }}" class="btn btn-default" data-toggle="tooltip" data-original-title="Refresh Results"><i class="fa fa-refresh"></i></a>

						@include('partials/grid/loading')
					</form>
				</div>

				<div class="col-sm-8 m-b-xs">
					{{-- Data Grid : Applied Filters --}}
					<div class="data-grid_applied" data-grid="main"></div>
				</div>
			</div>


			<div class="table-responsive">
				<table class="data-grid table table-striped b-t b-light" data-source="{{ URL::to("vc/search/results/grid/{$searchId}") }}" data-grid="main">
					<thead>
						<tr>
							<th width="1%"><input type="checkbox" name="checkAll" id="checkAll" data-toggle="tooltip" data-original-title="Check all items below" data-placement="right"></th>
							<th class="1%"></th>
							<th data-sort="county"  width="5%" class="sortable">{{{ trans('pjtitle/virtualcourthouse::results/table.county') }}}</th>
							<th data-sort="recordType" class="sortable" width="4%">{{{ trans('pjtitle/virtualcourthouse::results/table.recordType') }}}</th>
							<th data-sort="instrumentType" class="sortable" width="6%">{{{ trans('pjtitle/virtualcourthouse::results/table.instrumentType') }}}</th>
							<th data-sort="instrumentNumber" class="sortable" width="4%">{{{ trans('pjtitle/virtualcourthouse::results/table.instrumentNumber') }}}</th>
							<th data-sort="volume" class="sortable" width="3%">{{{ trans('pjtitle/virtualcourthouse::results/table.volume') }}}</th>
							<th data-sort="page" class="sortable" width="3%">{{{ trans('pjtitle/virtualcourthouse::results/table.page') }}}</th>
							<th data-sort="instrumentDate" class="sortable" width="6%">{{{ trans('pjtitle/virtualcourthouse::results/table.instrumentDate') }}}</th>
							<th data-sort="fileDate" class="sortable" width="6%">{{{ trans('pjtitle/virtualcourthouse::results/table.fileDate') }}}</th>
							<th width="14%">{{{ trans('pjtitle/virtualcourthouse::results/table.grantor') }}}</th>
							<th width="14%">{{{ trans('pjtitle/virtualcourthouse::results/table.grantee') }}}</th>
							<th width="33%">{{{ trans('pjtitle/virtualcourthouse::results/table.survey') }}}</th>
						</tr>
					</thead>

					<tbody></tbody>
				</table>
			</div>
		</section>
	</div>
</div>

@include('pjtitle/virtualcourthouse::search/grid/results')
@include('pjtitle/virtualcourthouse::search/grid/pagination')
@include('partials/grid/filters')

{{-- modals --}}
@include('pjtitle/virtualcourthouse::search/grid/no-results')
@include('pjtitle/virtualcourthouse::search/partials/modals/save-search')

@stop
