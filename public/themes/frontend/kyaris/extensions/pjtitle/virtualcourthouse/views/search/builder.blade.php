@extends('layouts/fixed-top-bottom-left-sidebar')

{{ Asset::queue('selectize', 'js/selectize/js/selectize.js', 'jquery')}}
{{ Asset::queue('selectize', 'js/selectize/css/selectize.css', 'jquery')}}

{{ Asset::queue('tagsinput', 'js/tagsinput/jquery.tagsinput.min.js', 'jquery')}}
{{ Asset::queue('tagsinput', 'js/tagsinput/tagsinput.css', 'jquery')}}

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans('pjtitle/virtualcourthouse::search/general.titles.advanced') }}}
@stop

@section('scripts')
@parent

<script>
	var rowNum = 0;

	$(".addRow").on("click", function() {
		rowNum ++;
		var row = '<div class="row m-t-sm" id="rowNum'+rowNum+'"><div class="col-sm-3"><select name="" id=""><option value="">Grantee</option><option value="">Grantor</option><option value="">Grantee/Grantor</option></select></div><div class="col-sm-2"><input type="text" id="block'+rowNum+'" name="blocks[]" class="form-control" value="" placeholder="Block"></div><div class="col-sm-2"><input type="text" id="lot'+rowNum+'" name="lots[]" class="form-control" value="" placeholder="Lot"></div><div class="col-sm-5"><button type="button" class="btn btn-danger" onclick="javascript:deleteRow('+rowNum+');"><i class="fa fa-minus-circle"></i></button></div></div>';
			
		jQuery('#blockLotRows').append(row);

		var objDiv = $('#contentSection');
		objDiv.scrollTop = objDiv.scrollHeight;
	});

	$(".deleteRow").on("click", function() {

		alert('here');
		var $self = $(this);

		$self.remove();
	});

	function deleteRow(rNum) {
		jQuery('#rowNum'+rNum).remove();
	}
</script>
@stop

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li>{{{ trans('pjtitle/virtualcourthouse::search/general.title') }}}</li>
<li class="active">{{{ trans('pjtitle/virtualcourthouse::search/general.titles.advanced') }}}</li>
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-6">
			<h3 class="m-b-none">{{{ trans('pjtitle/virtualcourthouse::search/general.titles.advanced') }}}</h3>
		</div>
		<div class="col-sm-6 m-t-md text-right">
			<a class="btn btn-primary" href="{{ URL::to('vc/search') }}"><i class="fa fa-plus"></i> {{{ trans('pjtitle/virtualcourthouse::search/button.new_search') }}}</a>
		</div>
	</div>
</div>

<div class="row wrapper bg-white">
	<div class="col-md-12">
		<form class="form-horizontal validate">
			
		</form>
	</div>
</div>

@stop
