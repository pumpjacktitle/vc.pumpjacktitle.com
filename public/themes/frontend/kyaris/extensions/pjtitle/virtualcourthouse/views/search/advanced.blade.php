@extends('layouts/fixed-top-bottom-left-sidebar')

{{ Asset::queue('validate', 'js/validate/validate.min.js', 'jquery')}}

{{ Asset::queue('selectize', 'js/selectize/js/selectize.js', 'jquery')}}
{{ Asset::queue('selectize', 'js/selectize/css/selectize.css', 'jquery')}}

{{ Asset::queue('tagsinput', 'js/tagsinput/jquery.tagsinput.min.js', 'jquery')}}
{{ Asset::queue('tagsinput', 'js/tagsinput/tagsinput.css', 'jquery')}}


{{ Asset::queue('sieve', 'js/sieve/sieve.js', 'jquery.js') }}
{{ Asset::queue('tablesorter', 'js/tablesorter/tablesorter.min.js', 'jquery') }}

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans('pjtitle/virtualcourthouse::search/general.titles.advanced') }}}
@stop

@section('styles')
	<style>
		.highlight-input { 	background-color: #000; }
	</style>
@stop

@section('scripts')

<script>
	var rowNum = {{ array_get($input, 'subdivisionRowCount') ?: 0 }};

	function addRow() {
		rowNum ++;
		var row = '<div class="row m-t-sm" id="rowNum'+rowNum+'"><div class="col-sm-2"><input type="text" id="block'+rowNum+'" name="blockLotRows['+rowNum+'][block]" class="form-control" value="" placeholder="{{ trans("pjtitle/virtualcourthouse::search/form.block_help") }}"></div><div class="col-sm-2"><input type="text" id="lot'+rowNum+'" name="blockLotRows['+rowNum+'][lot]" class="form-control tags" value="" placeholder="{{ trans("pjtitle/virtualcourthouse::search/form.lot_help") }}"></div><div class="col-sm-6"><button type="button" class="btn btn-default btn-success" onclick="javascript:addRow();"><i class="fa fa-plus-circle"></i></button>&nbsp;<button type="button" class="btn btn-danger" onclick="javascript:deleteRow('+rowNum+');"><i class="fa fa-minus-circle"></i></button></div></div>';
			
		jQuery('#blockLotRows').append(row).show('slow');

		$('#block'+rowNum).focus();

		var objDiv = document.getElementById("contentSection");
		objDiv.scrollTop = objDiv.scrollHeight;
	}

	function deleteRow(rNum) {
		jQuery('#rowNum'+rNum).remove();
	}

	$(function() {
	 	
	 	$("#search-form-submit").on("click", function() {
	 		$('#results-loading').modal({
	 			backdrop: 'static'
	 		})

	 		// Get the modal target
	 		var form = $(this).data('form');
	 		
	 		$("#"+form).submit();
	 	});

	 	$("table.sieve").sieve({
	 		searchTemplate: "<div class='m-t-xs m-b-xs visible-lg'><input type='text' class='form-control input-sm' placeholder='Filter List...'></label></div>"
	 	});

	 	$("table.sortable").tablesorter({
	 		cssAsc: 'sortable asc',
	 		cssDesc: 'sortable desc',
	 		cssHeader: 'sortable'
	 	}); 
	}); 
</script>
@stop

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li>{{{ trans('pjtitle/virtualcourthouse::search/general.title') }}}</li>
<li class="active">{{{ trans('pjtitle/virtualcourthouse::search/general.titles.advanced') }}}</li>
@stop

@section('contentFooter')

<div class="row">
	<div class="col-md-8 m-t-sm">
		
	</div>

	<div class="col-md-4">
		<div class="pull-right m-t-sm">
			<button id="search-form-submit" type="button" class="btn btn-success" data-form="search-form"><i class="fa fa-search"></i> {{{ trans('pjtitle/virtualcourthouse::search/button.search') }}}</button>
			<a id="search-form-reset" href="{{ URL::to("vc/search/create/{$view}") }}" class="btn btn-danger" data-form="search-form"><span class="">{{{ trans('pjtitle/virtualcourthouse::search/button.reset') }}}</span></a>
		</div>
	</div>
</div>
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-3">
			<h3 class="m-b-none">{{{ trans('pjtitle/virtualcourthouse::search/general.titles.advanced') }}}</h3>
		</div>
		<div class="col-sm-9 m-t-md">
			<div class="pull-right">
				<a class="btn btn-default" href="" data-toggle="modal" data-target="#saved-searches-modal"><i class="fa fa-briefcase"></i> Load Saved Search</a>
			</div>
		</div>
	</div>
</div>

<div class="row wrapper bg-white" id="search">
	<div class="col-md-12 intro-step-2">
		<form id="search-form" name="search-form" method="post" class="form-horizontal validate" action="{{ URL::to("vc/search/create/{$view}") }}">
			@include('pjtitle/virtualcourthouse::search/partials/advanced/county')
			@include('pjtitle/virtualcourthouse::search/partials/advanced/grantorGrantee')
			@include('pjtitle/virtualcourthouse::search/partials/advanced/documentInformation')
			@include('pjtitle/virtualcourthouse::search/partials/advanced/abstractSurveyInformation')
			@include('pjtitle/virtualcourthouse::search/partials/advanced/subdivisionInformation')
			@include('pjtitle/virtualcourthouse::search/partials/advanced/keyword')
			
			{{-- csrf token --}}
			{{ Form::token() }}
		</form>
	</div>
</div>

@include("pjtitle/virtualcourthouse::search/partials/modals/results-loader")
@include("pjtitle/virtualcourthouse::search/partials/modals/saved-search-list")

@stop
